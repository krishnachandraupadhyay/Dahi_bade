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
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-info px-2.5 py-1.5 fs-12">Section 2</span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-16">Highlights Strip (3 Feature Cards Below Hero)</h6>
                            <small class="text-muted fs-12">Edit background images, headings, subheadings & short paragraphs for the 3 feature cards.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 fs-12 rounded-pill fw-semibold">
                            <i class="bi bi-shield-check me-1"></i> Card Height Locked (360px)
                        </span>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-12"></i> View Live
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.website-pages.home.highlights.update') }}" method="POST" enctype="multipart/form-data" id="highlightsStripForm">
                    @csrf

                    <div class="row g-4">
                        @foreach($highlights ?? [] as $index => $card)
                            @php
                                $cardImage = $card['image'] ?? ('images/' . ($index === 0 ? 'dahi_vada.jpg' : ($index === 1 ? 'lucknow_heritage.jpg' : 'chaat.jpg')));
                                $cardImageSrc = str_starts_with($cardImage, 'http') ? $cardImage : asset($cardImage);
                            @endphp
                            <!-- Card {{ $index + 1 }} (Ek ke Niche Ek) -->
                            <div class="col-12">
                                <div class="card border border-light-subtle shadow-sm highlight-editor-card" data-card-index="{{ $index }}" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                    <!-- Card Header -->
                                    <div class="card-header bg-white py-3 px-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-items-center gap-2.5">
                                            <span class="badge bg-primary px-3 py-1.5 fs-12 fw-bold rounded-pill">
                                                <i class="bi bi-card-heading me-1"></i> Card {{ $index + 1 }}
                                            </span>
                                            <h6 class="fs-14 fw-bold text-dark mb-0 card-header-title">
                                                {{ !empty($card['heading']) ? $card['heading'] : 'Card ' . ($index + 1) . ' Title' }}
                                            </h6>
                                        </div>
                                        <span class="badge bg-light text-muted border px-2.5 py-1 fs-11">
                                            Highlights Strip Item {{ $index + 1 }} of 3
                                        </span>
                                    </div>

                                    <!-- Card Body with Left Inputs and Right Live Card Preview -->
                                    <div class="card-body p-4">
                                        <div class="row g-4 align-items-stretch">
                                            <!-- Left Side: Inputs -->
                                            <div class="col-lg-7 col-md-12 d-flex flex-column gap-3 justify-content-between">
                                                <div class="row g-3">
                                                    <!-- Subheading (Gold Accent) -->
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                            <i class="bi bi-stars text-warning me-1"></i> Subheading / Gold Accent:
                                                        </label>
                                                        <input type="text"
                                                               name="cards[{{ $index }}][subheading]"
                                                               class="form-control form-control-sm modern-input highlight-subheading-input"
                                                               value="{{ $card['subheading'] ?? '' }}"
                                                               placeholder="e.g. Since 1976 / ABOUT OUR HERITAGE">
                                                        <small class="text-muted fs-11">Card par golden italic font me dikhta hai.</small>
                                                    </div>

                                                    <!-- Main Heading -->
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                            <i class="bi bi-type-h1 text-primary me-1"></i> Main Heading / Title:
                                                        </label>
                                                        <input type="text"
                                                               name="cards[{{ $index }}][heading]"
                                                               class="form-control form-control-sm modern-input highlight-heading-input"
                                                               value="{{ $card['heading'] ?? '' }}"
                                                               placeholder="e.g. THE ORIGINAL TASTE OF LUCKNOW">
                                                        <small class="text-muted fs-11">Card ka bold main title.</small>
                                                    </div>
                                                </div>

                                                <!-- Short Paragraph -->
                                                <div>
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                        <i class="bi bi-text-paragraph text-success me-1"></i> Short Paragraph / Description:
                                                    </label>
                                                    <textarea name="cards[{{ $index }}][description]"
                                                              rows="3"
                                                              class="form-control form-control-sm modern-input highlight-desc-input"
                                                              placeholder="Enter brief description (1-2 lines)...">{{ $card['description'] ?? '' }}</textarea>
                                                    <small class="text-muted fs-11">Card ke bottom me clean 1-2 lines description.</small>
                                                </div>

                                                <!-- Card Image Upload -->
                                                <div class="p-3 bg-light rounded-3 border border-light-subtle">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1 d-flex align-items-center justify-content-between">
                                                        <span><i class="bi bi-image-fill text-info me-1"></i> Card Background Image:</span>
                                                        <span class="badge bg-info-subtle text-info fs-10 border border-info-subtle">
                                                            <i class="bi bi-lock-fill me-0.5"></i> Height locked 360px
                                                        </span>
                                                    </label>
                                                    <input type="file"
                                                           name="cards[{{ $index }}][image_file]"
                                                           class="form-control form-control-sm highlight-image-file-input mb-1 bg-white"
                                                           accept="image/*">
                                                    <input type="hidden"
                                                           name="cards[{{ $index }}][image]"
                                                           class="highlight-image-path-hidden"
                                                           value="{{ $card['image'] ?? '' }}">
                                                    <div class="d-flex align-items-center justify-content-between mt-1.5">
                                                        <span class="text-muted fs-11 text-truncate highlight-image-path-display font-monospace" style="max-width: 350px;">
                                                            <i class="bi bi-folder2-open me-1"></i> Current: {{ $card['image'] ?? 'Default Image' }}
                                                        </span>
                                                        <small class="text-muted fs-11">Badi image bhi exact fit hogi</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Side: Live Card Replica Mockup -->
                                            <div class="col-lg-5 col-md-12">
                                                <div class="d-flex flex-column h-100">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <label class="fs-11 fw-bold text-muted text-uppercase mb-0 letter-spacing-1">
                                                            <i class="bi bi-eye-fill me-1 text-primary"></i> Live Card {{ $index + 1 }} Preview:
                                                        </label>
                                                        <span class="badge bg-dark-subtle text-dark fs-10">Exact Ratio</span>
                                                    </div>
                                                    <!-- Mini replica matching the website card styling -->
                                                    <div class="highlight-mini-card position-relative overflow-hidden rounded-3 shadow-sm flex-grow-1"
                                                         style="min-height: 240px; background: #083b3c; border: 1px solid rgba(255,255,255,0.18);">
                                                        <img src="{{ $cardImageSrc }}"
                                                             alt="Preview"
                                                             class="highlight-mini-img position-absolute w-100 h-100"
                                                             style="top:0; left:0; object-fit: cover; object-position: center; transition: transform 0.3s ease;">
                                                        <div class="position-absolute w-100 h-100"
                                                             style="top:0; left:0; pointer-events: none; background: linear-gradient(to top, rgba(8,59,60,0.98) 0%, rgba(8,59,60,0.85) 30%, rgba(8,59,60,0.4) 60%, rgba(8,59,60,0.05) 100%);"></div>
                                                        <div class="position-absolute w-100 p-3.5 text-center d-flex flex-column align-items-center justify-content-end"
                                                             style="bottom: 0; left: 0; z-index: 3;">
                                                            <h6 class="highlight-preview-heading text-white fw-bold mb-1 fs-13 text-uppercase"
                                                                style="font-family: serif; letter-spacing: 0.5px; line-height: 1.25; text-shadow: 0 2px 6px rgba(0,0,0,0.6);">
                                                                {{ $card['heading'] ?? 'THE ORIGINAL TASTE OF LUCKNOW' }}
                                                            </h6>
                                                            <span class="highlight-preview-subheading fs-11 fst-italic fw-semibold mb-1"
                                                                  style="color: #f1b347; font-family: serif; text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
                                                                {{ $card['subheading'] ?? 'Since 1976' }}
                                                            </span>
                                                            <p class="highlight-preview-desc fs-11 text-white-50 mb-0 text-truncate-2"
                                                               style="line-height: 1.3; text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
                                                                {{ $card['description'] ?? 'A traditional Lucknow recipe perfected over generations.' }}
                                                            </p>
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
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Highlights Strip Changes</span>
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

            <!-- ================= 3. WELCOME SECTION PANEL ================= -->
            <div class="home-section-panel" id="panel_welcome_section" style="display: none;">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-warning text-dark px-2.5 py-1.5 fs-12 fw-bold">Section 3</span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-16">Welcome To GPO (Sant Ram Gupta Ji Story & Legacy)</h6>
                            <small class="text-muted fs-12">Edit storefront photo, headings, quote, founder history, philosophy, and call-to-action button.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-12"></i> View Live Website
                        </a>
                    </div>
                </div>

                @php
                    $welcomeImage = $welcome['image'] ?? 'images/storefront.jpg';
                    $welcomeImageSrc = str_starts_with($welcomeImage, 'http') ? $welcomeImage : asset($welcomeImage);
                @endphp

                <form action="{{ route('admin.website-pages.home.welcome.update') }}" method="POST" enctype="multipart/form-data" id="welcomeSectionForm">
                    @csrf

                    <div class="row g-4">
                        <!-- Left Column: Photo & CTA Button (4 cols) -->
                        <div class="col-lg-4 col-md-12">
                            <!-- Tall Storefront Photo Card -->
                            <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-image-fill text-warning fs-15"></i>
                                        <h6 class="fs-13 fw-bold text-dark mb-0">Storefront Photo</h6>
                                    </div>
                                    <span class="badge bg-light text-muted border fs-11">Tall Format</span>
                                </div>
                                <div class="card-body p-3.5">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        Upload New Photo:
                                    </label>
                                    <input type="file" name="welcome[image_file]" class="form-control form-control-sm modern-input mb-1.5 welcome-image-input" accept="image/*">
                                    <input type="hidden" name="welcome[image]" class="welcome-image-hidden" value="{{ $welcome['image'] ?? 'images/storefront.jpg' }}">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted fs-11 text-truncate font-monospace welcome-image-display" style="max-width: 250px;">
                                            <i class="bi bi-folder2-open me-1"></i> Current: {{ $welcome['image'] ?? 'images/storefront.jpg' }}
                                        </span>
                                    </div>

                                    <!-- Live Photo Box -->
                                    <label class="fs-11 fw-bold text-muted text-uppercase mb-1.5 d-block">Photo Preview:</label>
                                    <div class="position-relative overflow-hidden rounded-3 shadow-sm border border-light-subtle" style="height: 310px; background: #0d1636;">
                                        <img src="{{ $welcomeImageSrc }}" alt="Welcome Photo Preview" class="w-100 h-100 welcome-preview-photo-img" style="object-fit: cover; object-position: center;">
                                    </div>
                                    <small class="text-muted fs-11 mt-2 d-block">
                                        <i class="bi bi-info-circle me-1"></i> Tall / vertical outlet photo.
                                    </small>
                                </div>
                            </div>

                            <!-- Button Setting Card -->
                            <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-cursor-fill text-primary fs-15"></i>
                                        <h6 class="fs-13 fw-bold text-dark mb-0">Action Button</h6>
                                    </div>
                                    <span class="badge bg-warning-subtle text-dark fs-10 border border-warning-subtle">Terracotta Pill</span>
                                </div>
                                <div class="card-body p-3.5">
                                    <div class="mb-2.5">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                        <input type="text" name="welcome[button_text]" class="form-control form-control-sm modern-input welcome-input-btntext" value="{{ $welcome['button_text'] ?? 'KNOW OUR STORY ➔' }}" placeholder="e.g. KNOW OUR STORY ➔">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-12 fw-bold text-dark mb-1">Button Link URL:</label>
                                        <input type="text" name="welcome[button_url]" class="form-control form-control-sm modern-input welcome-input-btnurl" value="{{ $welcome['button_url'] ?? '/story' }}" placeholder="e.g. /story or /about">
                                    </div>
                                    <div class="p-2 rounded-3 text-center" style="background: #fafafa; border: 1px dashed #cbd5e1;">
                                        <span class="fs-10 text-muted d-block mb-1 fw-semibold">Live Button Preview:</span>
                                        <span class="welcome-preview-btn-pill d-inline-block shadow-sm" style="background: #e05e2b; color: #ffffff; padding: 6px 16px; border-radius: 50px; font-weight: 700; font-size: 11px; letter-spacing: 0.5px;">
                                            {{ $welcome['button_text'] ?? 'KNOW OUR STORY ➔' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Story & Content Structure (8 cols) -->
                        <div class="col-lg-8 col-md-12">
                            <div class="d-flex flex-column gap-3">

                                <!-- Row 1: Two Balanced Equal-Height Cards (Title Identity + Poetic Highlight) -->
                                <div class="row g-3 align-items-stretch">
                                    <!-- Card A: Title & Brand Identity -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                            <div class="card-header bg-white py-2.5 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-card-heading text-primary fs-15"></i>
                                                    <h6 class="fs-13 fw-bold text-dark mb-0">Brand Title & Identity</h6>
                                                </div>
                                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-10">Hero Title</span>
                                            </div>
                                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <!-- Main H1 Heading -->
                                                    <div class="mb-2.5">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1 d-flex align-items-center justify-content-between">
                                                            <span><i class="bi bi-type-h1 text-primary me-1"></i> Main Heading (Single Line):</span>
                                                            <span class="badge bg-light text-muted border fs-9">H1 Title</span>
                                                        </label>
                                                        <input type="text" name="welcome[heading]" class="form-control form-control-sm modern-input welcome-input-heading fw-bold" value="{{ trim(preg_replace('/\s+/', ' ', $welcome['heading'] ?? 'ORIGINAL GPO KE THANDEY DAHI BADE')) }}" placeholder="e.g. ORIGINAL GPO KE THANDEY DAHI BADE" style="font-size: 13px; color: #0d1636; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                                                    </div>

                                                    <!-- Sub-row: Pre-heading & Tagline -->
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <label class="form-label fs-11 fw-bold text-muted mb-1">
                                                                <i class="bi bi-tag-fill text-warning me-1"></i> Pre-Heading:
                                                            </label>
                                                            <input type="text" name="welcome[badge]" class="form-control form-control-sm modern-input welcome-input-badge" value="{{ $welcome['badge'] ?? 'Welcome To' }}" placeholder="Welcome To" style="border-radius: 8px;">
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label fs-11 fw-bold text-muted mb-1">
                                                                <i class="bi bi-calendar-check text-info me-1"></i> Tagline Subtitle:
                                                            </label>
                                                            <input type="text" name="welcome[tagline]" class="form-control form-control-sm modern-input welcome-input-tagline" value="{{ $welcome['tagline'] ?? 'A Taste of Lucknow Since 1976' }}" placeholder="Since 1976" style="border-radius: 8px;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Live Title Banner Ribbon -->
                                                <div class="mt-3 p-2.5 rounded-3 border" style="background: #f8fafc; border-color: #e2e8f0;">
                                                    <span class="fs-10 text-uppercase fw-bold text-muted d-block mb-1" style="letter-spacing: 0.5px;">
                                                        <i class="bi bi-eye text-primary me-1"></i> Live Title Banner:
                                                    </span>
                                                    <div class="d-inline-block mb-1">
                                                        <span class="badge px-2 py-0.5 fs-10 fw-bold welcome-preview-badge-display" style="background: #f59e0b; color: #fff;">{{ $welcome['badge'] ?? 'Welcome To' }}</span>
                                                    </div>
                                                    <div class="fw-bold text-dark fs-12 text-truncate welcome-preview-heading-display" style="font-family: serif; letter-spacing: 0.3px;">{{ trim(preg_replace('/\s+/', ' ', $welcome['heading'] ?? 'ORIGINAL GPO KE THANDEY DAHI BADE')) }}</div>
                                                    <small class="welcome-preview-tagline-display fw-bold fs-10 d-block text-truncate" style="color: #083b3c;">{{ $welcome['tagline'] ?? 'A Taste of Lucknow Since 1976' }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card B: Awadhi Poetic Quote Highlight -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card border shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: linear-gradient(180deg, #fffdfa 0%, #fff9f2 100%); border-color: #fed7aa;">
                                            <div class="card-header py-2.5 px-3.5 border-bottom d-flex align-items-center justify-content-between" style="background: #fffcf8; border-color: #fed7aa;">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-chat-quote-fill text-danger fs-15"></i>
                                                    <h6 class="fs-13 fw-bold text-dark mb-0">Poetic Highlight / Quote</h6>
                                                </div>
                                                <span class="badge" style="background: #ffedd5; color: #9a3412; border: 1px solid #fed7aa; font-size: 10px;">
                                                    <i class="bi bi-brush me-1"></i>Terracotta Italic
                                                </span>
                                            </div>
                                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <label class="form-label fs-11 fw-bold text-dark mb-1 d-flex align-items-center justify-content-between">
                                                        <span>Awadhi Poetic Lines:</span>
                                                        <span class="text-muted fs-10">Styled quote display</span>
                                                    </label>
                                                    <textarea name="welcome[quote]" rows="4" class="form-control form-control-sm modern-input welcome-input-quote w-100" style="font-family: 'Playfair Display', Georgia, serif; font-style: italic; font-size: 12.5px; line-height: 1.55; color: #9a3412; background: #ffffff; border: 1.5px solid #fed7aa; border-radius: 8px; min-height: 100px;" placeholder="Enter poetic quote...">{{ $welcome['quote'] ?? '' }}</textarea>
                                                </div>

                                                <!-- Live Quote Card -->
                                                <div class="mt-2.5 p-2.5 rounded-3 border" style="background: rgba(255, 255, 255, 0.9); border-color: #fed7aa;">
                                                    <span class="fs-10 text-uppercase fw-bold text-muted d-block mb-1" style="letter-spacing: 0.5px;">
                                                        <i class="bi bi-stars text-warning me-1"></i> Live Quote Card:
                                                    </span>
                                                    <div class="welcome-preview-quote-display fst-italic" style="font-family: 'Playfair Display', Georgia, serif; font-size: 11.5px; color: #c2410c; line-height: 1.45; max-height: 48px; overflow: hidden;">
                                                        “{!! nl2br(e($welcome['quote'] ?? '')) !!}”
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 2: Heritage Storytelling (3 Clean Symmetrical Chapter Cards) -->
                                <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                    <div class="card-header bg-white py-2.5 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-book-half text-success fs-15"></i>
                                            <h6 class="fs-13 fw-bold text-dark mb-0">Heritage Storytelling (3 Chapters)</h6>
                                        </div>
                                        <span class="badge bg-light text-muted border fs-11">Story Narrative</span>
                                    </div>
                                    <div class="card-body p-3.5">
                                        <div class="row g-3 align-items-stretch">
                                            <!-- Chapter 1: Origin & Founder -->
                                            <div class="col-lg-4 col-md-12">
                                                <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between mb-1.5">
                                                            <span class="badge bg-warning-subtle text-dark border border-warning-subtle fs-10 fw-bold">1. Origin (1976)</span>
                                                            <i class="bi bi-award-fill text-warning fs-13"></i>
                                                        </div>
                                                        <h6 class="fs-12 fw-bold text-dark mb-0.5">Founder Story</h6>
                                                        <p class="text-muted fs-11 mb-2">Sant Ram Gupta Ji & GPO history.</p>
                                                        <textarea name="welcome[founder_story]" rows="5" class="form-control form-control-sm modern-input welcome-input-founder" style="font-size: 11.5px; line-height: 1.5; border-radius: 8px; min-height: 130px;" placeholder="Origin story...">{{ $welcome['founder_story'] ?? '' }}</textarea>
                                                    </div>
                                                    <small class="text-muted fs-10 mt-2 d-block"><i class="bi bi-clock-history me-1"></i> Paragraph 1 on homepage</small>
                                                </div>
                                            </div>

                                            <!-- Chapter 2: Philosophy & Quality -->
                                            <div class="col-lg-4 col-md-12">
                                                <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between mb-1.5">
                                                            <span class="badge bg-success-subtle text-success border border-success-subtle fs-10 fw-bold">2. Philosophy</span>
                                                            <i class="bi bi-gem text-success fs-13"></i>
                                                        </div>
                                                        <h6 class="fs-12 fw-bold text-dark mb-0.5">Brand Philosophy</h6>
                                                        <p class="text-muted fs-11 mb-2">Authentic taste & quality standards.</p>
                                                        <textarea name="welcome[philosophy]" rows="5" class="form-control form-control-sm modern-input welcome-input-philosophy" style="font-size: 11.5px; line-height: 1.5; border-radius: 8px; min-height: 130px;" placeholder="Brand philosophy...">{{ $welcome['philosophy'] ?? '' }}</textarea>
                                                    </div>
                                                    <small class="text-muted fs-10 mt-2 d-block"><i class="bi bi-check2-circle me-1"></i> Paragraph 2 on homepage</small>
                                                </div>
                                            </div>

                                            <!-- Chapter 3: Modern Journey -->
                                            <div class="col-lg-4 col-md-12">
                                                <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between mb-1.5">
                                                            <span class="badge bg-info-subtle text-info border border-info-subtle fs-10 fw-bold">3. Present Era</span>
                                                            <i class="bi bi-compass-fill text-info fs-13"></i>
                                                        </div>
                                                        <h6 class="fs-12 fw-bold text-dark mb-0.5">Modern Journey</h6>
                                                        <p class="text-muted fs-11 mb-2">Preserving flavours for today's visitors.</p>
                                                        <textarea name="welcome[current_journey]" rows="5" class="form-control form-control-sm modern-input welcome-input-journey" style="font-size: 11.5px; line-height: 1.5; border-radius: 8px; min-height: 130px;" placeholder="Current journey...">{{ $welcome['current_journey'] ?? '' }}</textarea>
                                                    </div>
                                                    <small class="text-muted fs-10 mt-2 d-block"><i class="bi bi-geo-alt me-1"></i> Paragraph 3 on homepage</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-warning px-4 py-2 fw-bold text-dark d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Welcome Section Changes</span>
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
        // Section Selector Dropdown with URL Param Support
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
            const urlParams = new URLSearchParams(window.location.search);
            const urlSection = urlParams.get('section');
            if (urlSection && selector.querySelector(`option[value="${urlSection}"]`)) {
                selector.value = urlSection;
            }

            selector.addEventListener('change', function () {
                switchSection();
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('section', selector.value);
                window.history.replaceState({}, '', newUrl);
            });
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

        // ================= HIGHLIGHTS STRIP LIVE PREVIEW LOGIC =================
        const highlightCards = document.querySelectorAll('.highlight-editor-card');
        highlightCards.forEach(cardEl => {
            const headingInput = cardEl.querySelector('.highlight-heading-input');
            const subheadingInput = cardEl.querySelector('.highlight-subheading-input');
            const descInput = cardEl.querySelector('.highlight-desc-input');
            const fileInput = cardEl.querySelector('.highlight-image-file-input');

            const cardHeaderTitle = cardEl.querySelector('.card-header-title');
            const previewHeading = cardEl.querySelector('.highlight-preview-heading');
            const previewSubheading = cardEl.querySelector('.highlight-preview-subheading');
            const previewDesc = cardEl.querySelector('.highlight-preview-desc');
            const previewImg = cardEl.querySelector('.highlight-mini-img');
            const pathDisplay = cardEl.querySelector('.highlight-image-path-display');

            if (headingInput && previewHeading) {
                headingInput.addEventListener('input', function () {
                    const val = this.value.trim();
                    previewHeading.textContent = val || 'FEATURE TITLE';
                    if (cardHeaderTitle) cardHeaderTitle.textContent = val || 'Feature Card';
                });
            }

            if (subheadingInput && previewSubheading) {
                subheadingInput.addEventListener('input', function () {
                    previewSubheading.textContent = this.value.trim() || 'Subheading';
                });
            }

            if (descInput && previewDesc) {
                descInput.addEventListener('input', function () {
                    previewDesc.textContent = this.value.trim() || 'Short description text...';
                });
            }

            if (fileInput && previewImg) {
                fileInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImg.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        if (pathDisplay) {
                            pathDisplay.textContent = 'Selected: ' + file.name;
                            pathDisplay.classList.add('text-success', 'fw-semibold');
                        }
                    }
                });
            }
        });

        // ================= WELCOME SECTION LIVE PREVIEW LOGIC =================
        const welcomeImgInput = document.querySelector('.welcome-image-input');
        const welcomePreviewImg = document.querySelector('.welcome-preview-photo-img');
        const welcomePathDisplay = document.querySelector('.welcome-image-display');

        if (welcomeImgInput && welcomePreviewImg) {
            welcomeImgInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        welcomePreviewImg.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    if (welcomePathDisplay) {
                        welcomePathDisplay.textContent = 'Selected: ' + file.name;
                        welcomePathDisplay.classList.add('text-success', 'fw-semibold');
                    }
                }
            });
        }

        // Live text preview bindings
        const welcomeHeadingInput = document.querySelector('.welcome-input-heading');
        const welcomeBadgeInput = document.querySelector('.welcome-input-badge');
        const welcomeTaglineInput = document.querySelector('.welcome-input-tagline');
        const welcomeQuoteInput = document.querySelector('.welcome-input-quote');
        const welcomeBtnTextInput = document.querySelector('.welcome-input-btntext');

        const previewHeadingDisplay = document.querySelector('.welcome-preview-heading-display');
        const previewBadgeDisplay = document.querySelector('.welcome-preview-badge-display');
        const previewTaglineDisplay = document.querySelector('.welcome-preview-tagline-display');
        const previewQuoteDisplay = document.querySelector('.welcome-preview-quote-display');
        const previewBtnPill = document.querySelector('.welcome-preview-btn-pill');

        if (welcomeHeadingInput && previewHeadingDisplay) {
            welcomeHeadingInput.addEventListener('input', function() {
                previewHeadingDisplay.textContent = this.value.trim() || 'ORIGINAL GPO KE THANDEY DAHI BADE';
            });
        }
        if (welcomeBadgeInput && previewBadgeDisplay) {
            welcomeBadgeInput.addEventListener('input', function() {
                previewBadgeDisplay.textContent = this.value.trim() || 'Welcome To';
            });
        }
        if (welcomeTaglineInput && previewTaglineDisplay) {
            welcomeTaglineInput.addEventListener('input', function() {
                previewTaglineDisplay.textContent = this.value.trim() || 'A Taste of Lucknow Since 1976';
            });
        }
        if (welcomeQuoteInput && previewQuoteDisplay) {
            welcomeQuoteInput.addEventListener('input', function() {
                const txt = this.value.trim();
                previewQuoteDisplay.innerHTML = txt ? '“' + txt.replace(/\n/g, '<br>') + '”' : '“Enter poetic quote...”';
            });
        }
        if (welcomeBtnTextInput && previewBtnPill) {
            welcomeBtnTextInput.addEventListener('input', function() {
                previewBtnPill.textContent = this.value.trim() || 'KNOW OUR STORY ➔';
            });
        }
    });
</script>
@endpush
