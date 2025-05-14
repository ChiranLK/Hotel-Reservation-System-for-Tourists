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
            <div class="roombooktable">
                <?php
                    $Reg_Usertablesql = "SELECT * FROM Reg_User";
                    $Reg_Userresult = mysqli_query($conn, $Reg_Usertablesql);
                    $nums = mysqli_num_rows($Reg_Userresult);
                ?>
                <table class="table table-bordered" id="table-data">
                    <thead>
                        <tr>
                            <th scope="col">User_ID</th>
                            <th scope="col">F_name</th>
                            <th scope="col">L_name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="action">Action</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($Reg_Userresult)) {
                    ?>
                        <tr>
                            <td><?php echo $res['User_ID'] ?></td>
                            <td><?php echo $res['Fname'] ?></td>
                            <td><?php echo $res['Lname'] ?></td>
                            <td><?php echo $res['Country'] ?></td>
                            <td><?php echo $res['Email'] ?></td>
                            <td class="action">
                                <a href="include/userdelete.php?id=<?php echo $res['User_ID'] ?>"><button class="btn deleteBtn">Delete</button></a>
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