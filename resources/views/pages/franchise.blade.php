@extends('layouts.frontend')

@section('title', 'Franchise | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-aqua')

@section('content')
    @php
        $slides = $franchise['hero_sliders'] ?? [
            [
                'badge' => '🏢 FRANCHISE PARTNERSHIP',
                'heading' => "BRING THE ORIGINAL\nTO YOUR CITY",
                'sub' => 'BECOME A GPO FRANCHISE PARTNER',
                'bullets' => ['A trusted Lucknow food legacy.', 'A focused food concept.', 'A brand built around a signature product.'],
                'btn1_text' => 'APPLY FOR FRANCHISE',
                'btn1_url' => '#enquiryForm',
                'btn2_text' => 'WHY PARTNER WITH US',
                'btn2_url' => '#whyPartner',
                'media_type' => 'image',
                'media' => 'images/franchise.jpg',
                'overlay_color' => '#083b3c',
                'overlay_opacity' => '0.75',
            ],
            [
                'badge' => '📈 EXPANSION OPPORTUNITY',
                'heading' => "A LEGACY\nSINCE 1976",
                'sub' => 'NOW READY FOR ITS NEXT CHAPTER',
                'desc' => 'Take the Original GPO Ke Thandey Dahi Bade experience to a new market and become part of a growing food brand.',
                'btn1_text' => 'KNOW MORE',
                'btn1_url' => '#whyPartner',
                'btn2_text' => 'APPLY NOW',
                'btn2_url' => '#enquiryForm',
                'media_type' => 'image',
                'media' => 'images/lucknow_heritage.jpg',
                'overlay_color' => '#083b3c',
                'overlay_opacity' => '0.75',
            ],
            [
                'badge' => '⭐ TRUSTED BRAND REPUTATION',
                'heading' => "BUILD WITH A\nRECOGNISED NAME",
                'sub' => 'SERVE A TASTE PEOPLE ALREADY LOVE',
                'desc' => 'From brand identity and marketing support to training and technology-enabled operations, GPO aims to support franchise partners throughout their journey.',
                'btn1_text' => 'ENQUIRE NOW',
                'btn1_url' => '#enquiryForm',
                'btn2_text' => 'VIEW METRICS',
                'btn2_url' => '#glance',
                'media_type' => 'image',
                'media' => 'images/storefront.jpg',
                'overlay_color' => '#083b3c',
                'overlay_opacity' => '0.75',
            ],
        ];
        $maxFranchiseSlides = (int)($globalSettings['sections']['franchise']['hero_sliders']['max_slides'] ?? 3);
        $slides = array_slice($slides, 0, $maxFranchiseSlides);
    @endphp

    <!-- FRANCHISE HERO SLIDER (Document Pages 13-14: 3 Sliders) -->
    <section class="hero-home-exact hero-franchise-exact">
      <div id="franchiseHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">
        
        <!-- Indicators -->
        <div class="carousel-indicators hero-carousel-dots">
          @foreach($slides as $idx => $s)
            <button type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide-to="{{ $idx }}" class="{{ $idx === 0 ? 'active' : '' }}" aria-current="{{ $idx === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $idx + 1 }}"></button>
          @endforeach
        </div>

        <div class="carousel-inner">
          @foreach($slides as $idx => $s)
            @php
                $mediaType = $s['media_type'] ?? 'image';
                $overlayColor = $s['overlay_color'] ?? '#083b3c';
                $overlayOpacity = $s['overlay_opacity'] ?? '0.75';
            @endphp
            <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
              <div class="hero-slide-item">
                <div class="hero-home-exact-bg">
                  @if($mediaType === 'youtube' && !empty($s['youtube_id']))
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden;">
                      <iframe src="https://www.youtube-nocookie.com/embed/{{ $s['youtube_id'] }}?autoplay=1&mute=1&loop=1&playlist={{ $s['youtube_id'] }}&controls=0&showinfo=0&modestbranding=1" 
                              style="width: 100vw; height: 56.25vw; min-height: 100%; min-width: 177.77vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border: none;">
                      </iframe>
                    </div>
                  @elseif($mediaType === 'video' && !empty($s['video']))
                    <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover;">
                      <source src="{{ asset($s['video']) }}" type="video/mp4">
                    </video>
                  @else
                    <img src="{{ asset($s['media'] ?? 'images/franchise.jpg') }}" alt="{{ $s['heading'] ?? 'GPO Franchise' }}">
                  @endif
                </div>

                <div class="hero-home-exact-overlay" style="background-color: {{ $overlayColor }}; opacity: {{ $overlayOpacity }};"></div>

                <div class="hero-content-left" style="max-width: 680px;">
                  @if(!empty($s['badge']))
                    <div style="font-size: 1.1rem; color: #a9c7b5; margin-bottom: 8px;">{{ $s['badge'] }}</div>
                  @endif
                  
                  <h1 class="hero-main-heading" style="font-size: 2.5rem;">
                    {!! nl2br(e($s['heading'] ?? '')) !!}
                  </h1>

                  @if(!empty($s['sub']))
                    <span class="hero-sub-since" style="font-size: 1.25rem;">{{ $s['sub'] }}</span>
                  @endif

                  @if(!empty($s['bullets']) && is_array($s['bullets']))
                    <ul class="franchise-hero-bullets" style="margin: 14px 0 20px;">
                      @foreach($s['bullets'] as $b)
                        @if(!empty($b))
                          <li>{{ $b }}</li>
                        @endif
                      @endforeach
                    </ul>
                  @elseif(!empty($s['desc']))
                    <p class="hero-para-short" style="margin: 14px 0 22px;">
                      {{ $s['desc'] }}
                    </p>
                  @endif

                  <div class="hero-btn-row">
                    @if(!empty($s['btn1_text']))
                      <a href="{{ $s['btn1_url'] ?? '#enquiryForm' }}" class="btn-amber-pill">{{ $s['btn1_text'] }}</a>
                    @endif
                    @if(!empty($s['btn2_text']))
                      <a href="{{ $s['btn2_url'] ?? '#whyPartner' }}" class="btn-spruce-pill">{{ $s['btn2_text'] }}</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev hero-ctrl" type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide="prev" aria-label="Previous">
          <span class="ctrl-arrow">‹</span>
        </button>
        <button class="carousel-control-next hero-ctrl" type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide="next" aria-label="Next">
          <span class="ctrl-arrow">›</span>
        </button>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- SECTION 01 — WHY PARTNER WITH GPO? (Document Page 14) -->
      <section id="whyPartner" style="margin: 55px 0 45px;">
        <div class="story-sec-title-wrap">
          <h2>{{ $franchise['why_heading'] ?? 'WHY PARTNER WITH GPO?' }}</h2>
          <p style="font-family: var(--font-serif); font-size: 1.2rem; color: var(--c-terracotta-coral); font-style: italic; margin-top: 4px;">
            {{ $franchise['why_tagline'] ?? 'MORE THAN A FRANCHISE. A LEGACY.' }}
          </p>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 40px; border: 1px solid rgba(8,59,60,0.08); box-shadow: 0 6px 24px rgba(8,59,60,0.05); max-width: 900px; margin: 0 auto; text-align: center;">
          <p style="font-size: 1.05rem; color: var(--c-text-main); line-height: 1.7; margin-bottom: 16px;">
            {{ $franchise['why_p1'] ?? 'Starting a food business from scratch means building everything from the ground up — brand identity, customer trust, menu positioning and operating systems.' }}
          </p>
          <p style="font-size: 1.05rem; color: var(--c-teal-deep); font-weight: 600; line-height: 1.7;">
            {{ $franchise['why_p2'] ?? 'A GPO franchise gives entrepreneurs the opportunity to build around an established brand concept with a legacy dating back to 1976.' }}
          </p>
        </div>
      </section>

      <!-- SECTION 02 — USP CARDS: WHAT YOU GET WITH GPO (Document Pages 14-15: 6 Items) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h4>{{ $franchise['usp_badge'] ?? 'USP CARDS' }}</h4>
          <h2>{{ $franchise['usp_heading'] ?? 'WHAT YOU GET WITH GPO' }}</h2>
          <p>{{ $franchise['usp_sub'] ?? 'Comprehensive ecosystem designed for partner operational excellence.' }}</p>
        </div>

        @php
            $usps = $franchise['usp_items'] ?? [
                ['num' => '01', 'title' => 'ESTABLISHED BRAND', 'desc' => 'GPO Ke Thandey Dahi Bade has been associated with Lucknow’s food culture since 1976.'],
                ['num' => '02', 'title' => 'BRANDING SUPPORT', 'desc' => 'Marketing and branding support is included as part of the franchise offering.'],
                ['num' => '03', 'title' => 'TRADEMARK / BRAND RIGHTS', 'desc' => 'Franchise partners receive rights to use the GPO brand as defined by the franchise agreement.'],
                ['num' => '04', 'title' => 'STORE OPERATIONS SUPPORT', 'desc' => 'A trained store operations staff member is provided at the start to support the initial store setup and operations.'],
                ['num' => '05', 'title' => 'TECHNOLOGY SUPPORT', 'desc' => 'Access to modern order-management tools, including WhatsApp-based ordering and live tracking capabilities.'],
                ['num' => '06', 'title' => 'FOCUSED FOOD FORMAT', 'desc' => 'A simple and recognisable product proposition built around Dahi Bade and complementary Indian snacks.']
            ];
        @endphp

        <div class="usp-cards-grid">
          @foreach($usps as $item)
            <div class="usp-card-item">
              <div class="usp-card-num">{{ $item['num'] ?? '01' }}</div>
              <h5>{{ $item['title'] ?? '' }}</h5>
              <p>{{ $item['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 03 — FRANCHISE AT A GLANCE (Document Pages 15-16) -->
      <section id="glance" style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>{{ $franchise['glance_heading'] ?? 'FRANCHISE AT A GLANCE' }}</h2>
          <p>{{ $franchise['glance_sub'] ?? 'Key parameters and investment economics of the GPO franchise proposal.' }}</p>
        </div>

        @php
            $metrics = $franchise['glance_metrics'] ?? [
                ['label' => 'FRANCHISE FEE', 'value' => '₹12,50,000', 'desc' => 'One-time upfront franchise fee.'],
                ['label' => 'MINIMUM STORE SIZE', 'value' => '250 SQ. FT.', 'desc' => 'Minimum shop size specified in the franchise proposal.'],
                ['label' => 'LOCATION', 'value' => 'LUCKNOW & EXPANSION', 'desc' => 'Location approval and territory availability subject to brand process.'],
                ['label' => 'BRAND SUPPORT', 'value' => 'MARKETING + BRANDING', 'desc' => 'Support included as per the franchise offering.'],
                ['label' => 'OPERATIONS', 'value' => 'TRAINING SUPPORT', 'desc' => 'Initial trained store operations support provided.'],
                ['label' => 'TECHNOLOGY', 'value' => 'DIGITAL ORDER MANAGEMENT', 'desc' => 'Modern tools for smoother order handling and customer service.']
            ];
        @endphp

        <div class="glance-metrics-grid">
          @foreach($metrics as $met)
            <div class="glance-metric-box">
              <span class="metric-label">{{ $met['label'] ?? '' }}</span>
              <h4>{{ $met['value'] ?? '' }}</h4>
              <p>{{ $met['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>

        <!-- Indicative ROI & Break-even -->
        <div class="roi-highlight-bar">
          <strong>{{ $franchise['roi_highlight_lead'] ?? 'FINANCIAL INDICATORS:' }}</strong> {{ $franchise['roi_highlight_text'] ?? 'The proposal also calculates an indicative break-even period of approximately 3.5 months and annual ROI of 336% based on its assumptions.' }}
        </div>
      </section>

      <!-- SECTION 06 — WHO CAN PARTNER WITH US? (Document Page 16: 5 Profiles) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>{{ $franchise['partner_heading'] ?? 'WHO CAN PARTNER WITH US?' }}</h2>
          <p>{{ $franchise['partner_sub'] ?? 'The GPO franchise opportunity may be suitable for:' }}</p>
        </div>

        @php
            $profiles = $franchise['partner_profiles'] ?? [
                ['title' => 'ENTREPRENEURS', 'desc' => 'Looking to enter the food & beverage business.'],
                ['title' => 'EXISTING FOOD BUSINESS OWNERS', 'desc' => 'Looking to add a recognised food concept to their portfolio.'],
                ['title' => 'INVESTORS', 'desc' => 'Looking for an organised food-business opportunity.'],
                ['title' => 'RESTAURANT & CAFE OPERATORS', 'desc' => 'Looking to expand into a focused Indian snack concept.'],
                ['title' => 'BUSINESS OWNERS', 'desc' => 'Looking to bring a recognised Lucknow food identity to a new market.']
            ];
        @endphp

        <div class="partner-profiles-grid">
          @foreach($profiles as $prof)
            <div class="partner-profile-card">
              <h5>{{ $prof['title'] ?? '' }}</h5>
              <p>{{ $prof['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 07 — THE GPO FRANCHISE JOURNEY (Document Page 17: 6 Steps) -->
      <section id="journey" style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>{{ $franchise['journey_heading'] ?? 'THE GPO FRANCHISE JOURNEY' }}</h2>
          <p>{{ $franchise['journey_sub'] ?? 'A structured 6-step path from first enquiry to grand opening.' }}</p>
        </div>

        @php
            $steps = $franchise['journey_steps'] ?? [
                ['step' => 'STEP 01', 'title' => 'SUBMIT YOUR ENQUIRY', 'desc' => 'Tell us about yourself, your city and your business interest.'],
                ['step' => 'STEP 02', 'title' => 'DISCUSSION', 'desc' => 'Our team will connect with you to understand your requirements.'],
                ['step' => 'STEP 03', 'title' => 'LOCATION & COMMERCIAL DISCUSSION', 'desc' => 'Discuss location suitability, investment, territory and franchise terms.'],
                ['step' => 'STEP 04', 'title' => 'AGREEMENT', 'desc' => 'Proceed as per mutually agreed franchise terms and documentation.'],
                ['step' => 'STEP 05', 'title' => 'STORE SETUP', 'desc' => 'Work towards setting up your GPO outlet with brand and operational guidance.'],
                ['step' => 'STEP 06', 'title' => 'LAUNCH', 'desc' => 'Open your doors and bring the Original GPO taste to your customers.']
            ];
        @endphp

        <div class="franchise-journey-grid">
          @foreach($steps as $st)
            <div class="journey-step-card-clean">
              <div class="journey-step-number">{{ $st['step'] ?? 'STEP' }}</div>
              <h5>{{ $st['title'] ?? '' }}</h5>
              <p>{{ $st['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- SECTION 08 — FRANCHISE ENQUIRY FORM (Document Pages 17-18) -->
      <section id="enquiryForm" class="franchise-form-wrap">
        <div style="text-align: center; margin-bottom: 30px;">
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep); margin-bottom: 8px;">{{ $franchise['form_heading'] ?? 'YOUR CITY COULD BE NEXT' }}</h3>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 12px;">
            {{ $franchise['form_sub'] ?? 'READY TO BRING A LUCKNOW FAVOURITE TO YOUR MARKET?' }}
          </h4>
          <p style="font-size: 0.95rem; color: var(--c-text-muted);">
            {{ $franchise['form_desc'] ?? 'Fill out the franchise enquiry form and our team will get in touch with you.' }}
          </p>
        </div>

        <form action="{{ route('franchise.submit') }}" method="POST">
          @csrf
          <div class="franchise-form-grid">
            <!-- Full Name -->
            <div>
              <label for="fullName">Full Name *</label>
              <input type="text" id="fullName" name="Full_Name" value="{{ old('Full_Name') }}" placeholder="Enter your full name" required>
            </div>

            <!-- Mobile Number -->
            <div>
              <label for="mobile">Mobile Number *</label>
              <input type="tel" id="mobile" name="Mobile_Number" value="{{ old('Mobile_Number') }}" placeholder="e.g. +91 98765 43210" required>
            </div>

            <!-- Email Address -->
            <div>
              <label for="email">Email Address *</label>
              <input type="email" id="email" name="Email_Address" value="{{ old('Email_Address') }}" placeholder="name@domain.com" required>
            </div>

            <!-- City / State -->
            <div>
              <label for="cityState">City / State *</label>
              <input type="text" id="cityState" name="City_State" value="{{ old('City_State') }}" placeholder="e.g. Kanpur, UP">
            </div>

            <!-- Current Business -->
            <div>
              <label for="currentBusiness">Current Business *</label>
              <input type="text" id="currentBusiness" name="Current_Business" value="{{ old('Current_Business') }}" placeholder="e.g. Retail, Food & Beverage, Investor">
            </div>

            <!-- Preferred Investment Range -->
            <div>
              <label for="investmentRange">Preferred Investment Range *</label>
              <select id="investmentRange" name="Preferred_Investment_Range">
                <option value="">Select Investment Range</option>
                <option value="15-20L" {{ old('Preferred_Investment_Range') == '15-20L' ? 'selected' : '' }}>₹15 Lakhs - ₹20 Lakhs</option>
                <option value="20-30L" {{ old('Preferred_Investment_Range') == '20-30L' ? 'selected' : '' }}>₹20 Lakhs - ₹30 Lakhs</option>
                <option value="30L+" {{ old('Preferred_Investment_Range') == '30L+' ? 'selected' : '' }}>₹30 Lakhs and above</option>
              </select>
            </div>

            <!-- Have You Identified a Location? -->
            <div class="franchise-form-full">
              <label for="locationIdentified">Have You Identified a Location? *</label>
              <select id="locationIdentified" name="Have_You_Identified_a_Location">
                <option value="">Select an option</option>
                <option value="yes" {{ old('Have_You_Identified_a_Location') == 'yes' ? 'selected' : '' }}>Yes - Space ready (250+ sq. ft.)</option>
                <option value="in_progress" {{ old('Have_You_Identified_a_Location') == 'in_progress' ? 'selected' : '' }}>In Progress - Finalizing shortlist</option>
                <option value="need_guidance" {{ old('Have_You_Identified_a_Location') == 'need_guidance' ? 'selected' : '' }}>Not Yet - Need brand guidance</option>
              </select>
            </div>

            <!-- Message -->
            <div class="franchise-form-full">
              <label for="message">Message / Additional Details</label>
              <textarea id="message" name="Message" rows="4" placeholder="Tell us about your background and market vision...">{{ old('Message') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="franchise-form-full" style="text-align: center; margin-top: 10px;">
              <button type="submit" class="btn-amber-pill" style="border: none; cursor: pointer; padding: 14px 40px; font-size: 1rem;">
                {{ $franchise['form_btn_text'] ?? 'SUBMIT FRANCHISE ENQUIRY' }}
              </button>
            </div>
          </div>
        </form>
      </section>

      <!-- FINAL FRANCHISE CTA BANNER -->
      @php
          $ctaMediaType = $franchise['cta_media_type'] ?? 'image';
          $ctaImage = $franchise['cta_image'] ?? 'images/franchise.jpg';
          $ctaColor = $franchise['cta_overlay_color'] ?? '#083b3c';
          $ctaOpacity = $franchise['cta_overlay_opacity'] ?? '0.90';
          $ctaStyle = $franchise['cta_overlay_style'] ?? 'gradient';
          $bgOverlay = ($ctaStyle === 'gradient')
              ? "linear-gradient(135deg, {$ctaColor} 0%, rgba(5, 44, 45, {$ctaOpacity}) 100%)"
              : $ctaColor;
      @endphp
      <section class="home-franchise-cta-card position-relative overflow-hidden" style="background-image: linear-gradient(rgba(8,59,60,{{ $ctaOpacity }}), rgba(8,59,60,{{ $ctaOpacity }})), url('{{ asset($ctaImage) }}'); background-size: cover; background-position: center;">
        @if($ctaMediaType === 'youtube' && !empty($franchise['cta_youtube_id']))
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: 0;">
            <iframe src="https://www.youtube-nocookie.com/embed/{{ $franchise['cta_youtube_id'] }}?autoplay=1&mute=1&loop=1&playlist={{ $franchise['cta_youtube_id'] }}&controls=0&showinfo=0&modestbranding=1" 
                    style="width: 100vw; height: 56.25vw; min-height: 100%; min-width: 177.77vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border: none;">
            </iframe>
          </div>
        @elseif($ctaMediaType === 'video' && !empty($franchise['cta_video']))
          <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
            <source src="{{ asset($franchise['cta_video']) }}" type="video/mp4">
          </video>
        @endif

        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: {{ $bgOverlay }}; opacity: {{ $ctaOpacity }}; z-index: 1;"></div>

        <div class="home-franchise-cta-inner position-relative" style="z-index: 2;">
          <h3>{{ $franchise['cta_heading'] ?? 'DON’T JUST START A FOOD BUSINESS.' }}</h3>
          <span class="sub-gold" style="font-size: 1.15rem;">{{ $franchise['cta_sub'] ?? 'BUILD A BRAND PEOPLE REMEMBER.' }}</span>
          <p>
            {{ $franchise['cta_desc'] ?? 'Partner with Original GPO Ke Thandey Dahi Bade and deliver an authentic legacy of 1976.' }}
          </p>
          <a href="{{ $franchise['cta_btn_url'] ?? '#enquiryForm' }}" class="btn-amber-pill">{{ $franchise['cta_btn_text'] ?? 'APPLY FOR FRANCHISE' }}</a>
        </div>
      </section>

    </div>
@endsection

@section('scripts')
<script>
    // Slider controller for franchise hero carousel
    (function initFranchiseCarousel() {
      const carouselEl = document.getElementById('franchiseHeroCarousel');
      if (!carouselEl) return;
      let current = 0;
      const items = carouselEl.querySelectorAll('.carousel-item');
      const dots = carouselEl.querySelectorAll('.hero-carousel-dots button');
      
      function goTo(index) {
        if (!items.length) return;
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
