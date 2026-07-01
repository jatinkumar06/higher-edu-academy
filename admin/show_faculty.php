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

                            <h5 class="card-title">Faculty Details</h5>
                            <!-- <p class="card-title-desc">
                                DataTables has most features enabled by default. Just use:
                                <code>$().DataTable();</code>
                            </p> -->

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>POSITION/DEPARTMENT</th>
                                            <th>IMAGE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM `teachersdata`";
                                        $run = mysqli_query($conn, $qry);
                                        if ($run) {
                                            $count = 1;
                                            while ($d = mysqli_fetch_array($run)) {
                                                $imagePath = $d['images'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $d['names'] ?></td>

                                                    <td><?php echo $d['department'] ?></td>
                                                    <td>
                                                        <img src="<?php echo $imagePath; ?>" height="80" alt="Faculty Image">
                                                    </td>
                                                    <td>
                                                        <a href="updatefaulty.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>
                                                        <a href="deletefaculty.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm">
                                                            DELETE
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