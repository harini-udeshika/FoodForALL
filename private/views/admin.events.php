<?php $this->view('includes/header_2')?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="container">
    <div class="heading-1 col-12 ">Events</div>

    <!-- Search bar -->
    <div class="blank col-lg-2"></div>

    <form class="col-lg-8 row-flex jf-center m-bottom-75" action="" method="" id="search">
        <input class="search-field width-100" type="text" name="search_term" id="" placeholder="Search here">
        <button type="submit" class="search_logo">
            <i class="fa-solid fa-magnifying-glass "></i>
        </button>

    </form>

    <div class="blank col-lg-2"></div>
    <!-- END : Search bar -->

    <!-- statrt of ongoing events section -->
    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <div class="events-card card event-holder col-lg-10 p-20 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Ongoing Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">
                <?php if (!empty($ongoing_events)) : ?>
                    <?php foreach ($ongoing_events as $event) : ?>
                        <!-- EVENT-ONGOING -->
                        <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10">

                            <div class="heading-event txt-al-center m-top-4 m-bottom-4"><?= $event->name ?></div>

                            <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                            <div class="event-date txt-al-center txt-09 w-semibold">Event Date - <?= $event->date ?></div>

                            <div class="m-top-10">
                                <div class="row-flex jf-btwn">
                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                                    <div class="row-flex">
                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                        <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.<?= $event->total_amount ?></div>
                                    </div>
                                </div>

                                <div class="progress-back width-100">
                                    <div class="progress-fill width-80 height-5px m-top-2"></div>
                                </div>
                            </div>

                            <div class="m-top-10">
                                <div class="row-flex jf-btwn">
                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                                    <div class="row-flex">
                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                        <div class="txt-07 w-semibold txt-purple arrow-icon"><?= $event->no_of_volunteers ?></div>
                                    </div>
                                </div>

                                <div class="progress-back width-100">
                                    <div class="progress-fill width-<?= $event->vol_percentage ?> height-6px m-top-2"></div>
                                </div>
                            </div>

                            <div class="row-flex jf-center">
                                <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                            </div>
                        </div>
                        <!--end of EVENT-ONGOING -->
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 w-semibold txt-al-center txt-12 txt-gray">No ongoing events</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- for spacing -->
    <div class="blank col-lg-1"></div>
    <!-- END  ongoing events section -->


    <!-- statrt of copleted events section -->

    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <div class="events-card card event-holder col-lg-10 p-20 m-top-75 m-bottom-75 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Completed Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">
                <?php if (!empty($ongoing_events)) : ?>
                    <?php foreach ($ongoing_events as $event) : ?>
                        <!-- EVENT-COMPLETED -->
                        <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10">

                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?= $event->name ?></div>

                            <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                            <div class="event-date txt-al-center txt-08">Event Date - <?= $event->date ?></div>

                            <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                            <div class="row-flex jf-center">
                                <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                            </div>
                        </div>
                        <!--end of EVENT-COMPLETED -->
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 w-semibold txt-al-center txt-12 txt-gray">No completed events</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- for spacing -->
        <div class="blank col-lg-1"></div>
    </div>
</div>

<!-- statrt of copleted events section -->
<?php $this->view('includes/footer') ?>