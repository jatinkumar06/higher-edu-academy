<?php
include "../connection.php";
include "include/header.php";
?>


<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top:100px">
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin:auto;">
            <h3 class="text-center text-primary mb-3">Add College Type</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Select Course Type</label>
                    <select name="coursetype" class="form-control" required>
                        <option value="" disabled selected>Select course type</option>
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
                    <label class="form-label">College Type</label>
                    <input type="text" name="collegetype" class="form-control" placeholder="eg- BBA College or MBA college" required>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label">Choose Images</label>
                    <input type="file" name="images" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">College Details</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Write college details here..." style="resize: none;" required></textarea>
                </div> -->
                <button type="submit" name="upload" class="btn btn-primary w-100">
                    ADD COLLEGE
                </button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['upload'])) {

    $coursetype = $_POST['coursetype'];
    $collegetype = $_POST['collegetype'];
   



    $sql = "INSERT INTO  collegetype (coursetype,collegetype)
        VALUES ('$coursetype','$collegetype')";


    if ($conn->query($sql)) {
        echo "<script>alert('College type added successfully!');</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}

include "include/footer.php";
?>