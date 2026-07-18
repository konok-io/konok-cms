@extends('admin.layouts.app')

@section('title', 'Industries')

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Industries</h1>
        <p class="admin-breadcrumb mb-0">Manage industry sections</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="admin-card mb-4">
            <div class="card-header-custom" id="form-title">Add New Industry</div>
            <div class="card-body-custom">
                <form action="{{ route('admin.industries.store') }}" method="POST" id="industry-form">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <input type="hidden" name="id" id="industry-id" value="">
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" id="industry-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon (Font Awesome class)</label>
                        <input type="text" name="icon" id="industry-icon" class="form-control" placeholder="e.g. fas fa-hospital">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="industry-description" class="form-control" rows="4" placeholder="Enter detailed description for the industry page..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" id="industry-order" class="form-control" value="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="industry-active" class="form-check-input" value="1" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" id="form-btn">Add Industry</button>
                    <button type="button" class="btn btn-secondary w-100 mt-2" id="cancel-btn" style="display:none;" onclick="cancelEdit()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($industries as $industry)
                        <tr>
                            <td>{{ $industry->order }}</td>
                            <td>
                                <strong>{{ $industry->name }}</strong>
                                @if($industry->description)
                                    <br><small class="text-muted">{{ Str::limit(strip_tags($industry->description), 50) }}</small>
                                @else
                                    <br><small class="text-danger">No description</small>
                                @endif
                            </td>
                            <td><i class="{{ $industry->icon ?? 'fas fa-industry' }}" style="color:#0A84FF"></i></td>
                            <td>
                                @if($industry->is_active)
                                    <span class="badge" style="background: rgba(48,209,88,0.1); color:#30D158;">Active</span>
                                @else
                                    <span class="badge" style="background: rgba(142,142,147,0.1); color:#8E8E93;">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="editIndustry({{ $industry->id }}, '{{ $industry->name }}', '{{ $industry->icon ?? '' }}', `{!! addslashes($industry->description ?? '') !!}`, {{ $industry->order }}, {{ $industry->is_active ? 'true' : 'false' }})">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this industry?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No industries yet. Add one from the form.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function editIndustry(id, name, icon, description, order, isActive) {
    document.getElementById('form-title').textContent = 'Edit Industry';
    document.getElementById('form-method').value = 'PUT';
    document.getElementById('industry-id').value = id;
    document.getElementById('industry-name').value = name;
    document.getElementById('industry-icon').value = icon;
    document.getElementById('industry-description').value = description;
    document.getElementById('industry-order').value = order;
    document.getElementById('industry-active').checked = isActive;
    document.getElementById('form-btn').textContent = 'Update Industry';
    document.getElementById('cancel-btn').style.display = 'block';
    
    // Update form action
    document.getElementById('industry-form').action = '/admin/industries/' + id;
    document.getElementById('industry-form').scrollIntoView({behavior: 'smooth'});
}

function cancelEdit() {
    document.getElementById('form-title').textContent = 'Add New Industry';
    document.getElementById('form-method').value = 'POST';
    document.getElementById('industry-id').value = '';
    document.getElementById('industry-name').value = '';
    document.getElementById('industry-icon').value = '';
    document.getElementById('industry-description').value = '';
    document.getElementById('industry-order').value = '0';
    document.getElementById('industry-active').checked = true;
    document.getElementById('form-btn').textContent = 'Add Industry';
    document.getElementById('cancel-btn').style.display = 'none';
    
    // Reset form action
    document.getElementById('industry-form').action = '{{ route('admin.industries.store') }}';
}
</script>
@endpush
