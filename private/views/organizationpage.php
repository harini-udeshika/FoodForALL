<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>


<div class="shop">
    <p><?=ucfirst($org->name)?></p>
    <a href="<?=ROOT?>/shop?id=<?=$org->gov_reg_no?>"><button class="shop-button"><i class="fa-solid fa-cart-shopping fa-xl"></i> Shop here!</button></a>
</div>
<div class="intro">
    <div class="intro-2">
        <div class="org-logo">
            <img src="<?=$org->profile_pic?>" alt="">
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
            <?php if (!$ongoing): ?>
                <h4><i class="fa-solid fa-calendar-xmark fa-xl"></i>&nbsp;&nbsp;Sorry! No ongoing events<h4>
            <?php endif?>
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
                            <img src="<?=$ongoing[$i]->thumbnail_pic?>">
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
            <?php if (!$completed): ?>
                <h4><i class="fa-solid fa-calendar-xmark fa-xl"></i>&nbsp;&nbsp;Completed events not found!<h4>
            <?php endif?>
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
    <form action="" class="review" method="post" id="form">
        <div class="comment">
            <p>Add a review</p>

            <textarea name="comment" id="comment" placeholder="Add your comment">

            </textarea>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <div class="dropdowns">
                <div class="dropdown-role">
                    <!-- <label for="cars">Role</label> -->
                    <select name="user_type" id="user_type">
                        <option value="" selected disabled hidden>Role</option>
                        <option value="donor">Donor</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                </div>
                <div class="dropdown-role">
                    <!-- <label for="cars">Role</label> -->

                    <select name="event" id="event">
                        <option value="" selected disabled hidden>Event</option>
                        <?php $i = 0;?>
                        <?php if ($v_event_name): ?>
                        <?php
//print_r($rows);?>
                        <?php foreach ($v_event_name as $value): ?>
                        <option value="<?=$v_event_name[$i]->name?>"><?=$v_event_name[$i]->name?></option>
                        <?php $i++;
// echo ($i); ?>

                        <?php endforeach;?>
                        <?php endif?>

                        <?php $i = 0;?>
                        <?php if ($d_event_name): ?>
                        <?php
//print_r($rows);?>
                        <?php foreach ($d_event_name as $value): ?>
                        <option value="<?=$d_event_name[$i]->name?>"><?=$d_event_name[$i]->name?></option>
                        <?php $i++;
// echo ($i); ?>

                        <?php endforeach;?>
                        <?php endif?>
                    </select>
                </div>

                
            </div>
                <div class="hide">
                    <i class="fa-solid fa-circle-exclamation"></i><small id="small">error message</small>
                </div>
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
            <div class="stars">
                <?php for ($j = 0; $j < 5; $j++): ?>
                <?php if($j<$comment_data[$i]->star_rate):?>
                <span class="bright">★</span>
                <?php endif;?>
                <?php if($j>=$comment_data[$i]->star_rate):?>
                <span class="dull">★</span>
                <?php endif;?>
                <?php endfor?>
            </div>
        </div>
        <div class="review-right">
            <p><?=$comment_data[$i]->comment?></p>
            <p class="admin">&nbsp;<i class="fa-solid fa-comment-dots"></i><?=$comment_data[$i]->reply?></p>
            <p class='date-time'><?=substr($comment_data[$i]->date_time, 0, -8)?>
                &emsp;<?=substr($comment_data[$i]->date_time, 10, 6)?></p>
            <div class="rating">
                <span class="tag-1"><?=$comment_data[$i]->user_type?></span>
                <span class="tag-2"><?=$comment_data[$i]->event_name?></span>
            </div>
        </div>

    </div>

    <?php $i++;
// echo ($i); ?>

    <?php endforeach;?>
</div>
<?php endif?>
<?php if (!$comment_data): ?>
        <h4><i class="fa-solid fa-comments fa-xl"></i> &nbsp;Be the first to comment</h4>
<?php endif?>
<?php $this->view('includes/footer')?>
<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/organizationpage.js"></script>