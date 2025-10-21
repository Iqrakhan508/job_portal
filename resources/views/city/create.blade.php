@extends('Template')


@section('content')



<form method="POST" action="{{ route('city.store') }}">
    @csrf

    <div class="form-group row"><label class="col-lg-2 col-form-label">Country Name</label>

        <div class="col-lg-10">
           <select name="country" class="form-control">
    <option value="">Select Country</option>
    @foreach($allCountry as $country)
        <option value="{{ $country->country_id }}"
            @if (old('country') == $country->country_id) selected @endif>
            {{ $country->country_name }}
        </option>
    @endforeach
</select>

        </div>
    </div>


    <div class="form-group row"><label class="col-lg-2 col-form-label">City Name</label>

        <div class="col-lg-10"><input type="" name="city" class="form-control" value="{{ old('city') }}">
        </div>
    </div>




    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" name="submit" type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection