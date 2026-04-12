@extends('layouts.adminpanel')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Leads / Local Registration Inquiries</h4>
                <p class="card-description">
                    List of all data collected from login/registration forms.
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td><span class="badge badge-info">{{ ucfirst(str_replace('_', ' ', $lead->type)) }}</span></td>
                                <td>{{ $lead->created_at->format('d M Y, h:i A') }}</td>
                                <td>{{ $lead->details }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $leads->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
