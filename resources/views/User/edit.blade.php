@extends('Template')

@section('content')

  
<form method="POST" action="{{ route('users.update', $user->user_id) }}">
    @csrf
    @method('PUT')

    <div class="row form-group">
        <label class="col-lg-2">User Name</label>
        <input type="text" maxlength="50" 
            class="form-control col-lg-10" 
            name="name" 
            value="{{ old('name', $user->user_name) }}">
    </div>

    <div class="row form-group">
        <label class="col-lg-2">Email</label>
        <input type="email" class="col-lg-10 form-control" 
            name="email" 
            value="{{ old('email', $user->user_email) }}">
    </div>

    <div class="row form-group">
        <label class="col-lg-2">Phone Number</label>
        <input type="number" class="col-lg-10 form-control" 
            name="phone_no" 
            value="{{ old('phone_no', $user->user_phone_no) }}">
    </div>

    <div class="row form-group">
        <label class="col-lg-2">Address</label>
        <input type="text" class="col-lg-10 form-control" 
            name="address" 
            value="{{ old('address', $user->user_address) }}">
    </div>

   <div class="row form-group">
    <label class="col-lg-2">Country</label>
    <select name="country" class="col-lg-10 form-control" id="countryList">
        <option value="">Select Country</option>
        @foreach($allCountry as $country)
            <option value="{{ $country->country_id }}" 
                {{ old('country', $user->country_id ?? '') == $country->country_id ? 'selected' : '' }}>
                {{ $country->country_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="row form-group">
    <label class="col-lg-2">City</label>
    <select name="city" class="col-lg-10 form-control" id="cityList">
        <option value="">Select City</option>
        @foreach($allCity as $city)
            <option value="{{ $city->city_id }}" 
                {{ old('city', $user->city_id ?? '') == $city->city_id ? 'selected' : '' }}>
                {{ $city->city_name }}
            </option>
        @endforeach
    </select>
</div>


    <div class="row form-group">
        <label class="col-lg-2">Status</label>
        <select name="status" class="col-lg-10 form-control">
            <option value="">Select Status</option>
            <option value="1" {{ $user->user_status == 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $user->user_status == 2 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Update</button>
        </div>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {
    $('#countryList').change(function() {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: '{{ route("getCities", "") }}/' + country_id,
                type: 'GET',
                success: function(data) {
                    var cityDropdown = $('#cityList');
                    cityDropdown.empty();
                    cityDropdown.append('<option value="">Select City</option>');
                    $.each(data, function(key, city) {
                        cityDropdown.append('<option value="'+city.city_id+'">'+city.city_name+'</option>');
                    });
                }
            });
        }
    });
});
</script>
@endsection