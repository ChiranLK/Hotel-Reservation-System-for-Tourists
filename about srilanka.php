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
        <section class="aboutSriLanka">
            <h1>Welcome To Sri Lanka</h1>
            <div class="sriLankaSection">
                <div class="paraSection">
                    <p>
                        Sri Lanka know as Ceylon and officially  Democratic Socialist Republic of Sri Lanka is South Asian Country 
                        Situated in Indian Ocean . Southwest of the Bay of Bengal , it is separated from the Indian peninsula by the 
                        Gulf of Mannar and the Straits of Palk. It shares a maritime border with the Maldives to the southwest and India 
                        to the northwest with over 3000 years old documented history.
                    </p>
                    <p>
                        in Sri Lanka there are many  point of tourist attraction places , it has every type of attractive places like ,
                    </p>
                    <p>
                        the "Lion Rock" fortress, Sigiriya is an ancient rock citadel rising out of the lush green plains. Climb the 
                        massive rock to witness the breathtaking views and explore the ruins of a palace complex, including frescoes 
                        and water gardens.
                    </p>
                    <p>
                        Anuradhapura and Polonnaruwa are  UNESCO World Heritage cities ,in past  the capital of Sri Lanka's Anuradhapura 
                        Kingdom. Explore the ancient ruins like stupas, temples, and monasteries, which are testaments to the island's 
                        rich history. Polonnaruwa was the island's medieval capital. Here, you'll find well-preserved ruins of palaces, 
                        statues, and giant stone figures
                    </p>
                    <p>
                        In Central province Buddhist temple in Kandy called Sri Dalada maligawa , is enshrine a tooth of the Buddha.
                    </p>
                    <p>
                        Galle Fort – Explore the fortifications of this fort city built by the Portuguese in the 16th century. You can 
                        wander through the charming streets lined with Dutch
                    </p>
                    <p>
                        And there are eye catching beach side like bentota beach Unawatuna beach and ArugamBay beach these are famous 
                        for corals and surfing jet ski riding also .these all asserts are situated in this small island so we wish you 
                        all take that natural experience with exploring this small island.
                    </p>
                </div>
                <div>
                    <img src="Images/map.jpg" class="map" alt="">
                </div>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>