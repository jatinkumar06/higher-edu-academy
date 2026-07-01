<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `teachersdata` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location:show_faculty.php");
}
else{
    echo"error";
}
?>