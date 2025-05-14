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
    <title>CeylonReserve - Admin</title>
</head>
<body>
    <?php
        require "include/header.php";
    ?>
    <main>
        <section class="dashboard">
            <?php
                $userSql = "SELECT COUNT(*) AS user_count FROM Reg_User";
                $userResult = mysqli_query($conn, $userSql);
                $userRowCount = mysqli_fetch_assoc($userResult)['user_count'];

                $hotelSql = "SELECT COUNT(*) AS hotel_count FROM Hotel";
                $hotelResult = mysqli_query($conn, $hotelSql);
                $hotelRowCount = mysqli_fetch_assoc($hotelResult)['hotel_count'];

                $ownerSql = "SELECT COUNT(*) AS owner_count FROM Hotel_Owner";
                $ownerResult = mysqli_query($conn, $ownerSql);
                $ownerRowCount = mysqli_fetch_assoc($ownerResult)['owner_count'];
            ?>
            <a href="users.php">
                <div class="activeUsers card">
                    <h2>Users</h2>
                    <p><b><?php echo $userRowCount ?></b></p>
                </div>
            </a>
            <a href="hotels.php">
            <div class="Hotels card">
                <h2>Hotels</h2>
                <p><b><?php echo $hotelRowCount ?></b></p>
            </div>
            </a>
            <a href="hotelOwners.php">
            <div class="Hotel Owners card">
                <h2>Hotel Owners</h2>
                <p><b><?php echo $ownerRowCount ?></b></p>
            </div>
            </a>
        </section>
    </main>
</body>
</html>