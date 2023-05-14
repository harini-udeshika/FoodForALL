<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/donation.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<div class="container">
<h2>You have successfully Subscribed!</h2>
<p>
    You have successfully subscribe with FoodForAll as at <?php echo date('Y-m-d'); ?> <br>

    You can now add more than 3 events and more than 5 items to your merchendise store. 
    We appreciate your efforts to make a real difference in the lives of those
    who are struggling in our community.Together, we can continue to make a
    positive impact and help those in need.</p><br>

    <p>Please note that Your Subscription will expire on <?php echo date('Y-m-d', strtotime('+30 days')); ?></p>

<img src="images/thanks_donation.png">

</div>
<?php $this->view('includes/footer')?>