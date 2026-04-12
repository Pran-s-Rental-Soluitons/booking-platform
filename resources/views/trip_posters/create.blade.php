@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Trip Poster</h4>
                <p class="card-description text-muted">Upload a poster image for a special trip package. Customers will see a "Book Now (Call)" button linking to your phone number.</p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('trip-posters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Trip Title *</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Goa Weekend Package" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>Poster Image * <small class="text-muted">(JPG/PNG, max 5MB)</small></label>
                        <div class="custom-file">
                            <input type="file" name="poster_image" class="custom-file-input" id="posterImageInput" accept="image/*" required>
                            <label class="custom-file-label" for="posterImageInput">Choose poster image...</label>
                        </div>
                        <div id="imagePreview" class="mt-3" style="display:none;">
                            <img id="previewImg" src="" alt="Preview" style="max-height:250px;border-radius:10px;box-shadow:0 4px 15px rgba(0,0,0,0.15);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contact/Call Number *</label>
                        <input type="text" name="call_number" class="form-control" required placeholder="e.g. +919876543210" value="{{ old('call_number') }}">
                        <small class="text-muted">This number will be called when customer taps "Book Now"</small>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="is_active">Show on homepage (Active)</label>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary mr-2">
                            <i class="mdi mdi-upload"></i> Upload & Publish
                        </button>
                        <a href="{{ route('trip-posters.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card" style="background: linear-gradient(135deg, #9A18FF11, #5C0E9911); border: 1px solid #9A18FF33;">
            <div class="card-body">
                <h5 class="card-title" style="color: #9A18FF;"><i class="mdi mdi-information"></i> How it works</h5>
                <ul class="mt-3" style="padding-left:18px; line-height: 2;">
                    <li>Upload a <strong>vertical poster</strong> (portrait) for best display</li>
                    <li>Add the title that will appear below the poster</li>
                    <li>Enter your <strong>WhatsApp / call number</strong></li>
                    <li>Customers tap <strong>"Book Now (Call)"</strong> to call you directly</li>
                    <li>Toggle <strong>Active/Inactive</strong> to show/hide on the homepage</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('posterImageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const label = document.querySelector('.custom-file-label');
        label.textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(evt) {
            document.getElementById('previewImg').src = evt.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
