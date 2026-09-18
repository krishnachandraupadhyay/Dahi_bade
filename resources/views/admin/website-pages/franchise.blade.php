@extends('layouts.admin')

@section('title', 'Edit Franchise Page')

@section('content')
<style>
    /* Premium Modern Form Styling */
    .franchise-config-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }
    .franchise-config-header {
        background: #f8fafc;
        padding: 14px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .franchise-row {
        display: flex;
        align-items: flex-start;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    .franchise-row:last-child {
        border-bottom: none;
    }
    .franchise-row:hover {
        background-color: #fafbfc;
    }
    .franchise-label-col {
        width: 220px;
        min-width: 210px;
        flex-shrink: 0;
        padding-right: 20px;
        padding-top: 5px;
    }
    .franchise-label-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 3px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .franchise-label-desc {
        font-size: 11.5px;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0;
    }
    .franchise-input-col {
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
        transition: all 0.2s ease;
    }
    .item-card-box:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
    }
    .btn-action-bar {
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 0 0 12px 12px;
    }
</style>

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
        <a href="{{ route('admin.website-pages.index') }}" class="btn btn-light border btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
            <i class="bi bi-arrow-left fs-13"></i>
            <span>Back to Pages</span>
        </a>
        <a href="{{ route('franchise') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
            <i class="bi bi-box-arrow-up-right fs-13"></i>
            <span>Preview Live Franchise</span>
        </a>
    </div>
</div>

<!-- Main Card with Section Dropdown Header -->
<div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
    <!-- Topbar with Dropdown Selector -->
    <div class="card-header bg-white py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom border-light-subtle">
        <!-- Left Side: Page Info -->
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-warning-subtle text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; font-size: 20px;">
                <i class="bi bi-shop"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark mb-0 fs-16" style="line-height: 1.25;">Franchise Opportunity Page</h5>
                <small class="text-muted fs-12 d-block" style="margin-top: 2px;">Manage hero carousel sliders, partner USPs, investment metrics, journey steps & CTA banner</small>
            </div>
        </div>

        <!-- Right Side: Section Dropdown Selector -->
        @php $activeSection = request('section', 'hero_sliders'); @endphp
        <div class="d-flex align-items-center gap-2.5">
            <label for="franchiseSectionSelector" class="fs-13 text-muted mb-0 fw-semibold text-nowrap d-flex align-items-center gap-1.5">
                <i class="bi bi-layers text-primary fs-14"></i> <span>Select Section:</span>
            </label>
            <select id="franchiseSectionSelector" onchange="window.switchFranchiseSection(this.value)" class="form-select form-select-sm fw-medium shadow-none" style="min-width: 320px; font-size: 13px; border-color: #cbd5e1; border-radius: 8px; padding: 6px 12px; cursor: pointer;">
                <option value="hero_sliders" {{ $activeSection === 'hero_sliders' ? 'selected' : '' }}>1. Hero Carousel & Slides (3 Sliders)</option>
                <option value="why_partner" {{ $activeSection === 'why_partner' ? 'selected' : '' }}>2. Why Partner With GPO?</option>
                <option value="usp_cards" {{ $activeSection === 'usp_cards' ? 'selected' : '' }}>3. What You Get With GPO (6 USPs)</option>
                <option value="at_a_glance" {{ $activeSection === 'at_a_glance' ? 'selected' : '' }}>4. Franchise at a Glance (Key Metrics & ROI)</option>
                <option value="who_can_partner" {{ $activeSection === 'who_can_partner' ? 'selected' : '' }}>5. Who Can Partner With Us? (5 Profiles)</option>
                <option value="franchise_journey" {{ $activeSection === 'franchise_journey' ? 'selected' : '' }}>6. The GPO Franchise Journey (6 Steps)</option>
                <option value="enquiry_form" {{ $activeSection === 'enquiry_form' ? 'selected' : '' }}>7. Franchise Enquiry Desk & Headings</option>
                <option value="footer_cta" {{ $activeSection === 'footer_cta' ? 'selected' : '' }}>8. Bottom Expansion Banner (Final CTA)</option>
            </select>
        </div>
    </div>

    <script>
        // Self-contained section switcher that preserves query params and switches display
        window.switchFranchiseSection = function(sectionId) {
            if (!sectionId) return;
            var panels = document.querySelectorAll('.franchise-section-panel');
            panels.forEach(function(panel) {
                if (panel.id === 'panel_' + sectionId) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
            var sel = document.getElementById('franchiseSectionSelector');
            if (sel && sel.value !== sectionId) {
                sel.value = sectionId;
            }
            try {
                var newUrl = new URL(window.location.href);
                newUrl.searchParams.set('section', sectionId);
                window.history.replaceState({}, '', newUrl.toString());
            } catch(e) {}
        };
    </script>

    <!-- Card Body Content Area -->
    <div class="card-body p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-18"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- ================= 1. HERO SLIDERS PANEL ================= -->
        <div class="franchise-section-panel" id="panel_hero_sliders" style="{{ $activeSection === 'hero_sliders' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 1</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Hero Carousel & Expansion Banners (3 Sliders)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Image / Video / GIF / YouTube Multi-Media Enabled</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_section" value="hero_sliders">

                <!-- Tabs for the 3 slides -->
                <ul class="nav nav-pills mb-4 gap-2" id="heroSlidesTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold fs-13 py-2 px-3.5 rounded-3" id="slide-0-tab" data-bs-toggle="pill" data-bs-target="#slide-0" type="button" role="tab">
                            <i class="bi bi-1-circle-fill me-1"></i> Slide 1: Partnership
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold fs-13 py-2 px-3.5 rounded-3" id="slide-1-tab" data-bs-toggle="pill" data-bs-target="#slide-1" type="button" role="tab">
                            <i class="bi bi-2-circle-fill me-1"></i> Slide 2: Expansion
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold fs-13 py-2 px-3.5 rounded-3" id="slide-2-tab" data-bs-toggle="pill" data-bs-target="#slide-2" type="button" role="tab">
                            <i class="bi bi-3-circle-fill me-1"></i> Slide 3: Brand Reputation
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="heroSlidesTabContent">
                    @php
                        $slides = $franchise['hero_sliders'] ?? [];
                    @endphp

                    @for($i = 0; $i < 3; $i++)
                        @php
                            $slide = $slides[$i] ?? [];
                            $mediaType = $slide['media_type'] ?? 'image';
                            $mediaSrc = $slide['media'] ?? 'images/franchise.jpg';
                            $overlayColor = $slide['overlay_color'] ?? '#083b3c';
                            $overlayOpacity = $slide['overlay_opacity'] ?? '0.75';
                            $overlayStyle = $slide['overlay_style'] ?? 'solid';
                        @endphp
                        <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="slide-{{ $i }}" role="tabpanel">
                            <div class="franchise-config-card mb-4">
                                <div class="franchise-config-header">
                                    <span class="fw-bold text-dark fs-14"><i class="bi bi-sliders me-1.5 text-primary"></i> Slide {{ $i + 1 }} Configuration</span>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle fs-11">Slide Index: #{{ $i + 1 }}</span>
                                </div>

                                <!-- Live Simulator Preview -->
                                <div class="p-3 bg-light border-bottom">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-bold text-secondary text-uppercase"><i class="bi bi-display me-1"></i> Live Slide Preview</span>
                                        <small class="text-muted fs-11">Simulates real-time appearance on public website</small>
                                    </div>
                                    <div id="slide_preview_box_{{ $i }}" class="position-relative overflow-hidden rounded-3 text-white p-4 shadow-sm" style="min-height: 200px; background-size: cover; background-position: center; background-image: url('{{ asset($mediaSrc) }}');">
                                        <!-- Overlay Layer -->
                                        <div id="slide_preview_overlay_{{ $i }}" class="position-absolute top-0 start-0 w-100 h-100" style="background-color: {{ $overlayColor }}; opacity: {{ $overlayOpacity }};"></div>
                                        
                                        <!-- Content Layer -->
                                        <div class="position-relative z-1" style="max-width: 580px;">
                                            <div id="slide_prev_badge_{{ $i }}" class="badge bg-warning text-dark mb-2 fs-11">{{ $slide['badge'] ?? 'FRANCHISE' }}</div>
                                            <h4 id="slide_prev_heading_{{ $i }}" class="fw-bold mb-1 fs-20 text-white" style="letter-spacing: 0.5px;">{!! nl2br(e($slide['heading'] ?? 'BRING THE ORIGINAL TO YOUR CITY')) !!}</h4>
                                            <div id="slide_prev_sub_{{ $i }}" class="fs-13 text-warning fw-semibold mb-2">{{ $slide['sub'] ?? 'BECOME A GPO FRANCHISE PARTNER' }}</div>
                                            <div class="d-flex gap-2 mt-3">
                                                <span class="btn btn-warning btn-sm fw-bold px-3 py-1">{{ $slide['btn1_text'] ?? 'APPLY NOW' }}</span>
                                                <span class="btn btn-outline-light btn-sm fw-semibold px-3 py-1">{{ $slide['btn2_text'] ?? 'WHY PARTNER' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Multi-Media Background Selector -->
                                <div class="franchise-row">
                                    <div class="franchise-label-col">
                                        <div class="franchise-label-title"><i class="bi bi-film text-danger"></i> Background Media</div>
                                        <p class="franchise-label-desc">Choose Image/GIF, MP4 Video, or YouTube Link.</p>
                                    </div>
                                    <div class="franchise-input-col">
                                        <!-- 4-Column Responsive Layout (col-sm-3) -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Media Format:</label>
                                                <select name="franchise[hero_sliders][{{ $i }}][media_type]" class="form-select modern-select" onchange="toggleSlideMediaType({{ $i }}, this.value)">
                                                    <option value="image" {{ $mediaType === 'image' ? 'selected' : '' }}>🖼️ Photo / Banner</option>
                                                    <option value="gif" {{ $mediaType === 'gif' ? 'selected' : '' }}>🎞️ Animated GIF</option>
                                                    <option value="video" {{ $mediaType === 'video' ? 'selected' : '' }}>🎥 MP4 Video File</option>
                                                    <option value="youtube" {{ $mediaType === 'youtube' ? 'selected' : '' }}>▶️ YouTube Video</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Color:</label>
                                                <div class="input-group">
                                                    <input type="color" name="franchise[hero_sliders][{{ $i }}][overlay_color]" value="{{ $overlayColor }}" class="form-control form-control-color border-0 p-1 rounded-start" style="height: 38px; width: 45px;" oninput="updateSlideOverlay({{ $i }})">
                                                    <input type="text" id="slide_color_hex_{{ $i }}" value="{{ $overlayColor }}" class="form-control modern-input fs-12" readonly>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Darkness / Opacity:</label>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="range" name="franchise[hero_sliders][{{ $i }}][overlay_opacity]" min="0" max="1" step="0.05" value="{{ $overlayOpacity }}" class="form-range" oninput="updateSlideOpacity({{ $i }}, this.value)">
                                                    <span id="slide_opacity_val_{{ $i }}" class="badge bg-dark fs-11" style="min-width: 38px;">{{ $overlayOpacity }}</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Tint Style:</label>
                                                <select name="franchise[hero_sliders][{{ $i }}][overlay_style]" class="form-select modern-select">
                                                    <option value="solid" {{ $overlayStyle === 'solid' ? 'selected' : '' }}>Solid Tint</option>
                                                    <option value="gradient" {{ $overlayStyle === 'gradient' ? 'selected' : '' }}>Gradient Tint</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Media Inputs based on format -->
                                        <div class="p-3 bg-light rounded-3 border">
                                            <div id="slide_file_wrap_{{ $i }}" style="{{ $mediaType === 'youtube' ? 'display:none;' : 'display:block;' }}">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Media File (Photo, GIF or MP4 Video):</label>
                                                <input type="file" name="franchise[hero_sliders][{{ $i }}][media_file]" class="form-control form-control-sm modern-input" accept="image/*,video/mp4,video/webm">
                                                <input type="hidden" name="franchise[hero_sliders][{{ $i }}][media]" value="{{ $mediaSrc }}">
                                                <input type="hidden" name="franchise[hero_sliders][{{ $i }}][video]" value="{{ $slide['video'] ?? '' }}">
                                                <div class="form-text fs-11 text-muted">Current file: <code>{{ $mediaSrc }}</code></div>
                                            </div>

                                            <div id="slide_yt_wrap_{{ $i }}" style="{{ $mediaType === 'youtube' ? 'display:block;' : 'display:none;' }}">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">YouTube URL or Video ID:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white"><i class="bi bi-youtube text-danger"></i></span>
                                                    <input type="text" name="franchise[hero_sliders][{{ $i }}][youtube_url]" value="{{ $slide['youtube_url'] ?? '' }}" class="form-control modern-input" placeholder="https://www.youtube.com/watch?v=...">
                                                </div>
                                                <input type="hidden" name="franchise[hero_sliders][{{ $i }}][youtube_id]" value="{{ $slide['youtube_id'] ?? '' }}">
                                                <div class="form-text fs-11 text-muted">Example: <code>https://www.youtube.com/watch?v=dQw4w9WgXcQ</code></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text Content -->
                                <div class="franchise-row">
                                    <div class="franchise-label-col">
                                        <div class="franchise-label-title"><i class="bi bi-type text-primary"></i> Headings & Subtitle</div>
                                        <p class="franchise-label-desc">Main badge, headline, and supporting tagline.</p>
                                    </div>
                                    <div class="franchise-input-col">
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-5 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Tagline:</label>
                                                <input type="text" name="franchise[hero_sliders][{{ $i }}][badge]" value="{{ $slide['badge'] ?? '' }}" class="form-control modern-input" placeholder="e.g. 🏢 FRANCHISE PARTNERSHIP">
                                            </div>
                                            <div class="col-md-7 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                                <input type="text" name="franchise[hero_sliders][{{ $i }}][sub]" value="{{ $slide['sub'] ?? '' }}" class="form-control modern-input" placeholder="e.g. BECOME A GPO FRANCHISE PARTNER">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Main Headline (HTML / Line-breaks allowed):</label>
                                                <textarea name="franchise[hero_sliders][{{ $i }}][heading]" rows="2" class="form-control modern-textarea fw-bold" placeholder="BRING THE ORIGINAL&#10;TO YOUR CITY">{{ $slide['heading'] ?? '' }}</textarea>
                                            </div>
                                            @if($i === 0)
                                                <div class="col-12">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Key Value Bullets (3 Items):</label>
                                                    @php $bullets = $slide['bullets'] ?? ['A trusted Lucknow food legacy.', 'A focused food concept.', 'A brand built around a signature product.']; @endphp
                                                    <div class="row g-2">
                                                        @for($b = 0; $b < 3; $b++)
                                                            <div class="col-md-4 col-12">
                                                                <input type="text" name="franchise[hero_sliders][0][bullets][]" value="{{ $bullets[$b] ?? '' }}" class="form-control modern-input fs-12" placeholder="Bullet {{ $b + 1 }}">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-12">
                                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description Paragraph:</label>
                                                    <textarea name="franchise[hero_sliders][{{ $i }}][desc]" rows="2" class="form-control modern-textarea" placeholder="Slide description...">{{ $slide['desc'] ?? '' }}</textarea>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="franchise-row">
                                    <div class="franchise-label-col">
                                        <div class="franchise-label-title"><i class="bi bi-link-45deg text-success"></i> Action Buttons</div>
                                        <p class="franchise-label-desc">Configure the primary and secondary CTA buttons.</p>
                                    </div>
                                    <div class="franchise-input-col">
                                        <div class="row g-3">
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Primary Button Text & Link:</label>
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text input-group-text-modern">Label</span>
                                                    <input type="text" name="franchise[hero_sliders][{{ $i }}][btn1_text]" value="{{ $slide['btn1_text'] ?? 'APPLY FOR FRANCHISE' }}" class="form-control modern-input">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text input-group-text-modern">URL</span>
                                                    <input type="text" name="franchise[hero_sliders][{{ $i }}][btn1_url]" value="{{ $slide['btn1_url'] ?? '#enquiryForm' }}" class="form-control modern-input">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-12 fw-bold text-dark mb-1">Secondary Button Text & Link:</label>
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text input-group-text-modern">Label</span>
                                                    <input type="text" name="franchise[hero_sliders][{{ $i }}][btn2_text]" value="{{ $slide['btn2_text'] ?? 'WHY PARTNER' }}" class="form-control modern-input">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text input-group-text-modern">URL</span>
                                                    <input type="text" name="franchise[hero_sliders][{{ $i }}][btn2_url]" value="{{ $slide['btn2_url'] ?? '#whyPartner' }}" class="form-control modern-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Hero Sliders Changes</span>
                    </button>
                    <a href="{{ route('franchise') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                        <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Page
                    </a>
                </div>
            </form>
        </div>

        <!-- ================= 2. WHY PARTNER PANEL ================= -->
        <div class="franchise-section-panel" id="panel_why_partner" style="{{ $activeSection === 'why_partner' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 2</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Why Partner With GPO?</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Pitch & Core Proposition</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="why_partner">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-patch-question me-1.5 text-primary"></i> Partnership Pitch Card</span>
                    </div>

                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Heading & Tagline</div>
                            <p class="franchise-label-desc">Section title and elegant serif punchline.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                                    <input type="text" name="franchise[why_heading]" value="{{ $franchise['why_heading'] ?? 'WHY PARTNER WITH GPO?' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Serif Subtitle / Tagline:</label>
                                    <input type="text" name="franchise[why_tagline]" value="{{ $franchise['why_tagline'] ?? 'MORE THAN A FRANCHISE. A LEGACY.' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Pitch Paragraphs</div>
                            <p class="franchise-label-desc">The two core message paragraphs shown in the central white box.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="mb-3">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Paragraph 1 (The Problem with Starting from Scratch):</label>
                                <textarea name="franchise[why_p1]" rows="3" class="form-control modern-textarea">{{ $franchise['why_p1'] ?? 'Starting a food business from scratch means building everything from the ground up — brand identity, customer trust, menu positioning and operating systems.' }}</textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Paragraph 2 (The GPO Advantage & 1976 Heritage):</label>
                                <textarea name="franchise[why_p2]" rows="3" class="form-control modern-textarea text-teal fw-semibold">{{ $franchise['why_p2'] ?? 'A GPO franchise gives entrepreneurs the opportunity to build around an established brand concept with a legacy dating back to 1976.' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Why Partner Section</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 3. USP CARDS PANEL ================= -->
        <div class="franchise-section-panel" id="panel_usp_cards" style="{{ $activeSection === 'usp_cards' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 3</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">What You Get With GPO (6 USP Cards)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">6 Core Value Proposition Cards</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="usp_cards">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-card-checklist me-1.5 text-primary"></i> Section Header Copy</span>
                    </div>
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Title & Subtitle</div>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Small Badge:</label>
                                    <input type="text" name="franchise[usp_badge]" value="{{ $franchise['usp_badge'] ?? 'USP CARDS' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-8 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Main Heading:</label>
                                    <input type="text" name="franchise[usp_heading]" value="{{ $franchise['usp_heading'] ?? 'WHAT YOU GET WITH GPO' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Description:</label>
                                    <input type="text" name="franchise[usp_sub]" value="{{ $franchise['usp_sub'] ?? 'Comprehensive ecosystem designed for partner operational excellence.' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    @php $usps = $franchise['usp_items'] ?? []; @endphp
                    @for($u = 0; $u < 6; $u++)
                        @php $item = $usps[$u] ?? []; @endphp
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item-card-box h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-secondary-subtle text-secondary fw-bold fs-11">USP #0{{ $u + 1 }}</span>
                                    <input type="text" name="franchise[usp_items][{{ $u }}][num]" value="{{ $item['num'] ?? sprintf('%02d', $u + 1) }}" class="form-control form-control-sm modern-input text-center fw-bold" style="width: 50px;">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Title:</label>
                                    <input type="text" name="franchise[usp_items][{{ $u }}][title]" value="{{ $item['title'] ?? '' }}" class="form-control modern-input fw-semibold fs-12" placeholder="USP Title">
                                </div>
                                <div>
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Description:</label>
                                    <textarea name="franchise[usp_items][{{ $u }}][desc]" rows="3" class="form-control modern-textarea fs-12" placeholder="Description...">{{ $item['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save USP Cards</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 4. FRANCHISE AT A GLANCE ================= -->
        <div class="franchise-section-panel" id="panel_at_a_glance" style="{{ $activeSection === 'at_a_glance' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 4</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Franchise at a Glance (Key Metrics & ROI)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">6 Commercial Metrics + Highlight Bar</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="at_a_glance">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-speedometer2 me-1.5 text-primary"></i> Section Header Copy</span>
                    </div>
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Title & Subtitle</div>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                                    <input type="text" name="franchise[glance_heading]" value="{{ $franchise['glance_heading'] ?? 'FRANCHISE AT A GLANCE' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                    <input type="text" name="franchise[glance_sub]" value="{{ $franchise['glance_sub'] ?? 'Key parameters and investment economics of the GPO franchise proposal.' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6 Metric Cards -->
                <div class="row g-3 mb-4">
                    @php $metrics = $franchise['glance_metrics'] ?? []; @endphp
                    @for($m = 0; $m < 6; $m++)
                        @php $met = $metrics[$m] ?? []; @endphp
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item-card-box h-100">
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-secondary text-uppercase mb-1">Metric Label:</label>
                                    <input type="text" name="franchise[glance_metrics][{{ $m }}][label]" value="{{ $met['label'] ?? '' }}" class="form-control modern-input fs-12 fw-semibold" placeholder="e.g. FRANCHISE FEE">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Highlight Value:</label>
                                    <input type="text" name="franchise[glance_metrics][{{ $m }}][value]" value="{{ $met['value'] ?? '' }}" class="form-control modern-input fw-bold text-primary fs-14" placeholder="e.g. ₹12,50,000">
                                </div>
                                <div>
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Short Description:</label>
                                    <input type="text" name="franchise[glance_metrics][{{ $m }}][desc]" value="{{ $met['desc'] ?? '' }}" class="form-control modern-input fs-12" placeholder="Description...">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- ROI Highlight Bar -->
                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-graph-up-arrow me-1.5 text-success"></i> Indicative ROI & Break-even Highlight Bar</span>
                    </div>
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Financial Bar Text</div>
                            <p class="franchise-label-desc">Highlighted at bottom of the metrics grid.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Lead Badge:</label>
                                    <input type="text" name="franchise[roi_highlight_lead]" value="{{ $franchise['roi_highlight_lead'] ?? 'FINANCIAL INDICATORS:' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-8 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Indicative Text:</label>
                                    <input type="text" name="franchise[roi_highlight_text]" value="{{ $franchise['roi_highlight_text'] ?? 'The proposal also calculates an indicative break-even period of approximately 3.5 months and annual ROI of 336% based on its assumptions.' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Glance Metrics</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 5. WHO CAN PARTNER WITH US? ================= -->
        <div class="franchise-section-panel" id="panel_who_can_partner" style="{{ $activeSection === 'who_can_partner' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 5</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Who Can Partner With Us? (5 Profiles)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Ideal Franchisee Profiles</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="who_can_partner">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-people me-1.5 text-primary"></i> Section Header Copy</span>
                    </div>
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Title & Subtitle</div>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                                    <input type="text" name="franchise[partner_heading]" value="{{ $franchise['partner_heading'] ?? 'WHO CAN PARTNER WITH US?' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                    <input type="text" name="franchise[partner_sub]" value="{{ $franchise['partner_sub'] ?? 'The GPO franchise opportunity may be suitable for:' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    @php $profiles = $franchise['partner_profiles'] ?? []; @endphp
                    @for($p = 0; $p < 5; $p++)
                        @php $prof = $profiles[$p] ?? []; @endphp
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item-card-box h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-warning-subtle text-warning fw-bold fs-11">Profile #{{ $p + 1 }}</span>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Profile Title:</label>
                                    <input type="text" name="franchise[partner_profiles][{{ $p }}][title]" value="{{ $prof['title'] ?? '' }}" class="form-control modern-input fw-bold fs-12" placeholder="Profile Title">
                                </div>
                                <div>
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Suitability Description:</label>
                                    <textarea name="franchise[partner_profiles][{{ $p }}][desc]" rows="2" class="form-control modern-textarea fs-12" placeholder="Description...">{{ $prof['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Partner Profiles</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 6. THE GPO FRANCHISE JOURNEY ================= -->
        <div class="franchise-section-panel" id="panel_franchise_journey" style="{{ $activeSection === 'franchise_journey' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 6</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">The GPO Franchise Journey (6 Steps)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Step-by-Step Onboarding Process</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="franchise_journey">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-signpost-split me-1.5 text-primary"></i> Section Header Copy</span>
                    </div>
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Title & Subtitle</div>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                                    <input type="text" name="franchise[journey_heading]" value="{{ $franchise['journey_heading'] ?? 'THE GPO FRANCHISE JOURNEY' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                    <input type="text" name="franchise[journey_sub]" value="{{ $franchise['journey_sub'] ?? 'A structured 6-step path from first enquiry to grand opening.' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    @php $steps = $franchise['journey_steps'] ?? []; @endphp
                    @for($s = 0; $s < 6; $s++)
                        @php $st = $steps[$s] ?? []; @endphp
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="item-card-box h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-info-subtle text-info fw-bold fs-11">Phase 0{{ $s + 1 }}</span>
                                    <input type="text" name="franchise[journey_steps][{{ $s }}][step]" value="{{ $st['step'] ?? ('STEP 0' . ($s + 1)) }}" class="form-control form-control-sm modern-input text-center fw-bold fs-11" style="width: 80px;">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Step Title:</label>
                                    <input type="text" name="franchise[journey_steps][{{ $s }}][title]" value="{{ $st['title'] ?? '' }}" class="form-control modern-input fw-bold fs-12" placeholder="Step Title">
                                </div>
                                <div>
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Step Details:</label>
                                    <textarea name="franchise[journey_steps][{{ $s }}][desc]" rows="2" class="form-control modern-textarea fs-12" placeholder="Details...">{{ $st['desc'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Journey Steps</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 7. FRANCHISE ENQUIRY FORM ================= -->
        <div class="franchise-section-panel" id="panel_enquiry_form" style="{{ $activeSection === 'enquiry_form' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 7</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Franchise Enquiry Desk & Form Headings</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Application Form Copy & Direct Contacts</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="enquiry_form">

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-ui-checks me-1.5 text-primary"></i> Form Headers & Text</span>
                    </div>

                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Headings & Subtitle</div>
                            <p class="franchise-label-desc">Texts shown above the application input fields.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Form Main Heading:</label>
                                    <input type="text" name="franchise[form_heading]" value="{{ $franchise['form_heading'] ?? 'YOUR CITY COULD BE NEXT' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Serif Tagline:</label>
                                    <input type="text" name="franchise[form_sub]" value="{{ $franchise['form_sub'] ?? 'READY TO BRING A LUCKNOW FAVOURITE TO YOUR MARKET?' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-8 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Instructions Text:</label>
                                    <input type="text" name="franchise[form_desc]" value="{{ $franchise['form_desc'] ?? 'Fill out the franchise enquiry form and our team will get in touch with you.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Label:</label>
                                    <input type="text" name="franchise[form_btn_text]" value="{{ $franchise['form_btn_text'] ?? 'SUBMIT FRANCHISE ENQUIRY' }}" class="form-control modern-input fw-bold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Franchise Helpdesk Contacts</div>
                            <p class="franchise-label-desc">Official telephone and email for queries.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Franchise Desk Phone:</label>
                                    <input type="text" name="franchise[phone]" value="{{ $franchise['phone'] ?? '+91 91406 31433' }}" class="form-control modern-input fw-semibold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Franchise Desk Email:</label>
                                    <input type="email" name="franchise[email]" value="{{ $franchise['email'] ?? 'franchise@gpokethandeydahibade.com' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Enquiry Form Copy</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 8. FINAL FRANCHISE CTA BANNER ================= -->
        <div class="franchise-section-panel" id="panel_footer_cta" style="{{ $activeSection === 'footer_cta' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 8</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Bottom Expansion Banner (Final CTA)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Photo / Video / YouTube Media + Transparent Overlay</span>
            </div>

            <form action="{{ route('admin.website-pages.franchise.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_section" value="footer_cta">

                @php
                    $ctaMediaType = $franchise['cta_media_type'] ?? 'image';
                    $ctaMediaSrc = $franchise['cta_image'] ?? 'images/franchise.jpg';
                    $ctaOverlayColor = $franchise['cta_overlay_color'] ?? '#083b3c';
                    $ctaOverlayOpacity = $franchise['cta_overlay_opacity'] ?? '0.90';
                    $ctaOverlayStyle = $franchise['cta_overlay_style'] ?? 'gradient';
                @endphp

                <div class="franchise-config-card mb-4">
                    <div class="franchise-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-megaphone me-1.5 text-primary"></i> Live Banner Simulator</span>
                    </div>

                    <!-- Live Simulator Box -->
                    <div class="p-3 bg-light border-bottom">
                        <div id="cta_preview_box" class="position-relative overflow-hidden rounded-3 text-white p-4 text-center shadow-sm" style="min-height: 220px; background-size: cover; background-position: center; background-image: url('{{ asset($ctaMediaSrc) }}');">
                            <!-- Overlay Layer -->
                            <div id="cta_preview_overlay" class="position-absolute top-0 start-0 w-100 h-100" style="background-color: {{ $ctaOverlayColor }}; opacity: {{ $ctaOverlayOpacity }};"></div>
                            
                            <!-- Content Layer -->
                            <div class="position-relative z-1 py-3" style="max-width: 650px; margin: 0 auto;">
                                <h3 id="cta_prev_heading" class="fw-bold mb-1 fs-22 text-white">{{ $franchise['cta_heading'] ?? 'DON’T JUST START A FOOD BUSINESS.' }}</h3>
                                <div id="cta_prev_sub" class="fs-14 text-warning fw-semibold mb-2">{{ $franchise['cta_sub'] ?? 'BUILD A BRAND PEOPLE REMEMBER.' }}</div>
                                <p id="cta_prev_desc" class="fs-12 text-light mb-3">{{ $franchise['cta_desc'] ?? 'Partner with Original GPO Ke Thandey Dahi Bade and deliver an authentic legacy of 1976.' }}</p>
                                <span class="btn btn-warning btn-sm fw-bold px-4 py-2">{{ $franchise['cta_btn_text'] ?? 'APPLY FOR FRANCHISE' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4-Column Responsive Layout (col-sm-3) for Overlay & Media Controls -->
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title"><i class="bi bi-palette text-warning"></i> Background & Tint</div>
                            <p class="franchise-label-desc">Choose media format, tint color, and transparency.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3 mb-3">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Media Format:</label>
                                    <select name="franchise[cta_media_type]" class="form-select modern-select" onchange="toggleCtaMediaType(this.value)">
                                        <option value="image" {{ $ctaMediaType === 'image' ? 'selected' : '' }}>🖼️ Photo / Banner</option>
                                        <option value="gif" {{ $ctaMediaType === 'gif' ? 'selected' : '' }}>🎞️ Animated GIF</option>
                                        <option value="video" {{ $ctaMediaType === 'video' ? 'selected' : '' }}>🎥 MP4 Video File</option>
                                        <option value="youtube" {{ $ctaMediaType === 'youtube' ? 'selected' : '' }}>▶️ YouTube Video</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Color:</label>
                                    <div class="input-group">
                                        <input type="color" name="franchise[cta_overlay_color]" value="{{ $ctaOverlayColor }}" class="form-control form-control-color border-0 p-1 rounded-start" style="height: 38px; width: 45px;" oninput="updateCtaOverlay(this.value)">
                                        <input type="text" id="cta_color_hex" value="{{ $ctaOverlayColor }}" class="form-control modern-input fs-12" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Darkness / Opacity:</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="range" name="franchise[cta_overlay_opacity]" min="0" max="1" step="0.05" value="{{ $ctaOverlayOpacity }}" class="form-range" oninput="updateCtaOpacity(this.value)">
                                        <span id="cta_opacity_val" class="badge bg-dark fs-11" style="min-width: 38px;">{{ $ctaOverlayOpacity }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Style:</label>
                                    <select name="franchise[cta_overlay_style]" class="form-select modern-select">
                                        <option value="solid" {{ $ctaOverlayStyle === 'solid' ? 'selected' : '' }}>Solid Tint</option>
                                        <option value="gradient" {{ $ctaOverlayStyle === 'gradient' ? 'selected' : '' }}>Gradient Tint</option>
                                    </select>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3 border">
                                <div id="cta_file_wrap" style="{{ $ctaMediaType === 'youtube' ? 'display:none;' : 'display:block;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Media File (Photo, GIF or MP4 Video):</label>
                                    <input type="file" name="franchise[cta_media_file]" class="form-control form-control-sm modern-input" accept="image/*,video/mp4,video/webm">
                                    <input type="hidden" name="franchise[cta_image]" value="{{ $ctaMediaSrc }}">
                                    <input type="hidden" name="franchise[cta_video]" value="{{ $franchise['cta_video'] ?? '' }}">
                                    <div class="form-text fs-11 text-muted">Current file: <code>{{ $ctaMediaSrc }}</code></div>
                                </div>

                                <div id="cta_yt_wrap" style="{{ $ctaMediaType === 'youtube' ? 'display:block;' : 'display:none;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">YouTube URL or Video ID:</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-youtube text-danger"></i></span>
                                        <input type="text" name="franchise[cta_youtube_url]" value="{{ $franchise['cta_youtube_url'] ?? '' }}" class="form-control modern-input" placeholder="https://www.youtube.com/watch?v=...">
                                    </div>
                                    <input type="hidden" name="franchise[cta_youtube_id]" value="{{ $franchise['cta_youtube_id'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text & Buttons -->
                    <div class="franchise-row">
                        <div class="franchise-label-col">
                            <div class="franchise-label-title">Banner Content</div>
                            <p class="franchise-label-desc">Headline, tagline, message and button destination.</p>
                        </div>
                        <div class="franchise-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Headline:</label>
                                    <input type="text" name="franchise[cta_heading]" value="{{ $franchise['cta_heading'] ?? 'DON’T JUST START A FOOD BUSINESS.' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Gold Subtitle:</label>
                                    <input type="text" name="franchise[cta_sub]" value="{{ $franchise['cta_sub'] ?? 'BUILD A BRAND PEOPLE REMEMBER.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description Paragraph:</label>
                                    <textarea name="franchise[cta_desc]" rows="2" class="form-control modern-textarea">{{ $franchise['cta_desc'] ?? 'Partner with Original GPO Ke Thandey Dahi Bade and deliver an authentic legacy of 1976.' }}</textarea>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                    <input type="text" name="franchise[cta_btn_text]" value="{{ $franchise['cta_btn_text'] ?? 'APPLY FOR FRANCHISE' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Target Link:</label>
                                    <input type="text" name="franchise[cta_btn_url]" value="{{ $franchise['cta_btn_url'] ?? '#enquiryForm' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Bottom Banner Changes</span>
                    </button>
                    <a href="{{ route('franchise') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                        <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Page
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    // Simulator update helpers for Franchise Slides
    function toggleSlideMediaType(index, val) {
        var fileWrap = document.getElementById('slide_file_wrap_' + index);
        var ytWrap = document.getElementById('slide_yt_wrap_' + index);
        if (val === 'youtube') {
            if (fileWrap) fileWrap.style.display = 'none';
            if (ytWrap) ytWrap.style.display = 'block';
        } else {
            if (fileWrap) fileWrap.style.display = 'block';
            if (ytWrap) ytWrap.style.display = 'none';
        }
    }

    function updateSlideOverlay(index) {
        var colorInput = document.querySelector('input[name="franchise[hero_sliders][' + index + '][overlay_color]"]');
        var hexInput = document.getElementById('slide_color_hex_' + index);
        var overlayEl = document.getElementById('slide_preview_overlay_' + index);
        if (colorInput && hexInput) {
            hexInput.value = colorInput.value;
            if (overlayEl) overlayEl.style.backgroundColor = colorInput.value;
        }
    }

    function updateSlideOpacity(index, val) {
        var badge = document.getElementById('slide_opacity_val_' + index);
        var overlayEl = document.getElementById('slide_preview_overlay_' + index);
        if (badge) badge.innerText = val;
        if (overlayEl) overlayEl.style.opacity = val;
    }

    // Simulator update helpers for CTA Banner
    function toggleCtaMediaType(val) {
        var fileWrap = document.getElementById('cta_file_wrap');
        var ytWrap = document.getElementById('cta_yt_wrap');
        if (val === 'youtube') {
            if (fileWrap) fileWrap.style.display = 'none';
            if (ytWrap) ytWrap.style.display = 'block';
        } else {
            if (fileWrap) fileWrap.style.display = 'block';
            if (ytWrap) ytWrap.style.display = 'none';
        }
    }

    function updateCtaOverlay(val) {
        var hexInput = document.getElementById('cta_color_hex');
        var overlayEl = document.getElementById('cta_preview_overlay');
        if (hexInput) hexInput.value = val;
        if (overlayEl) overlayEl.style.backgroundColor = val;
    }

    function updateCtaOpacity(val) {
        var badge = document.getElementById('cta_opacity_val');
        var overlayEl = document.getElementById('cta_preview_overlay');
        if (badge) badge.innerText = val;
        if (overlayEl) overlayEl.style.opacity = val;
    }
</script>
@endsection
