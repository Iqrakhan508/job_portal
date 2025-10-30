@extends('template')

@section('content')
<a href="{{ route('education_levels.create') }}" class="btn btn-w-m btn-primary mb-2"> Add New Education Level </a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->rank }}</td>
            <td>
                <a href="{{ route('education_levels.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('education_levels.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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



