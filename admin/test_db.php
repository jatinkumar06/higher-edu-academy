<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../connection.php';
$notice_text = "Test notice";
$stmt = $conn->prepare("INSERT INTO notices (notice_text) VALUES (?)");
if(!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
} else {
    $stmt->bind_param("s", $notice_text);
    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}
?>
