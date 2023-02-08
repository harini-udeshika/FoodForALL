<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">
<?php $this->view('includes/navbar')?>
<?php if(Auth::logged_in()){
    $this->view('includes/submenu');
}
?>


<div class="container">

    <div class="description">
        <div class="content">
            <div class="main">
                <small>Food</small>
                <p>For</p><small>ALL</small>
            </div>
            <p class="sub">Join with us to donate and volunteer.<br>Let's end the hunger soon!</p>
            <button class="donate"><a href="./events">Donate/Volunteer</a> </button>
        </div>
    </div>
    <div class="image_section">
        <img src="./images/image.png" alt="" class="image">
    </div>
</div>
<div class="sub_section">
    <div class="section">
        <p class="h">Become a donor !</p>
        <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.
        </p>
        <button class="readmore">Read more...</button>
    </div>
    <div class="section">
        <p class="h">Why donate food?</p>
        <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.
        </p>
        <button class="readmore">Read more...</button>
    </div>
    <div class="section">
        <p class="h">How donation helps ?</p>
        <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.
        </p>
        <button class="readmore">Read more...</button>
    </div>
    <div class="section">
        <p class="h">Become a volunteer !</p>
        <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.
        </p>
        <button class="readmore">Read more...</button>
    </div>
</div>
<div class="about_us">
    <div class="about_us-images">
        <img src="./images/Rectangle3.png" alt="" class="charity_image1">
        <img src="./images/Rectangle4.png" alt="" class="charity_image2">
        <img src="./images/Rectangle1.png" alt="" class="charity_image3">
        <img src="./images/Rectangle2.png" alt="" class="charity_image4">
    </div>

    <div class="about_us-des">
        <p class="about_us-sub">About us</p>
        <p class="dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
            quasi maxime
            rerum optio.Lorem
            rerum optio.</p>
        <p class="light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus repellat quidem modi non
            corporis vel cum,
            ullam provident ut laborum error laudantium assumenda tempora suscipit architecto aliquam cupiditate
            inventore?Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Voluptatem necessitatibus repellat quidem modi non corporis vel cum,
            ullam provident
            ut laborum error laudantium assumenda tempora suscipit architecto aliquam cupiditate inventore?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus repellat quidem modi non
            corporis vel cum,


        </p>
        <div class="btn">
            <button class="donate">Donate now</button> <button class="read">Read More</button>
        </div>

    </div>

</div>
<div class="upcoming about_us-sub">Upcoming Events</div>
<div class="events">

    <?php if($event_data):?>
    <?php $i=0;?>
    <?php foreach($event_data as $value):?>
    <div class="section">
        <p class="h"><?=$event_data[$i]->name?></p>
        <img src="./images/donation1.jpeg" alt="">
        <!-- <p class="events-des"> <?=$event_data[$i]->description?></p> -->
        <span><?=$event_data[$i]->date?></span><br>
        <span><?=$event_data[$i]->time?></span><br>
        <span><?=$event_data[$i]->location?></span><br>

        <a href=""><button class="readmore">More details</button></a>
    </div>
    <?php $i++;?>
    <?php endforeach;?>
   <?php endif?>

</div>
<div class="org">
    <div class="ngo-text">
        <p class=" ngo-topic about_us-sub">NGOs who work with us</p>
        <p class="ngo-events-des"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Neque laborum perferendis 
            deleniti quibusdam,
            hic dolores accusantium tempore, inventore asperiores voluptatibus dicta 
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Neque laborum perferendis 
            deleniti quibusdam,
            hic dolores accusantium tempore, inventore asperiores voluptatibus dicta </p>
    </div>
    
    
    <div class="ngo">
        <div class="row">
            <img src="./images/org1.png" alt="">
            <img src="./images/org2.png" alt="">
            <img src="./images/org3.png" alt="">
        </div>
        <div class="row">
            <img src="./images/org2.png" alt="">
            <img src="./images/org3.png" alt="">
            <img src="./images/org1.png" alt="">
        </div>
        <div class="row">
            <img src="./images/org2.png">
            <img src=" ./images/org3.png" alt="">
            <img src="./images/org1.png" alt="">
        </div>
    </div>
    
</div>

<div class="final">
    <hr>
    <img src="./images/logo.png">
    <p class="sub">Join with us!</p>
    <a href="signup"><button class="readmore">Sign in</button></a>
    
</div>
<?php $this->view('includes/footer')?>