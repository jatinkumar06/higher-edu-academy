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
    
    // New fields
    $course_overview = mysqli_real_escape_string($conn, $_POST['course_overview']);
    $eligible_criteria = mysqli_real_escape_string($conn, $_POST['eligible_criteria']);
    $syllabus = mysqli_real_escape_string($conn, $_POST['syllabus']);
    $price_structure = mysqli_real_escape_string($conn, $_POST['price_structure']);
    $installment_view = mysqli_real_escape_string($conn, $_POST['installment_view']);
    $course_fee = mysqli_real_escape_string($conn, $_POST['course_fee']);
    $course_start_date = mysqli_real_escape_string($conn, $_POST['course_start_date']);
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
            SET name='$activities_name', image='$front_path', content='$content', 
                course_overview='$course_overview', eligible_criteria='$eligible_criteria', syllabus='$syllabus', 
                price_structure='$price_structure', installment_view='$installment_view', 
                course_fee='$course_fee', course_start_date='$course_start_date'
            WHERE id='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Course Updated Successfully!'); window.location='courses.php';</script>";
    } else {
        echo "Database Error: " . $conn->error;
    }
}
?>


<!-- Google Fonts & FontAwesome -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        background-color: #f4f7fe;
        font-family: 'Inter', sans-serif;
    }
    .form-card {
        background: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
    .form-label {
        font-weight: 600;
        color: #444;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }
    .form-label i {
        margin-right: 8px;
        color: #4e73df;
        width: 20px;
        text-align: center;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e1e5ef;
        transition: all 0.2s ease;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.1);
    }
    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2e3d62;
        margin: 25px 0 15px 0;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f2f9;
    }
    .btn-submit {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        padding: 14px;
        color: white;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 8px;
        margin-top: 20px;
        transition: transform 0.2s;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
        color: white;
    }
    .image-preview-box {
        background: #f8f9fc;
        border: 2px dashed #d1d3e2;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card form-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark">Edit Course</h2>
                    <p class="text-muted">Update the details below to modify the course.</p>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <!-- Section: Basic Information -->
                    <div class="section-title mt-0">
                        <i class="fas fa-info-circle me-2"></i> Basic Information
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label"><i class="fas fa-book"></i> Course Name</label>
                            <input type="text" name="actvities_name" class="form-control" value="<?php echo htmlspecialchars($data['name']); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-tag"></i> Course Fee (INR)</label>
                            <input type="text" name="course_fee" class="form-control" value="<?php echo htmlspecialchars($data['course_fee'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Start Date</label>
                            <input type="date" name="course_start_date" class="form-control" value="<?php echo htmlspecialchars($data['course_start_date'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Section: Course Details -->
                    <div class="section-title">
                        <i class="fas fa-align-left me-2"></i> Course Curriculum & Details
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-eye"></i> Course Overview</label>
                        <textarea name="course_overview" class="form-control" rows="2" required><?php echo htmlspecialchars($data['course_overview'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-user-check"></i> Eligibility Criteria</label>
                            <textarea name="eligible_criteria" class="form-control" rows="3" required><?php echo htmlspecialchars($data['eligible_criteria'] ?? ''); ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-list-ul"></i> Syllabus Outline</label>
                            <textarea name="syllabus" class="form-control" rows="3" required><?php echo htmlspecialchars($data['syllabus'] ?? ''); ?></textarea>
                        </div>
                    </div>

                    <!-- Section: Pricing -->
                    <div class="section-title">
                        <i class="fas fa-credit-card me-2"></i> Pricing & Installments
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-file-invoice-dollar"></i> Price Structure</label>
                            <textarea name="price_structure" class="form-control" rows="2" required><?php echo htmlspecialchars($data['price_structure'] ?? ''); ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-clock"></i> Installment Options</label>
                            <textarea name="installment_view" class="form-control" rows="2" required><?php echo htmlspecialchars($data['installment_view'] ?? ''); ?></textarea>
                        </div>
                    </div>

                    <!-- Section: Media & Rich Text -->
                    <div class="section-title">
                        <i class="fas fa-photo-video me-2"></i> Media & Description
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-image"></i> Course Cover Image</label>
                        <p class="text-muted small mb-2">Leave blank to keep the existing image.</p>
                        <?php if(!empty($data['image'])): ?>
                            <div class="mb-2">
                                <img src="<?php echo htmlspecialchars($data['image']); ?>" alt="Current Image" style="max-height: 100px; border-radius: 5px; object-fit: cover;">
                            </div>
                        <?php endif; ?>
                        <div class="image-upload-wrapper">
                            <input type="file" name="front_image" class="form-control" id="imgInp">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-edit"></i> Full Course Description (Rich Text)</label>
                        <textarea id="insurance_details" class="form-control" rows="4" name="content"><?php echo htmlspecialchars($data['content'] ?? ''); ?></textarea>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" name="upload" class="btn btn-primary btn-submit w-100 shadow-sm">
                            <i class="fas fa-save me-2"></i> UPDATE COURSE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Summernote & Scripts -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#insurance_details').summernote({
            placeholder: 'Write the full detailed description here...',
            height: 300,
            theme: 'lite',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

<?php include "include/footer.php"; ?>
