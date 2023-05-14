<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/event_page.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/manager_profile.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="body-container">
    <div class="heading-1">Manager Profile</div>
    <div class="container">
        <div class="card card-back1 col-lg-4 col-sm-12 height-600px p-15">
            <div class="heading-2">Manager Details</div>
            <?php
                $ongoing_count = 0;
                $past_count = 0;
                if($ongoing){
                    $ongoing_count = count($ongoing);
                }
                if($past){
                    $past_count = count($past);
                }
            ?>
            <div class="row col-12 grid-10">
                <div class="card card-white height-100px col-5 m-bottom-30">
                    <div class="w-medium txt-12 m-top-10">Events Completed</div>
                    <div class="txt-purple txt-25 w-bold m-top-10"><?php echo $past_count ?></div>
                </div>
                <div class="card card-white height-100px col-5 m-bottom-30">
                    <div class="w-medium txt-12 m-top-10">Upcomming Events</div>
                    <div class="txt-purple txt-25 w-bold m-top-10"><?php echo $ongoing_count ?></div>
                </div>
            </div>
            <form method="post" action="" enctype="multipart/form-data" class="p-top-10 p-left-80 p-right-5">
                <label for="name" class="heading-4">Event Manager Name</label>
                <input name="name" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" type="text" value="<?php echo $manager->full_name; ?>"><br>

                <label for="email" class="heading-4">Email Address</label>
                <input name="email" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" value="<?php echo $manager->email; ?>" type="text"><br>

                <label for="nic" class="heading-4">NIC</label><br>
                <input name="nic" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" value="<?php echo $manager->nic; ?>" type="text" readonly><br>

                <button class="btn btn-sm btn-black float-right m-top-35 m-bottom-15 m-right-20" type="submit">Save changes</button>
                <!-- <a href="add_managers">
                    <button class="btn btn-sm btn-black float-left m-top-10 m-bottom-15" style="margin-left: -70px;" type="button">Back</button>
                </a> -->

            </form>
        </div>

        <div class="blank col-lg-1"></div>
        <div class="card-simple col-lg-7 col-sm-12 height-750px">
            <div class="row grid-11">
                <div class="heading-2 col-11 width-100" style="text-align: center;">Appointed events</div>
                <div class="blank col-lg-1"></div>

                <div class="row col-9 grid-9 event_scroll p-right-20 p-top-20">
                    <?php
                    $i = 0;
                    if ($ongoing) {
                        $count = sizeof($ongoing);
                        while ($count > 0) { ?>
                            <!-- EVENT -->
                            <div class="card event-card-on col-lg-3 col-md-3 p-left-20 p-right-20 p-top-10 m-bottom-20 " style="max-height:400px; overflow:auto;">

                                <img class="event-image m-bottom-1" src="<?= ROOT ?>/<?php echo $ongoing[$i]->thumbnail_pic ?>" alt="" srcset="">

                                <div class="event-date txt-al-center txt-12 m-top-1 w-bold"><?php echo $ongoing[$i]->name ?></div>

                                <div class="event-date txt-al-center txt-06">Event Date - <?php echo $ongoing[$i]->date ?></div>

                                <form method="post" action="Manager_profile/change?id=<?= $ongoing[$i]->event_id ?>" class="p-top-1 p-left-5 p-right-5">
                                    <div for="manager" class="heading-event-manager event-date txt-al-center">Manager</div>
                                    <select name="manager" value="Select manager" class="width-100 input-field input-field-full m-bottom-5 m-top-5" type="text">
                                        <?php
                                        if ($allmanagers) {
                                            $tot = sizeof($allmanagers);
                                            $x = 0;
                                            echo "<option value='not_selected'>" . $manager->full_name . "</option>";
                                            while ($tot > 0) {
                                                if (strcmp($manager->email, $allmanagers[$x]->email)) { ?>
                                                    <option value="<?php echo $allmanagers[$x]->email; ?>"><?php echo $allmanagers[$x]->full_name; ?></option>";

                                        <?php   }
                                                $x = $x + 1;
                                                $tot = $tot - 1;
                                            }
                                        } else {
                                            echo "<option value='volvo'>--Select manager--</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="row-flex">
                                        <button class="btn btn-ex-sm btn-black float-right" type="submit">Save</button>
                                    </div>
                                </form><br>

                                <div class="row-flex jf-center">
                                    <a href="<?= ROOT ?>/event_org?id=<?= $ongoing[$i]->event_id ?>">
                                        <button class="btn btn-green btn-block btn-xsm" style="margin-bottom: 5px; margin-top:-5px;">View Details</button>
                                    </a>
                                </div>
                            </div>
                            <!-- end of EVENT -->
                        <?php $count--;
                            $i++;
                        }
                    } else { ?>
                        <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Appointed Events</div>
                    <?php }
                    ?>


                </div>

                <div class="blank col-lg-1"></div>
            </div>
        </div>
    </div>
    <div class="heading-2 m-top-40">Completed Events</div>
    <div class="container card-simple p-20">
        <div class="row col-12 grid-10 event_scroll p-right-10 p-top-20" style="height: 350px;">

            <?php
            $i = 0;
            if ($past) {
                $count = sizeof($past);
                while ($count > 0) { ?>
                    <!-- EVENT-COMPLETED -->
                    <div class="card event-card-past col-lg-2 col-md-2 p-20 p-top-10 m-bottom-5">

                        <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $past[$i]->name ?></div>

                        <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $past[$i]->thumbnail_pic ?>" alt="" srcset="">

                        <div class="event-date txt-al-center txt-07">Event Date - <?php echo $past[$i]->date ?></div>

                        <!-- <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div> -->


                        <div class="row-flex jf-center">
                            <a href="<?= ROOT ?>/event_org?id=<?= $past[$i]->event_id ?>">
                                <button class="btn btn-green btn-block btn-xsm m-top-1">View Details</button>
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


</div>

<script src="<?= ROOT ?>/assets/script/em_form_check.js"></script>
<?php $this->view('includes/footer') ?>