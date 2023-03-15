<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/confirmation.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>

<div class="container">
    <p class="head">Confirm Request</p>
    <small>
        <?=$data[0]?> volunteer
    </small>
    <p>User workload will be centralized in the following areas.</p>
    <p><?=$des?></p>
    
    <span>Please proceed if you're willing to take part in the above mentioned activites.</span>
    <form action="" method="POST" id="form"><button class="proceed" id="send">Send Request</button></form>
    <div class="popup" id="popup">
            <img src="./images/check.png" alt="">
            <h2>Request sent</h2>
            <p>You'll receive a notification once approved!</p>
            <button class="proceed" id="ok">OK</button>
        </div>
</div>
<script src="<?=ROOT?>/assets/popup.js"></script>
<?php $this->view('includes/footer')?>