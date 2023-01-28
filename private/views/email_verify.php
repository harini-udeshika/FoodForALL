<?php $this->view('includes/header')?>
<!-- <link rel="stylesheet" href="<?=ROOT?>/assets/events.css"> -->
<?php $this->view('includes/navbar')?> 
<?php $this->view('includes/submenu')?>  

<h2> Hello <?php echo $rows->first_name?>!</h2>
<h3>To proceed please verify your account</h3>
<p>A verification code has been sent to your account <?php echo $rows->email?></p>
<form action="" method="post">
    <div><input type="text" placeholder="Enter verification code" name="code"></div>
    <div> <button>Verify</button></div>       
</form>
