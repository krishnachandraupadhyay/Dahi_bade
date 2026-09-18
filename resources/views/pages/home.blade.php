@extends('layouts.frontend')

@section('title', 'Home | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-aqua')

@section('styles')
<style>
  .hero-content-left {
    max-width: 900px !important;
  }
  .hero-main-heading {
    font-size: clamp(1.75rem, 3.5vw, 2.85rem) !important;
    line-height: 1.16 !important;
    letter-spacing: -0.3px !important;
    margin-bottom: 12px !important;
  }
  .hero-heading-line {
    display: block;
    width: fit-content;
  }
  @media (min-width: 768px) {
    .hero-heading-line {
      white-space: nowrap !important;
    }
  }
  @media (max-width: 767px) {
    .hero-heading-line {
      white-space: normal;
      word-break: normal;
      overflow-wrap: break-word;
    }
  }
</style>
@endsection

@section('content')
    <!-- HERO SECTION (Bootstrap Carousel with 3 Document Slides) -->
    <section class="hero-home-exact">
      <div id="heroHomeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">
        
        <!-- Carousel Indicators -->
        <div class="carousel-indicators hero-carousel-dots">
          @foreach($slides as $index => $slide)
            <button type="button" data-bs-target="#heroHomeCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
          @endforeach
        </div>

        <div class="carousel-inner">
          @foreach($slides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
              <div class="hero-slide-item">
                <div class="hero-home-exact-bg">
                  @if(($slide['media_type'] ?? 'image') === 'video')
                    <video autoplay muted loop playsinline>
                      <source src="{{ asset($slide['media'] ?? 'images/dahi_vada.jpg') }}" type="video/mp4">
                    </video>
                  @else
                    <img src="{{ asset($slide['media'] ?? 'images/dahi_vada.jpg') }}" alt="GPO Hero Slide {{ $index + 1 }}">
                  @endif
                </div>
                <div class="hero-home-exact-overlay"></div>

                <div class="hero-content-left">
                  @if(!empty($slide['icon']))
                    <div style="font-size: 1.1rem; color: #a9c7b5; margin-bottom: 8px;">{{ $slide['icon'] }}</div>
                  @endif
                  @php
                    $rawHeading = $slide['heading'] ?? 'THE ORIGINAL TASTE OF LUCKNOW';
                    $cleanHeading = preg_replace('/<br\s*\/?>/i', "\n", $rawHeading);
                    $rawLines = explode("\n", str_replace("\r", "", $cleanHeading));
                    $headingLines = [];
                    foreach ($rawLines as $hl) {
                        $trimmed = trim($hl);
                        if ($trimmed !== '') {
                            $headingLines[] = $trimmed;
                        }
                    }
                  @endphp
                  <h1 class="hero-main-heading">
                    @foreach($headingLines as $line)
                      <span class="hero-heading-line">{{ $line }}</span>
                    @endforeach
                  </h1>
                  @if(!empty($slide['badge']))
                    <span class="hero-sub-since">{{ $slide['badge'] }}</span>
                  @endif
                  <p class="hero-para-short">
                    @if(!empty($slide['lead']))
                      <strong>{{ $slide['lead'] }}</strong><br>
                    @endif
                    {{ $slide['description'] ?? '' }}
                  </p>
                  <div class="hero-btn-row">
                    @if(isset($slide['buttons']) && is_array($slide['buttons']) && count($slide['buttons']) > 0)
                      @foreach($slide['buttons'] as $btn)
                        @if(!empty($btn['text']))
                          @php
                            $btnStyle = $btn['style'] ?? 'amber';
                            $btnClassMap = [
                                'amber'         => 'btn-amber-pill',
                                'spruce'        => 'btn-spruce-pill',
                                'terracotta'    => 'btn-terracotta-pill',
                                'crimson'       => 'btn-crimson-pill',
                                'emerald'       => 'btn-emerald-pill',
                                'sapphire'      => 'btn-sapphire-pill',
                                'purple'        => 'btn-purple-pill',
                                'sunset'        => 'btn-sunset-pill',
                                'midnight'      => 'btn-midnight-pill',
                                'white'         => 'btn-white-pill',
                                'outline-light' => 'btn-outline-light-pill',
                                'outline-amber' => 'btn-outline-amber-pill',
                            ];
                            $btnClass = $btnClassMap[$btnStyle] ?? 'btn-amber-pill';
                          @endphp
                          <a href="{{ $btn['url'] ?? '#' }}" class="{{ $btnClass }}">{{ $btn['text'] }}</a>
                        @endif
                      @endforeach
                    @else
                      @if(!empty($slide['btn1_text']))
                        <a href="{{ $slide['btn1_url'] ?? route('menu') }}" class="btn-amber-pill">{{ $slide['btn1_text'] }}</a>
                      @endif
                      @if(!empty($slide['btn2_text']))
                        <a href="{{ $slide['btn2_url'] ?? route('menu') }}" class="btn-spruce-pill">{{ $slide['btn2_text'] }}</a>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        </div>

        <!-- Carousel Arrows -->
        <button class="carousel-control-prev hero-ctrl" type="button" data-bs-target="#heroHomeCarousel" data-bs-slide="prev" aria-label="Previous">
          <span class="ctrl-arrow">‹</span>
        </button>
        <button class="carousel-control-next hero-ctrl" type="button" data-bs-target="#heroHomeCarousel" data-bs-slide="next" aria-label="Next">
          <span class="ctrl-arrow">›</span>
        </button>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- THREE CARDS OVERLAPPING STRIP -->
      <section class="three-cards-strip">
        @foreach($highlights ?? [] as $card)
        <div class="strip-item-box">
          @php
            $cardImg = $card['image'] ?? 'images/dahi_vada.jpg';
            $imgSrc = str_starts_with($cardImg, 'http') ? $cardImg : asset($cardImg);
          @endphp
          <img src="{{ $imgSrc }}" alt="{{ $card['heading'] ?? 'GPO Dahi Bade' }}" class="strip-item-bg">
          <div class="strip-item-gradient"></div>
          <div class="strip-item-caption">
            @if(!empty($card['heading']))
              <h4>{{ $card['heading'] }}</h4>
            @endif
            @if(!empty($card['subheading']))
              <span class="gold-sub">{{ $card['subheading'] }}</span>
            @endif
            @if(!empty($card['description']))
              <p class="desc-sub">{{ $card['description'] }}</p>
            @endif
          </div>
        </div>
        @endforeach
      </section>

      <!-- SECTION 01 — WELCOME (Document Page 2) -->
      <section class="home-welcome-grid">
        @php
          $welcomeImg = $welcome['image'] ?? 'images/storefront.jpg';
          $welcomeImgSrc = str_starts_with($welcomeImg, 'http') ? $welcomeImg : asset($welcomeImg);
        @endphp
        <div class="welcome-tall-photo">
          <img src="{{ $welcomeImgSrc }}" alt="{{ $welcome['heading'] ?? 'Original GPO Ke Thandey Dahi Bade' }}">
        </div>
        <div class="welcome-content">
          @if(!empty($welcome['badge']))
            <h4>{{ $welcome['badge'] }}</h4>
          @endif

          @if(!empty($welcome['heading']))
            <h2>{!! nl2br(e($welcome['heading'])) !!}</h2>
          @endif

          @if(!empty($welcome['tagline']))
            <p style="font-weight: 700; color: var(--c-teal-deep); margin-bottom: 12px; font-size: 1.05rem;">
              {{ $welcome['tagline'] }}
            </p>
          @endif

          @if(!empty($welcome['quote']))
            <p style="margin-bottom: 10px; font-style: italic; color: var(--c-terracotta-coral);">
              {!! nl2br(e($welcome['quote'])) !!}
            </p>
          @endif

          @if(!empty($welcome['paragraphs']) && is_array($welcome['paragraphs']))
            @foreach($welcome['paragraphs'] as $p)
              @if(!empty($p['text']))
                <p style="margin-bottom: 14px;">
                  {!! nl2br(e($p['text'])) !!}
                </p>
              @endif
            @endforeach
          @else
            @if(!empty($welcome['founder_story']))
              <p style="margin-bottom: 12px;">
                {!! nl2br(e($welcome['founder_story'])) !!}
              </p>
            @endif

            @if(!empty($welcome['philosophy']))
              <p style="margin-bottom: 14px;">
                {!! nl2br(e($welcome['philosophy'])) !!}
              </p>
            @endif

            @if(!empty($welcome['current_journey']))
              <p style="margin-bottom: 22px;">
                {!! nl2br(e($welcome['current_journey'])) !!}
              </p>
            @endif
          @endif

          @if(!empty($welcome['button_text']))
            <div>
              <a href="{{ $welcome['button_url'] ?? route('story') }}" class="btn-terracotta-pill">{{ $welcome['button_text'] }}</a>
            </div>
          @endif
        </div>
      </section>

      <!-- SECTION 02 — WHY GPO? (Document Pages 2-3: 6 Exact Items) -->
      <section class="why-love-section">
        @if(!empty($whyGpo['badge_icon']))
          <div class="why-love-badge-icon">{{ $whyGpo['badge_icon'] }}</div>
        @endif
        @if(!empty($whyGpo['heading']))
          <h3>{{ $whyGpo['heading'] }}</h3>
        @endif
        @if(!empty($whyGpo['subheading']))
          <p class="sub">{{ $whyGpo['subheading'] }}</p>
        @endif

        <div class="why-gpo-grid">
          @foreach($whyGpo['items'] ?? [] as $item)
            @php
              $isTerracotta = ($item['style'] ?? 'teal') === 'terracotta';
              $titleColor = $isTerracotta ? 'var(--c-terracotta-coral)' : 'var(--c-teal-deep)';
            @endphp
            <div class="why-gpo-card">
              <div class="why-gpo-card-header">
                <h4 class="why-gpo-card-title" style="color: {{ $titleColor }};">
                  {{ $item['title'] ?? '' }}
                </h4>
              </div>
              <p class="why-gpo-card-desc">
                {{ $item['description'] ?? '' }}
              </p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 03 — OUR SIGNATURE (Document Page 3) -->
      @php
        $starImage = $starDish['image'] ?? 'images/dahi_vada.jpg';
        $starImageSrc = str_starts_with($starImage, 'http') ? $starImage : asset($starImage);
      @endphp
      <section class="star-gpo-exact">
        <div class="star-gpo-exact-media">
          <img src="{{ $starImageSrc }}" alt="{{ $starDish['heading'] ?? 'Star of GPO Thandey Dahi Bade' }}">
        </div>
        <div class="star-gpo-exact-text">
          @if(!empty($starDish['badge']))
            <h4>{{ $starDish['badge'] }}</h4>
          @endif
          @if(!empty($starDish['heading']))
            <h3>{{ $starDish['heading'] }}</h3>
          @endif
          @php
            $starParagraphs = $starDish['paragraphs'] ?? [];
            if (empty($starParagraphs)) {
              if (!empty($starDish['lead_paragraph'])) $starParagraphs[] = $starDish['lead_paragraph'];
              if (!empty($starDish['description_paragraph'])) $starParagraphs[] = $starDish['description_paragraph'];
            }
          @endphp
          @foreach($starParagraphs as $paraIdx => $paraText)
            <p style="font-size: {{ $paraIdx === 0 ? '1rem' : '0.95rem' }}; line-height: 1.6; color: {{ $paraIdx === 0 ? 'inherit' : 'var(--c-text-muted)' }}; margin-bottom: {{ $paraIdx === count($starParagraphs) - 1 ? '16px' : '14px' }};">
              {{ $paraText }}
            </p>
          @endforeach
          @if(!empty($starDish['highlight_quote']))
            <div style="font-family: var(--font-serif); font-weight: 700; color: var(--c-terracotta-coral); font-size: 1.1rem; letter-spacing: 1px; margin-bottom: 22px;">
              {{ $starDish['highlight_quote'] }}
            </div>
          @endif
          @if(!empty($starDish['button_text']))
            <a href="{{ $starDish['button_url'] ?? route('menu') }}" class="btn-cinnamon-pill">{{ $starDish['button_text'] }}</a>
          @endif
        </div>
      </section>

      <!-- SECTION 04 — OUR FAVOURITES (Document Page 4: 6 Dishes) -->
      <section class="our-favourites-exact">
        <div class="sec-head">
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep);">MORE THAN JUST DAHI BADE</h3>
          <p style="font-size: 0.95rem; color: var(--c-text-muted); margin-top: 4px;">Along with our signature Dahi Bade, GPO offers a selection of popular Indian snacks and favourites.</p>
        </div>

        <div class="six-dishes-grid">
          <!-- 1. Dahi Bade Full Plate -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Dahi Bade Full Plate">
            </div>
            <div class="mini-dish-info">
              <h5>DAHI BADE FULL PLATE</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">Our signature dish and the heart of the GPO experience.</p>
            </div>
          </div>

          <!-- 2. Dahi Bade Half Plate -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Dahi Bade Half Plate">
            </div>
            <div class="mini-dish-info">
              <h5>DAHI BADE HALF PLATE</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">The perfect portion when you’re craving the original taste.</p>
            </div>
          </div>

          <!-- 3. Moong Dal Chilla -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/aloo_tikki.jpg') }}" alt="Moong Dal Chilla">
            </div>
            <div class="mini-dish-info">
              <h5>MOONG DAL CHILLA</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">A crispy, savoury and freshly prepared classic made with moong dal batter.</p>
            </div>
          </div>

          <!-- 4. Samosa -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/chaat.jpg') }}" alt="Samosa">
            </div>
            <div class="mini-dish-info">
              <h5>SAMOSA</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">A crispy golden classic filled with a savoury potato and spice mixture.</p>
            </div>
          </div>

          <!-- 5. Samosa Chaat -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/chaat.jpg') }}" alt="Samosa Chaat">
            </div>
            <div class="mini-dish-info">
              <h5>SAMOSA CHAAT</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">Crispy samosa combined with tangy chutneys, yogurt, herbs and spices.</p>
            </div>
          </div>

          <!-- 6. Dahi Vada Packed -->
          <div class="mini-dish-card">
            <div class="mini-dish-thumb">
              <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Dahi Vada Packed">
            </div>
            <div class="mini-dish-info">
              <h5>DAHI VADA PACKED</h5>
              <p style="font-size: 0.78rem; color: var(--c-text-muted); margin-top: 4px;">The GPO Dahi Bade experience, conveniently packed for enjoying on the go.</p>
            </div>
          </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
          <a href="{{ route('menu') }}" class="btn-cinnamon-pill">VIEW FULL MENU</a>
        </div>
      </section>

      <!-- SECTION 05 — THE GPO EXPERIENCE (Document Pages 4-5) -->
      <section class="gpo-experience-section">
        <div class="gpo-exp-heading-wrap">
          <div class="leaf-accent-left">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#2d6a4f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
              <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
            </svg>
          </div>
          <div class="gpo-exp-titles">
            <h3>{{ $experience['heading'] ?? 'THE GPO EXPERIENCE' }}</h3>
            <p>{{ $experience['subheading'] ?? 'WHY A VISIT TO GPO FEELS DIFFERENT' }}</p>
          </div>
        </div>

        <div class="gpo-exp-strip">
          @foreach($experience['items'] ?? [] as $item)
            <div class="gpo-exp-col">
              <div class="gpo-exp-icon">{{ $item['icon'] ?? '🌿' }}</div>
              <h5>{{ $item['title'] ?? '' }}</h5>
              <p>{{ $item['description'] ?? '' }}</p>
            </div>
          @endforeach
        </div>

        <!-- SECTION 06 — TESTIMONIALS (Document Page 5: 4 Exact Reviews) -->
        <div style="text-align: center; margin: 45px 0 25px;">
          <h4 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--c-teal-deep);">WHAT OUR CUSTOMERS SAY</h4>
        </div>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 25px;">
          <div class="review-card-exact" style="padding: 22px 18px;">
            <div class="review-stars">★★★★★</div>
            <h5 style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--c-teal-deep); margin: 6px 0;">“Amazing Taste”</h5>
            <p style="font-size: 0.85rem; color: var(--c-text-muted);">Our customers continue to appreciate the taste and experience of GPO Ke Thandey Dahi Bade.</p>
          </div>

          <div class="review-card-exact" style="padding: 22px 18px;">
            <div class="review-stars">★★★★★</div>
            <h5 style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--c-teal-deep); margin: 6px 0;">“Best in Taste and Service”</h5>
            <p style="font-size: 0.85rem; color: var(--c-text-muted);">A food experience made memorable by flavour and hospitality.</p>
          </div>

          <div class="review-card-exact" style="padding: 22px 18px;">
            <div class="review-stars">★★★★★</div>
            <h5 style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--c-teal-deep); margin: 6px 0;">“Delicious Dahi Bada”</h5>
            <p style="font-size: 0.85rem; color: var(--c-text-muted);">For many customers, the Dahi Bade remain the reason to come back.</p>
          </div>

          <div class="review-card-exact" style="padding: 22px 18px;">
            <div class="review-stars">★★★★★</div>
            <h5 style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--c-teal-deep); margin: 6px 0;">“Good Taste — Must Try”</h5>
            <p style="font-size: 0.85rem; color: var(--c-text-muted);">A simple recommendation that says it all.</p>
          </div>
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
          <a href="{{ route('contact') }}" class="btn-amber-pill" style="display: inline-block;">VIEW MORE REVIEWS</a>
        </div>
      </section>

      <!-- SECTION 07 — VISIT US (Document Pages 5-6) -->
      @php
        $visitImg = $visitUs['image'] ?? 'images/storefront.jpg';
        $visitImgSrc = str_starts_with($visitImg, 'http') ? $visitImg : asset($visitImg);
        $phoneVal = $visitUs['phone'] ?? '+91 91406 31433';
        $phoneClean = preg_replace('/[^0-9\+]/', '', $phoneVal);
      @endphp
      <section class="home-visit-us-section">
        <div class="home-visit-media">
          <img src="{{ $visitImgSrc }}" alt="{{ $visitUs['image_alt'] ?? 'Hazratganj Outlet Original GPO' }}">
        </div>
        <div class="home-visit-details">
          @if(!empty($visitUs['badge']))
            <h4>{{ $visitUs['badge'] }}</h4>
          @endif
          @if(!empty($visitUs['heading']))
            <h3>{{ $visitUs['heading'] }}</h3>
          @endif
          @if(!empty($visitUs['subheading_lead']) || !empty($visitUs['subheading_desc']))
            <p class="sub-lead">
              @if(!empty($visitUs['subheading_lead']))
                <strong>{{ $visitUs['subheading_lead'] }}</strong><br>
              @endif
              {{ $visitUs['subheading_desc'] ?? '' }}
            </p>
          @endif
          
          <div class="visit-info-list">
            @if(!empty($visitUs['address']))
              <div class="visit-info-row">
                <div class="visit-info-icon">📍</div>
                <div>
                  <strong>{{ $visitUs['address_label'] ?? 'ADDRESS:' }}</strong><br>
                  {!! nl2br(e($visitUs['address'])) !!}
                </div>
              </div>
            @endif
            @if(!empty($visitUs['phone']))
              <div class="visit-info-row">
                <div class="visit-info-icon">📞</div>
                <div><strong>{{ $visitUs['phone_label'] ?? 'CALL:' }}</strong> <a href="tel:{{ $phoneClean }}" style="color: var(--c-teal-deep); font-weight: 600;">{{ $visitUs['phone'] }}</a></div>
              </div>
            @endif
            @if(!empty($visitUs['email']))
              <div class="visit-info-row">
                <div class="visit-info-icon">✉️</div>
                <div><strong>{{ $visitUs['email_label'] ?? 'EMAIL:' }}</strong> <a href="mailto:{{ $visitUs['email'] }}" style="color: var(--c-teal-deep); font-weight: 600;">{{ $visitUs['email'] }}</a></div>
              </div>
            @endif
            @if(!empty($visitUs['timings']))
              <div class="visit-info-row">
                <div class="visit-info-icon">⏰</div>
                <div><strong>{{ $visitUs['timings_label'] ?? 'TIMINGS:' }}</strong> {{ $visitUs['timings'] }}</div>
              </div>
            @endif
          </div>

          <div class="visit-btns-row">
            @if(!empty($visitUs['btn1_text']))
              <a href="{{ $visitUs['btn1_url'] ?? '#' }}" target="_blank" class="btn-terracotta-pill">{{ $visitUs['btn1_text'] }}</a>
            @endif
            @if(!empty($visitUs['btn2_text']))
              <a href="{{ $visitUs['btn2_url'] ?? route('menu') }}" class="btn-amber-pill">{{ $visitUs['btn2_text'] }}</a>
            @endif
          </div>
        </div>
      </section>

      <!-- SECTION 08 — FRANCHISE CTA -->
      @php
        $ctaImg = $franchiseCta['image'] ?? 'images/storefront.jpg';
        $ctaImgSrc = str_starts_with($ctaImg, 'http') ? $ctaImg : asset($ctaImg);
        $btnStyle = $franchiseCta['button_style'] ?? 'amber';
        $btnClassMap = [
            'amber'         => 'btn-amber-pill',
            'spruce'        => 'btn-spruce-pill',
            'terracotta'    => 'btn-terracotta-pill',
            'crimson'       => 'btn-crimson-pill',
            'emerald'       => 'btn-emerald-pill',
            'white'         => 'btn-white-pill',
        ];
        $btnClass = $btnClassMap[$btnStyle] ?? 'btn-amber-pill';
        $overlayOp = $franchiseCta['overlay_opacity'] ?? '0.90';
      @endphp
      <section class="home-franchise-cta-card" style="background-image: linear-gradient(135deg, rgba(8, 59, 60, {{ $overlayOp }}) 0%, rgba(5, 44, 45, {{ $overlayOp }}) 100%), url('{{ $ctaImgSrc }}');">
        <div class="home-franchise-cta-inner">
          @if(!empty($franchiseCta['heading']))
            <h3>{{ $franchiseCta['heading'] }}</h3>
          @endif
          @if(!empty($franchiseCta['subheading']))
            <span class="sub-gold">{{ $franchiseCta['subheading'] }}</span>
          @endif
          @if(!empty($franchiseCta['description']))
            <p>
              {!! nl2br(e($franchiseCta['description'])) !!}
            </p>
          @endif
          @if(!empty($franchiseCta['button_text']))
            <a href="{{ $franchiseCta['button_url'] ?? route('franchise') }}" class="{{ $btnClass }}">{{ $franchiseCta['button_text'] }}</a>
          @endif
        </div>
      </section>

    </div>
@endsection

@section('scripts')
<script>
    // Fallback controller for hero carousel
    (function initHeroCarousel() {
      const carouselEl = document.getElementById('heroHomeCarousel');
      if (!carouselEl) return;
      let current = 0;
      const items = carouselEl.querySelectorAll('.carousel-item');
      const dots = carouselEl.querySelectorAll('.hero-carousel-dots button');
      
      function goTo(index) {
        items[current].classList.remove('active');
        if (dots[current]) dots[current].classList.remove('active');
        current = (index + items.length) % items.length;
        items[current].classList.add('active');
        if (dots[current]) dots[current].classList.add('active');
      }

      const timer = setInterval(() => goTo(current + 1), 5500);

      dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => {
          clearInterval(timer);
          goTo(idx);
        });
      });

      const prev = carouselEl.querySelector('.carousel-control-prev');
      const next = carouselEl.querySelector('.carousel-control-next');
      if (prev) prev.addEventListener('click', () => { clearInterval(timer); goTo(current - 1); });
      if (next) next.addEventListener('click', () => { clearInterval(timer); goTo(current + 1); });
    })();
</script>
@endsection
