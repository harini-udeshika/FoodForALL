<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/org.admin.events.css">
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

    <!-- statrt of pending events section -->
    <!-- for spacing -->
    <div class="blank col-lg-1"></div>

    <!-- pending events card -->
    <div class="events-card card event-holder col-lg-10 p-20 m-top-75 m-bottom-75 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Pending Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">
                <!-- EVENT-PENDING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-btwn">
                        <button class="btn btn-gray btn-xsm m-top-30">Remove</button>
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-PENDING -->

                <!-- EVENT-PENDING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-btwn">
                        <button class="btn btn-gray btn-xsm m-top-30">Remove</button>
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-PENDING -->

                <!-- EVENT-PENDING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-btwn">
                        <button class="btn btn-gray btn-xsm m-top-30">Remove</button>
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-PENDING -->
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
        <div class="heading-2 p-top-10">Ongoing Events</div>
        <div class="event_scroll p-left-40 p-right-40">
            <div class="grid-9">
                <!-- EVENT-ONGOING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-4 m-bottom-4">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.25000</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">25</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-ONGOING -->

                <!-- EVENT-ONGOING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-4 m-bottom-4">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.25000</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">25</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-ONGOING --><!-- EVENT-ONGOING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-4 m-bottom-4">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.25000</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">25</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-ONGOING -->

                <!-- EVENT-ONGOING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-4 m-bottom-4">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.25000</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">25</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-ONGOING -->

                <!-- EVENT-ONGOING -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-4 m-bottom-4">Event Name</div>

                    <img class="event-image m-bottom-4" src="<?= ROOT ?>/images/event.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.25000</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="m-top-10">
                        <div class="row-flex jf-btwn">
                            <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                            <div class="row-flex">
                                <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div class="txt-07 w-semibold txt-purple arrow-icon">25</div>
                            </div>
                        </div>

                        <div class="progress-back width-100">
                            <div class="progress-fill width-80 height-4px m-top-2"></div>
                        </div>
                    </div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-ONGOING -->

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
                <!-- EVENT-COMPLETED -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-COMPLETED -->

                <!-- EVENT-COMPLETED -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-COMPLETED -->

                <!-- EVENT-COMPLETED -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-COMPLETED -->

                <!-- EVENT-COMPLETED -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-COMPLETED -->

                <!-- EVENT-COMPLETED -->
                <div class="card-simple event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">Event Name</div>

                    <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset="">

                    <div class="event-date txt-al-center txt-08">Event Date - 12/11/2022</div>

                    <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                    <div class="row-flex jf-center">
                        <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                    </div>
                </div>
                <!--end of EVENT-COMPLETED -->
            </div>
        </div>

        <!-- for spacing -->
        <div class="blank col-lg-1"></div>
    </div>
</div>

<!-- statrt of copleted events section -->
<?php $this->view('includes/footer') ?>