<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/home_org.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>  

<?php 
//  echo "<pre>";
//  echo "home_org";
//  print_r($allrows);
//  echo "<br><br><br>";
//  print_r($_SESSION['USER']);
//  echo "<br><br><br>";

//  echo $_SESSION['USER']->email;
//  print_r($_SESSION['USER']['name']);
 
?>

<div style="padding-top: 10px; padding-bottom: 60px; text-align: center; font-size: 50px; font-weight: bold; color: #000000; " >
        <?php if(isset($_SESSION['USER'])){
            $na = $_SESSION['USER']->name;
            echo $na;
            }              
        ?>
    </div>
    <div class="center-box background-img" style="margin-top: -40px; background-color: white; ">
        <button class="more-btn" style="float: right; width: 50px; height: 40px; 
                background-color: #98A0CF; border-radius: 8px;">Edit</button>
        <div class="flex-container">
        

        <table>
            <td style="width: 70%;">
                <div class="flex-item f-item-2" style="padding: 20px; background-color:rgb(212, 215, 232,0);
                border: 4px solid #98A0CF; border-radius:12px; width:600px;">

                <center style="font-size: 26px; 
                font-weight:bold; margin: 5px;">Your Details</center><br>

                <table>
                    <tbody style="font-size: 23px; height: 280px; color: #98A0CF;">
                    <tr>
                        <td>
                            ORGANIZATION NAME
                        </td>
                        <td>
                            <span ><?php 
                                $na = $_SESSION['USER']->name;
                                echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                            ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            EMAIL
                        </td>
                        <td>
                            <span ><?php 
                            $na = $_SESSION['USER']->email;
                            echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                    ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            GOV. Registration
                        </td>
                        <td>
                            <span><?php 
                            $na = $_SESSION['USER']->gov_reg_no;
                            echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                            ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TELL
                        </td>
                        <td>
                            <span><?php 
                            $na = $_SESSION['USER']->tel;
                            echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                            ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ADDRESS
                        </td>
                        <td>
                            <span ><?php 
                            $na = $_SESSION['USER']->address;
                            echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                            ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            OPERATING AREA
                        </td>
                        <td>
                            <span><?php 
                            $na = $_SESSION['USER']->city;
                            echo "&nbsp;:&nbsp;&nbsp;&nbsp;".$na;
                            ?></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                
                <br>
                

                </div>
            </td>

            
            <td>
                    <div class="slideshow-container" style="border-radius: 13px;">
                        
                        <div class="mySlides" style="border: 4px solid #98A0CF; border-radius: 13px;">
                            <?php
                            $image = "./images/logo.png";
                            if ($_SESSION['USER']->profile_pic) {
                                $image = $_SESSION['USER']->profile_pic;
                            }
                            ?>
                            <img src="<?=$image?>" width="100%" height="240px">
                        </div>

                    <!-- <a class="prev" onclick="plusSlides(-1)">â®</a>
                    <a class="next" onclick="plusSlides(1)">â¯</a> -->
                </div>
            </td>
        </table>
            
        </div>
    </div>

    <div class="center-box-border" style=" 
    text-align: center; width: 1000px; height: 400px; margin-top: 50px;">

        <button class="more-btn" style="float: right; width: 70px; height: 40px; 
                background-color: #98A0CF; border-radius: 12px;">Add News</button>

        <h2 style="margin-left: 50px; color: #7681BF">News & Updates</h2>
        <hr size="4px" noshade style="width: 55%; opacity: 0.7; text-align: center;
            height: 2px;
            background: black;" >
        <br>

        <div class="test" style="display: flex; 
            margin: auto;
            margin-top: 15px;
            background-color: rgb(190, 223, 143,0);
            display: flex;
            justify-content: space-around;
            border-radius: 20px;
            padding: 10px;
            padding-bottom: 10px;
            width: 80%;">

            <div class="f-item-3" style="background-color: 
            rgb(190, 223, 143,0); 
            border: 2px solid #98A0CF;
            height:200px; width: 45%;
            border-radius:12px;">
            <div style="background-color:#dee0e1; height: 50%; width: 50%; border-radius:12px; float:left;"></div>
                    <button class="more-btn" style="float:right; width:60px;">ADD</button><br><br>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            </div>

            <div class="f-item-3" style="background-color: 
            rgb(190, 223, 143,0); 
            border: 2px solid #98A0CF;
            height:200px; width: 45%;
            border-radius:12px;">
            <div style="background-color:#dee0e1; height: 50%; width: 50%; border-radius:12px; float:left;"></div>
                    <button class="more-btn" style="float:right; width:60px;">ADD</button>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            _________________________________<br>
            </div>
        </div>
    </div><br><br>

    <h1 style="font-family: consolas; color: #000000; text-align: center;">Ongoing Events</h1>
    <hr size="3px" noshade style="width: 45%; opacity: 0.7; text-align: center;
                height: 3px;
                background: black;" >

    <div class="center-box-border" style="height: 800px; width: 1100px;">
    <center>
        <div class="event-container">
        <div class="event-row">
            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- end ------------------------------------------------- -->
            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- event end---------------------------------------------------- -->

            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- event end---------------------------------------------------- -->
        </div>
            <!-- row end---------------------------------------------------- -->

            <div class="event-row">
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- end ------------------------------------------------- -->
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- event end---------------------------------------------------- -->
    
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- event end---------------------------------------------------- -->
            </div>
                <!-- row end---------------------------------------------------- -->
        </div>
    <center>
        <a href="events.html"><button class="detail-btn">
            View More</button></a>
    </div><br><br><br>

    <h1 style="font-family: consolas; color: #000000; text-align: center;">Completed Events</h1>
    <hr size="3px" noshade style="width: 45%; opacity: 0.7; text-align: center;
                height: 3px;
                background: black;" >
    

    <div class="center-box-border" style="height: 800px; width: 1100px;">
    <center>
    <div class="event-container">
        <div class="event-row">
            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- end ------------------------------------------------- -->
            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- event end---------------------------------------------------- -->

            <div class="event">
                <div class="event-top">
                    <p>Event name</p>
                    <div class="event-image">
                    </div>
                    <p class="date">12/13/2022</p>
                </div>

                <div class="event-details">
                    <div class="donations">
                    <p>Donations</p>
                    <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                    </div>
                   
                    <div class="progress">
                        <div class="progress-bar">
                            <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    <div class="volunteers">
                    <p>Volunteers </p>
                    <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                    </div>
                    
                    <div class="progress">
                    <div class="progress-bar">
                       <div></div>
                    </div>
                    <span>50%</span>
                </div>
                </div>

                <div class="event-button">
                    <button>Visit Page</button>
                    <!-- <button>Volunteer</button> -->
                </div>
            </div>
            <!-- event end---------------------------------------------------- -->
        </div>
            <!-- row end---------------------------------------------------- -->

            <div class="event-row">
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- end ------------------------------------------------- -->
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- event end---------------------------------------------------- -->
    
                <div class="event">
                    <div class="event-top">
                        <p>Event name</p>
                        <div class="event-image">
                        </div>
                        <p class="date">12/13/2022</p>
                    </div>
    
                    <div class="event-details">
                        <div class="donations">
                        <p>Donations</p>
                        <p><i class="fa-solid fa-sack-dollar"></i> 50000 LKR</p>
                        </div>
                       
                        <div class="progress">
                            <div class="progress-bar">
                                <div></div>
                            </div>
                            <span>50%</span>
                        </div>
                        <div class="volunteers">
                        <p>Volunteers </p>
                        <p><i class="fa-solid fa-people-group"></i> 20 people</p>
                        </div>
                        
                        <div class="progress">
                        <div class="progress-bar">
                           <div></div>
                        </div>
                        <span>50%</span>
                    </div>
                    </div>
    
                    <div class="event-button">
                        <button>Visit Page</button>
                        <!-- <button>Volunteer</button> -->
                    </div>
                </div>
                <!-- event end---------------------------------------------------- -->
            </div>
                <!-- row end---------------------------------------------------- -->
    </div>
    <center>
        <a href="events.html"><button class="detail-btn">
            View More</button></a>
    </div>

    

    <div class="center-box-blank" style="height: 210px; width: 800px; 
        background-color: rgb(190, 223, 143, 0); text-align:center;" >

        <a href="Add_event" style="text-decoration: none;">
        <button class="more-btn" style="width: 25%; border-radius: 12px; height: 100px; font-size: 20px; background-color: #000000;">Add Event</button>  
        </a>
        <button class="more-btn" style="width: 25%; border-radius: 12px; height: 100px; font-size: 20px; background-color: #000000;">Reviews</button>
        
        <a href="Add_managers" style="text-decoration: none;">
            <button class="more-btn" style="width: 25%; border-radius: 12px; height: 100px; font-size: 20px; background-color: #000000;">Event Managers</button>
        </a>
        
    </div>


<?php $this->view('includes/footer')?>
