<?php

    require "../../config.php";
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
    <link rel="stylesheet" href="../Styles/style.css">
    <link rel="icon" href="../../Images/logo.png">
    <title>CeylonReserve - Admin</title>
</head>
<body>
    <main>
    <section class="update-section">
            <h2>Change Hotel Data</h2>
            <div class="update-div">
                <?php 
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $contact = $_POST['contact'];
                        $checkIn = $_POST['checkIn'];
                        $checkOut = $_POST['checkOut'];

                        $id = $_GET['id'];

                        $edit_query = mysqli_query($conn,"UPDATE Reservation SET Name='$name', Email='$email', Contact_No='$contact', Check_In='$checkIn', Check_Out='$checkOut' WHERE Res_ID='$id' ") or die("error occurred");

                        if($edit_query){
                            echo "<script>alert('Reservation Data Updated!');</script>
                                <div class='message'>
                                    <p>Reservation Data Updated!</p>
                                    <br>
                                    <a href='../bookings.php'><button class='backBtn'>Go Back</button></a>
                                </div> <br>";
            
                        }
                    }else{

                        $id = $_GET['id'];
                        $query = mysqli_query($conn,"SELECT * FROM Reservation  WHERE Res_ID='$id'");

                        while($result = mysqli_fetch_assoc($query)){
                            $res_name = $result['Name'];
                            $res_email = $result['Email'];
                            $res_contact = $result['Contact_No'];
                            $res_checkIn = $result['Check_In'];
                            $res_checkOut = $result['Check_Out'];
                        }

                ?>
                <form action="" class="update-form" method="post">
                        <div class="">
                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" class="update-input" id="name" value="<?php echo $res_name; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="email" class="update-input" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="contact"><b>Contact No</b></label>
                            <input type="text" name="contact" class="update-input" id="contact" value="<?php echo $res_contact; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="checkIn"><b>Check in</b></label>
                            <input type="date" name="checkIn" class="update-input" id="checkIn" value="<?php echo $res_checkIn; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="checkOut"><b>Check in</b></label>
                            <input type="date" name="checkOut" class="update-input" id="checkOut" value="<?php echo $res_checkOut; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <input type="submit" class="updateBtn" name="submit" value="Update" required>
                        </div>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
</html>