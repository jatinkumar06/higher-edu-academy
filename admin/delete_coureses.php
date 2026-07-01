<?php
include "../connection.php";
$id = $_GET['id'];
$deletequery = "DELETE FROM courses WHERE id=$id";
$query = mysqli_query($conn, $deletequery);
if ($query) {
    ?>
    <script>
        alert("Deleted Successfully");
        window.location.href = "courses.php";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Not Deleted");
        window.location.href = "courses.php";
    </script>
    <?php
}
?>