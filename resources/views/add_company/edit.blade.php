@extends('Template')

@section('content')

<form method="POST" action="{{ route('add_company.update', $company->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ads Company Name <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $company->company_name) }}" required>
            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ads Code <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <textarea name="code" class="form-control" rows="4" required>{{ old('code', $company->code) }}</textarea>
            @error('code') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Is Auto</label>
        <div class="col-lg-10">
            <div class="form-check">
                <input type="checkbox" name="is_auto" value="1" class="form-check-input" id="is_auto" {{ old('is_auto', $company->is_auto) == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="is_auto">
                    Yes
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Active <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <select name="active" class="form-control" required>
                <option value="">Select Status</option>
                <option value="1" {{ old('active', $company->active) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('active', $company->active) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('active') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>

@endsection
