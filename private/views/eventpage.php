<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/event.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTET7frzRd7t4FvurRzw28rbqEE7_oWFU&callback=initMap&libraries=places"></script>
<script src="http://polyfill.io/v3/polyfill.min.js?features=default"></script>


<div class="main">
<p class="event-name">
    <?=$rows->name?><small> by <?=$org->name?></small> 
</p>
<a href="shop?id=<?=$org->gov_reg_no?>"><button>Explore the shop&nbsp;&nbsp;<i class="fa-solid fa-cart-shopping"></i></button></a>
</div>
<?php if ($rows->date < date("Y-m-d")): ?>
<?php $image_arr = explode(',', $rows->photographs)?>
<div class="whole">
    <div class="stats">
    <div class="donations">
        <p class="goal">Donations collected <span><?=$rows->total_amount?> LKR</span></p>
        <div class="progress"> 
            <div class="progress-bar">
                <div style="width:<?=$donorp?>%"></div>
            </div>

        </div>  
        <p class="goal">Volunteers joined<span><?=$rows->no_of_volunteers?> people</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div style="width:<?=$volunteerp?>%"></div>
            </div>

        </div>
      
        <div class="cards">

        <p class="summary_h">Total amount of donations and the number of  volunteers achieved through the platform...</p>
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Collected Donations</p>
                <p class="green">
                    <?=$amount?> LKR
                </p>
            </div>
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Total Volunteers</p>
                <p class="green"><?=$volunteer_count?> people</p>
            </div>
          
        </div>
    </div>
    </div>
    <section class="gallery">
        <div class="gallery__item">
            <input type="radio" id="img-1" checked name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="uploads/<?=$image_arr[0]?>" alt="" />
            <label for="img-1" class="gallery__thumb"><img src="uploads/<?=$image_arr[0]?>" alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-2" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="uploads/<?=$image_arr[1]?>" alt="" />
            <label for="img-2" class="gallery__thumb"><img src="uploads/<?=$image_arr[1]?>" alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-3" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="uploads/<?=$image_arr[2]?>" alt="" />
            <label for="img-3" class="gallery__thumb"><img src="uploads/<?=$image_arr[2]?>" alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-4" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="uploads/<?=$image_arr[3]?>" alt="" />
            <label for="img-4" class="gallery__thumb"><img src="uploads/<?=$image_arr[3]?>" alt="" /></label>
        </div>
</div>
</section>
<?php endif?>
<?php if ($rows->date > date("Y-m-d")): ?>
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
  
    <img src="<?=$rows->thumbnail_pic?>" alt="">
</div>
<div class="map" id="map"></div>
    <input type="text" value="<?=$rows->latitude?>" id="lat" hidden>
    <input type="text" value="<?=$rows->longitude?>" id="lon" hidden>
<?php
$donor = new Donate();
$donor = $donor->sum("amount", "event_id", $rows->event_id);
$amount = ($donor[0]->total);
$donorp = ($amount / $rows->total_amount) * 100;

if (!$amount) {
    $amount = 0;
}
// echo ($rows->total_amount);
?>

<p class="event-name" id="donate">Donations</p>
<div class="container">
    <div class="donations">
        <p class="goal">Donation Goal <span><?=$rows->total_amount?> LKR</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div style="width:<?=$donorp?>%"></div>
            </div>

        </div>
        <div class="cards">


            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Collected Donations</p>
                <p class="green">
                    <?=$amount?> LKR
                </p>
            </div>
            <div><i class="fa-solid fa-sack-dollar fa-2xl"></i>
                <p>Need more</p>
                <p class="green"><?=$rows->total_amount - $amount?> LKR</p>
            </div>
            <div><i class="fa-solid fa-hourglass-start fa-2xl"></i>
                <p>Closing date</p>
                <p class="green">
                    <?=$closing_date?>
                </p>
            </div>
        </div>
    </div>
    <div class="card">
        <h2><b>Donate</b></h2>
        <p>Amount</p>
        <form method="POST">
            <div class="small-cards">
                <div class="button">
                    <input type="radio" name="packet" value="300" />
                    <label class="btn one" for="a25">1 packet Rs.300</label>
                </div>
                <div class="button">
                    <input type="radio" name="packet" value="600" />
                    <label class="btn two" for="a50">2 packets Rs.600</label>
                </div>
                <div class="button">
                    <input type="radio" name="packet" value="1500" />
                    <label class="btn three" for="a75">5 packets Rs.1500</label>
                </div>
            </div>
       
            <p>OR</p>
       
            <input type="text" placeholder="Other Amount" name="amount">
            <button class="continue">Continue</button>
        </form>

    </div>
</div>
<?php if ($rows->no_of_volunteers != 0): ?>


<p class="event-name" id="volunteer">Volunteers</p>
<div class="container">
    <div class="donations">
        <p class="goal">Number of volunteers<span><?=$rows->no_of_volunteers?> people</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div style="width:<?=$volunteerp?>%"></div>
            </div>

        </div>
        <div class="cards">
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Total Volunteers</p>
                <p class="green"><?=$rows->no_of_volunteers?> people</p>
            </div>
            <div><i class="fa-solid fa-people-carry-box fa-2xl"></i>
                <p>Need more</p>


                <p class="green"><?=$rows->no_of_volunteers - $volunteer_count?> people</p>
            </div>
            <div><i class="fa-solid fa-hourglass-start fa-2xl"></i>
                <p>Closing date</p>
                <p class="green">
                    <?=$closing_date?>
                </p>
            </div>
        </div>
    </div>
    <div class="card">
        <h2><b>Volunteer</b></h2>
        <p>Select Category</p>
        <form action="" class="select_type">
            <div class="small-cards">
            <?php if($volunteer_types):?>
                <div class="button">
                    <?php if(isset($volunteer_types['mild'])):?>
                    <input type="radio" name="type" value="Mild <?=$rows->event_id?>" disabled/>
                    <label class="btn one" for="a25">Mild <br><small>LEVEL 1</small></label>
                    <?php endif;?>
                    <?php if(!isset($volunteer_types['mild'])):?>
                    <input type="radio" name="type" value="Mild <?=$rows->event_id?>"/>
                    <label class="btn one" for="a25">Mild <br><small>LEVEL 1</small></label>
                    <?php endif;?>
                </div>
                <div class="button">
                
                <?php if(!isset($volunteer_types['moderate'])):?>
                    <input type="radio" name="type" value="Moderate <?=$rows->event_id?>" />
                    <label class="btn two" for="a50">Moderate <br><small>LEVEL 2</small></label>
                    <?php endif;?>
                    <?php if(isset($volunteer_types['moderate'])):?>
                    <input type="radio" name="type" value="Moderate <?=$rows->event_id?>" disabled/>
                    <label class="btn two" for="a50">Moderate <br><small>LEVEL 2</small></label>
                    <?php endif;?>
                </div>
                <div class="button">
                    <?php if(isset($volunteer_types['heavy'])):?>
                    <input type="radio" name="type" value="Heavy <?=$rows->event_id?>" disabled/>
                    <label class="btn three" for="a75">Heavy <br><small>LEVEL 3</small></label>
                    <?php endif;?>
                    <?php if(!isset($volunteer_types['heavy'])):?>
                    <input type="radio" name="type" value="Heavy <?=$rows->event_id?>" />
                    <label class="btn three" for="a75">Heavy <br><small>LEVEL 3</small></label>
                    <?php endif;?>
                </div>
                <?php endif;?>
                <?php if($volunteer_types==0):?>
                <div class="button">
                    
                    <input type="radio" name="type" value="Mild <?=$rows->event_id?>"/>
                    <label class="btn one" for="a25">Mild <br><small>LEVEL 1</small></label>
                  
                </div>
                <div class="button">
                
              
                    <input type="radio" name="type" value="Moderate <?=$rows->event_id?>" />
                    <label class="btn two" for="a50">Moderate <br><small>LEVEL 2</small></label>
                    
                 
                </div>
                <div class="button">
                
                    <input type="radio" name="type" value="Heavy <?=$rows->event_id?>" />
                    <label class="btn three" for="a75">Heavy <br><small>LEVEL 3</small></label>
              
                </div>
                <?php endif;?>
            </div>

            <!-- <p>OR</p> -->

            <!-- <input type="text" placeholder="Other Amount"> -->
            <button class="continue">Continue</button>
        </form>

    </div>
</div>
<?php endif?>
<?php endif?>
<script src="<?=ROOT?>/assets/map_user.js"></script>
<?php $this->view('includes/footer')?>