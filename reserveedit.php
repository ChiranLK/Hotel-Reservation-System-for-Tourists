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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="icon" href="Images/logo.png">
    <title>CeylonReserve - Admin</title>
</head>
<body>
    <main>
    <section class="update-Section">
            <h2>Change Reservation</h2>
            <div class="update-Div">
                <?php 
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $contact = $_POST['ContactNo'];
                        $checkIn = $_POST['CheckIn'];
                        $checkOut = $_POST['CheckOut'];
                        $adults = $_POST['NoAdults'];
                        $child = $_POST['NoChild'];
                        $rooms = $_POST['noRooms'];

                        $id = $_GET['id'];

                        $edit_query = mysqli_query($conn,"UPDATE Reservation SET Name='$name', Email='$email', Contact_No='$contact', Check_In='$checkIn', Check_Out='$checkOut', No_Adults='$adults', No_child='$child', No_rooms='$rooms' WHERE Res_ID='$id' ") or die("error occurred");

                        if($edit_query){
                            echo "<div class='Message'>
                                    <p>Reservation Updated!</p>
                                    <br>
                                    <a href='user.php#reservations'><button class='backBtn'>Go Back</button></a>
                                </div> <br>";
            
                        }
                    }else{

                        $id = $_GET['id'];
                        $query = mysqli_query($conn,"SELECT * FROM Reservation WHERE Res_ID='$id'");

                        while($result = mysqli_fetch_assoc($query)){
                            $res_name = $result['Name'];
                            $res_email = $result['Email'];
                            $res_contact = $result['Contact_No'];
                            $res_checkIn = $result['Check_In'];
                            $res_checkOut = $result['Check_Out'];
                            $res_adults = $result['No_Adults'];
                            $res_child = $result['No_child'];
                            $res_rooms = $result['No_rooms'];
                        }

                ?>
                <form action="" class="update-Form" method="post">
                        <div class="input-div">
                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" class="update-input" id="name" value="<?php echo $res_name; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="email" class="update-input" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="ContactNo"><b>Contact No</b></label>
                            <input type="text" name="ContactNo" class="update-input" id="ContactNo" value="<?php echo $res_contact; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="CheckIn"><b>Check In</b></label>
                            <input type="date" name="CheckIn" class="update-input" id="CheckIn" value="<?php echo $res_checkIn; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="CheckOut"><b>Check Out</b></label>
                            <input type="date" name="CheckOut" class="update-input" id="CheckOut" value="<?php echo $res_checkOut; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="NoAdults"><b>No Adults</b></label>
                            <input type="text" name="NoAdults" class="update-input" id="NoAdults" value="<?php echo $res_adults; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="NoChild"><b>No Child</b></label>
                            <input type="text" name="NoChild" class="update-input" id="NoChild" value="<?php echo $res_child; ?>" autocomplete="off" required>
                        </div>
                        <div class="input-div">
                            <label for="noRooms"><b>No Rooms</b></label>
                            <input type="text" name="noRooms" class="update-input" id="noRooms" value="<?php echo $res_rooms; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <input type="submit" class="update-Btn" name="submit" value="Update" required>
                        </div>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
</html>