@extends('layouts.frontend')

@section('title', 'Contact Us | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-parchment')

@section('content')
    @php
        $heroMediaType = $contact['hero_media_type'] ?? 'image';
        $heroImage = $contact['hero_image'] ?? 'images/lucknow_heritage.jpg';
        $heroColor = $contact['hero_overlay_color'] ?? '#083b3c';
        $heroOpacity = $contact['hero_overlay_opacity'] ?? '0.85';
        $heroStyle = $contact['hero_overlay_style'] ?? 'solid';
        $heroOverlay = ($heroStyle === 'gradient')
            ? "linear-gradient(135deg, {$heroColor} 0%, rgba(5, 44, 45, {$heroOpacity}) 100%)"
            : $heroColor;
    @endphp

    <!-- CONTACT HERO BANNER (Document Page 19) -->
    <section class="contact-hero-banner position-relative overflow-hidden" style="background-image: url('{{ asset($heroImage) }}'); background-size: cover; background-position: center;">
      @if($heroMediaType === 'youtube' && !empty($contact['hero_youtube_id']))
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: 0;">
          <iframe src="https://www.youtube-nocookie.com/embed/{{ $contact['hero_youtube_id'] }}?autoplay=1&mute=1&loop=1&playlist={{ $contact['hero_youtube_id'] }}&controls=0&showinfo=0&modestbranding=1" 
                  style="width: 100vw; height: 56.25vw; min-height: 100%; min-width: 177.77vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border: none;">
          </iframe>
        </div>
      @elseif($heroMediaType === 'video' && !empty($contact['hero_video']))
        <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <source src="{{ asset($contact['hero_video']) }}" type="video/mp4">
        </video>
      @endif

      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: {{ $heroOverlay }}; opacity: {{ $heroOpacity }}; z-index: 1;"></div>

      <div class="position-relative" style="z-index: 2; max-width: 800px; margin: 0 auto; padding: 20px;">
        <h1>{{ $contact['hero_heading'] ?? 'WE’RE ALWAYS HAPPY TO HEAR FROM YOU' }}</h1>
        <span class="hero-sub">{{ $contact['hero_sub'] ?? 'VISIT. TASTE. CONNECT.' }}</span>
        <p>
          {{ $contact['hero_desc'] ?? 'Whether you’re craving our signature Dahi Bade, want to place an order, have feedback or are interested in becoming a franchise partner — we’re here to help.' }}
        </p>
      </div>
    </section>

    <!-- FULL-WIDTH LUCKNOW MAP WITH RED DOT PINPOINT (User Requirement) -->
    <section class="contact-map-wrapper-exact" style="position: relative; width: 100%; height: {{ $contact['map_height'] ?? 420 }}px; overflow: hidden; background: #e8edea;">
      <iframe 
        title="{{ $contact['map_title'] ?? 'Original GPO Hazratganj Lucknow Map' }}"
        src="{{ $contact['map_iframe_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14238.643265773173!2d80.9385558!3d26.8486968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd07a16f212f%3A0x6b6c0e8a7ea73d09!2sHazratganj%2C%20Lucknow%2C%20Uttar%20Pradesh%20226001!5e0!3m2!1sen!2sin!4v1710500000000!5m2!1sen!2sin' }}"
        width="100%" 
        height="100%" 
        style="border:0; filter: contrast(1.05) saturate(1.1);" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>

      <!-- Pulsing Red Dot Floating Badge -->
      @php $dotColor = $contact['badge_dot_color'] ?? '#ef4444'; @endphp
      <div class="map-red-dot-badge" style="position: absolute; bottom: 25px; left: 50%; transform: translateX(-50%); background: rgba(8, 59, 60, 0.95); backdrop-filter: blur(8px); color: #ffffff; padding: 12px 24px; border-radius: var(--radius-full); box-shadow: 0 8px 24px rgba(0,0,0,0.25); display: flex; align-items: center; gap: 12px; border: 1px solid rgba(255,255,255,0.2); z-index: 10;">
        <span style="position: relative; display: flex; height: 14px; width: 14px;">
          <span style="animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite; position: absolute; display: inline-flex; height: 100%; width: 100%; border-radius: 9999px; background-color: {{ $dotColor }}; opacity: 0.75;"></span>
          <span style="position: relative; display: inline-flex; border-radius: 9999px; height: 14px; width: 14px; background-color: {{ $dotColor }}; border: 2px solid #ffffff;"></span>
        </span>
        <span style="font-size: 0.9rem; font-weight: 600; letter-spacing: 0.5px;">{{ $contact['badge_text'] ?? 'ORIGINAL GPO • HAZRATGANJ OUTLET' }}</span>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- SECTIONS 01, 02, 03: 3 CARDS IN A ROW (Document Pages 19-20) -->
      <div class="contact-cards-grid">
        
        <!-- SECTION 01: VISIT OUR OUTLET (Document Page 19) -->
        <div class="contact-info-card">
          <div>
            <h3>{{ $contact['outlet_title'] ?? 'VISIT OUR OUTLET' }}</h3>
            <p style="font-weight: 700; color: var(--c-teal-deep); margin-bottom: 8px;">{{ $contact['outlet_name'] ?? 'ORIGINAL GPO KE THANDEY DAHI BADE' }}</p>
            <p>
              {!! nl2br(e($contact['outlet_address'] ?? "Shop No. 1, Awadh Bazaar,\nMahatma Gandhi Marg,\nNear K.D. Singh Babu Stadium,\nHazratganj, Lucknow, UP – 226001")) !!}
            </p>
            <div style="margin-top: 14px; font-size: 0.88rem;">
              <strong>OPENING HOURS:</strong><br>
              {{ $contact['outlet_timings'] ?? 'Monday – Sunday | 1:00 PM – 9:00 PM' }}
            </div>
            <div style="margin-top: 10px; font-size: 0.88rem;">
              <strong>CALL US:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact['outlet_phone'] ?? '+919140631433') }}" style="color: var(--c-teal-deep); font-weight: 600;">{{ $contact['outlet_phone'] ?? '+91 91406 31433' }}</a>
            </div>
            <div style="margin-top: 6px; font-size: 0.88rem;">
              <strong>EMAIL:</strong> <a href="mailto:{{ $contact['outlet_email'] ?? 'support@gpokethandeydahibade.com' }}" style="color: var(--c-teal-deep); font-weight: 600;">{{ $contact['outlet_email'] ?? 'support@gpokethandeydahibade.com' }}</a>
            </div>
          </div>
          <div style="margin-top: 24px;">
            <a href="{{ $contact['outlet_btn_url'] ?? 'https://maps.google.com/?q=Hazratganj+Lucknow+Awadh+Bazaar' }}" target="_blank" class="btn-terracotta-pill" style="display: block; text-align: center;">{{ $contact['outlet_btn_text'] ?? 'GET DIRECTIONS' }}</a>
          </div>
        </div>

        <!-- SECTION 02: ORDER YOUR FAVOURITES (Document Page 20) -->
        <div class="contact-info-card">
          <div>
            <h3>{{ $contact['order_title'] ?? 'ORDER YOUR FAVOURITES' }}</h3>
            <p style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 10px;">
              {{ $contact['order_sub'] ?? 'CRAVING GPO?' }}
            </p>
            <p>
              {{ $contact['order_desc'] ?? 'Get your favourite GPO dishes delivered or place an order through our available ordering channels.' }}
            </p>
            <div style="background: var(--c-aqua-bg); padding: 16px; border-radius: var(--radius-sm); margin-top: 16px; border: 1px solid rgba(8,59,60,0.08);">
              <strong style="color: var(--c-teal-deep); display: block; margin-bottom: 4px;">{{ $contact['order_box_title'] ?? 'ORDER ONLINE' }}</strong>
              <p style="font-size: 0.84rem; margin-bottom: 0;">{{ $contact['order_box_desc'] ?? 'Enjoy the Original GPO experience from wherever you are in Lucknow.' }}</p>
            </div>
          </div>
          <div style="margin-top: 24px;">
            <a href="{{ $contact['order_btn_url'] ?? route('menu') }}" class="btn-amber-pill" style="display: block; text-align: center;">{{ $contact['order_btn_text'] ?? 'ORDER NOW' }}</a>
          </div>
        </div>

        <!-- SECTION 03: FRANCHISE ENQUIRY (Document Page 20) -->
        <div class="contact-info-card">
          <div>
            <h3>{{ $contact['franchise_title'] ?? 'FRANCHISE ENQUIRY' }}</h3>
            <p style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 10px;">
              {{ $contact['franchise_sub'] ?? 'WANT TO BRING GPO TO YOUR CITY?' }}
            </p>
            <p>
              {{ $contact['franchise_desc'] ?? 'Interested in becoming a franchise partner? Share your details with us and our expansion team will contact you to discuss the opportunity.' }}
            </p>
            <div style="background: var(--c-parchment-card); padding: 16px; border-radius: var(--radius-sm); margin-top: 16px; border: 1px solid rgba(8,59,60,0.08);">
              <span style="font-size: 0.85rem; color: var(--c-teal-deep); font-weight: 600;">
                ✓ {{ $contact['franchise_bullet1'] ?? 'Turnkey setup & operations' }}<br>
                ✓ {{ $contact['franchise_bullet2'] ?? 'Brand legacy since 1976' }}<br>
                ✓ {{ $contact['franchise_bullet3'] ?? 'Comprehensive partner support' }}
              </span>
            </div>
          </div>
          <div style="margin-top: 24px;">
            <a href="{{ $contact['franchise_btn_url'] ?? route('franchise') }}" class="btn-spruce-pill" style="display: block; text-align: center;">{{ $contact['franchise_btn_text'] ?? 'APPLY FOR FRANCHISE' }}</a>
          </div>
        </div>

      </div>

      <!-- SECTION 04 — SEND US A MESSAGE (Document Page 20) -->
      <section class="contact-form-box">
        <div style="text-align: center; margin-bottom: 20px;">
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep); margin-bottom: 6px;">{{ $contact['form_heading'] ?? 'SEND US A MESSAGE' }}</h3>
          <p style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 8px;">
            {{ $contact['form_sub'] ?? 'HAVE A QUESTION?' }}
          </p>
          <p style="font-size: 0.95rem; color: var(--c-text-muted);">
            {{ $contact['form_desc'] ?? 'We’d love to hear from you.' }}
          </p>
        </div>

        <form action="{{ route('contact.submit') }}" method="POST">
          @csrf
          <div class="contact-form-grid">
            <!-- NAME -->
            <div>
              <label for="contactName">NAME *</label>
              <input type="text" id="contactName" name="Name" value="{{ old('Name') }}" placeholder="Your full name" required>
            </div>

            <!-- EMAIL -->
            <div>
              <label for="contactEmail">EMAIL *</label>
              <input type="email" id="contactEmail" name="Email" value="{{ old('Email') }}" placeholder="Your email address" required>
            </div>

            <!-- PHONE -->
            <div>
              <label for="contactPhone">PHONE *</label>
              <input type="tel" id="contactPhone" name="Phone" value="{{ old('Phone') }}" placeholder="Your phone number">
            </div>

            <!-- MESSAGE -->
            <div class="contact-form-full">
              <label for="contactMessage">MESSAGE *</label>
              <textarea id="contactMessage" name="Message" rows="5" placeholder="How can we help you?" required>{{ old('Message') }}</textarea>
            </div>

            <!-- BUTTON: SUBMIT -->
            <div class="contact-form-full" style="text-align: center; margin-top: 10px;">
              <button type="submit" class="btn-terracotta-pill" style="border: none; cursor: pointer; padding: 14px 45px; font-size: 1rem;">
                {{ $contact['form_btn_text'] ?? 'SUBMIT' }}
              </button>
            </div>
          </div>
        </form>
      </section>

    </div>

    <!-- SECTION 05 — FIND US IN LUCKNOW (Document Page 21: Full-Width Banner) -->
    @php
        $findMediaType = $contact['find_media_type'] ?? 'image';
        $findImage = $contact['find_image'] ?? 'images/lucknow_heritage.jpg';
        $findColor = $contact['find_overlay_color'] ?? '#083b3c';
        $findOpacity = $contact['find_overlay_opacity'] ?? '0.80';
        $findStyle = $contact['find_overlay_style'] ?? 'solid';
        $findOverlay = ($findStyle === 'gradient')
            ? "linear-gradient(135deg, {$findColor} 0%, rgba(5, 44, 45, {$findOpacity}) 100%)"
            : $findColor;
    @endphp
    <section class="find-us-lucknow-banner position-relative overflow-hidden" style="background-image: url('{{ asset($findImage) }}'); background-size: cover; background-position: center;">
      @if($findMediaType === 'youtube' && !empty($contact['find_youtube_id']))
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: 0;">
          <iframe src="https://www.youtube-nocookie.com/embed/{{ $contact['find_youtube_id'] }}?autoplay=1&mute=1&loop=1&playlist={{ $contact['find_youtube_id'] }}&controls=0&showinfo=0&modestbranding=1" 
                  style="width: 100vw; height: 56.25vw; min-height: 100%; min-width: 177.77vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border: none;">
          </iframe>
        </div>
      @elseif($findMediaType === 'video' && !empty($contact['find_video']))
        <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
          <source src="{{ asset($contact['find_video']) }}" type="video/mp4">
        </video>
      @endif

      <div class="find-us-lucknow-overlay" style="background: {{ $findOverlay }}; opacity: {{ $findOpacity }}; z-index: 1;"></div>
      
      <div class="find-us-content position-relative" style="z-index: 2;">
        <h3>{{ $contact['find_heading'] ?? 'FIND US IN LUCKNOW' }}</h3>
        <span class="sub-starts">{{ $contact['find_sub'] ?? 'YOUR GPO MOMENT STARTS HERE.' }}</span>
        <p>
          {{ $contact['find_desc'] ?? 'Whether you’re a first-time visitor or a customer who’s been coming for years, we look forward to serving you.' }}
        </p>
        <div class="find-us-triad">
          <span>{{ $contact['find_point1'] ?? 'VISIT GPO.' }}</span>
          <span>•</span>
          <span>{{ $contact['find_point2'] ?? 'TASTE THE ORIGINAL.' }}</span>
          <span>•</span>
          <span>{{ $contact['find_point3'] ?? 'MAKE A MEMORY.' }}</span>
        </div>
      </div>
    </section>
@endsection
