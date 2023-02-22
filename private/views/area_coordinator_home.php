<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_area.css">

<?php if(Auth::logged_in()){
   
    $this->view('includes/submenu');
}
?>

    <div class="container-main manin1">
        <div class="description">
            <div class="content">
                <p class="main">Good <?=Auth::time()?></p>
                <p class="sub1">Welcome <br><?=Auth::area_user()?><br> Back !!</p>
                <div>
                </div>
            </div>
        </div>
        <div class="image_section">
            <img src="images/image.png" alt="" class="main-image">
        </div>
    </div>
    <div>
    
        <p class="sub1">MY AREA</p>
       
    </div>

    
        
    
    <div class="sub_section">
        <div class="sec2">
        <p class="sub3">30</p>
        <hr>
        <p class="sub2">Number of individual Families</p>
            
        </div>
        <div class="sec2">
            <p class="sub3">26</p>
            <hr>
            <p class="sub2">Number  of Children's Homes</p>
        </div>
        <div class="sec2">
        <p class="sub3">48</p>
        <hr>
        <p class="sub2">Number  of Elder homes</p>
        </div>
    </div>
    <div class="map">
        <p class="sub1">Area map</p>
    <iframe width="100%"height="500" src="https://maps.google.com/maps?q=<?=Auth::area_area()?>&output=embed" ></iframe>
    </div>

    
    <!-- <div class="about_us">
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
    <div class="content">
        <hr>
        <p class="sub1">My area</p>
        <hr>
        <div>
        </div>
    </div> -->


    
    <div>
    <p class="sub1">All records</p>
    </div>

    <div class="mychart" >
    
        <canvas id="myChart"></canvas>
    </div>
    <script>
        let myChart=document.getElementById("myChart").getContext('2d');
        let massPopChart= new Chart(myChart, {
            type:'bar',
            data:{
                labels:['Family','Children House','Elder House'],
                datasets:[{
                    label:"Numbers",
                    data:[
                    30,26,48],
                    backgroundColor:['#658864','#B7B78A','#DDDDDD']
                }]
            },
            options: {
            scales: {
            y: {
                suggestedMin: 0,
                suggestedMax: 30
            }
        }
    }
        });
    </script>

    
<?php $this->view('includes/footer')?>
