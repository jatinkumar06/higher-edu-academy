<?php
include "../connection.php";
include "include/header.php";
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Add SubCourse</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Course Type -->
                <div class="mb-3">
                    <label class="form-label">Select Course Type</label>
                    <select name="coursetype" id="coursetype" class="form-control" required>
                        <option value="" disabled selected>Select course type</option>
                        <option value="Management">Management</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Medical">Medical</option>
                        <option value="Dental">Dental</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Law">Law</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- College Type -->
                <div class="mb-3">
                    <label class="form-label">College Type</label>
                    <select name="collegetype" id="collegetype" class="form-control" required>
                        <option value="">Select college type</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Add SubCourse</label>
                    <input type="text" name="subcourse" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Add Content </label>
                    <!-- <input type="text" name="content" class="form-control"  required> -->
                    <textarea name="content" class="form-control" id="" required style="resize: none;"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Add Image </label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" name="upload" class="btn btn-primary w-100">
                    ADD SUBCOURSE
                </button>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#coursetype').on('change', function() {
            let coursetype = $(this).val();

            if (coursetype !== '') {
                $.ajax({
                    url: "fetch_collegetype.php",
                    type: "POST",
                    data: {
                        coursetype: coursetype
                    },
                    success: function(response) {
                        $('#collegetype').html(response);
                    }
                });
            } else {
                $('#collegetype').html('<option value="">Select college type</option>');
            }
        });
    });
</script>

<?php
/* ================= INSERT DATA ================= */
if (isset($_POST['upload'])) {

    // include "../connection.php";

    // ================= FORM DATA =================
    $coursetype  = mysqli_real_escape_string($conn, $_POST['coursetype']);
    $collegetype = mysqli_real_escape_string($conn, $_POST['collegetype']);
    $subcourse   = mysqli_real_escape_string($conn, $_POST['subcourse']);
    $details     = mysqli_real_escape_string($conn, $_POST['content']);
    $q = "SELECT * FROM `collegetype` WHERE coursetype='$coursetype' AND collegetype='$collegetype'";
    $r = mysqli_query($conn, $q);
    $d = mysqli_fetch_array($r);
    $collegetypeid = $d['id'];
    // ================= IMAGE UPLOAD =================
    $image_name = $_FILES['image']['name'];
    $image_tmp  = $_FILES['image']['tmp_name'];

    $folder = "uploads/subcourse/";
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $new_image = time() . "_" . $image_name;
    $image_path = $folder . $new_image;

    if (move_uploaded_file($image_tmp, $image_path)) {

        // ================= INSERT QUERY =================
        $sql = "INSERT INTO subcourse 
                (collegetypeid, subcourse, details, image)
                VALUES 
                ('$collegetypeid', '$subcourse', '$details', '$new_image')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('SubCourse added successfully');</script>";
        } else {
            echo "Database Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Image upload failed');</script>";
    }
}

include "include/footer.php";
?>