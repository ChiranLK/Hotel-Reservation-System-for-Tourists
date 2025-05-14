<?php

    include "config.php";
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: index.php");
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
        <section class="user-profile">
            <h2>User Details</h2>
                <div class="user-details">
                <?php
                    
                    $id = $_SESSION['id'];
                    $query = mysqli_query($conn,"SELECT * FROM Reg_user INNER JOIN Reg_User_Phone ON Reg_user.User_ID = Reg_User_Phone.User_ID  WHERE Reg_user.User_ID ='$id'");

                    $res_id = "";
                    $res_Fname = "";
                    $res_Lname = "";
                    $res_contact = "";
                    $res_country = "";
                    $res_email = "";

                    if ($query) {
                            while($result = mysqli_fetch_assoc($query)){

                                // while($result2 = mysqli_fetch_assoc($query2));

                                if ($result){
                                    $res_id = $result['User_ID'];
                                    $res_Fname = $result['Fname'];
                                    $res_Lname = $result['Lname'];
                                    $res_contact = $result['Phone_No'];
                                    $res_country = $result['Country'];
                                    $res_email = $result['Email'];
                                }
                            }
                    }
                    // echo $res_Fname;
                ?>
                        <div class="names">
                            <div class="name-box">
                                <h3>First Name</h3>
                                <div class="user-details-box">
                                    <p style="margin-top: -10px;"><b><?php echo $res_Fname ?></b></p>
                                </div>
                            </div>
                            <div class="name-box">
                                <h3>Last Name</h3>
                                <div class="user-details-box">
                                    <p style="margin-top: -10px;"><b><?php echo $res_Lname ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3>Contact Number</h3>
                            <div class="user-details-box">
                                <p style="margin-top: -10px;"><b><?php echo $res_contact ?></b></p>
                            </div>
                        </div>
                        <div>
                            <h3>country</h3>
                            <div class="user-details-box">
                                <p style="margin-top: -10px;"><b><?php echo $res_country ?></b></p>
                            </div>
                        </div>
                        <div>
                            <h3>Email</h3>
                            <div class="user-details-box">
                                <p style="margin-top: -10px;"><b><?php echo $res_email ?></b></p>
                            </div>
                        </div>
                </div>
                <div class="btnSection">
                <a href="update.php"><button class="updatebtn" id="updateBtn">Update Profile</button></a>
                <a href="userdelete.php?id=<?php echo $res_id ?>"><button class="userDeleteBtn">Delete Profile</button></a>
                </div>
        </section>
        <section id="reservations">
            <h2>Reservations</h2>
            <div class="reservationTable">
                <?php
                    $id = $_SESSION['id'];
                    $reservetablesql = "SELECT * FROM Reservation WHERE User_ID='$id'";
                    $reserveresult = mysqli_query($conn, $reservetablesql);
                    $nums = mysqli_num_rows($reserveresult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">Res_ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">No Adults</th>
                            <th scope="col">No Child</th>
                            <th scope="col">No Rooms</th>
                            <th scope="col" class="action">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($reserveresult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['Res_ID'] ?></td>
                            <td><?php echo $res['Name'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Contact_No'] ?></td>
                            <td><?php echo $res['Check_In'] ?></td>
                            <td><?php echo $res['Check_Out'] ?></td>
                            <td><?php echo $res['No_Adults'] ?></td>
                            <td><?php echo $res['No_child'] ?></td>
                            <td><?php echo $res['No_rooms'] ?></td>
                            <td class="action">
                                <a href="reserveedit.php?id=<?php echo $res['Res_ID'] ?>"><button class="btn editBtn">Edit</button></a>
                                <a href="reservedelete.php?id=<?php echo $res['Res_ID'] ?>"><button class="btn deleteBtn">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
</body>
</html>