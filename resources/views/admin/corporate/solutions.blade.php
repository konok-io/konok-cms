@extends('admin.layouts.app')

@section('title', 'Solutions')

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Solutions</h1>
        <p class="admin-breadcrumb mb-0">Manage business solutions</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add New Solution</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.solutions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="">Select Type</option>
                            <option value="ERP">ERP</option>
                            <option value="CRM">CRM</option>
                            <option value="POS">POS</option>
                            <option value="HRM">HRM</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Cloud">Cloud</option>
                            <option value="AI">AI</option>
                            <option value="Cyber Security">Cyber Security</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2"></textarea>
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
                    <button type="submit" class="btn btn-primary w-100">Add Solution</button>
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
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($solutions as $solution)
                        <tr>
                            <td>{{ $solution->order }}</td>
                            <td>{{ $solution->name }}</td>
                            <td>{{ $solution->type ?? '-' }}</td>
                            <td>
                                @if($solution->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.solutions.destroy', $solution->id) }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="text-center text-muted py-4">No solutions yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
