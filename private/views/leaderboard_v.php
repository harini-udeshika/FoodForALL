<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/leaderboard.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>


<h2>Volunteer Leaderboard</h2>
<div class="change">
<a  href="leaderboard" class="volunteer">Donor</a>
<a href="leaderboard_v" class="donor">Volunteer</a> 
</div>

<div class="top">
    <div class="container">

        <?php $place = "2nd Place"?>
        <?php if ($data[1]->tot_amount == $data[0]->tot_amount) {
            $place = "1st Place";
        }?>

        <p><?=$place?></p>

        <div class="second">
            <?php   $pic = "./images/user_icon.png";
                    if ($data[1]->profile_pic) {
                        $pic = $data[1]->profile_pic;}?>

            <img src="<?=$pic?>">
            <p>Rs. <?=$data[1]->tot_amount?></p>

        </div>

        <span><?=$data[1]->first_name?></span>
        <span><i class="fa-solid fa-location-dot"></i>&nbsp;<?=$data[1]->city?></span>

    </div>


    <div class="container">
        <p>1st Place</p>
        <div class="first">

            <?php $pic = "./images/user_icon.png";
            if ($data[0]->profile_pic) {
                $pic = $data[0]->profile_pic;}?>

            <img src="<?=$pic?>">
            <i class="fa-solid fa-trophy fa-2xl"></i>
            <p>Rs. <?=$data[0]->tot_amount?> </p>

        </div>

        <span><?=$data[0]->first_name?></span>
        <span><i class="fa-solid fa-location-dot"></i>&nbsp;<?=$data[0]->city?></span>

    </div>


    <div class="container">
    <?php $place = "3rd Place"?>
    <?php   if ($data[1]->tot_amount == $data[2]->tot_amount) {
                $place = "2nd Place";
            }?>
        <p><?=$place?></p>

        <div class="third">
            <?php $pic = "./images/user_icon.png";
                if ($data[2]->profile_pic) {
                    $pic = $data[2]->profile_pic;}?>
                        <img src="<?=$pic?>">
                        <p>Rs. <?=$data[2]->tot_amount?></p>
         
        </div><span><?=$data[2]->first_name?></span>
        <span><i class="fa-solid fa-location-dot"></i>&nbsp;<?=$data[2]->city?></span>
    </div>

</div>

<?php $data_sliced = array_slice($data, 3);
// print_r($data_sliced);?>

<?php $i = 0;?>

<?php if ($data_sliced): ?>

<?php foreach ($data_sliced as $value): ?>

<div class="long-card">
    <small>
    <?php $place = $i + 4?>
    <?php 
    if ($place == 4 && $data_sliced[$i]->tot_amount == $data[2]->tot_amount)
        {
            $place = 3;
        } 
    else if ($i > 0 && ($data_sliced[$i]->tot_amount == $data_sliced[$i - 1]->tot_amount)) 
        {
            $place = $i + 3;
        }
    ?>

    <?=$place?>
    </small>
    <?php 
        $pic = "./images/user_icon.png";
        if ($data[$i]->profile_pic) {
            $pic = $data[$i]->profile_pic;}
    ?>

    <img src="<?=$pic?>">
    <p><?=$data_sliced[$i]->first_name?></p>
    <p><i class="fa-solid fa-location-dot"></i>&nbsp;<?=$data_sliced[$i]->city?></p>
    <span><b>Rs. <?=$data_sliced[$i]->tot_amount?></b></span>

</div>

<?php $i++;?>
<?php endforeach;?>
<?php endif?>


<!-- <script src="<?=ROOT?>/assets/organizationpage.js"></script> -->