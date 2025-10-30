@extends('template')

@section('content')

<a href="{{route('ads_company.create')}}" class="btn btn-w-m btn-primary mb-2"> Ads New Company </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 8%;">Sr #</th>
            <th style="width: 20%;">Company Name</th>
            <th style="width: 35%;">Code</th>
            <th style="width: 10%;">Is Auto</th>
            <th style="width: 10%;">Status</th>
            <th style="width: 17%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allCompanies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>
            <td style="word-break: break-all; font-size: 12px;">{{$company->code}}</td>
            <td>
                @if ($company->is_auto == 1)
                <span class="badge badge-success">Yes</span>
                @else
                <span class="badge badge-secondary">No</span>
                @endif
            </td>
            <td>
                @if ($company->active == 1)
                <span class="badge badge-primary">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
                @endif
            </td>
            <td>
                <a href="{{ route('ads_company.edit', $company->id) }}">
                    <button class="btn btn-primary btn-sm">Edit</button>
                </a>

                <form action="{{ route('ads_company.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Pagination links --}}
{{ $allCompanies->links('pagination::bootstrap-4') }}
@endsection
