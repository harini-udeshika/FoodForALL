<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
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

            <?php if(Auth::logged_in()){
                $path='events';
            }else{
                $path='signup';
                }?>
            <button class="donate"><a href="<?=$path?>">Donate/Volunteer</a> </button>
            
          

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
    <!-- <h1>The Purest of Doggos</h1> -->
<div class="grid-container">
  <div>
    <img class='grid-item grid-item-1' src='https://images.unsplash.com/photo-1509099836639-18ba1795216d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGNoYXJpdHl8ZW58MHx8MHx8&auto=format&fit=crop&w=600&q=60 alt=''>
    <p>"You can make them smile"</p>
  </div>
  <div>
    <img class='grid-item grid-item-2' src='https://images.unsplash.com/photo-1485962093642-5f4386e84429?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjd8fGZvb2QlMjBkb25hdGlvbnxlbnwwfDF8MHx8&auto=format&fit=crop&w=600&q=60' alt=''>
    <p>"Healthy meal to those who need"</p>
  </div>
  <div>
    <img class='grid-item grid-item-3' src='https://images.unsplash.com/photo-1608686207856-001b95cf60ca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Y2hhcml0eXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60' alt=''>
    <p>"Your donations help us a lot"</p>
  </div>
  <div>
    <img class='grid-item grid-item-4' src='https://images.unsplash.com/photo-1609139027234-57570f43f692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGZvb2QlMjBkb25hdGlvbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60' alt=''>
    <p>"Spread love, Donate"</p>
  </div>
  <!-- <div>
    <img class='grid-item grid-item-5' src='https://images.unsplash.com/photo-1530281700549-e82e7bf110d6?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"Are you gunna throw the ball?"</p>
  </div>
  <div>
    <img class='grid-item grid-item-6' src='https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"C'mon friend!"</p>
  </div>
  <div>
    <img class='grid-item grid-item-7' src='https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"A rose for mommy!"</p>
  </div>
  <div>
    <img class='grid-item grid-item-8' src='https://images.unsplash.com/photo-1518717758536-85ae29035b6d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"You gunna finish that?"</p>
  </div>
  <div>
    <img class='grid-item grid-item-9' src='https://images.unsplash.com/photo-1535930891776-0c2dfb7fda1a?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"We can't afford a cat!"</p>
  </div>
  <div>
    <img class='grid-item grid-item-10' src='https://images.unsplash.com/photo-1504595403659-9088ce801e29?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt=''>
    <p>"Dis my fren!"</p>
  </div> -->
</div>
    </div>

    <div class="about_us-des">
        <p class="about_us-sub">About us</p>
        <p class="dark">FoodForALL is a web platofrm that is making a difference in the lives of the less fortunate in Sri Lanka.
    By creating a network of charities across the country, they are able to provide much-needed assistance to those who
    are struggling with food insecurity. With a mission to ensure that no one goes hungry, FoodForALL is working
    tirelessly to bring together resources and support to those in need. </p>
        <p class="light">
        By joining forces with other organizations,
    they are able to make an even bigger impact and bring hope to communities that have been struggling. If you're
    looking to make a difference in the world, consider supporting FoodForALL in their mission to end hunger in Sri
    Lanka.


        </p>
        <div class="btn">
            <?php if (Auth::logged_in()) {
                $path = 'events';
            } else {
                $path='signup';
            }?>
            <a href="<?=$path?>"><button class="donate">Donate now</button></a><a href="about"><button class="read">Read More</button></a>

        </div>

    </div>

</div>
<div class="upcoming about_us-sub">Upcoming Events</div>
<div class="events">

    <?php if ($event_data): ?>
    <?php $i = 0;?>
    <?php foreach ($event_data as $value): ?>
    <div class="section">
        <p class="h"><?=$event_data[$i]->name?></p>
        <?php if($event_data[$i]->thumbnail_pic){
            $image = $event_data[$i]->thumbnail_pic;
        }else{
            $image = "./images/tumbnail.jpg";
        }
        ?>
        <div class="img"><img src="<?=$image?>" alt=""></div>
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

    <?php if ($pics): ?>
    <?php $i = 0;?>
    <?php foreach ($pics as $value): ?>
       
        <img src="<?=$pics[$i]->profile_pic?>" alt="">
    <?php if ($i % 3 == 0 && $i != 0): ?>
    </div>
    <div class="row">
    <?php endif?>

    <?php $i++;?>
    <?php endforeach;?>
    <?php endif?>  
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