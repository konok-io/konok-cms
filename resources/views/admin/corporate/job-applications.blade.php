@extends('admin.layouts.app')
@section('title', 'Job Applications')
@section('content')
<div class="admin-page-header"><div><h1>Job Applications</h1><p class="admin-breadcrumb mb-0">View job applications</p></div></div>
<div class="admin-card">
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Date</th><th>Name</th><th>Email</th><th>Job</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>{{ $app->created_at->format('d M Y') }}</td>
                    <td>{{ $app->full_name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->career?->title ?? '-' }}</td>
                    <td><span class="badge {{ $app->status_badge ?? 'bg-secondary' }}">{{ ucfirst($app->status ?? 'pending') }}</span></td>
                    <td>
                        @if($app->resume)
                        <a href="{{ asset('storage/' . $app->resume) }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="fa-solid fa-download"></i></a>
                        @endif
                        <form action="{{ route('admin.job-applications.destroy', $app->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i></button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No applications yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
