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
                <button class="btn btn-primary" onclick="window.location.href='addcolleges.php'">ADD COLLEGE</button>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="card-title">Colleges</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th> COLLEGE PHOTO</th>
                                            <th>COLLEGE LOGO</th>
                                            <th>COLLEGE TYPE</th>
                                            <th>COLLEGE NAME</th>
                                            <th>DETAILS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM colleges ORDER BY id DESC";
                                        $run = mysqli_query($conn, $qry);

                                        if ($run && mysqli_num_rows($run) > 0) {
                                            $count = 1;
                                            while ($d = mysqli_fetch_assoc($run)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>

                                                    <td>
                                                        <img src="uploads/<?php echo $d['college_photo']; ?>"
                                                            alt="<?php echo $d['college_name']; ?>"
                                                            width="100">
                                                    </td>
                                                             <td>
                                                        <img src="uploads/<?php echo $d['logo']; ?>"
                                                            alt="<?php echo $d['college_name']; ?>"
                                                            width="100">
                                                    </td>


                                                    <td><?php echo $d['college_type']; ?></td>

                                                    <td><?php echo $d['college_name']; ?></td>

                                                    <td>
                                                        <?php echo substr($d['college_details'], 0, 80); ?>...
                                                    </td>

                                                    <td>
                                                        <a href="editcollege.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>
                                                        <a href="deletecollege.php?id=<?php echo $d['id']; ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this college?');">
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