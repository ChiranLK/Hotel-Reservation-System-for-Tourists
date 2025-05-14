<?php

include '../../config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM Hotel_Owner WHERE HO_ID = '$id'";

$result = mysqli_query($conn, $deletesql);

header("Location: ../hotelOwners.php");

?>