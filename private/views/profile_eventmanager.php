<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/profile.css">
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');?>

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
            </div>

            <div class="profile-details">
                <form action="" class="form" method="post" name="detail_form">

                    <div class="name">

                        <div class="f1">
                            <label for="first-name">Name</label>
                            <input type="text" value="<?php echo $rows->full_name?>" class="small" name="name" required>
                        </div>

                        <div class="f2">
                            <label for="last-name">User NIC</label>
                            <input type="text" value="<?php echo $rows->nic?>" class="small" name="username" readonly>

                        </div>
                    </div>
                    <div class="f3">
                        <label for="NIC">orgnization name</label>
                        <!-- $Query="Select name from organization where gov_reg_no $row->nic"; -->
                        <input type="text" value="<?php echo  $rows->name?>" class="small" name="org" readonly>
                    </div>

                    <div class="f4">
                        <label for="email">Email</label>
                        <input type="text" value="<?php echo $rows->email?>" class="small" name="email" readonly>
                    </div>
                    <button class="save" type="submit" name="submit">Save Changes</button>
                </form>
            </div> 
        </div> 
    </div>

<?php $this->view('includes/footer')?>