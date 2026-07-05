<?php
include "d:/xampp/htdocs/Personal-project/Education/connection.php";

$sql = "ALTER TABLE courses 
    ADD COLUMN course_overview TEXT NULL,
    ADD COLUMN eligible_criteria TEXT NULL,
    ADD COLUMN syllabus TEXT NULL,
    ADD COLUMN price_structure TEXT NULL,
    ADD COLUMN installment_view TEXT NULL,
    ADD COLUMN course_fee VARCHAR(255) NULL,
    ADD COLUMN course_start_date VARCHAR(255) NULL;";

if (mysqli_query($conn, $sql)) {
    echo "Columns added successfully.\n";
} else {
    echo "Error: " . mysqli_error($conn) . "\n";
}
?>
