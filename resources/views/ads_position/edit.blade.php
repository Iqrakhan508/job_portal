@extends('Template')

@section('content')

<form method="POST" action="{{ route('ads_position.update', $adsPosition->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ads Position <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <select name="ads_position" class="form-control" required>
                <option value="">Select Position</option>
                @foreach($positions as $position)
                    <option value="{{ $position->ads_position_name }}" {{ old('ads_position', $adsPosition->ads_position) == $position->ads_position_name ? 'selected' : '' }}>
                        {{ ucfirst($position->ads_position_name) }}
                    </option>
                @endforeach
            </select>
            @error('ads_position') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ads Company <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <select name="ads_company" class="form-control" required>
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->company_name }}" {{ old('ads_company', $adsPosition->ads_company) == $company->company_name ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>
            @error('ads_company') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Ads Code <span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <textarea name="ads_code" class="form-control" rows="6" required>{{ old('ads_code', $adsPosition->ads_code) }}</textarea>
            @error('ads_code') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>

@endsection
