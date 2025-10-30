@extends('template')

@section('content')
<a href="{{ route('job_categories.create') }}" class="btn btn-w-m btn-primary mb-2"> Add New Job Category </a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <a href="{{ route('job_categories.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('job_categories.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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


