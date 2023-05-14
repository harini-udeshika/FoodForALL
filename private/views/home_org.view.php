<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/home_org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/event_page.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>

<?php
//  echo "<pre>";
//  echo "home_org";
//  print_r($allrows);
//  echo "<br><br><br>";
//  print_r($_SESSION['USER']);
//  echo "<br><br><br>";

//  echo $_SESSION['USER']->email;
//  print_r($_SESSION['USER']['name']);

?>

<div style="padding-top: 10px; padding-bottom: 60px; text-align: center; font-size: 50px; font-weight: bold; color: #000000; ">
    <?php if (isset($_SESSION['USER'])) {
        $na = $_SESSION['USER']->name;
        echo $na;
    }
    ?>
</div>

<?php
$totevents = 0;
$totamount = 0;
if ($past) {
    $totevents = sizeof($past);
}
if ($allevents) {
    $num = 0;
    $count = sizeof($allevents);

    while ($count > 0) {

        $totamount = $totamount + $allevents[$num]->collected;
        // $totamount = $totamount + 50000;

        $count--;
        $num++;
    }
}
?>

<div class="body-container">
    <div class="container">
        <div class="blank col-1"></div>
        <div class="card col-lg-5 col-sm-12 p-20">
            <?php
            $image = "./images/logo.png";
            if (file_exists($rows->profile_pic)) {
                $image = $rows->profile_pic;
            }
            ?>
            <div class="m-bottom-20" style="display: flex; justify-content: center;">
                <img src="<?php echo $image ?>" alt="" class="" style="border:solid 1px black; width: 35%; border-radius: 8px; ">
            </div>
            <div class="card-simple txt-align-left grid-10 card-green" style="background-color: rgba(173, 211, 116, 0.886);">
                <div class="col-10 ">
                    <div class="heading-2 p-bottom-15" style="text-decoration: underline; text-decoration-thickness: 2px;">Your Details</div>
                    <div class="m-left-20">
                        <div class="txt-14 w-medium p-8"><?php echo $rows->name ?></div>
                        <div class="txt-14 w-medium p-8"><?php echo $rows->email ?></div>
                        <div class="txt-14 w-medium p-8"><?php echo $rows->address ?></div>
                        <div class="txt-14 w-medium p-left-8"><?php echo $rows->city ?></div>
                    </div>
                </div>

                <div class="col-10">
                    <div class="heading-2 p-bottom-10 p-top-8 m-top-1" style="text-decoration: underline; text-decoration-thickness: 2px;">About</div>
                    <div class="m-left-10">
                        <div class="txt-11 w-medium p-8" style="overflow:auto; max-height:100px;"><?php
                                                            if ($rows->about) {
                                                                echo $rows->about;
                                                            }
                                                            ?></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="card col-lg-5 col-sm-12 container">
            <div class="blank col-2 "></div>
            <div class="card col-8 m-bottom-10 m-top-20 grid-10">
                <div class="txt-20 w-semibold  col-10 p-bottom-8" style="text-align: center;">Total events Completed
                    <div class="txt-24 w-bold  p-top-10 p-bottom-10 txt-purple"><?php echo $totevents ?></div>
                </div>
            </div>
            <div class="blank col-2 "></div>

            <div class="blank col-2 "></div>
            <div class="card col-8 m-bottom-10 grid-10">
                <div class="txt-20 w-semibold  col-10 p-bottom-8" style="text-align: center;">Total Donations Acquired <br>
                    <div class="txt-24 w-bold  p-top-10 p-bottom-10 txt-purple"><?php echo $totamount ?>/=</div>

                </div>
            </div>
            <div class="blank col-2 "></div>
            
            <div class="blank col-2 "></div>
            <a class="col-8 grid-11 m-bottom-5" href="add_event" style="text-decoration: none;">
                <button type="button" class="btn btn-green btn-lg col-11">Add Event</button>
            </a>
            <div class="blank col-2 "></div>

            <div class="blank col-2 "></div>
            <?php
            if ($sub_data) {  ?>
                <a class="col-8 grid-11 m-bottom-30" href="" style="text-decoration: none;">
                    <button type="button" disabled class="btn-disabled btn-lg col-11">Subscribed</button>
                </a>

            <?php
            } else {    ?>
                <a class="col-8 grid-11 m-bottom-30" href="org_subscribe" style="text-decoration: none;">
                    <button type="button" class="btn btn-lg btn-black col-11">Go Subscribe</button>
                </a>
            <?php
            }
            ?>

            <div class="blank col-2 "></div>
        </div>
        <div class="blank col-1"></div>
    </div>
</div>




<div class="center-box-border" style="
    text-align: center; width: 1000px; height: 300px; margin-top: 50px; background-color:white; padding: 20px;">

    <div class="card-simple col-lg-12 height-auto width-90" style="border: none;">
        <div class="row height-auto width-960px" style="background-color:white;">
            <!-- each image -->
            <div class="added_image_holder col-4 m-15">
                <div class="photo_holder"></div>
                <div class="row-flex jf-center">
                    <!-- <button class="btn btn-sm btn-gray remove_button">Remove</button> -->
                </div>
            </div>

            <!-- each image -->
            <div class="added_image_holder col-4 m-10">
                <div class="photo_holder"></div>
                <div class="row-flex jf-center">
                    <!-- <button class="btn btn-sm btn-gray remove_button">Remove</button> -->
                </div>
            </div>

            <!-- each image -->
            <div class="added_image_holder col-4 m-10">
                <div class="photo_holder"></div>
                <div class="row-flex jf-center">
                    <!-- <button class="btn btn-sm btn-gray remove_button">Remove</button> -->
                </div>
            </div>
        </div>
    </div>

</div><br><br>


<h1 style="font-family: consolas; color: #000000; text-align: center;">Ongoing Events</h1>
<hr size="3px" noshade style="width: 45%; opacity: 0.7; text-align: center;
                height: 3px;
                background: black;">

<div class="center-box-border" style="min-height: 100px; max-height: 540px; width: 1100px; padding-top:20px;">
    <center>
        <div class="event-container">

            <div class="grid-9">

                <?php

                $i = 0;
                if ($ongoin) {
                    $count = sizeof($ongoin);
                    while ($count > 0 && $i < 3) { ?>

                        <!-- EVENT-ONGOING -->
                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                            <div class="heading-event txt-al-center m-top-4 m-bottom-4"><?php echo $ongoin[$i]->name ?></div>

                            <img class="event-image m-bottom-4 height-50" src="<?= ROOT ?>/<?php echo $ongoin[$i]->thumbnail_pic ?>" alt="" srcset="">

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
                                                                    } ?> height-4px" style="float: left;"></div>
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
                                                                    } ?> height-4px" style="float: left;"></div>
                                </div>
                            </div>

                            <div class="row-flex jf-center">
                                <a href="<?= ROOT ?>/event_org?id=<?= $ongoin[$i]->event_id ?>">
                                    <button class="btn btn-green btn-xsm m-top-25 height-40px">View Details</button>
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
        <center>
            <a href="./org_admin_events"><button class="detail-btn">
                    View More</button></a>
</div><br><br><br>

<h1 style="font-family: consolas; color: #000000; text-align: center;">Completed Events</h1>
<hr size="3px" noshade style="width: 45%; opacity: 0.7; text-align: center;
                height: 3px;
                background: black;">


<div class="center-box-border" style="min-height: 100px; max-height: 500px; width: 1100px; padding-top:20px;">
    <center>
        <div class="event-container">
            <div class="grid-9">

                <?php

                $i = 0;
                if ($past) {
                    $count = sizeof($past);
                    while ($count > 0 && $i < 3) { ?>

                        <!-- EVENT-COMPLETED -->
                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $past[$i]->name ?></div>

                            <img class="event-image m-bottom-4 height-50" src="<?= ROOT ?>/<?php echo $past[$i]->thumbnail_pic ?>" alt="" srcset="">

                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $past[$i]->date ?></div>

                            <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>

                            <div class="row-flex jf-center">
                                <a href="<?= ROOT ?>/event_org?id=<?= $past[$i]->event_id ?>">
                                    <button class="btn btn-green btn-block btn-xsm m-top-3">View Details</button>
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
        <center>
            <a href="./org_admin_events"><button class="detail-btn">
                    View More</button></a>
</div>



<?php $this->view('includes/footer') ?>