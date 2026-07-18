@extends('admin.layouts.app')
@section('title', 'Job Departments')
@section('content')
<div class="admin-page-header"><div><h1>Job Departments</h1><p class="admin-breadcrumb mb-0">Manage job departments</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add Department</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.job-departments.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Name *</label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="2"></textarea></div>
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
                    <thead><tr><th>Order</th><th>Name</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($departments as $d)
                        <tr><td>{{ $d->order }}</td><td>{{ $d->name }}</td>
                            <td>@if($d->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.job-departments.destroy', $d->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="4" class="text-center text-muted py-4">No departments.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
