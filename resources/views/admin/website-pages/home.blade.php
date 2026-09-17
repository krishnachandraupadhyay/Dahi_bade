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
                            <!-- Card {{ $index + 1 }} (Stacked vertically) -->
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
                        <!-- 1. Storefront Photo & CTA Button (col-sm-12 col-12) -->
                        <div class="col-sm-12 col-12">
                            <div class="row g-4 align-items-stretch">
                                <!-- Photo Card -->
                                <div class="col-md-7 col-sm-12">
                                    <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                        <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-image-fill text-warning fs-15"></i>
                                                <h6 class="fs-13 fw-bold text-dark mb-0">Storefront Photo</h6>
                                            </div>
                                            <span class="badge bg-light text-muted border fs-11">Tall Format</span>
                                        </div>
                                        <div class="card-body p-3.5">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-7 col-sm-12">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                        Upload New Photo:
                                                    </label>
                                                    <input type="file" name="welcome[image_file]" class="form-control form-control-sm modern-input mb-1.5 welcome-image-input" accept="image/*">
                                                    <input type="hidden" name="welcome[image]" class="welcome-image-hidden" value="{{ $welcome['image'] ?? 'images/storefront.jpg' }}">
                                                    <span class="text-muted fs-11 text-truncate font-monospace welcome-image-display d-block mb-2" style="max-width: 100%;">
                                                        <i class="bi bi-folder2-open me-1"></i> Current: {{ $welcome['image'] ?? 'images/storefront.jpg' }}
                                                    </span>
                                                    <small class="text-muted fs-11 d-block">
                                                        <i class="bi bi-info-circle me-1"></i> Displayed as a vertical storefront photo on the homepage.
                                                    </small>
                                                </div>
                                                <div class="col-md-5 col-sm-12">
                                                    <label class="fs-11 fw-bold text-muted text-uppercase mb-1.5 d-block">Photo Preview:</label>
                                                    <div class="position-relative overflow-hidden rounded-3 shadow-sm border border-light-subtle" style="height: 175px; background: #0d1636;">
                                                        <img src="{{ $welcomeImageSrc }}" alt="Welcome Photo Preview" class="w-100 h-100 welcome-preview-photo-img" style="object-fit: cover; object-position: center;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Setting Card -->
                                <div class="col-md-5 col-sm-12">
                                    <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                        <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-cursor-fill text-primary fs-15"></i>
                                                <h6 class="fs-13 fw-bold text-dark mb-0">Action Button</h6>
                                            </div>
                                            <span class="badge bg-warning-subtle text-dark fs-10 border border-warning-subtle">Terracotta Pill</span>
                                        </div>
                                        <div class="card-body p-3.5 d-flex flex-column justify-content-between">
                                            <div>
                                                <div class="mb-2.5">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                                    <input type="text" name="welcome[button_text]" class="form-control form-control-sm modern-input welcome-input-btntext" value="{{ $welcome['button_text'] ?? 'KNOW OUR STORY ➔' }}" placeholder="e.g. KNOW OUR STORY ➔">
                                                </div>
                                                <div class="mb-2.5">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Link URL:</label>
                                                    <input type="text" name="welcome[button_url]" class="form-control form-control-sm modern-input welcome-input-btnurl" value="{{ $welcome['button_url'] ?? '/story' }}" placeholder="e.g. /story or /about">
                                                </div>
                                            </div>
                                            <div class="p-2 rounded-3 text-center mt-2" style="background: #fafafa; border: 1px dashed #cbd5e1;">
                                                <span class="fs-10 text-muted d-block mb-1 fw-semibold">Live Button Preview:</span>
                                                <span class="welcome-preview-btn-pill d-inline-block shadow-sm" style="background: #e05e2b; color: #ffffff; padding: 6px 16px; border-radius: 50px; font-weight: 700; font-size: 11px; letter-spacing: 0.5px;">
                                                    {{ $welcome['button_text'] ?? 'KNOW OUR STORY ➔' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Story & Content Details (col-sm-12 col-12) -->
                        <div class="col-sm-12 col-12">
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
                                            <div class="card-body p-3.5 d-flex flex-column justify-content-between">
                                                <div>
                                                    <!-- Main H1 Heading -->
                                                    <div class="mb-3">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1 d-flex align-items-center justify-content-between">
                                                            <span><i class="bi bi-type-h1 text-primary me-1"></i> Main Heading:</span>
                                                            <span class="badge bg-light text-muted border fs-9">H1 Title</span>
                                                        </label>
                                                        <input type="text" name="welcome[heading]" class="form-control form-control-sm modern-input welcome-input-heading fw-bold" value="{{ trim(preg_replace('/\s+/', ' ', $welcome['heading'] ?? 'ORIGINAL GPO KE THANDEY DAHI BADE')) }}" placeholder="e.g. ORIGINAL GPO KE THANDEY DAHI BADE" style="font-size: 13.5px; color: #0d1636; border: 1.5px solid #cbd5e1; border-radius: 8px;">
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
                                            <div class="card-body p-3.5 d-flex flex-column">
                                                <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                    <i class="bi bi-quote text-danger me-1"></i> Awadhi Poetic Lines:
                                                </label>
                                                <textarea name="welcome[quote]" rows="5" class="form-control form-control-sm modern-input welcome-input-quote flex-grow-1" style="font-family: 'Playfair Display', Georgia, serif; font-style: italic; font-size: 13px; line-height: 1.6; color: #9a3412; background: #ffffff; border: 1.5px solid #fed7aa; border-radius: 8px; min-height: 112px;" placeholder="Enter poetic quote...">{{ $welcome['quote'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 2: Heritage Storytelling (Dynamic Add/Remove Paragraphs) -->
                                <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                    <div class="card-header bg-white py-2.5 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-book-half text-success fs-15"></i>
                                            <h6 class="fs-13 fw-bold text-dark mb-0">
                                                Heritage Storytelling (<span id="welcome_para_count">{{ count($welcome['paragraphs'] ?? []) }}</span> Paragraphs)
                                            </h6>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" class="btn btn-sm btn-success px-2.5 py-1 fs-12 fw-bold d-flex align-items-center gap-1 shadow-sm" id="btn_add_welcome_paragraph">
                                                <i class="bi bi-plus-circle-fill fs-13"></i> Add Paragraph
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-3.5">
                                        <div class="row g-3 align-items-stretch" id="welcome_paragraphs_container">
                                            @php
                                                $paragraphs = $welcome['paragraphs'] ?? [];
                                                $colorBadges = ['warning', 'success', 'info', 'primary', 'secondary', 'dark'];
                                            @endphp
                                            @foreach($paragraphs as $idx => $p)
                                                @php
                                                    $badgeColor = $colorBadges[$idx % count($colorBadges)];
                                                @endphp
                                                <div class="col-lg-6 col-md-6 col-12 welcome-paragraph-item" data-index="{{ $idx }}">
                                                    <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between position-relative" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                        <div>
                                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                                <input type="text" name="welcome[paragraphs][{{ $idx }}][tag]" value="{{ $p['tag'] ?? (($idx + 1) . '. Chapter') }}" class="form-control form-control-sm modern-input py-0.5 px-2 fs-10 fw-bold border-{{ $badgeColor }}-subtle welcome-para-tag-input" style="max-width: 140px; height: 26px; border-radius: 6px; background: #ffffff;" placeholder="Badge / Tag">
                                                                <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center remove-welcome-para-btn" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this paragraph">
                                                                    <i class="bi bi-trash fs-12"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="welcome[paragraphs][{{ $idx }}][title]" value="{{ $p['title'] ?? 'Story Chapter' }}" class="form-control form-control-sm modern-input fw-bold fs-12 mb-1.5" placeholder="Paragraph Title" style="border-radius: 6px; background: #ffffff;">
                                                            <input type="text" name="welcome[paragraphs][{{ $idx }}][subtitle]" value="{{ $p['subtitle'] ?? '' }}" class="form-control form-control-sm modern-input text-muted fs-11 mb-2" placeholder="Subtitle / Short note" style="border-radius: 6px; background: #ffffff;">
                                                            <textarea name="welcome[paragraphs][{{ $idx }}][text]" rows="5" class="form-control form-control-sm modern-input welcome-para-text" style="font-size: 11.5px; line-height: 1.5; border-radius: 8px; min-height: 125px; background: #ffffff;" placeholder="Enter paragraph content...">{{ $p['text'] ?? '' }}</textarea>
                                                        </div>
                                                        <small class="text-muted fs-10 mt-2 d-flex align-items-center justify-content-between">
                                                            <span class="para-order-label"><i class="bi bi-paragraph me-1"></i> Paragraph <span class="para-num">{{ $idx + 1 }}</span> on website</span>
                                                        </small>
                                                    </div>
                                                </div>
                                            @endforeach
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
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success px-2.5 py-1.5 fs-12">Section 4</span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-16">Why People Love GPO (Key Highlights & Cards)</h6>
                            <small class="text-muted fs-12">Manage Section Icon, Main Heading, Subheading & Dynamic Feature Cards.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 fs-12 rounded-pill fw-semibold" id="why_gpo_active_badge">
                            <i class="bi bi-grid-3x3-gap me-1"></i> <span id="why_gpo_count_text">{{ count($whyGpo['items'] ?? []) }}</span> Cards Active
                        </span>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-12"></i> View Live
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.website-pages.home.why_gpo.update') }}" method="POST" id="whyGpoForm">
                    @csrf

                    <!-- 1. Section Header & Badges Configuration Card -->
                    <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; background: #ffffff;">
                        <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success text-white rounded-pill px-2.5 py-1 fs-11">Header</span>
                                <h6 class="fs-14 fw-bold text-dark mb-0">Section Titles & Badges</h6>
                            </div>
                            <small class="text-muted fs-12">Displayed directly above the feature card grid on the website</small>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <!-- Badge Icon / Emoji -->
                                <div class="col-md-2 col-sm-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        <i class="bi bi-emoji-smile text-success me-1"></i> Icon / Emoji
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="why_gpo[badge_icon]" value="{{ old('why_gpo.badge_icon', $whyGpo['badge_icon'] ?? '🌿') }}" class="form-control modern-input text-center fw-bold fs-16" placeholder="e.g. 🌿">
                                    </div>
                                    <small class="text-muted fs-11 mt-1 d-block">Emoji or symbol</small>
                                </div>

                                <!-- Main Heading -->
                                <div class="col-md-5 col-sm-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        <i class="bi bi-type-h1 text-primary me-1"></i> Section Heading
                                    </label>
                                    <input type="text" name="why_gpo[heading]" value="{{ old('why_gpo.heading', $whyGpo['heading'] ?? 'WHY PEOPLE LOVE GPO') }}" class="form-control modern-input fw-bold" placeholder="e.g. WHY PEOPLE LOVE GPO">
                                    <small class="text-muted fs-11 mt-1 d-block">All caps serif title on frontend</small>
                                </div>

                                <!-- Subheading -->
                                <div class="col-md-5 col-sm-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        <i class="bi bi-card-text text-warning me-1"></i> Subheading / Tagline
                                    </label>
                                    <input type="text" name="why_gpo[subheading]" value="{{ old('why_gpo.subheading', $whyGpo['subheading'] ?? 'A Legacy Built on Taste') }}" class="form-control modern-input" placeholder="e.g. A Legacy Built on Taste">
                                    <small class="text-muted fs-11 mt-1 d-block">Italic / light script style subtitle</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Dynamic Feature Cards List -->
                    <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; background: #ffffff;">
                        <div class="card-header bg-white py-3 px-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary text-white rounded-pill px-2.5 py-1 fs-11">Grid Items</span>
                                <div>
                                    <h6 class="fs-14 fw-bold text-dark mb-0">Feature Cards (Add / Remove / Edit)</h6>
                                    <small class="text-muted fs-11">Rendered dynamically in a responsive grid layout on the website</small>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-success px-3 py-1.5 fs-12 fw-bold d-flex align-items-center gap-1.5 shadow-sm" id="btn_add_why_gpo_card">
                                <i class="bi bi-plus-circle-fill fs-13"></i>
                                <span>Add New Card</span>
                            </button>
                        </div>

                        <div class="card-body p-4">
                            <div class="row g-3" id="why_gpo_cards_container">
                                @php
                                    $whyItems = $whyGpo['items'] ?? [];
                                @endphp
                                @foreach($whyItems as $idx => $item)
                                    @php
                                        $isTerracotta = ($item['style'] ?? 'teal') === 'terracotta';
                                    @endphp
                                    <div class="col-lg-4 col-md-6 col-12 why-gpo-card-col" data-index="{{ $idx }}">
                                        <div class="card border h-100 shadow-sm why-gpo-item-box" style="border-radius: 10px; background: #fbfcfe; border-color: #e2e8f0 !important; transition: all 0.2s ease;">
                                            <!-- Card Header with Index & Remove button -->
                                            <div class="card-header bg-white py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-dark rounded-circle why-card-num-badge" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">{{ $idx + 1 }}</span>
                                                    <span class="fw-bold fs-12 text-dark why-card-header-title">{{ !empty($item['title']) ? $item['title'] : 'Card ' . ($idx + 1) }}</span>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-why-card" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this card">
                                                    <i class="bi bi-trash fs-12"></i>
                                                </button>
                                            </div>

                                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <!-- Card Title -->
                                                    <div class="mb-2">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                            Card Title (Header)
                                                        </label>
                                                        <input type="text" name="why_gpo[items][{{ $idx }}][title]" value="{{ $item['title'] ?? '' }}" class="form-control form-control-sm modern-input fw-bold why-card-title-input" placeholder="e.g. SINCE 1976" style="border-radius: 6px; background: #ffffff;">
                                                    </div>

                                                    <!-- Heading Color Style (Terracotta vs Teal) -->
                                                    <div class="mb-2">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                            Title Color Style
                                                        </label>
                                                        <select name="why_gpo[items][{{ $idx }}][style]" class="form-select form-select-sm modern-input fs-12 why-card-style-select" style="border-radius: 6px; background: #ffffff;">
                                                            <option value="terracotta" {{ ($item['style'] ?? '') === 'terracotta' ? 'selected' : '' }}>🟧 Terracotta Coral (Accent / Warm)</option>
                                                            <option value="teal" {{ ($item['style'] ?? 'teal') === 'teal' ? 'selected' : '' }}>🟦 Deep Teal (Royal / Elegant)</option>
                                                        </select>
                                                    </div>

                                                    <!-- Card Description -->
                                                    <div class="mb-0">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                            Description Paragraph
                                                        </label>
                                                        <textarea name="why_gpo[items][{{ $idx }}][description]" rows="4" class="form-control form-control-sm modern-input why-card-desc-input" style="font-size: 12px; line-height: 1.5; border-radius: 6px; min-height: 90px; background: #ffffff;" placeholder="Enter card description...">{{ $item['description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="pt-2 mt-2 border-top border-light-subtle d-flex align-items-center justify-content-between">
                                                    <small class="text-muted fs-10">
                                                        <i class="bi bi-grid me-1"></i> Slot <span class="why-slot-num">{{ $idx + 1 }}</span>
                                                    </small>
                                                    <span class="badge {{ $isTerracotta ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary' }} px-2 py-0.5 fs-10 why-style-pill">
                                                        {{ $isTerracotta ? 'Terracotta Coral' : 'Deep Teal' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-success px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Why GPO Section Changes</span>
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

            <!-- ================= 5. SIGNATURE DISH PANEL ================= -->
            <div class="home-section-panel" id="panel_signature_dish" style="display: none;">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger px-2.5 py-1.5 fs-12">Section 5</span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-16">The Star of GPO (Thandey Dahi Bade Feature)</h6>
                            <small class="text-muted fs-12">Manage dish image, badge, heading, description paragraphs, highlight quote and order button.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-12"></i> View Live Website
                        </a>
                    </div>
                </div>

                @php
                    $starImage = $starDish['image'] ?? 'images/dahi_vada.jpg';
                    $starImageSrc = str_starts_with($starImage, 'http') ? $starImage : asset($starImage);
                @endphp

                <form action="{{ route('admin.website-pages.home.star_dish.update') }}" method="POST" enctype="multipart/form-data" id="starDishForm">
                    @csrf

                    <div class="row g-4">
                        <!-- Top Row: Photo Upload Card & Action Button Card (col-12) -->
                        <div class="col-12">
                            <div class="row g-4 align-items-stretch">
                                <!-- Photo Upload Card (Left) -->
                                <div class="col-md-7 col-sm-12">
                                    <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                        <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-image-fill text-danger fs-15"></i>
                                                <h6 class="fs-13 fw-bold text-dark mb-0">Signature Dish Photo</h6>
                                            </div>
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle fs-11">Featured Dish</span>
                                        </div>
                                        <div class="card-body p-3.5">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-7 col-sm-12">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                        Upload New Dish Photo:
                                                    </label>
                                                    <input type="file" name="star_dish[image_file]" class="form-control form-control-sm modern-input mb-1.5 star-dish-image-input" accept="image/*">
                                                    <input type="hidden" name="star_dish[image]" class="star-dish-image-hidden" value="{{ $starDish['image'] ?? 'images/dahi_vada.jpg' }}">
                                                    <span class="text-muted fs-11 text-truncate font-monospace star-dish-image-display d-block mb-2" style="max-width: 100%;">
                                                        <i class="bi bi-folder2-open me-1"></i> Current: {{ $starDish['image'] ?? 'images/dahi_vada.jpg' }}
                                                    </span>
                                                    <small class="text-muted fs-11 d-block">
                                                        <i class="bi bi-info-circle me-1"></i> Displayed as the large showcase feature dish image on the left.
                                                    </small>
                                                </div>
                                                <div class="col-md-5 col-sm-12">
                                                    <label class="fs-11 fw-bold text-muted text-uppercase mb-1.5 d-block">Dish Preview:</label>
                                                    <div class="position-relative overflow-hidden rounded-3 shadow-sm border border-light-subtle" style="height: 165px; background: #0d1636;">
                                                        <img src="{{ $starImageSrc }}" alt="Star Dish Preview" class="w-100 h-100 star-dish-preview-img" style="object-fit: cover; object-position: center;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button Card (Right) -->
                                <div class="col-md-5 col-sm-12">
                                    <div class="card border border-light-subtle shadow-sm h-100" style="border-radius: 12px; overflow: hidden; background: #ffffff;">
                                        <div class="card-header bg-white py-3 px-3.5 border-bottom d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="bi bi-cursor-fill text-danger fs-15"></i>
                                                <h6 class="fs-13 fw-bold text-dark mb-0">Order Button Setting</h6>
                                            </div>
                                            <span class="badge bg-danger-subtle text-dark fs-10 border border-danger-subtle">Cinnamon Pill</span>
                                        </div>
                                        <div class="card-body p-3.5 d-flex flex-column justify-content-between">
                                            <div>
                                                <div class="mb-2.5">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                                    <input type="text" name="star_dish[button_text]" class="form-control form-control-sm modern-input" value="{{ old('star_dish.button_text', $starDish['button_text'] ?? 'ORDER DAHI BADE') }}" placeholder="e.g. ORDER DAHI BADE">
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Link URL:</label>
                                                    <input type="text" name="star_dish[button_url]" class="form-control form-control-sm modern-input" value="{{ old('star_dish.button_url', $starDish['button_url'] ?? '/menu') }}" placeholder="e.g. /menu">
                                                </div>
                                            </div>
                                            <div class="p-2.5 rounded-2 bg-light-subtle border mt-2">
                                                <small class="text-muted fs-11 d-block">
                                                    <i class="bi bi-lightning-charge-fill text-warning me-1"></i> Clicking this button directs the user to the Menu page to order.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Row: Titles & Highlight Quote (col-12) -->
                        <div class="col-12">
                            <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; background: #ffffff;">
                                <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-danger text-white rounded-pill px-2.5 py-1 fs-11">Header</span>
                                        <h6 class="fs-14 fw-bold text-dark mb-0">Headings & Highlight Quote</h6>
                                    </div>
                                    <small class="text-muted fs-12">Top heading and highlight punchline on the right column</small>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-3 col-sm-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                <i class="bi bi-tag-fill text-warning me-1"></i> Small Badge / Label
                                            </label>
                                            <input type="text" name="star_dish[badge]" value="{{ old('star_dish.badge', $starDish['badge'] ?? 'The Star of GPO') }}" class="form-control modern-input" placeholder="e.g. The Star of GPO">
                                            <small class="text-muted fs-11 mt-1 d-block">Italic serif accent label</small>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                <i class="bi bi-type-h1 text-danger me-1"></i> Main Dish Heading
                                            </label>
                                            <input type="text" name="star_dish[heading]" value="{{ old('star_dish.heading', $starDish['heading'] ?? 'THANDEY DAHI BADE') }}" class="form-control modern-input fw-bold" placeholder="e.g. THANDEY DAHI BADE">
                                            <small class="text-muted fs-11 mt-1 d-block">Large bold serif heading</small>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <label class="form-label fs-12 fw-bold text-dark mb-1">
                                                <i class="bi bi-stars text-danger me-1"></i> Highlight Quote / Slogan
                                            </label>
                                            <input type="text" name="star_dish[highlight_quote]" value="{{ old('star_dish.highlight_quote', $starDish['highlight_quote'] ?? 'ONE PLATE. ONE BITE. ONE UNFORGETTABLE TASTE.') }}" class="form-control modern-input fw-bold text-danger" placeholder="e.g. ONE PLATE. ONE BITE. ONE UNFORGETTABLE TASTE.">
                                            <small class="text-muted fs-11 mt-1 d-block">Terracotta coral color bold slogan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Row: Dynamic Description Paragraphs (Add / Remove) -->
                        <div class="col-12">
                            <div class="card border border-light-subtle shadow-sm" style="border-radius: 12px; background: #ffffff;">
                                <div class="card-header bg-white py-3 px-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-danger text-white rounded-pill px-2.5 py-1 fs-11">Story</span>
                                        <div>
                                            <h6 class="fs-14 fw-bold text-dark mb-0">Dish Flavour & Experience Paragraphs (Add / Remove)</h6>
                                            <small class="text-muted fs-11">Rendered below the heading on the website</small>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger px-3 py-1.5 fs-12 fw-bold d-flex align-items-center gap-1.5 shadow-sm" id="btn_add_star_paragraph">
                                        <i class="bi bi-plus-circle-fill fs-13"></i>
                                        <span>Add Paragraph</span>
                                    </button>
                                </div>
                                <div class="card-body p-4">
                                    @php
                                        $starParas = $starDish['paragraphs'] ?? [];
                                        if (empty($starParas)) {
                                            if (!empty($starDish['lead_paragraph'])) $starParas[] = $starDish['lead_paragraph'];
                                            if (!empty($starDish['description_paragraph'])) $starParas[] = $starDish['description_paragraph'];
                                        }
                                        $colorBadges = ['primary', 'success', 'warning', 'info', 'secondary', 'dark'];
                                    @endphp
                                    <div class="row g-3" id="star_paragraphs_container">
                                        @foreach($starParas as $pIdx => $pText)
                                            @php
                                                $badgeColor = $colorBadges[$pIdx % count($colorBadges)];
                                            @endphp
                                            <div class="col-lg-6 col-md-6 col-12 star-paragraph-item" data-index="{{ $pIdx }}">
                                                <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between position-relative" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <span class="badge bg-{{ $badgeColor }}-subtle text-{{ $badgeColor }} border border-{{ $badgeColor }}-subtle fs-11 fw-semibold star-para-badge">
                                                                <i class="bi bi-paragraph me-1"></i> Paragraph <span class="star-para-num">{{ $pIdx + 1 }}</span>
                                                            </span>
                                                            <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-star-para" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this paragraph">
                                                                <i class="bi bi-trash fs-12"></i>
                                                            </button>
                                                        </div>
                                                        <textarea name="star_dish[paragraphs][{{ $pIdx }}]" rows="5" class="form-control form-control-sm modern-input star-para-textarea" style="font-size: 12px; line-height: 1.5; border-radius: 8px; min-height: 120px; background: #ffffff;" placeholder="Enter paragraph content...">{{ $pText }}</textarea>
                                                    </div>
                                                    <small class="text-muted fs-10 mt-2 d-flex align-items-center justify-content-between">
                                                        <span><i class="bi bi-card-text me-1"></i> Slot <span class="star-slot-num">{{ $pIdx + 1 }}</span> on website</span>
                                                        <span class="text-muted fst-italic">{{ $pIdx === 0 ? 'Lead highlight text' : 'Supporting note' }}</span>
                                                    </small>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Star of GPO Changes</span>
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
                    <p class="fs-13 text-muted mb-0">Manage items for the 6 favourite dishes (Dahi Bade, Chilla, Samosa, Chaat, etc.) here.</p>
                </div>
            </div>

            <!-- ================= 7. GPO EXPERIENCE PANEL ================= -->
            <div class="home-section-panel" id="panel_gpo_experience" style="display: none;">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 7</span>
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-16">The GPO Experience (Culture, Taste & Features)</h6>
                            <small class="text-muted fs-12">Manage Section Title, Subheading & 4 Experience Feature Items.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1.5 fs-12 rounded-pill fw-semibold" id="experience_active_badge">
                            <i class="bi bi-stars me-1"></i> <span id="experience_count_text">{{ count($experience['items'] ?? []) }}</span> Items Active
                        </span>
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1.5">
                            <i class="bi bi-box-arrow-up-right fs-12"></i> View Live
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.website-pages.home.experience.update') }}" method="POST" id="experienceForm">
                    @csrf

                    <!-- 1. Section Headings Card -->
                    <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; background: #ffffff;">
                        <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary text-white rounded-pill px-2.5 py-1 fs-11">Headings</span>
                                <h6 class="fs-14 fw-bold text-dark mb-0">Section Titles & Heading</h6>
                            </div>
                            <small class="text-muted fs-12">Displayed directly above the feature strip on the website</small>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <!-- Main Heading -->
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        <i class="bi bi-type-h1 text-primary me-1"></i> Main Heading
                                    </label>
                                    <input type="text" name="experience[heading]" value="{{ old('experience.heading', $experience['heading'] ?? 'THE GPO EXPERIENCE') }}" class="form-control modern-input fw-bold" placeholder="e.g. THE GPO EXPERIENCE">
                                    <small class="text-muted fs-11 mt-1 d-block">Large bold serif title</small>
                                </div>

                                <!-- Subheading -->
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">
                                        <i class="bi bi-card-text text-warning me-1"></i> Subheading / Tagline
                                    </label>
                                    <input type="text" name="experience[subheading]" value="{{ old('experience.subheading', $experience['subheading'] ?? 'WHY A VISIT TO GPO FEELS DIFFERENT') }}" class="form-control modern-input" placeholder="e.g. WHY A VISIT TO GPO FEELS DIFFERENT">
                                    <small class="text-muted fs-11 mt-1 d-block">Uppercase light subtitle</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Dynamic Feature Cards List -->
                    <div class="card border border-light-subtle shadow-sm mb-4" style="border-radius: 12px; background: #ffffff;">
                        <div class="card-header bg-white py-3 px-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success text-white rounded-pill px-2.5 py-1 fs-11">Strip Items</span>
                                <div>
                                    <h6 class="fs-14 fw-bold text-dark mb-0">Experience Feature Items (Add / Remove / Edit)</h6>
                                    <small class="text-muted fs-11">Rendered across a 4-column strip layout on the live website</small>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-success px-3 py-1.5 fs-12 fw-bold d-flex align-items-center gap-1.5 shadow-sm" id="btn_add_experience_item">
                                <i class="bi bi-plus-circle-fill fs-13"></i>
                                <span>Add Experience Item</span>
                            </button>
                        </div>

                        <div class="card-body p-4">
                            <div class="row g-3" id="experience_items_container">
                                @php
                                    $expItems = $experience['items'] ?? [];
                                @endphp
                                @foreach($expItems as $idx => $item)
                                    <div class="col-lg-6 col-md-6 col-12 experience-item-col" data-index="{{ $idx }}">
                                        <div class="card border h-100 shadow-sm exp-item-box" style="border-radius: 10px; background: #fbfcfe; border-color: #e2e8f0 !important; transition: all 0.2s ease;">
                                            <div class="card-header bg-white py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary rounded-circle exp-item-num-badge" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">{{ $idx + 1 }}</span>
                                                    <span class="fw-bold fs-12 text-dark exp-item-header-title">{{ !empty($item['title']) ? $item['title'] : 'Item ' . ($idx + 1) }}</span>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-exp-item" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this item">
                                                    <i class="bi bi-trash fs-12"></i>
                                                </button>
                                            </div>

                                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <div class="row g-2 mb-2">
                                                        <!-- Icon / Emoji -->
                                                        <div class="col-3">
                                                            <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                                Icon / Emoji
                                                            </label>
                                                            <input type="text" name="experience[items][{{ $idx }}][icon]" value="{{ $item['icon'] ?? '🌿' }}" class="form-control form-control-sm modern-input text-center fw-bold fs-15 exp-icon-input" placeholder="🌿" style="border-radius: 6px; background: #ffffff;">
                                                        </div>
                                                        <!-- Title -->
                                                        <div class="col-9">
                                                            <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                                Item Title
                                                            </label>
                                                            <input type="text" name="experience[items][{{ $idx }}][title]" value="{{ $item['title'] ?? '' }}" class="form-control form-control-sm modern-input fw-bold exp-title-input" placeholder="e.g. Traditional Taste" style="border-radius: 6px; background: #ffffff;">
                                                        </div>
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="mb-0">
                                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                                            Description Note
                                                        </label>
                                                        <textarea name="experience[items][{{ $idx }}][description]" rows="3" class="form-control form-control-sm modern-input exp-desc-input" style="font-size: 12px; line-height: 1.5; border-radius: 6px; min-height: 75px; background: #ffffff;" placeholder="Enter short note...">{{ $item['description'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="pt-2 mt-2 border-top border-light-subtle d-flex align-items-center justify-content-between">
                                                    <small class="text-muted fs-10">
                                                        <i class="bi bi-grid me-1"></i> Column <span class="exp-slot-num">{{ $idx + 1 }}</span> on website
                                                    </small>
                                                    <span class="badge bg-light text-muted border px-2 py-0.5 fs-10">
                                                        Feature {{ $idx + 1 }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-cloud-check-fill fs-16"></i>
                            <span>Save Experience Section Changes</span>
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
                    <p class="fs-13 text-muted mb-0">Manage customer ratings, feedback reviews, and testimonials here.</p>
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
                    <p class="fs-13 text-muted mb-0">Manage store address, operational timings, phone, email, and map location here.</p>
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
                    <p class="fs-13 text-muted mb-0">Manage franchise call-to-action text, buttons, and banner details here.</p>
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
                        if (!confirm('Are you sure you want to remove the last button? (The slide will display without any buttons)')) {
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
                        alert('At least one slide is required! You cannot remove it.');
                        return;
                    }

                    if (confirm('Are you sure you want to remove this slide?')) {
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

        const previewBtnPill = document.querySelector('.welcome-preview-btn-pill');

        if (welcomeBtnTextInput && previewBtnPill) {
            welcomeBtnTextInput.addEventListener('input', function() {
                previewBtnPill.textContent = this.value.trim() || 'KNOW OUR STORY ➔';
            });
        }

        // ================= DYNAMIC WELCOME STORY PARAGRAPHS =================
        const welcomeParaContainer = document.getElementById('welcome_paragraphs_container');
        const btnAddWelcomePara = document.getElementById('btn_add_welcome_paragraph');
        const welcomeParaCountBadge = document.getElementById('welcome_para_count');
        const colorBadgesList = ['warning', 'success', 'info', 'primary', 'secondary', 'dark'];

        function reindexWelcomeParagraphs() {
            if (!welcomeParaContainer) return;
            const items = welcomeParaContainer.querySelectorAll('.welcome-paragraph-item');
            if (welcomeParaCountBadge) {
                welcomeParaCountBadge.textContent = items.length;
            }

            items.forEach((item, index) => {
                item.setAttribute('data-index', index);

                const tagInput = item.querySelector('input[name*="[tag]"]');
                const titleInput = item.querySelector('input[name*="[title]"]');
                const subtitleInput = item.querySelector('input[name*="[subtitle]"]');
                const textInput = item.querySelector('textarea[name*="[text]"]');
                const numSpan = item.querySelector('.para-num');

                if (tagInput) tagInput.name = `welcome[paragraphs][${index}][tag]`;
                if (titleInput) titleInput.name = `welcome[paragraphs][${index}][title]`;
                if (subtitleInput) subtitleInput.name = `welcome[paragraphs][${index}][subtitle]`;
                if (textInput) textInput.name = `welcome[paragraphs][${index}][text]`;
                if (numSpan) numSpan.textContent = index + 1;
            });
        }

        // Event delegation for removing paragraph
        if (welcomeParaContainer) {
            welcomeParaContainer.addEventListener('click', function (e) {
                const removeBtn = e.target.closest('.remove-welcome-para-btn');
                if (removeBtn) {
                    const item = removeBtn.closest('.welcome-paragraph-item');
                    const totalItems = welcomeParaContainer.querySelectorAll('.welcome-paragraph-item').length;
                    if (totalItems <= 1) {
                        alert('At least one story paragraph is required.');
                        return;
                    }
                    if (confirm('Are you sure you want to remove this paragraph?')) {
                        item.style.transition = 'all 0.25s ease';
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            item.remove();
                            reindexWelcomeParagraphs();
                        }, 250);
                    }
                }
            });
        }

        // Add paragraph handler
        if (btnAddWelcomePara && welcomeParaContainer) {
            btnAddWelcomePara.addEventListener('click', function () {
                const currentCount = welcomeParaContainer.querySelectorAll('.welcome-paragraph-item').length;
                const nextIndex = currentCount;
                const nextNum = currentCount + 1;
                const badgeColor = colorBadgesList[nextIndex % colorBadgesList.length];

                const colDiv = document.createElement('div');
                colDiv.className = 'col-lg-6 col-md-6 col-12 welcome-paragraph-item';
                colDiv.setAttribute('data-index', nextIndex);
                colDiv.style.opacity = '0';
                colDiv.style.transform = 'scale(0.95)';
                colDiv.style.transition = 'all 0.25s ease';

                colDiv.innerHTML = `
                    <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between position-relative" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <input type="text" name="welcome[paragraphs][${nextIndex}][tag]" value="${nextNum}. Chapter" class="form-control form-control-sm modern-input py-0.5 px-2 fs-10 fw-bold border-${badgeColor}-subtle welcome-para-tag-input" style="max-width: 140px; height: 26px; border-radius: 6px; background: #ffffff;" placeholder="Badge / Tag">
                                <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center remove-welcome-para-btn" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this paragraph">
                                    <i class="bi bi-trash fs-12"></i>
                                </button>
                            </div>
                            <input type="text" name="welcome[paragraphs][${nextIndex}][title]" value="Chapter Title" class="form-control form-control-sm modern-input fw-bold fs-12 mb-1.5" placeholder="Paragraph Title" style="border-radius: 6px; background: #ffffff;">
                            <input type="text" name="welcome[paragraphs][${nextIndex}][subtitle]" value="" class="form-control form-control-sm modern-input text-muted fs-11 mb-2" placeholder="Subtitle / Short note" style="border-radius: 6px; background: #ffffff;">
                            <textarea name="welcome[paragraphs][${nextIndex}][text]" rows="5" class="form-control form-control-sm modern-input welcome-para-text" style="font-size: 11.5px; line-height: 1.5; border-radius: 8px; min-height: 125px; background: #ffffff;" placeholder="Enter paragraph content..."></textarea>
                        </div>
                        <small class="text-muted fs-10 mt-2 d-flex align-items-center justify-content-between">
                            <span class="para-order-label"><i class="bi bi-paragraph me-1"></i> Paragraph <span class="para-num">${nextNum}</span> on website</span>
                        </small>
                    </div>
                `;

                welcomeParaContainer.appendChild(colDiv);
                setTimeout(() => {
                    colDiv.style.opacity = '1';
                    colDiv.style.transform = 'scale(1)';
                }, 10);

                reindexWelcomeParagraphs();

                const newTextarea = colDiv.querySelector('textarea');
                if (newTextarea) {
                    newTextarea.focus();
                }
            });
        }

        // ================= WHY GPO DYNAMIC CARDS LOGIC =================
        const whyGpoContainer = document.getElementById('why_gpo_cards_container');
        const btnAddWhyGpoCard = document.getElementById('btn_add_why_gpo_card');
        const whyGpoCountText = document.getElementById('why_gpo_count_text');

        function reindexWhyGpoCards() {
            if (!whyGpoContainer) return;
            const items = whyGpoContainer.querySelectorAll('.why-gpo-card-col');

            items.forEach((item, idx) => {
                item.setAttribute('data-index', idx);

                const numBadge = item.querySelector('.why-card-num-badge');
                if (numBadge) numBadge.textContent = idx + 1;

                const slotNum = item.querySelector('.why-slot-num');
                if (slotNum) slotNum.textContent = idx + 1;

                const titleInput = item.querySelector('.why-card-title-input');
                if (titleInput) {
                    titleInput.setAttribute('name', `why_gpo[items][${idx}][title]`);
                }

                const styleSelect = item.querySelector('.why-card-style-select');
                if (styleSelect) {
                    styleSelect.setAttribute('name', `why_gpo[items][${idx}][style]`);
                }

                const descInput = item.querySelector('.why-card-desc-input');
                if (descInput) {
                    descInput.setAttribute('name', `why_gpo[items][${idx}][description]`);
                }
            });

            if (whyGpoCountText) {
                whyGpoCountText.textContent = items.length;
            }
        }

        function bindWhyCardLiveEvents(cardCol) {
            const titleInput = cardCol.querySelector('.why-card-title-input');
            const headerTitle = cardCol.querySelector('.why-card-header-title');
            const styleSelect = cardCol.querySelector('.why-card-style-select');
            const stylePill = cardCol.querySelector('.why-style-pill');

            if (titleInput && headerTitle) {
                titleInput.addEventListener('input', function () {
                    const idx = cardCol.getAttribute('data-index') || '0';
                    headerTitle.textContent = this.value.trim() !== '' ? this.value.trim() : `Card ${parseInt(idx) + 1}`;
                });
            }

            if (styleSelect && stylePill) {
                styleSelect.addEventListener('change', function () {
                    if (this.value === 'terracotta') {
                        stylePill.className = 'badge bg-danger-subtle text-danger px-2 py-0.5 fs-10 why-style-pill';
                        stylePill.textContent = 'Terracotta Coral';
                    } else {
                        stylePill.className = 'badge bg-primary-subtle text-primary px-2 py-0.5 fs-10 why-style-pill';
                        stylePill.textContent = 'Deep Teal';
                    }
                });
            }
        }

        // Bind existing why cards
        if (whyGpoContainer) {
            whyGpoContainer.querySelectorAll('.why-gpo-card-col').forEach(col => {
                bindWhyCardLiveEvents(col);
            });

            // Delegate remove card button
            whyGpoContainer.addEventListener('click', function (e) {
                const removeBtn = e.target.closest('.btn-remove-why-card');
                if (removeBtn) {
                    const totalCards = whyGpoContainer.querySelectorAll('.why-gpo-card-col').length;
                    if (totalCards <= 1) {
                        alert('At least one card is required!');
                        return;
                    }
                    const col = removeBtn.closest('.why-gpo-card-col');
                    if (col && confirm('Are you sure you want to delete this card?')) {
                        col.style.transition = 'all 0.25s ease';
                        col.style.opacity = '0';
                        col.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            col.remove();
                            reindexWhyGpoCards();
                        }, 250);
                    }
                }
            });
        }

        // Add Why GPO Card Handler
        if (btnAddWhyGpoCard && whyGpoContainer) {
            btnAddWhyGpoCard.addEventListener('click', function () {
                const currentCount = whyGpoContainer.querySelectorAll('.why-gpo-card-col').length;
                const nextIndex = currentCount;
                const nextNum = currentCount + 1;
                // Alternate terracotta and teal
                const defaultStyle = nextIndex % 2 === 0 ? 'terracotta' : 'teal';
                const isTerracotta = defaultStyle === 'terracotta';

                const colDiv = document.createElement('div');
                colDiv.className = 'col-lg-4 col-md-6 col-12 why-gpo-card-col';
                colDiv.setAttribute('data-index', nextIndex);
                colDiv.style.opacity = '0';
                colDiv.style.transform = 'scale(0.9)';
                colDiv.style.transition = 'all 0.25s ease';

                colDiv.innerHTML = `
                    <div class="card border h-100 shadow-sm why-gpo-item-box" style="border-radius: 10px; background: #fbfcfe; border-color: #e2e8f0 !important; transition: all 0.2s ease;">
                        <div class="card-header bg-white py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-dark rounded-circle why-card-num-badge" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">${nextNum}</span>
                                <span class="fw-bold fs-12 text-dark why-card-header-title">Card ${nextNum}</span>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-why-card" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this card">
                                <i class="bi bi-trash fs-12"></i>
                            </button>
                        </div>
                        <div class="card-body p-3 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">
                                        Card Title (Header)
                                    </label>
                                    <input type="text" name="why_gpo[items][${nextIndex}][title]" value="" class="form-control form-control-sm modern-input fw-bold why-card-title-input" placeholder="e.g. SPECIAL RECIPE" style="border-radius: 6px; background: #ffffff;">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">
                                        Title Color Style
                                    </label>
                                    <select name="why_gpo[items][${nextIndex}][style]" class="form-select form-select-sm modern-input fs-12 why-card-style-select" style="border-radius: 6px; background: #ffffff;">
                                        <option value="terracotta" ${isTerracotta ? 'selected' : ''}>🟧 Terracotta Coral (Accent / Warm)</option>
                                        <option value="teal" ${!isTerracotta ? 'selected' : ''}>🟦 Deep Teal (Royal / Elegant)</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">
                                        Description Paragraph
                                    </label>
                                    <textarea name="why_gpo[items][${nextIndex}][description]" rows="4" class="form-control form-control-sm modern-input why-card-desc-input" style="font-size: 12px; line-height: 1.5; border-radius: 6px; min-height: 90px; background: #ffffff;" placeholder="Enter card description..."></textarea>
                                </div>
                            </div>
                            <div class="pt-2 mt-2 border-top border-light-subtle d-flex align-items-center justify-content-between">
                                <small class="text-muted fs-10">
                                    <i class="bi bi-grid me-1"></i> Slot <span class="why-slot-num">${nextNum}</span>
                                </small>
                                <span class="badge ${isTerracotta ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary'} px-2 py-0.5 fs-10 why-style-pill">
                                    ${isTerracotta ? 'Terracotta Coral' : 'Deep Teal'}
                                </span>
                            </div>
                        </div>
                    </div>
                `;

                whyGpoContainer.appendChild(colDiv);
                setTimeout(() => {
                    colDiv.style.opacity = '1';
                    colDiv.style.transform = 'scale(1)';
                }, 10);

                bindWhyCardLiveEvents(colDiv);
                reindexWhyGpoCards();

                const titleInput = colDiv.querySelector('.why-card-title-input');
                if (titleInput) {
                    titleInput.focus();
                }
            });
        }

        // ================= STAR OF GPO IMAGE PREVIEW LOGIC =================
        const starDishImageInput = document.querySelector('.star-dish-image-input');
        const starDishPreviewImg = document.querySelector('.star-dish-preview-img');
        const starDishImageDisplay = document.querySelector('.star-dish-image-display');

        if (starDishImageInput && starDishPreviewImg) {
            starDishImageInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        starDishPreviewImg.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    if (starDishImageDisplay) {
                        starDishImageDisplay.innerHTML = `<i class="bi bi-file-earmark-arrow-up text-danger me-1"></i> Ready to upload: <strong>${file.name}</strong> (${(file.size / 1024).toFixed(1)} KB)`;
                    }
                }
            });
        }

        // ================= STAR OF GPO DYNAMIC PARAGRAPHS LOGIC =================
        const starParaContainer = document.getElementById('star_paragraphs_container');
        const btnAddStarPara = document.getElementById('btn_add_star_paragraph');
        const starColorBadges = ['primary', 'success', 'warning', 'info', 'secondary', 'dark'];

        function reindexStarParagraphs() {
            if (!starParaContainer) return;
            const items = starParaContainer.querySelectorAll('.star-paragraph-item');

            items.forEach((item, idx) => {
                item.setAttribute('data-index', idx);

                const paraNum = item.querySelector('.star-para-num');
                if (paraNum) paraNum.textContent = idx + 1;

                const slotNum = item.querySelector('.star-slot-num');
                if (slotNum) slotNum.textContent = idx + 1;

                const textarea = item.querySelector('.star-para-textarea');
                if (textarea) {
                    textarea.setAttribute('name', `star_dish[paragraphs][${idx}]`);
                }

                const badge = item.querySelector('.star-para-badge');
                if (badge) {
                    const badgeColor = starColorBadges[idx % starColorBadges.length];
                    badge.className = `badge bg-${badgeColor}-subtle text-${badgeColor} border border-${badgeColor}-subtle fs-11 fw-semibold star-para-badge`;
                }
            });
        }

        if (starParaContainer) {
            // Delegate remove button
            starParaContainer.addEventListener('click', function (e) {
                const removeBtn = e.target.closest('.btn-remove-star-para');
                if (removeBtn) {
                    const totalParas = starParaContainer.querySelectorAll('.star-paragraph-item').length;
                    if (totalParas <= 1) {
                        alert('At least one paragraph is required!');
                        return;
                    }
                    const item = removeBtn.closest('.star-paragraph-item');
                    if (item && confirm('Are you sure you want to delete this paragraph?')) {
                        item.style.transition = 'all 0.25s ease';
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            item.remove();
                            reindexStarParagraphs();
                        }, 250);
                    }
                }
            });
        }

        // Add paragraph handler
        if (btnAddStarPara && starParaContainer) {
            btnAddStarPara.addEventListener('click', function () {
                const currentCount = starParaContainer.querySelectorAll('.star-paragraph-item').length;
                const nextIndex = currentCount;
                const nextNum = currentCount + 1;
                const badgeColor = starColorBadges[nextIndex % starColorBadges.length];

                const colDiv = document.createElement('div');
                colDiv.className = 'col-lg-6 col-md-6 col-12 star-paragraph-item';
                colDiv.setAttribute('data-index', nextIndex);
                colDiv.style.opacity = '0';
                colDiv.style.transform = 'scale(0.95)';
                colDiv.style.transition = 'all 0.25s ease';

                colDiv.innerHTML = `
                    <div class="p-3 rounded-3 h-100 d-flex flex-column justify-content-between position-relative" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-${badgeColor}-subtle text-${badgeColor} border border-${badgeColor}-subtle fs-11 fw-semibold star-para-badge">
                                    <i class="bi bi-paragraph me-1"></i> Paragraph <span class="star-para-num">${nextNum}</span>
                                </span>
                                <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-star-para" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this paragraph">
                                    <i class="bi bi-trash fs-12"></i>
                                </button>
                            </div>
                            <textarea name="star_dish[paragraphs][${nextIndex}]" rows="5" class="form-control form-control-sm modern-input star-para-textarea" style="font-size: 12px; line-height: 1.5; border-radius: 8px; min-height: 120px; background: #ffffff;" placeholder="Enter paragraph content..."></textarea>
                        </div>
                        <small class="text-muted fs-10 mt-2 d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-card-text me-1"></i> Slot <span class="star-slot-num">${nextNum}</span> on website</span>
                            <span class="text-muted fst-italic">Supporting note</span>
                        </small>
                    </div>
                `;

                starParaContainer.appendChild(colDiv);
                setTimeout(() => {
                    colDiv.style.opacity = '1';
                    colDiv.style.transform = 'scale(1)';
                }, 10);

                reindexStarParagraphs();

                const newTextarea = colDiv.querySelector('textarea');
                if (newTextarea) {
                    newTextarea.focus();
                }
            });
        }

        // ================= THE GPO EXPERIENCE DYNAMIC ITEMS LOGIC =================
        const experienceContainer = document.getElementById('experience_items_container');
        const btnAddExperienceItem = document.getElementById('btn_add_experience_item');
        const experienceCountText = document.getElementById('experience_count_text');

        function reindexExperienceItems() {
            if (!experienceContainer) return;
            const items = experienceContainer.querySelectorAll('.experience-item-col');

            items.forEach((item, idx) => {
                item.setAttribute('data-index', idx);

                const numBadge = item.querySelector('.exp-item-num-badge');
                if (numBadge) numBadge.textContent = idx + 1;

                const slotNum = item.querySelector('.exp-slot-num');
                if (slotNum) slotNum.textContent = idx + 1;

                const iconInput = item.querySelector('.exp-icon-input');
                if (iconInput) iconInput.setAttribute('name', `experience[items][${idx}][icon]`);

                const titleInput = item.querySelector('.exp-title-input');
                if (titleInput) titleInput.setAttribute('name', `experience[items][${idx}][title]`);

                const descInput = item.querySelector('.exp-desc-input');
                if (descInput) descInput.setAttribute('name', `experience[items][${idx}][description]`);
            });

            if (experienceCountText) {
                experienceCountText.textContent = items.length;
            }
        }

        function bindExperienceItemLiveEvents(col) {
            const titleInput = col.querySelector('.exp-title-input');
            const headerTitle = col.querySelector('.exp-item-header-title');

            if (titleInput && headerTitle) {
                titleInput.addEventListener('input', function () {
                    const idx = col.getAttribute('data-index') || '0';
                    headerTitle.textContent = this.value.trim() !== '' ? this.value.trim() : `Item ${parseInt(idx) + 1}`;
                });
            }
        }

        if (experienceContainer) {
            experienceContainer.querySelectorAll('.experience-item-col').forEach(col => {
                bindExperienceItemLiveEvents(col);
            });

            // Delegate remove experience item
            experienceContainer.addEventListener('click', function (e) {
                const removeBtn = e.target.closest('.btn-remove-exp-item');
                if (removeBtn) {
                    const totalItems = experienceContainer.querySelectorAll('.experience-item-col').length;
                    if (totalItems <= 1) {
                        alert('At least one feature item is required!');
                        return;
                    }
                    const col = removeBtn.closest('.experience-item-col');
                    if (col && confirm('Are you sure you want to delete this experience item?')) {
                        col.style.transition = 'all 0.25s ease';
                        col.style.opacity = '0';
                        col.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            col.remove();
                            reindexExperienceItems();
                        }, 250);
                    }
                }
            });
        }

        // Add Experience Item Handler
        if (btnAddExperienceItem && experienceContainer) {
            btnAddExperienceItem.addEventListener('click', function () {
                const currentCount = experienceContainer.querySelectorAll('.experience-item-col').length;
                const nextIndex = currentCount;
                const nextNum = currentCount + 1;
                const defaultIcons = ['🌿', '✨', '🥣', '🎉', '🍛', '❤️', '🌟', '🏆'];
                const assignedIcon = defaultIcons[nextIndex % defaultIcons.length];

                const colDiv = document.createElement('div');
                colDiv.className = 'col-lg-6 col-md-6 col-12 experience-item-col';
                colDiv.setAttribute('data-index', nextIndex);
                colDiv.style.opacity = '0';
                colDiv.style.transform = 'scale(0.9)';
                colDiv.style.transition = 'all 0.25s ease';

                colDiv.innerHTML = `
                    <div class="card border h-100 shadow-sm exp-item-box" style="border-radius: 10px; background: #fbfcfe; border-color: #e2e8f0 !important; transition: all 0.2s ease;">
                        <div class="card-header bg-white py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary rounded-circle exp-item-num-badge" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">${nextNum}</span>
                                <span class="fw-bold fs-12 text-dark exp-item-header-title">Item ${nextNum}</span>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm p-0 d-flex align-items-center justify-content-center btn-remove-exp-item" style="width: 26px; height: 26px; border-radius: 6px;" title="Remove this item">
                                <i class="bi bi-trash fs-12"></i>
                            </button>
                        </div>
                        <div class="card-body p-3 d-flex flex-column justify-content-between">
                            <div>
                                <div class="row g-2 mb-2">
                                    <div class="col-3">
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                            Icon / Emoji
                                        </label>
                                        <input type="text" name="experience[items][${nextIndex}][icon]" value="${assignedIcon}" class="form-control form-control-sm modern-input text-center fw-bold fs-15 exp-icon-input" placeholder="🌿" style="border-radius: 6px; background: #ffffff;">
                                    </div>
                                    <div class="col-9">
                                        <label class="form-label fs-11 fw-bold text-dark mb-1">
                                            Item Title
                                        </label>
                                        <input type="text" name="experience[items][${nextIndex}][title]" value="" class="form-control form-control-sm modern-input fw-bold exp-title-input" placeholder="e.g. Special Atmosphere" style="border-radius: 6px; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">
                                        Description Note
                                    </label>
                                    <textarea name="experience[items][${nextIndex}][description]" rows="3" class="form-control form-control-sm modern-input exp-desc-input" style="font-size: 12px; line-height: 1.5; border-radius: 6px; min-height: 75px; background: #ffffff;" placeholder="Enter short note..."></textarea>
                                </div>
                            </div>
                            <div class="pt-2 mt-2 border-top border-light-subtle d-flex align-items-center justify-content-between">
                                <small class="text-muted fs-10">
                                    <i class="bi bi-grid me-1"></i> Column <span class="exp-slot-num">${nextNum}</span> on website
                                </small>
                                <span class="badge bg-light text-muted border px-2 py-0.5 fs-10">
                                    Feature ${nextNum}
                                </span>
                            </div>
                        </div>
                    </div>
                `;

                experienceContainer.appendChild(colDiv);
                setTimeout(() => {
                    colDiv.style.opacity = '1';
                    colDiv.style.transform = 'scale(1)';
                }, 10);

                bindExperienceItemLiveEvents(colDiv);
                reindexExperienceItems();

                const titleInput = colDiv.querySelector('.exp-title-input');
                if (titleInput) {
                    titleInput.focus();
                }
            });
        }
    });
</script>
@endpush
