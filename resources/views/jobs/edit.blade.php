@extends('template')

@section('content')
<form method="POST" action="{{ route('jobs.update', $job->id) }}">
    @csrf
    @method('PUT')
    
    <!-- Basic Information -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Job Title <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Slug</label>
                <div class="col-lg-8">
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $job->slug) }}" readonly>
                    <small class="text-muted">Auto-generated from title</small>
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Company</label>
                <div class="col-lg-8">
                    <select name="company_id" class="form-control">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id', $job->company_id) == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Job Category <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Job Type <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="job_type_id" class="form-control">
                        <option value="">Select Job Type</option>
                        @foreach($jobTypes as $jobType)
                            <option value="{{ $jobType->id }}" {{ old('job_type_id', $job->job_type_id) == $jobType->id ? 'selected' : '' }}>
                                {{ $jobType->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_type_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Education Level</label>
                <div class="col-lg-8">
                    <select name="education_level_id" class="form-control">
                        <option value="">Select Education Level</option>
                        @foreach($educationLevels as $educationLevel)
                            <option value="{{ $educationLevel->id }}" {{ old('education_level_id', $job->education_level_id) == $educationLevel->id ? 'selected' : '' }}>
                                {{ $educationLevel->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('education_level_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Country <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="country_id" class="form-control" id="country_id">
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->country_id }}" {{ old('country_id', $job->country_id) == $country->country_id ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">City <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="city_id" class="form-control" id="city_id">
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->city_id }}" {{ old('city_id', $job->city_id) == $city->city_id ? 'selected' : '' }}>
                                {{ $city->city_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('city_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Experience and Salary -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Min Experience (Months) <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="number" name="min_experience_months" class="form-control" value="{{ old('min_experience_months', $job->min_experience_months) }}" min="0">
                    @error('min_experience_months') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Vacancies <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="number" name="vacancies" class="form-control" value="{{ old('vacancies', $job->vacancies) }}" min="1">
                    @error('vacancies') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Min Salary (PKR)</label>
                <div class="col-lg-8">
                    <input type="number" name="salary_min" class="form-control" value="{{ old('salary_min', $job->salary_min) }}" step="0.01" min="0">
                    @error('salary_min') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Max Salary (PKR)</label>
                <div class="col-lg-8">
                    <input type="number" name="salary_max" class="form-control" value="{{ old('salary_max', $job->salary_max) }}" step="0.01" min="0">
                    @error('salary_max') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Dates -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Posting Date <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="date" name="posting_date" class="form-control" value="{{ old('posting_date', $job->posting_date->format('Y-m-d')) }}">
                    @error('posting_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Last Apply Date <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="date" name="last_apply_date" class="form-control" value="{{ old('last_apply_date', $job->last_apply_date->format('Y-m-d')) }}">
                    @error('last_apply_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- Skills (Multiple Selection) -->
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Required Skills</label>
        <div class="col-lg-10">
            <div class="skills-checkbox-container">
                @foreach($skills as $skill)
                    <div class="skills-checkbox-item">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" id="skill_{{ $skill->id }}" 
                               {{ (collect(old('skills', $job->skills->pluck('id')->toArray()))->contains($skill->id)) ? 'checked' : '' }}>
                        <label for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                    </div>
                @endforeach
            </div>
            @error('skills') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <!-- Text Areas -->
    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Job Description <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <textarea name="description" id="description" class="form-control" rows="6">{{ old('description', $job->description) }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Responsibilities</label>
        <div class="col-lg-10">
            <textarea name="responsibilities" id="responsibilities" class="form-control" rows="4">{{ old('responsibilities', $job->responsibilities) }}</textarea>
            @error('responsibilities') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Requirements</label>
        <div class="col-lg-10">
            <textarea name="requirements" id="requirements" class="form-control" rows="4">{{ old('requirements', $job->requirements) }}</textarea>
            @error('requirements') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Update</button>
        </div>
    </div>
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>
/* Skills Checkboxes Styling */
.skills-checkbox-container {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #e5e6e7;
    border-radius: 4px;
    padding: 10px;
    background-color: #f9f9f9;
}

.skills-checkbox-item {
    margin-bottom: 8px;
}

.skills-checkbox-item input[type="checkbox"] {
    margin-right: 8px;
}

.skills-checkbox-item label {
    margin-bottom: 0;
    font-weight: normal;
    cursor: pointer;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing edit form...');
    
    // Initialize CKEditor for textarea fields
    if (typeof ClassicEditor !== 'undefined') {
        console.log('CKEditor loaded, initializing editors...');
        
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                minHeight: '300px'
            })
            .then(editor => {
                window.descriptionEditor = editor;
                console.log('Description editor initialized');
                
                // Set minimum height for the editing area
                const editingView = editor.editing.view;
                editingView.change(writer => {
                    writer.setStyle('min-height', '300px', editingView.document.getRoot());
                });
                
                // Real-time sync: Update textarea whenever content changes
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#description').value = data;
                    console.log('Description synced in real-time:', data);
                });
            })
            .catch(error => {
                console.error('Error initializing description editor:', error);
            });

        ClassicEditor
            .create(document.querySelector('#responsibilities'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                minHeight: '300px'
            })
            .then(editor => {
                window.responsibilitiesEditor = editor;
                console.log('Responsibilities editor initialized');
                
                // Set minimum height for the editing area
                const editingView = editor.editing.view;
                editingView.change(writer => {
                    writer.setStyle('min-height', '300px', editingView.document.getRoot());
                });
                
                // Real-time sync: Update textarea whenever content changes
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#responsibilities').value = data;
                    console.log('Responsibilities synced in real-time:', data);
                });
            })
            .catch(error => {
                console.error('Error initializing responsibilities editor:', error);
            });

        ClassicEditor
            .create(document.querySelector('#requirements'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                minHeight: '300px'
            })
            .then(editor => {
                window.requirementsEditor = editor;
                console.log('Requirements editor initialized');
                
                // Set minimum height for the editing area
                const editingView = editor.editing.view;
                editingView.change(writer => {
                    writer.setStyle('min-height', '300px', editingView.document.getRoot());
                });
                
                // Real-time sync: Update textarea whenever content changes
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#requirements').value = data;
                    console.log('Requirements synced in real-time:', data);
                });
            })
            .catch(error => {
                console.error('Error initializing requirements editor:', error);
            });
    } else {
        console.log('CKEditor not loaded, using simple textareas');
    }

    // Auto-generate slug from title
    const titleInput = document.querySelector('input[name="title"]');
    const slugInput = document.querySelector('input[name="slug"]');
    
    titleInput.addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        slugInput.value = slug;
    });

    // Country-City dependency
    const countrySelect = document.getElementById('country_id');
    const citySelect = document.getElementById('city_id');
    
    countrySelect.addEventListener('change', function() {
        const countryId = this.value;
        citySelect.innerHTML = '<option value="">Select City</option>';
        
        if (countryId) {
            fetch(`{{ route('getJobCities', '') }}/${countryId}`)
                .then(response => response.json())
                .then(cities => {
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.city_id;
                        option.textContent = city.city_name;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Form submission handling
    const form = document.querySelector('form');
    console.log('Edit form found:', form);
    
    form.addEventListener('submit', function(e) {
        console.log('Edit form submission started...');
        
        // Sync CKEditor content to form fields before submission
        if (window.descriptionEditor) {
            const descriptionData = window.descriptionEditor.getData();
            document.querySelector('#description').value = descriptionData;
            console.log('Description synced:', descriptionData);
        }
        
        console.log('Edit form submitting...');
        return true;
    });
});
</script>
@endsection
