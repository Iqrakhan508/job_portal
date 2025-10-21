@extends('Template')

@section('content')
<form method="POST" action="{{ route('job_types.store') }}">
    @csrf
    <div class="form-group row"><label class="col-lg-2 col-form-label">Name</label>
        <div class="col-lg-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection



