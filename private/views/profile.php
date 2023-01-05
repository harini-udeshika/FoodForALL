<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage.css">
<?php $this->view('includes/navbar')?>

<div class="intro">
        <div class="profile_pic">
            <?php
            
                $image="./images/user_icon.png";
                if(file_exists($rows->profile_pic)){
                    $image=$rows->profile_pic;
                }
                ?>
            <img src=" <?php echo $image?>" alt="" class="user-pic">
        </div>
        <div class="details">
            <p class="pro-name"><?=Auth::getfirst_name()?> <?=Auth::getlast_name()?></p>
            <p class="hometown"><?=Auth::getcity()?> </p>
            <a href="#certificates">Certificates</a>
            <a href="#activities">Volunteering</a>
            <a href="#donations">Donations</a>
        </div>
        <div class="button">
            <a class="edit_profile_btn" href="<?=ROOT?>/edit_profile">Edit Profile</a>
            <a class="edit_profile_btn" href="<?=ROOT?>/logout">Log out</a>
        </div>
    </div>
    <div class="certificate_section" id="certificates">
        <div class="heading_certificates">
            <p>Volunteering Certificates</p>
        </div>

        <div class="certificates">
            <div class="certificates_row">
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 1</p>
                </div>
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 2</p>
                </div>
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 3</p>
                </div>
            </div>
            <div class="certificates_row">
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 4</p>
                </div>
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 5</p>
                </div>
                <div class="certificate">
                    <div class="image">

                    </div>
                    <p>Event 6</p>
                </div>
            </div>
        </div>
    </div>
    <div class="activities_section" id="activities">
        <div class="heading_activities">
            <p>Recent Activities</p>
        </div>
        <table>
            <tr class="table_headings">
                <th>Event</th>
                <th>Organization</th>
                <th>Role</th>
                <th>Date</th>
            </tr>
            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>Minor volunteer</td>
                <td>20/05/2022</td>
            </tr>
            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>Minor volunteer</td>
                <td>20/05/2022</td>
            </tr>
            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>Minor volunteer</td>
                <td>20/05/2022</td>
            </tr>
        </table>
    </div>
    <div class="donation_section" id="donations">
        <div class="heading_activities">
            <p>Recent Donations</p>
        </div>
        <table>
            <tr class="table_headings">
                <th>Date</th>
                <th>Organization</th>
                <th>Amount</th>
            </tr>
            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>5000</td>

            </tr>
            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>7500</td>

            <tr class="table_row">
                <td>event</td>
                <td>HungerCare</td>
                <td>1000</td>

            </tr>
        </table>
    </div>
    <div class="end_section">
        <div class="text">
            Total Donated Amount
        </div>
        <button class="amount">
            13500 LKR
            </botton>
    </div>
    
    <!-- <div><a href="logout.php">Log out</a></div> -->
   
    <p><a href="login.php">Log in</a>or <a href="../signup/signup.html">Signup</a></p>
    
    <script src=" navbar.js"></script>

<?php $this->view('includes/footer')?>