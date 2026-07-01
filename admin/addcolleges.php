<?php
include "../connection.php";
include "include/header.php";
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px;margin-bottom:100px;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Add College</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">College Type</label>
                    <select name="collegetype" class="form-control" required>
                        <option value="" disabled selected>Select college type</option>
                        <option value="Management">Management</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Medical">Medical</option>
                        <option value="Dental">Dental</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Law">Law</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">College Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Images</label>
                    <input type="file" name="images" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">College Logo</label>
                    <input type="file" name="logo" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">College Details</label>
                    <textarea name="message" class="form-control" rows="10" 
                              placeholder="Write college details here..." 
                              style="resize: none;" required></textarea>
                </div>
                <button type="submit" name="upload" class="btn btn-primary w-100">
                    ADD COLLEGE
                </button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {

    $collegename    = $_POST['name'];
    $collegetype    = $_POST['collegetype'];
    $collegedetails = $_POST['message'];

    $uploaded_paths = $_FILES['images']['name'];
    $temp_paths     = $_FILES['images']['tmp_name'];
     $uploaded_paths2 = $_FILES['logo']['name'];
    $temp_paths2     = $_FILES['logo']['tmp_name'];

    // ✅ STEP 1: Create folder first
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // ✅ STEP 2: Move file into folder
    move_uploaded_file($temp_paths, "uploads/" . $uploaded_paths);
    move_uploaded_file($temp_paths2, "uploads/" . $uploaded_paths2);


    // ✅ STEP 3: Insert with prepared statement
    $stmt = $conn->prepare("INSERT INTO colleges 
                            (college_type, college_name, college_photo,logo, college_details) 
                            VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss", $collegetype, $collegename, $uploaded_paths,$uploaded_paths2,$collegedetails);

    if ($stmt->execute()) {
        echo "<script>alert('College added successfully!');</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}

include "include/footer.php";
?>