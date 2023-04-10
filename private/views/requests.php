<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/requests.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<div class="container">
    <h3>Volunteer Requests</h3>
    <?php $i=0?>
    <?php foreach($data as $d):?>
   <div class="row"><p><?=$data[$i]->name?></p><p><?=$data[$i]->volunteer_type?></p><p><?=$data[$i]->date_time?></p><p><i class="fa-solid fa-hourglass-start"></i>&nbsp;&nbsp;<?=$data[$i]->message?></p></div>
   <?php $i++?>
   <?php endforeach?>
</div>
<script src=" navbar.js"></script>
<?php $this->view('includes/footer')?> 