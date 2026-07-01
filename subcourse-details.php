<?php
include "include/header.php";
include "connection.php";

if (!isset($_GET['id'])) {
    echo "Invalid Course";
    exit;
}

$id = intval($_GET['id']);

$q = "SELECT * FROM subcourse WHERE id='$id'";
$r = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($r);

if (!$data) {
    echo "Course not found";
    exit;
}
?>

<style>
    /* Main Image */
    .subcourse-img {
        width: 100%;
        height: 450px;
        object-fit: fill;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    /* Sidebar Card */
    .sidebar-card {
        background: #bcd0e3;
        border-radius: 14px;
        padding: 22px 18px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        border-left: 6px solid #0d6efd;
        position: sticky;
        top: 110px;
    }

    /* Sidebar Title */
    .sidebar-card h5 {
        font-size: 1.25rem;
        font-weight: 800;
        color: #0d6efd;
        text-align: center;
        margin-bottom: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Sidebar List */
    .sidebar-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-list li {
        margin-bottom: 14px;
    }

    /* Sidebar Item */
    .sidebar-list a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        background: #f8f9ff;
        transition: all 0.3s ease;
    }

    /* Thumbnail Image */
    .sidebar-thumb {
        width: 55px;
        height: 45px;
        object-fit: fill;
        border-radius: 8px;
        flex-shrink: 0;
    }

    /* Course Title */
    .sidebar-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: #212529;
        line-height: 1.3;
    }

    /* Hover Effect */
    .sidebar-list a:hover {
        background: #0d6efd;
    }

    .sidebar-list a:hover .sidebar-title {
        color: #ffffff;
    }

    /* Mobile */
    @media (max-width: 767px) {
        .sidebar-card {
            position: static;
            margin-top: 30px;
        }
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row">

        <!-- MAIN CONTENT -->
        <div class="col-lg-9 col-md-12">

            <?php if (!empty($data['image'])) { ?>
                <img src="admin/uploads/subcourse/<?php echo $data['image']; ?>"
                    alt="<?php echo $data['subcourse']; ?>"
                    class="subcourse-img mb-4">
            <?php } ?>

            <h2 class="fw-bold mb-3"><?php echo $data['subcourse']; ?></h2>

            <p class="fs-5" style="text-align: justify;">
                <?php echo nl2br($data['details']); ?>
            </p>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="col-lg-3 col-md-12">

            <?php
            $typeId = $data['collegetypeid'];
            $currentId = $data['id'];

            $relQry = "SELECT id, subcourse, image 
                       FROM subcourse 
                       WHERE collegetypeid='$typeId' 
                       AND id != '$currentId'";
            $relRun = mysqli_query($conn, $relQry);

            if (mysqli_num_rows($relRun) > 0) {
            ?>
                <div class="sidebar-card">
                    <h5>Related Courses</h5>

                    <ul class="sidebar-list">
                        <?php while ($rel = mysqli_fetch_assoc($relRun)) { ?>
                            <li>
                                <a href="subcourse-details.php?id=<?php echo $rel['id']; ?>">

                                    <img src="admin/uploads/subcourse/<?php echo $rel['image']; ?>"
                                        alt="<?php echo $rel['subcourse']; ?>"
                                        class="sidebar-thumb">

                                    <span class="sidebar-title">
                                        <?php echo $rel['subcourse']; ?>
                                    </span>

                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div style="text-align: center;">
                        <button
                            type="button"
                            class="btn btn-gradient enquiry-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#enquiryModal"
                            data-course="Select course">
                            Enquiry Now
                        </button>

                    </div>

                </div>
            <?php } ?>
        </div>

    </div>
</div>
<div class="modal fade" id="enquiryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content enquiry-modal">

      <!-- Header -->
      <div class="modal-header text-white text-center">
        <h5 class="modal-title w-100">
          <i class="bi bi-chat-dots-fill me-2"></i> Enquiry Form
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form action="" method="POST">

          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Courses</label>
            <select name="subject" id="courseSelect" class="form-control" required>
              <option value="" disabled>Select course</option>
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
            <textarea name="message" class="form-control" rows="3" required></textarea>
          </div>

          <div class="text-center">
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
        $phone   = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if ($name && $email && $phone && $subject && $message) {

          $stmt = $conn->prepare(
            "INSERT INTO contact (name, email, phone, courses, message) VALUES (?, ?, ?, ?, ?)"
          );
          $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

          if ($stmt->execute()) {
            echo "<script>
              alert('Thank you for your enquiry. Our team will contact you shortly.');
              window.location.href = window.location.href;
            </script>";
          } else {
            echo "<script>alert('Something went wrong. Try again.');</script>";
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
<style>
.enquiry-modal {
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
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
  border-radius: 30px;
  padding: 8px;
  font-weight: 600;
  border: none;
}

.btn-gradient:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const enquiryModal = document.getElementById("enquiryModal");
  const courseSelect = document.getElementById("courseSelect");

  enquiryModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const course = button.getAttribute("data-course");

    if (course) {
      courseSelect.value = course;
    }
  });
});
</script>

<?php include "include/footer.php"; ?>