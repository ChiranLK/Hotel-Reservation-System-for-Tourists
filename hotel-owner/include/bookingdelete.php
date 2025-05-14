<?php

include '../../config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM Reservation WHERE Res_ID = '$id'";

$result = mysqli_query($conn, $deletesql);

header("Location:../bookings.php");

?>