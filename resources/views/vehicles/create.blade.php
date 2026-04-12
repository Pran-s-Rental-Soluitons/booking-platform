@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Vehicle</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vehicles.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Vehicle Name *</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Tempo Traveller" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="url" name="image_url" class="form-control" placeholder="https://example.com/image.jpg" value="{{ old('image_url') }}">
                        <small class="text-muted">Paste a direct image link (jpg/png/webp)</small>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Price per KM (₹) *</label>
                            <input type="number" name="price_per_km" class="form-control" required step="0.01" placeholder="15" value="{{ old('price_per_km') }}">
                        </div>
                        <div class="col-md-4">
                            <label>Rating</label>
                            <input type="number" name="rating" class="form-control" step="0.1" min="0" max="5" placeholder="4.5" value="{{ old('rating', 4.5) }}">
                        </div>
                        <div class="col-md-4">
                            <label>Reviews Count</label>
                            <input type="number" name="reviews_count" class="form-control" placeholder="985" value="{{ old('reviews_count', 0) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Best For</label>
                        <input type="text" name="best_for" class="form-control" placeholder="e.g. Large groups & tours" value="{{ old('best_for') }}">
                    </div>

                    <div class="form-group">
                        <label>Features (one per line)</label>
                        <textarea name="features_text" class="form-control" rows="4" placeholder="🪑 12 Seats&#10;💺 Maximum space&#10;🪑 Reclining seats&#10;🎵 Entertainment system">{{ old('features_text') }}</textarea>
                        <small class="text-muted">Enter each feature on a new line</small>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Mark as Most Popular (Featured)</label>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary mr-2">Save Vehicle</button>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
