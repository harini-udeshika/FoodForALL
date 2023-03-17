<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/profile.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
 
<div class="heading">
        <p>Edit your profile</p>
    </div>

    <div class="profile">
        <div class="details">
            <div class="profile-pic">
                <?php
                $image="./images/user_icon.png";
                if(file_exists($rows->profile_pic)){
                    $image=$rows->profile_pic;
                    // echo $user["profile_pic"];
                }
                
                ?>

                <img src="<?php echo $image?>" alt="" class="des-user-icon" >
                <div class="remove">
                    <a href="changepic">Upload new |</a>
                    <form method="post" action="./delete_pic.php" class="remove_form"><button type="submit"
                            class="remove_button">Remove</button> </form>
                </div>
                <a href="current_password"><button class="change-pwd">Change Password</button></a>
            </div>
            <div class="profile-details">
                <form action="" class="form" method="post">

                    <div class="name">

                        <div class="f1">
                            <label for="first-name">First name</label>
                            <input type="text" value="<?php echo $rows->first_name?>" class="small"
                                name="first_name" >
                        </div>

                        <div class="f2">
                            <label for="last-name">Last name</label>
                            <input type="text" value="<?php echo $rows->last_name?>" class="small" name="last_name" >

                        </div>
                    </div>
                    <div class="f3">
                        <label for="NIC">NIC</label>
                        <input type="text" value="<?php echo $rows->nic?>" class="small" name="nic" readonly>
                    </div>

                    <div class="f4">
                        <label for="email">Email</label>
                        <input type="text" value="<?php echo $rows->email?>" class="small" name="email" readonly>
                    </div>
                    <div class="address_n_city">
                        <div class="f">
                            <label for="address">Address</label>
                            <input type="text" value="<?php echo $rows->address_1?>" name="address_1">
                        </div>
                        <div class="f">
                            <label for="city">Residential Area</label>
                            <input type="text" value="<?php echo $rows->city?>" class="small" name="city">
                        </div>
                    </div>

                    <div class="f">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" value="<?php echo $rows->postal_code?>" class="small" name="postal_code">
                    </div>

                   
                    <div class="f">
                        <label for="telephone">Telephone Number</label>
                        <input type="text" value="<?php echo $rows->telephone?>" name="telephone">
                    </div>
                    <button class="save" type="submit" name="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
<!-- <script src=" navbar.js"></script> -->
<?php $this->view('includes/footer')?>