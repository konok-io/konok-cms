@extends('admin.layouts.app')
@section('title', 'FAQs')
@section('content')
<div class="admin-page-header"><div><h1>FAQs</h1><p class="admin-breadcrumb mb-0">Manage frequently asked questions</p></div></div>
<div class="row">
    <div class="col-lg-4">
        <div class="admin-card mb-4">
            <div class="card-header-custom">Add New FAQ</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.faqs.store') }}" method="POST">@csrf
                    <div class="mb-3"><label class="form-label">Category</label><input type="text" name="category" class="form-control" placeholder="e.g. General"></div>
                    <div class="mb-3"><label class="form-label">Question *</label><input type="text" name="question" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Answer *</label><textarea name="answer" class="form-control" rows="3" required></textarea></div>
                    <div class="mb-3"><label class="form-label">Order</label><input type="number" name="order" class="form-control" value="0"></div>
                    <div class="mb-3"><div class="form-check"><input type="checkbox" name="is_active" class="form-check-input" value="1" checked><label class="form-check-label">Active</label></div></div>
                    <button type="submit" class="btn btn-primary w-100">Add FAQ</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Order</th><th>Category</th><th>Question</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                        @forelse($faqs as $faq)
                        <tr><td>{{ $faq->order }}</td><td>{{ $faq->category ?? '-' }}</td><td>{{ Str::limit($faq->question, 40) }}</td>
                            <td>@if($faq->is_active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                            <td><form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form></td>
                        </tr>
                        @empty<tr><td colspan="5" class="text-center text-muted py-4">No FAQs yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
