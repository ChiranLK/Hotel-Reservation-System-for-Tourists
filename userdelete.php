<?php

include 'config.php';

session_start();

$id = $_GET['id'];

$deletesql1 = "DELETE FROM Reg_User WHERE User_ID = '$id'";
$deletesql2 = "DELETE FROM Reg_User_Phone WHERE User_ID = '$id'";

$result1 = mysqli_query($conn, $deletesql1);
$result2 = mysqli_query($conn, $deletesql2);

session_destroy();

header("Location:index.php");

?>