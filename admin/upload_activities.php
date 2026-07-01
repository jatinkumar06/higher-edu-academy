<?php
include "include/header.php";
include "../connection.php";

if (isset($_POST['upload'])) {

    $activities_name = $_POST['actvities_name'];
    $content = $_POST['content'];

    // Handle Front Image
    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    $front_image_name = $_FILES['front_image']['name'];
    $front_tmp_name = $_FILES['front_image']['tmp_name'];
    $front_new_name = time() . "_" . rand(1000,9999) . "_" . $front_image_name;
    $front_path = "uploads/" . $front_new_name;

    if (!move_uploaded_file($front_tmp_name, $front_path)) {
        echo "<script>alert('Failed to upload front image');</script>";
        exit;
    }

    // Handle Multiple Images
    $uploaded_paths = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $newName = time() . "_" . rand(1000,9999) . "_" . $name;
            $path = "uploads/" . $newName;

            if (move_uploaded_file($tmp_name, $path)) {
                $uploaded_paths[] = $path;
            }
        }
    }

    $json_paths = json_encode($uploaded_paths);

    // Insert into activities table
    $sql = "INSERT INTO `activities`(`activities_name`, `title_image`, `content`, `images`) 
            VALUES ('$activities_name', '$front_path', '$content', '$json_paths')";

    if ($conn->query($sql)) {
                   echo "<script>alert('Activity Added Successfully!'); window.location='activity.php';</script>";

    } else {
        echo "Database Error: " . $conn->error;
    }
}
?>

<div class="d-flex justify-content-center align-items-center mt-5" style="min-height: 75vh;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">ADD ACTIVITIES</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Activities Name</label>
                    <input type="text" name="actvities_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Front Image</label>
                    <input type="file" name="front_image" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea id="insurance_details" class="form-control" name="content"></textarea>
                </div>

                <!-- Summernote Links -->
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#insurance_details').summernote({
                            height: 200,
                            toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'underline', 'clear']],
                                ['fontname', ['fontname']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['insert', ['link']],
                                ['view', ['codeview']]
                            ]
                        });
                    });
                </script>

                <div class="mb-3">
                    <label class="form-label">Choose Multiple Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" name="upload" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>
