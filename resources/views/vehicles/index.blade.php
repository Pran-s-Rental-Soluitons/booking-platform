@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Vehicle Management</h4>
                    <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Add Vehicle
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

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price/KM</th>
                                <th>Rating</th>
                                <th>Reviews</th>
                                <th>Featured</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicles as $v)
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>
                                    @if($v->image_url)
                                        <img src="{{ $v->image_url }}" alt="{{ $v->name }}" style="width:60px;height:40px;object-fit:cover;border-radius:5px;">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $v->name }}</td>
                                <td>₹{{ $v->price_per_km }}</td>
                                <td>{{ $v->rating }}</td>
                                <td>{{ $v->reviews_count }}</td>
                                <td>
                                    @if($v->is_featured)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-secondary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('vehicles.edit', $v->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('vehicles.destroy', $v->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this vehicle?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No vehicles added yet. <a href="{{ route('vehicles.create') }}">Add one now</a></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
