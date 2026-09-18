@extends('layouts.admin')

@section('title', 'Edit Contact Us Page')

@section('content')
    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Edit Contact Us Page</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.website-pages.index') }}" class="text-primary text-decoration-none">Website Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>View Live Contact Page</span>
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

    <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
        @csrf

        <div class="row g-4">
            <!-- 1. Header & Intro -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-envelope-at text-secondary fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Contact Banner & Header</h6>
                        </div>
                        <span class="badge bg-light text-muted border fs-11">Page Header</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Main Heading:</label>
                            <input type="text" name="contact[hero_heading]" value="{{ old('contact.hero_heading', $contact['hero_heading'] ?? 'GET IN TOUCH WITH US') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="GET IN TOUCH WITH US">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Subheading Tagline:</label>
                            <input type="text" name="contact[hero_sub]" value="{{ old('contact.hero_sub', $contact['hero_sub'] ?? 'We’d Love To Hear From You') }}" class="form-control form-control-sm modern-input" placeholder="We’d Love To Hear From You">
                        </div>
                        <div class="mb-0">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Operating Hours / Timings:</label>
                            <input type="text" name="contact[timings]" value="{{ old('contact.timings', $contact['timings'] ?? 'Monday – Sunday | 1:00 PM – 9:00 PM') }}" class="form-control form-control-sm modern-input" placeholder="Monday – Sunday | 1:00 PM – 9:00 PM">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Address & Direct Contacts -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-geo-alt-fill text-danger fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Location & Communication Channels</h6>
                        </div>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-11">Direct Contact</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Full Store Address:</label>
                            <textarea name="contact[address]" rows="2" class="form-control form-control-sm modern-input" placeholder="Enter complete outlet address...">{{ old('contact.address', $contact['address'] ?? '') }}</textarea>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Helpline Phone:</label>
                                <input type="text" name="contact[phone]" value="{{ old('contact.phone', $contact['phone'] ?? '+91 91406 31433') }}" class="form-control form-control-sm modern-input fw-semibold" placeholder="+91 91406 31433">
                            </div>
                            <div class="col-6">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Official Email:</label>
                                <input type="email" name="contact[email]" value="{{ old('contact.email', $contact['email'] ?? 'support@gpokethandeydahibade.com') }}" class="form-control form-control-sm modern-input" placeholder="support@gpokethandeydahibade.com">
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Google Maps Link URL:</label>
                            <input type="text" name="contact[map_url]" value="{{ old('contact.map_url', $contact['map_url'] ?? '') }}" class="form-control form-control-sm modern-input" placeholder="https://maps.google.com/...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5 mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                <i class="bi bi-cloud-check-fill fs-16"></i>
                <span>Save Contact Us Changes</span>
            </button>
            <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
            </button>
            <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Contact Page
            </a>
        </div>
    </form>
@endsection
