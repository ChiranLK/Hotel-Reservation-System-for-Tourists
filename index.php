<?php

    require "config.php";
    session_start();

    // if (!isset($_SESSION["email"])) {
    //     header("Location: login.php");
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
        <section>
            <div class="Section1">
                <div class="slider">
                    <div class="slides">
                      <img src="Images/Hotels/1.jpg" alt="Image 1">
                      <img src="Images/Hotels/2.jpg" alt="Image 2">
                      <img src="Images/Hotels/3.jpg" alt="Image 3">
                      <img src="Images/Hotels/4.jpg" alt="Image 4">
                      <img src="Images/Hotels/5.jpg" alt="Image 5">
                      <img src="Images/Hotels/6.jpg" alt="Image 6">
                      <img src="Images/Hotels/7.jpg" alt="Image 7">
                    </div>
                </div>
                <div class="searchBox">
                    <h1 class="cr">CEYLON RESERVE</h1>
                    <h2 class="slogan">"Seamless Stays, Unforgettable Days - Your Perfect Escape Awaits!"</h2>
                    <div class="searchBar">
                        <form action="search.php" method="get">
                            <label for="search">Book Your Hotel :- </label>
                            <i class="fa-solid fa-location-dot gpsIcon"></i>
                            <input type="text" id="search" class="Search" name="destination" placeholder="Destination">
                            <div class="dropdown">
                                <select name="dropdown-content" id="search" class="dropdown">
                                    <option value="" disabled selected hidden>Select Property</option>
                                    <option value="LuxuryHotel">Luxury Hotel</option>
                                    <option value="Resort">Resort</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Cabana">Cabana</option>
                                  </select>
                            </div>
                            <input id="submitBtn" type="submit" name="search" value="Search Hotels">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="Section2">
                <h2 class="sec2Heading">Top Destinations</h2>
                <p class="sec2Para">Find out most beautiful and popular cities in Sri Lanka</p>
                <div class="topDestination">
                    <div class="Destinations">
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/galle-fort.jpg" alt="Galle Fort">
                            <h3>Galle</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/nuwara_eliya.jpg" alt="Nuwara-Eliya">
                            <h3>Nuwara Eliya</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/colombo.jpg" alt="Colombo">
                            <h3>Colombo</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/Nine-Arches-Bridge.jpg" alt="Ella">
                            <h3>Ella</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/kandy.jpg" alt="Kandy">
                            <h3>Kandy</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/arugambay-beach.jpg" alt="ArugamBay">
                            <h3>ArugamBay</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/jaffna.jpg" alt="Jaffna">
                            <h3>Jaffna</h3>
                        </div>
                        <div class="cities">
                            <img class="CityImg" src="Images/Cities/Sigiriya.jpg" alt="Sigiriya">
                            <h3>Sigiriya</h3>
                        </div>
                    </div>
                </div>
                <!--City Images-->
            </div>
        </section>
    </main>
    <?php
    require "include/footer.php";
    ?>
</body>
</html>