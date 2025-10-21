@extends('Template')

@section('content')

<form method="POST" action="{{ route('company.store') }}">
    @csrf

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Company Name</label>
        <div class="col-lg-10">
            <input type="text" name="name" class="form-control"
                   value="{{ old('name') }}">
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Website</label>
        <div class="col-lg-10">
            <input type="text" name="website" class="form-control"
                   value="{{ old('website') }}">
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Description</label>
        <div class="col-lg-10">
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>

@endsection
