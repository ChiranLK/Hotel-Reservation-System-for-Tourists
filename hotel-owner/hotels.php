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
    <title>CeylonReserve - Hotel Owner</title>
</head>
<body>
    <?php
        require "include/header.php";
    ?>
    <main>
        <section>
        <div class="addHotel">
                <form action="" class="input-hotel" method="post">
                    <div class="form-div1">
                        <label for="reg_no">Reg_No :</label>
                        <input type="text" name="reg_no" class="inputs" id="">
                        <label for="name">Name :</label>
                        <input type="text" name="name" class="inputs" id="">
                        <label for="h_type">Type of Hotel :</label>
                        <select name="h_type" class="inputs">
                            <option value selected></option>
                            <option value="Luxury Hotel">Luxury Hotel</option>
                            <option value="Resort">Resort</option>
                            <option value="Lodge">Lodge</option>
                            <option value="Inn">Inn</option>
                            <option value="Cabana">Cabana</option>
                        </select>
                        <label for="location">Location :</label>
                        <input type="text" name="location" class="inputs" id="">
                        <label for="rooms">Avl_Rooms :</label>
                        <input type="text" name="rooms" class="inputs" id="">
                        <input type="submit" name="add" class="addBtn" value="Add">
                    </div>
                    <div class="form-div2">
                        <label for="email">Email :</label>
                        <input type="text" name="email" class="inputs" id="">
                    </div>
                </form>
                <?php
                    if (isset($_POST['add'])) {
                        $RegNo = $_POST['reg_no'];
                        $name = $_POST['name'];
                        $h_type = $_POST['h_type'];
                        $location = $_POST['location'];
                        $rooms = $_POST['rooms'];
                        $email = $_POST['email'];

                        $sql = "INSERT INTO Hotel(RegNo,Name,H_type,Location,Avl_Rooms,Email) VALUES ('$RegNo', '$name', '$h_type', '$location', '$rooms', '$email')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            header("Location: hotels.php");
                        }
                    }
                ?>
            </div>
            <div class="roombooktable">
                <?php
                    $id = $_SESSION['email'];
                    $selectData = mysqli_query($conn,"SELECT * FROM Hotel_Owner WHERE Email = '$id'");
                    $dataRow = mysqli_fetch_array($selectData);
                    $regNo = $dataRow['HO_ID'];
                    $hoteltablesql = "SELECT * FROM Hotel WHERE HO_ID = '$regNo'";
                    $hotelresult = mysqli_query($conn, $hoteltablesql);
                    $nums = mysqli_num_rows($hotelresult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">Reg_No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Hotel Type</th>
                            <th scope="col">Location</th>
                            <th scope="col">Avl_Rooms</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hotel Manager</th>
                            <th scope="col" class="action">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($hotelresult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['RegNo'] ?></td>
                            <td><?php echo $res['Name'] ?></td>
                            <td><?php echo $res['H_type'] ?></td>
                            <td><?php echo $res['Location'] ?></td>
                            <td><?php echo $res['Avl_Rooms'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['M_ID'] ?></td>
                            <td class="action">
                                <a href="include/hoteledit.php?id=<?php echo $res['RegNo'] ?>"><button class="btn editBtn">Edit</button></a>
                                <a href="include/hoteldelete.php?id=<?php echo $res['RegNo'] ?>"><button class="btn deleteBtn">Delete</button></a>
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