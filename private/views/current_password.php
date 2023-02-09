<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/change_password.css">

<div class="card">
<h3><span class="one">Food</span><span class="two">For</span><span class="one">ALL</span></h3>
<h2>Hello <?=$rows->first_name?></h2>
<small>Enter Your Current Password</small><br>
<small><a href="email_forgot">Forgotten Password?</a></small>
<form action="" method="post" class="form">
    <input type="password" placeholder="Enter your current password" name="password">
    <?php if($error):?>
    <div class="error"><i class="fa-solid fa-circle-exclamation"></i> &nbsp;Wrong password</div>
    <?php endif;?>
    <button>Submit</button>
</form>
</div>