<?php

include '../../config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM Hotel WHERE RegNo = '$id'";

$result = mysqli_query($conn, $deletesql);

header("Location: ../hotels.php");

?>