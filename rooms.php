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
        <section class="imageSection">
            <img src="Images/Hotels/1.jpg" class="hotelImage" alt="Hotel image">
        </section>
        <section class="hoteInfo">
            <?php
                $id = $_GET['RegNo'];

                $hotelData = "SELECT * FROM Hotel INNER JOIN Rooms ON Hotel.RegNo = Rooms.RegNo WHERE Hotel.RegNo = '$id'";
                $hotelResult = mysqli_query($conn, $hotelData);

                while ($res = mysqli_fetch_array($hotelResult)) {
                    $hotelName = $res["Name"];
                    $hotelFac = $res["Facilities"];
                    $hotelEmail = $res["Email"];
                    $hotelPrice = $res["Price"];
                    $hotelRoom = $res["R_type"];
                    $hotelBedding = $res["Bedding"];
                
            ?>
            <div class="hotelDetails">
                <div class="hotelName card">
                    <h2><?php echo $hotelName?></h2>
                    <p><?php echo $hotelRoom?></p>
                    <p><?php echo $hotelBedding?></p>
                </div>
                <div class="price card">
                    <h2>Price</h2>
                    <p>LKR.&nbsp;<?php echo $hotelPrice?></p>
                </div>
                <div class="facilities card">
                    <h2>Facilities</h2>
                    <ul>
                        <p><?php echo $hotelFac?></p>
                    </ul>
                </div>
                <div class="contactInfo card">
                    <h2>Contact Information</h2>
                    <p><b>Address</b></p>
                    <p><b>Phone Number</b></p>
                    <p><b>Email: <?php echo $hotelEmail?></b></p>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="reservation">
                <h2>Booking Inquiry</h2>
                <?php
                    if (isset($_POST['booking'])){
                        $Name = $_POST['name'];
                        $email = $_POST['email'];
                        $contact = $_POST['contact'];
                        $checkIn = $_POST['check-in'];
                        $checkOut = $_POST['check-out'];
                        $noRooms = $_POST['noRooms'];
                        $noAdults = $_POST['noAdults'];
                        $noChild = $_POST['noChild'];

                        if($Name == "" || $email == "" || $contact == "" || $checkIn == "" || $checkOut == "" || $noRooms == "" || $noAdults == "" || $noChild == ""){
                            echo "<script>swal({
                                title: 'Fill the proper details',
                                icon: 'error',
                            });
                            </script>";
                        }
                        else{
                            $sql = "INSERT INTO Reservation (Name,Email,Contact_No,Check_In,Check_Out,No_Adults,No_child,No_rooms) VALUES ('$Name', '$email', '$contact', '$checkIn', '$checkOut','$noAdults','$noChild','$noRooms')";
                            $result = mysqli_query($conn, $sql);
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="formBox">
                        <div class="inputField">
                            <input type="text" name="name" class="inputBox" id="" placeholder="Your Name">
                            <input type="text" name="email" class="inputBox" id="" placeholder="Your Email">
                            <input type="text" name="contact" class="inputBox" id="" placeholder="Contact Number">
                            <div>
                                <label for="">Check In</label>
                                <input type="date" name="check-in" class="inputBox" id="">
                                <label for="">Check Out</label>
                                <input type="date" name="check-out" class="inputBox" id="">
                            </div>
                            <div>
                                <input type="number" name="noRooms" class="inputBox" id="" placeholder="No. of Rooms">
                                <input type="number" name="noAdults" class="inputBox" id="" placeholder="Adults">
                                <input type="number" name="noChild" class="inputBox" id="" placeholder="Children">
                            </div>
                            <textarea name="" id="" cols="30" rows="10" class="inputBox" placeholder="Additional Information"></textarea>
                        </div>
                        <input type="submit" name="booking" class="submitBtn" value="Submit Booking">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>