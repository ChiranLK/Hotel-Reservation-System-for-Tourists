<?php

    require "../config.php";
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
    <link rel="icon" href="../Images/logo.png">
    <title>CeylonReserve - Admin</title>
</head>
<body>
    <?php
        require "include/header.php";
    ?>
    <main>
        <section>
        <div class="addHotel">
                <form action="" class="input-Ownerform" method="post">
                    <label for="HO_ID">HO_ID :</label>
                    <input type="text" name="HO_ID" class="inputs" id="">
                    <label for="Fname">First Name :</label>
                    <input type="text" name="Fname" class="inputs" id="">
                    <label for="Lname">Last Name :</label>
                    <input type="text" name="Lname" class="inputs" id="">
                    <label for="email">Email :</label>
                    <input type="text" name="email" class="inputs" id="">
                    <label for="password">Password :</label>
                    <input type="password" name="password" class="inputs" id="">
                    <input type="submit" name="addOwner" class="addBtn" value="Add">
                </form>
                <?php
                    if (isset($_POST['addOwner'])) {
                        $HO_ID = $_POST['HO_ID'];
                        $Fname = $_POST['Fname'];
                        $Lname = $_POST['Lname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $sql = "INSERT INTO Hotel_Owner(HO_ID,Fname,Lname,Email,Password) VALUES ('$HO_ID', '$Fname', '$Lname', '$email', '$password')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            header("Location: hotelOwners.php");
                        }
                    }
                ?>
            </div>
            <div class="roombooktable">
                <?php
                    $hotablesql = "SELECT * FROM Hotel_Owner";
                    $horesult = mysqli_query($conn, $hotablesql);
        
                    $nums = mysqli_num_rows($horesult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">HO_ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($horesult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['HO_ID'] ?></td>
                            <td><?php echo $res['Fname'] ?></td>
                            <td><?php echo $res['Lname'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Password'] ?></td>
                            <td class="action">
                                <a href="include/owneredit.php?id=<?php echo $res['HO_ID'] ?>"><button class="btn editBtn">Edit</button></a>
                                <a href="include/ownerdelete.php?id=<?php echo $res['HO_ID']?>"><button class="btn deleteBtn">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>