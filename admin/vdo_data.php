
<?php include "include/header.php";
include "../connection.php";
?>

<!-- MAIN CONTENT WRAPPER -->
<div class="main-content">

    <!-- PAGE CONTENT (auto fits between header & footer + supports sidebar) -->
    <div class="page-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                          

                            <div class="table-responsive">
                                <h2 class="text-center mb-4">Manage Videos</h2>

                                <a href="uploadvideo.php" class="btn btn-primary mb-3">Add New Video</a>

                                <table class="table table-bordered table-striped bg-white shadow">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Video</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $count=1;
                                        $qry = mysqli_query($conn, "SELECT * FROM video ORDER BY created_at DESC");
                                        while ($row = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                              <td><?php echo $count++; ?></td>
                                                <td>
                                                    <?php if ($row['name']) { ?>
                                                        <a href="<?= $row['name'] ?>" target="_blank">View vdo</a>
                                                    <?php } else echo "No File"; ?>
                                                </td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td>
                                                    <a href="edit_vdo.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="deletevdo.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this notice?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
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