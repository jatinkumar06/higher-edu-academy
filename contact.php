<?php
session_start();

include 'include/header.php'; ?>

<main class="main">

  <!-- <h1>Contact Us</h1> -->
  <div class="page-title about-banner d-flex align-items-center" data-aos="fade">
    <div class="container position-relative text-center">
      <h1>Contact Us</h1>
      <!-- <p>
            Empowering students with quality education, expert guidance,
            and career-focused learning.
        </p> -->
    </div>
  </div>
  <!-- End Page Title -->

  <style>
    .about-banner {
      background: url("image.png") center center no-repeat;
      background-size: cover;
      min-height: 420px;
      position: relative;
      color: #fff;
    }

    /* Dark overlay */
    .about-banner::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
    }

    .about-banner .container {
      position: relative;
      z-index: 2;
    }

    .about-banner h1 {
      font-size: 48px;
      font-weight: 700;
    }

    .about-banner p {
      font-size: 18px;
      max-width: 700px;
      margin: 10px auto 0;
      color: #f1f1f1;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .about-banner {
        min-height: 280px;
      }

      .about-banner h1 {
        font-size: 34px;
      }

      .about-banner p {
        font-size: 16px;
      }
    }

    @media (max-width: 576px) {
      .about-banner {
        min-height: 220px;
      }

      .about-banner h1 {
        font-size: 28px;
      }
    }
  </style>

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
      <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7133.292904846919!2d85.81054364139885!3d20.297978274698682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1909d373df853b%3A0x43c651b70747c7ba!2sHIGHER%20EDUCATION%20ACADEMY!5e1!3m2!1sen!2sin!4v1782607089977!5m2!1sen!2sin" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- End Google Maps -->
    <div style="text-align: center; margin-bottom: 30px; background-color: #123a62;padding: 20px;" data-aos="fade-up" data-aos-delay="100">
      <h3 style="color: white;">Get In Touch</h3>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-4">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p style="font-weight:600;">1612, LANE 5, NEAR BP COLLEGE, JAYDEV VIHAR

				BHUBANESWAR, ODISHA 751013</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <a href="tel: 9861953662" style="font-weight:600;"> 9861953662</a>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <a href="mailto:highereducationacademybbsr@gmail.com" style="font-weight:600;">highereducationacademybbsr@gmail.com
              </a>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="col-lg-8">
          <form method="post" class="" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="col-md-6">
                <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" required>
              </div>
              <div class="col-md-6">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea style="resize: none;" name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
              </div>
              <!-- <div class="col-md-12">
                <input type="text" name="captcha" placeholder="Enter CAPTCHA" required>
                <br><br>
                <img src="captcha.php" alt="captcha">

              </div> -->
              <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  Send Message
                </button>
              </div>

            </div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
    <?php
    include "connection.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
      // echo "✅<script>alert('Message sent successfully!');</script>";
      $name    = trim($_POST['name']);
      $email   = trim($_POST['email']);
      $subject = trim($_POST['subject']);
      $message = trim($_POST['message']);
      $phone = trim($_POST['phone']);

      if ($name && $email && $subject && $message && $phone) {

        $stmt = $conn->prepare(
          "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

        if ($stmt->execute()) {
          echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'contact.php';
            </script>";
        } else {
          echo "<script>alert('Something went wrong. Please try again.');</script>";
        }

        $stmt->close();
      } else {
        echo "<script>alert('All fields are required!');</script>";
      }
    } else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit']) && $_POST['captcha'] != $_SESSION['captcha']) {
      echo " ❌<script>alert('CAPTCHA Incorrect'); window.location.href = 'contact.php';</script>";
    }
    ?>
  </section><!-- /Contact Section -->

</main>
<?php include 'include/footer.php'; ?>