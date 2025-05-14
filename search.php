<?php

    include "config.php";
    session_start();

    // if(!isset($_SESSION['email'])){
    //     header("Location: index.php");
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="24/Y1/S1/MTR-12">
    <meta name="description" content="Discover the beauty of Sri Lanka with our intuitive hotel reservation platform. find your perfect stay amidst stunning landscapes, vibrant culture, and warm hospitality. Book effortlessly and embark on your Unforgettable journey with ease."> <!--Description of web page-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <script src="https://kit.fontawesome.com/21b93789d0.js" crossorigin="anonymous"></script>
    <script src="Js/script.js"></script>
    <link rel="icon" href="Images/Logo.png">
    <title>Ceylon Reserve</title>
</head>
<body>
    <?php
        require "include/header.php";
    ?>
    <main>
        <section class="searchPage">
            <div class="search-bar">
                <?php
                    if(isset($_GET['destination'])) {
                        $location = $_GET['destination'];
                    
                        // Prepare SQL statement
                        $sql = "SELECT * FROM Hotel INNER JOIN Rooms ON Hotel.RegNo = Rooms.RegNo WHERE Hotel.Location LIKE '%$location%'";
                    
                        // Execute SQL statement
                        $result = mysqli_query($conn, $sql);
                    
                    } else {
                        if(isset($_GET['destination'])) {
                            $location = $_GET['hotelSearch'];
                            $sql = "SELECT * FROM Hotel INNER JOIN Rooms ON Hotel.RegNo = Rooms.RegNo WHERE Hotel.Location LIKE '%$location%'";
                    
                             // Execute SQL statement
                            $result = mysqli_query($conn, $sql);
                        }
                        else {
                            $sql = "SELECT * FROM Hotel INNER JOIN Rooms ON Hotel.RegNo = Rooms.RegNo";
                            $result = mysqli_query($conn, $sql);
                        }
                    }
                ?>
                <form action="" method="get" class="input-form">
                    <input type="text" name="hotelSearch" class="search-input" id="hotelSearch">
                    <input type="submit" name="search" value="search" class="btnSubmit" id="searchBtn">
                </form>
            </div>
            <div class="resultSection">
                <div class="filter-box">
                    <h2>Filter by:</h2>
                    <p>Apartment</p>
                    <p>Cabanas</p>
                    <p>Hotels</p>
                    <hr>
                    <p>Car park</p>
                    <p>Swimming Pool</p>
                </div>
                <div class="result-box">
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='rooms.php?RegNo=" . $row["RegNo"] . "' class='room-link'>
                                        <div class='hotel-card'>
                                            <div class='cardSection'>
                                                <img src='Images/Hotels/4.jpg' class='imageCard' alt='Hotel Image'>
                                            </div>
                                            <div class='cardSection' style='color: #12372a;'>
                                                <h2>".$row["Name"]."</h2>
                                                <p>".$row["H_type"]."</p>
                                                <p>Description</p>
                                                <p>".$row["Location"]."</p>
                                            </div>
                                            <div class='cardSection price-section' style='color: #12372a;'>
                                                <h2 class='price-card'>LKR.&nbsp;".$row["Price"]."</h2>
                                            </div>
                                        </div>
                                    </a>";
                            }
                        } else {
                            echo "No results found";
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>