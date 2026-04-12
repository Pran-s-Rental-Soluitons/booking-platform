@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Vehicle: {{ $vehicle->name }}</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Vehicle Name *</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name', $vehicle->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $vehicle->image_url) }}">
                        @if($vehicle->image_url)
                            <div class="mt-2">
                                <img src="{{ $vehicle->image_url }}" alt="{{ $vehicle->name }}" style="height:80px;border-radius:8px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Price per KM (₹) *</label>
                            <input type="number" name="price_per_km" class="form-control" required step="0.01" value="{{ old('price_per_km', $vehicle->price_per_km) }}">
                        </div>
                        <div class="col-md-4">
                            <label>Rating</label>
                            <input type="number" name="rating" class="form-control" step="0.1" min="0" max="5" value="{{ old('rating', $vehicle->rating) }}">
                        </div>
                        <div class="col-md-4">
                            <label>Reviews Count</label>
                            <input type="number" name="reviews_count" class="form-control" value="{{ old('reviews_count', $vehicle->reviews_count) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Best For</label>
                        <input type="text" name="best_for" class="form-control" value="{{ old('best_for', $vehicle->best_for) }}">
                    </div>

                    <div class="form-group">
                        <label>Features (one per line)</label>
                        <textarea name="features_text" class="form-control" rows="4">{{ old('features_text', $vehicle->features ? implode("\n", $vehicle->features) : '') }}</textarea>
                        <small class="text-muted">Enter each feature on a new line</small>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured', $vehicle->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Mark as Most Popular (Featured)</label>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary mr-2">Update Vehicle</button>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
