<?php

include '../../config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $deletesql = "DELETE FROM Hotel WHERE RegNo = '$id'";

    $result = mysqli_query($conn, $deletesql);

    if($result) {
        header("Location: ../hotels.php");
        exit();
    } else {
        echo "Error: Failed to delete the hotel.";
    }
} else {
    header("Location: ../hotels.php");
    exit(); 
}

?>