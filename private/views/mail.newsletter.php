<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Subscription Reminder</title>
</head>

<body>

    <div style="margin:0 auto; width:350px;">
        <?php if (!empty($ongoing_events)) : ?>
            <?php foreach ($ongoing_events as $event) : ?>
                <!-- EVENT-ONGOING -->
                <div style="border: 1px solid rgba(0, 0, 0, 0.3);border-radius: 5px; max-width: 350px;margin: 20px; grid-column: span 6; padding:20px; padding-top:10px; background-color: white;">
                    <div style="font-weight: 700;font-size: 1.1rem;padding-bottom: 8px; text-align:center; margin-top:4px; margin-bottom:4px;">
                        <?= $event->name ?>
                    </div>
                    <img style="width: 100%; max-height:150px;border-radius: 5px; margin-bottom:4px;" src="/img.jpeg" alt="" srcset="">

                    <div style="text-align:center; font-size: 0.9rem;font-weight: bold;">Event date - <?= $event->date ?></div>

                    <div style=" margin-top: 10px;">
                        <div style="display:flex; justify-content: space-between;">
                            <div style="font-size: 0.8rem; font-weight: bold; color: #7681BF; transform: translateY(7px);">Donations</div>

                            <div style="display:flex;">
                                <img style="width:25px; height:25px;" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div style="font-size: 0.7rem; font-weight: bold; color: #7681BF; transform: translateY(7px);">Rs.<?= $event->total_amount ?></div>
                            </div>
                        </div>

                        <div style="border-radius: 5px;background-color: #ccc;width: 100%;">
                            <div style="border-radius: 5px;background-color: #7FB432; width:<?= $event->donation_percentage ?>%; height:8px; margin-top:2px;"></div>
                        </div>

                        <div style="display:flex; justify-content: space-between;">
                            <div style="font-size: 0.6rem; font-weight: bold; color:#6f6f6f; transform: translateY(7px);">Rs.<?= $event->collected_donations ?> collected</div>
                            <div style="font-size: 0.6rem; font-weight: bold; color:#6f6f6f; transform: translateY(7px);"><?= $event->donation_percentage ?>%</div>
                        </div>
                    </div>

                    <div style="margin-top:20px;">
                        <div style="display:flex; justify-content: space-between;">
                            <div style="font-size: 0.8rem;   font-weight: bold; color: #7681BF; transform: translateY(7px);">Volunteers</div>
                            <div style="display:flex;">
                                <img style="width:25px; height:25px;" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                <div style="font-size: 0.7rem; font-weight: bold; color: #7681BF; transform: translateY(7px);"><?= $event->no_of_volunteers ?></div>
                            </div>
                        </div>

                        <div style="border-radius: 5px;background-color: #ccc;width: 100%;">
                            <div style="border-radius: 5px;background-color: #7FB432; width:<?= $event->vol_percentage ?>%; height:8px; margin-top:2px;"></div>
                        </div>

                        <div style="display:flex; justify-content: space-between;">
                            <div style="font-size: 0.6rem; font-weight: bold; color:#6f6f6f; transform: translateY(7px);"><?= $event->vol_count ?> Joined</div>
                            <div style="font-size: 0.6rem; font-weight: bold; color:#6f6f6f; transform: translateY(7px);"><?= $event->vol_percentage ?>%</div>
                        </div>
                    </div>


                    <!-- <div style="display:flex; justify-content: center;">
                <button style="border: none; cursor: pointer; color: white; width: 100%; background-color:#7FB432; height: 30px;border-radius: 4px;font-weight: 400;font-size: 1rem;padding: 0px 10px; margin-top:50px;">View Details</button>
            </div> -->
                </div>
                <!--end of EVENT-ONGOING -->
            <?php endforeach; ?>
        <?php else : ?>
            <div style="grid-column: span 12; font-weight: bold; text-align:center; font-size: 1.2rem; color:#6f6f6f;">No ongoing events</div>
        <?php endif; ?>
    </div>

</body>

</html>