@extends('Template')


@section('content')


<a href="{{route('city.create')}}" class="btn btn-w-m btn-primary mb-2"> Add New City </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>City Name</th>
            <th>Description</th>
            <th>Country</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($allCity as $city)
        <tr>
            <td>{{$city->city_id}}</td>
            <td>{{$city->city_name}}</td>
            <td>{!! Str::limit(strip_tags($city->city_description), 50) !!}</td>
            <td>{{$city->iqraKhan->country_name}}</td>
            <td>
                @if ($city->city_status == 1)
                <span class="badge badge-primary">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
                @endif
            </td>
            <td>
                <a href="{{ route('city.edit', $city->city_id) }}">
                    <button class="btn btn-primary">Edit</button>
                </a>


                <form action="{{ route('city.destroy', $city->city_id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this city?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Pagination links --}}
<!-- {{ $allCity->links() }} -->
{{ $allCity->links('pagination::bootstrap-4') }}
@endsection