<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `contact` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location:enquiry.php");
}
else{
    echo"error";
}
?>