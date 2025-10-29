<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\JobType;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        // Get featured jobs (latest 6 jobs)
        $featuredJobs = Job::with(['company', 'category', 'city'])
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Get statistics
        $totalJobs = Job::where('is_active', 1)->count();
        $totalCompanies = Company::count();
        $totalApplications = 500; // This would come from applications table if it exists
        
        // Get filter options for search form
        $categories = JobCategory::all();
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');
        $jobTypes = JobType::all();
        
        $pageTitle = '1000Jobs - Find Your Dream Job';

        return view('public.index', compact('featuredJobs', 'totalJobs', 'totalCompanies', 'totalApplications', 'categories', 'cities', 'jobTypes', 'pageTitle'));
    }

    /**
     * Display all jobs page
     */
    public function jobs(Request $request)
    {
        $search = $request->get('search');
        $location = $request->get('location');
        $category = $request->get('category');
        $job_type = $request->get('job_type');
        $company = $request->get('company');

        // Redirect to slug-based URL if company parameter exists
        if ($company) {
            $companyModel = Company::where('name', $company)->first();
            if ($companyModel) {
                return redirect()->route('jobs.company', $companyModel->slug);
            }
        }

        // Redirect to slug-based URL if category parameter exists
        if ($category) {
            $categoryModel = JobCategory::where('name', $category)->first();
            if ($categoryModel) {
                return redirect()->route('jobs.category', $categoryModel->slug);
            }
        }

        $query = Job::with(['company', 'category', 'city'])
            ->where('is_active', 1);

        // Apply filters
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('company', function($companyQuery) use ($search) {
                      $companyQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($location) {
            $query->whereHas('city', function($cityQuery) use ($location) {
                $cityQuery->where('slug', $location)->orWhere('city_name', 'like', "%{$location}%");
            });
        }

        if ($job_type) {
            $query->whereHas('jobType', function($typeQuery) use ($job_type) {
                $typeQuery->where('name', 'like', "%{$job_type}%");
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(12);

        // Get all categories for filter dropdown
        $categories = JobCategory::all();
        
        // Get Pakistan cities only (country_id = 1) for filter dropdown
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');

        $pageTitle = 'All Jobs - 1000Jobs';
        $category = null; // Set to null since we redirect category filters

        return view('public.jobs', compact('jobs', 'categories', 'cities', 'search', 'location', 'category', 'job_type', 'pageTitle'));
    }

    /**
     * Display jobs by company
     */
    public function jobsByCompany($company)
    {
        $companyModel = Company::where('slug', $company)->orWhere('name', $company)->firstOrFail();
        
        $request = request();
        $search = $request->get('search');
        $location = $request->get('location');
        $category = $request->get('category');
        $job_type = $request->get('job_type');

        $query = Job::with(['company', 'category', 'city'])
            ->where('is_active', 1)
            ->whereHas('company', function($query) use ($companyModel) {
                $query->where('id', $companyModel->id);
            });

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($location) {
            $query->whereHas('city', function($cityQuery) use ($location) {
                $cityQuery->where('slug', $location)->orWhere('city_name', 'like', "%{$location}%");
            });
        }

        if ($category) {
            $query->whereHas('category', function($categoryQuery) use ($category) {
                $categoryQuery->where('slug', $category)->orWhere('name', 'like', "%{$category}%");
            });
        }

        if ($job_type) {
            $query->whereHas('jobType', function($typeQuery) use ($job_type) {
                $typeQuery->where('name', 'like', "%{$job_type}%");
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(12);

        $categories = JobCategory::all();
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');

        $pageTitle = 'Jobs at ' . $companyModel->name . ' - 1000Jobs';

        return view('public.jobs', compact('jobs', 'categories', 'cities', 'search', 'location', 'category', 'job_type', 'pageTitle'));
    }

    /**
     * Display job details page
     */
    public function jobDetails($id, $slug)
    {
        $job = Job::with(['company', 'category', 'jobType', 'city', 'country', 'skills'])
            ->where('is_active', 1)
            ->where('id', $id)
            ->firstOrFail();

        // Get related jobs from same company
        $relatedJobs = Job::with(['company', 'category', 'city'])
            ->where('company_id', $job->company_id)
            ->where('id', '!=', $job->id)
            ->where('is_active', 1)
            ->limit(3)
            ->get();

        $pageTitle = $job->title . ' - ' . ($job->company->name ?? '1000Jobs');

        return view('public.job-details', compact('job', 'relatedJobs', 'pageTitle'));
    }

    /**
     * Display companies page
     */
    public function companies(Request $request)
    {
        $search = $request->get('search');
        $location = $request->get('location');

        $query = Company::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($location) {
            $query->where('location', 'like', "%{$location}%");
        }

        $companies = $query->orderBy('created_at', 'desc')->paginate(12);

        // Get Pakistan cities only (country_id = 1) for filter dropdown
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');

        $pageTitle = 'Companies - 1000Jobs';

        return view('public.companies', compact('companies', 'cities', 'search', 'location', 'pageTitle'));
    }

    /**
     * Display jobs by category
     */
    public function jobsByCategory($category)
    {
        $categoryModel = JobCategory::where('slug', $category)->firstOrFail();
        
        $request = request();
        $search = $request->get('search');
        $location = $request->get('location');
        $job_type = $request->get('job_type');

        $query = Job::with(['company', 'category', 'city'])
            ->where('is_active', 1)
            ->whereHas('category', function($query) use ($categoryModel) {
                $query->where('id', $categoryModel->id);
            });

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('company', function($companyQuery) use ($search) {
                      $companyQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($location) {
            $query->whereHas('city', function($cityQuery) use ($location) {
                $cityQuery->where('slug', $location)->orWhere('city_name', 'like', "%{$location}%");
            });
        }

        if ($job_type) {
            $query->whereHas('jobType', function($typeQuery) use ($job_type) {
                $typeQuery->where('name', 'like', "%{$job_type}%");
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(12);

        $categories = JobCategory::all();
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');

        $pageTitle = $categoryModel->name . ' Jobs - 1000Jobs';

        return view('public.jobs', compact('jobs', 'categories', 'cities', 'search', 'location', 'category', 'job_type', 'pageTitle'));
    }

    /**
     * Display all locations page
     */
    public function showLocations()
    {
        // Get Pakistan cities only (country_id = 1) with job counts - remove duplicates
        $cities = City::where('country_id', 1)
            ->withCount(['jobs' => function($query) {
                $query->where('is_active', 1);
            }])
            ->orderBy('city_name')
            ->get()
            ->unique('city_name');

        $pageTitle = 'Jobs by Location - 1000Jobs';

        return view('public.locations', compact('cities', 'pageTitle'));
    }

    /**
     * Display jobs by location
     */
    public function jobsByLocation($location)
    {
        // Get Pakistan city only
        $cityModel = City::where('country_id', 1)
            ->where(function($query) use ($location) {
                $query->where('slug', $location)->orWhere('city_name', $location);
            })
            ->firstOrFail();
        
        $request = request();
        $search = $request->get('search');
        $category = $request->get('category');
        $job_type = $request->get('job_type');

        $query = Job::with(['company', 'category', 'city'])
            ->where('is_active', 1)
            ->whereHas('city', function($query) use ($cityModel) {
                $query->where('city_id', $cityModel->city_id);
            });

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('company', function($companyQuery) use ($search) {
                      $companyQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($category) {
            $query->whereHas('category', function($categoryQuery) use ($category) {
                $categoryQuery->where('slug', $category)->orWhere('name', 'like', "%{$category}%");
            });
        }

        if ($job_type) {
            $query->whereHas('jobType', function($typeQuery) use ($job_type) {
                $typeQuery->where('name', 'like', "%{$job_type}%");
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(12);

        $categories = JobCategory::all();
        $cities = City::where('country_id', 1)->orderBy('city_name')->get()->unique('city_name');

        $pageTitle = 'Jobs in ' . $cityModel->city_name . ' - 1000Jobs';

        return view('public.jobs', compact('jobs', 'categories', 'cities', 'search', 'location', 'category', 'job_type', 'pageTitle', 'cityModel'));
    }

    /**
     * Display about page
     */
    public function about()
    {
        $pageTitle = 'About Us - 1000Jobs';
        return view('public.about', compact('pageTitle'));
    }

    /**
     * Display contact page
     */
    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle contact form submission
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            // Send email
            try {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ];

                Mail::send('emails.contact', $data, function($message) use ($data) {
                    $message->to('Info@trickscare.com')
                            ->subject('Contact Form: ' . $data['subject'])
                            ->replyTo($data['email'], $data['name']);
                });

                return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
            } catch (\Exception $e) {
                return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
            }
        }

        $pageTitle = 'Contact Us - 1000Jobs';
        return view('public.contact', compact('pageTitle'));
    }

    /**
     * Display login page
     */
    public function login()
    {
        $pageTitle = 'Login - 1000Jobs';
        return view('public.login', compact('pageTitle'));
    }

    /**
     * Display register page
     */
    public function register()
    {
        $pageTitle = 'Register - 1000Jobs';
        return view('public.register', compact('pageTitle'));
    }
}