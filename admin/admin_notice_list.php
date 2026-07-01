<?php 
include "include/header.php";
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notice'])) {
    $notice_text = $_POST['notice_text'];
    if (!empty($notice_text)) {
        $stmt = $conn->prepare("INSERT INTO notices (notice_text) VALUES (?)");
        $stmt->bind_param("s", $notice_text);
        if ($stmt->execute()) {
            echo "<script>alert('Notice Added Successfully'); window.location.href='admin_notice_list.php';</script>";
        }
    }
}
?>

<!-- MAIN CONTENT WRAPPER -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    
                    <!-- Add Notice Form -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Add New Notice</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="notice_text" class="fw-bold mb-2">Notice Text / HTML</label>
                                    <textarea name="notice_text" id="notice_text" class="form-control" rows="4" placeholder="Enter notice text here. You can use HTML tags like <a href='...'>Link</a> to add clickable links." required></textarea>
                                </div>
                                <button type="submit" name="add_notice" class="btn btn-success">Add Notice</button>
                            </form>
                        </div>
                    </div>

                    <!-- List Notices -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h2 class="text-center mb-4">Manage Notices</h2>
                                <table class="table table-bordered table-striped bg-white shadow">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 80%;">Notice Content</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $qry = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC;");
                                        $count = 1;
                                        while ($row = mysqli_fetch_assoc($qry)) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?= $row['notice_text'] ?></td>
                                                <td>
                                                    <a href="delete_notice.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
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
    </div>
</div>

<?php include "include/footer.php"; ?>
