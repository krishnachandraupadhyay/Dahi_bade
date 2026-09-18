@extends('layouts.frontend')

@section('title', 'Our Story | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-parchment')

@section('content')
    <style>
      .story-hero-exact {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #ffffff;
      }
      .story-hero-exact .media-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
      }
      .story-hero-video-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
      }
      .story-hero-video-wrap iframe {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100vw;
        height: 56.25vw;
        min-height: 100%;
        min-width: 177.77%;
        transform: translate(-50%, -50%);
        pointer-events: none;
      }
      .story-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
      }
      .story-hero-exact .content {
        position: relative;
        z-index: 2;
        padding: 40px 20px;
        max-width: 880px;
        margin: 0 auto;
      }
      .story-hero-badge-pill {
        display: inline-block;
        font-family: var(--font-serif);
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #ecc67d;
        background: rgba(236, 198, 125, 0.18);
        border: 1px solid rgba(236, 198, 125, 0.5);
        padding: 5px 18px;
        border-radius: 9999px;
        margin-bottom: 12px;
        backdrop-filter: blur(4px);
      }
    </style>

    @php
      $mediaType = $story['hero_media_type'] ?? 'image';
      $overlayColor = $story['hero_overlay_color'] ?? '#000000';
      $overlayOpacity = floatval($story['hero_overlay_opacity'] ?? 0.70);
      $overlayStyle = $story['hero_overlay_style'] ?? 'solid';
      $heroHeight = $story['hero_height'] ?? '440px';

      // Parse YouTube ID if youtube mode
      $youtubeId = $story['hero_youtube_id'] ?? '';
      if (empty($youtubeId) && !empty($story['hero_youtube_url'])) {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $story['hero_youtube_url'], $matches)) {
              $youtubeId = $matches[1];
          } else {
              $youtubeId = trim($story['hero_youtube_url']);
          }
      }

      // Convert Hex to RGB for alpha transparency
      $hex = ltrim($overlayColor, '#');
      if (strlen($hex) == 3) {
          $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
          $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
          $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
      } elseif (strlen($hex) >= 6) {
          $r = hexdec(substr($hex, 0, 2));
          $g = hexdec(substr($hex, 2, 2));
          $b = hexdec(substr($hex, 4, 2));
      } else {
          $r = 0; $g = 0; $b = 0;
      }

      if ($overlayStyle === 'gradient') {
          $topOp = min(1.0, $overlayOpacity + 0.15);
          $botOp = min(1.0, $overlayOpacity + 0.20);
          $overlayBg = "linear-gradient(180deg, rgba({$r}, {$g}, {$b}, {$topOp}) 0%, rgba({$r}, {$g}, {$b}, {$overlayOpacity}) 50%, rgba({$r}, {$g}, {$b}, {$botOp}) 100%)";
      } else {
          $overlayBg = "rgba({$r}, {$g}, {$b}, {$overlayOpacity})";
      }
    @endphp

    <!-- INNER PAGE BANNER (Document Page 6) -->
    <section class="story-hero-exact" style="min-height: {{ $heroHeight }};">
      <!-- Media Layer: Image, Local Video, or YouTube Embed -->
      @if($mediaType === 'youtube' && !empty($youtubeId))
        <div class="story-hero-video-wrap">
          <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&loop=1&playlist={{ $youtubeId }}&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1" 
                  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      @elseif($mediaType === 'video' && !empty($story['hero_video']))
        <video class="media-bg" autoplay muted loop playsinline src="{{ asset($story['hero_video']) }}"></video>
      @else
        <img src="{{ asset($story['hero_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="Hazratganj Old Heritage Lucknow" class="media-bg">
      @endif

      <!-- Transparent Color Overlay Layer -->
      <div class="story-hero-overlay" style="background: {{ $overlayBg }};"></div>

      <!-- Foreground Content Layer -->
      <div class="content">
        @if(!empty($story['hero_badge']))
          <div>
            <span class="story-hero-badge-pill">{{ $story['hero_badge'] }}</span>
          </div>
        @endif

        <h1 style="font-family: var(--font-serif); font-size: clamp(2rem, 4.5vw, 3.2rem); color: #ffffff; margin: 6px 0 10px; font-weight: 800; letter-spacing: 1px; text-shadow: 0 2px 12px rgba(0,0,0,0.6);">
          {{ $story['hero_heading'] ?? 'A LEGACY SERVED WITH LOVE' }}
        </h1>

        <div style="font-family: var(--font-serif); font-size: 1.15rem; color: #ecc67d; margin-bottom: 12px; letter-spacing: 0.8px; font-weight: 600; text-shadow: 0 1px 6px rgba(0,0,0,0.5);">
          {{ $story['hero_sub'] ?? 'Since 1976 | Lucknow' }}
        </div>

        <p style="max-width: 740px; margin: 0 auto; font-size: 1.05rem; color: rgba(255,255,255,0.96); line-height: 1.7; text-shadow: 0 1px 4px rgba(0,0,0,0.5);">
          {{ $story['hero_description'] ?? 'From a humble beginning near the GPO in Hazratganj to becoming a recognised name for Dahi Bade, our journey is built on tradition, taste and the love of our customers.' }}
        </p>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- SECTION 01 — WHERE IT ALL BEGAN (Document Pages 6-7) -->
      <section class="legacy-exact-grid" style="margin-top: 50px;">
        <div class="legacy-arch-shape">
          <img src="{{ asset($story['began_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="Historical Lucknow Hazratganj 1976">
        </div>

        <div>
          <h2 style="font-family: var(--font-serif); font-size: 2.3rem; color: var(--c-teal-deep); margin-bottom: 6px;">
            {{ $story['began_heading'] ?? 'WHERE IT ALL BEGAN' }}
          </h2>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 16px;">
            {{ $story['began_tagline'] ?? 'A Simple Beginning. An Unforgettable Taste.' }}
          </h4>
          <p style="color: var(--c-text-main); font-size: 0.98rem; line-height: 1.7; margin-bottom: 14px;">
            {!! nl2br(e($story['began_text_1'] ?? 'The story of GPO Ke Thandey Dahi Bade began in 1976, when Sant Ram Gupta ji started serving Dahi Bade near the General Post Office in Hazratganj, Lucknow.')) !!}
          </p>
          <p style="color: var(--c-text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 14px;">
            {!! nl2br(e($story['began_text_2'] ?? 'There was no complicated formula. Just a commitment to making delicious food and serving it with care.')) !!}
          </p>
          <p style="color: var(--c-text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 14px;">
            {!! nl2br(e($story['began_text_3'] ?? 'The unique combination of soft Dahi Bade, chilled dahi and balanced flavours gradually attracted customers from across Lucknow.')) !!}
          </p>
          <p style="color: var(--c-teal-deep); font-weight: 600; font-size: 1.05rem;">
            {{ $story['began_text_4'] ?? 'And slowly, a small food destination became a name people remembered.' }}
          </p>
        </div>
      </section>

      <!-- SECTION 02 — THE GPO JOURNEY (Document Page 7) -->
      @php
        $jMediaType = $story['journey_media_type'] ?? 'image';
        $jOverlayColor = $story['journey_overlay_color'] ?? '#083b3c';
        $jOverlayOpacity = floatval($story['journey_overlay_opacity'] ?? 0.85);
        $jYtId = $story['journey_youtube_id'] ?? '';
        if (empty($jYtId) && !empty($story['journey_youtube_url'])) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $story['journey_youtube_url'], $jm)) {
                $jYtId = $jm[1];
            }
        }
        $jHex = ltrim($jOverlayColor, '#');
        $jr = 8; $jg = 59; $jb = 60;
        if (strlen($jHex) >= 6) {
            $jr = hexdec(substr($jHex, 0, 2));
            $jg = hexdec(substr($jHex, 2, 2));
            $jb = hexdec(substr($jHex, 4, 2));
        }
      @endphp
      <section class="humble-legacy-dark" style="margin: 50px 0; position: relative; overflow: hidden;">
        @if($jMediaType === 'youtube' && !empty($jYtId))
          <div class="story-hero-video-wrap">
            <iframe src="https://www.youtube.com/embed/{{ $jYtId }}?autoplay=1&mute=1&loop=1&playlist={{ $jYtId }}&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1" 
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        @elseif($jMediaType === 'video' && !empty($story['journey_video']))
          <video class="bg-photo" autoplay muted loop playsinline src="{{ asset($story['journey_video']) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"></video>
        @else
          <img src="{{ asset($story['journey_image'] ?? 'images/storefront.jpg') }}" alt="The GPO Journey Hazratganj" class="bg-photo">
        @endif
        <div class="gradient-overlay" style="background: linear-gradient(135deg, rgba({{ $jr }}, {{ $jg }}, {{ $jb }}, {{ $jOverlayOpacity }}) 0%, rgba({{ max(0, $jr - 10) }}, {{ max(0, $jg - 10) }}, {{ max(0, $jb - 10) }}, {{ min(1, $jOverlayOpacity + 0.08) }}) 100%);"></div>
        <div class="text-pad" style="position: relative; z-index: 2;">
          <div style="font-family: var(--font-serif); font-size: 0.88rem; font-weight: 700; color: var(--c-gold-amber); letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 6px;">
            {{ $story['journey_badge'] ?? 'THE GPO JOURNEY' }}
          </div>
          <h3 style="font-size: 2.1rem; line-height: 1.25; margin-bottom: 14px;">
            {{ $story['journey_heading'] ?? 'FROM A HUMBLE FOOD DESTINATION TO A LUCKNOW FAVOURITE' }}
          </h3>
          <p style="font-size: 1.05rem; line-height: 1.6; margin-bottom: 16px; color: rgba(255,255,255,0.92);">
            {{ $story['journey_sub'] ?? 'Over the years, GPO Ke Thandey Dahi Bade became associated with a simple food experience:' }}
          </p>
          <div style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--c-gold-amber); font-style: italic; margin-bottom: 16px; font-weight: 600;">
            {{ $story['journey_quote'] ?? 'Come hungry. Have a plate. Leave happy.' }}
          </div>
          <p style="font-size: 0.95rem; line-height: 1.6; color: rgba(255,255,255,0.85);">
            {!! nl2br(e($story['journey_desc'] ?? 'The brand’s identity has been shaped by generations of customers who have enjoyed our food, recommended us to others and returned with their families. That customer love is one of the most important chapters of the GPO story.')) !!}
          </p>
        </div>
      </section>

      <!-- SECTION 03 — THE SECRET IS SIMPLE (Document Pages 7-8: 4 Pillars) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>{{ $story['secret_heading'] ?? 'THE SECRET IS SIMPLE' }}</h2>
          <p style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-top: 4px;">
            {{ $story['secret_tagline'] ?? 'GOOD FOOD DOESN’T NEED TO BE COMPLICATED.' }}
          </p>
          <p>{{ $story['secret_desc'] ?? 'At GPO, we believe that the best food comes from respecting the basics.' }}</p>
        </div>

        <div class="story-pillars-grid">
          @php
            $pillars = $story['pillars'] ?? [
              ['icon' => '🌱', 'title' => 'QUALITY INGREDIENTS', 'desc' => 'We focus on freshness and quality in the ingredients used in our preparations.'],
              ['icon' => '🏺', 'title' => 'TRADITIONAL FLAVOURS', 'desc' => 'Our food remains connected to the familiar flavours that customers have loved over the years.'],
              ['icon' => '🥣', 'title' => 'CAREFUL PREPARATION', 'desc' => 'Every dish is prepared with attention to taste, presentation and consistency.'],
              ['icon' => '❤️', 'title' => 'CUSTOMER FIRST', 'desc' => 'Our ultimate goal is simple — give every customer a reason to come back.']
            ];
          @endphp

          @foreach($pillars as $p)
            <div class="story-pillar-card">
              <div class="story-pillar-icon">{{ $p['icon'] ?? '🌱' }}</div>
              <h5>{{ $p['title'] ?? '' }}</h5>
              <p>{{ $p['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 04 — WHY “THANDEY” DAHI BADE? (Document Page 8) -->
      <section class="why-thandey-wrap">
        <div>
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep); margin-bottom: 6px;">
            {{ $story['why_thandey_heading'] ?? 'WHY “THANDEY” DAHI BADE?' }}
          </h3>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 16px;">
            {{ $story['why_thandey_tagline'] ?? 'THE EXPERIENCE IS IN THE NAME.' }}
          </h4>
          <p style="font-size: 0.98rem; color: var(--c-text-main); line-height: 1.65; margin-bottom: 12px;">
            {{ $story['why_thandey_p1'] ?? 'Our signature Dahi Bade are known for their refreshing chilled character.' }}
          </p>
          <p style="font-size: 0.95rem; color: var(--c-text-muted); line-height: 1.65; margin-bottom: 12px;">
            {{ $story['why_thandey_p2'] ?? 'Soft lentil dumplings are complemented by creamy chilled dahi and a balanced blend of flavours and spices.' }}
          </p>
          <p style="font-size: 0.95rem; color: var(--c-teal-deep); font-weight: 600;">
            {{ $story['why_thandey_p3'] ?? 'It is this combination that creates the distinctive GPO experience.' }}
          </p>
        </div>

        <div class="why-thandey-quad">
          @php
            $badges = $story['why_thandey_badges'] ?? ['CREAMY.', 'CHILLED.', 'TANGY.', 'FLAVOURFUL.'];
          @endphp
          @foreach($badges as $b)
            <div class="why-thandey-badge">
              <span class="large-word">{{ $b }}</span>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 05 — OUR VALUES (Document Pages 8-9: 6 Values) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>{{ $story['values_heading'] ?? 'OUR VALUES' }}</h2>
          <p>{{ $story['values_desc'] ?? 'The timeless principles that guide everything we prepare and serve.' }}</p>
        </div>

        <div class="story-values-grid">
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

          @foreach($values as $v)
            <div class="story-value-card">
              <h5>{{ $v['number'] ?? '' }}. {{ $v['title'] ?? '' }}</h5>
              <p>{{ $v['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- TRADITION MEETS TODAY -->
      <section class="tradition-today-banner">
        <h3>{{ $story['tradition_heading'] ?? 'TRADITION MEETS TODAY' }}</h3>
        <p>
          {!! nl2br(e($story['tradition_desc'] ?? 'GPO Ke Thandey Dahi Bade carries a heritage rooted in Lucknow while embracing the convenience expected by today’s customers. From digital ordering to modern customer service and organised operations, we are taking a much-loved food experience forward without losing sight of where it began.')) !!}
        </p>
        <div class="punch-tag">
          {{ $story['tradition_punch'] ?? 'THE TASTE MAY BE TIMELESS. THE EXPERIENCE KEEPS EVOLVING.' }}
        </div>
      </section>

      <!-- FINAL CTA (Document Page 9) -->
      <section class="story-final-cta">
        <h3>{{ $story['cta_heading'] ?? 'EXPERIENCE THE STORY FOR YOURSELF' }}</h3>
        <p>{{ $story['cta_sub'] ?? 'Taste the Original GPO Ke Thandey Dahi Bade.' }}</p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
          <a href="{{ url($story['cta_btn1_url'] ?? '/contact') }}" class="btn-terracotta-pill">{{ $story['cta_btn1_text'] ?? 'VISIT US' }}</a>
          <a href="{{ url($story['cta_btn2_url'] ?? '/menu') }}" class="btn-amber-pill">{{ $story['cta_btn2_text'] ?? 'ORDER NOW' }}</a>
        </div>
      </section>

    </div>

    <!-- FULL-WIDTH PANORAMIC LUCKNOW BANNER (10px Bottom Gap) -->
    @php
      $bMediaType = $story['banner_media_type'] ?? 'image';
      $bOverlayColor = $story['banner_overlay_color'] ?? '#000000';
      $bOverlayOpacity = floatval($story['banner_overlay_opacity'] ?? 0.65);
      $bYtId = $story['banner_youtube_id'] ?? '';
      if (empty($bYtId) && !empty($story['banner_youtube_url'])) {
          if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $story['banner_youtube_url'], $bm)) {
              $bYtId = $bm[1];
          }
      }
      $bHex = ltrim($bOverlayColor, '#');
      $br = 0; $bg = 0; $bb = 0;
      if (strlen($bHex) >= 6) {
          $br = hexdec(substr($bHex, 0, 2));
          $bg = hexdec(substr($bHex, 2, 2));
          $bb = hexdec(substr($bHex, 4, 2));
      }
    @endphp
    <section class="lucknow-fullwidth-banner" style="margin-bottom: 10px; position: relative; overflow: hidden;">
      @if($bMediaType === 'youtube' && !empty($bYtId))
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; overflow: hidden; z-index: 1; pointer-events: none;">
          <iframe src="https://www.youtube.com/embed/{{ $bYtId }}?autoplay=1&mute=1&loop=1&playlist={{ $bYtId }}&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1" 
                  style="position: absolute; top: 50%; left: 50%; width: 100vw; height: 56.25vw; min-height: 100%; min-width: 177.77vh; transform: translate(-50%, -50%); border: none;" 
                  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      @elseif($bMediaType === 'video' && !empty($story['banner_video']))
        <video autoplay muted loop playsinline src="{{ asset($story['banner_video']) }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;"></video>
      @else
        <img src="{{ asset($story['banner_image'] ?? 'images/lucknow_heritage.jpg') }}" alt="{{ $story['banner_title'] ?? 'Lucknow' }} Heritage">
      @endif
      <div class="overlay" style="background: linear-gradient(to bottom, rgba({{ $br }}, {{ $bg }}, {{ $bb }}, {{ max(0, $bOverlayOpacity - 0.2) }}) 0%, rgba({{ $br }}, {{ $bg }}, {{ $bb }}, {{ $bOverlayOpacity }}) 100%);">
        <h3>{{ $story['banner_title'] ?? 'LUCKNOW' }}</h3>
        <p>{{ $story['banner_subtitle'] ?? 'A City of Nawabs • A Taste of Tradition • Since 1976' }}</p>
      </div>
    </section>
@endsection
