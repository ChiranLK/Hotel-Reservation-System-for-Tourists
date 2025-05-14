<?php

include '../../config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM Manager WHERE M_ID = '$id'";

$result = mysqli_query($conn, $deletesql);

header("Location:../hotelManagers.php");

?>