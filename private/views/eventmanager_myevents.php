<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>
<div class="container">
  <!-- Upcoming events -->  
  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    <div class="heading-2 col-12">Upcoming Events</div>
      

    <!-- upcoming event item -->
    <?php
    $i=0;
    $j=0;
    $k=0;
    if($rows7){
      $count0=count($rows7);
      while($count0>0){?>
    
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows7[$k]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows7[$k]->date?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Status</div>
            <div class="details col-5">Request to change the budget</div>
          </div>
        </div>
      </div>

      <div class="div col-5">
      <a href="<?=ROOT?>/select_donees?eid=<?=$rows7[$k]->event_id?>">
        <button class="btn btn-xsm btn-block btn-green m-bottom-10">
          Create budget
        </button></a>
        <!-- <button class="btn btn-xsm btn-block btn-black m-bottom-10">
          Select Donees
        </button> -->
        <button class="btn btn-xsm btn-block btn-purple m-bottom-10" >
          Send budget
        </button>

      </div>

      <div class="col-12 m-top-10 txt-08 p-left-8">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows7[$j]->event_id?>">got to details</a>
      </div>
    </div>
    <div class="blank col-lg-1"></div>
      <?php $count0--;
                        $k++;
                }
            } 
    if($rows3){
      $count1=count($rows3);
      while($count1>0){?>
    
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows3[$i]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows3[$i]->date?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Status</div>
            <div class="details col-5">Budget not create</div>
          </div>
        </div>
      </div>

      <div class="div col-5">
      <a href="<?=ROOT?>/select_donees?eid=<?=$rows3[$i]->event_id?>">
        <button class="btn btn-xsm btn-block btn-green m-bottom-10">
          Create budget
        </button></a>
        <!-- <button class="btn btn-xsm btn-block btn-black m-bottom-10">
          Select Donees
        </button> -->
        <button class="btn btn-xsm btn-block btn-purple m-bottom-10" >
          Send budget
        </button>
      </div>

      <div class="col-12 m-top-10 txt-08 p-left-8">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows3[$i]->event_id?>">got to details</a>
      </div>
    </div>
    <div class="blank col-lg-1"></div>
      <?php $count1--;
                        $i++;
                }
            } 
            if($rows4){
                $count2=count($rows4);
                while($count2>0){?>
              
              <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
                <div class="col-7">
                  <div class="m-bottom-10">
                    <div class="event-att grid-8 txt-09">
                      <div class="title w-semibold col-3 p-right-15">Event</div>
                      <div class="details col-5"><?=$rows4[$j]->name?></div>
                    </div>
                  </div>
                  <div class="m-bottom-10">
                    <div class="event-att grid-8 txt-09">
                      <div class="title w-semibold col-3 p-right-15">Date</div>
                      <div class="details col-5"><?=$rows4[$j]->date?></div>
                    </div>
                  </div>
                  <div class="m-bottom-10">
                    <div class="event-att grid-8 txt-09">
                      <div class="title w-semibold col-3 p-right-15">Status</div>
                      <div class="details col-5">Budget draft save</div>
                    </div>
                  </div>
                </div>
          
                <div class="div col-5">
                <a href="<?=ROOT?>/select_donees?eid=<?=$rows4[$j]->event_id?>">
                  <button class="btn btn-xsm btn-block btn-green m-bottom-10">
                    Create budget
                  </button></a>
                  <!-- <button class="btn btn-xsm btn-block btn-black m-bottom-10">
                    Select Donees
                  </button> -->
                  <button class="btn btn-xsm btn-block btn-purple m-bottom-10" >
                    Send budget
                  </button>
                </div>
          
                <div class="col-12 m-top-10 txt-08 p-left-8">
                  <a href="<?= ROOT ?>/event_org?id=<?=$rows4[$j]->event_id?>">got to details</a>
                </div>
              </div>
              <div class="blank col-lg-1"></div>
                <?php $count2--;
                        $j++;
                }

            }else { ?>
                <div class="No_detail col-12">No Event Details Available</div>
            <?php }
            ?>
    <!--END upcoming event item -->
  </div>
  
  <!--END Upcoming events -->
        <!-- </div> -->

  <!-- Approved events -->
  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
  <div class="blank col-lg-1"></div>
    <!-- heading -->
    <div class="heading-2 col-12">Approved Events</div>
    
    <!-- upcoming event item -->
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
            <div class="details col-5"><?=$rows1[$i]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows1[$i]->date?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Status</div>
            <div class="details col-5">Approved</div>
          </div>
        </div>
      </div>

      <div class="div col-5">
      <div class="div col-5">
      <form method="post" id="form2">
        <input type="hidden" name= "launch_eventid" value="<?=$rows1[$i]->event_id?>">
        <a href="<?= ROOT ?>/eventmanager_myevents?updateid=<?=$rows1[$i]->event_id?>"><button type="submit" class="btn btn-xsm btn-block btn-black m-bottom-10" name="launch-event" value="1">
          Launch Event
        </button></a>
      </form>
      </div>
      </div>

      <div class="col-12 m-top-10 txt-07 p-left-8">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows1[$i]->event_id?>">got to details</a>
      </div>
    </div>
    <!--END upcoming event item -->

        <?php $count--;
            $i++;
      }

        }
        else { ?>
            <div class="No_detail col-12">No Event Details Available</div>
        <?php }
        ?>
  </div>


  <div class="blank col-lg-1"></div>
  <!--END Upcoming events -->

  <!-- Completed events -->
  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    <div class="heading-2 col-12">Pending Events</div>

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
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">status</div>
            <div class="details col-5">Approve pending</div>
          </div>
        </div>
      </div>
      <div class="div col-5">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows2[$i]->event_id?>"><button class="btn btn-xsm btn-block btn-green">
        Go to details
        </button></a>
        
      </div>

      <div class="div col-5"></div>
      

      <!-- <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <button class="btn btn-xsm btn-green">Go to details</button>
      </div> -->
    </div>
    <?php $count--;
                    $i++;
            }
        } else { ?>
            <div class="No_detail col-12">No Event Details Available</div>
        <?php }
        ?>
    <!--END Completed event item -->

    <!-- Completed event item -->
   
  </div>

  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60">
    <!-- heading -->
    <div class="heading-2 col-12">Rejected Events</div>

    <!-- Completed event item -->
    <?php
    $i=0;
    if($rows5){
      $count=count($rows5);
      while($count>0){?>
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows5[$i]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows5[$i]->date?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">status</div>
            <div class="details col-5">Rejected</div>
          </div>
        </div>
      </div>
      <div class="div col-5">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows5[$i]->event_id?>"><button class="btn btn-xsm btn-block btn-green">
        Go to details
        </button></a>
        
      </div>

      <div class="div col-5"></div>
      

      <!-- <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <button class="btn btn-xsm btn-green">Go to details</button>
      </div> -->
    </div>
    <?php $count--;
                    $i++;
            }
        } ?>
            
    <!--END Completed event item -->

    <!-- Completed event item -->

    <?php
    $j=0;
    $k=0;

    if($rows6){
      $count=count($rows6);
      while($count>0){?>
    <div class="event-vard-i card-simple col-lg-5 grid-12 p-15 ">
      <div class="col-7">
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Event</div>
            <div class="details col-5"><?=$rows6[$j]->name?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">Date</div>
            <div class="details col-5"><?=$rows6[$j]->date?></div>
          </div>
        </div>
        <div class="m-bottom-10">
          <div class="event-att grid-8 txt-09">
            <div class="title w-semibold col-3 p-right-15">status</div>
            <div class="details col-5">Rejected(Does not take an action for the request)</div>
          </div>
        </div>
      </div>
      <div class="div col-5">
        <a href="<?= ROOT ?>/event_org?id=<?=$rows6[$j]->event_id?>"><button class="btn btn-xsm btn-block btn-green">
        Go to details
        </button></a>
        
      </div>

      <div class="div col-5"></div>
      

      <!-- <div class="sp-2 col-12 m-top-10 txt-07 p-left-8">
        <button class="btn btn-xsm btn-green">Go to details</button>
      </div> -->
    </div>
    <?php $count--;
                    $j++;
            }
        
        }
        else { ?>
            <div class="No_detail col-12">No Event Details Available</div>
        <?php }
        ?>
   
  </div>
  




  
</div>

<script src=" <?=ROOT?>/assets/eventmanager_events.js"></script>
<?php $this->view('includes/footer') ?>