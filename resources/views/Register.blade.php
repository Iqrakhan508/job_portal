<!DOCTYPE html>
<html>
<head>
    <title>Laravel Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card p-4">
            <h3 class="text-center">Register</h3>


            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="userName" class="form-control" value="{{ old('userName') }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_no" class="form-control" value="{{ old('phone_no') }}">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select name="country" id="countryList" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($allCountry as $country)
                            <option value="{{ $country->country_id }}" {{ old('country') == $country->country_id ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <select name="city" class="form-control">
                        <option value="">Select City</option>
                        @foreach($allCity as $city)
                            <option value="{{ $city->city_id }}" {{ old('city') == $city->city_id ? 'selected' : '' }}>
                                {{ $city->city_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <a href="" class="btn btn-link btn-block">Already have an account? Login</a>

                  <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Click Here To Login</a>

            </form>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $('#countryList').change(function() {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: '{{ route("getCities", "") }}/' + country_id,
                type: 'GET',
                success: function(data) {
                    var cityDropdown = $('select[name="city"]');
                    cityDropdown.empty();
                    cityDropdown.append('<option value="">Select City</option>');
                    $.each(data, function(key, city) {
                        cityDropdown.append('<option value="'+ city.city_id +'">'+ city.city_name +'</option>');
                    });
                }
            });
        } else {
            $('select[name="city"]').empty().append('<option value="">Select City</option>');
        }
    });
});
</script>

</body>
</html>
