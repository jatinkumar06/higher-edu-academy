<?php
include "../connection.php";
include "include/header.php";

$id = intval($_GET['id']);

$sql = "SELECT * FROM colleges WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh;">
  <div class="container">
    <div class="card shadow p-4" style="max-width: 600px; margin:auto; margin-top:90px; margin-bottom:90px;">
      <h3 class="text-center text-primary mb-3">Edit College</h3>

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label class="form-label">College Type</label>
          <select name="college_type" class="form-control" required>
            <option value="" disabled>Select college type</option>
            <option value="Management"  <?php echo $data['college_type'] == 'Management'  ? 'selected' : ''; ?>>Management</option>
            <option value="Engineering" <?php echo $data['college_type'] == 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
            <option value="Medical"     <?php echo $data['college_type'] == 'Medical'     ? 'selected' : ''; ?>>Medical</option>
            <option value="Dental"      <?php echo $data['college_type'] == 'Dental'      ? 'selected' : ''; ?>>Dental</option>
            <option value="Commerce"    <?php echo $data['college_type'] == 'Commerce'    ? 'selected' : ''; ?>>Commerce</option>
            <option value="Law"         <?php echo $data['college_type'] == 'Law'         ? 'selected' : ''; ?>>Law</option>
            <option value="other"       <?php echo $data['college_type'] == 'other'       ? 'selected' : ''; ?>>Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">College Name</label>
          <input type="text" name="college_name" class="form-control"
                 value="<?php echo htmlspecialchars($data['college_name']); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">College Details</label>
          <textarea name="college_details" class="form-control" rows="10" required><?php echo htmlspecialchars($data['college_details']); ?></textarea>
        </div>

        <!-- Current Photo Preview -->
        <div class="mb-3">
          <label class="form-label">Current Image</label><br>
          <img src="uploads/<?php echo htmlspecialchars($data['college_photo']); ?>"
               style="width:100%; height:200px; object-fit:cover; border-radius:8px;" alt="Current Photo">
        </div>

        <div class="mb-3">
          <label class="form-label">Change College Photo</label>
          <input type="file" name="college_photo" class="form-control">
          <small class="text-muted">Leave empty to keep existing image</small>
        </div>

        <!-- ✅ Current Logo Preview -->
        <div class="mb-3">
          <label class="form-label">Current Logo</label><br>
          <?php if (!empty($data['logo'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($data['logo']); ?>"
                 style="width:150px; height:150px; object-fit:contain; border:1px solid #ddd; border-radius:8px; padding:5px;" alt="Current Logo">
          <?php else: ?>
            <p class="text-muted">No logo uploaded yet.</p>
          <?php endif; ?>
        </div>

        <!-- ✅ Change Logo Input -->
        <div class="mb-4">
          <label class="form-label">Change College Logo</label>
          <input type="file" name="logo" class="form-control">
          <small class="text-muted">Leave empty to keep existing logo</small>
        </div>

        <button type="submit" name="update" class="btn btn-primary w-100">
          Update College
        </button>

      </form>
    </div>
  </div>
</div>

<?php
if (isset($_POST['update'])) {

  $college_type    = $_POST['college_type'];
  $college_name    = $_POST['college_name'];
  $college_details = $_POST['college_details'];

  // Create uploads folder if not exists
  if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
  }

  // ✅ Handle photo upload
  $new_photo = false;
  if (!empty($_FILES['college_photo']['name'])) {
    $photo_name = $_FILES['college_photo']['name'];
    $temp_name  = $_FILES['college_photo']['tmp_name'];
    move_uploaded_file($temp_name, "uploads/" . $photo_name);
    $new_photo = $photo_name;
  }

  // ✅ Handle logo upload
  $new_logo = false;
  if (!empty($_FILES['logo']['name'])) {
    $logo_name      = $_FILES['logo']['name'];
    $temp_logo_name = $_FILES['logo']['tmp_name'];
    move_uploaded_file($temp_logo_name, "uploads/" . $logo_name);
    $new_logo = $logo_name;
  }

  // ✅ Build query based on what was uploaded
  if ($new_photo && $new_logo) {
    // Both photo and logo changed
    $stmt = $conn->prepare("UPDATE colleges SET
                              college_type    = ?,
                              college_name    = ?,
                              college_photo   = ?,
                              college_details = ?,
                              logo            = ?
                            WHERE id = ?");
    $stmt->bind_param("sssssi", $college_type, $college_name, $new_photo, $college_details, $new_logo, $id);

  } elseif ($new_photo && !$new_logo) {
    // Only photo changed
    $stmt = $conn->prepare("UPDATE colleges SET
                              college_type    = ?,
                              college_name    = ?,
                              college_photo   = ?,
                              college_details = ?
                            WHERE id = ?");
    $stmt->bind_param("ssssi", $college_type, $college_name, $new_photo, $college_details, $id);

  } elseif (!$new_photo && $new_logo) {
    // Only logo changed
    $stmt = $conn->prepare("UPDATE colleges SET
                              college_type    = ?,
                              college_name    = ?,
                              college_details = ?,
                              logo            = ?
                            WHERE id = ?");
    $stmt->bind_param("ssssi", $college_type, $college_name, $college_details, $new_logo, $id);

  } else {
    // Neither changed — text fields only
    $stmt = $conn->prepare("UPDATE colleges SET
                              college_type    = ?,
                              college_name    = ?,
                              college_details = ?
                            WHERE id = ?");
    $stmt->bind_param("sssi", $college_type, $college_name, $college_details, $id);
  }

  if ($stmt->execute()) {
    echo "<script>alert('College Updated Successfully!'); window.location.href='colleges.php';</script>";
  } else {
    echo "Database Error: " . $conn->error;
  }
}

include "include/footer.php";
?>