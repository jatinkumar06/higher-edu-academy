<?php include 'include/header.php'; ?>

<main class="main">

<!-- ================= HERO SECTION ================= -->
<div class="page-title">
  <img src="aboutus.png" alt="Banner">
  <div class="hero-overlay">
    <div class="hero-content text-center">
      <h1>Empowering Futures with the Right Education</h1>
      <p>Clear guidance. Honest advice. Confident decisions.</p>
      <a href="#contact" class="btn btn-primary btn-lg">Get Free Counselling</a>
    </div>
  </div>
</div>

<!-- ================= ENQUIRY MODAL ================= -->
<div class="modal fade" id="enquiryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Quick Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="enquiry_submit.php" method="POST">
          <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>
          <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>
          <input type="text" name="phone" class="form-control mb-3" placeholder="Phone Number" required>
          <textarea name="message" class="form-control mb-3" rows="3" placeholder="Message" required></textarea>
          <button class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
window.onload = function () {
  new bootstrap.Modal(document.getElementById('enquiryModal')).show();
};
</script>

<!-- ================= ABOUT ================= -->
<section id="about" class="section about">
  <div class="container">
    <div class="row align-items-center gy-4">
      <div class="col-lg-5" data-aos="fade-up">
        <img src="assets/img/hero2.png" class="img-fluid rounded-4 shadow" alt="">
      </div>
      <div class="col-lg-7" data-aos="fade-up">
        <h3>Education should feel empowering — not exhausting.</h3>
        <ul>
          <li>Personalised guidance based on your strengths and goals.</li>
          <li>Transparent advice without pressure or hidden agendas.</li>
        </ul>
        <a href="about1.php" class="btn btn-outline-primary mt-3">Read More</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= MISSION VISION PROMISE ================= -->
<div class="container my-5">
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card mvp-card text-center">
        <div class="card-body">
          <div class="mvp-icon bg-primary"><i class="bi bi-bullseye"></i></div>
          <h4>Our Mission</h4>
          <p>Quality education and honest career guidance for every student.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mvp-card text-center">
        <div class="card-body">
          <div class="mvp-icon bg-success"><i class="bi bi-eye"></i></div>
          <h4>Our Vision</h4>
          <p>To be India’s most trusted education partner.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mvp-card text-center">
        <div class="card-body">
          <div class="mvp-icon bg-warning"><i class="bi bi-award"></i></div>
          <h4>Our Promise</h4>
          <p>Clarity, honesty, and student-first guidance.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ================= COURSES ================= -->
<section id="courses" class="section courses bg-light">
  <div class="container">
    <div class="section-title text-center">
      <h2>Popular Courses</h2>
      <p>Choose the path that fits your future</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="course-item">
          <img src="assets/img/course-1.jpg">
          <div class="course-content">
            <h3>Management</h3>
            <p>Build leadership and business decision-making skills.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-item">
          <img src="assets/img/course-2.jpg">
          <div class="course-content">
            <h3>Commerce</h3>
            <p>Accounting, banking, finance & business foundations.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="course-item">
          <img src="mdcl.png">
          <div class="course-content">
            <h3>Medical</h3>
            <p>Nursing, Pharmacy & Hospital Management careers.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="section contact">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Us</h2>
      <p>We’d love to guide you</p>
    </div>
    <div class="row gy-4">
      <div class="col-lg-6">
        <p><strong>📍 Address:</strong> India</p>
        <p><strong>📞 Phone:</strong> +91 XXXXXXXXXX</p>
        <p><strong>✉ Email:</strong> info@think9ext.com</p>
      </div>
      <div class="col-lg-6">
        <form>
          <input class="form-control mb-3" placeholder="Your Name">
          <input class="form-control mb-3" placeholder="Your Email">
          <textarea class="form-control mb-3" rows="4" placeholder="Message"></textarea>
          <button class="btn btn-primary w-100">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

</main>

<?php include 'include/footer.php'; ?>

<!-- ================= STYLES ================= -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body { font-family: 'Poppins', sans-serif; }
section { padding: 80px 0; }

/* Hero */
.page-title { position: relative; height: 85vh; }
.page-title img { width:100%; height:100%; object-fit:cover; }
.hero-overlay {
  position:absolute; inset:0;
  background:linear-gradient(to right,rgba(0,0,0,.6),rgba(0,0,0,.3));
  display:flex; align-items:center; justify-content:center;
}
.hero-content h1 { color:#fff; font-size:3rem; font-weight:700; }
.hero-content p { color:#eee; margin-bottom:20px; }

/* Cards */
.mvp-card {
  border:0; border-radius:18px;
  transition:.3s;
  backdrop-filter: blur(8px);
}
.mvp-card:hover { transform:translateY(-8px); box-shadow:0 15px 35px rgba(0,0,0,.15); }
.mvp-icon {
  width:70px; height:70px;
  border-radius:50%;
  display:flex; align-items:center; justify-content:center;
  color:#fff; font-size:30px;
  margin:0 auto 15px;
}

/* Courses */
.course-item {
  border-radius:18px;
  overflow:hidden;
  transition:.3s;
  background:#fff;
}
.course-item:hover {
  transform:translateY(-10px);
  box-shadow:0 15px 30px rgba(0,0,0,.15);
}
.course-item img {
  width:100%; height:220px; object-fit:cover;
}
.course-content { padding:20px; }
</style>
