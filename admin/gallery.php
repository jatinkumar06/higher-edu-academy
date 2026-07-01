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
    <button class="btn btn-primary" onclick="window.location.href='uploadgallery.php'">Upload Gallery</button>
</div>
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h5 class="card-title">Gallery</h5>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped table-hover w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>IMAGES</th>
                                            <th>NAME</th>
                                            <th>DATE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = "SELECT * FROM `images` ORDER BY id DESC";
                                        $run = mysqli_query($conn, $qry);

                                        if ($run) {
                                            $count = 1;
                                            while ($d = mysqli_fetch_assoc($run)) {

                                                
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>

                                                    <td>
                                                        <img src="uploads/<?php echo $d['image']; ?>" alt="<?php echo $d['name']; ?>" width="100">
                                                    </td>
                                                    <td>
                                                        <?php echo $d['name']; ?>
                                                    </td>
                                                    <td><?php echo $d['uploaded_at']; ?></td>
                                                    <td>
                                                        <a href="editgallery.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>
                                                        <a href="deletegallery.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery?');">
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