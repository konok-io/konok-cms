@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="admin-page-header">
    <div>
        <h1>Dashboard</h1>
        <p class="admin-breadcrumb mb-0">Welcome back, {{ auth()->user()->name }} 👋</p>
    </div>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-diagram-project"></i></div>
            <div>
                <div class="stat-value">{{ $stats['projects'] }}</div>
                <div class="stat-label">Total Projects</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-briefcase"></i></div>
            <div>
                <div class="stat-value">{{ $stats['services'] }}</div>
                <div class="stat-label">Total Services</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-chart-simple"></i></div>
            <div>
                <div class="stat-value">{{ $stats['skills'] }}</div>
                <div class="stat-label">Total Skills</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-quote-left"></i></div>
            <div>
                <div class="stat-value">{{ $stats['testimonials'] }}</div>
                <div class="stat-label">Total Testimonials</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-newspaper"></i></div>
            <div>
                <div class="stat-value">{{ $stats['blogs'] }}</div>
                <div class="stat-label">Total Blogs</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-envelope"></i></div>
            <div>
                <div class="stat-value">{{ $stats['messages'] }}</div>
                <div class="stat-label">Messages ({{ $stats['unread_messages'] }})</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-users"></i></div>
            <div>
                <div class="stat-value">{{ $stats['team_members'] }}</div>
                <div class="stat-label">Team Members</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-handshake"></i></div>
            <div>
                <div class="stat-value">{{ $stats['partners'] }}</div>
                <div class="stat-label">Partners</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-user-tie"></i></div>
            <div>
                <div class="stat-value">{{ $stats['clients'] }}</div>
                <div class="stat-label">Clients</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-envelope-open-text"></i></div>
            <div>
                <div class="stat-value">{{ $stats['subscribers'] }}</div>
                <div class="stat-label">Subscribers</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(10,132,255,0.1); color:#0A84FF;"><i class="fa-solid fa-eye"></i></div>
            <div>
                <div class="stat-value">{{ $stats['visitors'] }}</div>
                <div class="stat-label">Total Visitors</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(191,90,242,0.1); color:#BF5AF2;"><i class="fa-solid fa-calendar-day"></i></div>
            <div>
                <div class="stat-value">{{ $stats['visitors_today'] }}</div>
                <div class="stat-label">Visitors Today</div>
            </div>
        </div>
    </div>
</div>

{{-- Charts Row --}}
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header-custom">Visitor Trend (Last 14 Days)</div>
            <div class="card-body-custom">
                <canvas id="visitorChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="card-header-custom">Browser Breakdown</div>
            <div class="card-body-custom">
                <canvas id="browserChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Content Row --}}
<div class="row g-3 mb-4">
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-diagram-project me-2" style="color:#0A84FF;"></i>Recent Projects</span>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm" style="background:#0A84FF;color:#fff;">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-admin mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProjects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td><span class="badge" style="background: rgba(10,132,255,0.1); color:#0A84FF;">{{ str_replace('_',' ',$project->status) }}</span></td>
                                <td>{{ $project->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">No projects yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-newspaper me-2" style="color:#BF5AF2;"></i>Recent Blogs</span>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-sm" style="background:#BF5AF2;color:#fff;">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-admin mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBlogs as $blog)
                            <tr>
                                <td>{{ Str::limit($blog->title, 30) }}</td>
                                <td><span class="badge" style="background: rgba(191,90,242,0.1); color:#BF5AF2;">{{ $blog->category->name ?? 'Uncategorized' }}</span></td>
                                <td>{{ $blog->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">No blogs yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Messages Row --}}
<div class="row g-3">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-envelope me-2" style="color:#0A84FF;"></i>Recent Messages</span>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm" style="background:#BF5AF2;color:#fff;">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-admin mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentMessages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ Str::limit($message->message, 40) }}</td>
                                <td>
                                    @if(!$message->is_read)
                                        <span class="badge" style="background: rgba(10,132,255,0.1); color:#0A84FF;">New</span>
                                    @else
                                        <span class="badge" style="background: rgba(191,90,242,0.1); color:#BF5AF2;">Read</span>
                                    @endif
                                </td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted py-4">No messages yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- License Information --}}
@isset($license)
<div class="row g-3 mt-4">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-header-custom d-flex align-items-center justify-content-between">
                <span><i class="fa-solid fa-key me-2" style="color:#0A84FF;"></i>License Information</span>
                @if(($license['ready'] ?? false) && ($license['status'] ?? '') !== '')
                    @php
                        $st = strtolower($license['status'] ?? 'unknown');
                        $badge = match($st) {
                            'active'  => 'success',
                            'grace'   => 'warning',
                            'expired', 'blocked', 'verification_failed' => 'danger',
                            'pending' => 'secondary',
                            default   => 'secondary',
                        };
                    @endphp
                    <span class="badge bg-{{ $badge }} text-uppercase">{{ $st }}</span>
                @endif
            </div>
            <div class="card-body-custom">
                @if(! ($license['ready'] ?? false))
                    <div class="text-muted">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        License package detected, but not set up yet. Run
                        <code>php artisan mrh-license:install</code> to activate.
                    </div>
                @else
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 border h-100">
                                <div class="small text-muted mb-1">Expires On</div>
                                <div class="h5 mb-1">
                                    {{ $license['expires_at'] ? $license['expires_at']->format('d M Y') : 'No expiry' }}
                                </div>
                                @if(!is_null($license['days_left']))
                                    @php $dl = (int) $license['days_left']; @endphp
                                    @if($dl > 0)
                                        <span class="badge" style="background: rgba(10,132,255,0.1); color:#0A84FF;">{{ $dl }} day{{ $dl === 1 ? '' : 's' }} left</span>
                                    @elseif($dl === 0)
                                        <span class="badge" style="background: rgba(191,90,242,0.1); color:#BF5AF2;">Expires today</span>
                                    @else
                                        <span class="badge" style="background: rgba(10,132,255,0.1); color:#0A84FF;">Expired {{ abs($dl) }} day{{ abs($dl) === 1 ? '' : 's' }} ago</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 border h-100">
                                <div class="small text-muted mb-1">Last Verified</div>
                                <div class="mb-2">{{ $license['last_verified_at'] ? $license['last_verified_at']->diffForHumans() : 'Never' }}</div>
                                <div class="small text-muted mb-1">Activated</div>
                                <div>
                                    @if($license['activated'])
                                        <span style="color:#30D158;"><i class="fa-solid fa-circle-check me-1"></i>Yes</span>
                                    @else
                                        <span style="color:#FF453A;"><i class="fa-solid fa-circle-xmark me-1"></i>No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3 border h-100">
                                <div class="small text-muted mb-1">Server Type</div>
                                <div class="mb-2 text-capitalize">{{ $license['server_type'] ?? '—' }}</div>
                                <div class="small text-muted mb-1">Domain</div>
                                <div class="text-break">{{ $license['normalized_domain'] ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-3 rounded-3 border" style="background: var(--bg-secondary);">
                                <div class="small text-muted mb-1">Installation ID</div>
                                <code class="text-break">{{ $license['installation_id'] ?? '—' }}</code>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endisset

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
    // Visitor Chart
    const visitorCtx = document.getElementById('visitorChart');
    if (visitorCtx) {
        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($visitorChart->pluck('date')) !!},
                datasets: [{
                    label: 'Visitors',
                    data: {!! json_encode($visitorChart->pluck('total')) !!},
                    borderColor: '#0A84FF',
                    backgroundColor: 'rgba(10,132,255,0.08)',
                    fill: true,
                    tension: 0.35,
                    pointRadius: 3,
                    pointBackgroundColor: '#0A84FF',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } }, x: { grid: { display: false } } }
            }
        });
    }
	
    // Browser Chart
    const browserCtx = document.getElementById('browserChart');
    if (browserCtx) {
        new Chart(browserCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($browserStats->pluck('browser')) !!},
                datasets: [{
                    data: {!! json_encode($browserStats->pluck('total')) !!},
                    backgroundColor: ['#0A84FF', '#BF5AF2', '#64D2FF', '#30D158', '#FF9F0A', '#FF375F'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 }, padding: 10 } } }
            }
        });
    }
</script>
@endpush
