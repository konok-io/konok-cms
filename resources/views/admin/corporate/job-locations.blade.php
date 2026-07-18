@extends('admin.layouts.app')
@section('title', 'Job Locations')
@section('content')
<div class="admin-page-header"><div><h1>Job Locations</h1><p class="admin-breadcrumb mb-0">Manage job locations</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add Location</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.job-locations.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Name *</label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">City</label><input type="text" name="city" class="form-control"></div>
                    <div class="mb-3"><label class="form-label">Country</label><input type="text" name="country" class="form-control" value="Bangladesh"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_remote" class="form-check-input" value="1"><label class="form-check-label">Remote Available</label></div></div>
                    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div></div>
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Order</th><th>Name</th><th>City</th><th>Remote</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($locations as $loc)
                        <tr><td>{{ $loc->order }}</td><td>{{ $loc->name }}</td><td>{{ $loc->city ?? '-' }}</td>
                            <td>@if($loc->is_remote)<span class="badge bg-info">Yes</span>@else<span class="badge bg-secondary">No</span>@endif</td>
                            <td>@if($loc->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.job-locations.destroy', $loc->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="6" class="text-center text-muted py-4">No locations.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
