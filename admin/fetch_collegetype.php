<?php
include "../connection.php";

if (isset($_POST['coursetype'])) {

    $coursetype = mysqli_real_escape_string($conn, $_POST['coursetype']);

    $sql = "SELECT collegetype FROM collegetype WHERE coursetype = '$coursetype'";
    $result = mysqli_query($conn, $sql);

    echo '<option value="">Select college type</option>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['collegetype'].'">'.$row['collegetype'].'</option>';
    }
}
?>
