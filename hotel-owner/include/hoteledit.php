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
                        $rooms = $_POST['avlRooms'];
                        $facilities = $_POST['facilities'];

                        $id = $_GET['id'];

                        $edit_query = mysqli_query($conn,"UPDATE Hotel SET Name='$name', Email='$email', Avl_Rooms='$rooms', Facilities='$facilities' WHERE RegNo='$id' ") or die("error occurred");

                        if($edit_query){
                            echo "<script>alert('Hotel Data Updated!');</script>
                                <div class='message'>
                                    <p>Hotel Data Updated!</p>
                                    <br>
                                    <a href='../hotels.php'><button class='backBtn'>Go Back</button></a>
                                </div> <br>";
            
                        }
                    }else{

                        $id = $_GET['id'];
                        $query = mysqli_query($conn,"SELECT * FROM Hotel  WHERE RegNo='$id'");

                        while($result = mysqli_fetch_assoc($query)){
                            $res_name = $result['Name'];
                            $res_email = $result['Email'];
                            $res_rooms = $result['Avl_Rooms'];
                            $res_fac = $result['Facilities'];
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
                            <label for="avlRooms"><b>Avl_Rooms</b></label>
                            <input type="text" name="avlRooms" class="update-input" id="avlRooms" value="<?php echo $res_rooms; ?>" autocomplete="off" required>
                        </div>
                        <div class="">
                            <label for="facilities"><b>Facilities</b></label>
                            <input type="text" name="facilities" class="update-input" id="facilities" value="<?php echo $res_fac; ?>" autocomplete="off" required>
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