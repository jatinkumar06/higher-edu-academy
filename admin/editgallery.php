<?php
include "../connection.php";
include "include/header.php";
$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id=$id";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);
?>


<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Edit Gallery</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Gallery Name</label>
                    <input type="text" name="gallery_name" class="form-control" value="<?php echo $data['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Choose Images</label>
                    <input type="file" name="images" class="form-control">
                </div>

                <button type="submit" name="upload" class="btn btn-primary w-100">
                    Edit Image
                </button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {

    $gallery_name = $_POST['gallery_name'];

    $uploaded_paths = $_FILES['images']['name'];
    if (!empty($uploaded_paths)) {

        $temp_paths = $_FILES['images']['tmp_name'];
        move_uploaded_file($temp_paths, "uploads/" . $uploaded_paths);


        if (!is_dir("uploads")) {
            mkdir("uploads");
        }




        $sql = "INSERT INTO images (name, image, uploaded_at)
        VALUES ('$gallery_name', '$uploaded_paths', NOW())";


        if ($conn->query($sql)) {
            echo "<script>alert(' Images Uploaded Successfully!'); window.location.href='gallery.php';</script>";
        } else {
            echo "Database Error: " . $conn->error;
        }
    }
    else {
        $sql = "UPDATE images SET name='$gallery_name' WHERE id=$id";
        if ($conn->query($sql)) {
            echo "<script>alert('Gallery Name Updated Successfully!'); window.location.href='gallery.php';</script>";
        } else {
            echo "Database Error: " . $conn->error;
        }
    }
}

include "include/footer.php";
?>