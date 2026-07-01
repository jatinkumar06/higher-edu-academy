<?php
include "../connection.php";
$ID=$_GET ['id'];
$delete="DELETE FROM `university` WHERE id='$ID'";
$run=mysqli_query($conn,$delete);
if($run)
{
    header("location:university.php");
}
else{
    echo"error";
}
?>