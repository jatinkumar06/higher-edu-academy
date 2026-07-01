<?php
include "include/header.php";
include "connection.php";

$id = intval($_GET['id']);

$q = "SELECT * FROM subcourse WHERE id='$id'";
$r = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($r);
?>
<style>
    .subcourse-img {
    width: 100%;
    max-width: 950px;
    height: 400px;
    object-fit: fill;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

</style>
<div class="container mt-5 mb-5">

    <!-- Image Section -->
    <?php if (!empty($data['image'])) { ?>
        <div class="d-flex justify-content-center mb-4">
            <img 
                src="admin/uploads/subcourse/<?php echo $data['image']; ?>" 
                alt="<?php echo $data['subcourse']; ?>" 
                class="subcourse-img">
        </div>
    <?php } ?>

    <!-- Subcourse Title -->
    <h2 class="text-center fw-bold mb-3">
        <?php echo $data['subcourse']; ?>
    </h2>

    <!-- Details -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <p class="text-justify fs-5" style="text-align: justify;">
                <?php echo nl2br($data['details']); ?>
            </p>
        </div>
    </div>

</div>

<?php include "include/footer.php"; ?>
