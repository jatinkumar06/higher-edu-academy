<?php 
include "../connection.php"; 
include "include/header.php"; 
?>


<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Upload  Images</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Gallery Name</label>
                    <input type="text" name="gallery_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Choose  Images</label>
                    <input type="file" name="images" class="form-control"  required>
                </div>

                <button type="submit" name="upload" class="btn btn-primary w-100">
                    Upload  Image
                </button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {

    $gallery_name = $_POST['gallery_name'];
 
    $uploaded_paths = $_FILES['images']['name'];
    $temp_paths = $_FILES['images']['tmp_name'];
    move_uploaded_file($temp_paths, "uploads/" . $uploaded_paths);
    

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    


   $sql = "INSERT INTO images (name, image, uploaded_at)
        VALUES ('$gallery_name', '$uploaded_paths', NOW())";


    if ($conn->query($sql)) {
        echo "<script>alert('All Images Uploaded Successfully!');</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}

include "include/footer.php";
?>
