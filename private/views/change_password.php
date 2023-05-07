<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/change_password.css">
<div class="card">
<h3><span class="one">Food</span><span class="two">For</span><span class="one">ALL</span></h3> 
<p>Reset Your Password</p>
<p></p>
<form action="" method="post" class="form">
    <input type="password" placeholder="Enter your new password" name="password">
    <br>
    <input type="password" placeholder="Confirm your new password" name="password_check">
    <?php if($errors):?>
        <br>
        <small style="color: #f25070;"><i class="fa-solid fa-circle-exclamation" style="color: #f25070;"></i> <?=$errors['password']?></small>
    <?php endif?>
    <br>
    <button>Confirm</button>
</form>
</div>