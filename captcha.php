<?php
// include "connection.php";
session_start();

$code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);
$_SESSION['captcha'] = $code;

$img = imagecreate(120, 40);
$bg = imagecolorallocate($img, 200, 255, 255);
$text = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 5, 22, 10, $code, $text);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);

?>