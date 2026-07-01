<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `collegetype` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location:collegetype.php");
}
else{
    echo"error";
}
?>