<?php
require '../connection.php';
$sql = "CREATE TABLE IF NOT EXISTS `courses` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (mysqli_query($conn, $sql)) {
    echo "Courses table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>
