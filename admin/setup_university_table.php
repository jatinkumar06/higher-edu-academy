<?php
include "d:/xampp/htdocs/Personal-project/Education/connection.php";

$sql = "ALTER TABLE university ADD COLUMN logo VARCHAR(255) NULL;";

if (mysqli_query($conn, $sql)) {
    echo "Logo column added successfully.\n";
} else {
    echo "Error: " . mysqli_error($conn) . "\n";
}
?>
