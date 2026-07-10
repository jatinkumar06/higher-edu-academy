<?php
include 'include/header.php';
include "connection.php";
?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
  .page-title {
    width: 100%;
    aspect-ratio: 12 / 6;
    /* SAME HEIGHT FOR BOTH IMAGES */
    overflow: hidden;
  }

  /* carousel full height */
  .page-title .carousel-inner,
  .page-title .carousel-item {
    height: 100%;
  }

  /* images auto-fit */
  .page-title .hero-img {
    width: 100%;
    height: 100%;
    object-fit: fill;
    /* no crop */
  }

  /* Modal styling */
  .enquiry-modal {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
  }

  /* Header gradient */
  .enquiry-modal .modal-header {
    background: linear-gradient(135deg, #0d6efd, #123a62);
    border-bottom: none;
  }

  /* Inputs */
  .enquiry-modal .form-control {
    border-radius: 10px;
    padding: 10px 14px;
  }

  /* Gradient button */
  .btn-gradient {
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    color: #fff;
    border: none;
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
    transition: 0.3s ease;
  }

  .btn-gradient:hover {
    opacity: 0.9;
    transform: translateY(-1px);
  }

  .mvp-card {
    border-radius: 18px;
    min-height: 260px;
    transition: all 0.3s ease;
  }

  .mvp-card:hover {
    transform: translateY(-8px);
  }

  /* Background colors */
  .mvp-card.mission {
    background-color: #123a62;
    /* Purple */
  }

  .mvp-card.vision {
    background-color: #123a62;
    /* Orange */
  }

  .mvp-card.promise {
    background-color: #123a62;
    /* Green */
  }

  /* Icon styling */
  .mvp-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
  }

  .mvp-icon i {
    font-size: 26px;
    color: #fff;
  }

  .mvp-icon {
    border: 2px solid #fff;
    /* white border */
    border-radius: 50%;
    /* fully round */
  }

  .explore-card {
    border: none;
    border-radius: 16px;
    transition: all 0.3s ease;
  }

  .explore-card:hover {
    transform: translateY(-8px);
  }

  .university {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
  }

  .college {
    background: linear-gradient(135deg, #11998e, #38ef7d);
  }

  .course {
    background: linear-gradient(135deg, #f7971e, #ffd200);
  }

  .courses {
    background: linear-gradient(135deg, #547698, #6c8196);
  }

  .explore-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 15px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 30px;
  }

  :root {
    --uni-blue: #123a62;
    --uni-red: #d32f2f;
    --uni-gold: #ffc107;
  }

  .notice-section-wrapper {
    background: #f8f9fa;
    padding: 50px 0;
  }

  /* Left Side Buttons */
  .action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 15px 25px;
    border-radius: 50px;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-bottom: 20px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 280px;
  }

  .btn-video {
    background: linear-gradient(45deg, #ff0000, #b20000);
    color: white !important;
  }

  .btn-download {
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white !important;
  }

  .action-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
  }

  .action-btn i {
    font-size: 24px;
    background: rgba(255, 255, 255, 0.2);
    padding: 5px;
    border-radius: 50%;
  }

  /* Notice Board Right Side */
  .notice-card {
    background: white;
    border-radius: 20px;
    /* Curvy corners */
    border: 1px solid #eee;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    height: 350px;
    /* Increased Height */
    display: flex;
    flex-direction: column;
  }

  .notice-header {
    background: var(--uni-red);
    color: white;
    padding: 12px 20px;
    font-weight: 700;
    font-size: 1.2rem;
    text-align: center;
    letter-spacing: 1px;
  }

  .notice-body {
    padding: 20px;
    position: relative;
    overflow: hidden;
    flex-grow: 1;
  }

  /* Vertical Scroller */
  .vertical-ticker {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    animation: scrollUp 30s linear infinite;
    /* Smooth continuous scroll */
  }

  .vertical-ticker:hover {
    animation-play-state: paused;
    /* Pauses on hover so user can read */
  }

  .notice-item {
    display: flex;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px dashed #ddd;
    font-size: 1.05rem;
    line-height: 1.6;
    color: #333;
  }

  .notice-item b {
    color: var(--uni-blue);
  }

  .notice-item .bullet {
    color: var(--uni-red);
    margin-right: 10px;
    font-weight: bold;
  }

  @keyframes scrollUp {
    0% {
      transform: translateY(100%);
    }

    100% {
      transform: translateY(-100%);
    }
  }

  /* Responsive */
  @media (max-width: 768px) {
    .notice-card {
      height: 300px;
    }

    .action-btn {
      max-width: 100%;
    }
  }
</style>
<main class="main">

  <?php
  // Fetch short notice for marquee
  $short_notice_text = "";
  $short_notice_qry = mysqli_query($conn, "SELECT notice_text FROM short_notices ORDER BY id DESC LIMIT 1");
  if ($short_notice_qry && mysqli_num_rows($short_notice_qry) > 0) {
      $sn_row = mysqli_fetch_assoc($short_notice_qry);
      $short_notice_text = $sn_row['notice_text'];
  }
  
  if (!empty($short_notice_text)) {
  ?>
  <div style="background-color: #ffc107;
    color: #ac0000;
    padding: 2px 0;
    font-weight: bold;
    font-size: 16px;">
      <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
          <?php echo htmlspecialchars($short_notice_text); ?>
      </marquee>
  </div>
  <?php
  }
  ?>

  <div id="pageTitleCarousel"
    class="carousel slide page-title"
    data-bs-ride="carousel"
    data-bs-interval="3000">

    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="images/banner1.png" class="hero-img" alt="Banner 1">
      </div>

      <div class="carousel-item active">
        <img src="images/banner2.png" class="hero-img" alt="Banner 2">
      </div>

      <div class="carousel-item">
        <img src="images/banner3.png" class="hero-img" alt="Banner 3">
      </div>
      <!-- <div class="carousel-item">
        <img src="aboutus.png" class="hero-img" alt="Banner 2">
      </div> -->

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#pageTitleCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#pageTitleCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Dynamic Notices Section -->
  <section class="notice-section-wrapper">
    <div class="container">
      <div class="row align-items-center">

        <!-- Left Side: Modern Buttons -->
        <div class="col-lg-4 col-md-5 mb-4 mb-md-0 d-flex flex-column align-items-center">
          <a href="https://youtube.com/@akchannelbyanandkumar?si=aJ3aWhz7LxKItjLp" target="_blank" class="action-btn btn-video align-items-center">
            <span>Watch Video</span>
            <i class="fa-solid fa-play"></i>
          </a>

          <!-- <a href="#" class="action-btn btn-download">
                    <span>Download</span>
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                </a> -->
        </div>

        <!-- Right Side: Notice Board -->
        <div class="col-lg-8 col-md-7">
          <div class="notice-card">
            <div class="notice-header">
              <i class="fa-solid fa-bullhorn me-2"></i> NOTICE BOARD
            </div>
            <div class="notice-body">
              <div class="vertical-ticker">
                <?php
                // Fetching from your database
                $notice_qry = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
                if (mysqli_num_rows($notice_qry) > 0) {
                  while ($notice = mysqli_fetch_assoc($notice_qry)) {
                ?>
                    <div class="notice-item">
                      <span class="bullet">*</span>
                      <?php
                      // This allows bold tags etc if stored in database
                      echo $notice['notice_text'];
                      ?>
                    </div>
                <?php
                  }
                } else {
                  echo "<p class='text-center'>No new updates.</p>";
                }
                ?>

                <!-- To make the scroll seamless, we repeat the content once -->
                <?php
                mysqli_data_seek($notice_qry, 0); // Reset pointer
                while ($notice = mysqli_fetch_assoc($notice_qry)) {
                ?>
                  <div class="notice-item">
                    <span class="bullet">*</span>
                    <?php echo $notice['notice_text']; ?>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Enquiry Modal -->
  <div class="modal fade" id="enquiryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content enquiry-modal">

        <!-- Header -->
        <div class="modal-header text-white" style="text-align: center !important;">
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
                <option value="" disabled selected>Select Course</option>

                <?php
                include_once __DIR__ . '/../connection.php';

                $course_qry = mysqli_query($conn, "SELECT id, name FROM courses ORDER BY name ASC");

                if ($course_qry && mysqli_num_rows($course_qry) > 0) {
                  while ($course_row = mysqli_fetch_assoc($course_qry)) {
                    $course_name = htmlspecialchars($course_row['name']);
                    $course_id = $course_row['id'];

                    echo "<option value='{$course_name}' data-id='{$course_id}'>{$course_name}</option>";
                  }
                }
                ?>

                <option value="Others">Others</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control" rows="3" placeholder="Write your message..." style="resize: none;" required></textarea>
            </div>
            <div style="text-align: center;">
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
          $phone = $_POST['phone'];
          if ($name && $email && $subject && $message && $phone) {

            $stmt = $conn->prepare(
              "INSERT INTO contact (name, email, phone, courses, message) VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

            if ($stmt->execute()) {
              echo "<script>
                alert('Thank you for your enquiry. Our team will get back to you shortly.!');
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

  <script>
    window.onload = function() {
      var enquiryModal = new bootstrap.Modal(document.getElementById('enquiryModal'));
      enquiryModal.show();
    };
  </script>

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/b1.jpeg" class="img-fluid" alt="" style="border-radius: 15px;">
        </div>

        <div class="col-lg-7 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3 style="text-align: justify;text-justify: inter-word; hyphens: auto;"> At Higher Education Academy, we believe choosing an
            educational path should feel empowering not exhausting.
          </h3>
          <!-- <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p> -->
          <ul style="text-align: justify;">
            <li><i class="bi bi-check-circle" style="text-align: justify;"></i> <span>Founded on the belief that every student’s journey is deeply personal, Higher Education Academy is an educational consulting firm dedicated to helping students discover their true aspirations, strengths, and long-term possibilities—before choosing an institution, course, or country.</span></li>
            <li><i class="bi bi-check-circle" style="text-align: justify;"></i> <span>We step away from the transactional, pressure-driven model of education consulting and instead offer thoughtful, transparent guidance—where clarity comes before choice, purpose guides decisions, and every recommendation is made with integrity...</span></li>
            <!-- <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li> -->
          </ul>
          <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->
  <div class="container my-5">
    <div class="row g-4">

      <!-- Mission -->
      <div class="col-12 col-md-4">
        <div class="card mvp-card mission shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mvp-icon bg-primary ">
              <i class="bi bi-bullseye"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Our Mission</h4>
            <p class="text-white mb-0">
              “To deliver expert career counseling and guidance that empowers students to make informed career decisions.”
            </p>
          </div>
        </div>
      </div>

      <!-- Vision -->
      <div class="col-12 col-md-4">
        <div class="card mvp-card vision shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mvp-icon bg-success">
              <i class="bi bi-eye"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Our Vision</h4>
            <p class="text-white mb-0">
              To become a trusted education partner for students across India.
            </p>
          </div>
        </div>
      </div>

      <!-- Promise -->
      <div class="col-12 col-md-4">
        <div class="card mvp-card promise shadow-sm">
          <div class="card-body text-center p-4">
            <div class="mvp-icon bg-warning">
              <i class="bi bi-award"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Our Promise</h4>
            <p class="text-white mb-0">
              We promise honest guidance, best support, and student success.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Counts Section -->
  <section id="counts" class="section counts  mb-2" style="background-image: linear-gradient(to right, #c6d8ea, #6386aa);border-radius: 18px; border: 2px solid #123a62;">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p style="color: #123a62;">Students</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p style="color: #123a62;">Courses</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p style="color: #123a62;">Events</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
            <p style="color: #123a62;">Trainers</p>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>

  </section><!-- /Counts Section -->

  <!-- Why Us Section -->


  <!-- Features Section -->
  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section" style="background-color: #123a62;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up" style="text-align: center;">
      <h2 style="color:yellow;">Testimonials</h2>
      <p style="color:yellow;">What are they saying</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 2,
                "spaceBetween": 20
              }
            }
          }
        </script>
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/hero6.png" class="testimonial-img" alt="">
                <h3>Somanath</h3>
                <!-- <h4>Ceo &amp; Founder</h4> -->
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>"I was worried about my child struggling with online classes, but Higher Education Academy's structured courses and personalized attention changed everything. The teachers are patient, and the progress reports help me track my child's growth."</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/hero4.png" class="testimonial-img" alt="">
                <h3>Subhasmita</h3>
                <!-- <h4>Designer</h4> -->
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>"Higher Education Academy has completely transformed the way I learn. The interactive sessions and expert teachers made difficult topics easy to understand. I feel more confident in my studies and have seen significant improvement in my grades."</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/hero7.png" class="testimonial-img" alt="">
                <h3>Puja roy</h3>
                <!-- <h4>HR</h4> -->
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>"Balancing work and learning was tough, but Higher Education Academy’s flexible schedules made it possible. The practical approach to teaching concepts helped me upgrade my skills and advance in my career."</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/hero5.png" class="testimonial-img" alt="">
                <h3>Biswajit</h3>
                <!-- <h4>Doctor</h4> -->
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>"The quality of content and live sessions at Higher Education Academy is unmatched. I especially love the doubt-clearing sessions and the supportive community of learners. Highly recommend Higher Education Academy for anyone serious about learning."</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="assets/img/hero3.png" class="testimonial-img" alt="">
                <h3>Jatin</h3>
                <!-- <h4>Fullstack Developer</h4> -->
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>"We partnered with Higher Education Academy for employee skill development, and the results were impressive. Their tailored online modules helped our team enhance productivity and efficiency."</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- /Testimonials Section -->
  <div class="container my-5">
    <div class="row g-4 justify-content-center">

      <!-- University -->
      <div class="col-12 col-md-4">
        <div class="card explore-card university shadow-sm">
          <div class="card-body text-center p-4">
            <div class="explore-icon bg-primary">
              <i class="bi bi-building"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Universities</h4>
            <p class="text-white mb-3">
              Explore top universities with the best academic programs and career opportunities.
            </p>
            <a href="universities.php" class="btn btn-light fw-semibold">
              Find Universities
            </a>
          </div>
        </div>
      </div>

      <!-- College -->
      <!-- <div class="col-12 col-md-4">
        <div class="card explore-card college shadow-sm">
          <div class="card-body text-center p-4">
            <div class="explore-icon bg-success">
              <i class="bi bi-mortarboard"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Colleges</h4>
            <p class="text-white mb-3">
              Discover colleges that match your interests, budget, and career goals.
            </p>
            <a href="colleges.php" class="btn btn-light fw-semibold">
              Find College
            </a>
          </div>
        </div>
      </div> -->

      <!-- Courses -->
      <div class="col-12 col-md-4">
        <div class="card explore-card course shadow-sm">
          <div class="card-body text-center p-4">
            <div class="explore-icon bg-warning">
              <i class="bi bi-journal-bookmark"></i>
            </div>
            <h4 class="fw-bold mb-2 text-white">Courses</h4>
            <p class="text-white mb-3">
              Browse industry-relevant courses designed for your future success.
            </p>
            <a href="courses.php" class="btn btn-light fw-semibold">
              Find Courses
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Courses Section -->
  <style>
    .course-item {
      display: flex;
      flex-direction: column;
      height: 100%;
      position: relative;
      /* needed for stretched-link */
      transition: all 0.3s ease;
    }

    .course-item:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .course-item img {
      width: 100%;
      height: 200px;
      /* fixed image height so cards line up */
      object-fit: cover;
    }

    .course-content {
      flex: 1;
      /* fills remaining space equally in every card */
      display: flex;
      flex-direction: column;
    }

    .course-content h3 {
      min-height: 48px;
      /* keeps title area consistent even if 1 vs 2 lines */
    }

    .course-content h3 a {
      position: relative;
      z-index: 2;
      /* stays clickable above the stretched-link */
      text-decoration: none;
    }

    .course-content .description {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      /* limit to 3 lines, change as needed */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      flex-grow: 1;
    }
  </style>

  <style>
    .course-item {
      display: flex;
      flex-direction: column;
      height: 100%;
      text-decoration: none;
      /* remove underline from whole card */
      color: inherit;
      /* prevent link-blue text everywhere */
      transition: all 0.3s ease;
    }

    .course-item:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      color: inherit;
    }

    .course-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .course-content {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .course-content h3 {
      min-height: 48px;
    }

    .course-content .description {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      flex-grow: 1;
    }

    .header {
      padding: 0;
    }
  </style>

  <section id="courses" class="courses section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up" style="text-align: center;">
      <h2>Courses</h2>
      <p>Choose the path that fits your future</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row">
        <?php
        $sql_idx_courses = "SELECT * FROM courses ORDER BY id DESC LIMIT 3";
        $res_idx_courses = mysqli_query($conn, $sql_idx_courses);
        if (mysqli_num_rows($res_idx_courses) > 0) {
          $delay = 100;
          while ($c_row = mysqli_fetch_assoc($res_idx_courses)) {
        ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
              <a href="course-details.php?id=<?php echo (int)$c_row['id']; ?>" class="course-item">
                <img src="admin/<?php echo htmlspecialchars($c_row['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($c_row['name']); ?>">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="category"><?php echo htmlspecialchars($c_row['name']); ?></p>
                  </div>

                  <h3><?php echo htmlspecialchars($c_row['name']); ?></h3>
                  <p class="description" style="text-align: justify;"><?php echo strip_tags($c_row['content']); ?></p>
                </div>
              </a>
            </div>
        <?php
            $delay += 100;
          }
        } else {
          echo "<div class='col-12 text-center'><p>No courses found.</p></div>";
        }
        ?>
      </div>

    </div>

  </section><!-- /Courses Section -->

  <!-- Trainers Index Section -->
  <!-- <section id="trainers-index" class="section trainers-index">

    <div class="container">

      <div class="row">

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Walter White</h4>
              <span>Web Development</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
              </p>
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Sarah Jhinson</h4>
              <span>Marketing</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>William Anderson</h4>
              <span>Content</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section> -->
  <!-- /Trainers Index Section -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    .mvp-card {
      border: 0;
      border-radius: 16px;
      transition: 0.3s ease-in-out;
      overflow: hidden;
    }

    .mvp-card:hover {
      transform: translateY(-8px);
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
    }

    .mvp-icon {
      width: 70px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 30px;
      color: #fff;
      margin: 0 auto 15px;
    }

    /* Contact info boxes */
    .contact .info-item {
      background: #ffffff;
      padding: 20px;
      border-radius: 14px;
      margin-bottom: 20px;
      gap: 15px;
      transition: 0.3s ease;
    }

    .contact .info-item i {
      font-size: 26px;
      color: #0d6efd;
    }

    .contact .info-item:hover {
      transform: translateY(-5px);
    }

    /* Contact form */
    .php-email-form {
      background: #ffffff;
    }

    .php-email-form button {
      border-radius: 30px;
    }

    /* 
    .row .col-md-6 .form-control{
      border:2px solid black !important;
    } */
    /* Blur background section */
    .blur-bg {
      position: relative;
      background-image: url('nnn.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      overflow: hidden;
    }

    /* Blurred overlay */
    .blur-bg::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: inherit;
      background-size: cover;
      background-position: center;
      filter: blur(8px);
      transform: scale(1.1);
      /* prevents edge cut */
      z-index: 1;
    }

    /* Dark overlay for readability (optional but recommended) */
    .blur-bg::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      z-index: 2;
    }

    /* Keep content above blur */
    .blur-bg .container {
      position: relative;
      z-index: 3;
    }
  </style>


  <section id="contact" class="contact section blur-bg">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="section-title text-center mb-5">
        <h3 style="color:yellow">Contact Us</h3>
        <p style="color:yellow">We’d love to guide you</p>
      </div>

      <div class="row gy-4">

        <!-- Contact Info -->
        <div class="col-lg-6">

          <div class="info-item d-flex align-items-start shadow-sm" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt"></i>
            <div>
              <h3>Address</h3>
              <p>1612, Lane Number 5, near BP COLLEGE, Jayadev Vihar, Bhubaneswar, Odisha 751013</p>
            </div>
          </div>

          <div class="info-item d-flex align-items-start shadow-sm" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone"></i>
            <div>
              <a href="tel:9861953662">
                <h3>Call Us</h3>
                <p>9861953662</p>
              </a>
            </div>
          </div>

          <div class="info-item d-flex align-items-start shadow-sm" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope"></i>
            <div>
              <a href="mailto:highereducationacademybbsr@gmail.com">
                <h3>Email Us</h3>
                <p> highereducationacademybbsr@gmail.com</p>
              </a>
            </div>
          </div>

        </div>

        <!-- Contact Form -->
        <div class="col-lg-6">
          <form action="#" method="post" class="php-email-form shadow-sm p-4 rounded" data-aos="fade-up" data-aos-delay="200">

            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" styl required>
              </div>

              <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary px-4">
                  Send Message
                </button>
              </div>

            </div>
          </form>
        </div>

      </div>
    </div>

  </section>

</main>
<?php
include 'include/footer.php'; ?>