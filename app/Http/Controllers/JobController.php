<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\EducationLevel;
use App\Models\Country;
use App\Models\City;
use App\Models\JobType;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        $pageName = 'All Jobs';
        $all = Job::with(['company', 'category', 'educationLevel', 'country', 'city', 'jobType', 'skills'])
                  ->orderBy('id', 'desc')
                  ->paginate(10);
        return view('jobs.index', compact('pageName', 'all'));
    }

    public function create()
    {
        $pageName = 'Add New Job';
        $companies = Company::orderBy('name')->get();
        $categories = JobCategory::orderBy('name')->get();
        $educationLevels = EducationLevel::orderBy('name')->get();
        $countries = Country::orderBy('country_name')->get();
        $cities = City::orderBy('city_name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        
        return view('jobs.create', compact('pageName', 'companies', 'categories', 'educationLevels', 'countries', 'cities', 'jobTypes', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'nullable|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
            'education_level_id' => 'nullable|exists:education_levels,id',
            'country_id' => 'required|exists:country,country_id',
            'city_id' => 'required|exists:city,city_id',
            'job_type_id' => 'required|exists:job_types,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:jobs,slug',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'min_experience_months' => 'required|integer|min:0',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'vacancies' => 'required|integer|min:1',
            'posting_date' => 'required|date',
            'last_apply_date' => 'required|date',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
            'image' => 'nullable|image|max:2048'
        ], [
            'title.required' => 'Job title is required.',
            'title.string' => 'Job title must be a valid text.',
            'title.max' => 'Job title cannot exceed 255 characters.',
            'category_id.required' => 'Job category is required.',
            'category_id.exists' => 'Please select a valid job category.',
            'job_type_id.required' => 'Job type is required.',
            'job_type_id.exists' => 'Please select a valid job type.',
            'country_id.required' => 'Country is required.',
            'country_id.exists' => 'Please select a valid country.',
            'city_id.required' => 'City is required.',
            'city_id.exists' => 'Please select a valid city.',
            'description.required' => 'Job description is required.',
            'description.string' => 'Job description must be valid text.',
            'min_experience_months.required' => 'Minimum experience is required.',
            'min_experience_months.integer' => 'Minimum experience must be a valid number.',
            'min_experience_months.min' => 'Minimum experience cannot be negative.',
            'vacancies.required' => 'Number of vacancies is required.',
            'vacancies.integer' => 'Vacancies must be a valid number.',
            'vacancies.min' => 'At least 1 vacancy is required.',
            'salary_min.numeric' => 'Minimum salary must be a valid number.',
            'salary_min.min' => 'Minimum salary must be greater than or equal to 0.',
            'salary_max.numeric' => 'Maximum salary must be a valid number.',
            'salary_max.min' => 'Maximum salary must be greater than or equal to 0.',
            'posting_date.required' => 'Job posting date is required.',
            'posting_date.date' => 'Posting date must be a valid date.',
            'last_apply_date.required' => 'Last application date is required.',
            'last_apply_date.date' => 'Last application date must be a valid date.',
        ]);

        // Custom validation for salary range
        if ($validated['salary_min'] && $validated['salary_max']) {
            $minSalary = (float)$validated['salary_min'];
            $maxSalary = (float)$validated['salary_max'];
            
            if ($maxSalary < $minSalary) {
                return redirect()->back()
                    ->withErrors(['salary_max' => 'Maximum salary must be greater than or equal to minimum salary for this job.'])
                    ->withInput();
            }
        }

        // Custom validation for date range
        if ($validated['last_apply_date'] <= $validated['posting_date']) {
            return redirect()->back()
                ->withErrors(['last_apply_date' => 'Last application date must be after job posting date.'])
                ->withInput();
        }

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set default values for removed fields
        $validated['currency'] = 'PKR';
        $validated['is_remote'] = 0;
        $validated['is_active'] = 1;

        // Handle optional image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('job_images', 'public');
            $filename = basename($path);
            $validated['image'] = $filename;
        
            // Copy image to public/storage/job_images manually
            $source = storage_path('app/public/job_images/' . $filename);
            $destination = public_path('storage/job_images/' . $filename);
        
            if (!file_exists(public_path('storage/job_images'))) {
                mkdir(public_path('storage/job_images'), 0777, true);
            }
        
            copy($source, $destination);
        }
        

        $job = Job::create($validated);
        
        // Sync skills
        if ($request->has('skills')) {
            $job->skills()->sync($request->skills);
        }
        
        return redirect()->route('jobs.index')->with('success', 'Job added successfully!');
    }

    public function edit(int $id)
    {
        $pageName = 'Edit Job';
        $job = Job::findOrFail($id);
        $companies = Company::orderBy('name')->get();
        $categories = JobCategory::orderBy('name')->get();
        $educationLevels = EducationLevel::orderBy('name')->get();
        $countries = Country::orderBy('country_name')->get();
        $cities = City::orderBy('city_name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        
        return view('jobs.edit', compact('pageName', 'job', 'companies', 'categories', 'educationLevels', 'countries', 'cities', 'jobTypes', 'skills'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'company_id' => 'nullable|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
            'education_level_id' => 'nullable|exists:education_levels,id',
            'country_id' => 'required|exists:country,country_id',
            'city_id' => 'required|exists:city,city_id',
            'job_type_id' => 'required|exists:job_types,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:jobs,slug,' . $id . ',id',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'min_experience_months' => 'required|integer|min:0',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'vacancies' => 'required|integer|min:1',
            'posting_date' => 'required|date',
            'last_apply_date' => 'required|date',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
            'image' => 'nullable|image|max:2048'
        ], [
            'title.required' => 'Job title is required.',
            'title.string' => 'Job title must be a valid text.',
            'title.max' => 'Job title cannot exceed 255 characters.',
            'category_id.required' => 'Job category is required.',
            'category_id.exists' => 'Please select a valid job category.',
            'job_type_id.required' => 'Job type is required.',
            'job_type_id.exists' => 'Please select a valid job type.',
            'country_id.required' => 'Country is required.',
            'country_id.exists' => 'Please select a valid country.',
            'city_id.required' => 'City is required.',
            'city_id.exists' => 'Please select a valid city.',
            'description.required' => 'Job description is required.',
            'description.string' => 'Job description must be valid text.',
            'min_experience_months.required' => 'Minimum experience is required.',
            'min_experience_months.integer' => 'Minimum experience must be a valid number.',
            'min_experience_months.min' => 'Minimum experience cannot be negative.',
            'vacancies.required' => 'Number of vacancies is required.',
            'vacancies.integer' => 'Vacancies must be a valid number.',
            'vacancies.min' => 'At least 1 vacancy is required.',
            'salary_min.numeric' => 'Minimum salary must be a valid number.',
            'salary_min.min' => 'Minimum salary must be greater than or equal to 0.',
            'salary_max.numeric' => 'Maximum salary must be a valid number.',
            'salary_max.min' => 'Maximum salary must be greater than or equal to 0.',
            'posting_date.required' => 'Job posting date is required.',
            'posting_date.date' => 'Posting date must be a valid date.',
            'last_apply_date.required' => 'Last application date is required.',
            'last_apply_date.date' => 'Last application date must be a valid date.',
        ]);

        // Custom validation for salary range
        if ($validated['salary_min'] && $validated['salary_max']) {
            $minSalary = (float)$validated['salary_min'];
            $maxSalary = (float)$validated['salary_max'];
            
            if ($maxSalary < $minSalary) {
                return redirect()->back()
                    ->withErrors(['salary_max' => 'Maximum salary must be greater than or equal to minimum salary for this job.'])
                    ->withInput();
            }
        }

        // Custom validation for date range
        if ($validated['last_apply_date'] <= $validated['posting_date']) {
            return redirect()->back()
                ->withErrors(['last_apply_date' => 'Last application date must be after job posting date.'])
                ->withInput();
        }

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set default values for removed fields
        $validated['currency'] = 'PKR';
        $validated['is_remote'] = 0;
        $validated['is_active'] = 1;

        $job = Job::findOrFail($id);

        // Handle optional image upload on update
        if ($request->hasFile('image')) {
            // Delete old image if present
            if (!empty($job->image)) {
                $oldPath = (strpos($job->image, 'job_images/') === 0)
                    ? $job->image
                    : 'job_images/' . $job->image;
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Store new image and keep only filename in DB
            $path = $request->file('image')->store('job_images', 'public');
            $validated['image'] = basename($path);
        }

        $job->update($validated);

        // Sync skills
        if ($request->has('skills')) {
            $job->skills()->sync($request->skills);
        } else {
            $job->skills()->sync([]);
        }

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(int $id)
    {
        Job::destroy($id);
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    // AJAX method to get cities based on country
    public function getCities($countryId)
    {
        $cities = City::where('country_id', $countryId)->orderBy('city_name')->get();
        return response()->json($cities);
    }
}
