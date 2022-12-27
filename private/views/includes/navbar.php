<nav class="navbar">
        <div class="left">
            <div class="nav-i-logo">
                <img src="images/logo.png" alt="" class="nav-logo">
            </div>
        </div>
        <div class="right">
            <div class="nav-i">
                Home
            </div>
            <div class="nav-i">
                Donate/Volunteer
            </div>
            <div class="nav-i">
                Organizations
            </div>
            <div class="nav-i">
                Events
            </div>
            <div class="nav-i">
                About us
            </div>
            <div class="nav-i">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="nav-i">
                <i class="fa-solid fa-crown"></i>
            </div>
            <div class="nav-i">
                <!-- <?php
                $image="images/user_icon.png";
                if(file_exists($user["profile_pic"])){
                    $image=$user["profile_pic"];
                    // echo $user["profile_pic"];
                }
                
                ?> -->
                <img src="<?php echo $image?>" alt="" class="nav-user-icon" id="nav-user-icon">
            </div>
        </div>

    </nav>