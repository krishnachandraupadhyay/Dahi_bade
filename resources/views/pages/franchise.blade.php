@extends('layouts.frontend')

@section('title', 'Franchise | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-aqua')

@section('content')
    <!-- FRANCHISE HERO SLIDER (Document Pages 13-14: 3 Exact Sliders) -->
    <section class="hero-home-exact hero-franchise-exact">
      <div id="franchiseHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">
        
        <!-- Indicators -->
        <div class="carousel-indicators hero-carousel-dots">
          <button type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#franchiseHeroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
          <!-- SLIDER 01 (Document Page 13) -->
          <div class="carousel-item active">
            <div class="hero-slide-item">
              <div class="hero-home-exact-bg">
                <img src="{{ asset('images/franchise.jpg') }}" alt="Original GPO Franchise Outlet">
              </div>
              <div class="hero-home-exact-overlay"></div>

              <div class="hero-content-left" style="max-width: 680px;">
                <div style="font-size: 1.1rem; color: #a9c7b5; margin-bottom: 8px;">🏢 FRANCHISE PARTNERSHIP</div>
                <h1 class="hero-main-heading" style="font-size: 2.5rem;">
                  BRING THE ORIGINAL<br>
                  TO YOUR CITY
                </h1>
                <span class="hero-sub-since" style="font-size: 1.25rem;">BECOME A GPO FRANCHISE PARTNER</span>
                <ul class="franchise-hero-bullets" style="margin: 14px 0 20px;">
                  <li>A trusted Lucknow food legacy.</li>
                  <li>A focused food concept.</li>
                  <li>A brand built around a signature product.</li>
                </ul>
                <div class="hero-btn-row">
                  <a href="#enquiryForm" class="btn-amber-pill">APPLY FOR FRANCHISE</a>
                  <a href="#whyPartner" class="btn-spruce-pill">WHY PARTNER WITH US</a>
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDER 02 (Document Page 13) -->
          <div class="carousel-item">
            <div class="hero-slide-item">
              <div class="hero-home-exact-bg">
                <img src="{{ asset('images/lucknow_heritage.jpg') }}" alt="Lucknow Heritage Since 1976">
              </div>
              <div class="hero-home-exact-overlay"></div>

              <div class="hero-content-left" style="max-width: 680px;">
                <div style="font-size: 1.1rem; color: #a9c7b5; margin-bottom: 8px;">📈 EXPANSION OPPORTUNITY</div>
                <h1 class="hero-main-heading" style="font-size: 2.5rem;">
                  A LEGACY<br>
                  SINCE 1976
                </h1>
                <span class="hero-sub-since" style="font-size: 1.25rem;">NOW READY FOR ITS NEXT CHAPTER</span>
                <p class="hero-para-short" style="margin: 14px 0 22px;">
                  Take the Original GPO Ke Thandey Dahi Bade experience to a new market and become part of a growing food brand.
                </p>
                <div class="hero-btn-row">
                  <a href="#whyPartner" class="btn-amber-pill">KNOW MORE</a>
                  <a href="#enquiryForm" class="btn-spruce-pill">APPLY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDER 03 (Document Page 14) -->
          <div class="carousel-item">
            <div class="hero-slide-item">
              <div class="hero-home-exact-bg">
                <img src="{{ asset('images/storefront.jpg') }}" alt="Build with a Recognised Name">
              </div>
              <div class="hero-home-exact-overlay"></div>

              <div class="hero-content-left" style="max-width: 680px;">
                <div style="font-size: 1.1rem; color: #a9c7b5; margin-bottom: 8px;">⭐ TRUSTED BRAND REPUTATION</div>
                <h1 class="hero-main-heading" style="font-size: 2.5rem;">
                  BUILD WITH A<br>
                  RECOGNISED NAME
                </h1>
                <span class="hero-sub-since" style="font-size: 1.25rem;">SERVE A TASTE PEOPLE ALREADY LOVE</span>
                <p class="hero-para-short" style="margin: 14px 0 22px;">
                  From brand identity and marketing support to training and technology-enabled operations, GPO aims to support franchise partners throughout their journey.
                </p>
                <div class="hero-btn-row">
                  <a href="#enquiryForm" class="btn-amber-pill">ENQUIRE NOW</a>
                  <a href="#glance" class="btn-spruce-pill">VIEW METRICS</a>
                </div>
              </div>
            </div>
          </div>
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
          <h2>WHY PARTNER WITH GPO?</h2>
          <p style="font-family: var(--font-serif); font-size: 1.2rem; color: var(--c-terracotta-coral); font-style: italic; margin-top: 4px;">
            MORE THAN A FRANCHISE. A LEGACY.
          </p>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 40px; border: 1px solid rgba(8,59,60,0.08); box-shadow: 0 6px 24px rgba(8,59,60,0.05); max-width: 900px; margin: 0 auto; text-align: center;">
          <p style="font-size: 1.05rem; color: var(--c-text-main); line-height: 1.7; margin-bottom: 16px;">
            Starting a food business from scratch means building everything from the ground up — brand identity, customer trust, menu positioning and operating systems.
          </p>
          <p style="font-size: 1.05rem; color: var(--c-teal-deep); font-weight: 600; line-height: 1.7;">
            A GPO franchise gives entrepreneurs the opportunity to build around an established brand concept with a legacy dating back to 1976.
          </p>
        </div>
      </section>

      <!-- SECTION 02 — USP CARDS: WHAT YOU GET WITH GPO (Document Pages 14-15: 6 Exact Items) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h4>USP CARDS</h4>
          <h2>WHAT YOU GET WITH GPO</h2>
          <p>Comprehensive ecosystem designed for partner operational excellence.</p>
        </div>

        <div class="usp-cards-grid">
          <!-- 01 — ESTABLISHED BRAND -->
          <div class="usp-card-item">
            <div class="usp-card-num">01</div>
            <h5>ESTABLISHED BRAND</h5>
            <p>GPO Ke Thandey Dahi Bade has been associated with Lucknow’s food culture since 1976.</p>
          </div>

          <!-- 02 — BRANDING SUPPORT -->
          <div class="usp-card-item">
            <div class="usp-card-num">02</div>
            <h5>BRANDING SUPPORT</h5>
            <p>Marketing and branding support is included as part of the franchise offering.</p>
          </div>

          <!-- 03 — TRADEMARK / BRAND RIGHTS -->
          <div class="usp-card-item">
            <div class="usp-card-num">03</div>
            <h5>TRADEMARK / BRAND RIGHTS</h5>
            <p>Franchise partners receive rights to use the GPO brand as defined by the franchise agreement.</p>
          </div>

          <!-- 04 — STORE OPERATIONS SUPPORT -->
          <div class="usp-card-item">
            <div class="usp-card-num">04</div>
            <h5>STORE OPERATIONS SUPPORT</h5>
            <p>A trained store operations staff member is provided at the start to support the initial store setup and operations.</p>
          </div>

          <!-- 05 — TECHNOLOGY SUPPORT -->
          <div class="usp-card-item">
            <div class="usp-card-num">05</div>
            <h5>TECHNOLOGY SUPPORT</h5>
            <p>Access to modern order-management tools, including WhatsApp-based ordering and live tracking capabilities.</p>
          </div>

          <!-- 06 — FOCUSED FOOD FORMAT -->
          <div class="usp-card-item">
            <div class="usp-card-num">06</div>
            <h5>FOCUSED FOOD FORMAT</h5>
            <p>A simple and recognisable product proposition built around Dahi Bade and complementary Indian snacks.</p>
          </div>
        </div>
      </section>

      <!-- SECTION 03 — FRANCHISE AT A GLANCE (Document Pages 15-16) -->
      <section id="glance" style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>FRANCHISE AT A GLANCE</h2>
          <p>Key parameters and investment economics of the GPO franchise proposal.</p>
        </div>

        <div class="glance-metrics-grid">
          <!-- FRANCHISE FEE -->
          <div class="glance-metric-box">
            <span class="metric-label">FRANCHISE FEE</span>
            <h4>₹12,50,000</h4>
            <p>One-time upfront franchise fee.</p>
          </div>

          <!-- MINIMUM STORE SIZE -->
          <div class="glance-metric-box">
            <span class="metric-label">MINIMUM STORE SIZE</span>
            <h4>250 SQ. FT.</h4>
            <p>Minimum shop size specified in the franchise proposal.</p>
          </div>

          <!-- LOCATION -->
          <div class="glance-metric-box">
            <span class="metric-label">LOCATION</span>
            <h4>LUCKNOW & EXPANSION</h4>
            <p>Location approval and territory availability subject to brand process.</p>
          </div>

          <!-- BRAND SUPPORT -->
          <div class="glance-metric-box">
            <span class="metric-label">BRAND SUPPORT</span>
            <h4>MARKETING + BRANDING</h4>
            <p>Support included as per the franchise offering.</p>
          </div>

          <!-- OPERATIONS -->
          <div class="glance-metric-box">
            <span class="metric-label">OPERATIONS</span>
            <h4>TRAINING SUPPORT</h4>
            <p>Initial trained store operations support provided.</p>
          </div>

          <!-- TECHNOLOGY -->
          <div class="glance-metric-box">
            <span class="metric-label">TECHNOLOGY</span>
            <h4>DIGITAL ORDER MANAGEMENT</h4>
            <p>Modern tools for smoother order handling and customer service.</p>
          </div>
        </div>

        <!-- Indicative ROI & Break-even (Document Page 16) -->
        <div class="roi-highlight-bar">
          <strong>FINANCIAL INDICATORS:</strong> The proposal also calculates an indicative break-even period of approximately <strong>3.5 months</strong> and annual ROI of <strong>336%</strong> based on its assumptions.
        </div>
      </section>

      <!-- SECTION 06 — WHO CAN PARTNER WITH US? (Document Page 16: 5 Profiles) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>WHO CAN PARTNER WITH US?</h2>
          <p>The GPO franchise opportunity may be suitable for:</p>
        </div>

        <div class="partner-profiles-grid">
          <!-- 1. ENTREPRENEURS -->
          <div class="partner-profile-card">
            <h5>ENTREPRENEURS</h5>
            <p>Looking to enter the food & beverage business.</p>
          </div>

          <!-- 2. EXISTING FOOD BUSINESS OWNERS -->
          <div class="partner-profile-card">
            <h5>EXISTING FOOD BUSINESS OWNERS</h5>
            <p>Looking to add a recognised food concept to their portfolio.</p>
          </div>

          <!-- 3. INVESTORS -->
          <div class="partner-profile-card">
            <h5>INVESTORS</h5>
            <p>Looking for an organised food-business opportunity.</p>
          </div>

          <!-- 4. RESTAURANT & CAFE OPERATORS -->
          <div class="partner-profile-card">
            <h5>RESTAURANT & CAFE OPERATORS</h5>
            <p>Looking to expand into a focused Indian snack concept.</p>
          </div>

          <!-- 5. BUSINESS OWNERS -->
          <div class="partner-profile-card">
            <h5>BUSINESS OWNERS</h5>
            <p>Looking to bring a recognised Lucknow food identity to a new market.</p>
          </div>
        </div>
      </section>

      <!-- SECTION 07 — THE GPO FRANCHISE JOURNEY (Document Page 17: 6 Steps) -->
      <section id="journey" style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>THE GPO FRANCHISE JOURNEY</h2>
          <p>A structured 6-step path from first enquiry to grand opening.</p>
        </div>

        <div class="franchise-journey-grid">
          <!-- STEP 01 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 01</div>
            <h5>SUBMIT YOUR ENQUIRY</h5>
            <p>Tell us about yourself, your city and your business interest.</p>
          </div>

          <!-- STEP 02 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 02</div>
            <h5>DISCUSSION</h5>
            <p>Our team will connect with you to understand your requirements.</p>
          </div>

          <!-- STEP 03 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 03</div>
            <h5>LOCATION & COMMERCIAL DISCUSSION</h5>
            <p>Discuss location suitability, investment, territory and franchise terms.</p>
          </div>

          <!-- STEP 04 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 04</div>
            <h5>AGREEMENT</h5>
            <p>Proceed as per mutually agreed franchise terms and documentation.</p>
          </div>

          <!-- STEP 05 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 05</div>
            <h5>STORE SETUP</h5>
            <p>Work towards setting up your GPO outlet with brand and operational guidance.</p>
          </div>

          <!-- STEP 06 -->
          <div class="journey-step-card-clean">
            <div class="journey-step-number">STEP 06</div>
            <h5>LAUNCH</h5>
            <p>Open your doors and bring the Original GPO taste to your customers.</p>
          </div>
        </div>
      </section>

      <!-- SECTION 08 — FRANCHISE ENQUIRY FORM (Document Pages 17-18) -->
      <section id="enquiryForm" class="franchise-form-wrap">
        <div style="text-align: center; margin-bottom: 30px;">
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep); margin-bottom: 8px;">YOUR CITY COULD BE NEXT</h3>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 12px;">
            READY TO BRING A LUCKNOW FAVOURITE TO YOUR MARKET?
          </h4>
          <p style="font-size: 0.95rem; color: var(--c-text-muted);">
            Fill out the franchise enquiry form and our team will get in touch with you.
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
                SUBMIT FRANCHISE ENQUIRY
              </button>
            </div>
          </div>
        </form>
      </section>

      <!-- FINAL FRANCHISE CTA -->
      <section class="home-franchise-cta-card" style="background-image: linear-gradient(135deg, rgba(8, 59, 60, 0.90) 0%, rgba(5, 44, 45, 0.88) 100%), url('{{ asset('images/franchise.jpg') }}');">
        <div class="home-franchise-cta-inner">
          <h3>DON’T JUST START A FOOD BUSINESS.</h3>
          <span class="sub-gold" style="font-size: 1.15rem;">BUILD A BRAND PEOPLE REMEMBER.</span>
          <p>
            Partner with Original GPO Ke Thandey Dahi Bade and deliver an authentic legacy of 1976.
          </p>
          <a href="#enquiryForm" class="btn-amber-pill">APPLY FOR FRANCHISE</a>
        </div>
      </section>

    </div>
@endsection

@section('scripts')
<script>
    // Fallback slider controller for franchise
    (function initFranchiseCarousel() {
      const carouselEl = document.getElementById('franchiseHeroCarousel');
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
