<?php

    require "../config.php";
    session_start();

    // if (!isset($_SESSION["email"])) {
    //     header("Location: login.php");
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="icon" href="../Images/logo.png">
    <title>CeylonReserve - Hotel Owner</title>
</head>
<body>
    <?php
        require "include/header.php";
    ?>
    <main>
        <section>
            <div class="roombooktable">
                <?php
                    $id = $_SESSION['id'];
                    $ownerData = "SELECT * FROM Hotel_Owner WHERE HO_ID='$id'";
                    $ownerResult = mysqli_query($conn, $ownerData);
                    $ownerRow = mysqli_fetch_array($ownerResult);
                    $ownerId = $ownerRow["HO_ID"];
                    $hotelResult = mysqli_query($conn, "SELECT * FROM Hotel WHERE HO_ID='$ownerId'");
                    $hotelRow = mysqli_fetch_array($hotelResult);
                    $regNo = $hotelRow["RegNo"];
                    $reservetablesql = "SELECT * FROM Reservation WHERE RegNo='$regNo'";
                    $reserveresult = mysqli_query($conn, $reservetablesql);
                    $nums = mysqli_num_rows($reserveresult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">Res_ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col" class="action">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($reserveresult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['Res_ID'] ?></td>
                            <td><?php echo $res['Name'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Contact_No'] ?></td>
                            <td><?php echo $res['Check_In'] ?></td>
                            <td><?php echo $res['Check_Out'] ?></td>
                            <td class="action">
                                <a href="include/bookingedit.php?id=<?php echo $res['Res_ID'] ?>"><button class="btn editBtn">Edit</button></a>
                                <a href="include/bookingdelete.php?id=<?php echo $res['Res_ID'] ?>"><button class="btn deleteBtn">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>