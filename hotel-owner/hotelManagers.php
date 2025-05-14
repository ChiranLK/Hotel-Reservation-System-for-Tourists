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
        <div class="addManager">
                <form action="" class="input-form" method="post">
                        <label for="m_id">M_ID :</label>
                        <input type="text" name="m_id" class="inputs" id="">
                        <label for="Fname">First Name :</label>
                        <input type="text" name="Fname" class="inputs" id="">
                        <label for="Lname">Last Name :</label>
                        <input type="text" name="Lname" class="inputs" id="">
                        <label for="email">Email :</label>
                        <input type="text" name="email" class="inputs" id="">
                        <label for="password">Password :</label>
                        <input type="password" name="password" class="inputs" id="">
                        <input type="submit" name="add" class="addBtn" value="Add">
                </form>
                <?php
                    if (isset($_POST['add'])) {
                        $m_ID = $_POST['m_id'];
                        $Fname = $_POST['Fname'];
                        $Lname = $_POST['Lname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $sql = "INSERT INTO Manager(M_ID,Fname,Lname,Email,Password) VALUES ('$m_ID', '$Fname', '$Lname', '$email', '$password')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            header("Location: hotelManagers.php");
                        }
                    }
                ?>
            </div>
            <div class="roombooktable">
                <?php
                    $id = $_SESSION['id'];
                    $managertablesql = "SELECT * FROM Manager WHERE HO_ID = '$id'";
                    $managerresult = mysqli_query($conn, $managertablesql);
                    $nums = mysqli_num_rows($managerresult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">M_ID</th>
                            <th scope="col">Fname</th>
                            <th scope="col">Lname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col" class="action">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($managerresult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['M_ID'] ?></td>
                            <td><?php echo $res['Fname'] ?></td>
                            <td><?php echo $res['Lname'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td><?php echo $res['Password'] ?></td>
                            <td class="action">
                                <a href="include/manageredit.php?id=<?php echo $res['M_ID'] ?>"><button class="btn editBtn">Edit</button></a>
                                <a href="include/managerdelete.php?id=<?php echo $res['M_ID'] ?>"><button class="btn deleteBtn">Delete</button></a>
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