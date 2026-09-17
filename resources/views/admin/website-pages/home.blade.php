@extends('layouts.admin')

@section('title', 'Edit Home Page')

@section('content')
<style>
    /* Premium Modern Horizontal Form Styling */
    .hero-config-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }
    .hero-config-header {
        background: #f8fafc;
        padding: 12px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .hero-row {
        display: flex;
        align-items: flex-start;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    .hero-row:last-child {
        border-bottom: none;
    }
    .hero-row:hover {
        background-color: #fafbfc;
    }
    .hero-label-col {
        width: 210px;
        min-width: 200px;
        flex-shrink: 0;
        padding-right: 20px;
        padding-top: 5px;
    }
    .hero-label-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 3px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .hero-label-desc {
        font-size: 11.5px;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0;
    }
    .hero-input-col {
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
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.14) !important;
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

    /* Modern Action Buttons Repeater */
    .button-manager-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
    }
    .button-manager-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e2e8f0;
    }
    .slide-button-row {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        transition: all 0.2s ease;
    }
    .slide-button-row:hover {
        border-color: #cbd5e1;
        box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    }
    .slide-btn-header-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 8px;
        border-bottom: 1px dashed #f1f5f9;
    }
    .slide-btn-badge {
        font-size: 11px;
        font-weight: 700;
        background: #f1f5f9;
        color: #334155;
        border: 1px solid #e2e8f0;
        padding: 2px 8px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .slide-btn-preview-tag {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 12px;
        border-radius: 9999px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: all 0.2s ease;
    }
    .btn-remove-slide-button {
        background: #fff;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 3px 10px;
        border-radius: 6px;
        font-size: 11.5px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.15s ease;
    }
    .btn-remove-slide-button:hover {
        background: #fee2e2;
        border-color: #fca5a5;
        color: #b91c1c;
    }
    .slide-btn-field-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: #64748b;
        margin-bottom: 4px;
        display: block;
    }

    /* Button Mini Preview Palette */
    .btn-preview-amber { background-color: #ecc67d; color: #1f2723; border: none; box-shadow: 0 2px 6px rgba(236, 198, 125, 0.35); }
    .btn-preview-spruce { background-color: #0d4b4c; color: #ffffff; border: none; }
    .btn-preview-terracotta { background-color: #c96c4b; color: #ffffff; border: none; box-shadow: 0 2px 6px rgba(201, 108, 75, 0.35); }
    .btn-preview-crimson { background-color: #b91c1c; color: #ffffff; border: none; }
    .btn-preview-emerald { background-color: #059669; color: #ffffff; border: none; }
    .btn-preview-sapphire { background-color: #1d4ed8; color: #ffffff; border: none; }
    .btn-preview-purple { background-color: #7e22ce; color: #ffffff; border: none; }
    .btn-preview-sunset { background-color: #ea580c; color: #ffffff; border: none; }
    .btn-preview-midnight { background-color: #111827; color: #ffffff; border: 1px solid rgba(255,255,255,0.2); }
    .btn-preview-white { background-color: #ffffff; color: #083b3c; border: 1px solid #e2e8f0; }
    .btn-preview-outline-light { background-color: #334155; color: #ffffff; border: 1.5px solid #ffffff; }
    .btn-preview-outline-amber { background-color: #1f2723; color: #ecc67d; border: 1.5px solid #ecc67d; }

    /* Media Box */
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

    @media (max-width: 768px) {
        .hero-row {
            flex-direction: column;
            padding: 12px 14px;
        }
        .hero-label-col {
            width: 100%;
            padding-right: 0;
            padding-bottom: 8px;
        }
    }
</style>

    <!-- Valex Page Header / Breadcrumb -->
    <div class="valex-page-header d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="valex-page-title mb-1 fw-bold text-dark fs-20">Edit Home Page</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 fs-13">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.website-pages.index') }}" class="text-primary text-decoration-none">Website Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.website-pages.index') }}" class="btn btn-light border btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-arrow-left fs-13"></i>
                <span>Back to Pages</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
                <i class="bi bi-box-arrow-up-right fs-13"></i>
                <span>Preview Live</span>
            </a>
        </div>
    </div>

    <!-- Home Page Card with Header Dropdown -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
        <!-- Card Topbar -->
        <div class="card-header bg-transparent py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom border-light-subtle">
            <!-- Left Side: Home Page Title -->
            <div class="d-flex align-items-center gap-2.5">
                <div class="rounded-2 bg-primary-transparent text-primary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                    <i class="bi bi-house-door-fill fs-16"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Home Page</h5>
                    <small class="text-muted fs-12">Manage sections and hero content of the homepage</small>
                </div>
            </div>

            <!-- Right Side: Section Dropdown -->
            <div class="d-flex align-items-center gap-2">
                <label for="homeSectionSelector" class="fs-13 text-muted mb-0 fw-semibold text-nowrap">
                    <i class="bi bi-layers me-1 text-primary"></i> Select Section:
                </label>
                <select id="homeSectionSelector" class="form-select form-select-sm fw-medium shadow-none" style="min-width: 280px; font-size: 13px; border-color: #cbd5e1;">
                    <option value="hero_section" selected>🌟 Hero Section (Main Banner & Carousel)</option>
                    <option value="highlights_strip">📌 Highlights Strip (3 Feature Cards)</option>
                    <option value="welcome_section">📖 Welcome Section (Founders & Legacy)</option>
                    <option value="why_gpo">⭐ Why People Love GPO (6 Key Highlights)</option>
                    <option value="signature_dish">🍛 Star of GPO (Thandey Dahi Bade)</option>
                    <option value="favourite_dishes">🍽️ More Than Just Dahi Bade (Dishes Menu)</option>
                    <option value="gpo_experience">✨ The GPO Experience</option>
                    <option value="testimonials">💬 Customer Reviews / Testimonials</option>
                    <option value="visit_us">📍 Visit Us & Store Information</option>
                    <option value="franchise_cta">🤝 Franchise Opportunity CTA</option>
                </select>
            </div>
        </div>

        <!-- Card Body Content Area (Dynamically changes based on dropdown selection) -->
        <div class="card-body p-4">
            <!-- ================= 1. HERO SECTION PANEL ================= -->
            <div class="home-section-panel" id="panel_hero_section">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary px-2.5 py-1.5 fs-12">Hero Section</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Hero Carousel Slides (Image / Video / GIF)</h6>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1" id="activeSlidesBadge">
                            <i class="bi bi-sliders me-1"></i> <span id="slideCountText">{{ count($slides) }}</span> Slides Active
                        </span>
                        <button type="button" class="btn btn-sm btn-success d-flex align-items-center gap-1.5 px-3 py-1 rounded-2 shadow-sm fw-semibold" id="btnAddSlideBtn">
                            <i class="bi bi-plus-circle-fill fs-13"></i>
                            <span>Add New Slide</span>
                        </button>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-18"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-18"></i>
                        <div>{{ session('error') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.website-pages.home.hero.update') }}" method="POST" enctype="multipart/form-data" id="heroSlidesForm">
                    @csrf

                    <!-- Slide Tabs Navigation -->
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2 flex-wrap gap-2">
                        <ul class="nav nav-pills gap-2 flex-wrap mb-0" id="heroSlideTabs" role="tablist">
                            @foreach($slides as $index => $slide)
                                <li class="nav-item slide-nav-item" role="presentation" data-slide-index="{{ $index }}">
                                    <button class="nav-link {{ $index === 0 ? 'active' : '' }} fw-semibold px-3 py-2 d-flex align-items-center gap-2" id="slide-tab-{{ $index }}" data-bs-toggle="pill" data-bs-target="#slide-pane-{{ $index }}" type="button" role="tab" aria-controls="slide-pane-{{ $index }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                        <span class="badge {{ $index === 0 ? 'bg-primary' : 'bg-secondary' }} text-white rounded-circle slide-tab-number" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">{{ $index + 1 }}</span>
                                        <span class="slide-tab-title">Slide {{ $index + 1 }}</span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Slide Tabs Content Panes -->
                    <div class="tab-content" id="heroSlideTabsContent">
                        @foreach($slides as $index => $slide)
                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }} slide-tab-pane" id="slide-pane-{{ $index }}" role="tabpanel" aria-labelledby="slide-tab-{{ $index }}" data-slide-index="{{ $index }}">
                                <div class="hero-config-card mb-4">
                                    <!-- Slide Top Bar -->
                                    <div class="hero-config-header">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-primary text-white rounded-circle" style="width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">{{ $index + 1 }}</span>
                                            <span class="fw-bold text-dark fs-14 slide-pane-heading-text">Slide {{ $index + 1 }} Configuration</span>
                                        </div>
                                        <button type="button" class="btn btn-outline-danger btn-sm px-2.5 py-1 rounded-2 btn-remove-slide d-flex align-items-center gap-1.5" title="Remove this slide">
                                            <i class="bi bi-trash3-fill"></i>
                                            <span>Remove Slide</span>
                                        </button>
                                    </div>

                                    <!-- Row 1: Top Badge & Icon/Emoji (Horizontal) -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-tag-fill text-primary"></i> Top Badge & Icon</div>
                                            <div class="hero-label-desc">Highlight tag & decorative emoji shown above the banner heading.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <div class="row g-2.5">
                                                <div class="col-md-7 col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-modern"><i class="bi bi-bookmark-fill text-warning me-1"></i> Badge</span>
                                                        <input type="text" name="slides[{{ $index }}][badge]" class="form-control modern-input field-badge" value="{{ old("slides.{$index}.badge", $slide['badge'] ?? '') }}" placeholder="e.g. Since 1976">
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-modern">Emoji / Icon</span>
                                                        <input type="text" name="slides[{{ $index }}][icon]" class="form-control modern-input field-icon" value="{{ old("slides.{$index}.icon", $slide['icon'] ?? '🌿') }}" placeholder="e.g. 🌿">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2: Main Heading (Horizontal) -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-type-h1 text-primary"></i> Main Heading</div>
                                            <div class="hero-label-desc">Primary hero banner headline. Both Enter / line breaks and &lt;br&gt; tags are preserved.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <textarea name="slides[{{ $index }}][heading]" rows="3" class="form-control modern-textarea field-heading fw-bold" style="font-size: 14.5px; letter-spacing: 0.3px; line-height: 1.4;" placeholder="THE ORIGINAL TASTE&#10;OF LUCKNOW">{{ old("slides.{$index}.heading", $slide['heading'] ?? '') }}</textarea>
                                            <div class="d-flex align-items-center justify-content-between mt-1 text-muted fs-11">
                                                <span><i class="bi bi-check-circle-fill text-success me-1"></i> Press <strong>Enter</strong> to break into new lines (or use <code>&lt;br&gt;</code>).</span>
                                            </div>
                                            <!-- Live Banner Preview Box -->
                                            <div class="mt-2 p-2.5 px-3 rounded-2 border d-flex flex-wrap align-items-center gap-2.5" style="background: #083b3c; color: #ffffff;">
                                                <span class="badge bg-warning text-dark fs-10 text-uppercase fw-bold"><i class="bi bi-eye-fill me-1"></i> Banner Preview:</span>
                                                <div class="slide-heading-live-preview fw-bold fs-14" style="line-height: 1.25; color: #ffffff;">
                                                    @php
                                                        $previewRaw = $slide['heading'] ?? 'THE ORIGINAL TASTE OF LUCKNOW';
                                                        $previewClean = preg_replace('/<br\s*\/?>/i', "\n", $previewRaw);
                                                        $previewLines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $previewClean))), function($l) { return $l !== ''; });
                                                    @endphp
                                                    @foreach($previewLines as $pl)
                                                        <span style="display: block; white-space: nowrap;">{{ $pl }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 3: Lead Highlight Text (Horizontal) -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-stars text-primary"></i> Lead Highlight</div>
                                            <div class="hero-label-desc">One-line bold catchphrase displayed directly below heading.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <input type="text" name="slides[{{ $index }}][lead]" class="form-control modern-input field-lead fw-semibold" value="{{ old("slides.{$index}.lead", $slide['lead'] ?? '') }}" placeholder="e.g. Soft. Creamy. Chilled. Unforgettable.">
                                        </div>
                                    </div>

                                    <!-- Row 4: Description Paragraph (Horizontal) -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-card-text text-primary"></i> Description</div>
                                            <div class="hero-label-desc">Story paragraph explaining Lucknow heritage, flavours, and craft.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <textarea name="slides[{{ $index }}][description]" rows="2" class="form-control modern-textarea field-description" placeholder="Slide description paragraph...">{{ old("slides.{$index}.description", $slide['description'] ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Row 5: Dynamic Action Buttons Customization -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-cursor-fill text-primary"></i> Action Buttons</div>
                                            <div class="hero-label-desc">Customizable CTA buttons. Keep 1, 2, 3 or more buttons with custom colors and links.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <div class="button-manager-box">
                                                <div class="button-manager-header">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="rounded-2 bg-primary text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                                            <i class="bi bi-cursor-fill fs-12"></i>
                                                        </div>
                                                        <div>
                                                            <div class="fw-bold text-dark fs-13 lh-sm">Action Buttons (CTA)</div>
                                                            <small class="text-muted fs-11">Configure call-to-action buttons, links, and color styles</small>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1.5 fs-12 fw-semibold btn-add-slide-button d-flex align-items-center gap-1.5 shadow-sm">
                                                        <i class="bi bi-plus-circle-fill"></i> Add Another Button
                                                    </button>
                                                </div>

                                                <div class="slide-buttons-list d-flex flex-column gap-2.5" data-slide-index="{{ $index }}">
                                                    @php
                                                        $slideButtons = $slide['buttons'] ?? [];
                                                        if (empty($slideButtons)) {
                                                            if (!empty($slide['btn1_text'])) $slideButtons[] = ['text' => $slide['btn1_text'], 'url' => $slide['btn1_url'] ?? '/menu', 'style' => 'amber'];
                                                            if (!empty($slide['btn2_text'])) $slideButtons[] = ['text' => $slide['btn2_text'], 'url' => $slide['btn2_url'] ?? '/menu', 'style' => 'spruce'];
                                                        }
                                                        if (empty($slideButtons)) {
                                                            $slideButtons = [
                                                                ['text' => 'ORDER NOW', 'url' => '/menu', 'style' => 'amber'],
                                                                ['text' => 'EXPLORE OUR MENU', 'url' => '/menu', 'style' => 'spruce'],
                                                            ];
                                                        }
                                                    @endphp
                                                    @foreach($slideButtons as $bIndex => $btn)
                                                        <div class="slide-button-row" data-btn-index="{{ $bIndex }}">
                                                            <!-- Header bar: Badge + Live Mini Preview + Remove Button -->
                                                            <div class="slide-btn-header-bar">
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                    <span class="slide-btn-badge slide-btn-label">
                                                                        <i class="bi bi-grip-vertical text-muted"></i> Button {{ $bIndex + 1 }}
                                                                    </span>
                                                                    <span class="text-muted fs-11">Live Preview:</span>
                                                                    <span class="slide-btn-preview-tag btn-preview-{{ $btn['style'] ?? 'amber' }}">
                                                                        {{ !empty($btn['text']) ? $btn['text'] : 'BUTTON TEXT' }}
                                                                    </span>
                                                                </div>
                                                                <button type="button" class="btn-remove-slide-button" title="Remove this button">
                                                                    <i class="bi bi-trash3"></i> <span>Remove</span>
                                                                </button>
                                                            </div>

                                                            <!-- Inputs: 3 Wide Columns with Clear Labels -->
                                                            <div class="row g-2.5">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <label class="slide-btn-field-label">Button Text</label>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-cursor-text"></i></span>
                                                                        <input type="text" name="slides[{{ $index }}][buttons][{{ $bIndex }}][text]" class="form-control field-btn-text modern-input" value="{{ $btn['text'] ?? '' }}" placeholder="e.g. ORDER NOW">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <label class="slide-btn-field-label">Destination Link / URL</label>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-link-45deg"></i></span>
                                                                        <input type="text" name="slides[{{ $index }}][buttons][{{ $bIndex }}][url]" class="form-control field-btn-url modern-input" value="{{ $btn['url'] ?? '/menu' }}" placeholder="e.g. /menu or https://...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <label class="slide-btn-field-label">Color Theme</label>
                                                                    <select name="slides[{{ $index }}][buttons][{{ $bIndex }}][style]" class="form-select form-select-sm field-btn-style modern-select fw-medium">
                                                                        <option value="amber" {{ ($btn['style'] ?? '') === 'amber' ? 'selected' : '' }}>🟡 Amber Gold (Primary)</option>
                                                                        <option value="spruce" {{ ($btn['style'] ?? '') === 'spruce' ? 'selected' : '' }}>🟢 Spruce (Deep Teal)</option>
                                                                        <option value="terracotta" {{ ($btn['style'] ?? '') === 'terracotta' ? 'selected' : '' }}>🔴 Terracotta (Coral)</option>
                                                                        <option value="crimson" {{ ($btn['style'] ?? '') === 'crimson' ? 'selected' : '' }}>🍷 Crimson (Ruby Red)</option>
                                                                        <option value="emerald" {{ ($btn['style'] ?? '') === 'emerald' ? 'selected' : '' }}>🌲 Emerald (Forest Green)</option>
                                                                        <option value="sapphire" {{ ($btn['style'] ?? '') === 'sapphire' ? 'selected' : '' }}>🔵 Sapphire (Royal Blue)</option>
                                                                        <option value="purple" {{ ($btn['style'] ?? '') === 'purple' ? 'selected' : '' }}>🟣 Purple (Majestic Plum)</option>
                                                                        <option value="sunset" {{ ($btn['style'] ?? '') === 'sunset' ? 'selected' : '' }}>🟠 Sunset (Warm Orange)</option>
                                                                        <option value="midnight" {{ ($btn['style'] ?? '') === 'midnight' ? 'selected' : '' }}>⚫ Midnight (Jet Black)</option>
                                                                        <option value="white" {{ ($btn['style'] ?? '') === 'white' ? 'selected' : '' }}>⚪ White (Clean Pearl)</option>
                                                                        <option value="outline-light" {{ ($btn['style'] ?? '') === 'outline-light' ? 'selected' : '' }}>🔲 Outline (Ghost White)</option>
                                                                        <option value="outline-amber" {{ ($btn['style'] ?? '') === 'outline-amber' ? 'selected' : '' }}>🟨 Outline (Gold)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 6: Slide Background Media (Horizontal) -->
                                    <div class="hero-row">
                                        <div class="hero-label-col">
                                            <div class="hero-label-title"><i class="bi bi-camera-reels-fill text-primary"></i> Background Media</div>
                                            <div class="hero-label-desc">Image, Animated GIF, or MP4 Video background for this carousel slide.</div>
                                        </div>
                                        <div class="hero-input-col">
                                            <div class="media-card-box">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-md-5 col-sm-12">
                                                        <label class="fs-12 fw-bold text-dark mb-1 d-block">Media Format Type:</label>
                                                        <select name="slides[{{ $index }}][media_type]" class="form-select form-select-sm slide-media-type-select modern-select fw-semibold mb-2.5">
                                                            <option value="image" {{ ($slide['media_type'] ?? '') === 'image' ? 'selected' : '' }}>🖼️ Static Image (JPG / PNG)</option>
                                                            <option value="gif" {{ ($slide['media_type'] ?? '') === 'gif' ? 'selected' : '' }}>🎞️ Animated GIF</option>
                                                            <option value="video" {{ ($slide['media_type'] ?? '') === 'video' ? 'selected' : '' }}>🎥 Video (MP4 / WebM)</option>
                                                        </select>

                                                        <label class="fs-12 fw-semibold text-muted upload-label-text mb-1 d-block">
                                                            {{ ($slide['media_type'] ?? '') === 'video' ? 'Upload Video File:' : (($slide['media_type'] ?? '') === 'gif' ? 'Upload GIF File:' : 'Upload Image File:') }}
                                                        </label>
                                                        <input type="file" name="slides[{{ $index }}][media_file]" class="form-control form-control-sm slide-media-input modern-input mb-1" accept="{{ ($slide['media_type'] ?? '') === 'video' ? 'video/mp4,video/webm' : 'image/*' }}">
                                                        <input type="hidden" name="slides[{{ $index }}][media]" class="slide-media-hidden" value="{{ $slide['media'] ?? 'images/dahi_vada.jpg' }}">
                                                        <small class="text-muted fs-11 d-block media-format-hint mt-1">
                                                            <i class="bi bi-check-circle text-success me-1"></i> Formats: JPG, PNG, WEBP, GIF, MP4.
                                                        </small>
                                                    </div>

                                                    <div class="col-md-7 col-sm-12">
                                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                                            <label class="fs-12 fw-bold text-dark mb-0">Live Visual Preview:</label>
                                                            <span class="badge bg-dark text-light fs-10 font-monospace text-truncate slide-preview-path" style="max-width: 220px;">
                                                                {{ $slide['media'] ?? 'images/dahi_vada.jpg' }}
                                                            </span>
                                                        </div>
                                                        <div class="overflow-hidden position-relative bg-dark media-preview-box" style="height: 160px;">
                                                            <video class="w-100 h-100 slide-preview-video" style="object-fit: cover; display: {{ ($slide['media_type'] ?? '') === 'video' ? 'block' : 'none' }};" autoplay muted loop playsinline src="{{ asset($slide['media'] ?? 'images/dahi_vada.jpg') }}"></video>
                                                            <img class="w-100 h-100 slide-preview-img" style="object-fit: cover; display: {{ ($slide['media_type'] ?? '') !== 'video' ? 'block' : 'none' }};" src="{{ asset($slide['media'] ?? 'images/dahi_vada.jpg') }}" alt="Preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-3 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Hero Section Changes</span>
                        </button>
                        <button type="reset" class="btn btn-light border px-3 py-2 text-muted">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Website
                        </a>
                    </div>
                </form>
            </div>

            <!-- ================= 2. HIGHLIGHTS STRIP PANEL ================= -->
            <div class="home-section-panel" id="panel_highlights_strip" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-info px-2.5 py-1.5 fs-12">Section 2</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Highlights Strip (3 Feature Cards)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-collection fs-32 text-info mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Highlights Strip Section</h6>
                    <p class="fs-13 text-muted mb-0">Is 3-cards strip ke titles, subtitles aur descriptions ka data yahan add hoga.</p>
                </div>
            </div>

            <!-- ================= 3. WELCOME SECTION PANEL ================= -->
            <div class="home-section-panel" id="panel_welcome_section" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-warning text-dark px-2.5 py-1.5 fs-12">Section 3</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Welcome To GPO (Sant Ram Gupta Ji Story)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-award fs-32 text-warning mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Welcome & Legacy Section</h6>
                    <p class="fs-13 text-muted mb-0">Founder info, paragraphs, image aur button ka data yahan aayega.</p>
                </div>
            </div>

            <!-- ================= 4. WHY GPO PANEL ================= -->
            <div class="home-section-panel" id="panel_why_gpo" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success px-2.5 py-1.5 fs-12">Section 4</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Why People Love GPO (6 Key Highlights)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-check-circle fs-32 text-success mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Why GPO 6 Points Section</h6>
                    <p class="fs-13 text-muted mb-0">Points (Since 1976, The Original Experience, Authentic Flavours, etc.) ka data yahan aayega.</p>
                </div>
            </div>

            <!-- ================= 5. SIGNATURE DISH PANEL ================= -->
            <div class="home-section-panel" id="panel_signature_dish" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger px-2.5 py-1.5 fs-12">Section 5</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Star of GPO (Thandey Dahi Bade)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-star-fill fs-32 text-danger mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Star Signature Dish Section</h6>
                    <p class="fs-13 text-muted mb-0">Signature dish content, tagline aur photo fields yahan aayenge.</p>
                </div>
            </div>

            <!-- ================= 6. FAVOURITE DISHES PANEL ================= -->
            <div class="home-section-panel" id="panel_favourite_dishes" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-dark px-2.5 py-1.5 fs-12">Section 6</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">More Than Just Dahi Bade (Dishes Menu)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-cup-hot fs-32 text-dark mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Favourite Dishes Section</h6>
                    <p class="fs-13 text-muted mb-0">6 dishes (Dahi Bade, Chilla, Samosa, Chaat, etc.) ka data yahan aayega.</p>
                </div>
            </div>

            <!-- ================= 7. GPO EXPERIENCE PANEL ================= -->
            <div class="home-section-panel" id="panel_gpo_experience" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 7</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">The GPO Experience (Culture & Features)</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-stars fs-32 text-primary mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">The GPO Experience Section</h6>
                    <p class="fs-13 text-muted mb-0">Traditional taste, familiar comfort, freshly prepared info yahan manage hoga.</p>
                </div>
            </div>

            <!-- ================= 8. TESTIMONIALS PANEL ================= -->
            <div class="home-section-panel" id="panel_testimonials" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-warning text-dark px-2.5 py-1.5 fs-12">Section 8</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Customer Reviews & Testimonials</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-chat-heart fs-32 text-warning mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Customer Reviews Section</h6>
                    <p class="fs-13 text-muted mb-0">Customer ratings, feedback reviews aur titles yahan aayenge.</p>
                </div>
            </div>

            <!-- ================= 9. VISIT US PANEL ================= -->
            <div class="home-section-panel" id="panel_visit_us" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-info px-2.5 py-1.5 fs-12">Section 9</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Visit Us & Store Information</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-geo-alt-fill fs-32 text-info mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Store & Location Section</h6>
                    <p class="fs-13 text-muted mb-0">Hazratganj store address, timings, phone, email aur map link yahan aayenge.</p>
                </div>
            </div>

            <!-- ================= 10. FRANCHISE CTA PANEL ================= -->
            <div class="home-section-panel" id="panel_franchise_cta" style="display: none;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary px-2.5 py-1.5 fs-12">Section 10</span>
                        <h6 class="fw-bold text-dark mb-0 fs-15">Franchise & Business Expansion CTA</h6>
                    </div>
                </div>
                <div class="p-4 text-center text-muted border border-dashed rounded-3 bg-light-subtle">
                    <i class="bi bi-briefcase fs-32 text-secondary mb-2 d-block"></i>
                    <h6 class="fw-bold text-dark mb-1">Franchise CTA Section</h6>
                    <p class="fs-13 text-muted mb-0">Franchise call-to-action text, buttons aur banner info yahan add hoga.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Section Selector Dropdown
        const selector = document.getElementById('homeSectionSelector');
        const panels = document.querySelectorAll('.home-section-panel');

        function switchSection() {
            const selectedVal = selector.value;
            panels.forEach(panel => {
                if (panel.id === 'panel_' + selectedVal) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
        }

        if (selector) {
            selector.addEventListener('change', switchSection);
            switchSection();
        }

        // ================= SLIDES ADD / REMOVE / MEDIA / BUTTONS LOGIC =================
        const tabsContainer = document.getElementById('heroSlideTabs');
        const panesContainer = document.getElementById('heroSlideTabsContent');
        const addSlideBtn = document.getElementById('btnAddSlideBtn');
        const slideCountText = document.getElementById('slideCountText');

        function reindexButtons(pane) {
            const slideIdx = pane.getAttribute('data-slide-index');
            const rows = pane.querySelectorAll('.slide-button-row');
            rows.forEach((row, bIdx) => {
                row.setAttribute('data-btn-index', bIdx);
                const label = row.querySelector('.slide-btn-label');
                if (label) label.innerHTML = `<i class="bi bi-grip-vertical text-muted"></i> Button ${bIdx + 1}`;

                const textInput = row.querySelector('.field-btn-text');
                if (textInput) textInput.setAttribute('name', `slides[${slideIdx}][buttons][${bIdx}][text]`);

                const urlInput = row.querySelector('.field-btn-url');
                if (urlInput) urlInput.setAttribute('name', `slides[${slideIdx}][buttons][${bIdx}][url]`);

                const styleSelect = row.querySelector('.field-btn-style');
                if (styleSelect) styleSelect.setAttribute('name', `slides[${slideIdx}][buttons][${bIdx}][style]`);
            });
        }

        function bindButtonRowEvents(row) {
            const textInput = row.querySelector('.field-btn-text');
            const styleSelect = row.querySelector('.field-btn-style');
            const previewTag = row.querySelector('.slide-btn-preview-tag');

            if (textInput && previewTag) {
                textInput.addEventListener('input', function () {
                    previewTag.textContent = this.value.trim() || 'BUTTON TEXT';
                });
            }

            if (styleSelect && previewTag) {
                styleSelect.addEventListener('change', function () {
                    previewTag.className = 'slide-btn-preview-tag btn-preview-' + this.value;
                });
            }
        }

        function bindRemoveButtonEvent(row, pane) {
            const removeBtn = row.querySelector('.btn-remove-slide-button');
            if (removeBtn) {
                removeBtn.addEventListener('click', function () {
                    const buttonsList = pane.querySelector('.slide-buttons-list');
                    const rows = buttonsList ? buttonsList.querySelectorAll('.slide-button-row') : [];
                    if (rows.length <= 1) {
                        if (!confirm('Kya aap is aakhiri button ko bhi hatana chahte hain? (Slide bina kisi button ke dikhegi)')) {
                            return;
                        }
                    }
                    row.remove();
                    reindexButtons(pane);
                });
            }
        }

        function bindSlideEvents(pane) {
            // Live Heading Preview
            const headingInput = pane.querySelector('.field-heading');
            const headingPreview = pane.querySelector('.slide-heading-live-preview');
            if (headingInput && headingPreview) {
                const updateHeadingPreview = () => {
                    const rawVal = headingInput.value || '';
                    if (!rawVal.trim()) {
                        headingPreview.innerHTML = '<span class="text-white-50 fst-italic fs-12">(Enter heading above to preview line breaks)</span>';
                    } else {
                        // Escape HTML, then turn intentional <br> or newlines into actual <br> tags
                        let escaped = rawVal
                            .replace(/&/g, '&amp;')
                            .replace(/</g, '&lt;')
                            .replace(/>/g, '&gt;')
                            .replace(/"/g, '&quot;')
                            .replace(/'/g, '&#039;');
                        escaped = escaped.replace(/&lt;br\s*\/?&gt;/gi, '\n');
                        const lines = escaped.split(/\r\n|\r|\n/)
                            .map(l => l.trim())
                            .filter(l => l.length > 0);
                        headingPreview.innerHTML = lines.map(l => `<span style="display: block; white-space: nowrap;">${l}</span>`).join('');
                    }
                };
                headingInput.addEventListener('input', updateHeadingPreview);
                if (headingInput.value && headingInput.value.trim()) {
                    updateHeadingPreview();
                }
            }

            // Media Type select change
            const typeSelect = pane.querySelector('.slide-media-type-select');
            const videoEl = pane.querySelector('.slide-preview-video');
            const imgEl = pane.querySelector('.slide-preview-img');
            const badgeEl = pane.querySelector('.media-type-badge');
            const uploadLabel = pane.querySelector('.upload-label-text');
            const fileInput = pane.querySelector('.slide-media-input');
            const removeBtn = pane.querySelector('.btn-remove-slide');

            if (typeSelect) {
                typeSelect.addEventListener('change', function () {
                    const val = this.value;
                    if (badgeEl) badgeEl.textContent = val;

                    if (val === 'video') {
                        if (videoEl) videoEl.style.display = 'block';
                        if (imgEl) imgEl.style.display = 'none';
                        if (uploadLabel) uploadLabel.textContent = 'Upload New Video (MP4/WebM)';
                        if (fileInput) fileInput.accept = 'video/mp4,video/webm';
                    } else if (val === 'gif') {
                        if (videoEl) videoEl.style.display = 'none';
                        if (imgEl) imgEl.style.display = 'block';
                        if (uploadLabel) uploadLabel.textContent = 'Upload Animated GIF';
                        if (fileInput) fileInput.accept = 'image/gif';
                    } else {
                        if (videoEl) videoEl.style.display = 'none';
                        if (imgEl) imgEl.style.display = 'block';
                        if (uploadLabel) uploadLabel.textContent = 'Upload New Image';
                        if (fileInput) fileInput.accept = 'image/*';
                    }
                });
            }

            // File input preview
            if (fileInput) {
                fileInput.addEventListener('change', function () {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        const fileType = file.type;
                        const objectUrl = URL.createObjectURL(file);
                        const pathText = pane.querySelector('.slide-preview-path');
                        if (pathText) pathText.textContent = file.name;

                        if (fileType.startsWith('video/')) {
                            if (typeSelect) typeSelect.value = 'video';
                            if (badgeEl) badgeEl.textContent = 'video';
                            if (videoEl) {
                                videoEl.src = objectUrl;
                                videoEl.style.display = 'block';
                                videoEl.play().catch(() => {});
                            }
                            if (imgEl) imgEl.style.display = 'none';
                        } else if (fileType === 'image/gif') {
                            if (typeSelect) typeSelect.value = 'gif';
                            if (badgeEl) badgeEl.textContent = 'gif';
                            if (imgEl) {
                                imgEl.src = objectUrl;
                                imgEl.style.display = 'block';
                            }
                            if (videoEl) videoEl.style.display = 'none';
                        } else {
                            if (typeSelect) typeSelect.value = 'image';
                            if (badgeEl) badgeEl.textContent = 'image';
                            if (imgEl) {
                                imgEl.src = objectUrl;
                                imgEl.style.display = 'block';
                            }
                            if (videoEl) videoEl.style.display = 'none';
                        }
                    }
                });
            }

            // Remove Slide button
            if (removeBtn) {
                removeBtn.addEventListener('click', function () {
                    const allPanes = panesContainer.querySelectorAll('.slide-tab-pane');
                    if (allPanes.length <= 1) {
                        alert('Kam se kam ek slide rehna anivarya hai! Aap ise remove nahi kar sakte.');
                        return;
                    }

                    if (confirm('Kya aap sach me is slide ko remove karna chahte hain?')) {
                        const paneIndex = pane.getAttribute('data-slide-index');
                        const correspondingTab = tabsContainer.querySelector(`.slide-nav-item[data-slide-index="${paneIndex}"]`);

                        pane.remove();
                        if (correspondingTab) correspondingTab.remove();

                        reindexSlides();

                        // Activate first tab
                        const firstTabBtn = tabsContainer.querySelector('.nav-link');
                        if (firstTabBtn) {
                            const tab = new bootstrap.Tab(firstTabBtn);
                            tab.show();
                        }
                    }
                });
            }

            // Dynamic Buttons Add / Remove logic inside this slide pane
            const addBtn = pane.querySelector('.btn-add-slide-button');
            const buttonsList = pane.querySelector('.slide-buttons-list');

            if (addBtn && buttonsList) {
                addBtn.addEventListener('click', function () {
                    const currentButtons = buttonsList.querySelectorAll('.slide-button-row');
                    const newBtnIdx = currentButtons.length;
                    const slideIdx = pane.getAttribute('data-slide-index');

                    const newRow = document.createElement('div');
                    newRow.className = 'slide-button-row';
                    newRow.setAttribute('data-btn-index', newBtnIdx);
                    newRow.innerHTML = `
                        <!-- Header bar: Badge + Live Mini Preview + Remove Button -->
                        <div class="slide-btn-header-bar">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <span class="slide-btn-badge slide-btn-label">
                                    <i class="bi bi-grip-vertical text-muted"></i> Button ${newBtnIdx + 1}
                                </span>
                                <span class="text-muted fs-11">Live Preview:</span>
                                <span class="slide-btn-preview-tag btn-preview-terracotta">
                                    SPECIAL OFFER
                                </span>
                            </div>
                            <button type="button" class="btn-remove-slide-button" title="Remove this button">
                                <i class="bi bi-trash3"></i> <span>Remove</span>
                            </button>
                        </div>

                        <!-- Inputs: 3 Wide Columns with Clear Labels -->
                        <div class="row g-2.5">
                            <div class="col-md-4 col-sm-12">
                                <label class="slide-btn-field-label">Button Text</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-cursor-text"></i></span>
                                    <input type="text" name="slides[${slideIdx}][buttons][${newBtnIdx}][text]" class="form-control field-btn-text modern-input" value="SPECIAL OFFER" placeholder="e.g. SPECIAL OFFER">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="slide-btn-field-label">Destination Link / URL</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light text-muted"><i class="bi bi-link-45deg"></i></span>
                                    <input type="text" name="slides[${slideIdx}][buttons][${newBtnIdx}][url]" class="form-control field-btn-url modern-input" value="/menu" placeholder="e.g. /menu or https://...">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label class="slide-btn-field-label">Color Theme</label>
                                <select name="slides[${slideIdx}][buttons][${newBtnIdx}][style]" class="form-select form-select-sm field-btn-style modern-select fw-medium">
                                    <option value="amber">🟡 Amber Gold (Primary)</option>
                                    <option value="spruce">🟢 Spruce (Deep Teal)</option>
                                    <option value="terracotta" selected>🔴 Terracotta (Coral)</option>
                                    <option value="crimson">🍷 Crimson (Ruby Red)</option>
                                    <option value="emerald">🌲 Emerald (Forest Green)</option>
                                    <option value="sapphire">🔵 Sapphire (Royal Blue)</option>
                                    <option value="purple">🟣 Purple (Majestic Plum)</option>
                                    <option value="sunset">🟠 Sunset (Warm Orange)</option>
                                    <option value="midnight">⚫ Midnight (Jet Black)</option>
                                    <option value="white">⚪ White (Clean Pearl)</option>
                                    <option value="outline-light">🔲 Outline (Ghost White)</option>
                                    <option value="outline-amber">🟨 Outline (Gold)</option>
                                </select>
                            </div>
                        </div>
                    `;
                    buttonsList.appendChild(newRow);
                    bindRemoveButtonEvent(newRow, pane);
                    bindButtonRowEvents(newRow);
                    reindexButtons(pane);
                });
            }

            // Bind remove button & live preview to existing rows in this pane
            pane.querySelectorAll('.slide-button-row').forEach(row => {
                bindRemoveButtonEvent(row, pane);
                bindButtonRowEvents(row);
            });
        }

        function reindexSlides() {
            const tabItems = tabsContainer.querySelectorAll('.slide-nav-item');
            const panes = panesContainer.querySelectorAll('.slide-tab-pane');

            tabItems.forEach((tabItem, idx) => {
                tabItem.setAttribute('data-slide-index', idx);
                const btn = tabItem.querySelector('.nav-link');
                const badge = tabItem.querySelector('.slide-tab-number');
                const title = tabItem.querySelector('.slide-tab-title');

                if (btn) {
                    btn.id = `slide-tab-${idx}`;
                    btn.setAttribute('data-bs-target', `#slide-pane-${idx}`);
                    btn.setAttribute('aria-controls', `slide-pane-${idx}`);
                }
                if (badge) badge.textContent = idx + 1;
                if (title) title.textContent = `Slide ${idx + 1}`;
            });

            panes.forEach((pane, idx) => {
                pane.setAttribute('data-slide-index', idx);
                pane.id = `slide-pane-${idx}`;
                pane.setAttribute('aria-labelledby', `slide-tab-${idx}`);

                const headingText = pane.querySelector('.slide-pane-heading-text');
                if (headingText) headingText.textContent = `Slide ${idx + 1} Configuration`;

                // Update input names for non-button fields
                pane.querySelectorAll('input, textarea, select').forEach(field => {
                    const name = field.getAttribute('name');
                    if (name && name.includes('slides[') && !name.includes('[buttons]')) {
                        const updatedName = name.replace(/slides\[\d+\]/, `slides[${idx}]`);
                        field.setAttribute('name', updatedName);
                    }
                });

                // Update dynamic button names
                reindexButtons(pane);
            });

            if (slideCountText) {
                slideCountText.textContent = panes.length;
            }
        }

        // Bind existing panes
        panesContainer.querySelectorAll('.slide-tab-pane').forEach(pane => {
            bindSlideEvents(pane);
        });

        // Add New Slide button click
        if (addSlideBtn) {
            addSlideBtn.addEventListener('click', function () {
                const currentCount = panesContainer.querySelectorAll('.slide-tab-pane').length;
                const newIndex = currentCount;

                // 1. Create new Tab Nav Item
                const tabLi = document.createElement('li');
                tabLi.className = 'nav-item slide-nav-item';
                tabLi.setAttribute('role', 'presentation');
                tabLi.setAttribute('data-slide-index', newIndex);
                tabLi.innerHTML = `
                    <button class="nav-link fw-semibold px-3 py-2 d-flex align-items-center gap-2" id="slide-tab-${newIndex}" data-bs-toggle="pill" data-bs-target="#slide-pane-${newIndex}" type="button" role="tab" aria-controls="slide-pane-${newIndex}" aria-selected="false">
                        <span class="badge bg-secondary text-white rounded-circle slide-tab-number" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">${newIndex + 1}</span>
                        <span class="slide-tab-title">Slide ${newIndex + 1}</span>
                    </button>
                `;
                tabsContainer.appendChild(tabLi);

                // 2. Create new Tab Pane
                const paneDiv = document.createElement('div');
                paneDiv.className = 'tab-pane fade slide-tab-pane';
                paneDiv.id = `slide-pane-${newIndex}`;
                paneDiv.setAttribute('role', 'tabpanel');
                paneDiv.setAttribute('aria-labelledby', `slide-tab-${newIndex}`);
                paneDiv.setAttribute('data-slide-index', newIndex);
                paneDiv.innerHTML = `
                    <div class="hero-config-card mb-4">
                        <!-- Slide Top Bar -->
                        <div class="hero-config-header">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary text-white rounded-circle" style="width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">${newIndex + 1}</span>
                                <span class="fw-bold text-dark fs-14 slide-pane-heading-text">Slide ${newIndex + 1} Configuration</span>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm px-2.5 py-1 rounded-2 btn-remove-slide d-flex align-items-center gap-1.5" title="Remove this slide">
                                <i class="bi bi-trash3-fill"></i>
                                <span>Remove Slide</span>
                            </button>
                        </div>

                        <!-- Row 1: Top Badge & Icon/Emoji (Horizontal) -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-tag-fill text-primary"></i> Top Badge & Icon</div>
                                <div class="hero-label-desc">Highlight tag & decorative emoji shown above the banner heading.</div>
                            </div>
                            <div class="hero-input-col">
                                <div class="row g-2.5">
                                    <div class="col-md-7 col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-text input-group-text-modern"><i class="bi bi-bookmark-fill text-warning me-1"></i> Badge</span>
                                            <input type="text" name="slides[${newIndex}][badge]" class="form-control modern-input field-badge" placeholder="e.g. New Speciality">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-text input-group-text-modern">Emoji / Icon</span>
                                            <input type="text" name="slides[${newIndex}][icon]" class="form-control modern-input field-icon" value="🌿" placeholder="e.g. 🌿">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: Main Heading (Horizontal) -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-type-h1 text-primary"></i> Main Heading</div>
                                <div class="hero-label-desc">Primary hero banner headline. Both Enter / line breaks and &lt;br&gt; tags are preserved.</div>
                            </div>
                            <div class="hero-input-col">
                                <textarea name="slides[${newIndex}][heading]" rows="3" class="form-control modern-textarea field-heading fw-bold" style="font-size: 14.5px; letter-spacing: 0.3px; line-height: 1.4;" placeholder="Enter bold heading for this slide..."></textarea>
                                <div class="d-flex align-items-center justify-content-between mt-1 text-muted fs-11">
                                    <span><i class="bi bi-check-circle-fill text-success me-1"></i> Press <strong>Enter</strong> to break into new lines (or use <code>&lt;br&gt;</code>).</span>
                                </div>
                                <div class="mt-2 p-2.5 px-3 rounded-2 border d-flex flex-wrap align-items-center gap-2.5" style="background: #083b3c; color: #ffffff;">
                                    <span class="badge bg-warning text-dark fs-10 text-uppercase fw-bold"><i class="bi bi-eye-fill me-1"></i> Banner Preview:</span>
                                    <div class="slide-heading-live-preview fw-bold fs-14" style="line-height: 1.25; color: #ffffff;">
                                        (Enter heading above to preview)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Lead Highlight Text (Horizontal) -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-stars text-primary"></i> Lead Highlight</div>
                                <div class="hero-label-desc">One-line bold catchphrase displayed directly below heading.</div>
                            </div>
                            <div class="hero-input-col">
                                <input type="text" name="slides[${newIndex}][lead]" class="form-control modern-input field-lead fw-semibold" placeholder="Short bold highlight line...">
                            </div>
                        </div>

                        <!-- Row 4: Description Paragraph (Horizontal) -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-card-text text-primary"></i> Description</div>
                                <div class="hero-label-desc">Story paragraph explaining Lucknow heritage, flavours, and craft.</div>
                            </div>
                            <div class="hero-input-col">
                                <textarea name="slides[${newIndex}][description]" rows="2" class="form-control modern-textarea field-description" placeholder="Slide description paragraph..."></textarea>
                            </div>
                        </div>

                        <!-- Row 5: Dynamic Action Buttons Customization -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-cursor-fill text-primary"></i> Action Buttons</div>
                                <div class="hero-label-desc">Customizable CTA buttons. Keep 1, 2, 3 or more buttons with custom colors and links.</div>
                            </div>
                            <div class="hero-input-col">
                                <div class="button-manager-box">
                                    <div class="button-manager-header">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-2 bg-primary text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                                <i class="bi bi-cursor-fill fs-12"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark fs-13 lh-sm">Action Buttons (CTA)</div>
                                                <small class="text-muted fs-11">Configure call-to-action buttons, links, and color styles</small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 py-1.5 fs-12 fw-semibold btn-add-slide-button d-flex align-items-center gap-1.5 shadow-sm">
                                            <i class="bi bi-plus-circle-fill"></i> Add Another Button
                                        </button>
                                    </div>

                                    <div class="slide-buttons-list d-flex flex-column gap-2.5" data-slide-index="${newIndex}">
                                        <!-- Button 1 -->
                                        <div class="slide-button-row" data-btn-index="0">
                                            <div class="slide-btn-header-bar">
                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                    <span class="slide-btn-badge slide-btn-label">
                                                        <i class="bi bi-grip-vertical text-muted"></i> Button 1
                                                    </span>
                                                    <span class="text-muted fs-11">Live Preview:</span>
                                                    <span class="slide-btn-preview-tag btn-preview-amber">
                                                        ORDER NOW
                                                    </span>
                                                </div>
                                                <button type="button" class="btn-remove-slide-button" title="Remove this button">
                                                    <i class="bi bi-trash3"></i> <span>Remove</span>
                                                </button>
                                            </div>
                                            <div class="row g-2.5">
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Button Text</label>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-cursor-text"></i></span>
                                                        <input type="text" name="slides[${newIndex}][buttons][0][text]" class="form-control field-btn-text modern-input" value="ORDER NOW" placeholder="e.g. ORDER NOW">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Destination Link / URL</label>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-link-45deg"></i></span>
                                                        <input type="text" name="slides[${newIndex}][buttons][0][url]" class="form-control field-btn-url modern-input" value="/menu" placeholder="e.g. /menu or https://...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Color Theme</label>
                                                    <select name="slides[${newIndex}][buttons][0][style]" class="form-select form-select-sm field-btn-style modern-select fw-medium">
                                                        <option value="amber" selected>🟡 Amber Gold (Primary)</option>
                                                        <option value="spruce">🟢 Spruce (Deep Teal)</option>
                                                        <option value="terracotta">🔴 Terracotta (Coral)</option>
                                                        <option value="crimson">🍷 Crimson (Ruby Red)</option>
                                                        <option value="emerald">🌲 Emerald (Forest Green)</option>
                                                        <option value="sapphire">🔵 Sapphire (Royal Blue)</option>
                                                        <option value="purple">🟣 Purple (Majestic Plum)</option>
                                                        <option value="sunset">🟠 Sunset (Warm Orange)</option>
                                                        <option value="midnight">⚫ Midnight (Jet Black)</option>
                                                        <option value="white">⚪ White (Clean Pearl)</option>
                                                        <option value="outline-light">🔲 Outline (Ghost White)</option>
                                                        <option value="outline-amber">🟨 Outline (Gold)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button 2 -->
                                        <div class="slide-button-row" data-btn-index="1">
                                            <div class="slide-btn-header-bar">
                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                    <span class="slide-btn-badge slide-btn-label">
                                                        <i class="bi bi-grip-vertical text-muted"></i> Button 2
                                                    </span>
                                                    <span class="text-muted fs-11">Live Preview:</span>
                                                    <span class="slide-btn-preview-tag btn-preview-spruce">
                                                        EXPLORE OUR MENU
                                                    </span>
                                                </div>
                                                <button type="button" class="btn-remove-slide-button" title="Remove this button">
                                                    <i class="bi bi-trash3"></i> <span>Remove</span>
                                                </button>
                                            </div>
                                            <div class="row g-2.5">
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Button Text</label>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-cursor-text"></i></span>
                                                        <input type="text" name="slides[${newIndex}][buttons][1][text]" class="form-control field-btn-text modern-input" value="EXPLORE OUR MENU" placeholder="e.g. EXPLORE OUR MENU">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Destination Link / URL</label>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-light text-muted"><i class="bi bi-link-45deg"></i></span>
                                                        <input type="text" name="slides[${newIndex}][buttons][1][url]" class="form-control field-btn-url modern-input" value="/menu" placeholder="e.g. /menu or https://...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label class="slide-btn-field-label">Color Theme</label>
                                                    <select name="slides[${newIndex}][buttons][1][style]" class="form-select form-select-sm field-btn-style modern-select fw-medium">
                                                        <option value="amber">🟡 Amber Gold (Primary)</option>
                                                        <option value="spruce" selected>🟢 Spruce (Deep Teal)</option>
                                                        <option value="terracotta">🔴 Terracotta (Coral)</option>
                                                        <option value="crimson">🍷 Crimson (Ruby Red)</option>
                                                        <option value="emerald">🌲 Emerald (Forest Green)</option>
                                                        <option value="sapphire">🔵 Sapphire (Royal Blue)</option>
                                                        <option value="purple">🟣 Purple (Majestic Plum)</option>
                                                        <option value="sunset">🟠 Sunset (Warm Orange)</option>
                                                        <option value="midnight">⚫ Midnight (Jet Black)</option>
                                                        <option value="white">⚪ White (Clean Pearl)</option>
                                                        <option value="outline-light">🔲 Outline (Ghost White)</option>
                                                        <option value="outline-amber">🟨 Outline (Gold)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 6: Slide Background Media (Horizontal) -->
                        <div class="hero-row">
                            <div class="hero-label-col">
                                <div class="hero-label-title"><i class="bi bi-camera-reels-fill text-primary"></i> Background Media</div>
                                <div class="hero-label-desc">Image, Animated GIF, or MP4 Video background for this carousel slide.</div>
                            </div>
                            <div class="hero-input-col">
                                <div class="media-card-box">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-5 col-sm-12">
                                            <label class="fs-12 fw-bold text-dark mb-1 d-block">Media Format Type:</label>
                                            <select name="slides[${newIndex}][media_type]" class="form-select form-select-sm slide-media-type-select modern-select fw-semibold mb-2.5">
                                                <option value="image" selected>🖼️ Static Image (JPG / PNG)</option>
                                                <option value="gif">🎞️ Animated GIF</option>
                                                <option value="video">🎥 Video (MP4 / WebM)</option>
                                            </select>

                                            <label class="fs-12 fw-semibold text-muted upload-label-text mb-1 d-block">
                                                Upload Image File:
                                            </label>
                                            <input type="file" name="slides[${newIndex}][media_file]" class="form-control form-control-sm slide-media-input modern-input mb-1" accept="image/*">
                                            <input type="hidden" name="slides[${newIndex}][media]" class="slide-media-hidden" value="images/dahi_vada.jpg">
                                            <small class="text-muted fs-11 d-block media-format-hint mt-1">
                                                <i class="bi bi-check-circle text-success me-1"></i> Formats: JPG, PNG, WEBP, GIF, MP4.
                                            </small>
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <label class="fs-12 fw-bold text-dark mb-0">Live Visual Preview:</label>
                                                <span class="badge bg-dark text-light fs-10 font-monospace text-truncate slide-preview-path" style="max-width: 220px;">
                                                    images/dahi_vada.jpg (Default)
                                                </span>
                                            </div>
                                            <div class="overflow-hidden position-relative bg-dark media-preview-box" style="height: 160px;">
                                                <video class="w-100 h-100 slide-preview-video" style="object-fit: cover; display: none;" autoplay muted loop playsinline></video>
                                                <img class="w-100 h-100 slide-preview-img" style="object-fit: cover; display: block;" src="{{ asset('images/dahi_vada.jpg') }}" alt="Preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                panesContainer.appendChild(paneDiv);

                // Bind events to new pane
                bindSlideEvents(paneDiv);
                reindexSlides();

                // Switch to newly added tab
                const newTabBtn = tabLi.querySelector('.nav-link');
                if (newTabBtn) {
                    const bsTab = new bootstrap.Tab(newTabBtn);
                    bsTab.show();
                }
            });
        }
    });
</script>
@endpush
