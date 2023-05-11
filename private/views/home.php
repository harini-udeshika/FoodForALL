<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
 <link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">

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

            <a href="<?=$path?>"><button class="donate">Donate/Volunteer </button></a>
            
          

        </div>
    </div>
    <div class="image_section">
        <img src="./images/image.png" alt="" class="image">

    </div>
</div>
<div class="sub_section">
    <div class="section">
        <p class="h">Become a donor !</p>
        <p class="des">Becoming a donor for charity events is a simple yet powerful way to make a positive impact on the world. By
            giving to
            a worthy cause ...
        </p>
        <a href="about"><button class="readmore">Read more...</button></a>
    </div>
    <div class="section">
        <p class="h">Why donate food?</p>
        <p class="des">Donating food during an economic crisis is critical to those in need and helps the community. By providing
            stability
            and hope to those struggling to put food on the table ...
        </p>
        <a href="about"><button class="readmore">Read more...</button></a>
    </div>
    <div class="section">
        <p class="h">How donation helps ?</p>
        <p class="des">Cash donations can be a powerful tool in helping food donating charities make a difference. With the
            flexibility to
            purchase exactly what is needed, such as wholesome and nutritious food ...
        </p>
        <a href="about"><button class="readmore">Read more...</button></a>
    </div>
    <div class="section">
        <p class="h">Become a volunteer !</p>

        <p class="des">By giving your time and skills, you provide valuable support to organizations working to improve the lives of
            those
            in need. Whether it's sorting donations, serving food, or providing comfort to those in crisis, your
            contributions ...

        </p>
        <a href="about"><button class="readmore">Read more...</button></a>
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

<?php if(!Auth::logged_in()):?>
<div class="final">
    <hr>
    <img src="./images/logo.png">
    <p class="sub">Join with us!</p>
    <a href="signup"><button class="readmore">Sign in</button></a>

</div>
<?php endif; ?>

<?php if(Auth::logged_in()):?>
<div class="final">
    <hr>
    <img src="./images/logo.png">
    <p class="sub">Join with us!</p>
    <a href="events"><button class="readmore">View Events</button></a>

</div>
<?php endif; ?>

<?php $this->view('includes/footer')?>