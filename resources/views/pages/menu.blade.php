@extends('layouts.frontend')

@section('title', 'Menu | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-aqua')

@section('styles')
<style>
  .menu-dishes-row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -12px;
    margin-left: -12px;
  }
  .menu-dish-col, .col-sm-3 {
    flex: 0 0 auto;
    width: 25%;
    padding-right: 12px;
    padding-left: 12px;
    margin-bottom: 24px;
    display: flex;
  }
  @media (max-width: 991px) {
    .menu-dish-col, .col-sm-3 {
      width: 50%;
    }
  }
  @media (max-width: 576px) {
    .menu-dish-col, .col-sm-3 {
      width: 100%;
    }
  }

  .menu-vertical-card {
    background: #ffffff;
    border: 1px solid rgba(8, 59, 60, 0.1);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(8, 59, 60, 0.06);
    display: flex;
    flex-direction: column;
    width: 100%;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  }
  .menu-vertical-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(8, 59, 60, 0.12);
    border-color: var(--c-terracotta-coral, #c96c4b);
  }
  .menu-card-img-wrap {
    position: relative;
    width: 100%;
    height: 195px;
    overflow: hidden;
    background: #f1f5f9;
  }
  .menu-card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .menu-vertical-card:hover .menu-card-img-wrap img {
    transform: scale(1.06);
  }
  .menu-card-tag-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(8, 59, 60, 0.88);
    backdrop-filter: blur(4px);
    color: #ecc67d;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 9999px;
    border: 1px solid rgba(236, 198, 125, 0.3);
  }
  .menu-card-content {
    padding: 18px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    justify-content: space-between;
  }
  .menu-card-title {
    font-family: var(--font-serif);
    font-size: 1.32rem;
    font-weight: 700;
    color: var(--c-teal-deep, #083b3c);
    margin: 0 0 4px;
    line-height: 1.25;
  }
  .menu-card-subtitle {
    font-size: 0.76rem;
    font-weight: 700;
    color: var(--c-terracotta-coral, #c96c4b);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
  }
  .menu-card-desc {
    font-size: 0.84rem;
    color: var(--c-text-main, #334155);
    line-height: 1.45;
    margin-bottom: 12px;
  }
  .menu-mini-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-bottom: 12px;
  }
  .menu-mini-pill {
    font-size: 0.68rem;
    font-weight: 600;
    background: #eef7f6;
    color: var(--c-teal-deep, #083b3c);
    padding: 2px 8px;
    border-radius: 9999px;
  }
  .menu-variants-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 6px 10px;
    margin-bottom: 14px;
  }
  .menu-variant-line {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.72rem;
    padding: 3px 0;
    border-bottom: 1px dashed #e2e8f0;
  }
  .menu-variant-line:last-child {
    border-bottom: none;
  }
  .menu-variant-line strong {
    color: var(--c-teal-deep, #083b3c);
    font-weight: 700;
  }
  .menu-variant-line span {
    color: #64748b;
    font-size: 0.7rem;
  }
  .menu-card-btn {
    display: block;
    width: 100%;
    text-align: center;
    background: var(--c-terracotta-coral, #c96c4b);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 0.8px;
    padding: 9px 14px;
    border-radius: 9999px;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 3px 10px rgba(201, 108, 75, 0.25);
    margin-top: auto;
  }
  .menu-card-btn:hover {
    background: #b15535;
    color: #ffffff;
    box-shadow: 0 5px 14px rgba(201, 108, 75, 0.35);
  }
  .menu-card-btn-cinnamon {
    background: #083b3c;
    box-shadow: 0 3px 10px rgba(8, 59, 60, 0.25);
  }
  .menu-card-btn-cinnamon:hover {
    background: #0d4b4c;
    box-shadow: 0 5px 14px rgba(8, 59, 60, 0.35);
  }
</style>
@endsection

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

    <div style="max-width: 1220px; margin: 0 auto; padding: 40px 24px 0;">

      <!-- 4 DISHES IN COL-SM-3 ROW -->
      <section style="margin-bottom: 40px;">
        <div style="text-align: center; margin-bottom: 32px;">
          <span style="font-size: 0.82rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--c-terracotta-coral); display: block; margin-bottom: 6px;">OUR SPECIALITIES</span>
          <h3 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--c-teal-deep); margin-bottom: 6px;">FEATURED MENU DISHES</h3>
          <p style="color: var(--c-text-muted); font-size: 0.95rem; margin: 0;">Traditional flavours prepared with care and heritage recipes since 1976.</p>
        </div>

        <div class="row g-4 menu-dishes-row">

          <!-- 1. DAHI BADE (col-sm-3) -->
          <div class="col-lg-3 col-md-6 col-sm-3 col-12 menu-dish-col">
            <div class="menu-vertical-card">
              <div class="menu-card-img-wrap">
                <img src="{{ asset('images/dahi_vada.jpg') }}" alt="Signature Dahi Bade Original GPO">
                <span class="menu-card-tag-badge">SIGNATURE DISH</span>
              </div>
              <div class="menu-card-content">
                <div>
                  <div class="menu-card-subtitle">THE ORIGINAL GPO EXPERIENCE</div>
                  <h4 class="menu-card-title">DAHI BADE</h4>
                  <p class="menu-card-desc">
                    Soft lentil dumplings served with smooth chilled yogurt and a balanced blend of traditional spices.
                  </p>
                  <div class="menu-mini-pills">
                    <span class="menu-mini-pill">Creamy</span>
                    <span class="menu-mini-pill">Tangy</span>
                    <span class="menu-mini-pill">Refreshing</span>
                  </div>
                  <div class="menu-variants-box">
                    <div class="menu-variant-line">
                      <strong>Full Plate</strong>
                      <span>Full Experience</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Half Plate</strong>
                      <span>Lighter Craving</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Packed Box</strong>
                      <span>Takeaway Ready</span>
                    </div>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="menu-card-btn">ORDER NOW</a>
              </div>
            </div>
          </div>

          <!-- 2. MOONG DAL CHILLA (col-sm-3) -->
          <div class="col-lg-3 col-md-6 col-sm-3 col-12 menu-dish-col">
            <div class="menu-vertical-card">
              <div class="menu-card-img-wrap">
                <img src="{{ asset('images/aloo_tikki.jpg') }}" alt="Moong Dal Chilla Freshly Prepared">
                <span class="menu-card-tag-badge">FROM OUR KITCHEN</span>
              </div>
              <div class="menu-card-content">
                <div>
                  <div class="menu-card-subtitle">FRESH & SAVOURY</div>
                  <h4 class="menu-card-title">MOONG DAL CHILLA</h4>
                  <p class="menu-card-desc">
                    Crispy and savoury Moong Dal Chilla made from moong dal batter and seasoned to perfection.
                  </p>
                  <div class="menu-mini-pills">
                    <span class="menu-mini-pill">Crispy</span>
                    <span class="menu-mini-pill">Savoury</span>
                    <span class="menu-mini-pill">Fresh Batter</span>
                  </div>
                  <div class="menu-variants-box">
                    <div class="menu-variant-line">
                      <strong>Fresh Prepared</strong>
                      <span>Made to Order</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Best With</strong>
                      <span>Green Chutney</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Ideal For</strong>
                      <span>Snack & Breakfast</span>
                    </div>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="menu-card-btn menu-card-btn-cinnamon">ORDER NOW</a>
              </div>
            </div>
          </div>

          <!-- 3. SAMOSA (col-sm-3) -->
          <div class="col-lg-3 col-md-6 col-sm-3 col-12 menu-dish-col">
            <div class="menu-vertical-card">
              <div class="menu-card-img-wrap">
                <img src="{{ asset('images/chaat.jpg') }}" alt="Crispy Golden Samosa">
                <span class="menu-card-tag-badge">TIMELESS FAVOURITE</span>
              </div>
              <div class="menu-card-content">
                <div>
                  <div class="menu-card-subtitle">GOLDEN & CRISPY</div>
                  <h4 class="menu-card-title">SAMOSA</h4>
                  <p class="menu-card-desc">
                    Golden, crispy and filled with a savoury mixture of spiced potatoes and authentic herbs.
                  </p>
                  <div class="menu-mini-pills">
                    <span class="menu-mini-pill">Golden</span>
                    <span class="menu-mini-pill">Crispy</span>
                    <span class="menu-mini-pill">Spiced Potato</span>
                  </div>
                  <div class="menu-variants-box">
                    <div class="menu-variant-line">
                      <strong>Crisp Crust</strong>
                      <span>Fried Golden</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Spiced Core</strong>
                      <span>Rich Potato Filling</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Best Companion</strong>
                      <span>Chai / Snack Time</span>
                    </div>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="menu-card-btn menu-card-btn-cinnamon">ORDER NOW</a>
              </div>
            </div>
          </div>

          <!-- 4. SAMOSA CHAAT (col-sm-3) -->
          <div class="col-lg-3 col-md-6 col-sm-3 col-12 menu-dish-col">
            <div class="menu-vertical-card">
              <div class="menu-card-img-wrap">
                <img src="{{ asset('images/chaat.jpg') }}" alt="Samosa Chaat with Chutneys and Curd">
                <span class="menu-card-tag-badge">CHAAT FAVOURITE</span>
              </div>
              <div class="menu-card-content">
                <div>
                  <div class="menu-card-subtitle">TANGY & SAVOURY</div>
                  <h4 class="menu-card-title">SAMOSA CHAAT</h4>
                  <p class="menu-card-desc">
                    Crispy samosas combined with tangy chutneys, creamy yogurt, fresh herbs and aromatic spices.
                  </p>
                  <div class="menu-mini-pills">
                    <span class="menu-mini-pill">Crispy</span>
                    <span class="menu-mini-pill">Tangy</span>
                    <span class="menu-mini-pill">Creamy Curd</span>
                  </div>
                  <div class="menu-variants-box">
                    <div class="menu-variant-line">
                      <strong>Topped With</strong>
                      <span>Sweet & Green Chutney</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Texture</strong>
                      <span>Crunchy & Creamy</span>
                    </div>
                    <div class="menu-variant-line">
                      <strong>Lucknow Style</strong>
                      <span>Authentic GPO Taste</span>
                    </div>
                  </div>
                </div>
                <a href="{{ route('contact') }}" class="menu-card-btn">ORDER NOW</a>
              </div>
            </div>
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
