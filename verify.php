<?php
// include "connection.php";
session_start();

if ($_POST['captcha'] == $_SESSION['captcha']) {
    echo "✅ CAPTCHA Verified";
} else {
    echo "❌ CAPTCHA Incorrect";
}
?>