<?php 
include "../connection.php"; 
include "include/header.php"; 
$ID=$_GET['id'];
$querry="SELECT * FROM `images` WHERE id='$ID'";
$run=mysqli_query($conn,$querry);
$fd=mysqli_fetch_array($run);

?>

<!-- Main Container -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card upload-card p-4 bg-white shadow-lg" style="width: 100%; max-width: 450px;">
        
        <h4 class="text-primary fw-bold mb-3 text-center">Upload File</h4>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-semibold">Select File (Image or Video)</label>
                <div class="card p-3 border-primary border-2">
                    <input type="file" name="file" id="fileInput" class="form-control" 
                           accept="image/*,video/*" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Upload</button>
        </form>

        <!-- Preview Area -->
        <div id="preview" class="mt-3" style="display:none;">
            <h6 class="fw-bold">Preview:</h6>

            <!-- Image Preview -->
            <img id="previewImg" src="" 
                 class="img-fluid rounded border p-1" 
                 style="display:none;">

            <!-- Video Preview -->
            <video id="previewVideo" controls 
                   class="img-fluid rounded border p-1" 
                   style="display:none;">
                <source id="previewVideoSrc" src="">
            </video>
        </div>

    </div>
</div>

<!-- Preview Script -->
<script>
document.getElementById("fileInput").addEventListener("change", function(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById("preview");
            const img = document.getElementById("previewImg");
            const video = document.getElementById("previewVideo");
            const videoSrc = document.getElementById("previewVideoSrc");

            preview.style.display = "block";

            if (file.type.startsWith("image/")) {
                img.style.display = "block";
                video.style.display = "none";
                img.src = e.target.result;
            } 
            else if (file.type.startsWith("video/")) {
                img.style.display = "none";
                video.style.display = "block";
                videoSrc.src = e.target.result;
                video.load();
            } 
            else {
                preview.style.display = "none";
            }
        };

        reader.readAsDataURL(file);
    }
});
</script>

<!-- Upload PHP -->
<?php  
if (isset($_FILES['file']['name'])) {

    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];

    // Folder
    $folder = "uploads/" . $filename;

    // Create folder if not exists
    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    // Upload file
    if (move_uploaded_file($tempname, $folder)) {

        // Insert into database
        $q="UPDATE `images` SET `name`='$filename',`path`='$folder' WHERE id='$ID'";
        $r=mysqli_query($conn,$q);
        if($r){
           echo "<script>alert('File Update Successfully!');</script>"; 
        }else{
            echo "Database Error: " . $stmt->error; 
        }
        // $stmt = $conn->prepare("INSERT INTO images (name, path) VALUES (?, ?)");
        // $stmt->bind_param("ss", $filename, $folder);

        // if ($stmt->execute()) {
        //     echo "<script>alert('File Uploaded Successfully!');</script>";
        // } else {
        //     echo "Database Error: " . $stmt->error;
        // }

        // $stmt->close();
    } else {
        echo "<script>alert('Error uploading file!');</script>";
    }
}
?>

<?php include "include/footer.php"; ?>
