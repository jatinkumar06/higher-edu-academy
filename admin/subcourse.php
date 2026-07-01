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
                <button class="btn btn-primary" onclick="window.location.href='addsubcourse.php'">
                    ADD SUBCOURSE
                </button>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="card-title mb-3">SubCourses</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>IMAGE</th>
                                            <th>COURSE TYPE</th>
                                            <th>COLLEGE TYPE</th>
                                            <th>SUBCOURSE</th>
                                            <th>DETAILS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM subcourse ORDER BY id DESC";
                                        $run = mysqli_query($conn, $qry);

                                        if ($run && mysqli_num_rows($run) > 0) {
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($run)) {
                                                $id=$row['collegetypeid'];
                                                $q="SELECT * FROM `collegetype` WHERE id='$id'";
                                                $r=mysqli_query($conn,$q);
                                                $d=mysqli_fetch_array($r);
                                                
                                        ?>
                                                <tr>
                                                    <td><?= $count++; ?></td>

                                                    <td>
                                                        <img src="uploads/subcourse/<?= htmlspecialchars($row['image']); ?>"
                                                             alt="<?= htmlspecialchars($row['subcourse']); ?>"
                                                             width="90">
                                                    </td>

                                                    <td><?= htmlspecialchars($d['coursetype']); ?></td>

                                                    <td><?= htmlspecialchars($d['collegetype']); ?></td>

                                                    <td><?= htmlspecialchars($row['subcourse']); ?></td>

                                                    <td>
                                                        <?= substr(htmlspecialchars($row['details']), 0, 80); ?>...
                                                    </td>

                                                    <td>
                                                        <a href="editsubcourse.php?id=<?= $row['id']; ?>"
                                                           class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>

                                                        <a href="deletesubcourse.php?id=<?= $row['id']; ?>"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('Are you sure you want to delete this subcourse?');">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>No subcourses found</td></tr>";
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
