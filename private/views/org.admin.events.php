<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="container">
    <div class="heading-1 col-12 ">Events</div>

    <!-- Search bar -->
    <div class="blank col-lg-2"></div>

    <form class="col-lg-8 row-flex jf-center" action="" method="post" id="">
        <input class="search-field width-100" type="text" name="search" id="search" placeholder="Search here" autocomplete="off">
        <button type="submit" class="search_logo">
            <i class="fa-solid fa-magnifying-glass "></i>
        </button>

    </form>


    <div class="blank col-lg-2"></div>
    <!-- END : Search bar -->

    <div class="col-12 grid-12 " id="search_result">
        <div class="blank col-3"></div>
        <div class="col-6 grid-12 card-simple" style="max-height: 270px; min-height:50px; overflow: auto;" id="dropdown">
            
        </div>
        <div class="blank col-3"></div>
    </div>



    <!-- statrt of pending events section -->
    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <!-- pending events card -->
    <div class="events-card card event-holder col-lg-10 p-20 m-top-30 m-bottom-75 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Approval Pending Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">

                <?php
                $i = 0;
                if ($pending) {
                    $count = sizeof($pending);
                    while ($count > 0) { ?>
                        <!-- EVENT-PENDING -->
                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $pending[$i]->name ?></div>

                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $pending[$i]->thumbnail_pic ?>" alt="" srcset="">

                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $pending[$i]->date ?></div>

                            <!-- <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div> -->

                            <div class="row-flex jf-btwn">
                                <a href="<?= ROOT ?>/Org_admin_events/delete_pending?id=<?= $pending[$i]->event_id ?>">
                                    <button class="btn btn-gray btn-xsm m-top-30">Remove</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                                </a>

                            </div>
                        </div>
                        <!--end of EVENT-PENDING -->

                    <?php $count--;
                        $i++;
                    }
                } else { ?>
                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Pending Events</div>
                <?php }
                ?>

            </div>
        </div>
    </div>
    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <!-- End of pending events section -->

    <!-- statrt of ongoing events section -->
    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <!-- ongoing events card -->
    <div class="events-card card event-holder col-lg-10 p-20 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Upcoming Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">

                <?php
                $i = 0;
                if ($ongoin) {
                    $count = sizeof($ongoin);
                    while ($count > 0) { ?>
                        <!-- EVENT-ONGOING -->
                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                            <div class="heading-event txt-al-center m-top-4 m-bottom-4"><?php echo $ongoin[$i]->name ?></div>

                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $ongoin[$i]->thumbnail_pic ?>" alt="" srcset="">

                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $ongoin[$i]->date ?></div>

                            <div class="m-top-10">
                                <div class="row-flex jf-btwn">
                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                                    <div class="row-flex">
                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                        <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.<?php echo $ongoin[$i]->total_amount ?></div>
                                    </div>
                                </div>

                                <div class="progress-back width-100 height-4px m-top-2">
                                    <div class="progress-fill width-<?php if ($ongoin[$i]->amount_percentage) {
                                                                        echo $ongoin[$i]->amount_percentage;
                                                                    } else {
                                                                        echo 0;
                                                                    } ?> height-4px"></div>
                                </div>
                            </div>

                            <div class="m-top-10">
                                <div class="row-flex jf-btwn">
                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                                    <div class="row-flex">
                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                        <div class="txt-07 w-semibold txt-purple arrow-icon"><?php echo $ongoin[$i]->no_of_volunteers ?></div>
                                    </div>
                                </div>

                                <div class="progress-back width-100 height-4px m-top-2">
                                    <div class="progress-fill width-<?php if ($ongoin[$i]->vol_percentage) {
                                                                        echo $ongoin[$i]->vol_percentage;
                                                                    } else {
                                                                        echo 0;
                                                                    } ?> height-4px "></div>
                                </div>
                            </div>

                            <div class="row-flex jf-center">
                                <a href="<?= ROOT ?>/event_org?id=<?= $ongoin[$i]->event_id ?>">
                                    <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                                </a>
                            </div>
                        </div>
                        <!--end of EVENT-ONGOING -->
                    <?php $count--;
                        $i++;
                    }
                } else { ?>
                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Ongoing Events</div>
                <?php }
                ?>

            </div>
        </div>
    </div>

    <!-- for spacing -->
    <div class="blank col-lg-1"></div>
    <!-- END  ongoing events section -->


    <!-- statrt of copleted events section -->

    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <!-- Completed events card -->
    <div class="events-card card event-holder col-lg-10 p-20 m-top-75 m-bottom-75 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Completed Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">

                <?php
                $i = 0;
                if ($past) {
                    $count = sizeof($past);
                    while ($count > 0) { ?>
                        <!-- EVENT-COMPLETED -->
                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $past[$i]->name ?></div>

                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $past[$i]->thumbnail_pic ?>" alt="" srcset="">

                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $past[$i]->date ?></div>

                            <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>


                            <div class="row-flex jf-center">
                                <a href="<?= ROOT ?>/event_org?id=<?= $past[$i]->event_id ?>">
                                    <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                                </a>
                            </div>
                        </div>
                        <!--end of EVENT-COMPLETED -->

                    <?php $count--;
                        $i++;
                    }
                } else { ?>
                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Completed Events</div>
                <?php }
                ?>


            </div>
        </div>

        <!-- for spacing -->
        <div class="blank col-lg-1"></div>
    </div>
</div>

<!-- statrt of copleted events section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= ROOT ?>/assets/script/event_search.js"></script>
<?php $this->view('includes/footer') ?>