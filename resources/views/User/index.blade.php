@extends('Template')


@section('content')
<a href="{{route('Register')}}" class="btn btn-w-m btn-primary mb-2"> Add New User </a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr #</th>
            <th>Name (Accessor Applied)</th>
            <!-- <th>Database Original Value</th> -->
            <th>Email</th>
            <th>Country</th>
            <th>City</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allUser as $user)
        <tr>
            <td> {{$user->user_id}}</td>
            <td>{{$user->user_name}}</td> <!-- Accessor ka effect -->
            <!-- <td>{{ \DB::table('users')->where('user_id', $user->user_id)->value('user_name') }}</td> Original DB value -->

            <td>{{$user->user_email}}</td>
            <td>{{ $user->countryNAME->country_name ?? 'N/A' }}</td> {{-- Safe fallback --}}
            <td>{{ $user->cityNAME->city_name ?? 'N/A' }}</td> <!-- Agar record hai to city_name dikhayega, warna 'N/A' dikhayega. -->

            <!-- <td>{{$user->city_id}}</td> -->
            <td>{{$user->user_status}}</td>
            <td>
                <a href="{{ route('users.edit', $user->user_id) }}">
                    <button class="btn btn-primary">Edit</button>
                </a>

                <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>


{{-- Pagination links --}}

{{ $allUser->links('pagination::bootstrap-4') }}
@endsection