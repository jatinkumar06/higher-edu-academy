<?php
include "include/header.php";
include "../connection.php";
?>

<!-- MAIN CONTENT WRAPPER -->
<div class="main-content">

    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container-fluid">
            <div>
                <button class="btn btn-primary" onclick="window.location.href='adduniversity.php'">ADD UNIVERSITY</button>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="card-title">Universities</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>PHOTO</th>
                                            <th>LOGO</th>  <!-- ✅ Added -->
                                            <th>UNIVERSITY NAME</th>
                                            <th>DETAILS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM university ORDER BY id DESC";
                                        $run = mysqli_query($conn, $qry);

                                        if ($run && mysqli_num_rows($run) > 0) {
                                            $count = 1;
                                            while ($d = mysqli_fetch_assoc($run)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>

                                                    <td>
                                                        <img src="uploads/<?php echo htmlspecialchars($d['university_photo']); ?>"
                                                            alt="<?php echo htmlspecialchars($d['university_name']); ?>"
                                                            style="width:80px; height:60px; object-fit:cover; border-radius:4px;">
                                                    </td>

                                                    <!-- ✅ Logo Column Added -->
                                                    <td>
                                                        <?php if (!empty($d['logo'])): ?>
                                                            <img src="uploads/logo/<?php echo htmlspecialchars($d['logo']); ?>"
                                                                alt="<?php echo htmlspecialchars($d['university_name']); ?> Logo"
                                                                style="width:60px; height:60px; object-fit:contain; border:1px solid #ddd; border-radius:4px; padding:3px;">
                                                        <?php else: ?>
                                                            <span class="badge bg-secondary">No Logo</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><?php echo htmlspecialchars($d['university_name']); ?></td>

                                                    <td>
                                                        <?php echo htmlspecialchars(substr($d['university_details'], 0, 80)); ?>...
                                                    </td>

                                                    <td>
                                                        <a href="edituniversity.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>
                                                        <a href="deleteuniversity.php?id=<?php echo $d['id']; ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this university?');">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- page-content end -->

</div> <!-- main-content end -->

<?php include "include/footer.php"; ?>