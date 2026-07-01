<?php
include "../connection.php";
include "include/header.php";

/* ================= GET EXISTING DATA ================= */
if (!isset($_GET['id'])) {
    header("Location: collegetypelist.php");
    exit;
}

$id = intval($_GET['id']);

$qry = "SELECT * FROM collegetype WHERE id = $id";
$run = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($run);

if (!$data) {
    echo "<script>alert('Invalid ID'); window.location='collegetypelist.php';</script>";
    exit;
}
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Update College Type</h3>

            <form action="" method="POST">
                <!-- Course Type -->
                <div class="mb-3">
                    <label class="form-label">Select Course Type</label>
                    <select name="coursetype" class="form-control" required>
                        <option value="">Select course type</option>
                        <?php
                        $courses = ['Management','Engineering','Medical','Dental','Commerce','Law','Other'];
                        foreach ($courses as $course) {
                            $selected = ($data['coursetype'] == $course) ? 'selected' : '';
                            echo "<option value='$course' $selected>$course</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- College Type -->
                <div class="mb-3">
                    <label class="form-label">College Type</label>
                    <input type="text"
                           name="collegetype"
                           class="form-control"
                           value="<?= htmlspecialchars($data['collegetype']); ?>"
                           required>
                </div>

                <button type="submit" name="update" class="btn btn-primary w-100">
                    UPDATE COLLEGE TYPE
                </button>
            </form>
        </div>
    </div>
</div>

<?php
/* ================= UPDATE DATA ================= */
if (isset($_POST['update'])) {

    $coursetype  = mysqli_real_escape_string($conn, $_POST['coursetype']);
    $collegetype = mysqli_real_escape_string($conn, $_POST['collegetype']);

    $sql = "UPDATE collegetype 
            SET coursetype = '$coursetype',
                collegetype = '$collegetype'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('College type updated successfully!');
              window.location='collegetype.php';</script>";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}

include "include/footer.php";
?>
