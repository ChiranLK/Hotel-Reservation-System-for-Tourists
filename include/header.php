<header>
        <!--Logo and nav bar-->
        <div class="homeImgNav">
            <img class="navLogo" src="Images/Logopng.png" alt="Logo">
            <nav>
                <ul class="navLinks">
                    <li><a class="link active" href="index.php">Home</a></li>
                    <li><a class="link" href="search.php">Hotels</a></li>
                    <li><a class="link" href="about srilanka.php">About Sri Lanka</a></li>
                    <li><a class="link" href="about us.php">About Us</a></li>
                    <li><a class="link" href="about us.php#contactInfo">Contact Info</a></li>
                </ul>
            </nav>
        </div>
        <div class="profile">
        <?php

            // Check if the user is logged in
            if(isset($_SESSION['Fname'])) {
                // If logged in, show logout button and welcome message
                echo '<div class="userInfo">
                        <a href="user.php"><span id="uName">Welcome, ' . $_SESSION['Fname'] . '</span></a>
                        <a href="logout.php"> <button id="logoutBtn">Log Out</button> </a>
                     </div>';
            } else {
                // If not logged in, show login and sign up buttons
                echo '<div class="logSign">
                        <a href="login.php"><button id="loginBtn">Log in</button></a>
                        <a href="login.php#SignUp"><button id="signBtn">Sign up</button></a>
                    </div>';
            }
        ?>

            <!-- <div class="logSign">
                <a href="login.php"><button id="loginBtn">Log in</button></a>
                <a href="login.php#SignUp"><button id="signBtn">Sign up</button></a>
            </div>
            <div class="userInfo" style="display: none;">
                <a href="user.php">Welcome, <span></span></a>
                <a href="logout.php"> <button id="logoutBtn">Log Out</button> </a>
            </div> -->
        </div>
    </header>