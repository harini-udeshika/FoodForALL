<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/change_password.css">
<div class="card">
<h3><span class="one">Food</span><span class="two">For</span><span class="one">ALL</span></h3>
<p>Account Recovery </p><p><?=$rows->email?></p>
<p>Please enter the code</p>
<form action="" method="post" class="form">
<input type="text" placeholder="X-X-X-X-X" name="code">

<?php if(isset($arr)):?>
    <small style="color: #f25070;"><i class="fa-solid fa-circle-exclamation" style="color: #f25070;"></i> <?=$arr['error']?></small>
<?php endif ?>
<button>Next</button>
</form>
</div>