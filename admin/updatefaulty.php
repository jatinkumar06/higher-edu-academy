<?php
include "include/header.php";
include "../connection.php";
$ID=$_GET['id'];
$qry="SELECT * FROM `teachersdata` WHERE id='$ID'";
$run=mysqli_query($conn,$qry);
$data=mysqli_fetch_array($run);
?>

<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="col-12 col-sm-10 col-md-6 col-lg-4">

        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">Add Faculties</h5>
            </div>

            <div class="card-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Faculty Name</label>
                        <input type="text" class="form-control" name="Faculty_name" value="<?php echo $data['names']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="department" value ="<?php echo $data['department']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brief Profile</label>
                        <textarea id="details" class="form-control"  name="content"></textarea>
                    </div>

                    <!-- Summernote Links -->
                    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            $('#details').summernote({
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

                    <button type="submit" class="btn btn-primary w-100" name="save">
                        Save Faculty Details
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<?php
// PHP Save Code
if (isset($_POST['save'])) {

    $name = $_POST['Faculty_name'];
    $department = $_POST['department'];
    $content = $_POST['content'];

    $filename  = $_FILES['file']['name'];
    $tempname  = $_FILES['file']['tmp_name'];

    // Upload folder
    $folder = "uploads/" . $filename;

    // Create folder if not exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // Upload file
    if (move_uploaded_file($tempname, $folder)) {

        // INSERT USING CORRECT COLUMN NAME (image not images)
        $qry="UPDATE `teachersdata` SET `names`='$name',`images`='$folder',`department`='$department',`profile`='$content' WHERE id='$ID'";
        $run=mysqli_query($conn,$qry);
        if($run){
            echo "<script>alert('Update Successfully'); window.location='add_teacher.php';</script>";
        }
        else{
           echo "<script>alert('error'); window.location='add_teacher.php';</script>"; 
        }
        // $stmt = $con->prepare("INSERT INTO teachersdata (names, images, department) VALUES (?, ?, ?)");
        // $stmt->bind_param("sss", $name, $filename, $department);

        // if ($stmt->execute()) {
        //     echo "<script>alert('Faculty Added Successfully'); window.location='add_teacher.php';</script>";
        // } else {
        //     echo "<h3>DB Error: " . $stmt->error . "</h3>";
        // }

        // $stmt->close();

    } else {
        echo "<h3>File Upload Failed</h3>";
    }
} 

?>

<?php include "include/footer.php"; ?>
