@extends('Template')

@section('content')

<a href="{{route('skill.create')}}" class="btn btn-w-m btn-primary mb-2"> Add New Skill </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Skill Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allSkill as $skill)
        <tr>
            <td>{{$skill->id}}</td>
            <td>{{$skill->name}}</td>
            <td>
              <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-primary">
    Edit
</a>


                <form action="{{ route('skill.destroy', $skill->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this skill?')">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{-- Pagination links --}}
<!-- {{ $allSkill->links() }}    simple next previous button use krny k liye -->

{{ $allSkill->links('pagination::bootstrap-4') }}   <!-- use for page number (1, 2 ,3) and includes arrow for next previous button -->

@endsection
