@extends('layouts.admin')

@section('title', 'Edit Our Story Page')

@section('content')
    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Edit Our Story Page</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.website-pages.index') }}" class="text-primary text-decoration-none">Website Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Story</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('story') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>View Live Story</span>
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

    <form action="{{ route('admin.website-pages.story.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <!-- 1. Hero Banner Settings -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-image-fill text-primary fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Story Banner & Introduction</h6>
                        </div>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-11">Top Banner</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Title:</label>
                            <input type="text" name="story[hero_badge]" value="{{ old('story.hero_badge', $story['hero_badge'] ?? 'OUR STORY') }}" class="form-control form-control-sm modern-input" placeholder="OUR STORY">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Main Heading:</label>
                            <input type="text" name="story[hero_heading]" value="{{ old('story.hero_heading', $story['hero_heading'] ?? 'A LEGACY SERVED WITH LOVE') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="A LEGACY SERVED WITH LOVE">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Subheading / Origin:</label>
                            <input type="text" name="story[hero_sub]" value="{{ old('story.hero_sub', $story['hero_sub'] ?? 'Since 1976 | Lucknow') }}" class="form-control form-control-sm modern-input" placeholder="Since 1976 | Lucknow">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Banner Description Text:</label>
                            <textarea name="story[hero_description]" rows="3" class="form-control form-control-sm modern-input" placeholder="Enter story description...">{{ old('story.hero_description', $story['hero_description'] ?? '') }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Upload Banner Image:</label>
                            <input type="file" name="story[hero_image_file]" class="form-control form-control-sm modern-input mb-1" accept="image/*">
                            <input type="hidden" name="story[hero_image]" value="{{ $story['hero_image'] ?? 'images/lucknow_heritage.jpg' }}">
                            <small class="text-muted fs-11">Current: {{ $story['hero_image'] ?? 'images/lucknow_heritage.jpg' }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Chapter 1: Where It All Began -->
            <div class="col-lg-6 col-12">
                <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-book-half text-success fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">Where It All Began (Chapter 1)</h6>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle fs-11">1976 Heritage</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Chapter Heading:</label>
                            <input type="text" name="story[began_heading]" value="{{ old('story.began_heading', $story['began_heading'] ?? 'WHERE IT ALL BEGAN') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="WHERE IT ALL BEGAN">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Chapter Tagline:</label>
                            <input type="text" name="story[began_tagline]" value="{{ old('story.began_tagline', $story['began_tagline'] ?? 'A Simple Beginning. An Unforgettable Taste.') }}" class="form-control form-control-sm modern-input fst-italic" placeholder="A Simple Beginning. An Unforgettable Taste.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Founder Paragraph:</label>
                            <textarea name="story[began_text_1]" rows="3" class="form-control form-control-sm modern-input">{{ old('story.began_text_1', $story['began_text_1'] ?? '') }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fs-12 fw-bold text-dark mb-1">Legacy Evolution Paragraph:</label>
                            <textarea name="story[began_text_2]" rows="3" class="form-control form-control-sm modern-input">{{ old('story.began_text_2', $story['began_text_2'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Chapter 2: The GPO Journey -->
            <div class="col-12">
                <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; background: #ffffff;">
                    <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-clock-history text-warning fs-15"></i>
                            <h6 class="fs-13 fw-bold text-dark mb-0">The GPO Journey & Food Philosophy</h6>
                        </div>
                        <span class="badge bg-warning-subtle text-dark border border-warning-subtle fs-11">Story Philosophy</span>
                    </div>
                    <div class="card-body p-3.5">
                        <div class="row g-3">
                            <div class="col-md-3 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Tag:</label>
                                <input type="text" name="story[journey_badge]" value="{{ old('story.journey_badge', $story['journey_badge'] ?? 'THE GPO JOURNEY') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="THE GPO JOURNEY">
                            </div>
                            <div class="col-md-9 col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Section Title:</label>
                                <input type="text" name="story[journey_heading]" value="{{ old('story.journey_heading', $story['journey_heading'] ?? 'FROM A HUMBLE FOOD DESTINATION TO A LUCKNOW FAVOURITE') }}" class="form-control form-control-sm modern-input fw-bold" placeholder="FROM A HUMBLE FOOD DESTINATION...">
                            </div>
                            <div class="col-12">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Full Philosophy & Experience Text:</label>
                                <textarea name="story[journey_desc]" rows="3" class="form-control form-control-sm modern-input" placeholder="Enter journey details...">{{ old('story.journey_desc', $story['journey_desc'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5 mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                <i class="bi bi-cloud-check-fill fs-16"></i>
                <span>Save Our Story Changes</span>
            </button>
            <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
            </button>
            <a href="{{ route('story') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Story
            </a>
        </div>
    </form>
@endsection
