<?php
session_start();
include "connect.php"; // Database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_qry = "DELETE FROM short_notices WHERE id = $id";
    if (mysqli_query($conn, $delete_qry)) {
        echo "<script>
            alert('Notice deleted successfully.');
            window.location.href = 'short_notice.php';
        </script>";
    } else {
        echo "<script>
            alert('Error deleting notice.');
            window.location.href = 'short_notice.php';
        </script>";
    }
} else {
    header("Location: short_notice.php");
}
?>
