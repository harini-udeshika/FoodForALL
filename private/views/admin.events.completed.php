<div class="col-12 grid-12">
    <?php if (!empty($completed_events)) : ?>
        <?php foreach ($completed_events as $event) : ?>
            <!-- EVENT-COMPLETED -->
            <div class="card-simple event-card-on col-lg-6 col-md-6 p-20 p-top-10" style="background-color: white;">

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