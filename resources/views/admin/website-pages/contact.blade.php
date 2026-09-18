@extends('layouts.admin')

@section('title', 'Edit Contact Us Page')

@section('content')
<style>
    /* Premium Modern Form Styling */
    .contact-config-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }
    .contact-config-header {
        background: #f8fafc;
        padding: 14px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .contact-row {
        display: flex;
        align-items: flex-start;
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    .contact-row:last-child {
        border-bottom: none;
    }
    .contact-row:hover {
        background-color: #fafbfc;
    }
    .contact-label-col {
        width: 220px;
        min-width: 210px;
        flex-shrink: 0;
        padding-right: 20px;
        padding-top: 5px;
    }
    .contact-label-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 3px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .contact-label-desc {
        font-size: 11.5px;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 0;
    }
    .contact-input-col {
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
        <a href="{{ route('admin.website-pages.index') }}" class="btn btn-light border btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
            <i class="bi bi-arrow-left fs-13"></i>
            <span>Back to Pages</span>
        </a>
        <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1.5 px-3 py-1.5 rounded-2">
            <i class="bi bi-box-arrow-up-right fs-13"></i>
            <span>Preview Live Contact Page</span>
        </a>
    </div>
</div>

<!-- Main Card with Section Dropdown Header -->
<div class="card border-0 shadow-sm" style="border-radius: 12px; background: #ffffff;">
    <!-- Topbar with Dropdown Selector -->
    <div class="card-header bg-white py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom border-light-subtle">
        <!-- Left Side: Page Info -->
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-danger-subtle text-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; font-size: 20px;">
                <i class="bi bi-geo-alt"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark mb-0 fs-16" style="line-height: 1.25;">Contact Us Page</h5>
                <small class="text-muted fs-12 d-block" style="margin-top: 2px;">Manage hero header, interactive Lucknow map, 3 info cards, message form & bottom banner</small>
            </div>
        </div>

        <!-- Right Side: Section Dropdown Selector -->
        @php $activeSection = request('section', 'hero_banner'); @endphp
        <div class="d-flex align-items-center gap-2.5">
            <label for="contactSectionSelector" class="fs-13 text-muted mb-0 fw-semibold text-nowrap d-flex align-items-center gap-1.5">
                <i class="bi bi-layers text-primary fs-14"></i> <span>Select Section:</span>
            </label>
            <select id="contactSectionSelector" onchange="window.switchContactSection(this.value)" class="form-select form-select-sm fw-medium shadow-none" style="min-width: 320px; font-size: 13px; border-color: #cbd5e1; border-radius: 8px; padding: 6px 12px; cursor: pointer;">
                <option value="hero_banner" {{ $activeSection === 'hero_banner' ? 'selected' : '' }}>1. Contact Hero Banner & Intro</option>
                <option value="lucknow_map" {{ $activeSection === 'lucknow_map' ? 'selected' : '' }}>2. Full-Width Lucknow Map & Pinpoint Badge</option>
                <option value="outlet_card" {{ $activeSection === 'outlet_card' ? 'selected' : '' }}>3. Card 1: Visit Our Outlet</option>
                <option value="order_card" {{ $activeSection === 'order_card' ? 'selected' : '' }}>4. Card 2: Order Your Favourites</option>
                <option value="franchise_card" {{ $activeSection === 'franchise_card' ? 'selected' : '' }}>5. Card 3: Franchise Enquiry</option>
                <option value="enquiry_form" {{ $activeSection === 'enquiry_form' ? 'selected' : '' }}>6. Send Us a Message (Contact Form)</option>
                <option value="find_us_banner" {{ $activeSection === 'find_us_banner' ? 'selected' : '' }}>7. Find Us In Lucknow (Bottom Banner)</option>
            </select>
        </div>
    </div>

    <script>
        // Bulletproof section switcher for Contact Us page
        window.switchContactSection = function(sectionId) {
            if (!sectionId) return;
            var panels = document.querySelectorAll('.contact-section-panel');
            panels.forEach(function(panel) {
                if (panel.id === 'panel_' + sectionId) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
            var sel = document.getElementById('contactSectionSelector');
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

        <!-- ================= 1. HERO BANNER PANEL ================= -->
        <div class="contact-section-panel" id="panel_hero_banner" style="{{ $activeSection === 'hero_banner' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 1</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Contact Hero Banner & Introduction</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Photo / Video / YouTube Media + Transparent Tint</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_section" value="hero_banner">

                @php
                    $heroMediaType = $contact['hero_media_type'] ?? 'image';
                    $heroMediaSrc = $contact['hero_image'] ?? 'images/lucknow_heritage.jpg';
                    $heroOverlayColor = $contact['hero_overlay_color'] ?? '#083b3c';
                    $heroOverlayOpacity = $contact['hero_overlay_opacity'] ?? '0.85';
                    $heroOverlayStyle = $contact['hero_overlay_style'] ?? 'solid';
                @endphp

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-display me-1.5 text-primary"></i> Live Hero Simulator</span>
                    </div>

                    <!-- Live Simulator Box -->
                    <div class="p-3 bg-light border-bottom">
                        <div id="hero_preview_box" class="position-relative overflow-hidden rounded-3 text-white p-4 text-center shadow-sm" style="min-height: 220px; background-size: cover; background-position: center; background-image: url('{{ asset($heroMediaSrc) }}');">
                            <!-- Overlay Layer -->
                            <div id="hero_preview_overlay" class="position-absolute top-0 start-0 w-100 h-100" style="background-color: {{ $heroOverlayColor }}; opacity: {{ $heroOverlayOpacity }};"></div>
                            
                            <!-- Content Layer -->
                            <div class="position-relative z-1 py-3" style="max-width: 650px; margin: 0 auto;">
                                <h2 id="hero_prev_heading" class="fw-bold mb-1 fs-22 text-white">{{ $contact['hero_heading'] ?? 'WE’RE ALWAYS HAPPY TO HEAR FROM YOU' }}</h2>
                                <div id="hero_prev_sub" class="fs-13 text-warning fw-semibold mb-2">{{ $contact['hero_sub'] ?? 'VISIT. TASTE. CONNECT.' }}</div>
                                <p id="hero_prev_desc" class="fs-12 text-light mb-0">{{ $contact['hero_desc'] ?? 'Whether you’re craving our signature Dahi Bade, want to place an order, have feedback or are interested in becoming a franchise partner — we’re here to help.' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- 4-Column Responsive Layout (col-sm-3) for Media & Overlay Controls -->
                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title"><i class="bi bi-palette text-warning"></i> Background & Tint</div>
                            <p class="contact-label-desc">Configure media format, tint color, and darkness.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3 mb-3">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Media Format:</label>
                                    @php
                                        $contactHeroAllowed = $globalSettings['sections']['contact']['hero_banner']['allowed_media'] ?? ['image', 'video', 'gif', 'youtube'];
                                    @endphp
                                    <select name="contact[hero_media_type]" class="form-select modern-select" onchange="toggleHeroMediaType(this.value)">
                                        @if(in_array('image', $contactHeroAllowed))
                                            <option value="image" {{ $heroMediaType === 'image' ? 'selected' : '' }}>🖼️ Photo / Banner</option>
                                        @endif
                                        @if(in_array('gif', $contactHeroAllowed))
                                            <option value="gif" {{ $heroMediaType === 'gif' ? 'selected' : '' }}>🎞️ Animated GIF</option>
                                        @endif
                                        @if(in_array('video', $contactHeroAllowed))
                                            <option value="video" {{ $heroMediaType === 'video' ? 'selected' : '' }}>🎥 MP4 Video File</option>
                                        @endif
                                        @if(in_array('youtube', $contactHeroAllowed))
                                            <option value="youtube" {{ $heroMediaType === 'youtube' ? 'selected' : '' }}>▶️ YouTube Video</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Color:</label>
                                    <div class="input-group">
                                        <input type="color" name="contact[hero_overlay_color]" value="{{ $heroOverlayColor }}" class="form-control form-control-color border-0 p-1 rounded-start" style="height: 38px; width: 45px;" oninput="updateHeroOverlay(this.value)">
                                        <input type="text" id="hero_color_hex" value="{{ $heroOverlayColor }}" class="form-control modern-input fs-12" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Darkness / Opacity:</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="range" name="contact[hero_overlay_opacity]" min="0" max="1" step="0.05" value="{{ $heroOverlayOpacity }}" class="form-range" oninput="updateHeroOpacity(this.value)">
                                        <span id="hero_opacity_val" class="badge bg-dark fs-11" style="min-width: 38px;">{{ $heroOverlayOpacity }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Tint Style:</label>
                                    <select name="contact[hero_overlay_style]" class="form-select modern-select">
                                        <option value="solid" {{ $heroOverlayStyle === 'solid' ? 'selected' : '' }}>Solid Tint</option>
                                        <option value="gradient" {{ $heroOverlayStyle === 'gradient' ? 'selected' : '' }}>Gradient Tint</option>
                                    </select>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3 border">
                                <div id="hero_file_wrap" style="{{ $heroMediaType === 'youtube' ? 'display:none;' : 'display:block;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Media File (Photo, GIF or MP4 Video):</label>
                                    <input type="file" name="contact[hero_media_file]" class="form-control form-control-sm modern-input" accept="image/*,video/mp4,video/webm">
                                    <input type="hidden" name="contact[hero_image]" value="{{ $heroMediaSrc }}">
                                    <input type="hidden" name="contact[hero_video]" value="{{ $contact['hero_video'] ?? '' }}">
                                    <div class="form-text fs-11 text-muted">Current file: <code>{{ $heroMediaSrc }}</code></div>
                                </div>

                                <div id="hero_yt_wrap" style="{{ $heroMediaType === 'youtube' ? 'display:block;' : 'display:none;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">YouTube URL or Video ID:</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-youtube text-danger"></i></span>
                                        <input type="text" name="contact[hero_youtube_url]" value="{{ $contact['hero_youtube_url'] ?? '' }}" class="form-control modern-input" placeholder="https://www.youtube.com/watch?v=...">
                                    </div>
                                    <input type="hidden" name="contact[hero_youtube_id]" value="{{ $contact['hero_youtube_id'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Headings -->
                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Header Texts</div>
                            <p class="contact-label-desc">Headline, subtitle and introductory message.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-7 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Main Headline:</label>
                                    <input type="text" name="contact[hero_heading]" value="{{ $contact['hero_heading'] ?? 'WE’RE ALWAYS HAPPY TO HEAR FROM YOU' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-5 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                    <input type="text" name="contact[hero_sub]" value="{{ $contact['hero_sub'] ?? 'VISIT. TASTE. CONNECT.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Introductory Paragraph:</label>
                                    <textarea name="contact[hero_desc]" rows="3" class="form-control modern-textarea">{{ $contact['hero_desc'] ?? 'Whether you’re craving our signature Dahi Bade, want to place an order, have feedback or are interested in becoming a franchise partner — we’re here to help.' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Hero Banner</span>
                    </button>
                    <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                        <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Page
                    </a>
                </div>
            </form>
        </div>

        <!-- ================= 2. LUCKNOW MAP PANEL ================= -->
        <div class="contact-section-panel" id="panel_lucknow_map" style="{{ $activeSection === 'lucknow_map' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 2</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Full-Width Lucknow Map & Pinpoint Badge</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Interactive Google Maps Embed</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="lucknow_map">

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-geo-alt-fill me-1.5 text-danger"></i> Google Maps Configuration</span>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Map Embed URL</div>
                            <p class="contact-label-desc">Google Maps iframe source link.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="mb-3">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Iframe Embed URL (src attribute):</label>
                                <textarea name="contact[map_iframe_url]" rows="3" class="form-control modern-textarea fs-12">{{ $contact['map_iframe_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14238.643265773173!2d80.9385558!3d26.8486968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd07a16f212f%3A0x6b6c0e8a7ea73d09!2sHazratganj%2C%20Lucknow%2C%20Uttar%20Pradesh%20226001!5e0!3m2!1sen!2sin!4v1710500000000!5m2!1sen!2sin' }}</textarea>
                                <div class="form-text fs-11 text-muted">Copy the <code>src="..."</code> link from Google Maps -> Share -> Embed a map.</div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Map Accessibility Title:</label>
                                    <input type="text" name="contact[map_title]" value="{{ $contact['map_title'] ?? 'Original GPO Hazratganj Lucknow Map' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Map Height (px):</label>
                                    <input type="number" name="contact[map_height]" value="{{ $contact['map_height'] ?? 420 }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Floating Outlet Badge</div>
                            <p class="contact-label-desc">Floating badge with pulsing red dot pin over map.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-8 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Badge Text:</label>
                                    <input type="text" name="contact[badge_text]" value="{{ $contact['badge_text'] ?? 'ORIGINAL GPO • HAZRATGANJ OUTLET' }}" class="form-control modern-input fw-semibold">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Pulse Dot Color:</label>
                                    <input type="color" name="contact[badge_dot_color]" value="{{ $contact['badge_dot_color'] ?? '#ef4444' }}" class="form-control form-control-color border-0 p-1" style="height: 38px; width: 60px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Map Settings</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 3. OUTLET CARD PANEL ================= -->
        <div class="contact-section-panel" id="panel_outlet_card" style="{{ $activeSection === 'outlet_card' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 3</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Card 1: Visit Our Outlet</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Store Location, Timings & Helpline</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="outlet_card">

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-shop me-1.5 text-primary"></i> Hazratganj Flagship Store Details</span>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Store Titles</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Card Header Title:</label>
                                    <input type="text" name="contact[outlet_title]" value="{{ $contact['outlet_title'] ?? 'VISIT OUR OUTLET' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Brand Outlet Name:</label>
                                    <input type="text" name="contact[outlet_name]" value="{{ $contact['outlet_name'] ?? 'ORIGINAL GPO KE THANDEY DAHI BADE' }}" class="form-control modern-input text-teal fw-bold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Address & Timings</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="mb-3">
                                <label class="form-label fs-12 fw-bold text-dark mb-1">Complete Physical Address:</label>
                                <textarea name="contact[outlet_address]" rows="3" class="form-control modern-textarea">{{ $contact['outlet_address'] ?? "Shop No. 1, Awadh Bazaar,\nMahatma Gandhi Marg,\nNear K.D. Singh Babu Stadium,\nHazratganj, Lucknow, UP – 226001" }}</textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Opening Hours / Days:</label>
                                    <input type="text" name="contact[outlet_timings]" value="{{ $contact['outlet_timings'] ?? 'Monday – Sunday | 1:00 PM – 9:00 PM' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Call Us Telephone:</label>
                                    <input type="text" name="contact[outlet_phone]" value="{{ $contact['outlet_phone'] ?? '+91 91406 31433' }}" class="form-control modern-input fw-semibold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Support Email:</label>
                                    <input type="email" name="contact[outlet_email]" value="{{ $contact['outlet_email'] ?? 'support@gpokethandeydahibade.com' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Get Directions Button URL:</label>
                                    <input type="text" name="contact[outlet_btn_url]" value="{{ $contact['outlet_btn_url'] ?? 'https://maps.google.com/?q=Hazratganj+Lucknow+Awadh+Bazaar' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Outlet Card</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 4. ORDER CARD PANEL ================= -->
        <div class="contact-section-panel" id="panel_order_card" style="{{ $activeSection === 'order_card' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 4</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Card 2: Order Your Favourites</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Online Order Link & Info</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="order_card">

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-bag-heart me-1.5 text-primary"></i> Order Card Content</span>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Card Headings</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Card Title:</label>
                                    <input type="text" name="contact[order_title]" value="{{ $contact['order_title'] ?? 'ORDER YOUR FAVOURITES' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Serif Subtitle:</label>
                                    <input type="text" name="contact[order_sub]" value="{{ $contact['order_sub'] ?? 'CRAVING GPO?' }}" class="form-control modern-input">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description:</label>
                                    <textarea name="contact[order_desc]" rows="2" class="form-control modern-textarea">{{ $contact['order_desc'] ?? 'Get your favourite GPO dishes delivered or place an order through our available ordering channels.' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Callout Box & Button</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Callout Title:</label>
                                    <input type="text" name="contact[order_box_title]" value="{{ $contact['order_box_title'] ?? 'ORDER ONLINE' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Callout Description:</label>
                                    <input type="text" name="contact[order_box_desc]" value="{{ $contact['order_box_desc'] ?? 'Enjoy the Original GPO experience from wherever you are in Lucknow.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                    <input type="text" name="contact[order_btn_text]" value="{{ $contact['order_btn_text'] ?? 'ORDER NOW' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Target Link:</label>
                                    <input type="text" name="contact[order_btn_url]" value="{{ $contact['order_btn_url'] ?? '/menu' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Order Card</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 5. FRANCHISE CARD PANEL ================= -->
        <div class="contact-section-panel" id="panel_franchise_card" style="{{ $activeSection === 'franchise_card' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 5</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Card 3: Franchise Enquiry</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Franchise Desk Link & Highlights</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="franchise_card">

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-building me-1.5 text-primary"></i> Franchise Card Content</span>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Card Headings</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Card Title:</label>
                                    <input type="text" name="contact[franchise_title]" value="{{ $contact['franchise_title'] ?? 'FRANCHISE ENQUIRY' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Serif Subtitle:</label>
                                    <input type="text" name="contact[franchise_sub]" value="{{ $contact['franchise_sub'] ?? 'WANT TO BRING GPO TO YOUR CITY?' }}" class="form-control modern-input">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description:</label>
                                    <textarea name="contact[franchise_desc]" rows="2" class="form-control modern-textarea">{{ $contact['franchise_desc'] ?? 'Interested in becoming a franchise partner? Share your details with us and our expansion team will contact you to discuss the opportunity.' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Checklist Highlights</div>
                            <p class="contact-label-desc">3 tick items shown in parchment box.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-2 mb-3">
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Bullet 1:</label>
                                    <input type="text" name="contact[franchise_bullet1]" value="{{ $contact['franchise_bullet1'] ?? 'Turnkey setup & operations' }}" class="form-control modern-input fs-12">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Bullet 2:</label>
                                    <input type="text" name="contact[franchise_bullet2]" value="{{ $contact['franchise_bullet2'] ?? 'Brand legacy since 1976' }}" class="form-control modern-input fs-12">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Bullet 3:</label>
                                    <input type="text" name="contact[franchise_bullet3]" value="{{ $contact['franchise_bullet3'] ?? 'Comprehensive partner support' }}" class="form-control modern-input fs-12">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Text:</label>
                                    <input type="text" name="contact[franchise_btn_text]" value="{{ $contact['franchise_btn_text'] ?? 'APPLY FOR FRANCHISE' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Button Target Link:</label>
                                    <input type="text" name="contact[franchise_btn_url]" value="{{ $contact['franchise_btn_url'] ?? '/franchise' }}" class="form-control modern-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Franchise Card</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 6. ENQUIRY FORM PANEL ================= -->
        <div class="contact-section-panel" id="panel_enquiry_form" style="{{ $activeSection === 'enquiry_form' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 6</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Send Us a Message (Contact Form)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Customer Feedback / Query Box</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST">
                @csrf
                <input type="hidden" name="current_section" value="enquiry_form">

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-envelope me-1.5 text-primary"></i> Form Section Texts</span>
                    </div>

                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Titles & Prompt</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Section Heading:</label>
                                    <input type="text" name="contact[form_heading]" value="{{ $contact['form_heading'] ?? 'SEND US A MESSAGE' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Serif Subtitle:</label>
                                    <input type="text" name="contact[form_sub]" value="{{ $contact['form_sub'] ?? 'HAVE A QUESTION?' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-8 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description:</label>
                                    <input type="text" name="contact[form_desc]" value="{{ $contact['form_desc'] ?? 'We’d love to hear from you.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Submit Button Label:</label>
                                    <input type="text" name="contact[form_btn_text]" value="{{ $contact['form_btn_text'] ?? 'SUBMIT' }}" class="form-control modern-input fw-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Contact Form Texts</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ================= 7. FIND US BANNER PANEL ================= -->
        <div class="contact-section-panel" id="panel_find_us_banner" style="{{ $activeSection === 'find_us_banner' ? 'display: block;' : 'display: none;' }}">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom border-light-subtle flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary px-2.5 py-1.5 fs-12">Section 7</span>
                    <h5 class="fw-bold text-dark mb-0 fs-16">Find Us In Lucknow (Bottom Banner)</h5>
                </div>
                <span class="badge bg-light text-muted border fs-12">Photo / Video / YouTube Media + Transparent Overlay</span>
            </div>

            <form action="{{ route('admin.website-pages.contact.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_section" value="find_us_banner">

                @php
                    $findMediaType = $contact['find_media_type'] ?? 'image';
                    $findMediaSrc = $contact['find_image'] ?? 'images/lucknow_heritage.jpg';
                    $findOverlayColor = $contact['find_overlay_color'] ?? '#083b3c';
                    $findOverlayOpacity = $contact['find_overlay_opacity'] ?? '0.80';
                    $findOverlayStyle = $contact['find_overlay_style'] ?? 'solid';
                @endphp

                <div class="contact-config-card mb-4">
                    <div class="contact-config-header">
                        <span class="fw-bold text-dark fs-14"><i class="bi bi-geo-alt me-1.5 text-primary"></i> Live Banner Simulator</span>
                    </div>

                    <!-- Live Simulator Box -->
                    <div class="p-3 bg-light border-bottom">
                        <div id="find_preview_box" class="position-relative overflow-hidden rounded-3 text-white p-4 text-center shadow-sm" style="min-height: 220px; background-size: cover; background-position: center; background-image: url('{{ asset($findMediaSrc) }}');">
                            <!-- Overlay Layer -->
                            <div id="find_preview_overlay" class="position-absolute top-0 start-0 w-100 h-100" style="background-color: {{ $findOverlayColor }}; opacity: {{ $findOverlayOpacity }};"></div>
                            
                            <!-- Content Layer -->
                            <div class="position-relative z-1 py-3" style="max-width: 650px; margin: 0 auto;">
                                <h3 id="find_prev_heading" class="fw-bold mb-1 fs-22 text-white">{{ $contact['find_heading'] ?? 'FIND US IN LUCKNOW' }}</h3>
                                <div id="find_prev_sub" class="fs-13 text-warning fw-semibold mb-2">{{ $contact['find_sub'] ?? 'YOUR GPO MOMENT STARTS HERE.' }}</div>
                                <p id="find_prev_desc" class="fs-12 text-light mb-3">{{ $contact['find_desc'] ?? 'Whether you’re a first-time visitor or a customer who’s been coming for years, we look forward to serving you.' }}</p>
                                <div class="d-flex justify-content-center align-items-center gap-2 text-warning fs-12 fw-bold">
                                    <span>{{ $contact['find_point1'] ?? 'VISIT GPO.' }}</span>
                                    <span>•</span>
                                    <span>{{ $contact['find_point2'] ?? 'TASTE THE ORIGINAL.' }}</span>
                                    <span>•</span>
                                    <span>{{ $contact['find_point3'] ?? 'MAKE A MEMORY.' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4-Column Responsive Layout (col-sm-3) for Overlay Controls -->
                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title"><i class="bi bi-palette text-warning"></i> Background & Tint</div>
                            <p class="contact-label-desc">Configure media format, tint color, and darkness.</p>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3 mb-3">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Media Format:</label>
                                    @php
                                        $findUsAllowed = $globalSettings['sections']['contact']['find_us_banner']['allowed_media'] ?? ['image', 'video', 'gif', 'youtube'];
                                    @endphp
                                    <select name="contact[find_media_type]" class="form-select modern-select" onchange="toggleFindMediaType(this.value)">
                                        @if(in_array('image', $findUsAllowed))
                                            <option value="image" {{ $findMediaType === 'image' ? 'selected' : '' }}>🖼️ Photo / Banner</option>
                                        @endif
                                        @if(in_array('gif', $findUsAllowed))
                                            <option value="gif" {{ $findMediaType === 'gif' ? 'selected' : '' }}>🎞️ Animated GIF</option>
                                        @endif
                                        @if(in_array('video', $findUsAllowed))
                                            <option value="video" {{ $findMediaType === 'video' ? 'selected' : '' }}>🎥 MP4 Video File</option>
                                        @endif
                                        @if(in_array('youtube', $findUsAllowed))
                                            <option value="youtube" {{ $findMediaType === 'youtube' ? 'selected' : '' }}>▶️ YouTube Video</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Overlay Color:</label>
                                    <div class="input-group">
                                        <input type="color" name="contact[find_overlay_color]" value="{{ $findOverlayColor }}" class="form-control form-control-color border-0 p-1 rounded-start" style="height: 38px; width: 45px;" oninput="updateFindOverlay(this.value)">
                                        <input type="text" id="find_color_hex" value="{{ $findOverlayColor }}" class="form-control modern-input fs-12" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Darkness / Opacity:</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="range" name="contact[find_overlay_opacity]" min="0" max="1" step="0.05" value="{{ $findOverlayOpacity }}" class="form-range" oninput="updateFindOpacity(this.value)">
                                        <span id="find_opacity_val" class="badge bg-dark fs-11" style="min-width: 38px;">{{ $findOverlayOpacity }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Tint Style:</label>
                                    <select name="contact[find_overlay_style]" class="form-select modern-select">
                                        <option value="solid" {{ $findOverlayStyle === 'solid' ? 'selected' : '' }}>Solid Tint</option>
                                        <option value="gradient" {{ $findOverlayStyle === 'gradient' ? 'selected' : '' }}>Gradient Tint</option>
                                    </select>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded-3 border">
                                <div id="find_file_wrap" style="{{ $findMediaType === 'youtube' ? 'display:none;' : 'display:block;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Upload New Media File (Photo, GIF or MP4 Video):</label>
                                    <input type="file" name="contact[find_media_file]" class="form-control form-control-sm modern-input" accept="image/*,video/mp4,video/webm">
                                    <input type="hidden" name="contact[find_image]" value="{{ $findMediaSrc }}">
                                    <input type="hidden" name="contact[find_video]" value="{{ $contact['find_video'] ?? '' }}">
                                    <div class="form-text fs-11 text-muted">Current file: <code>{{ $findMediaSrc }}</code></div>
                                </div>

                                <div id="find_yt_wrap" style="{{ $findMediaType === 'youtube' ? 'display:block;' : 'display:none;' }}">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">YouTube URL or Video ID:</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="bi bi-youtube text-danger"></i></span>
                                        <input type="text" name="contact[find_youtube_url]" value="{{ $contact['find_youtube_url'] ?? '' }}" class="form-control modern-input" placeholder="https://www.youtube.com/watch?v=...">
                                    </div>
                                    <input type="hidden" name="contact[find_youtube_id]" value="{{ $contact['find_youtube_id'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Texts -->
                    <div class="contact-row">
                        <div class="contact-label-col">
                            <div class="contact-label-title">Banner Content</div>
                        </div>
                        <div class="contact-input-col">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Headline:</label>
                                    <input type="text" name="contact[find_heading]" value="{{ $contact['find_heading'] ?? 'FIND US IN LUCKNOW' }}" class="form-control modern-input fw-bold">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Subtitle Line:</label>
                                    <input type="text" name="contact[find_sub]" value="{{ $contact['find_sub'] ?? 'YOUR GPO MOMENT STARTS HERE.' }}" class="form-control modern-input">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-12 fw-bold text-dark mb-1">Description:</label>
                                    <textarea name="contact[find_desc]" rows="2" class="form-control modern-textarea">{{ $contact['find_desc'] ?? 'Whether you’re a first-time visitor or a customer who’s been coming for years, we look forward to serving you.' }}</textarea>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Triad Point 1:</label>
                                    <input type="text" name="contact[find_point1]" value="{{ $contact['find_point1'] ?? 'VISIT GPO.' }}" class="form-control modern-input fs-12">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Triad Point 2:</label>
                                    <input type="text" name="contact[find_point2]" value="{{ $contact['find_point2'] ?? 'TASTE THE ORIGINAL.' }}" class="form-control modern-input fs-12">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label fs-11 fw-bold text-dark mb-1">Triad Point 3:</label>
                                    <input type="text" name="contact[find_point3]" value="{{ $contact['find_point3'] ?? 'MAKE A MEMORY.' }}" class="form-control modern-input fs-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-action-bar">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-cloud-check-fill fs-16"></i>
                        <span>Save Find Us Banner</span>
                    </button>
                    <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-secondary px-3 py-2 ms-auto d-flex align-items-center gap-1.5">
                        <i class="bi bi-box-arrow-up-right fs-14"></i> Preview Live Page
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    // Simulator update helpers for Contact Hero Banner
    function toggleHeroMediaType(val) {
        var fileWrap = document.getElementById('hero_file_wrap');
        var ytWrap = document.getElementById('hero_yt_wrap');
        if (val === 'youtube') {
            if (fileWrap) fileWrap.style.display = 'none';
            if (ytWrap) ytWrap.style.display = 'block';
        } else {
            if (fileWrap) fileWrap.style.display = 'block';
            if (ytWrap) ytWrap.style.display = 'none';
        }
    }

    function updateHeroOverlay(val) {
        var hexInput = document.getElementById('hero_color_hex');
        var overlayEl = document.getElementById('hero_preview_overlay');
        if (hexInput) hexInput.value = val;
        if (overlayEl) overlayEl.style.backgroundColor = val;
    }

    function updateHeroOpacity(val) {
        var badge = document.getElementById('hero_opacity_val');
        var overlayEl = document.getElementById('hero_preview_overlay');
        if (badge) badge.innerText = val;
        if (overlayEl) overlayEl.style.opacity = val;
    }

    // Simulator update helpers for Find Us Banner
    function toggleFindMediaType(val) {
        var fileWrap = document.getElementById('find_file_wrap');
        var ytWrap = document.getElementById('find_yt_wrap');
        if (val === 'youtube') {
            if (fileWrap) fileWrap.style.display = 'none';
            if (ytWrap) ytWrap.style.display = 'block';
        } else {
            if (fileWrap) fileWrap.style.display = 'block';
            if (ytWrap) ytWrap.style.display = 'none';
        }
    }

    function updateFindOverlay(val) {
        var hexInput = document.getElementById('find_color_hex');
        var overlayEl = document.getElementById('find_preview_overlay');
        if (hexInput) hexInput.value = val;
        if (overlayEl) overlayEl.style.backgroundColor = val;
    }

    function updateFindOpacity(val) {
        var badge = document.getElementById('find_opacity_val');
        var overlayEl = document.getElementById('find_preview_overlay');
        if (badge) badge.innerText = val;
        if (overlayEl) overlayEl.style.opacity = val;
    }
</script>
@endsection
