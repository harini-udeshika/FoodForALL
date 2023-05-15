<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>


<h1>Participated Events</h1>
<!-- <div class="event-vard-i card-simple col-lg-6 grid-12 p-15"> -->
    <div class="search event-vard-i col-lg-6 grid-6p-15 non_boder">
        <form action="" class="col-8">
             <input type="text" name="find" placeholder="Search event by name " class="search-bar">
         <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form> 

            <p>Filter by</p>
            <form action="">

            <label for="date" >Date</label>
            <input type="date" name="date" >
            <button class="search-btn">Search</button>
            </form>
        </div>
    </div>
<!-- </div> -->
        
<div class="container">
  <!-- Launched events -->
   <div class="blank col-lg-1"></div>
  <div class="  grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    

    <!-- Launchedevent item -->
    <?php
    $i=0;
    if($row1){
      $count=count($row1);
      while($count>0){?>
    <div class="event-vard-i card-simple col-lg-6 grid-12 p-15 card_1">
        
        <div class="event-image col-2">
            <p class="title"><?=$row1[$i]->name?></p>
            <img src="<?=$row1[$i]->thumbnail_pic?>">
        </div>
        
        <div class="col-10">
            <p><span class="describe">Date - </span> <?=$row1[$i]->date?></p>
            <p><span class="describe">Organizationed by - </span> <?=$row1[$i]->org_name?></p>
            <p><span class="describe">Selected Familes - </span><?=$row1[$i]->fcount?></p>
            <p><span class="describe">Selected children Homes - </span><?=$row1[$i]->ccount?></p>
            <p><span class="describe">Selected Elder Homes - </span><?=$row1[$i]->ecount?></p>
      </div>

      
    </div>
    <?php $count--;
            $i++;
      }

        }
        else { ?>
            <div class="No_detail col-12">No Event Details Available</div>
        <?php }
        ?>
    <!--END Completed event item -->
  </div>
  <div class="blank col-lg-1"></div>
  <!--END completed events -->

</div>
<?php $this->view('includes/footer')?>  
