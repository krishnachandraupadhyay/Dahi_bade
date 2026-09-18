@extends('layouts.admin')

@section('title', 'Edit Our Story Page')

@section('content')
<style>
    /* Premium Modern Form Styling */
    .story-config-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }
    .story-config-header {
        background: #f8fafc;
        padding: 14px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .story-row {
        display: flex;
        align-items: flex-start;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    .story-row:last-child {
        border-bottom: none;
    }
    .story-row:hover {
        background-color: #fafbfc;
    }
    .story-label-col {
        width: 220px;
        min-width: 210px;
        flex-shrink: 0;
        padding-right: 20px;
        padding-top: 5px;
    }
    .story-label-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 3px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .story-label-desc {
        font-size: 11.5px;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0;
    }
    .story-input-col {
        flex-grow: 1;
        width: 100%;
    }
    .modern-input, .modern-textarea, .modern-select {
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 8px !important;
        font-size: 13.5px !important;
        padding: 8px 12px !important;
        transition: all 0.2s ease !important;
        color: #1e293b !important;
        background-color: #ffffff !important;
    }
    .modern-input:focus, .modern-textarea:focus, .modern-select:focus {
        border-color: #0d9488 !important;
        box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.14) !important;
        outline: none !important;
    }
    .input-group-text-modern {
        background-color: #f8fafc;
        border: 1.5px solid #cbd5e1;
        color: #475569;
        font-size: 12.5px;
        font-weight: 600;
        border-radius: 8px 0 0 8px !important;
    }
    .input-group > .modern-input {
        border-radius: 0 8px 8px 0 !important;
    }
    .media-card-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px;
    }
    .media-preview-box {
        border: 1.5px solid #334155;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    }
    .item-card-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        transition: all 0.2s ease;
    }
    .item-card-box:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    @media (max-width: 768px) {
        .story-row {
            flex-direction: column;
            padding: 12px 14px;
        }
        .story-label-col {
            width: 100%;
            padding-right: 0;
            padding-bottom: 8px;
        }
    }
</style>

    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Edit Our Story Page</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.website-pages.index') }}" class="text-primary text-decoration-none">Website Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Story</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.website-pages.index') }}" class="btn btn-light border btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-arrow-left fs-13"></i>
                <span>Back to Pages</span>
            </a>
            <a href="{{ route('story') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>Preview Live Story</span>
            </a>
        </div>
    </div>

    <!-- Our Story Page Card with Header Section Dropdown -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
        <!-- Card Topbar -->
        <div class="card-header bg-white py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom border-light-subtle">
            <!-- Left Side: Page Title -->
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-info-subtle text-info d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; font-size: 20px;">
                    <i class="bi bi-journal-richtext"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-0 fs-16" style="line-height: 1.25;">Our Story Page</h5>
                    <small class="text-muted fs-12 d-block" style="margin-top: 2px;">Manage sections, chapters, 4 pillars, and core values of the heritage story</small>
                </div>
            </div>

            <!-- Right Side: Section Dropdown Selector -->
            <div class="d-flex align-items-center gap-2.5">
                <label for="storySectionSelector" class="fs-13 text-muted mb-0 fw-semibold text-nowrap d-flex align-items-center gap-1.5">
                    <i class="bi bi-layers text-primary fs-14"></i> <span>Select Section:</span>
                </label>
                <select id="storySectionSelector" class="form-select form-select-sm fw-medium shadow-none" style="min-width: 300px; font-size: 13px; border-color: #cbd5e1; border-radius: 8px; padding: 6px 12px;">
                    <option value="hero_banner" selected>🌟 Hero Banner & Introduction</option>
                    <option value="where_it_began">📖 Chapter 1: Where It All Began (1976)</option>
                    <option value="gpo_journey">⏳ Chapter 2: The GPO Journey</option>
                    <option value="secret_pillars">🌱 The Secret Is Simple (4 Pillars)</option>
                    <option value="why_thandey">❄️ Why "Thandey" Dahi Bade?</option>
                    <option value="our_values">💎 Our Values (6 Core Principles)</option>
                    <option value="tradition_cta">✨ Tradition Meets Today & CTA</option>
                    <option value="panoramic_banner">🏙️ Panoramic Lucknow Banner</option>
                </select>
            </div>
        </div>

        <!-- Card Body Content Area (Dynamically changes based on dropdown selection) -->
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-18"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- ================= 1. HERO BANNER PANEL ================= -->
            <div class="story-section-panel" id="panel_hero_banner">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary px-2.5 py-1.5 fs-12">Top Banner</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Hero Banner & Heritage Introduction</h6>
                    </div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1">
                        <i class="bi bi-image me-1"></i> Full Page Hero Header
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_section" value="hero_banner">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-bookmark-star-fill text-warning fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Banner Texts & Typography</span>
                            </div>
                        </div>

                        <!-- Top Badge & Origin -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-tag-fill text-primary"></i> Top Badge & Subtitle</div>
                                <div class="story-label-desc">Small uppercase badge tag and origin subtext.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text input-group-text-modern">Badge Tag</span>
                                            <input type="text" name="story[hero_badge]" value="{{ old('story.hero_badge', $story['hero_badge'] ?? 'OUR STORY') }}" class="form-control modern-input fw-semibold" placeholder="OUR STORY">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text input-group-text-modern">Origin Subtitle</span>
                                            <input type="text" name="story[hero_sub]" value="{{ old('story.hero_sub', $story['hero_sub'] ?? 'Since 1976 | Lucknow') }}" class="form-control modern-input" placeholder="Since 1976 | Lucknow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Heading -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h1 text-primary"></i> Main Heading</div>
                                <div class="story-label-desc">The prominent golden headline on the banner.</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[hero_heading]" value="{{ old('story.hero_heading', $story['hero_heading'] ?? 'A LEGACY SERVED WITH LOVE') }}" class="form-control modern-input fw-bold fs-14" placeholder="A LEGACY SERVED WITH LOVE">
                            </div>
                        </div>

                        <!-- Banner Description -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-text-paragraph text-primary"></i> Introduction Paragraph</div>
                                <div class="story-label-desc">Introductory summary of the heritage and journey.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[hero_description]" rows="3" class="form-control modern-textarea" placeholder="From a humble beginning near the GPO...">{{ old('story.hero_description', $story['hero_description'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Background Photo -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-image-fill text-primary"></i> Background Image</div>
                                <div class="story-label-desc">Header backdrop photo (Hazratganj Heritage).</div>
                            </div>
                            <div class="story-input-col">
                                <div class="media-card-box">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-5 col-12">
                                            <div class="media-preview-box overflow-hidden" style="height: 120px; background: #0b1f1a;">
                                                <img id="preview_hero_image" src="{{ asset($story['hero_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="Hero Banner Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <small class="text-muted fs-11 mt-1 d-block">Current: {{ $story['hero_image'] ?? 'images/lucknow_heritage.jpg' }}</small>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Background Image:</label>
                                            <input type="file" name="story[hero_image_file]" id="input_hero_image_file" class="form-control modern-input form-control-sm mb-2" accept="image/*">
                                            <input type="hidden" name="story[hero_image]" value="{{ $story['hero_image'] ?? 'images/lucknow_heritage.jpg' }}">
                                            <small class="text-muted fs-12">Recommended: 1920x800 px, high-resolution JPG or WebP.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Hero Banner</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                        <a href="{{ route('story') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Story
                        </a>
                    </div>
                </form>
            </div>

            <!-- ================= 2. CHAPTER 1: WHERE IT ALL BEGAN ================= -->
            <div class="story-section-panel" id="panel_where_it_began" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success px-2.5 py-1.5 fs-12">Chapter 1</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Where It All Began (1976 Heritage)</h6>
                    </div>
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1">
                        <i class="bi bi-book-half me-1"></i> Arch Frame & Founder Story
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_section" value="where_it_began">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-bookmark-check-fill text-success fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Chapter 1 Headings & Narrative</span>
                            </div>
                        </div>

                        <!-- Heading & Tagline -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h2 text-success"></i> Section Title & Tagline</div>
                                <div class="story-label-desc">Primary heading and italicized subtitle tag.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Chapter Heading:</label>
                                        <input type="text" name="story[began_heading]" value="{{ old('story.began_heading', $story['began_heading'] ?? 'WHERE IT ALL BEGAN') }}" class="form-control modern-input fw-bold" placeholder="WHERE IT ALL BEGAN">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Tagline Subtitle:</label>
                                        <input type="text" name="story[began_tagline]" value="{{ old('story.began_tagline', $story['began_tagline'] ?? 'A Simple Beginning. An Unforgettable Taste.') }}" class="form-control modern-input fst-italic" placeholder="A Simple Beginning. An Unforgettable Taste.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Arch Photo -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-image text-success"></i> Arch Shape Photo</div>
                                <div class="story-label-desc">Side heritage photo displayed in the arch frame.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="media-card-box">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-4 col-12">
                                            <div class="media-preview-box overflow-hidden" style="height: 130px; border-radius: 60px 60px 10px 10px; background: #f1f5f9;">
                                                <img id="preview_began_image" src="{{ asset($story['began_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="Chapter 1 Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <small class="text-muted fs-11 mt-1 d-block text-center">Arch Frame Preview</small>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">Upload Arch Photo:</label>
                                            <input type="file" name="story[began_image_file]" id="input_began_image_file" class="form-control modern-input form-control-sm mb-2" accept="image/*">
                                            <input type="hidden" name="story[began_image]" value="{{ $story['began_image'] ?? 'images/lucknow_heritage.jpg' }}">
                                            <small class="text-muted fs-12">Recommended portrait or square heritage photo.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Paragraph 1 (Founder Sant Ram Gupta) -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-person-badge text-success"></i> Paragraph 1 (Founder)</div>
                                <div class="story-label-desc">Mention of Sant Ram Gupta ji & 1976 start.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[began_text_1]" rows="3" class="form-control modern-textarea">{{ old('story.began_text_1', $story['began_text_1'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Paragraph 2 (No Complicated Formula) -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-stars text-success"></i> Paragraph 2 (Philosophy)</div>
                                <div class="story-label-desc">Simplicity and commitment to food with care.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[began_text_2]" rows="2" class="form-control modern-textarea">{{ old('story.began_text_2', $story['began_text_2'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Paragraph 3 (Customer Attraction) -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-people-fill text-success"></i> Paragraph 3 (Flavours)</div>
                                <div class="story-label-desc">Unique soft dahi bade & customer spread.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[began_text_3]" rows="2" class="form-control modern-textarea">{{ old('story.began_text_3', $story['began_text_3'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Paragraph 4 (Concluding Highlight) -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-pin-angle-fill text-success"></i> Highlight Statement</div>
                                <div class="story-label-desc">Bold concluding line ("And slowly, a small food destination...").</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[began_text_4]" value="{{ old('story.began_text_4', $story['began_text_4'] ?? 'And slowly, a small food destination became a name people remembered.') }}" class="form-control modern-input fw-bold text-success">
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-success px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Chapter 1</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 3. CHAPTER 2: THE GPO JOURNEY ================= -->
            <div class="story-section-panel" id="panel_gpo_journey" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-warning text-dark px-2.5 py-1.5 fs-12">Chapter 2</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">The GPO Journey & Food Philosophy</h6>
                    </div>
                    <span class="badge bg-warning-subtle text-dark border border-warning-subtle px-2.5 py-1">
                        <i class="bi bi-quote me-1"></i> Dark Overlay Atmosphere
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_section" value="gpo_journey">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-clock-history text-warning fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Chapter 2 Configuration</span>
                            </div>
                        </div>

                        <!-- Badge Tag & Main Heading -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-tag-fill text-warning"></i> Badge & Heading</div>
                                <div class="story-label-desc">Upper badge tag and prominent banner title.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-4 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Tag:</label>
                                        <input type="text" name="story[journey_badge]" value="{{ old('story.journey_badge', $story['journey_badge'] ?? 'THE GPO JOURNEY') }}" class="form-control modern-input fw-bold" placeholder="THE GPO JOURNEY">
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Main Heading:</label>
                                        <input type="text" name="story[journey_heading]" value="{{ old('story.journey_heading', $story['journey_heading'] ?? 'FROM A HUMBLE FOOD DESTINATION TO A LUCKNOW FAVOURITE') }}" class="form-control modern-input fw-bold" placeholder="FROM A HUMBLE FOOD DESTINATION...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Subtitle Intro -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-chat-left-text text-warning"></i> Subtitle Intro</div>
                                <div class="story-label-desc">Text directly above the memorable quote.</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[journey_sub]" value="{{ old('story.journey_sub', $story['journey_sub'] ?? 'Over the years, GPO Ke Thandey Dahi Bade became associated with a simple food experience:') }}" class="form-control modern-input">
                            </div>
                        </div>

                        <!-- Golden Quote -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-quote text-warning"></i> Golden Quote</div>
                                <div class="story-label-desc">Signature catchphrase ("Come hungry. Have a plate. Leave happy.").</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[journey_quote]" value="{{ old('story.journey_quote', $story['journey_quote'] ?? 'Come hungry. Have a plate. Leave happy.') }}" class="form-control modern-input fw-bold fs-15 text-warning" style="background-color: #fefce8 !important; border-color: #fef08a !important;">
                            </div>
                        </div>

                        <!-- Full Journey Narrative -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-text-paragraph text-warning"></i> Journey Description</div>
                                <div class="story-label-desc">Detailed paragraph on customer love across generations.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[journey_desc]" rows="3" class="form-control modern-textarea">{{ old('story.journey_desc', $story['journey_desc'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Background Photo -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-image text-warning"></i> Store Background Photo</div>
                                <div class="story-label-desc">Atmospheric photo displayed under dark gradient overlay.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="media-card-box">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-4 col-12">
                                            <div class="media-preview-box overflow-hidden" style="height: 120px; background: #000;">
                                                <img id="preview_journey_image" src="{{ asset($story['journey_image'] ?? 'images/storefront.jpg') }}" alt="Chapter 2 Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <small class="text-muted fs-11 mt-1 d-block">Current: {{ $story['journey_image'] ?? 'images/storefront.jpg' }}</small>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">Upload Atmosphere Photo:</label>
                                            <input type="file" name="story[journey_image_file]" id="input_journey_image_file" class="form-control modern-input form-control-sm mb-2" accept="image/*">
                                            <input type="hidden" name="story[journey_image]" value="{{ $story['journey_image'] ?? 'images/storefront.jpg' }}">
                                            <small class="text-muted fs-12">Recommended wide landscape store photo.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-warning text-dark px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Chapter 2</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 4. THE SECRET IS SIMPLE (4 PILLARS) ================= -->
            <div class="story-section-panel" id="panel_secret_pillars" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-info px-2.5 py-1.5 fs-12">Section 3</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">The Secret Is Simple (4 Heritage Pillars)</h6>
                    </div>
                    <span class="badge bg-info-subtle text-info border border-info-subtle px-2.5 py-1">
                        <i class="bi bi-columns-gap me-1"></i> 4 Pillars Grid
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_section" value="secret_pillars">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-shield-check text-info fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Section Header Information</span>
                            </div>
                        </div>

                        <!-- Section Heading & Tagline -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h2 text-info"></i> Title & Tagline</div>
                                <div class="story-label-desc">Heading and uppercase italic tagline.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Section Title:</label>
                                        <input type="text" name="story[secret_heading]" value="{{ old('story.secret_heading', $story['secret_heading'] ?? 'THE SECRET IS SIMPLE') }}" class="form-control modern-input fw-bold" placeholder="THE SECRET IS SIMPLE">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Tagline:</label>
                                        <input type="text" name="story[secret_tagline]" value="{{ old('story.secret_tagline', $story['secret_tagline'] ?? 'GOOD FOOD DOESN’T NEED TO BE COMPLICATED.') }}" class="form-control modern-input fst-italic" placeholder="GOOD FOOD DOESN’T NEED TO BE COMPLICATED.">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Introductory Subtitle:</label>
                                        <input type="text" name="story[secret_desc]" value="{{ old('story.secret_desc', $story['secret_desc'] ?? 'At GPO, we believe that the best food comes from respecting the basics.') }}" class="form-control modern-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4 Pillar Cards -->
                    <h6 class="fw-bold text-dark mb-3 fs-14 d-flex align-items-center gap-2">
                        <i class="bi bi-grid-fill text-info"></i> 4 Core Pillars Configuration
                    </h6>

                    <div class="row g-3 mb-4">
                        @php
                            $pillars = $story['pillars'] ?? [
                                ['icon' => '🌱', 'title' => 'QUALITY INGREDIENTS', 'desc' => 'We focus on freshness and quality in the ingredients used in our preparations.'],
                                ['icon' => '🏺', 'title' => 'TRADITIONAL FLAVOURS', 'desc' => 'Our food remains connected to the familiar flavours that customers have loved over the years.'],
                                ['icon' => '🥣', 'title' => 'CAREFUL PREPARATION', 'desc' => 'Every dish is prepared with attention to taste, presentation and consistency.'],
                                ['icon' => '❤️', 'title' => 'CUSTOMER FIRST', 'desc' => 'Our ultimate goal is simple — give every customer a reason to come back.']
                            ];
                        @endphp

                        @foreach($pillars as $idx => $p)
                            <div class="col-md-6 col-12">
                                <div class="item-card-box h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                        <span class="badge bg-info-subtle text-info fw-bold">Pillar {{ $idx + 1 }}</span>
                                        <div style="width: 70px;">
                                            <input type="text" name="story[pillars][{{ $idx }}][icon]" value="{{ $p['icon'] ?? '🌱' }}" class="form-control form-control-sm text-center modern-input fw-bold fs-15" title="Pillar Emoji">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">Title:</label>
                                        <input type="text" name="story[pillars][{{ $idx }}][title]" value="{{ $p['title'] ?? '' }}" class="form-control form-control-sm modern-input fw-bold" placeholder="Pillar Title">
                                    </div>
                                    <div>
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">Description:</label>
                                        <textarea name="story[pillars][{{ $idx }}][desc]" rows="2" class="form-control form-control-sm modern-textarea" placeholder="Pillar description...">{{ $p['desc'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-info text-white px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save 4 Pillars</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 5. WHY "THANDEY" DAHI BADE ================= -->
            <div class="story-section-panel" id="panel_why_thandey" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-teal px-2.5 py-1.5 fs-12 text-white" style="background-color: #0d9488;">Section 4</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Why "Thandey" Dahi Bade? & 4 Badges</h6>
                    </div>
                    <span class="badge bg-teal-subtle text-teal border border-teal-subtle px-2.5 py-1" style="color: #0d9488;">
                        <i class="bi bi-snow me-1"></i> Chilled Character & Signature Taste
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_section" value="why_thandey">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-snow2 text-info fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Section Description & Narrative</span>
                            </div>
                        </div>

                        <!-- Heading & Tagline -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h2 text-primary"></i> Heading & Tagline</div>
                                <div class="story-label-desc">Section headline and tagline.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Heading:</label>
                                        <input type="text" name="story[why_thandey_heading]" value="{{ old('story.why_thandey_heading', $story['why_thandey_heading'] ?? 'WHY “THANDEY” DAHI BADE?') }}" class="form-control modern-input fw-bold" placeholder="WHY “THANDEY” DAHI BADE?">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Tagline:</label>
                                        <input type="text" name="story[why_thandey_tagline]" value="{{ old('story.why_thandey_tagline', $story['why_thandey_tagline'] ?? 'THE EXPERIENCE IS IN THE NAME.') }}" class="form-control modern-input fst-italic" placeholder="THE EXPERIENCE IS IN THE NAME.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Explanatory Paragraphs -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-text-paragraph text-primary"></i> Explanatory Texts</div>
                                <div class="story-label-desc">3 explanation sentences detailing the chilled character.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="mb-3">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Paragraph 1:</label>
                                    <input type="text" name="story[why_thandey_p1]" value="{{ old('story.why_thandey_p1', $story['why_thandey_p1'] ?? 'Our signature Dahi Bade are known for their refreshing chilled character.') }}" class="form-control modern-input">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Paragraph 2:</label>
                                    <input type="text" name="story[why_thandey_p2]" value="{{ old('story.why_thandey_p2', $story['why_thandey_p2'] ?? 'Soft lentil dumplings are complemented by creamy chilled dahi and a balanced blend of flavours and spices.') }}" class="form-control modern-input">
                                </div>
                                <div>
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Concluding Highlight:</label>
                                    <input type="text" name="story[why_thandey_p3]" value="{{ old('story.why_thandey_p3', $story['why_thandey_p3'] ?? 'It is this combination that creates the distinctive GPO experience.') }}" class="form-control modern-input fw-semibold text-primary">
                                </div>
                            </div>
                        </div>

                        <!-- 4 Highlight Badges -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-patch-check-fill text-primary"></i> 4 Highlight Badges</div>
                                <div class="story-label-desc">The 4 prominent taste pills (CREAMY, CHILLED, TANGY, FLAVOURFUL).</div>
                            </div>
                            <div class="story-input-col">
                                @php
                                    $badges = $story['why_thandey_badges'] ?? ['CREAMY.', 'CHILLED.', 'TANGY.', 'FLAVOURFUL.'];
                                @endphp
                                <div class="row g-2">
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-md-3 col-6">
                                            <input type="text" name="story[why_thandey_badges][{{ $i }}]" value="{{ $badges[$i] ?? '' }}" class="form-control modern-input fw-bold text-center" placeholder="e.g. CREAMY.">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2" style="background-color: #0d9488; border-color: #0d9488;">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Why Thandey Section</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 6. OUR VALUES (6 VALUES) ================= -->
            <div class="story-section-panel" id="panel_our_values" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary px-2.5 py-1.5 fs-12">Section 5</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Our Values (6 Core Principles)</h6>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1">
                        <i class="bi bi-gem me-1"></i> 6 Guiding Pillars
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_section" value="our_values">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-gem text-secondary fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Section Titles</span>
                            </div>
                        </div>

                        <!-- Section Heading & Subtitle -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h2 text-dark"></i> Heading & Subtitle</div>
                                <div class="story-label-desc">Header text above the 6 values grid.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-5 col-12">
                                        <input type="text" name="story[values_heading]" value="{{ old('story.values_heading', $story['values_heading'] ?? 'OUR VALUES') }}" class="form-control modern-input fw-bold" placeholder="OUR VALUES">
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <input type="text" name="story[values_desc]" value="{{ old('story.values_desc', $story['values_desc'] ?? 'The timeless principles that guide everything we prepare and serve.') }}" class="form-control modern-input" placeholder="Subtitle description...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6 Values Cards -->
                    <h6 class="fw-bold text-dark mb-3 fs-14 d-flex align-items-center gap-2">
                        <i class="bi bi-card-checklist text-primary"></i> 6 Core Values Configuration
                    </h6>

                    <div class="row g-3 mb-4">
                        @php
                            $values = $story['values'] ?? [
                                ['number' => '01', 'title' => 'AUTHENTICITY', 'desc' => 'We respect the food traditions and flavours that built our identity.'],
                                ['number' => '02', 'title' => 'QUALITY', 'desc' => 'We believe quality is essential to creating food people trust.'],
                                ['number' => '03', 'title' => 'CONSISTENCY', 'desc' => 'Customers should receive the GPO experience they expect every time.'],
                                ['number' => '04', 'title' => 'HYGIENE', 'desc' => 'We maintain attention to cleanliness and food preparation standards.'],
                                ['number' => '05', 'title' => 'INNOVATION', 'desc' => 'While respecting our roots, we continue to embrace modern ways of serving customers.'],
                                ['number' => '06', 'title' => 'LEGACY', 'desc' => 'Our past gives us our identity. Our future gives us our responsibility.'],
                            ];
                        @endphp

                        @foreach($values as $idx => $val)
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="item-card-box h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                        <span class="badge bg-light text-dark border fw-bold">Value #{{ $idx + 1 }}</span>
                                        <input type="text" name="story[values][{{ $idx }}][number]" value="{{ $val['number'] ?? sprintf('%02d', $idx + 1) }}" class="form-control form-control-sm text-center modern-input fw-bold" style="width: 50px;">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">Title:</label>
                                        <input type="text" name="story[values][{{ $idx }}][title]" value="{{ $val['title'] ?? '' }}" class="form-control form-control-sm modern-input fw-bold" placeholder="Value Title">
                                    </div>
                                    <div>
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">Description:</label>
                                        <textarea name="story[values][{{ $idx }}][desc]" rows="2" class="form-control form-control-sm modern-textarea" placeholder="Value description...">{{ $val['desc'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-secondary px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save 6 Values</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 7. TRADITION MEETS TODAY & CTA ================= -->
            <div class="story-section-panel" id="panel_tradition_cta" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger px-2.5 py-1.5 fs-12">Section 6</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Tradition Meets Today & Experience CTA</h6>
                    </div>
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1">
                        <i class="bi bi-megaphone-fill me-1"></i> Conversion Banner & Call to Action
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_section" value="tradition_cta">

                    <!-- Part 1: Tradition Meets Today -->
                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-hourglass-split text-danger fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Tradition Meets Today Banner</span>
                            </div>
                        </div>

                        <!-- Heading -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h3 text-danger"></i> Banner Title</div>
                                <div class="story-label-desc">Headline for the evolving legacy block.</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[tradition_heading]" value="{{ old('story.tradition_heading', $story['tradition_heading'] ?? 'TRADITION MEETS TODAY') }}" class="form-control modern-input fw-bold">
                            </div>
                        </div>

                        <!-- Description Paragraph -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-text-paragraph text-danger"></i> Modern Evolution Text</div>
                                <div class="story-label-desc">Explaining modern convenience with authentic heritage roots.</div>
                            </div>
                            <div class="story-input-col">
                                <textarea name="story[tradition_desc]" rows="3" class="form-control modern-textarea">{{ old('story.tradition_desc', $story['tradition_desc'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Punch Tag -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-lightning-charge-fill text-danger"></i> Punch Tagline</div>
                                <div class="story-label-desc">Memorable badge line ("THE TASTE MAY BE TIMELESS. THE EXPERIENCE KEEPS EVOLVING.").</div>
                            </div>
                            <div class="story-input-col">
                                <input type="text" name="story[tradition_punch]" value="{{ old('story.tradition_punch', $story['tradition_punch'] ?? 'THE TASTE MAY BE TIMELESS. THE EXPERIENCE KEEPS EVOLVING.') }}" class="form-control modern-input fw-bold text-danger">
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Final CTA Banner & Buttons -->
                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-cursor-fill text-danger fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Final Call To Action Banner</span>
                            </div>
                        </div>

                        <!-- CTA Headings -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-chat-quote-fill text-danger"></i> CTA Heading & Sub</div>
                                <div class="story-label-desc">Call to action headline and subtext.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-7 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Headline:</label>
                                        <input type="text" name="story[cta_heading]" value="{{ old('story.cta_heading', $story['cta_heading'] ?? 'EXPERIENCE THE STORY FOR YOURSELF') }}" class="form-control modern-input fw-bold" placeholder="EXPERIENCE THE STORY FOR YOURSELF">
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Subheading:</label>
                                        <input type="text" name="story[cta_sub]" value="{{ old('story.cta_sub', $story['cta_sub'] ?? 'Taste the Original GPO Ke Thandey Dahi Bade.') }}" class="form-control modern-input" placeholder="Taste the Original...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-hand-index-thumb-fill text-danger"></i> Action Buttons</div>
                                <div class="story-label-desc">Dual CTA buttons (Visit Us & Order Now).</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-6 col-12">
                                        <div class="item-card-box">
                                            <span class="badge bg-danger mb-2">Primary Button</span>
                                            <div class="mb-2">
                                                <label class="form-label fs-11 fw-bold text-dark mb-1">Button Text:</label>
                                                <input type="text" name="story[cta_btn1_text]" value="{{ old('story.cta_btn1_text', $story['cta_btn1_text'] ?? 'VISIT US') }}" class="form-control form-control-sm modern-input fw-bold">
                                            </div>
                                            <div>
                                                <label class="form-label fs-11 fw-bold text-dark mb-1">Button URL / Link:</label>
                                                <input type="text" name="story[cta_btn1_url]" value="{{ old('story.cta_btn1_url', $story['cta_btn1_url'] ?? '/contact') }}" class="form-control form-control-sm modern-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="item-card-box">
                                            <span class="badge bg-warning text-dark mb-2">Secondary Button</span>
                                            <div class="mb-2">
                                                <label class="form-label fs-11 fw-bold text-dark mb-1">Button Text:</label>
                                                <input type="text" name="story[cta_btn2_text]" value="{{ old('story.cta_btn2_text', $story['cta_btn2_text'] ?? 'ORDER NOW') }}" class="form-control form-control-sm modern-input fw-bold">
                                            </div>
                                            <div>
                                                <label class="form-label fs-11 fw-bold text-dark mb-1">Button URL / Link:</label>
                                                <input type="text" name="story[cta_btn2_url]" value="{{ old('story.cta_btn2_url', $story['cta_btn2_url'] ?? '/menu') }}" class="form-control form-control-sm modern-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Tradition & CTA</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= 8. PANORAMIC LUCKNOW BANNER ================= -->
            <div class="story-section-panel" id="panel_panoramic_banner" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-dark px-2.5 py-1.5 fs-12 text-white">Footer Banner</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Full-Width Panoramic Lucknow Heritage Banner</h6>
                    </div>
                    <span class="badge bg-dark-subtle text-dark border border-dark-subtle px-2.5 py-1">
                        <i class="bi bi-building me-1"></i> Full-Width Panoramic
                    </span>
                </div>

                <form action="{{ route('admin.website-pages.story.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_section" value="panoramic_banner">

                    <div class="story-config-card mb-4">
                        <div class="story-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-building-fill text-dark fs-15"></i>
                                <span class="fw-bold text-dark fs-14">Panoramic Banner Content</span>
                            </div>
                        </div>

                        <!-- City Heading & Subtitle -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-type-h1 text-dark"></i> City Title & Subtitle</div>
                                <div class="story-label-desc">Panoramic banner overlay text.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="row g-3">
                                    <div class="col-md-4 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">City Title:</label>
                                        <input type="text" name="story[banner_title]" value="{{ old('story.banner_title', $story['banner_title'] ?? 'LUCKNOW') }}" class="form-control modern-input fw-bold" placeholder="LUCKNOW">
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Heritage Subtitle:</label>
                                        <input type="text" name="story[banner_subtitle]" value="{{ old('story.banner_subtitle', $story['banner_subtitle'] ?? 'A City of Nawabs • A Taste of Tradition • Since 1976') }}" class="form-control modern-input" placeholder="A City of Nawabs...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Background Photo -->
                        <div class="story-row">
                            <div class="story-label-col">
                                <div class="story-label-title"><i class="bi bi-image-fill text-dark"></i> Panoramic Backdrop</div>
                                <div class="story-label-desc">Panoramic image spanning full page width.</div>
                            </div>
                            <div class="story-input-col">
                                <div class="media-card-box">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-5 col-12">
                                            <div class="media-preview-box overflow-hidden" style="height: 120px; background: #000;">
                                                <img id="preview_banner_image" src="{{ asset($story['banner_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="Panoramic Banner Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <small class="text-muted fs-11 mt-1 d-block">Current: {{ $story['banner_image'] ?? 'images/lucknow_heritage.jpg' }}</small>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Panoramic Photo:</label>
                                            <input type="file" name="story[banner_image_file]" id="input_banner_image_file" class="form-control modern-input form-control-sm mb-2" accept="image/*">
                                            <input type="hidden" name="story[banner_image]" value="{{ $story['banner_image'] ?? 'images/lucknow_heritage.jpg' }}">
                                            <small class="text-muted fs-12">Recommended wide format: 1920x600 px.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="p-3 bg-white border border-light-subtle rounded-3 shadow-sm d-flex flex-wrap align-items-center gap-2.5">
                        <button type="submit" class="btn btn-dark px-4 py-2 fw-semibold shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Panoramic Banner</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dropdown Section Selector Logic with URL parameter synchronization
        const storySelector = document.getElementById('storySectionSelector');
        const panels = document.querySelectorAll('.story-section-panel');

        function switchStorySection() {
            if (!storySelector) return;
            const selectedVal = storySelector.value;
            panels.forEach(panel => {
                if (panel.id === 'panel_' + selectedVal) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
        }

        if (storySelector) {
            const urlParams = new URLSearchParams(window.location.search);
            const urlSection = urlParams.get('section');
            if (urlSection && storySelector.querySelector(`option[value="${urlSection}"]`)) {
                storySelector.value = urlSection;
            }

            storySelector.addEventListener('change', function () {
                switchStorySection();
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('section', storySelector.value);
                window.history.replaceState({}, '', newUrl);
            });

            switchStorySection();
        }

        // Live image previews
        function setupLiveImagePreview(inputId, previewImgId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewImgId);
            if (input && preview) {
                input.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            preview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }

        setupLiveImagePreview('input_hero_image_file', 'preview_hero_image');
        setupLiveImagePreview('input_began_image_file', 'preview_began_image');
        setupLiveImagePreview('input_journey_image_file', 'preview_journey_image');
        setupLiveImagePreview('input_banner_image_file', 'preview_banner_image');
    });
</script>
@endpush
