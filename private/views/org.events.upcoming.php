<div class="events-card card event-holder col-lg-10 p-20 p-bottom-35 m-lr-auto">
        <div class="heading-2 p-top-10">Ongoing Events</div>
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