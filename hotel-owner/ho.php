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
        <section class="dashboard">
            <?php
                $id = $_SESSION['id'];
                $hotelSql = "SELECT COUNT(*) AS hotel_count FROM Hotel WHERE HO_ID = '$id'";
                $hotelResult = mysqli_query($conn, $hotelSql);
                $hotelRowCount = mysqli_fetch_assoc($hotelResult)['hotel_count'];
                
                $managerSql = "SELECT COUNT(*) AS owner_count FROM Manager WHERE HO_ID = '$id'";
                $managerResult = mysqli_query($conn, $managerSql);
                $managerRowCount = mysqli_fetch_assoc($managerResult)['owner_count'];

                $hotelList = "SELECT * FROM Hotel WHERE HO_ID = '$id'";
                $hotelListResult = mysqli_query($conn, $hotelList);
                while ($hotelListCount = mysqli_fetch_assoc($hotelListResult)) {
                    $regno = $hotelListCount["RegNo"];
                }
                
                $bookingSql = "SELECT COUNT(*) AS booking_count FROM Reservation WHERE RegNo = '$regno'";
                $bookingResult = mysqli_query($conn, $bookingSql);
                $bookingRowCount = mysqli_fetch_assoc($bookingResult)['booking_count'];

            ?>
            <a href="hotels.php">
                <div class="activeUsers card">
                    <h2>Hotels</h2>
                    <p><b><?php echo $hotelRowCount ?></b></p>
                </div>
            </a>
            <a href="hotelManagers.php">
            <div class="Hotels card">
                <h2>Hotel Managers</h2>
                <p><b><?php echo $managerRowCount ?></b></p>
            </div>
            </a>
            <a href="bookings.php">
            <div class="Hotel Owners card">
                <h2>Bookings</h2>
                <p><b><?php echo $bookingRowCount ?></b></p>
            </div>
            </a>
        </section>
    </main>
</body>
</html>