@extends('admin.layouts.app')
@section('title', 'Team Members')
@section('content')
<div class="admin-page-header">
    <div>
        <h1>Team Members</h1>
        <p class="admin-breadcrumb mb-0">Manage your team</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add New Member</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.team-members.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Team Type</label>
                        <select name="team_type" class="form-select">
                            <option value="">Select Type</option>
                            <option value="leadership">Leadership</option>
                            <option value="management">Management</option>
                            <option value="technical">Technical</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Bio</label>
                        <textarea name="short_bio" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="text" name="linkedin" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" class="form-check-input" value="1">
                            <label class="form-check-label">Featured</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" value="1" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Member</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teamMembers as $member)
                        <tr>
                            <td>{{ $member->order }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->designation ?? '-' }}</td>
                            <td>{{ ucfirst($member->team_type ?? '-') }}</td>
                            <td>
                                @if($member->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No team members yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
