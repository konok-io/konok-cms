@extends('admin.layouts.app')
@section('title', 'Social Links')
@section('content')
<div class="admin-page-header"><div><h1>Social Links</h1><p class="admin-breadcrumb mb-0">Manage your social media links</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add New Link</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.social-links.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Platform *</label>
                        <select name="platform" class="form-select" required>
                            <option value="">Select Platform</option>
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">YouTube</option>
                            <option value="github">GitHub</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">URL *</label><input type="url" name="url" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div></div>
                    <button type="submit" class="btn btn-primary w-100">Add Link</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Order</th><th>Platform</th><th>URL</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($socialLinks as $link)
                        <tr><td>{{ $link->order }}</td><td><i class="{{ \App\Models\SocialLink::getPlatformIcon($link->platform) }}"></i> {{ ucfirst($link->platform) }}</td><td>{{ Str::limit($link->url, 30) }}</td>
                            <td>@if($link->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.social-links.destroy', $link->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="5" class="text-center text-muted py-4">No social links yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
