<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/requests.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<div class="container">
    <h3>Volunteer Requests</h3>
    <?php $i = 0?>
<?php foreach ($data as $d): ?>
<div class="row"><p><?=$data[$i]->name?></p><p><?=$data[$i]->volunteer_type?></p>
    <p><?=$data[$i]->date_time?></p>
    <?php if ($data[$i]->message=="pending"):?>
    <p><i class="fa-solid fa-hourglass-start" style="color: #8c8fd9;"></i>&nbsp;&nbsp;<?=$data[$i]->message?></p>
    <?php endif;?>
    <?php if ($data[$i]->message=="accepted"):?>
    <p><i class="fa-solid fa-circle-check" style="color: #7fc25b;"></i>&nbsp;&nbsp;<?=$data[$i]->message?></p>
    <?php endif;?>
    <?php if ($data[$i]->message=="rejected"):?>
    <p><i class="fa-solid fa-circle-xmark" style="color: #e72354;"></i>&nbsp;&nbsp;<?=$data[$i]->message?></p>
    <?php endif;?>
</div>
<?php $i++?>
<?php endforeach?>
</div>
<script src=" navbar.js"></script>
<?php $this->view('includes/footer')?>