<?php 
include 'include/header.php'; 
include 'connection.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = "SELECT * FROM courses WHERE id = $id";
$result = mysqli_query($conn, $query);
$course = mysqli_fetch_assoc($result);

if(!$course) {
    echo "<div class='container mt-5' style='min-height: 50vh;'><h3>Course not found.</h3></div>";
    include 'include/footer.php';
    exit;
}
?>
  <main class="main">
    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="admin/<?php echo htmlspecialchars($course['image']); ?>" class="img-fluid" alt="">
            <h3><?php echo htmlspecialchars($course['name']); ?></h3>
            <div>
              <?php echo $course['content']; ?>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p><?php echo htmlspecialchars($course['course_fee'] ?? ''); ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Start Date</h5>
              <p><?php echo htmlspecialchars($course['course_start_date'] ?? ''); ?></p>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Courses Course Details Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Course Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Eligible Criteria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Syllabus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Price Structure</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Installment View</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Course Overview</h3>
                    <p><?php echo nl2br(htmlspecialchars($course['course_overview'] ?? '')); ?></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Eligible Criteria</h3>
                    <p><?php echo nl2br(htmlspecialchars($course['eligible_criteria'] ?? '')); ?></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Syllabus</h3>
                    <p><?php echo nl2br(htmlspecialchars($course['syllabus'] ?? '')); ?></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Price Structure</h3>
                    <p><?php echo nl2br(htmlspecialchars($course['price_structure'] ?? '')); ?></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Installment View</h3>
                    <p><?php echo nl2br(htmlspecialchars($course['installment_view'] ?? '')); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Tabs Section -->

  </main>

<?php include 'include/footer.php'; ?>