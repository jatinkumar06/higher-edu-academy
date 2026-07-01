<?php
include "../connection.php";
include "include/header.php";
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px;margin-bottom:100px;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Add University</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">University Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Images</label>
                    <input type="file" name="images" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Logo</label>
                    <input type="file" name="logo" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">University Details</label>
                    <textarea name="message" class="form-control" rows="10" placeholder="Write university details here..." style="resize: none;" required></textarea>
                </div>
                <button type="submit" name="upload" class="btn btn-primary w-100">
                    ADD University
                </button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {

    $collegename = $_POST['name'];
    $collegedetails = $_POST['message'];

    $uploaded_paths = $_FILES['images']['name'];
    $temp_paths = $_FILES['images']['tmp_name'];
    $logo_paths = $_FILES['logo']['name'];
    $temp_logo_paths = $_FILES['logo']['tmp_name'];
    // STEP 1: Create uploads folder if not exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // STEP 2: Move uploaded file
    move_uploaded_file($temp_paths, "uploads/" . $uploaded_paths);
    move_uploaded_file($temp_logo_paths, "uploads/" . $logo_paths);
    // STEP 3: Insert into database
    $sql = $conn->prepare("INSERT INTO university (university_name, university_photo, university_details,logo) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $collegename, $uploaded_paths, $collegedetails, $logo_paths);

    if ($sql->execute()) {
        echo "<script>alert('University added successfully!');</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}

include "include/footer.php";
?>