<!-- <?php
session_start();

if(isset($_SESSION['user_id'])){
    
    $mysqli=require __DIR__ ."/database.php";

    $sql="SELECT * FROM user
    WHERE id={$_SESSION["user_id"]}";

    $result=$mysqli->query($sql);

    $user=$result->fetch_assoc();
    
   
}

?> -->



<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage.css">
<?php $this->view('includes/navbar')?>
    <div class="container-main">
        <div class="description">
            <div class="content">
                <p class="main">FoodForALL</p>
                <p class="sub">Join with us to donate and volunteer.<br>Let's end the hunger soon!</p>
                <button class="donate">Donate/Volunteer</button>
            </div>
        </div>
        <div class="image_section">
            <img src="images/image.png" alt="" class="main-image">
        </div>
    </div>
    <div class="sub_section">
        <div class="section">
            <p class="h">Become a donor</p>
            <p class="des">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eos officia aut quis nostrum
                repellat
                placeat provident omnis quam recusandae fugit, magni animi veniam ducimus perspiciatis minus veritatis
                illo eum?
            </p>
            <button class="readmore">Read more...</button>
        </div>
        <div class="section">
            <p class="h">Why take part in volunteering</p>
            <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, magnam! Animi sunt nihil
                quasi maxime
                rerum optio.Lorem
                rerum optio.
            </p>
            <button class="readmore">Read more...</button>
        </div>
        <div class="section">
            <p class="h">How donation helps</p>
            <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, dignissimos distinctio?
                Debitis, impedit.
                Accusamus minima commodi ex corporis minus aut aliquid hic quae, voluptatum recusandae! Saepe quo
                perspiciatis officiis nam!
            </p>
            <button class="readmore">Read more...</button>
        </div>
    </div>
    <div class="about_us">
        <hr>
        <p class="sub">About us</p>
        <p class="des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi molestiae maiores non et neque
            nesciunt aut minus quidem tenetur. Quia velit nam corrupti nobis minus. Ipsum amet quasi placeat libero.</p>
        <img src="./images/charity.jpg" alt="" class="charity_image">
        <p class="caption">A small text about the image</p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem necessitatibus repellat quidem modi non
            corporis vel cum,
            ullam provident ut laborum error laudantium assumenda tempora suscipit architecto aliquam cupiditate
            inventore?Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Voluptatem necessitatibus repellat quidem modi non corporis vel cum,
            ullam provident
            ut laborum error laudantium assumenda tempora suscipit architecto aliquam cupiditate inventore?
        </p>
    </div>
    <div class="events">
        <div class="event1">
            <div class="section">
                <p class="sub">Event Name</p>
                <img src="donation1.jpeg" alt="">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque laborum perferendis deleniti quibusdam,
                hic dolores accusantium tempore, inventore asperiores voluptatibus dicta mollitia odio qui iusto quis
                ratione veritatis, quisquam minus!
                <button class="readmore">More details</button>
            </div>
            <div class="section">
                <p class="sub">Event Name</p>
                <img src="donation2.jpg" alt="">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque laborum perferendis deleniti quibusdam,
                hic dolores accusantium tempore, inventore asperiores voluptatibus dicta mollitia odio qui iusto quis
                ratione veritatis, quisquam minus!
                <button class="readmore">More details</button>
            </div>
        </div>
        <div class="event2">
            <div class="section">
                <p class="sub">Event Name</p>
                <img src="donation3.jpeg" alt="">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque laborum perferendis deleniti quibusdam,
                hic dolores accusantium tempore, inventore asperiores voluptatibus dicta mollitia odio qui iusto quis
                ratione veritatis, quisquam minus!
                <button class="readmore">More details</button>
            </div>
            <div class="section">
                <p class="sub">Event Name</p>
                <img src="donation4.jpg" alt="">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque laborum perferendis deleniti quibusdam,
                hic dolores accusantium tempore, inventore asperiores voluptatibus dicta mollitia odio qui iusto quis
                ratione veritatis, quisquam minus!
                <button class="readmore">More details</button>
            </div>
        </div>
    </div>
    <div class="org">
        <hr>
        <p class="sub">NGOs who work with us</p>
        <div class="row">
            <img src="images/org1.png" alt="">
            <img src="images/org2.png" alt="">
            <img src="images/org3.png" alt="">
        </div>
        <div class="row">
            <img src="images/org4.png" alt="">
            <img src="images/org3.png" alt="">
            <img src="images/org1.png" alt="">
        </div>
        <div class="row">
            <img src="images/org2.png"">
            <img src=" images/org3.png" alt="">
            <img src="images/org1.png" alt="">
        </div>
    </div>

    <div class="final">
        <hr>
        <p class="sub">Join with us!</p>
       <a href="../signup/signup.html"><button class="readmore">Sign in</button></a> 
    </div>
<?php $this->view('includes/footer')?>