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
            <h2>Change Hotel Owner Data</h2>
            <div class="update-div">
                <?php 
                    if(isset($_POST['submit'])){
                        $Fname = $_POST['Fname'];
                        $Lname = $_POST['Lname'];
                        $email = $_POST['email'];

                        $id = $_GET['id'];

                        $edit_query = mysqli_query($conn,"UPDATE Hotel_Owner SET Fname='$Fname', Lname='$Lname', Email='$email' WHERE HO_ID='$id' ") or die("error occurred");

                        if($edit_query){
                            echo "<script>alert('Owner Data Updated!');</script>
                                <div class='message'>
                                    <p>Hotel Owner Data Updated!</p>
                                    <br>
                                    <a href='../hotelOwners.php'><button class='backBtn'>Go Back</button></a>
                                </div> <br>";
            
                        }
                    }else{

                        $id = $_GET['id'];
                        $query = mysqli_query($conn,"SELECT * FROM Hotel_Owner  WHERE HO_ID='$id'");

                        while($result = mysqli_fetch_assoc($query)){
                            $res_Fname = $result['Fname'];
                            $res_Lname = $result['Lname'];
                            $res_email = $result['Email'];
                        }

                ?>
                <form action="" class="update-form" method="post">
                        <div class="">
                            <label for="Fname"><b>First Name</b></label>
                            <input type="text" name="Fname" class="update-input" id="firstname" value="<?php echo $res_Fname; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="Lname"><b>Last Name</b></label>
                            <input type="text" name="Lname" class="update-input" id="lastname" value="<?php echo $res_Lname; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="email" class="update-input" id="lastname" value="<?php echo $res_email; ?>" autocomplete="off" required>
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