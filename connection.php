<?php
// $conn = mysqli_connect(
//     "sql306.infinityfree.com",
//     "if0_41013863",
//     "Jatin826080",
//     "if0_41013863_education"
// );

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "education"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>