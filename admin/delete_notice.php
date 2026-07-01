<?php
include "../connection.php";
$ID = $_GET['id'];
$delete = "DELETE FROM `notices` WHERE id='$ID'";
$run = mysqli_query($conn, $delete);
if($run)
{
    header("location:admin_notice_list.php");
}
else{
    echo "error";
}
?>
