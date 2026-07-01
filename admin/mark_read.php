<?php
include "../connection.php";
$ID = $_GET['id'];
$update = "UPDATE `contact` SET status=1 WHERE id='$ID'";
$run = mysqli_query($conn, $update);
if($run)
{
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $referer");
}
else{
    echo "error";
}
?>
