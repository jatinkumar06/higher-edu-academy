<?php
include 'include/header.php';
include "connection.php";
?>
<!-- <h1>Gallery</h1> -->
<div class="page-title about-banner d-flex align-items-center" data-aos="fade">
    <div class="container position-relative text-center">
        <h1>Gallery</h1>
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
<div class="container py-5">

    <!-- <h2 class="text-center mb-4">Our Gallery</h2> -->

    <div class="row g-3">

        <!-- Image 1 -->
         <?php
         $qry = "SELECT * FROM `images` ORDER BY id DESC ";
            $result = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_assoc($result)) {
         ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="admin/uploads/<?php echo $row['image']; ?>" data-lightbox="gallery">
                <img src="admin/uploads/<?php echo $row['image']; ?>" class="img-fluid gallery-img" alt="<?php echo $row['name']; ?>">
            </a>
        </div>
        <?php } ?>

        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <img src="image1.png" class="img-fluid gallery-img" alt="Gallery Image 1" target="_blank">
        </div> -->

        <!-- Image 2 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="image2.png" data-lightbox="gallery">
                <img src="image2.png" class="img-fluid gallery-img" alt="Gallery Image 2">
            </a>
        </div> -->

        <!-- Image 3 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="image3.png" data-lightbox="gallery">
                <img src="image3.png" class="img-fluid gallery-img" alt="Gallery Image 3">
            </a>
        </div> -->

        <!-- Image 4 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="image4.png" data-lightbox="gallery">
                <img src="image4.png" class="img-fluid gallery-img" alt="Gallery Image 4">
            </a>
        </div> -->

        <!-- Image 5 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="assets/img/gallery/5.jpg" data-lightbox="gallery">
                <img src="assets/img/gallery/5.jpg" class="img-fluid gallery-img" alt="Gallery Image 5">
            </a>
        </div> -->

        <!-- Image 6 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="assets/img/gallery/6.jpg" data-lightbox="gallery">
                <img src="assets/img/gallery/6.jpg" class="img-fluid gallery-img" alt="Gallery Image 6">
            </a>
        </div> -->

        <!-- Image 7 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="assets/img/gallery/7.jpg" data-lightbox="gallery">
                <img src="assets/img/gallery/7.jpg" class="img-fluid gallery-img" alt="Gallery Image 7">
            </a>
        </div> -->

        <!-- Image 8 -->
        <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="assets/img/gallery/8.jpg" data-lightbox="gallery">
                <img src="assets/img/gallery/8.jpg" class="img-fluid gallery-img" alt="Gallery Image 8">
            </a>
        </div> -->

    </div>
</div>

<!-- Gallery CSS -->
<style>
    .gallery-img{
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        transition: 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .gallery-img:hover{
        transform: scale(1.03);
    }
</style>

<!-- Lightbox CSS + JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<?php
include 'include/footer.php';
?>
