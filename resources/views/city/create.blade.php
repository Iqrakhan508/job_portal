@extends('template')


@section('content')



<form method="POST" action="{{ route('city.store') }}">
    @csrf

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Country Name</label>
        <div class="col-lg-10">
            <select name="country" class="form-control">
                <option value="">Select Country</option>
                @foreach($allCountry as $country)
                    <option value="{{ $country->country_id }}"
                        @if (old('country', 1) == $country->country_id) selected @endif>
                        {{ $country->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row"><label class="col-lg-2 col-form-label">City Name</label>

        <div class="col-lg-10"><input type="text" name="city" class="form-control" value="{{ old('city') }}">
        </div>
    </div>

    <div class="form-group row"><label class="col-lg-2 col-form-label">City Description</label>

        <div class="col-lg-10">
            <textarea name="city_description" id="city_description" class="form-control" rows="6">{{ old('city_description') }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" name="submit" type="submit">Submit</button>
        </div>
    </div>
</form>

@endsection

@section('scripts')
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor for city description
    if (typeof ClassicEditor !== 'undefined') {
        ClassicEditor
            .create(document.querySelector('#city_description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
                minHeight: '500px'
            })
            .then(editor => {
                window.cityDescriptionEditor = editor;
                console.log('City description editor initialized');
                
                // Set minimum height for the editing area
                const editingView = editor.editing.view;
                editingView.change(writer => {
                    writer.setStyle('min-height', '500px', editingView.document.getRoot());
                });
                
                // Real-time sync: Update textarea whenever content changes
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#city_description').value = data;
                });
            })
            .catch(error => {
                console.error('Error initializing city description editor:', error);
            });
    }
});
</script>
@endsection