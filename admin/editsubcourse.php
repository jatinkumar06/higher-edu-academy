<?php
include "../connection.php";
include "include/header.php";
$id = $_GET['id'];
$q = "SELECT * FROM `subcourse` WHERE id='$id'";
$r = mysqli_query($conn, $q);
$d = mysqli_fetch_array($r);
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px;margin-bottom:100px ;">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Edit SubCourse</h3>

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
                    <label class="form-label">Edit SubCourse</label>
                    <input type="text" name="subcourse" class="form-control" value="<?php echo $d['subcourse']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edit Content </label>
                    <!-- <input type="text" name="content" class="form-control"  required> -->
                    <textarea name="content" class="form-control" id="" required style="resize: none;"><?php echo $d['details']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edit Image</label>
                    <input type="file" name="image" class="form-control">

                    <!-- Old Image Preview -->
                    <?php if (!empty($d['image'])) { ?>
                        <div class="mt-2">
                            <p class="mb-1 text-muted">Current Image:</p>
                            <img src="uploads/subcourse/<?php echo htmlspecialchars($d['image']); ?>"
                                alt="Old Image"
                                width="120"
                                class="img-thumbnail">
                        </div>
                    <?php } ?>
                </div>

                <button type="submit" name="upload" class="btn btn-primary w-100">
                    EDIT SUBCOURSE
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

    $coursetype  = mysqli_real_escape_string($conn, $_POST['coursetype']);
    $collegetype = mysqli_real_escape_string($conn, $_POST['collegetype']);
    $subcourse   = mysqli_real_escape_string($conn, $_POST['subcourse']);
    $details     = mysqli_real_escape_string($conn, $_POST['content']);

    // get college type id
    $q1 = "SELECT id FROM collegetype 
           WHERE coursetype='$coursetype' AND collegetype='$collegetype'";
    $r1 = mysqli_query($conn, $q1);
    $ct = mysqli_fetch_assoc($r1);
    $collegetypeid = $ct['id'];

    // OLD IMAGE
    $old_image = $d['image'];

    // NEW IMAGE CHECK
    if (!empty($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];
        $image_tmp  = $_FILES['image']['tmp_name'];

        $folder = "uploads/subcourse/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $new_image = time() . "_" . $image_name;
        move_uploaded_file($image_tmp, $folder . $new_image);

        // delete old image
        if (!empty($old_image) && file_exists($folder . $old_image)) {
            unlink($folder . $old_image);
        }

    } else {
        $new_image = $old_image; // keep old image
    }

    // UPDATE QUERY
    $sql = "UPDATE subcourse SET
                collegetypeid = '$collegetypeid',
                subcourse     = '$subcourse',
                details       = '$details',
                image         = '$new_image'
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('SubCourse updated successfully'); window.location='subcourse.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


include "include/footer.php";
?>