<?php
include "include/header.php";
include "../connection.php";

$id = $_GET['id'];

$qry = "SELECT * FROM courses WHERE id='$id'";
$run = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($run);

if (isset($_POST['upload'])) {

    $activities_name = $_POST['actvities_name'];
    $content = $_POST['content'];

    // Default: keep old image
    $front_path = $data['image'];

    // If user selects a new image
    if (!empty($_FILES['front_image']['name'])) {

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $front_image_name = $_FILES['front_image']['name'];
        $front_tmp_name = $_FILES['front_image']['tmp_name'];
        $front_new_name = time() . "_" . rand(1000, 9999) . "_" . $front_image_name;
        $front_path = "uploads/" . $front_new_name;

        move_uploaded_file($front_tmp_name, $front_path);
    }

    // Update query
    $sql = "UPDATE courses 
            SET name='$activities_name', image='$front_path', content='$content' 
            WHERE id='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Course Updated Successfully!'); window.location='courses.php';</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}
?>


<div class="d-flex justify-content-center align-items-center mt-5" style="min-height: 75vh;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">EDIT COURSE</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="actvities_name" value="<?php echo $data['name'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"> Image</label>
                    <input type="file" name="front_image" class="form-control">
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

                <!-- <div class="mb-3">
                    <label class="form-label">Choose Multiple Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div> -->

                <button type="submit" name="upload" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include "include/footer.php";
?>
