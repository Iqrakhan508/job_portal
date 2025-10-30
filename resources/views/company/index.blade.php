@extends('template')

@section('content')

<a href="{{route('company.create')}}" class="btn btn-w-m btn-primary mb-2"> Add New Company </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Company Name</th>
            <th>Industry</th>
            <th>Location</th>
            <th>Company Size</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allCompany as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->industry ?? '-'}}</td>
            <td>{{$company->location ?? '-'}}</td>
            <td>{{$company->company_size ?? '-'}}</td>
            <td>{{ Str::limit($company->description, 50) }}</td>
            <td>
              <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">
    Edit
</a>


                <form action="{{ route('company.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- Pagination links --}}
<!-- {{ $allCompany->links() }}    simple next previous button use krny k liye -->

{{ $allCompany->links('pagination::bootstrap-4') }}   <!-- use for page number (1, 2 ,3) and includes arrow for next previous button -->

@endsection
