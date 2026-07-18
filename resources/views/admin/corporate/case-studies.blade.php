@extends('admin.layouts.app')
@section('title', 'Case Studies')
@section('content')
<div class="admin-page-header"><div><h1>Case Studies</h1><p class="admin-breadcrumb mb-0">Manage case studies</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add New Case Study</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.case-studies.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Title *</label><input type="text" name="title" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Client Name</label><input type="text" name="client_name" class="form-control"></div>
                    <div class="mb-3"><label class="form-label">Industry</label><input type="text" name="industry" class="form-control"></div>
                    <div class="mb-3"><label class="form-label">Challenge</label><textarea name="challenge" class="form-control" rows="2"></textarea></div>
                    <div class="mb-3"><label class="form-label">Solution</label><textarea name="solution" class="form-control" rows="2"></textarea></div>
                    <div class="mb-3"><label class="form-label">Results</label><textarea name="results" class="form-control" rows="2"></textarea></div>
                    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div></div>
                    <button type="submit" class="btn btn-primary w-100">Add Case Study</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Order</th><th>Title</th><th>Client</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($caseStudies as $cs)
                        <tr><td>{{ $cs->order }}</td><td>{{ $cs->title }}</td><td>{{ $cs->client_name ?? '-' }}</td>
                            <td>@if($cs->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.case-studies.destroy', $cs->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="5" class="text-center text-muted py-4">No case studies yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
