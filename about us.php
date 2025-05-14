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
        <section id="aboutUsPage">
            <div class="aboutUsSection">
                <div class="aboutUs">
                    <p class="">Welcome You ALL to <b>Ceylon Reserve</b>
                        If you are willing to go Central province , visit Lake Gegory or you looking for go Sigiriya or looking for 
                        stay a night at beach side ..
                        this is the platforms for you…….
                    </p>
                    <p class="para">
                        If you want to book a place near by you ,find a place for fit your budget or looking for luxurious suit to 
                        stay with your love ones .
                        you can book thru this platform .
                    </p>
                    <p class="para">
                        Our platforms has more than <b>300+</b> trusted hotels available for you all 
                        These hotels are checked by our service managers to give super quality service for you all , 
                        are u missed your payment or else do you  need to cancel ?
                        you can do it on yourself with no service chargers .
    
                    </p>
                    <p class="para">
                        Are you got trouble about our service or payments , hotel you can call our customs care service and our service 
                        managers are working in every province to provide a quality and good service for you all. So don’t. be late just 
                        click on booking button and relax.
                    </p>
                </div>
                <div>
                    <img src="Images/Logo.png" class="aboutUsImg" alt="Logo">
                </div>
            </div>
        </section>
        <section id="contactInfo">
            <div class="contactDetails">
                <h3>Phone</h3>
                <p>Call:- <b>0912233420</b></p>
                <p>WhatsApp:- <b>0775654785</b></p>
                <br>
                <h3>Email</h3>
                <p>Email:- <a href="info@ceylonreserve.lk">info@ceylonreserve.lk</a></p>
                <p>Listing:- <a href="getlisted@ceylonreserve.lk">getlisted@ceylonreserve.lk</a></p>
                <br>
                <h3>Social Media</h3>
                <p><a href="#">Facebook</a></p>
                <p><a href="#">Instagram</a></p>
                <p><a href="#">Twitter</a></p>
                <p><a href="#">TikTok</a></p>
                <br>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>