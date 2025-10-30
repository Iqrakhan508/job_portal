@extends('template')

@section('content')

<a href="{{route('ads_position.create')}}" class="btn btn-w-m btn-primary mb-2"> Add New Ads Position </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 8%;">Sr #</th>
            <th style="width: 15%;">Ads Position</th>
            <th style="width: 20%;">Ads Company</th>
            <th style="width: 40%;">Ads Code</th>
            <th style="width: 17%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allAdsPositions as $adsPosition)
        <tr>
            <td>{{$adsPosition->id}}</td>
            <td>{{$adsPosition->ads_position}}</td>
            <td>{{$adsPosition->ads_company}}</td>
            <td style="word-break: break-all; font-size: 12px;">{{$adsPosition->ads_code}}</td>
            <td>
                <a href="{{ route('ads_position.edit', $adsPosition->id) }}">
                    <button class="btn btn-primary btn-sm">Edit</button>
                </a>

                <form action="{{ route('ads_position.destroy', $adsPosition->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ads position?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Pagination links --}}
{{ $allAdsPositions->links('pagination::bootstrap-4') }}
@endsection
