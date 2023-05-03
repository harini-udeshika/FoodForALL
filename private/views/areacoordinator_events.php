<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>


<div class="heading">We are participating Events</div>
    <div class="search">
        <form action="">
             <input type="text" name="find" placeholder="Search event by name " class="search-bar">
         <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>


        <div class="filter">
            <p>Filter by</p>
            <form action="">

            <label for="date" >Date</label>
            <input type="date" name="date" >
            <button class="search-btn">Search</button>
            </form>
        </div>
    </div>
    <div class="event-container">
    <?php
    $i=0;
    if($row1){
      $count=count($row1);
      while($count>0){?>
    <div class="event-row">


            
            
        <a href="<?=ROOT?>/eventpage?id=<?=$row1[$i]->event_id?>">
            <div class="event">

                <div class="event-top">
                    <p><?=$row1[$i]->name?></p>
                    <div class="event-image">
                        <img src="<?=$row1[$i]->thumbnail_pic?>">
                    </div>
                    <p class="date"><?=$row1[$i]->date?></p>
                </div>

                <div class="event-details">
                    <div class="donations">
                        <p>Selected Familes</p>
                        <p><?=$row1[$i]->fcount?></p>
                    </div>

                    <div class="donations">
                        <p>Selected children Homes</p>
                        <p><?=$row1[$i]->ccount?></p>
                    </div>
                    <div class="donations">
                        <p>Selected Elder Homes</p>
                        <p><?=$row1[$i]->ecount?></p>
                    </div>
                    
                </div>

            </div>
        </a>
        <?php $count--;
                $i++;
        }
    } else { ?>
        <div class="No_detail col-12">No Event Details Available</div>
    <?php }
    ?>
    </div>
    </div>
</div>
<?php $this->view('includes/footer')?>  
