<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="container">
  <!-- Launched events -->
   <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    <div class="heading-2 col-12">Launched Events</div>

    <!-- Launchedevent item -->
    <?php
    $i=0;
    if($rows1){
      $count=count($rows1);
      while($count>0){?>
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows1[$i]->name?>
            <span>

            <?php if($rows1[$i]->date==date("Y-m-d")){?>
            <a href="<?= ROOT ?>/attendance?eid=<?=$rows1[$i]->event_id?>"><i class="fa-solid fa-clipboard-user fa-beat fa-2xl" title="mark attendence"></i></a>
            <?php }?>
            </span>
            </div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows1[$i]->date?></div>
          </div>
        </div>
        
      </div>

     
      

      <div class="sp-09 col-12 m-top-10 txt-07 p-left-8 p-right-5">
        
        <a href="<?= ROOT ?>/event_org?id=<?=$rows1[$i]->event_id?>"><button class="btn btn-xsm btn-green">Go to details</button></a>
      </div>

      <div class="sp-09 col-12 m-top-10 txt-07 p-left-8 p-right-5">
        <a href="<?= ROOT ?>/event_budget_see?eid=<?=$rows1[$i]->event_id?>"><button class="btn btn-xsm btn-purple">See the budget</button></a>
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

  <!-- Completed events -->
  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    <div class="heading-2 col-12">Completed Events</div>

    <!-- Completed event item -->
    <?php
    $i=0;
    if($rows2){
      $count=count($rows2);
      while($count>0){?>
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows2[$i]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows2[$i]->date?></div>
          </div>
        </div>
      </div>

      <div class="div col-5"></div>

      <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <a href="<?= ROOT ?>/certificate_validate?event_id=<?=$rows2[$i]->event_id?>"><button class="btn btn-sm btn-purple">Approve certificates</button></a>
      </div>

      <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows2[$i]->event_id?>"><button class="btn btn-sm btn-green">Go to details</button></a>
      </div>

      <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <a href="<?= ROOT ?>/event_budget_see?eid=<?=$rows2[$i]->event_id?>"><button class="btn btn-sm btn-purple">See the event budget</button></a>
      </div>
    </div>
    
    <!--END Completed event item -->
    <?php $count--;
                    $i++;
            }
        } else { ?>
            <div class="No_detail col-12">No Event Details Available</div>
        <?php }
        ?>
  </div>
  
  <div class="blank col-lg-1"></div>
  <!--END completed events -->
</div>

<?php $this->view('includes/footer') ?>