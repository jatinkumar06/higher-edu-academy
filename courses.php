<?php include 'include/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  :root {
    --navy:     #0d1f35;
    --navy-lt:  #162d4a;
    --cream:    #f9f6f0;
    --gold:     #c49a3c;
    --gold-lt:  #e0b95a;
    --slate:    #4a5568;
    --white:    #ffffff;
    --rule:     rgba(196,154,60,.22);
  }

  .courses-page {
    background: var(--cream);
    font-family: 'Outfit', sans-serif;
    min-height: 100vh;
  }

  /* ════════════════════════════════
     HERO BANNER
  ════════════════════════════════ */
  .cs-hero {
    background: var(--navy);
    position: relative;
    overflow: hidden;
    padding: 5rem clamp(1.5rem, 8vw, 6rem) 4.5rem;
    text-align: center;
  }

  .cs-hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
      repeating-linear-gradient(45deg,
        rgba(196,154,60,.04) 0px, rgba(196,154,60,.04) 1px,
        transparent 1px, transparent 40px),
      repeating-linear-gradient(-45deg,
        rgba(196,154,60,.04) 0px, rgba(196,154,60,.04) 1px,
        transparent 1px, transparent 40px);
  }

  .cs-hero__bg-text {
    position: absolute;
    bottom: -2rem; right: -1rem;
    font-family: 'Playfair Display', serif;
    font-size: clamp(8rem, 20vw, 16rem);
    font-weight: 700;
    color: rgba(196,154,60,.05);
    line-height: 1;
    pointer-events: none;
    user-select: none;
    white-space: nowrap;
  }

  .cs-hero__eyebrow {
    font-size: 11px;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1rem;
    animation: fadeDown .6s .1s both ease;
  }

  .cs-hero__title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.2rem, 6vw, 4.5rem);
    font-weight: 700;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 1.2rem;
    animation: fadeDown .7s .2s both ease;
  }

  .cs-hero__title em {
    font-style: italic;
    color: var(--gold-lt);
  }

  .cs-hero__sub {
    font-size: clamp(.95rem, 1.8vw, 1.15rem);
    font-weight: 300;
    color: rgba(255,255,255,.6);
    max-width: 520px;
    margin: 0 auto 2rem;
    line-height: 1.7;
    animation: fadeDown .7s .3s both ease;
  }

  .cs-hero__rule {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .8rem;
    animation: fadeDown .6s .4s both ease;
  }
  .cs-hero__rule span { width: 60px; height: 1px; background: var(--rule); display: block; }
  .cs-hero__rule i    { width: 7px; height: 7px; background: var(--gold); transform: rotate(45deg); display: block; flex-shrink: 0; }

  /* ════════════════════════════════
     SECTION WRAPPER
  ════════════════════════════════ */
  .cs-section {
    padding: 4rem clamp(1rem, 5vw, 3rem) 6rem;
    max-width: 1280px;
    margin: 0 auto;
  }

  /* ════════════════════════════════
     CARD GRID
  ════════════════════════════════ */
  .cs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
  }

  /* ── Individual Card ── */
  .cs-card {
    background: var(--white);
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(13,31,53,.07);
    display: flex;
    flex-direction: column;
    transition: transform .35s cubic-bezier(.22,.68,0,1.2),
                box-shadow .35s ease;
    animation: fadeUp .55s both ease;
    position: relative;
  }

  .cs-card:nth-child(1) { animation-delay: .05s; }
  .cs-card:nth-child(2) { animation-delay: .12s; }
  .cs-card:nth-child(3) { animation-delay: .19s; }
  .cs-card:nth-child(4) { animation-delay: .26s; }
  .cs-card:nth-child(5) { animation-delay: .33s; }
  .cs-card:nth-child(6) { animation-delay: .40s; }

  .cs-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(13,31,53,.14);
  }

  /* gold left accent on hover */
  .cs-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 3px; height: 100%;
    background: linear-gradient(to bottom, var(--gold), var(--gold-lt));
    transform: scaleY(0);
    transform-origin: top;
    transition: transform .35s ease;
  }
  .cs-card:hover::before { transform: scaleY(1); }

  /* ── Image ── */
  .cs-card__img-wrap {
    position: relative;
    overflow: hidden;
    height: 300px;   /* ✅ increased from 220px */
    flex-shrink: 0;
  }

  .cs-card__img {
    display: block;
    width: 100%;
    height: 350px;   /* ✅ increased from 220px */
    object-fit: cover;
    transition: transform .55s ease;
    vertical-align: top;
  }
  .cs-card:hover .cs-card__img { transform: scale(1.05); }

  /* category badge */
  .cs-card__badge {
    position: absolute;
    top: .85rem; right: .85rem;
    background: var(--navy);
    color: var(--gold-lt);
    font-size: 9px;
    font-weight: 500;
    letter-spacing: .14em;
    text-transform: uppercase;
    padding: .3rem .7rem;
    border-radius: 2px;
    border: 1px solid rgba(196,154,60,.3);
  }

  /* ── Card Body ── */
  .cs-card__body {
    padding: 1.5rem 1.6rem 1.8rem;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .cs-card__name {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1rem, 2vw, 1.25rem);
    font-weight: 600;
    color: var(--navy);
    line-height: 1.3;
    margin-bottom: .75rem;
  }

  .cs-card__rule {
    width: 32px; height: 2px;
    background: var(--gold);
    margin-bottom: 1rem;
    transition: width .3s ease;
  }
  .cs-card:hover .cs-card__rule { width: 56px; }

  .cs-card__desc {
    font-size: 14px;
    line-height: 1.75;
    color: var(--slate);
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-align: justify;
    hyphens: auto;
    margin-bottom: 1.5rem;
  }

  /* ── CTA ── */
  .cs-card__cta {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    font-family: 'Outfit', sans-serif;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--navy);
    text-decoration: none;
    border: 1px solid rgba(13,31,53,.2);
    padding: .6rem 1.3rem;
    border-radius: 2px;
    align-self: flex-start;
    transition: background .22s, color .22s, border-color .22s;
    position: relative;
    overflow: hidden;
  }
  .cs-card__cta::before {
    content: '';
    position: absolute; inset: 0;
    background: var(--navy);
    transform: translateX(-100%);
    transition: transform .28s ease;
    z-index: 0;
  }
  .cs-card__cta span,
  .cs-card__cta svg { position: relative; z-index: 1; }
  .cs-card:hover .cs-card__cta::before { transform: translateX(0); }
  .cs-card:hover .cs-card__cta { color: #fff; border-color: var(--navy); }
  .cs-card__cta svg { transition: transform .22s; }
  .cs-card:hover .cs-card__cta svg { transform: translateX(4px); }

  /* ════════════════════════════════
     ANIMATIONS
  ════════════════════════════════ */
  @keyframes fadeDown {
    from { opacity: 0; transform: translateY(-16px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ════════════════════════════════
     RESPONSIVE
  ════════════════════════════════ */
  @media (max-width: 600px) {
    .cs-grid { grid-template-columns: 1fr; }
    .cs-card__img-wrap { height: 265px; }  /* ✅ increased from 200px */
    .cs-card__img { height: 310px; }       /* ✅ increased from 200px */
  }
</style>

<div class="courses-page">

  <!-- ════ HERO ════ -->
  <div class="cs-hero">
    <!-- <div class="cs-hero__bg-text">Courses</div> -->
    <div class="cs-hero__eyebrow">T9 Online Education</div>
    <h1 class="cs-hero__title">Choose Your <em>Path</em></h1>
    <p class="cs-hero__sub">Choose the path that fits your future — explore the programmes that shape careers.</p>
    <div class="cs-hero__rule">
      <span></span><i></i><span></span>
    </div>
  </div>

  <!-- ════ GRID ════ -->
  <div class="cs-section">
    <div class="cs-grid">

      <!-- Medical -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="b2.jpeg" class="cs-card__img" alt="Medical">
      
        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Medical</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Medical is a career-focused field that helps students build a future in healthcare and patient care.
            At T9 Online Education, we guide students for courses in Nursing, Pharmacy, Lab Technology, and Hospital Management.</p>
          <a href="Medical1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Engineering -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="b3.jpeg" class="cs-card__img" alt="Engineering">
  
        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Engineering</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Engineering is a career-focused field that builds technical skills and innovation for a successful future.
            At T9 Online Education, we guide students toward top engineering courses and career opportunities.</p>
          <a href="engineering1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Management -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="mba.jpeg" class="cs-card__img" alt="Management">
          
        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Management</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Management is a career-focused field that builds leadership and decision-making skills.
            At T9 Online Education, we guide students toward careers in Business, HR, Marketing, and Project Management.</p>
          <a href="management1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Commerce -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="b4.png" class="cs-card__img" alt="Commerce">
        
        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Commerce</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Commerce is a career-focused field that builds knowledge in business, finance, and accounts.
            At T9 Online Education, we guide students toward commerce courses and strong career opportunities.</p>
          <a href="commerce1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Law -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="law.png" class="cs-card__img" alt="Law">
        
        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Law</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Law is a career-focused field that develops legal knowledge, critical thinking, and justice skills.
            At T9 Online Education, we guide students toward law courses and successful legal careers.</p>
          <a href="law1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Dental -->
      <div class="cs-card">
        <div class="cs-card__img-wrap">
          <img src="dental.png" class="cs-card__img" alt="Dental">

        </div>
        <div class="cs-card__body">
          <h3 class="cs-card__name">Dental</h3>
          <div class="cs-card__rule"></div>
          <p class="cs-card__desc">Dental is a career-focused field that builds skills in oral healthcare and patient care.
            At T9 Online Education, we guide students toward dental courses and professional career opportunities.</p>
          <a href="dental1.php" class="cs-card__cta">
            <span>View Courses</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

    </div>
  </div>

</div>

<?php include 'include/footer.php'; ?>