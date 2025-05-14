<?php

    include "config.php";
    session_start();

    if (!isset($_SESSION["email"])) {
        header("Location: login.php");
    }

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
        <section class="update-section">
            <h2>Change Personal Data</h2>
            <div class="update-div">
                <?php 
                    if(isset($_POST['submit'])){
                        $Fname = $_POST['Fname'];
                        $Lname = $_POST['Lname'];
                        $email = $_POST['Email'];
                        $contact = $_POST['contact'];

                        $id = $_SESSION['id'];

                        $edit_query1 = mysqli_query($conn,"UPDATE Reg_User SET Fname='$Fname', Lname='$Lname', Email='$email' WHERE User_ID=$id ") or die("error occurred");
                        $edit_query2 = mysqli_query($conn,"UPDATE Reg_User_Phone SET Phone_No='$contact' WHERE User_ID=$id ") or die("error occurred");

                        if($edit_query1 || $edit_query2){
                             echo "<script>alert('Profile Updated!');</script>
                                <div class='message'>
                                     <p>Profile Updated!</p>
                                     <a href='user.php'><button class='BackBtn'>Go Back</button></a>
                                 </div> <br>";
                            
            
                        }
                    }else{

                        $id = $_SESSION['id'];
                        $query = mysqli_query($conn,"SELECT * FROM Reg_user INNER JOIN Reg_User_Phone ON Reg_user.User_ID = Reg_User_Phone.User_ID  WHERE Reg_user.User_ID ='$id'");

                        while($result = mysqli_fetch_assoc($query)){
                            $res_id = $result['User_ID'];
                            $res_Fname = $result['Fname'];
                            $res_Lname = $result['Lname'];
                            $res_email = $result['Email'];
                            $res_contact = $result['Phone_No'];
                        }

                ?>
                <form action="" class="update-form" method="post">
                        <div class="">
                            <label for="firstname"><b>First Name</b></label>
                            <input type="text" name="Fname" class="update-input" id="firstname" value="<?php echo $res_Fname; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="lastname"><b>Last Name</b></label>
                            <input type="text" name="Lname" class="update-input" id="lastname" value="<?php echo $res_Lname; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="contact"><b>Contact</b></label>
                            <input type="text" name="contact" class="update-input" id="contact" value="<?php echo $res_contact; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="Email" class="update-input" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <input type="submit" class="updateBtn" name="submit" value="Update" required>
                        </div>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>