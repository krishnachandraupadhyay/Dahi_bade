@extends('layouts.frontend')

@section('title', 'Our Story | Original GPO Ke Thandey Dahi Bade')
@section('body_class', 'theme-parchment')

@section('content')
    <!-- INNER PAGE BANNER (Document Page 6) -->
    <section class="story-hero-exact">
      <img src="{{ asset('images/lucknow_heritage.jpg') }}" alt="Hazratganj Old Heritage Lucknow" class="bg">
      <div class="content">
        <h1>OUR STORY</h1>
        <h2 style="font-family: var(--font-serif); font-size: 1.4rem; color: var(--c-gold-amber); margin: 8px 0 12px; letter-spacing: 1px;">A LEGACY SERVED WITH LOVE</h2>
        <span style="display: inline-block; font-family: var(--font-serif); font-size: 0.95rem; color: rgba(255,255,255,0.9); margin-bottom: 12px;">Since 1976 | Lucknow</span>
        <p style="max-width: 720px; margin: 0 auto; font-size: 1rem; color: rgba(255,255,255,0.92); line-height: 1.6;">
          From a humble beginning near the GPO in Hazratganj to becoming a recognised name for Dahi Bade, our journey is built on tradition, taste and the love of our customers.
        </p>
      </div>
    </section>

    <div style="max-width: 1220px; margin: 0 auto; padding: 0 24px;">

      <!-- SECTION 01 — WHERE IT ALL BEGAN (Document Pages 6-7) -->
      <section class="legacy-exact-grid" style="margin-top: 50px;">
        <div class="legacy-arch-shape">
          <img src="{{ asset('images/lucknow_heritage.jpg') }}" alt="Historical Lucknow Hazratganj 1976">
        </div>

        <div>
          <h2 style="font-family: var(--font-serif); font-size: 2.3rem; color: var(--c-teal-deep); margin-bottom: 6px;">
            WHERE IT ALL BEGAN
          </h2>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 16px;">
            A Simple Beginning. An Unforgettable Taste.
          </h4>
          <p style="color: var(--c-text-main); font-size: 0.98rem; line-height: 1.7; margin-bottom: 14px;">
            The story of GPO Ke Thandey Dahi Bade began in 1976, when <strong>Sant Ram Gupta ji</strong> started serving Dahi Bade near the General Post Office in Hazratganj, Lucknow.
          </p>
          <p style="color: var(--c-text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 14px;">
            There was no complicated formula. Just a commitment to making delicious food and serving it with care.
          </p>
          <p style="color: var(--c-text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 14px;">
            The unique combination of soft Dahi Bade, chilled dahi and balanced flavours gradually attracted customers from across Lucknow.
          </p>
          <p style="color: var(--c-teal-deep); font-weight: 600; font-size: 1.05rem;">
            And slowly, a small food destination became a name people remembered.
          </p>
        </div>
      </section>

      <!-- SECTION 02 — THE GPO JOURNEY (Document Page 7) -->
      <section class="humble-legacy-dark" style="margin: 50px 0;">
        <img src="{{ asset('images/storefront.jpg') }}" alt="The GPO Journey Hazratganj" class="bg-photo">
        <div class="gradient-overlay"></div>
        <div class="text-pad">
          <div style="font-family: var(--font-serif); font-size: 0.88rem; font-weight: 700; color: var(--c-gold-amber); letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 6px;">THE GPO JOURNEY</div>
          <h3 style="font-size: 2.1rem; line-height: 1.25; margin-bottom: 14px;">FROM A HUMBLE FOOD DESTINATION TO A LUCKNOW FAVOURITE</h3>
          <p style="font-size: 1.05rem; line-height: 1.6; margin-bottom: 16px; color: rgba(255,255,255,0.92);">
            Over the years, GPO Ke Thandey Dahi Bade became associated with a simple food experience:
          </p>
          <div style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--c-gold-amber); font-style: italic; margin-bottom: 16px; font-weight: 600;">
            Come hungry. Have a plate. Leave happy.
          </div>
          <p style="font-size: 0.95rem; line-height: 1.6; color: rgba(255,255,255,0.85);">
            The brand’s identity has been shaped by generations of customers who have enjoyed our food, recommended us to others and returned with their families. That customer love is one of the most important chapters of the GPO story.
          </p>
        </div>
      </section>

      <!-- SECTION 03 — THE SECRET IS SIMPLE (Document Pages 7-8: 4 Pillars) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>THE SECRET IS SIMPLE</h2>
          <p style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-top: 4px;">
            GOOD FOOD DOESN’T NEED TO BE COMPLICATED.
          </p>
          <p>At GPO, we believe that the best food comes from respecting the basics.</p>
        </div>

        <div class="story-pillars-grid">
          <!-- 1. QUALITY INGREDIENTS -->
          <div class="story-pillar-card">
            <div class="story-pillar-icon">🌱</div>
            <h5>QUALITY INGREDIENTS</h5>
            <p>We focus on freshness and quality in the ingredients used in our preparations.</p>
          </div>

          <!-- 2. TRADITIONAL FLAVOURS -->
          <div class="story-pillar-card">
            <div class="story-pillar-icon">🏺</div>
            <h5>TRADITIONAL FLAVOURS</h5>
            <p>Our food remains connected to the familiar flavours that customers have loved over the years.</p>
          </div>

          <!-- 3. CAREFUL PREPARATION -->
          <div class="story-pillar-card">
            <div class="story-pillar-icon">🥣</div>
            <h5>CAREFUL PREPARATION</h5>
            <p>Every dish is prepared with attention to taste, presentation and consistency.</p>
          </div>

          <!-- 4. CUSTOMER FIRST -->
          <div class="story-pillar-card">
            <div class="story-pillar-icon">❤️</div>
            <h5>CUSTOMER FIRST</h5>
            <p>Our ultimate goal is simple — give every customer a reason to come back.</p>
          </div>
        </div>
      </section>

      <!-- SECTION 04 — WHY “THANDEY” DAHI BADE? (Document Page 8) -->
      <section class="why-thandey-wrap">
        <div>
          <h3 style="font-family: var(--font-serif); font-size: 2.1rem; color: var(--c-teal-deep); margin-bottom: 6px;">
            WHY “THANDEY” DAHI BADE?
          </h3>
          <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--c-terracotta-coral); font-style: italic; margin-bottom: 16px;">
            THE EXPERIENCE IS IN THE NAME.
          </h4>
          <p style="font-size: 0.98rem; color: var(--c-text-main); line-height: 1.65; margin-bottom: 12px;">
            Our signature Dahi Bade are known for their refreshing chilled character.
          </p>
          <p style="font-size: 0.95rem; color: var(--c-text-muted); line-height: 1.65; margin-bottom: 12px;">
            Soft lentil dumplings are complemented by creamy chilled dahi and a balanced blend of flavours and spices.
          </p>
          <p style="font-size: 0.95rem; color: var(--c-teal-deep); font-weight: 600;">
            It is this combination that creates the distinctive GPO experience.
          </p>
        </div>

        <div class="why-thandey-quad">
          <div class="why-thandey-badge">
            <span class="large-word">CREAMY.</span>
          </div>
          <div class="why-thandey-badge">
            <span class="large-word">CHILLED.</span>
          </div>
          <div class="why-thandey-badge">
            <span class="large-word">TANGY.</span>
          </div>
          <div class="why-thandey-badge">
            <span class="large-word">FLAVOURFUL.</span>
          </div>
        </div>
      </section>

      <!-- SECTION 05 — OUR VALUES (Document Pages 8-9: 6 Values) -->
      <section style="margin: 50px 0;">
        <div class="story-sec-title-wrap">
          <h2>OUR VALUES</h2>
          <p>The timeless principles that guide everything we prepare and serve.</p>
        </div>

        <div class="story-values-grid">
          <!-- 1. AUTHENTICITY -->
          <div class="story-value-card">
            <h5>01. AUTHENTICITY</h5>
            <p>We respect the food traditions and flavours that built our identity.</p>
          </div>

          <!-- 2. QUALITY -->
          <div class="story-value-card">
            <h5>02. QUALITY</h5>
            <p>We believe quality is essential to creating food people trust.</p>
          </div>

          <!-- 3. CONSISTENCY -->
          <div class="story-value-card">
            <h5>03. CONSISTENCY</h5>
            <p>Customers should receive the GPO experience they expect every time.</p>
          </div>

          <!-- 4. HYGIENE -->
          <div class="story-value-card">
            <h5>04. HYGIENE</h5>
            <p>We maintain attention to cleanliness and food preparation standards.</p>
          </div>

          <!-- 5. INNOVATION -->
          <div class="story-value-card">
            <h5>05. INNOVATION</h5>
            <p>While respecting our roots, we continue to embrace modern ways of serving customers.</p>
          </div>

          <!-- 6. LEGACY -->
          <div class="story-value-card">
            <h5>06. LEGACY</h5>
            <p>Our past gives us our identity. Our future gives us our responsibility.</p>
          </div>
        </div>
      </section>

      <!-- TRADITION MEETS TODAY -->
      <section class="tradition-today-banner">
        <h3>TRADITION MEETS TODAY</h3>
        <p>
          GPO Ke Thandey Dahi Bade carries a heritage rooted in Lucknow while embracing the convenience expected by today’s customers. From digital ordering to modern customer service and organised operations, we are taking a much-loved food experience forward without losing sight of where it began.
        </p>
        <div class="punch-tag">
          THE TASTE MAY BE TIMELESS. THE EXPERIENCE KEEPS EVOLVING.
        </div>
      </section>

      <!-- FINAL CTA (Document Page 9) -->
      <section class="story-final-cta">
        <h3>EXPERIENCE THE STORY FOR YOURSELF</h3>
        <p>Taste the Original GPO Ke Thandey Dahi Bade.</p>
        <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
          <a href="{{ route('contact') }}" class="btn-terracotta-pill">VISIT US</a>
          <a href="{{ route('menu') }}" class="btn-amber-pill">ORDER NOW</a>
        </div>
      </section>

    </div>

    <!-- FULL-WIDTH PANORAMIC LUCKNOW BANNER (10px Bottom Gap) -->
    <section class="lucknow-fullwidth-banner" style="margin-bottom: 10px;">
      <img src="{{ asset('images/lucknow_heritage.jpg') }}" alt="Lucknow Heritage A City of Nawabs A Taste of Tradition Since 1976">
      <div class="overlay">
        <h3>LUCKNOW</h3>
        <p>A City of Nawabs • A Taste of Tradition • Since 1976</p>
      </div>
    </section>
@endsection
