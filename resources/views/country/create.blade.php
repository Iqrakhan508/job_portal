@extends('template')

@section('content')

<form method="POST" action="{{ route('country.store') }}">
    @csrf

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Country Name</label>
        <div class="col-lg-10">
            <input type="text" name="country_name" class="form-control"
                   value="{{ old('country_name') }}">
            
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>

@endsection
