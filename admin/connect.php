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
                                <h2 class="text-center mb-4">CONTACT</h2>


                                <table class="table table-bordered table-striped bg-white shadow">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>PHONE</th>
                                            <th>SUBJECT</th>
                                            <th>MESSAGE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $qry = mysqli_query($conn, "SELECT * 
                                            FROM contact 
                                            WHERE subject IS NOT NULL 
                                            AND subject <> '' 
                                            ORDER BY id DESC;");
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td>
                                                    <?php echo $row['phone']; ?>
                                                </td>
                                                <td><?= $row['subject'] ?></td>
                                                <td><?= $row['message'] ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 0): ?>
                                                        <span class="badge bg-warning text-dark">Unread</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success">Read</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['status'] == 0): ?>
                                                        <a href="mark_read.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info"
                                                            onclick="return confirm('Mark this contact as read ?')">Mark as Read</a>
                                                    <?php endif; ?>
                                                    <a href="deleteconnect.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this contact?')">Delete</a>
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