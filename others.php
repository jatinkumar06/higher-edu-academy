<?php include 'include/header.php' ?>

<!-- Custom CSS for Premium Look -->
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-light);
    }

    .course-header {
        background: linear-gradient(rgba(26, 35, 126, 0.85), rgba(26, 35, 126, 0.85)),
            url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 40px;
        font-weight: 800;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--accent-color);
        border-radius: 2px;
    }

    .course-card {
        border: none;
        border-radius: 20px;
        transition: all 0.4s ease;
        background: #fff;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        text-align: center;
        /* Centers all text content */
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .course-img-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .course-img-container img {
        width: 100%;
        height: 100%;
        object-fit: fill;
        transition: transform 0.5s ease;
    }

    .course-card:hover .course-img-container img {
        transform: scale(1.1);
    }

    .mode-tag {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #ff9800;
        font-weight: 700;
        margin-top: 15px;
        display: block;
    }

    .course-name {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 10px 0;
        color: var(--primary-color);
    }

    .free-section {
        background-color: #fff;
        padding: 80px 0;
    }

    /* Adjusting SC/ST Section for 5 items in a row */
    .scst-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    @media (max-width: 992px) {
        .scst-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .scst-grid {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<div class="course-header">
    <div class="container">
        <h1 class="display-3 fw-bold text-white">Explore Our free Courses</h1>
        <p class="lead text-white-500">Excellence in Regular & Distance Education</p>
    </div>
</div>

<div class="container mb-5">
    <!-- Academic Courses Section -->
    <h2 class="section-title">Academic & Professional Programs</h2>
    <div class="row g-4 mb-5">
        <?php
        $academic = [
            ["name" => "BA", "img" => "images/BA.png"],
            ["name" => "BCA", "img" => "images/BCA.png"],
            ["name" => "B.COM", "img" => "images/BCOM.png"],
            ["name" => "M.A", "img" => "images/MA.png"],
            ["name" => "M.SC", "img" => "images/MSC.png"],
            ["name" => "M.COM", "img" => "images/MCOM.png"]
        ];
        foreach ($academic as $course): ?>
            <div class="col-md-4">
                <div class="card course-card">
                    <div class="course-img-container">
                        <img src="<?php echo $course['img']; ?>" alt="<?php echo $course['name']; ?>">
                    </div>
                    <div class="p-4">
                        <span class="mode-tag">Regular & Distance</span>
                        <h3 class="course-name"><?php echo $course['name']; ?></h3>
                        <p class="text-muted small px-3">Advance your career with our industry-recognized premium degree programs.</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- SC/ST Free Courses Section -->
<div class="free-section shadow-sm">
    <div class="container">
        <h2 class="section-title">Scholarship Programs <br><small class="text-success" style="font-size: 1.2rem;">(FREE FOR SC/ST CATEGORY)</small></h2>
        <div class="scst-grid">
            <?php
            $free_courses = [
                ["name" => "BBA", "img" => "https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=400&q=60"],
                ["name" => "BCA", "img" => "images/BCA.png"],
                ["name" => "MCA", "img" => "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=400&q=60"],
                ["name" => "MSW", "img" => "images/MSW.png"],
                ["name" => "BSW", "img" => "https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=400&q=60"]
            ];
            foreach ($free_courses as $f_course): ?>
                <div class="card course-card">
                    <div class="course-img-container" style="height: 140px;">
                        <img src="<?php echo $f_course['img']; ?>" alt="<?php echo $f_course['name']; ?>">
                    </div>
                    <div class="p-3">
                        <h5 class="fw-bold mb-1"><?php echo $f_course['name']; ?></h5>
                        <span class="badge bg-success-light text-success w-100">Free Program</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Medical Courses Section -->
<div class="container mt-5 mb-5 pt-4">
    <h2 class="section-title">Free Medical Courses</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card course-card">
                <div class="course-img-container">
                    <img src="images/ANM.png" alt="ANM">
                </div>
                <div class="p-4 text-center">
                    <h3 class="course-name">ANM</h3>
                    <p class="text-muted">Auxiliary Nursing Midwifery</p>
                    <div class="text-danger fw-bold"><i class="bi bi-heart-pulse"></i> 100% Scholarship Available</div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card course-card">
                <div class="course-img-container">
                    <img src="images/GNM.png" alt="GNM">
                </div>
                <div class="p-4 text-center">
                    <h3 class="course-name">GNM</h3>
                    <p class="text-muted">General Nursing and Midwifery</p>
                    <div class="text-danger fw-bold"><i class="bi bi-hospital"></i> 100% Scholarship Available</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php' ?>