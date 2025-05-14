<?php

include '../../config.php';

$id = $_GET['id'];

$deletesql1 = "DELETE FROM Reg_User WHERE User_ID = '$id'";
$result1 = mysqli_query($conn, $deletesql1);

$deletesql2 = "DELETE FROM Reg_User_Phone WHERE User_ID = '$id'";
$result2 = mysqli_query($conn, $deletesql2);

header("Location:../users.php");

?>