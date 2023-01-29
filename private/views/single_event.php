<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/event.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>



<p class="event-name">
    Hunger Care <small>by Help Sri Lanka</small>
</p>
<div class="event-body">
    <div class=details>
        <p class="des">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, sunt! Veniam eius cupiditate accusantium.
            Fugit
            dolorem minima sunt voluptate pariatur amet labore corrupti est ipsa. Recusandae quaerat ex quidem quos.
            Quae ea sapiente accusantium repellat aspernatur magni ut officia, molestiae expedita nesciunt!
            Perspiciatis
            soluta harum magnam deleniti asperiores, odio fuga voluptas quaerat porro sit velit explicabo, aliquid
            maiores
            quos veritatis!
            Facilis, veniam necessitatibus! Dolorum laudantium molestiae velit voluptatem exercitationem, ex ea.
            Dignissimos
        </p>
        <p class="event-m">Event Manager : eventm@gmail.com</p>
        <div class="date-time">
            <p class="ii"><i class="fa-solid fa-location-dot"></i><span>Location</span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-clock"></i><span>Time</span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-calendar-days"></i><span>Date</span></p>
            <hr>
            <p class="ii"><i class="fa-solid fa-heart"></i><span>Help Sri Lanka</span></p>
        </div>
    </div>
    <img src="images/event.jpeg" alt="">
</div>
<p class="event-name">Donations</p>
<div class="container">
    <div class="donations">
        <p class="goal">Donation Goal <span>280 000 LKR</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div></div>
            </div>

        </div>
        <div class="cards">
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Collected Donations</p>
                <p class="green">25000 LKR</p>
            </div>
            <div><i class="fa-solid fa-sack-dollar fa-2xl"></i>
                <p>Need more</p>
                <p class="green">100000 LKR</p>
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
<p class="event-name">Volunteers</p>
<div class="container">
    <div class="donations">
        <p class="goal">Number of volunteers<span>25 people</span></p>
        <div class="progress">
            <div class="progress-bar">
                <div></div>
            </div>

        </div>
        <div class="cards">
            <div><i class="fa-solid fa-circle-check fa-2xl"></i>
                <p>Total Volunteers</p>
                <p class="green">25 people</p>
            </div>
            <div><i class="fa-solid fa-people-carry-box fa-2xl"></i>
                <p>Need more</p>
                <p class="green">5 people</p>
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
        <p>OR</p>
        <form action="">
            <input type="text" placeholder="Other Amount">
            <button>Continue</button>
        </form>

    </div>
</div>
<?php $this->view('includes/footer')?>