<?php
include "connection.php";
include "include/header.php";

$id = intval($_GET['id']);
$sql = "SELECT * FROM university WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<style>
  :root {
    --ink: #1a1814;
    --paper: #f7f4ef;
    --gold: #b8913a;
    --gold-lt: #d4aa5a;
    --muted: #7a7468;
    --rule: rgba(184, 145, 58, .25);
    --wa: #25d366;
  }

  *,
  *::before,
  *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  .univ-page {
    background: var(--paper);
    color: var(--ink);
    font-family: 'DM Sans', sans-serif;
    min-height: 100vh;
  }

  /* ══════════════════════════════════════
     HEADING BANNER — sits ABOVE the image
  ══════════════════════════════════════ */
  .univ-header {
    background: rgb(18 58 98);
    padding: 5px;
    display: flex;
    align-items: center;
    gap: 1.4rem;
    position: relative;
    overflow: hidden;
    margin: 0;
    animation: fadeDown .7s .05s both ease;
  }

  .univ-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg,
        transparent 0%, var(--gold) 25%,
        var(--gold-lt) 50%, var(--gold) 75%, transparent 100%);
  }

  .univ-header__wm {
    position: absolute;
    right: -1rem;
    top: 50%;
    transform: translateY(-50%);
    font-family: 'Cormorant Garamond', serif;
    font-size: 5.5rem;
    font-weight: 600;
    letter-spacing: .22em;
    color: rgba(184, 145, 58, .07);
    pointer-events: none;
    user-select: none;
    white-space: nowrap;
  }

  .univ-header__logo {
    width: clamp(64px, 10vw, 96px);
    height: clamp(64px, 10vw, 96px);
    object-fit: fill;
    border-radius: 50%;
    background: rgba(247, 244, 239, .07);
    border: 2px solid rgba(184, 145, 58, .55);
    padding: 8px;
    flex-shrink: 0;
    animation: fadeDown .7s .2s both ease;
  }

  .univ-header__text {
    flex: 1;
    min-width: 0;
  }

  .univ-header__title {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(1.4rem, 3.8vw, 2.6rem);
    font-weight: 300;
    color: #f7f4ef;
    line-height: 1.15;
    letter-spacing: .01em;
    animation: fadeDown .7s .38s both ease;
  }

  .univ-header__title em {
    font-style: italic;
    color: var(--gold-lt);
  }

  /* ══════════════════════════════════════
     UNIVERSITY IMAGE — max-height + fill
  ══════════════════════════════════════ */
  .univ-hero {
    width: 100%;
    max-height: 700px;
    overflow: hidden;
    line-height: 0;
    font-size: 0;
    display: block;
    margin: 0;
    padding: 0;
    animation: fadeUp .9s .5s both ease;
  }

  .univ-hero__img {
    display: block;
    width: 100%;
    height: 500px;
    object-fit: fill;
    margin: 0;
    padding: 0;
    vertical-align: top;
  }

  /* ══════════════════════════════════════
     BODY CONTENT
  ══════════════════════════════════════ */
  .univ-body {
    max-width: 840px;
    margin: 0 auto;
    padding: 0 clamp(1.5rem, 6vw, 3rem) 6rem;
  }

  .deco-rule {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 3rem 0 2rem;
    animation: fadeUp .6s .65s both ease;
  }

  .deco-rule::before,
  .deco-rule::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--rule);
  }

  .deco-rule__diamond {
    width: 8px;
    height: 8px;
    background: var(--gold);
    transform: rotate(45deg);
    flex-shrink: 0;
  }

  .univ-intro {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(1.05rem, 2.2vw, 1.35rem);
    font-weight: 400;
    font-style: italic;
    color: var(--ink);
    line-height: 1.75;
    border-left: 3px solid var(--gold);
    padding-left: 1.5rem;
    margin-bottom: 2.5rem;
    animation: fadeUp .6s .75s both ease;
  }

  .univ-details p {
    font-size: clamp(15px, 1.6vw, 16.5px);
    line-height: 1.9;
    color: #3a3830;
    margin-bottom: 1.6rem;
    text-align: justify;
    hyphens: auto;
    animation: fadeUp .5s both ease;
  }

  .univ-details p:nth-child(1) {
    animation-delay: .8s;
  }

  .univ-details p:nth-child(2) {
    animation-delay: .9s;
  }

  .univ-details p:nth-child(3) {
    animation-delay: 1s;
  }

  .univ-details p:nth-child(n+4) {
    animation-delay: 1.1s;
  }

  .univ-details p:first-child::first-letter {
    font-family: 'Cormorant Garamond', serif;
    font-size: 4.2em;
    font-weight: 600;
    color: var(--gold);
    float: left;
    line-height: .78;
    margin: .06em .14em 0 0;
  }

  .univ-footer-strip {
    border-top: 1px solid var(--rule);
    padding-top: 2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    animation: fadeUp .5s 1.15s both ease;
  }

  .btn-back {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: var(--gold);
    border: 1px solid var(--rule);
    padding: .6rem 1.4rem;
    border-radius: 2px;
    text-decoration: none;
    transition: background .2s, color .2s;
  }

  .btn-back:hover {
    background: var(--gold);
    color: var(--paper);
  }

  .btn-back svg {
    transition: transform .2s;
  }

  .btn-back:hover svg {
    transform: translateX(-3px);
  }

  /* Enquiry trigger button */
  .btn-enquiry {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: #fff;
    background: linear-gradient(135deg, #0d6efd, #123a62);
    border: none;
    padding: .6rem 1.6rem;
    border-radius: 2px;
    cursor: pointer;
    transition: opacity .2s, transform .2s;
  }

  .btn-enquiry:hover {
    opacity: .88;
    transform: translateY(-1px);
  }

  /* ══════════════════════════════════════
     ENQUIRY MODAL STYLES
  ══════════════════════════════════════ */
  .enquiry-modal {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
  }

  .enquiry-modal .modal-header {
    background: linear-gradient(135deg, #0d6efd, #123a62);
    border-bottom: none;
  }

  .enquiry-modal .form-control {
    border-radius: 10px;
    padding: 10px 14px;
  }

  .btn-gradient {
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
    transition: .3s ease;
  }

  .btn-gradient:hover {
    opacity: .9;
    transform: translateY(-1px);
  }

  /* ══════════════════════════════════════
     FLOATING WHATSAPP BUTTON
  ══════════════════════════════════════ */
  .wa-float {
    position: fixed;
    right: 1.5rem;
    bottom: 2rem;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .5rem;
    text-decoration: none;
    animation: waPop .7s 1.5s both cubic-bezier(.34, 1.56, .64, 1);
  }

  .wa-float__btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--wa);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 24px rgba(37, 211, 102, .4), 0 2px 8px rgba(0, 0, 0, .18);
    transition: transform .25s, box-shadow .25s;
    position: relative;
  }

  .wa-float__btn::before {
    content: '';
    position: absolute;
    inset: -7px;
    border-radius: 50%;
    border: 2.5px solid rgba(37, 211, 102, .5);
    animation: waPulse 2.4s ease-out infinite;
  }

  .wa-float:hover .wa-float__btn {
    transform: scale(1.1);
    box-shadow: 0 10px 32px rgba(37, 211, 102, .55), 0 4px 12px rgba(0, 0, 0, .22);
  }

  .wa-float__label {
    background: var(--ink);
    color: #f7f4ef;
    font-size: 11.5px;
    font-weight: 500;
    letter-spacing: .04em;
    padding: .3rem .85rem;
    border-radius: 20px;
    white-space: nowrap;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .22);
    opacity: 0;
    transform: translateY(5px);
    transition: opacity .22s, transform .22s;
    pointer-events: none;
  }

  .wa-float:hover .wa-float__label {
    opacity: 1;
    transform: translateY(0);
  }

  /* ── keyframes ── */
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(18px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeDown {
    from {
      opacity: 0;
      transform: translateY(-14px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes waPop {
    from {
      opacity: 0;
      transform: scale(.4) translateY(30px);
    }

    to {
      opacity: 1;
      transform: scale(1) translateY(0);
    }
  }

  @keyframes waPulse {
    0% {
      transform: scale(1);
      opacity: .75;
    }

    70% {
      transform: scale(1.55);
      opacity: 0;
    }

    100% {
      transform: scale(1.55);
      opacity: 0;
    }
  }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .univ-hero {
      max-height: 260px;
    }

    .univ-hero__img {
      height: 260px;
    }
  }

  @media (max-width: 600px) {
    .univ-header {
      gap: 1rem;
    }

    .univ-details p:first-child::first-letter {
      font-size: 3.2em;
    }

    .wa-float {
      right: 1rem;
      bottom: 1.5rem;
    }

    .wa-float__btn {
      width: 52px;
      height: 52px;
    }

    .univ-hero {
      max-height: 220px;
    }

    .univ-hero__img {
      height: 220px;
    }
  }
</style>

<!-- ════ ENQUIRY MODAL ════ -->
<div class="modal fade" id="enquiryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content enquiry-modal">

      <!-- Header -->
      <div class="modal-header text-white" style="text-align:center !important;">
        <h5 class="modal-title" style="color:white; text-align:center !important;">
          <i class="bi bi-chat-dots-fill me-2"></i> Enquiry Form
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="" method="POST">

          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Courses</label>
            <select name="subject" class="form-control" required>
              <option value="" disabled selected>Select course</option>
              <option value="Management">Management</option>
              <option value="Engineering">Engineering</option>
              <option value="Medical">Medical</option>
              <option value="Dental">Dental</option>
              <option value="Commerce">Commerce</option>
              <option value="Law">Law</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="3" placeholder="Write your message..." style="resize:none;" required></textarea>
          </div>

          <div style="text-align:center;">
            <button name="submit" type="submit" class="btn btn-gradient w-50">
              Submit Enquiry
            </button>
          </div>

        </form>
      </div>

      <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $phone   = $_POST['phone'];

        if ($name && $email && $subject && $message && $phone) {
          $stmt = $conn->prepare(
            "INSERT INTO contact (name, email, phone, courses, message) VALUES (?, ?, ?, ?, ?)"
          );
          $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

          if ($stmt->execute()) {
            echo "<script>
              alert('Thank you for your enquiry. Our team will get back to you shortly!');
              window.location.href = window.location.href;
            </script>";
          } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
          }
          $stmt->close();
        } else {
          echo "<script>alert('All fields are required!');</script>";
        }
      }
      ?>

    </div>
  </div>
</div>

<!-- Auto-open modal on page load -->
<script>
  window.addEventListener('load', function() {
    var modal = new bootstrap.Modal(document.getElementById('enquiryModal'));
    modal.show();
  });
</script>

<!-- ════ PAGE ════ -->
<div class="univ-page">

  <!-- HEADING — logo + name ABOVE the image -->
  <div class="univ-header">

    <?php if (!empty($data['logo'])) { ?>
      <img
        src="admin/uploads/<?php echo htmlspecialchars($data['logo']); ?>"
        alt="Logo"
        class="univ-header__logo">
    <?php } ?>
    <div class="univ-header__text">
      <h1 class="univ-header__title">
        <?php
        $name  = htmlspecialchars($data['university_name']);
        $parts = explode(' ', $name);
        $last  = array_pop($parts);
        echo implode(' ', $parts) . ' <em>' . $last . '</em>';
        ?>
      </h1>
    </div>
  </div>

  <!-- UNIVERSITY IMAGE -->
  <div class="univ-hero">
    <img
      src="admin/uploads/<?php echo htmlspecialchars($data['university_photo']); ?>"
      class="univ-hero__img"
      alt="<?php echo htmlspecialchars($data['university_name']); ?>">
  </div>

  <!-- BODY -->
  <div class="univ-body">

    <div class="deco-rule">
      <div class="deco-rule__diamond"></div>
    </div>

    <?php
    $raw        = $data['university_details'];
    $paragraphs = array_filter(
      explode("\n\n", $raw),
      fn($p) => trim($p) !== ''
    );
    $paragraphs = array_values($paragraphs);

    if (!empty($paragraphs)) {
      $first = array_shift($paragraphs);
      echo '<p class="univ-intro">' . nl2br(htmlspecialchars(trim($first))) . '</p>';
    }
    ?>

    <div class="univ-details">
      <?php foreach ($paragraphs as $para): ?>
        <p><?php echo nl2br(htmlspecialchars(trim($para))); ?></p>
      <?php endforeach; ?>
    </div>

    <!-- Footer strip: back button + enquiry button -->
    <div class="univ-footer-strip">
      <a href="javascript:history.back()" class="btn-back">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="15 18 9 12 15 6" />
        </svg>
        Back
      </a>
      <button class="btn-enquiry" data-bs-toggle="modal" data-bs-target="#enquiryModal">
        <i class="bi bi-chat-dots-fill"></i>
        Enquire Now
      </button>
    </div>

  </div>
</div>

<!-- FLOATING WHATSAPP -->
<a
  href="https://wa.me/919040029440"
  target="_blank"
  rel="noopener noreferrer"
  class="wa-float"
  aria-label="Chat on WhatsApp — +91 9040029440">
  <div class="wa-float__btn">
    <svg width="30" height="30" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
      <path fill="#fff" d="M16 3C9.373 3 4 8.373 4 15c0 2.385.67 4.61 1.832 6.505L4 29l7.697-1.812A11.93 11.93 0 0 0 16 28c6.627 0 12-5.373 12-12S22.627 3 16 3Z" />
      <path fill="#25d366" d="M16 5.5c-5.238 0-9.5 4.262-9.5 9.5 0 2.1.686 4.04 1.845 5.614l-1.21 4.39 4.528-1.187A9.456 9.456 0 0 0 16 24.5c5.238 0 9.5-4.262 9.5-9.5S21.238 5.5 16 5.5Z" />
      <path fill="#fff" d="M12.26 11.5c-.19-.44-.39-.45-.57-.46l-.49-.01c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1s.9 2.43 1.03 2.6c.12.17 1.74 2.78 4.28 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.49-.61 1.7-1.2.21-.58.21-1.08.15-1.19-.07-.1-.24-.17-.5-.3-.26-.13-1.52-.75-1.76-.84-.23-.09-.4-.13-.57.13-.17.26-.65.84-.8 1.01-.15.17-.3.19-.56.06-.26-.13-1.1-.41-2.1-1.3-.77-.69-1.3-1.54-1.45-1.8-.15-.26-.02-.4.11-.53.12-.12.26-.3.39-.46.13-.15.17-.26.26-.44.09-.17.04-.32-.02-.45-.06-.12-.56-1.36-.77-1.86Z" />
    </svg>
  </div>
  <span class="wa-float__label">+91 9040029440</span>
</a>

<?php include "include/footer.php"; ?>