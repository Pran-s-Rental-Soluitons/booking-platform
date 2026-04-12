@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Trip Posters</h4>
                    <a href="{{ route('trip-posters.create') }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Add Trip Poster
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    @forelse($posters as $poster)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <img src="{{ asset('storage/' . $poster->poster_image) }}" alt="{{ $poster->title }}" style="width:100%;height:250px;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $poster->title }}</h5>
                                <p class="card-text text-muted">
                                    <i class="mdi mdi-phone"></i> {{ $poster->call_number }}
                                </p>
                                <p>
                                    Status:
                                    @if($poster->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </p>
                                <form action="{{ route('trip-posters.destroy', $poster->id) }}" method="POST" onsubmit="return confirm('Delete this poster?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5 text-muted">
                            <i class="mdi mdi-image-off" style="font-size:48px;"></i>
                            <p class="mt-3">No trip posters yet. <a href="{{ route('trip-posters.create') }}">Add the first one!</a></p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
