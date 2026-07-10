<?php
include 'include/header.php';
include "connect.php"; // Database connection

// Fetch the current short notice (assuming we want just one active notice or the latest one)
$notice_text = "";
$qry = mysqli_query($conn, "SELECT notice_text FROM short_notices ORDER BY id DESC LIMIT 1");
if ($qry && mysqli_num_rows($qry) > 0) {
    $row = mysqli_fetch_assoc($qry);
    $notice_text = $row['notice_text'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $notice = mysqli_real_escape_string($conn, $_POST['notice_text']);
    
    // Insert new short notice (or could update, but let's insert to keep history, we only fetch the latest)
    $insert_qry = "INSERT INTO short_notices (notice_text) VALUES ('$notice')";
    if (mysqli_query($conn, $insert_qry)) {
        echo "<script>
            alert('Short notice updated successfully!');
            window.location.href = 'short_notice.php';
        </script>";
    } else {
        echo "<script>
            alert('Error updating short notice.');
        </script>";
    }
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Short Notice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="notice_text" class="form-label">Short Notice Text (Marquee)</label>
                                    <input type="text" class="form-control" id="notice_text" name="notice_text" value="<?php echo htmlspecialchars($notice_text); ?>" required placeholder="Enter single line notice here">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Update Short Notice</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">Recent Short Notices</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Notice Text</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $list_qry = mysqli_query($conn, "SELECT * FROM short_notices ORDER BY id DESC");
                                        while ($list_row = mysqli_fetch_assoc($list_qry)) {
                                            echo "<tr>";
                                            echo "<td>" . $list_row['id'] . "</td>";
                                            echo "<td>" . htmlspecialchars($list_row['notice_text']) . "</td>";
                                            echo "<td>" . $list_row['created_at'] . "</td>";
                                            echo "<td><a href='delete_short_notice.php?id=" . $list_row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                                            echo "</tr>";
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
    </div>
    
    <?php include 'include/footer.php'; ?>
</div>
