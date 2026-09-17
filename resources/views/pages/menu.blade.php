@extends('layouts.frontend')

@section('title', 'Menu | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-aqua')

@section('content')
    <!-- INNER PAGE BANNER (Document Page 9) -->
    <section class="menu-hero-section" style="background: linear-gradient(135deg, #1d3230 0%, #083b3c 100%); color: #ffffff; padding: 65px 24px; text-align: center;">
      <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-family: var(--font-serif); font-size: 2.5rem; margin-bottom: 6px;">OUR MENU</h1>
        <h2 style="font-family: var(--font-serif); font-size: 1.35rem; color: var(--c-gold-amber); margin-bottom: 12px; letter-spacing: 1px;">THE TASTE OF GPO</h2>
        <p style="font-size: 1.05rem; font-weight: 600; color: #ffffff; margin-bottom: 10px;">Classic favourites. Authentic flavours. Made for Lucknow.</p>
        <p style="font-size: 0.95rem; color: rgba(255,255,255,0.85); line-height: 1.6;">
          From our signature Thandey Dahi Bade to crispy Samosas and fresh Moong Dal Chilla, discover the dishes that make GPO a favourite food destination.
        </p>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- SECTION 01 — OUR SIGNATURE DISH (Document Page 10) -->
      <section class="menu-section-card">
        <div class="menu-dish-horizontal">
          <div class="menu-dish-thumb">
            <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Signature Dahi Bade Original GPO">
          </div>
          <div class="menu-dish-body">
            <h4>OUR SIGNATURE DISH</h4>
            <h3>DAHI BADE</h3>
            <div style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--c-terracotta-coral); font-weight: 600; margin-bottom: 8px;">
              THE ORIGINAL GPO EXPERIENCE
            </div>
            <p style="font-size: 0.95rem; color: var(--c-text-main); line-height: 1.6; margin-bottom: 12px;">
              Soft lentil dumplings served with smooth, chilled yogurt and a carefully balanced combination of traditional flavours and spices.
            </p>
            <div class="flavor-pills">
              <span class="flavor-pill">Creamy</span>
              <span class="flavor-pill">Tangy</span>
              <span class="flavor-pill">Refreshing</span>
              <span class="flavor-pill">Unforgettable</span>
            </div>

            <!-- 3 Variants (Document Page 10) -->
            <div class="variants-row">
              <div class="variant-card">
                <h6>FULL PLATE</h6>
                <p>A complete serving for those who want the full GPO experience.</p>
              </div>
              <div class="variant-card">
                <h6>HALF PLATE</h6>
                <p>The perfect option for a lighter craving.</p>
              </div>
              <div class="variant-card">
                <h6>PACKED DAHI BADE</h6>
                <p>Take the GPO experience with you.</p>
              </div>
            </div>

            <a href="{{ route('contact') }}" class="btn-terracotta-pill">ORDER NOW</a>
          </div>
        </div>
      </section>

      <!-- SECTION 02 — FROM OUR KITCHEN: MOONG DAL CHILLA (Document Pages 10-11) -->
      <section class="menu-section-card">
        <div class="menu-dish-horizontal">
          <div class="menu-dish-thumb">
            <img src="{{ asset('images/aloo_tikki.jpg') }}" alt="Moong Dal Chilla Freshly Prepared">
          </div>
          <div class="menu-dish-body">
            <h4>FROM OUR KITCHEN</h4>
            <h3>MOONG DAL CHILLA</h3>
            <p style="font-size: 0.98rem; color: var(--c-text-main); line-height: 1.65; margin-bottom: 12px;">
              Crispy and savoury Moong Dal Chilla made from moong dal batter and seasoned to perfection.
            </p>
            <p style="font-size: 0.92rem; color: var(--c-text-muted); line-height: 1.6; margin-bottom: 20px;">
              A delicious option for breakfast, an evening snack or whenever you want something freshly prepared.
            </p>
            <a href="{{ route('contact') }}" class="btn-cinnamon-pill">ORDER NOW</a>
          </div>
        </div>
      </section>

      <!-- SECTION 03 — A TIMELESS FAVOURITE: SAMOSA (Document Page 11) -->
      <section class="menu-section-card">
        <div class="menu-dish-horizontal">
          <div class="menu-dish-thumb">
            <img src="{{ asset('images/chaat.jpg') }}" alt="Crispy Golden Samosa">
          </div>
          <div class="menu-dish-body">
            <h4>A TIMELESS FAVOURITE</h4>
            <h3>SAMOSA</h3>
            <p style="font-size: 0.98rem; color: var(--c-text-main); line-height: 1.65; margin-bottom: 12px;">
              Golden, crispy and filled with a savoury mixture of potatoes and spices.
            </p>
            <p style="font-size: 0.92rem; color: var(--c-text-muted); line-height: 1.6; margin-bottom: 20px;">
              The perfect companion for chai, a quick snack or a plate of Samosa Chaat.
            </p>
            <a href="{{ route('contact') }}" class="btn-cinnamon-pill">ORDER NOW</a>
          </div>
        </div>
      </section>

      <!-- SECTION 04 — THE CHAAT FAVOURITE: SAMOSA CHAAT (Document Page 11) -->
      <section class="menu-section-card">
        <div class="menu-dish-horizontal">
          <div class="menu-dish-thumb">
            <img src="{{ asset('images/chaat.jpg') }}" alt="Samosa Chaat with Chutneys and Curd">
          </div>
          <div class="menu-dish-body">
            <h4>THE CHAAT FAVOURITE</h4>
            <h3>SAMOSA CHAAT</h3>
            <p style="font-size: 0.98rem; color: var(--c-text-main); line-height: 1.65; margin-bottom: 10px;">
              Take the classic samosa to the next level. Crispy samosas come together with tangy chutneys, creamy yogurt, fresh herbs and aromatic spices.
            </p>
            <div class="flavor-pills">
              <span class="flavor-pill">CRISPY</span>
              <span class="flavor-pill">TANGY</span>
              <span class="flavor-pill">CREAMY</span>
              <span class="flavor-pill">FLAVOURFUL</span>
            </div>
            <a href="{{ route('contact') }}" class="btn-terracotta-pill">ORDER NOW</a>
          </div>
        </div>
      </section>

      <!-- SECTION 05 — OUR MENU AT A GLANCE (Document Page 12) -->
      <section style="margin: 50px 0;">
        <div style="text-align: center; margin-bottom: 30px;">
          <h3 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--c-teal-deep);">OUR MENU AT A GLANCE</h3>
        </div>

        <div class="menu-glance-grid">
          <!-- 1. SIGNATURE DAHI BADE -->
          <div class="menu-glance-card">
            <h5>SIGNATURE DAHI BADE</h5>
            <p>The dish that defines GPO.</p>
          </div>

          <!-- 2. DAHI BADE HALF PLATE -->
          <div class="menu-glance-card">
            <h5>DAHI BADE HALF PLATE</h5>
            <p>A smaller serving of the original.</p>
          </div>

          <!-- 3. MOONG DAL CHILLA -->
          <div class="menu-glance-card">
            <h5>MOONG DAL CHILLA</h5>
            <p>Freshly prepared and savoury.</p>
          </div>

          <!-- 4. SAMOSA -->
          <div class="menu-glance-card">
            <h5>SAMOSA</h5>
            <p>Crispy, golden and classic.</p>
          </div>

          <!-- 5. SAMOSA CHAAT -->
          <div class="menu-glance-card">
            <h5>SAMOSA CHAAT</h5>
            <p>A delicious combination of textures and flavours.</p>
          </div>

          <!-- 6. DAHI VADA PACKED -->
          <div class="menu-glance-card">
            <h5>DAHI VADA PACKED</h5>
            <p>Your favourite GPO taste, packed for convenience.</p>
          </div>
        </div>
      </section>

      <!-- SECTION 06 — SOMETHING FOR EVERY CRAVING (Document Page 12) -->
      <section style="margin: 50px 0;">
        <div style="text-align: center; margin-bottom: 30px;">
          <h3 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--c-teal-deep);">SOMETHING FOR EVERY CRAVING</h3>
        </div>

        <div class="menu-craving-grid">
          <!-- 1. REFRESHING -->
          <div class="menu-craving-card">
            <span class="craving-prompt">Craving Something Refreshing?</span>
            <h5>Go for our signature Thandey Dahi Bade.</h5>
          </div>

          <!-- 2. CRISPY -->
          <div class="menu-craving-card">
            <span class="craving-prompt">Craving Something Crispy?</span>
            <h5>Try our Samosa.</h5>
          </div>

          <!-- 3. SAVOURY -->
          <div class="menu-craving-card">
            <span class="craving-prompt">Craving Something Savoury?</span>
            <h5>Our Moong Dal Chilla is a great choice.</h5>
          </div>

          <!-- 4. CHAAT -->
          <div class="menu-craving-card">
            <span class="craving-prompt">Craving Chaat?</span>
            <h5>Try our Samosa Chaat.</h5>
          </div>
        </div>
      </section>

      <!-- MENU CTA (Document Page 13) -->
      <section class="menu-cta-card">
        <h3>WHICH ONE WILL YOU TRY FIRST?</h3>
        <span class="sub-happy">COME HUNGRY. LEAVE HAPPY.</span>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
          <a href="{{ route('contact') }}" class="btn-amber-pill">ORDER ONLINE</a>
          <a href="{{ route('contact') }}" class="btn-spruce-pill" style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #ffffff;">VISIT OUR OUTLET</a>
        </div>
      </section>

      <!-- Document Pricing Disclaimer Note -->
      <div class="menu-disclaimer-note">
        Menu items, prices and availability may vary. Please check the current outlet menu before ordering.
      </div>

    </div>

    <!-- FULL-WIDTH BOTTOM PROMO BANNER (With Right-to-Center Dark Gradient and 10px Gap) -->
    <section class="menu-bottom-promo-exact" style="position: relative; width: 100%; min-height: 360px; overflow: hidden; margin-bottom: 10px; display: flex; align-items: center;">
      <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Original GPO Hazratganj Lucknow" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;">
      <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(8, 59, 60, 0.95) 0%, rgba(8, 59, 60, 0.8) 45%, rgba(8, 59, 60, 0.25) 100%);"></div>
      <div style="position: relative; z-index: 2; max-width: 1220px; margin: 0 auto; padding: 50px 24px; color: #ffffff;">
        <h3 style="font-family: var(--font-serif); font-size: 2.2rem; margin-bottom: 8px;">EXPERIENCE AWADHI EXCELLENCE</h3>
        <p style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--c-gold-amber); font-style: italic; margin-bottom: 14px;">Generations of flavour in every single bite</p>
        <p style="max-width: 580px; font-size: 0.95rem; line-height: 1.6; margin-bottom: 22px; color: rgba(255,255,255,0.88);">
          From Sant Ram Gupta ji's humble beginning in 1976 to today's iconic destination, Hazratganj's beloved Thandey Dahi Bade remain uncompromised in quality and taste.
        </p>
        <a href="{{ route('contact') }}" class="btn-amber-pill">FIND OUR OUTLET</a>
      </div>
    </section>
@endsection
