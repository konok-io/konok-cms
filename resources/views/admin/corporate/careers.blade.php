@extends('admin.layouts.app')
@section('title', 'Careers')
@section('content')
<div class="admin-page-header"><div><h1>Job Listings</h1><p class="admin-breadcrumb mb-0">Manage career opportunities</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add Job Listing</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.careers.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Title *</label><input type="text" name="title" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Employment Type</label>
                        <select name="employment_type" class="form-select">
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Experience Level</label>
                        <select name="experience_level" class="form-select">
                            <option value="entry">Entry Level</option>
                            <option value="mid">Mid Level</option>
                            <option value="senior">Senior Level</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Short Description</label><textarea name="short_description" class="form-control" rows="2"></textarea></div>
                    <div class="mb-3"><label class="form-label">Requirements</label><textarea name="requirements" class="form-control" rows="2"></textarea></div>
                    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_featured" class="form-check-input" value="1"><label class="form-check-label">Featured</label></div></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div></div>
                    <button type="submit" class="btn btn-primary w-100">Add Job</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Order</th><th>Title</th><th>Type</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($careers as $career)
                        <tr><td>{{ $career->order }}</td><td>{{ $career->title }}</td><td>{{ ucfirst(str_replace('-', ' ', $career->employment_type ?? 'full-time')) }}</td>
                            <td>@if($career->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="5" class="text-center text-muted py-4">No job listings.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
