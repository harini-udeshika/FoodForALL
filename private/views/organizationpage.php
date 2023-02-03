<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>


<div class="shop">
    <p><?=ucfirst($org->name)?></p>
    <button class="shop-button"><i class="fa-solid fa-cart-shopping fa-xl"></i> Shop here!</button>
</div>
<div class="intro">
    <div class="intro-2">
        <div class="org-logo">
            <img src="" alt="">
        </div>
        <p class="des">       
            <?=$org->about?>
        </p>
        <div class="contact-info">
            <div class="contact">
                <p><i class="fa-solid fa-envelope fa-l"></i>&emsp;<?=$org->email?></p>
                <p><i class="fa-solid fa-phone fa-l"></i>&emsp;<?=$org->tel?></p>
            </div>
            <div class="social">
                <i class="fa-brands fa-facebook fa-xl"></i>
                <i class="fa-brands fa-instagram fa-xl"></i>
                <i class="fa-brands fa-twitter fa-xl"></i>
            </div>
        </div>
    </div>
    <div class="intro-3">
        <img scr="">
    </div>
</div>
<div class="ongoing">
    <p class="heading"><i class="fa-solid fa-calendar-days fa-xl"></i></i>&emsp;Ongoing Events</p>
    <div class="event-container">
        <div class="event-row">
            <?php $i = 0;?>
            <?php if ($ongoing): ?>
            <?php
//print_r($rows);?>
            <?php foreach ($ongoing as $value): ?>

            <?php if ($i % 3 == 0 && $i != 0): ?>
        </div>
        <div class="event-row">

            <?php endif?>
            <a href="<?=ROOT?>/eventpage?id=<?=$ongoing[$i]->event_id?>">
                <div class="event">

                    <div class="event-top">
                        <p>
                            <?php echo $ongoing[$i]->name ?>
                        </p>
                        <div class="event-image">
                        </div>
                        <p class="date">
                            <?php echo $ongoing[$i]->date ?>
                        </p>
                        <small>Interested <i class="fa-regular fa-star fa-sm"></i></i></small>
                        <!-- //<i class="fa-solid fa-star fa-sm"> -->
                    </div>

                    <div class="event-details">
                        <div class="donations">
                            <p>Donations</p>
                            <p><img src="./images/Icons/ArrowLog.png"><?=$ongoing[$i]->total_amount?> LKR</p>
                        </div>

                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                            <p>Volunteers </p>
                            <p><img src="./images/Icons/ArrowLog.png"><?=$ongoing[$i]->no_of_volunteers?> people</p>
                        </div>

                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                    </div>

                    <div class="event-button">
                        <button class="b1"> <a
                                href="<?=ROOT?>/eventpage?id=<?=$ongoing[$i]->event_id?>/#donate">Donate</a></button>
                        <button class="b2"> <a
                                href="<?=ROOT?>/eventpage?id=<?=$ongoing[$i]->event_id?>/#volunteer">Volunteer</a></button>
                    </div>

                </div>
            </a>
            <?php $i++;
// echo ($i); ?>

            <?php endforeach;?>
            <?php endif?>
        </div>


    </div>
</div>
<div class="completed">
    <p class="heading"><i class="fa-solid fa-circle-check fa-xl"></i>&emsp;Completed Events</p>
    <div class="event-container">
        <div class="event-row">
            <?php $i = 0;?>
            <?php if ($completed): ?>
            <?php
//print_r($rows);?>
            <?php foreach ($completed as $value): ?>

            <?php if ($i % 3 == 0 && $i != 0): ?>
        </div>
        <div class="event-row">

            <?php endif?>
            <a href="<?=ROOT?>/eventpage?id=<?=$completed[$i]->event_id?>">
                <div class="event">

                    <div class="event-top">
                        <p>
                            <?php echo $completed[$i]->name ?>
                        </p>
                        <div class="event-image">
                        </div>
                        <p class="date">
                            <?php echo $completed[$i]->date ?>
                        </p>
                        <!-- <small>Interested <i class="fa-regular fa-star fa-sm"></i></i></small> -->
                        <!-- //<i class="fa-solid fa-star fa-sm"> -->
                    </div>

                    <div class="event-details">
                        <div class="donations">
                            <!-- <p>Donations</p>
                        <p><img src="./images/Icons/ArrowLog.png"><?=$completed[$i]->total_amount?> LKR</p> -->
                        </div>

                        <div class="progress">
                            <!-- <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span> -->
                        </div>
                        <div class="volunteers">
                            <!-- <p>Volunteers </p>
                        <p><img src="./images/Icons/ArrowLog.png"><?=$completed[$i]->no_of_volunteers?> people</p> -->
                        </div>

                        <div class="progress">
                            <!-- <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span> -->
                        </div>
                    </div>


                    <button class="details"> <a
                            href="<?=ROOT?>/eventpage?id=<?=$completed[$i]->event_id?>/#donate">Details</a></button>
                    <!-- <button class="b2"> <a href="<?=ROOT?>/eventpage?id=<?=$completed[$i]->event_id?>/#volunteer">Volunteer</a></button> -->


                </div>
            </a>
            <?php $i++;
// echo ($i); ?>

            <?php endforeach;?>
            <?php endif?>
        </div>


    </div>
</div>
<h2>We would like to hear from you!</h2>
<div class="form-container">
    <form action="" class="review" method="post">
        <div class="comment">
            <p>Add a review</p>

            <textarea name="comment" id="comment" placeholder="Add your comment">

</textarea>
            <button><i class="fa-solid fa-paper-plane"></i>&emsp;Send</button>
        </div>
    </form>
</div>
<h2>Reviews</h2>
<?php $i = 0;?>
        <?php if ($comment_data): ?>
           
<div class="reviews scroll">
<?php foreach ($comment_data as $value): ?>
    <div class="review-card">
        <div class="review-left">
            <img src="<?=$comment_data[$i]->profile_pic?>" alt="">
            <p><?=$comment_data[$i]->first_name?></p>
           
        </div>
        <div class="review-right">
            <p><?=$comment_data[$i]->comment?></p>
            <p class='date-time'><?=substr($comment_data[$i]->date_time,0,-8)?>
           &emsp;<?=substr($comment_data[$i]->date_time,10,6)?></p>
        </div>

    </div>

<?php $i++;
// echo ($i); ?>

<?php endforeach;?>
    </div>
        <?php endif?>

<?php $this->view('includes/footer')?>
<script src=" navbar.js"></script>