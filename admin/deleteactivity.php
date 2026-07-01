<?php
$ID = $_GET['id'];
include "../connection.php";
$q="DELETE FROM `activities` WHERE id='$ID'";
$result=mysqli_query($conn,$q);
if($result){
    echo "<script>alert('Activity Deleted Successfully!'); window.location='activity.php';</script>";
} else {
    echo "<script>alert('Failed to delete activity');</script>";
}
?>