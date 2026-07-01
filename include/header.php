<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themewagon.github.io/Mentor/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Jan 2026 05:19:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Higher Education Academy</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="Higher Education Academy" rel="icon">
  <link href="images/logo.jpeg" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/" rel="preconnect">
  <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    #coursetitle {
      text-align: center;
      margin-bottom: 40px;
    }

    #coursetitle h2 {
      display: inline-block;
      padding: 14px 40px;
      background: linear-gradient(135deg, #0d6efd, #4dabf7);
      color: #ffffff;
      font-size: 22px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 50px;
      cursor: default;
      box-shadow: 0 10px 25px rgba(13, 110, 253, 0.35);
      transition: all 0.35s ease;
      position: relative;
      overflow: hidden;
    }

    /* Shine effect */
    #coursetitle h2::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 60%;
      height: 100%;
      background: rgba(255, 255, 255, 0.3);
      transform: skewX(-25deg);
      transition: 0.5s;
    }

    /* Hover effects */
    #coursetitle h2:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 35px rgba(13, 110, 253, 0.5);
    }

    #coursetitle h2:hover::before {
      left: 140%;
    }

    .course-table {
      border-radius: 14px;
      overflow: hidden;
      background: #ffffff;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }

    .course-table-header {
      background: linear-gradient(90deg, #0d6efd, #4f46e5);
      color: #fff;
      font-size: 1.2rem;
      font-weight: 700;
      padding: 14px 20px;
      text-align: center;
      letter-spacing: 1px;
    }

    .course-table-body {
      padding: 10px 15px 20px;
    }

    .course-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      /* ALWAYS LEFT–RIGHT */
      border-bottom: 1px solid #e9ecef;
    }

    .course-row:last-child {
      border-bottom: none;
    }

    .course-col {
      padding: 10px 8px;
    }

    .course-link {
      display: block;
      color: #212529;
      font-weight: 500;
      text-decoration: none;
      position: relative;
      padding-left: 16px;
      font-size: 0.95rem;
      /* better for mobile */
    }

    .course-link {
      position: relative;
      padding-left: 28px;
      /* space for icon */
    }

    .course-link::before {
      content: "\f0a4";
      /* hand-point-right */
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      position: absolute;
      left: 0;
      top: 0;
      color: #021a3e;
      font-size: 1.1rem;
    }


    .course-link:hover {
      color: #0d6efd;
    }

    /* Small mobile polish */
    @media (max-width: 480px) {
      .course-table-header {
        font-size: 1.05rem;
        padding: 12px;
      }

      .course-link {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body class="index-page">
  <nav class="navbar" style="background-color: #123a62;">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <!-- Contact Info -->
      <div style="display:flex; text-align:center;">
        <p class="mt-3 mb-0 me-4 text-white">
          <a href="tel:9861953662" class="text-white">
            <i class="fa-solid fa-phone fa-lg"></i> 9861953662
          </a>
        </p>
        <p class="mt-3 mb-0 text-white">
          <a href="mailto:info@demo.com" class="text-white">
            <i class="fa-solid fa-envelope fa-lg"></i>
            <span>info@demo.com</span>
          </a>
        </p>
      </div>

      <!-- Social Media Icons (DESKTOP ONLY) -->
      <div class="d-none d-lg-flex align-items-center">
        <a href="https://wa.me/919861953662?text=Hello%2C%20I%20would%20like%20to%20get%20more%20details%20about%20the%20admission%20process."
          target="_blank"
          class="text-white me-3">
          <i class="fa-brands fa-whatsapp fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3">
          <i class="fa-brands fa-facebook-f fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3">
          <i class="fa-brands fa-instagram fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3">
          <i class="fa-brands fa-linkedin-in fa-lg"></i>
        </a>
        <a href="#" class="text-white">
          <i class="fa-brands fa-twitter fa-lg"></i>
        </a>
      </div>

    </div>
  </nav>

  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  ?>

  <header id="header" class="header d-flex align-items-center sticky-top">

    <div class="container-fluid container-xl d-flex align-items-center">

      <!-- Logo -->
      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="images/logo.jpeg" alt="Logo">
      </a>

      <!-- Navbar -->
      <nav id="navmenu" class="navmenu">
        <ul>

          <li>
            <a href="index.php" class="<?= ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a>
          </li>

          <li>
            <a href="about1.php" class="<?= ($currentPage == 'about1.php') ? 'active' : ''; ?>">About</a>
          </li>
          <li>
            <a href="assets/pdfs/certificate.pdf" target="_blank">
              Certification
            </a>
          </li>

          <li class="dropdown">
            <a href="#"><span>Courses</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <!-- <li><a href="management1.php" class="<?= ($currentPage == 'management1.php') ? 'active' : ''; ?>">Management</a></li>
              <li><a href="engineering1.php" class="<?= ($currentPage == 'engineering1.php') ? 'active' : ''; ?>">Engineering</a></li>
              <li><a href="law1.php" class="<?= ($currentPage == 'law1.php') ? 'active' : ''; ?>">Law</a></li>
              <li><a href="commerce1.php" class="<?= ($currentPage == 'commerce1.php') ? 'active' : ''; ?>">Commerce</a></li>
              <li><a href="medical1.php" class="<?= ($currentPage == 'medical1.php') ? 'active' : ''; ?>">Medical</a></li>
              <li><a href="dental1.php" class="<?= ($currentPage == 'dental1.php') ? 'active' : ''; ?>">Dental</a></li> -->
              <li><a href="others.php" class="<?= ($currentPage == 'others.php') ? 'active' : ''; ?>">Others</a></li>

            </ul>
          </li>

          <li>
            <a href="gallery.php" class="<?= ($currentPage == 'gallery.php') ? 'active' : ''; ?>">Gallery</a>
          </li>

          <li>
            <a href="contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact</a>
          </li>

        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="#">Login</a> -->

    </div>
  </header>