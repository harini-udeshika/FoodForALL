<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/change_password.css">
<?php $this->view('includes/navbar')?> 
<?php $this->view('includes/submenu')?>  
<div class="card">
<h3><span class="one">Food</span><span class="two">For</span><span class="one">ALL</span></h3>
<h3> Hello <?php 
echo $rows->first_name;?>!</h3>
<p>To proceed please verify your account</p>
<small>A verification code has been sent to your account <?php echo $rows->email?></small>
<form action="" method="post" class="form">
    <div><input type="text" placeholder="Enter verification code" name="code"></div>
    <?php if($error):?>
    <small style="color: #f25070;"><i class="fa-solid fa-circle-exclamation" style="color: #f25070;"></i> <?=$error['msg']?></small>
    <?php endif;?>
    <div> <button>Verify</button></div>       
</form>
<div> 