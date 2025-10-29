@extends('Template')

@section('content')
<a href="{{ route('jobs.create') }}" class="btn btn-w-m btn-primary mb-2"> Add New Job </a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Title</th>
            <th>Category</th>
            <th>Location</th>
            <th>Type</th>
            <th>Skills</th>
            <th>Salary</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
            <td>{{ $item->city ? $item->city->city_name : 'N/A' }}, {{ $item->country ? $item->country->country_name : 'N/A' }}</td>
            <td>{{ $item->jobType ? $item->jobType->name : 'N/A' }}</td>
            <td>
                @if($item->skills->count() > 0)
                    @foreach($item->skills as $skill)
                        <span class="badge badge-info">{{ $skill->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No skills specified</span>
                @endif
            </td>
            <td>{{ $item->formatted_salary }}</td>
            <td>
                @if($item->is_active)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                @if($item->is_remote)
                    <span class="badge badge-info">Remote</span>
                @endif
            </td>
            <td>
                <a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('jobs.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $all->links('pagination::bootstrap-4') }}
@endsection
