<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/requests.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<div class="container">
    <h3>Validate Certificates</h3>
    <?php if(!$data):?>
        <div class="no_req">
            <p><i class="fa-solid fa-message"></i> No certificates to validate</p>
        </div>
    <?php endif?>
    <?php if($data):?>
   
<?php foreach ($data as $d): ?>
    <div class="row">
       <b> <p>Event name</p> </b>
       <b><p>Volunteer</p> </b>  <b><p class='cert'>Certificate</p>  </b> <b><p>Status</p> </b>
</div>
<div class="row"><p><?=$d->name?></p>
<p><?=$d->fullname?></p>
    <p> <a href="profile?cert_id=<?=$d->id?>">Show credential &nbsp;&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
    <?php if($d->status == '0'): ?>
    <a href="certificate_validate?event_id=<?=$d->event_id?>&approve=true&cert_id=<?=$d->id?>"><button class="approve">Approve</button></a>
    <a href="certificate_validate?event_id=<?=$d->event_id?>&reject=true&cert_id=<?=$d->id?>"><button class="reject">Reject</button></a>
    <button class="hide">hidden</button>
    <?php endif;?>
    <?php if($d->status == '1'): ?>
 <button class="done"><i class="fa-sharp fa-solid fa-circle-check"></i> Approved</button>
 <a href="certificate_validate?event_id=<?=$d->event_id?>&approve=true&cert_id=<?=$d->id?>"><button class="approve">Approve</button></a>
    <a href="certificate_validate?event_id=<?=$d->event_id?>&reject=true&cert_id=<?=$d->id?>"><button class="reject">Reject</button></a>

    <?php endif;?>
    <?php if($d->status == '2'): ?>

   <button class="done"><i class="fa-solid fa-circle-xmark"></i> Rejected</button>
   <a href="certificate_validate?event_id=<?=$d->event_id?>&approve=true&cert_id=<?=$d->id?>"><button class="approve">Approve</button></a>
    <a href="certificate_validate?event_id=<?=$d->event_id?>&reject=true&cert_id=<?=$d->id?>"><button class="reject">Reject</button></a>
    <?php endif;?>
   
</div>

<?php endforeach?>
<?php endif?>
</div>
<script src=" navbar.js"></script>
<?php $this->view('includes/footer')?>