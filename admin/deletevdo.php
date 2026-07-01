<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `images` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    echo"<script>window.location='gallery.php';</script>";
}
else{
    echo"error";
}
?>