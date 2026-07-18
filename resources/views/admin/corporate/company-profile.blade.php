@extends('admin.layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="admin-page-header">
    <div>
        <h1>Company Profile</h1>
        <p class="admin-breadcrumb mb-0">Manage your company information</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <form action="{{ route('admin.company-profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body-custom">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Company Name *</label>
                            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $profile->company_name ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Short Name</label>
                            <input type="text" name="short_name" class="form-control" value="{{ old('short_name', $profile->short_name ?? '') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $profile->tagline ?? '') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $profile->description ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Vision</label>
                            <textarea name="vision" class="form-control" rows="3">{{ old('vision', $profile->vision ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mission</label>
                            <textarea name="mission" class="form-control" rows="3">{{ old('mission', $profile->mission ?? '') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Founded Year</label>
                            <input type="text" name="founded_year" class="form-control" value="{{ old('founded_year', $profile->founded_year ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Employees Count</label>
                            <input type="number" name="employees_count" class="form-control" value="{{ old('employees_count', $profile->employees_count ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" class="form-control" value="{{ old('website', $profile->website ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email ?? '') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address', $profile->address ?? '') }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ ($profile->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer-custom">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-2"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
