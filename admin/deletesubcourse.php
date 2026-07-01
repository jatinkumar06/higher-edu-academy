<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `subcourse` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location: subcourse.php");
}
else{
    echo"error";
}
?>