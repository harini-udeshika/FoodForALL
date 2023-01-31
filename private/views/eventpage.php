<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/event.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>



<p class="event-name">
    <?=$rows->name?><small> by <?=$org->name?></small>
</p>
<div class="event-body">
    <div class=details>
        <p class="des">
        <?=$rows->description?>
        </p>
        <p class="event-m">For more details : <?=$rows->event_manager_email?></p>
        <div class="date-time">
            <p class="ii"><i class="fa-solid fa-location-dot"></i><span><?=ucfirst($rows->location)?></span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-clock"></i><span><?=$rows->time?></span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-calendar-days"></i><span><?=$rows->date?></span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-heart"></i><span><?=ucfirst($org->name)?></span></p>
        </div>
    </div>
    <img src="images/event.jpeg" alt="">
</div>
<p class="event-name" id="donate">Donations</p>
<div class="container" >
    <div class="donations">
        <p class="goal">Donation Goal <span><?=$rows->total_amount?> LKR</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div></div>
            </div>

        </div>
        <div class="cards">
        <?php
$donor = new Donate();
$donor = $donor->sum("amount", "event_id", $rows->event_id);
$amount = ($donor[0]->total);
if (!$amount) {
    $amount = 0;
}
// echo ($rows->total_amount);
?>
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Collected Donations</p>
                <p class="green"><?=$amount?> LKR</p>
            </div>
            <div><i class="fa-solid fa-sack-dollar fa-2xl"></i>
                <p>Need more</p>
                <p class="green"><?=$rows->total_amount - $amount?> LKR</p>
            </div>
            <div><i class="fa-solid fa-hourglass-start fa-2xl"></i>
                <p>Closing date</p>
                <p class="green">2023/04/25</p>
            </div>
        </div>
    </div>
    <div class="card">
    <h2><b>Donate</b></h2>
        <p>Amount</p>
        <div class="small-cards">
            <div>1 package <small>300 LKR</small></div>
            <div>2 packages <small>600 LKR</small></div>
            <div>5 packages <small>1500 LKR</small></div>
        </div>
        <p>OR</p>
        <form action="">
            <input type="text" placeholder="Other Amount">
            <button>Continue</button>
        </form>

    </div>
</div>
<p class="event-name" id="volunteer">Volunteers</p>
<div class="container" >
    <div class="donations">
        <p class="goal">Number of volunteers<span><?=$rows->no_of_volunteers?> people</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div></div>
            </div>

        </div>
        <div class="cards">
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Total Volunteers</p>
                <p class="green"><?=$rows->no_of_volunteers?> people</p>
            </div>
            <div><i class="fa-solid fa-people-carry-box fa-2xl"></i>
                <p>Need more</p>
                <?php
$volunteer = new Volunteer();
$volunteer_count = $volunteer->count("user_id", "event_id", $rows->event_id);
$volunteer_count = ($volunteer_count[0]->count);
?>
                <p class="green"><?=$rows->no_of_volunteers - $volunteer_count?> people</p>
            </div>
            <div><i class="fa-solid fa-hourglass-start fa-2xl"></i>
                <p>Closing date</p>
                <p class="green">2023/04/25</p>
            </div>
        </div>
    </div>
    <div class="card">
        <h2><b>Volunteer</b></h2>
        <p>Select Catergory</p>
        <div class="small-cards">
            <div>Mild <small>Level 1</small></div>
            <div>Moderate <small>Level 2</small></div>
            <div>Heavy <small>Level 3</small></div>
        </div>
        <!-- <p>OR</p> -->
        <form action="">
            <!-- <input type="text" placeholder="Other Amount"> -->
            <button>Continue</button>
        </form>

    </div>
</div>
<?php $this->view('includes/footer')?>