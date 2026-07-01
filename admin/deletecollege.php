<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `colleges` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location:colleges.php");
}
else{
    echo"error";
}
?>