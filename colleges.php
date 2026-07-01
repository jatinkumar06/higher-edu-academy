<?php
include 'include/header.php';
include "connection.php";

$sql = "SELECT * FROM colleges ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">

<style>
  :root {
    --navy:    #0d1f35;
    --navy-lt: #162d4a;
    --cream:   #f9f6f0;
    --gold:    #c49a3c;
    --gold-lt: #e0b95a;
    --slate:   #4a5568;
    --rule:    rgba(196,154,60,.22);
  }

  /* ── Base ── */
  .college-list-page {
    background: var(--cream);
    font-family: 'Outfit', sans-serif;
    min-height: 100vh;
  }

  /* ════════════════════════════════
     HERO BANNER
  ════════════════════════════════ */
  .cl-hero {
    background: var(--navy);
    position: relative;
    overflow: hidden;
    padding: 5rem clamp(1.5rem, 8vw, 6rem) 4.5rem;
    text-align: center;
  }

  /* geometric pattern background */
  .cl-hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
      repeating-linear-gradient(
        45deg,
        rgba(196,154,60,.04) 0px,
        rgba(196,154,60,.04) 1px,
        transparent 1px,
        transparent 40px
      ),
      repeating-linear-gradient(
        -45deg,
        rgba(196,154,60,.04) 0px,
        rgba(196,154,60,.04) 1px,
        transparent 1px,
        transparent 40px
      );
  }

  /* large decorative background text */
  .cl-hero__bg-text {
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

  .cl-hero__eyebrow {
    font-size: 11px;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1rem;
    animation: fadeDown .6s .1s both ease;
  }

  .cl-hero__title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.2rem, 6vw, 4.5rem);
    font-weight: 700;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 1.2rem;
    animation: fadeDown .7s .2s both ease;
  }

  .cl-hero__title em {
    font-style: italic;
    color: var(--gold-lt);
  }

  .cl-hero__sub {
    font-size: clamp(.95rem, 1.8vw, 1.15rem);
    font-weight: 300;
    color: rgba(255,255,255,.6);
    max-width: 520px;
    margin: 0 auto 2rem;
    line-height: 1.7;
    animation: fadeDown .7s .3s both ease;
  }

  /* gold rule */
  .cl-hero__rule {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .8rem;
    animation: fadeDown .6s .4s both ease;
  }
  .cl-hero__rule span {
    width: 60px; height: 1px;
    background: var(--rule);
    display: block;
  }
  .cl-hero__rule i {
    width: 7px; height: 7px;
    background: var(--gold);
    transform: rotate(45deg);
    display: block;
    flex-shrink: 0;
  }

  /* ════════════════════════════════
     SECTION WRAPPER
  ════════════════════════════════ */
  .cl-section {
    padding: 4rem clamp(1rem, 5vw, 3rem) 6rem;
    max-width: 1280px;
    margin: 0 auto;
  }

  /* ════════════════════════════════
     CARD GRID
  ════════════════════════════════ */
  .cl-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
  }

  /* ── Individual Card ── */
  .cl-card {
    background: #fff;
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

  /* stagger each card */
  .cl-card:nth-child(1)  { animation-delay: .05s; }
  .cl-card:nth-child(2)  { animation-delay: .12s; }
  .cl-card:nth-child(3)  { animation-delay: .19s; }
  .cl-card:nth-child(4)  { animation-delay: .26s; }
  .cl-card:nth-child(5)  { animation-delay: .33s; }
  .cl-card:nth-child(6)  { animation-delay: .40s; }
  .cl-card:nth-child(n+7){ animation-delay: .47s; }

  .cl-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 48px rgba(13,31,53,.14);
  }

  /* gold left accent on hover */
  .cl-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 3px; height: 100%;
    background: linear-gradient(to bottom, var(--gold), var(--gold-lt));
    transform: scaleY(0);
    transform-origin: top;
    transition: transform .35s ease;
  }
  .cl-card:hover::before { transform: scaleY(1); }

  /* ── Image wrapper ── */
  .cl-card__img-wrap {
    position: relative;
    overflow: hidden;
    height: 220px;
    flex-shrink: 0;
  }

  .cl-card__img {
    display: block;
    width: 100%;
    height: 220px;
    object-fit: fill;
    vertical-align: top;
    transition: transform .55s ease;
  }
  .cl-card:hover .cl-card__img { transform: scale(1.04); }

  /* college type badge */
  .cl-card__badge {
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
  .cl-card__body {
    padding: 1.5rem 1.6rem 1.8rem;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .cl-card__name {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1rem, 2vw, 1.2rem);
    font-weight: 600;
    color: var(--navy);
    line-height: 1.3;
    margin-bottom: .75rem;
  }

  /* thin gold rule under title */
  .cl-card__rule {
    width: 32px; height: 2px;
    background: var(--gold);
    margin-bottom: 1rem;
    transition: width .3s ease;
  }
  .cl-card:hover .cl-card__rule { width: 56px; }

  .cl-card__desc {
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

  /* ── CTA button ── */
  .cl-card__cta {
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
  .cl-card__cta::before {
    content: '';
    position: absolute; inset: 0;
    background: var(--navy);
    transform: translateX(-100%);
    transition: transform .28s ease;
    z-index: 0;
  }
  .cl-card__cta span, .cl-card__cta svg { position: relative; z-index: 1; }
  .cl-card:hover .cl-card__cta::before { transform: translateX(0); }
  .cl-card:hover .cl-card__cta { color: #fff; border-color: var(--navy); }

  .cl-card__cta svg { transition: transform .22s; }
  .cl-card:hover .cl-card__cta svg { transform: translateX(4px); }

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
     EMPTY STATE
  ════════════════════════════════ */
  .cl-empty {
    text-align: center;
    padding: 6rem 2rem;
    color: var(--slate);
  }
  .cl-empty h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    color: var(--navy);
    margin-bottom: .5rem;
  }

  /* ════════════════════════════════
     RESPONSIVE
  ════════════════════════════════ */
  @media (max-width: 600px) {
    .cl-grid { grid-template-columns: 1fr; }
    .cl-card__img-wrap { height: 200px; }
  }
</style>

<div class="college-list-page">

  <!-- ════ HERO ════ -->
  <div class="cl-hero">
    <!-- <div class="cl-hero__bg-text">Colleges</div> -->
    <div class="cl-hero__eyebrow">Explore &amp; Discover</div>
    <h1 class="cl-hero__title">Find Your <em>College</em></h1>
    <p class="cl-hero__sub">"One decision, Endless possibilities." — Begin your journey with the institution that shapes your future.</p>
    <div class="cl-hero__rule">
      <span></span><i></i><span></span>
    </div>
  </div>

  <!-- ════ GRID ════ -->
  <div class="cl-section">
    <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="cl-grid">

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="cl-card">

          <!-- image -->
          <div class="cl-card__img-wrap">
            <img
              src="admin/uploads/<?php echo htmlspecialchars($row['college_photo']); ?>"
              class="cl-card__img"
              alt="<?php echo htmlspecialchars($row['college_name']); ?>">
            <!-- ✅ College type shown as badge -->
            <span class="cl-card__badge"><?php echo htmlspecialchars($row['college_type']); ?></span>
          </div>

          <!-- body -->
          <div class="cl-card__body">
            <h3 class="cl-card__name"><?php echo htmlspecialchars($row['college_name']); ?></h3>
            <div class="cl-card__rule"></div>
            <p class="cl-card__desc"><?php echo htmlspecialchars($row['college_details']); ?></p>
            <a href="college-details.php?id=<?php echo (int)$row['id']; ?>" class="cl-card__cta">
              <span>View Profile</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>
          </div>

        </div>
      <?php endwhile; ?>

    </div>
    <?php else: ?>
      <div class="cl-empty">
        <h3>No Colleges Found</h3>
        <p>Check back soon — more institutions are being added.</p>
      </div>
    <?php endif; ?>
  </div>

</div>

<?php include 'include/footer.php'; ?>