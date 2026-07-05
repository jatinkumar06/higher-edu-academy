<?php
include "../connection.php";
include "include/header.php";

$id = intval($_GET['id']);

$sql = "SELECT * FROM university WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px;margin-bottom:100px;">
  <div class="container">
    <div class="card shadow p-4" style="max-width: 600px; margin:auto; margin-top:90px;">
      <h3 class="text-center text-primary mb-3">Edit University</h3>

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label class="form-label">University Name</label>
          <input type="text" name="university_name" class="form-control"
                 value="<?php echo htmlspecialchars($data['university_name']); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">University Details</label>
          <textarea name="university_details" class="form-control" rows="10" required><?php echo htmlspecialchars($data['university_details']); ?></textarea>
        </div>

        <!-- Current Image Preview -->
        <div class="mb-3">
          <label class="form-label">Current Image</label><br>
          <img src="uploads/<?php echo htmlspecialchars($data['university_photo']); ?>"
               style="width:100%; height:200px; object-fit:cover; border-radius:8px;" alt="Current Photo">
        </div>

        <div class="mb-3">
          <label class="form-label">Change University Photo</label>
          <input type="file" name="university_photo" class="form-control">
          <small class="text-muted">Leave empty to keep existing image</small>
        </div>

        <!-- ✅ Current Logo Preview -->
        <div class="mb-3">
          <label class="form-label">Current Logo</label><br>
          <img src="uploads/logo/<?php echo htmlspecialchars($data['logo']); ?>"
               style="width:150px; height:150px; object-fit:contain; border:1px solid #ddd; border-radius:8px; padding:5px;" alt="Current Logo">
        </div>

        <!-- ✅ Change Logo Input -->
        <div class="mb-4">
          <label class="form-label">Change University Logo</label>
          <input type="file" name="logo" class="form-control">
          <small class="text-muted">Leave empty to keep existing logo</small>
        </div>

        <button type="submit" name="update" class="btn btn-primary w-100">
          Update University
        </button>

      </form>
    </div>
  </div>
</div>

<?php
if (isset($_POST['update'])) {

  $university_name    = $_POST['university_name'];
  $university_details = $_POST['university_details'];

  // Create uploads folder if not exists
  if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
  }
  if (!is_dir("uploads/logo")) {
    mkdir("uploads/logo", 0777, true);
  }

  // ✅ Handle photo upload
  $new_photo = false;
  if (!empty($_FILES['university_photo']['name'])) {
    $photo_name = $_FILES['university_photo']['name'];
    $temp_name  = $_FILES['university_photo']['tmp_name'];
    move_uploaded_file($temp_name, "uploads/" . $photo_name);
    $new_photo = $photo_name;
  }

  // ✅ Handle logo upload
  $new_logo = false;
  if (!empty($_FILES['logo']['name'])) {
    $logo_name      = $_FILES['logo']['name'];
    $temp_logo_name = $_FILES['logo']['tmp_name'];
    move_uploaded_file($temp_logo_name, "uploads/logo/" . $logo_name);
    $new_logo = $logo_name;
  }

  // ✅ Build query dynamically based on what was uploaded
  if ($new_photo && $new_logo) {
    // Both photo and logo changed
    $stmt = $conn->prepare("UPDATE university SET 
                              university_name = ?, 
                              university_photo = ?, 
                              university_details = ?,
                              logo = ?
                            WHERE id = ?");
    $stmt->bind_param("ssssi", $university_name, $new_photo, $university_details, $new_logo, $id);

  } elseif ($new_photo && !$new_logo) {
    // Only photo changed
    $stmt = $conn->prepare("UPDATE university SET 
                              university_name = ?, 
                              university_photo = ?, 
                              university_details = ? 
                            WHERE id = ?");
    $stmt->bind_param("sssi", $university_name, $new_photo, $university_details, $id);

  } elseif (!$new_photo && $new_logo) {
    // Only logo changed
    $stmt = $conn->prepare("UPDATE university SET 
                              university_name = ?, 
                              university_details = ?,
                              logo = ?
                            WHERE id = ?");
    $stmt->bind_param("sssi", $university_name, $university_details, $new_logo, $id);

  } else {
    // Neither changed — update text fields only
    $stmt = $conn->prepare("UPDATE university SET 
                              university_name = ?, 
                              university_details = ? 
                            WHERE id = ?");
    $stmt->bind_param("ssi", $university_name, $university_details, $id);
  }

  if ($stmt->execute()) {
    echo "<script>alert('University Updated Successfully!'); window.location.href='university.php';</script>";
  } else {
    echo "Database Error: " . $conn->error;
  }
}

include "include/footer.php";
?>