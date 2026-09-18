@extends('layouts.admin')

@section('title', 'Edit Franchise Page')

@section('content')
    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Edit Franchise Page</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.website-pages.index') }}" class="text-primary text-decoration-none">Website Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Franchise</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('franchise') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>View Live Franchise Page</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill fs-18"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
        @csrf

        <div class="row g-4">
            <!-- 1. Hero Section -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shop text-danger fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Franchise Hero & Headline</h6>
                        </div>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-11">Header Banner</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Tagline:</label>
                            <input type="text" name="franchise[hero_badge]" value="{{ old('franchise.hero_badge', $franchise['hero_badge'] ?? 'FRANCHISE PARTNERSHIP') }}" class="form-control form-control-sm modern-input" placeholder="FRANCHISE PARTNERSHIP">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Main Heading (Line-breaks enabled):</label>
                            <textarea name="franchise[hero_heading]" rows="2" class="form-control form-control-sm modern-input fw-bold" placeholder="BRING THE ORIGINAL TO YOUR CITY">{{ old('franchise.hero_heading', $franchise['hero_heading'] ?? "BRING THE ORIGINAL\nTO YOUR CITY") }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Subheading Tagline:</label>
                            <input type="text" name="franchise[hero_sub]" value="{{ old('franchise.hero_sub', $franchise['hero_sub'] ?? 'BECOME A GPO FRANCHISE PARTNER') }}" class="form-control form-control-sm modern-input" placeholder="BECOME A GPO FRANCHISE PARTNER">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Commercial Terms & Contact -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-graph-up-arrow text-success fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Investment & Partnership Desk</h6>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle fs-11">Commercials</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="row g-3">
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Expected ROI Period:</label>
                                <input type="text" name="franchise[roi_period]" value="{{ old('franchise.roi_period', $franchise['roi_period'] ?? '12 - 18 Months') }}" class="form-control form-control-sm modern-input" placeholder="12 - 18 Months">
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Investment Range:</label>
                                <input type="text" name="franchise[investment_range]" value="{{ old('franchise.investment_range', $franchise['investment_range'] ?? '₹15 Lakhs - ₹30 Lakhs') }}" class="form-control form-control-sm modern-input" placeholder="₹15 Lakhs - ₹30 Lakhs">
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Franchise Helpline Phone:</label>
                                <input type="text" name="franchise[phone]" value="{{ old('franchise.phone', $franchise['phone'] ?? '+91 91406 31433') }}" class="form-control form-control-sm modern-input" placeholder="+91 91406 31433">
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Franchise Desk Email:</label>
                                <input type="email" name="franchise[email]" value="{{ old('franchise.email', $franchise['email'] ?? 'franchise@gpokethandeydahibade.com') }}" class="form-control form-control-sm modern-input" placeholder="franchise@gpokethandeydahibade.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Pitch & Why Partner With Us -->
            <div class="col-12">
                <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-patch-check-fill text-warning fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Why Partner Section Pitch</h6>
                        </div>
                        <span class="badge bg-light text-muted border fs-11">Value Proposition</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                            <input type="text" name="franchise[why_heading]" value="{{ old('franchise.why_heading', $franchise['why_heading'] ?? 'WHY PARTNER WITH GPO?') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="WHY PARTNER WITH GPO?">
                        </div>
                        <div class="mb-0">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Value Description Pitch:</label>
                            <textarea name="franchise[why_desc]" rows="3" class="form-control form-control-sm modern-input" placeholder="Enter partnership description...">{{ old('franchise.why_desc', $franchise['why_desc'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5 mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                <i class="bi bi-cloud-check-fill fs-16"></i>
                <span>Save Franchise Page Changes</span>
            </button>
            <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
            </button>
            <a href="{{ route('franchise') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Franchise
            </a>
        </div>
    </form>
@endsection
