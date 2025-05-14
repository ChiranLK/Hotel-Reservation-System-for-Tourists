<?php

include "config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <section class="loginSection">
            <img class="backgroundImg" src="Images/fishing.jpg" alt="background">
            <div class="form-box">
                <!-- Login form -->
                <div class="login-form" id="Login">
                    <div class="top">
                        <span>Don't have an account? <a href="#" onclick="signup()"> Sign Up</a></span>
                        <h2>Login</h2>
                    </div>
                    <?php
                        if(isset($_POST['login'])){
                            $email = $_POST['Email'];
                            $password = $_POST['Password'];
                        
                            $userresult = mysqli_query($conn,"SELECT * FROM Reg_User WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                            $userrow = mysqli_fetch_assoc($userresult);
                            $adminresult = mysqli_query($conn,"SELECT * FROM Admin WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                            $adminrow = mysqli_fetch_assoc($adminresult);
                            $horesult = mysqli_query($conn,"SELECT * FROM Hotel_Owner WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                            $horow = mysqli_fetch_assoc($horesult);
                        
                            if($email == $userrow['Email']){
                                if(is_array($userrow) && !empty($userrow)){
                                    $_SESSION['email'] = $userrow['Email'];
                                    $_SESSION['Fname'] = $userrow['Fname'];
                                    $_SESSION['id'] = $userrow['User_ID'];
                            
                                    if(isset($_SESSION['email'])) {
                                        $userInfo = array(
                                            'Fname' => $_SESSION['Fname']
                                        );
                                        header("Location: index.php");
                                    } else {
                                        echo "User is not logged in";
                                    }
                                }
                            } elseif($email == $adminrow["Email"]){
                                if(is_array($adminrow) && !empty($adminrow)){
                                    $_SESSION['email'] = $adminrow['Email'];
                                    $_SESSION['Fname'] = $adminrow['Fname'];
                                    $_SESSION['id'] = $adminrow['Admin_ID'];
                            
                                    if(isset($_SESSION['email'])) {
                                        header("Location: admin/admin.php");
                                    } else {
                                        echo "Admin is not logged in";
                                    }
                                }
                            } elseif($email == $horow["Email"]){
                                if(is_array($horow) && !empty($horow)){
                                    $_SESSION['email'] = $horow['Email'];
                                    $_SESSION['Fname'] = $horow['Fname'];
                                    $_SESSION['id'] = $horow['HO_ID'];
                            
                                    if(isset($_SESSION['email'])) {
                                        header("Location: hotel-owner/ho.php");
                                    } else {
                                        echo "Hotel Owner is not logged in";
                                    }
                                }
                            } else{
                                echo "<div class='message'>
                                    <p>Wrong Email or Password</p>
                                    </div> <br>";
                            }
                        } else {
                            header("login.php");
                        }

                        
                    ?>
                    <form action="" method="post">
                        <div class="input-box">
                            <input type="text" name="Email" class="input-field" placeholder="Email">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="Password" class="input-field" placeholder="Password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="login" class="submit" value="Login">
                        </div>
                        <div class="two-col">
                            <div class="one">
                                <input type="checkbox" name="" id="login-Check">
                                <label for="login-Check">Remember Me</label>
                            </div>
                            <div class="two">
                                <label><a href="#">Forget Password</a></label>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Signup form -->
                <div class="signUp-form" id="SignUp">
                    <div class="top">
                        <span>Have an account? <a href="#" onclick="login()"> Login</a></span>
                        <h2>Sign Up</h2>
                    </div>
                    <?php
                    if (isset($_POST['user_signup'])){
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $contact = $_POST['contact'];
                        $country = $_POST['country'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $password_confirmation = $_POST['confirmPassword'];

                        if($firstName == "" || $lastName == "" || $contact == "" || $country == "" || $email == "" || $password == "" || $password_confirmation == ""){
                            echo "<script>swal({
                                title: 'Fill the proper details',
                                icon: 'error',
                            });
                            </script>";
                        }
                        else{
                            if ($password == $password_confirmation) {
                                $sql = "SELECT * FROM Reg_User WHERE Email = '$email'";
                                $result = mysqli_query($conn, $sql);
        
                                if ($result->num_rows > 0) {
                                    echo "<script>swal({
                                        title: 'Email already exits',
                                        icon: 'error',
                                    });
                                    </script>";
                                } else {
                                    $sql1 = "INSERT INTO Reg_User (Fname,Lname,Country,Email,Password) VALUES ('$firstName', '$lastName', '$country', '$email', '$password')";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $sql2 = "INSERT INTO Reg_User_Phone (Phone_No) VALUES ('$contact')";
                                    $result2 = mysqli_query($conn, $sql2);
        
                                    if ($result) {
                                        $_SESSION['usermail']=$email;
                                        $firstName = "";
                                        $lastName = "";
                                        $email = "";
                                        $password = "";
                                        $password_confirmation = "";
                                        header("Location: login.php");
                                    } else {
                                        echo "<script>swal({
                                            title: 'Something went wrong',
                                            icon: 'error',
                                        });
                                        </script>";
                                    }
                                }
                            } else {
                                echo "<script>swal({
                                    title: 'Password does not matched',
                                    icon: 'error',
                                });
                                </script>";
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="two-forms">
                            <div class="input-box">
                                <input type="text" name="firstName" class="input-field" placeholder="First name" required>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="input-box">
                                <input type="text" name="lastName" class="input-field" placeholder="Last name" required>
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="tel" name="contact" class="input-field" placeholder="Contact" required>
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="country" class="input-field" placeholder="Country">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" class="input-field" placeholder="Email" required>
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" class="input-field" placeholder="Password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="confirmPassword" class="input-field" placeholder="Confirm password" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="user_signup" class="submit" value="Sign Up">
                        </div>
                        <div class="two-col">
                            <div class="one">
                                <input type="checkbox" name="" id="signUp-Check">
                                <label for="signUp-Check">Remember Me</label>
                            </div>
                            <div class="two">
                                <label><a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php
        require "include/footer.php";
    ?>
    <script src="Js/script.js"></script>
</body>
</html>