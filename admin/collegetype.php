<?php
include "include/header.php";
include "../connection.php";
?>

<!-- MAIN CONTENT WRAPPER -->
<div class="main-content">

    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container-fluid">

            <div class="mb-3">
                <button class="btn btn-primary" onclick="window.location.href='addcollegetype.php'">
                    ADD COLLEGE TYPE
                </button>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="card-title mb-3">College Types</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>COURSE TYPE</th>
                                            <th>COLLEGE TYPE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM collegetype ORDER BY id DESC";
                                        $run = mysqli_query($conn, $qry);

                                        if ($run && mysqli_num_rows($run) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($run)) {
                                        ?>
                                                <tr>
                                                    <td><?= $count++; ?></td>
                                                    <td><?= htmlspecialchars($row['coursetype']); ?></td>
                                                    <td><?= htmlspecialchars($row['collegetype']); ?></td>
                                                    <td>
                                                        <a href="editcollegetype.php?id=<?= $row['id']; ?>"
                                                           class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>

                                                        <a href="deletecollegetype.php?id=<?= $row['id']; ?>"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('Are you sure you want to delete this college type?');">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='4' class='text-center'>No data found</td></tr>";
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
    </div><!-- page-content end -->

</div><!-- main-content end -->

<?php include "include/footer.php"; ?>
