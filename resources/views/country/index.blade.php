@extends('Template')


@section('content')

<a href="{{route('country.create')}}" class="btn btn-w-m btn-primary mb-2"> Add New Country </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Country Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allCountry as $country)
        <tr>
            <td>{{$country->country_id}}</td>
            <td>{{$country->country_name}}</td>

            <td>
                @if ($country->country_status == 1)
                <span class="badge badge-primary">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
                @endif
            </td>
            <td>
              <a href="{{ route('country.edit', $country->country_id) }}" class="btn btn-primary">
    Edit
</a>


                <form action="{{ route('country.destroy', $country->country_id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this country?')">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- Pagination links --}}
<!-- {{ $allCountry->links() }}    simple next previous button use krny k liye -->

{{ $allCountry->links('pagination::bootstrap-4') }}   <!-- use for page number (1, 2 ,3) and includes arrow for next previous button -->

@endsection


