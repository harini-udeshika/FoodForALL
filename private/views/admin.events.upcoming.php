<?php if (!empty($ongoing_events)) : ?>
    <?php foreach ($ongoing_events as $event) : ?>
        <!-- EVENT-ONGOING -->
        <div class="card-simple event-card-on col-lg-6 col-md-12 p-20 p-top-10" style="background-color: white;">
            <div class="heading-event txt-al-center m-top-4 m-bottom-4">
                <?= $event->name ?>
            </div>
            <!-- <img class="event-image m-bottom-4" src="/img.jpeg" alt="" srcset=""> -->

            <div class="event-date txt-al-center txt-09 w-semibold">Event date - <?= $event->date ?></div>

            <div class="m-top-10">
                <div class="row-flex jf-btwn">
                    <div class="txt-08 w-semibold txt-purple arrow-icon">Donations</div>

                    <div class="row-flex">
                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                        <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.<?= $event->total_amount ?></div>
                    </div>
                </div>

                <div class="progress-back width-100">
                    <div class="progress-fill width-<?= $event->donation_percentage ?> height-8px m-top-2"></div>
                </div>

                <div class="row-flex jf-btwn">
                    <div class="txt-06 w-semibold txt-gray arrow-icon">Rs.<?= $event->collected_donations ?>collected</div>
                    <div class="txt-06 w-semibold txt-gray arrow-icon"><?= $event->donation_percentage ?>%</div>
                </div>
            </div>

            <div class="m-top-20">
                <div class="row-flex jf-btwn">
                    <div class="txt-08   w-semibold txt-purple arrow-icon">Volunteers</div>
                    <div class="row-flex">
                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                        <div class="txt-07 w-semibold txt-purple arrow-icon"><?= $event->no_of_volunteers ?></div>
                    </div>
                </div>

                <div class="progress-back width-100">
                    <div class="progress-fill width-<?= $event->vol_percentage ?> height-8px m-top-2"></div>
                </div>

                <div class="row-flex jf-btwn">
                    <div class="txt-06 w-semibold txt-gray arrow-icon"><?= $event->vol_count ?> Joined</div>
                    <div class="txt-06 w-semibold txt-gray arrow-icon"><?= $event->vol_percentage ?>%</div>
                </div>
            </div>

            <div class="row-flex jf-center">
                <button class="btn btn-block btn-green btn-xsm m-top-50">View Details</button>
            </div>
        </div>
        <!--end of EVENT-ONGOING -->
    <?php endforeach; ?>
<?php else : ?>
    <div class="col-12 w-semibold txt-al-center txt-12 txt-gray">No ongoing events</div>
<?php endif; ?>
<script>
    if (typeof myVariable === "undefined"){
    window.location.href = "<?= ROOT ?>/admin"}
</script>