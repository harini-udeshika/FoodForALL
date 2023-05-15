<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/event_page.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/form_validations.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>



<div class="body-container">
    <div class="heading-1">Event Name : <?php echo $event_details->name ?></div>
    <div class="container">
        <div class="col-12 grid-10">
            <div class="heading-2 col-lg-2 col-sm-5 p-left-25 p-top-7">Event Status : </div>
            <div class="card col-lg-2 col-sm-5 heading-3 height-30px" style="text-align: center; color:red;">
                <?php
                if ($event_details->date < date("Y-m-d")) {
                    echo "Completed";
                } else {
                    echo "Upcoming";
                }
                ?></div>
            <div class="blank col-lg-6"></div>
        </div>
        <!-- <div class="heading-2 col-lg-2 p-left-25 p-top-7" style="border: 1px solid red;"></div> -->
    </div>

    <div class="container">
        <div class="blank col-lg-1"></div>
        <div class="card col-lg-5 height-auto">
            <div class="row">
                <div class="heading-3 col-lg-12 p-left-20 p-top-40">Event Manager :</div>
                <div class="blank col-lg-3"></div>
                <div class="card-green col-lg-6 height-35px heading-event2" style="text-align: center; margin-top:-20px;"><?php echo $em_details->full_name ?></div>
                <div class="blank col-lg-3"></div>
                <div class="heading-3 col-lg-12 p-left-20 p-top-15 p-bottom-20">Event Details</div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Location Address</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: <?php echo $event_details->location ?></div>
                <div class="blank col-lg-1"></div><br>

                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Date</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: <?php echo $event_details->date ?></div>
                <div class="blank col-lg-1"></div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Total Volunteers</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: <?php echo $event_details->no_of_volunteers ?></div>
                <div class="blank col-lg-1"></div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Total Donations</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: Rs. <?php echo $event_details->total_amount ?></div>
                <div class="blank col-lg-1"></div>

                <div class="heading-3 col-lg-12 p-left-20 p-top-15 p-bottom-20">Event Description</div>

                <div class="blank col-lg-1"></div>
                <div class="card-simple col-lg-9 p-bottom-1 p-top-1 height-120px" style="border: 2px solid black; text-align:left; overflow:auto;"><?php echo $event_details->description ?></div>
                <div class="blank col-lg-2"></div>


            </div>
            <!-- <button class="btn btn-sm btn-green float-right m-top-30 m-bottom-30 m-right-20" type="submit">Edit info</button> -->
        </div>
        <div class="card col-lg-5 height-auto grid-10">
            <div class="blank col-lg-2 col-md-2"></div>
            <div class="card-simple m-8 profile-pic-div col-lg-6 col-md-6 p-10 ">
                <div class="heading-3 p-top-0">Thumbnail Picture</div>

                <?php
                $image = "./images/logo.png";
                if (file_exists($event_details->thumbnail_pic)) {
                    $image = $event_details->thumbnail_pic;
                    // echo $user["profile_pic"];
                }

                ?>

                <div style="display: flex; justify-content: center;">
                    <img src="<?php echo $image ?>" alt="" class="" style="width: 65%; border-radius: 10px; ">
                </div>
                <div style="display: flex; justify-content: center;">
                    <a href="changepic" class="txt-12 underline m-10">change</a>
                    <a href="" class="txt-12  underline m-10">remove</a>
                </div>
            </div>
            <div class="blank col-lg-2 col-md-2"></div>

            <div class="heading-2 col-10 p-bottom-1 p-top-5">Event Progress</div>
            <div class="card m-8 profile-pic-div col-lg-10 col-md-10 p-left-10 p-right-10 height-80px">
                <div class="m-top-10">
                    <div class="row-flex jf-btwn">
                        <div class="txt-16 w-semibold txt-purple arrow-icon">Donations</div>

                        <div class="row-flex">
                            <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                            <div class="txt-15 w-semibold txt-purple arrow-icon">Rs.<?php echo $event_details->total_amount ?></div>
                        </div>
                    </div>

                    <div class="progress-back width-100 height-10px">
                        <div class="progress-fill width-<?php if ($event_details->amount_percentage) {
                                                            echo $event_details->amount_percentage;
                                                        } else {
                                                            echo 0;
                                                        } ?> height-10px"></div>
                    </div>
                </div>
            </div>
            <div class="card m-8 profile-pic-div col-lg-10 col-md-10 p-left-10 p-right-10 height-80px">
                <div class="m-top-10">
                    <div class="row-flex jf-btwn">
                        <div class="txt-16 w-semibold txt-purple arrow-icon">Volunteers</div>

                        <div class="row-flex">
                            <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                            <div class="txt-15 w-semibold txt-purple arrow-icon"><?php echo $event_details->no_of_volunteers ?></div>
                        </div>
                    </div>

                    <div class="progress-back width-100 height-10px">
                        <div class="progress-fill width-<?php if ($event_details->vol_percentage) {
                                                            echo $event_details->vol_percentage;
                                                        } else {
                                                            echo 0;
                                                        } ?> height-10px"></div>
                    </div>
                </div>
            </div>



        </div>
        <div class="blank col-lg-1"></div>
    </div>
    <?php
    if ($event_details->approved == 1) { ?>
        <div class="container">
            <div class="blank col-lg-1"></div>
            <div class="heading-2 col-lg-11 m-top-20">Add Event Images</div>
            <div class="blank col-lg-1"></div>
            <div class="card col-lg-10 height-auto">
                <div class="row">
                    <!-- each image -->
                    <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                        <div class="photo_holder">
                            <?php if ($event_images[0]) { ?>
                                <img src="<?= ROOT ?>/uploads/<?php if ($event_images[0]) {
                                                                    echo $event_images[0];
                                                                } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                            <?php
                            } ?>
                        </div>
                        <div class="row-flex jf-center">
                            <a href="event_org/delete_images?id=<?php echo $event_details->event_id ?>&index=0">
                                <button class="btn btn-sm btn-gray remove_button">Remove</button>
                            </a>
                        </div>
                    </div>

                    <!-- each image -->
                    <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                        <div class="photo_holder">
                            <?php if (isset($event_images[1])) { ?>
                                <img src="<?= ROOT ?>/uploads/<?php if ($event_images[1]) {
                                                                    echo $event_images[1];
                                                                } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                            <?php
                            } ?>
                        </div>
                        <div class="row-flex jf-center">
                            <a href="event_org/delete_images?id=<?php echo $event_details->event_id ?>&index=1">
                                <button class="btn btn-sm btn-gray remove_button">Remove</button>
                            </a>
                        </div>
                    </div>

                    <!-- each image -->
                    <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                        <div class="photo_holder">
                            <?php if (isset($event_images[2])) { ?>
                                <img src="<?= ROOT ?>/uploads/<?php if (isset($event_images[2])) {
                                                                    echo $event_images[2];
                                                                } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                            <?php
                            } ?>
                        </div>
                        <div class="row-flex jf-center">
                            <a href="event_org/delete_images?id=<?php echo $event_details->event_id ?>&index=2">
                                <button class="btn btn-sm btn-gray remove_button">Remove</button>
                            </a>
                        </div>
                    </div>

                    <div class=" col-lg-3 col-md-6 col-sm-6 m-10">
                        <form method="POST" action="event_org/add_images?id=<?php echo $event_details->event_id ?>" enctype="multipart/form-data">
                            <div class="added_image_holder addmore_link_holder" style="width:auto;">
                                <div>
                                    <div class="link_holder row-flex">
                                        <label class="p-10 txt-al-center m-lr-auto sp-1" style="cursor:pointer;" for="inputTag">
                                            <input id="inputTag" name="images[]" type="file" multiple="multiple" style="display:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 80%; fill:var(--projectPurple);">
                                                <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z" />
                                            </svg>
                                        </label>
                                        <div class="addmore-txt txt-center" style="font-size: 1.0rem;">(upto 3 images)</div>

                                    </div>

                                </div>

                            </div>

                            <button class="btn btn-sm btn-black m-top-10 float-right" type="submit">Save</button>
                    </div>

                    </form>

                </div>
            </div>
            <div class="blank col-lg-1"></div>

        </div>
        <?php
        $volunteer_count = 0;
        if ($event_details->no_of_volunteers) {
            $volunteer_count = $event_details->no_of_volunteers;
        }
        // echo count($volunteer_accepted);
        // die;
        ?>


        <!-- Adding volunteer levels section -->

        <?php if ($event_details->date >= date("Y-m-d")) { ?>
            <div class="blank col-lg-12 height-75px"></div>
            <div class="container">
                <div class="blank col-lg-1"></div>
                <div class="card col-lg-10 height-auto">
                    <div class="heading-2 col-lg-2 p-left-25 p-top-20">Set Volunteer Levels </div>
                    <div class="heading-4 col-lg-2 p-left-25 p-top-5" style="font-weight: 500;">You can have your required volunteers
                        divided into 3 categories according to the dificulty of their respective tasks(optional)</div>
                    <form method="post" id="vol_form" action="event_org/volunteer_levels?id=<?php echo $event_details->event_id ?>">
                        <div class="row grid-11">

                            <div class="blank col-lg-1"></div>
                            <div class="card card-back1 col-lg-3 height-300px m-25">
                                <div style="text-align: center;">
                                    <div class="heading-4">Mild</div>
                                    <hr style="width: 75%;">
                                    <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                        Please add a description for volunteer activities of mild difficulty level.
                                    </div>
                                    <textarea name="mild-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%; overflow:auto;" cols="30" rows="5"><?php
                                                                                                                                                                                        if (isset($event_details->mild_description)) {
                                                                                                                                                                                            echo $event_details->mild_description;
                                                                                                                                                                                        }
                                                                                                                                                                                        ?></textarea>
                                    <br>
                                    <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                                    <input id="num_1" class="input-field input-field-sm m-top-6" max="100" min="0" name="tot-mild" type="number" value="<?php
                                                                                                                                                        if (isset($event_details->mild_vol_total)) {
                                                                                                                                                            echo $event_details->mild_vol_total;
                                                                                                                                                        }
                                                                                                                                                        ?>" min="0">
                                </div>
                            </div>
                            <div class="card card-back1 col-lg-3 height-300px m-25">
                                <div style="text-align: center;">
                                    <div class="heading-4">Modarate</div>
                                    <hr style="width: 75%;">
                                    <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                        Please add a description for volunteer activities of moderate difficulty level.
                                    </div>
                                    <textarea name="moderate-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%; overflow:auto;" cols="30" rows="5"><?php
                                                                                                                                                                                            if (isset($event_details->moderate_description)) {
                                                                                                                                                                                                echo $event_details->moderate_description;
                                                                                                                                                                                            }
                                                                                                                                                                                            ?></textarea>
                                    <br>
                                    <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                                    <input id="num_2" class="input-field input-field-sm m-top-6" max="100" min="0" name="tot-moderate" type="number" value="<?php
                                                                                                                                                            if (isset($event_details->moderate_vol_total)) {
                                                                                                                                                                echo $event_details->moderate_vol_total;
                                                                                                                                                            }
                                                                                                                                                            ?>" min="0">
                                </div>
                            </div>
                            <div class="card card-back1 col-lg-3 height-300px m-25">
                                <div style="text-align: center;">
                                    <div class="heading-4">Heavy</div>
                                    <hr style="width: 75%;">
                                    <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                        Please add a description for volunteer activities of Heavy difficulty level.
                                    </div>
                                    <textarea name="heavy-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%; overflow:auto;" cols="30" rows="5"><?php
                                                                                                                                                                                        if (isset($event_details->heavy_description)) {
                                                                                                                                                                                            echo $event_details->heavy_description;
                                                                                                                                                                                        }
                                                                                                                                                                                        ?></textarea>
                                    <br>
                                    <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                                    <input id="num_3" class="input-field input-field-sm m-top-6" max="100" min="0" name="tot-heavy" type="number" value="<?php
                                                                                                                                                            if (isset($event_details->heavy_vol_total)) {
                                                                                                                                                                echo $event_details->heavy_vol_total;
                                                                                                                                                            }
                                                                                                                                                            ?>" min="0">
                                </div>
                            </div>
                            <div class="blank col-lg-1"></div>
                            <div class="InputControl" id="error_div">
                                <div class="client-error"></div>
                            </div>

                            <label for="total" class="heading-3 col-lg-2 p-left-25 p-top-12">Total Volunteers</label>
                            <input class="input-field input-field-block col-lg-2 m-bottom-15 m-left-15 m-top-5" value="<?php echo $volunteer_count ?>" name="tot" type="text" readonly>
                            <div class="blank col-lg-7"></div>


                        </div>
                        <button class="btn btn-sm btn-green float-right m-top-30 m-bottom-25 m-right-20" type="submit">Save</button></button>
                    </form>
                </div>
                <div class="blank col-lg-1"></div>

            </div>
            <div class="blank col-lg-12 height-75px"></div>
        <?php } ?>
        <!-- Adding volunteer levels section end -->

        <!-- Requested volunteer section  -->
        <?php if ($event_details->date >= date("Y-m-d")) { ?>

            <div class="container">
                <div class="blank col-lg-1"></div>
                <div class="card col-lg-10 height-450px p-right-20 p-top-30 p-bottom-35">
                    <div class="heading-2 col-lg-2 p-left-25 p-top-20">Volunteer Requests </div>
                    <div class="row volunteer_scroll">
                        <?php
                        $i = 0;
                        if ($volunteer_req) {
                            $count = count($volunteer_req);
                            while ($count > 0) {
                                $volunteer = new User();
                                $query = "SELECT * FROM user WHERE id = :id";
                                $arr = ['id' => $volunteer_req[$i]->id];
                                $user_volunteer = $volunteer->query($query, $arr);
                                $user_volunteer = $user_volunteer[0];

                                $image = "./images/user_icon.png";
                                if (file_exists($user_volunteer->profile_pic)) {
                                    $image = $user_volunteer->profile_pic;
                                    // echo $user["profile_pic"];
                                }

                                // print_r($user_volunteer);
                                // die;

                        ?>

                                <div class="blank col-2"></div>
                                <div class="card col-8 height-90px p-bottom-15 grid-10">
                                    <div class="col-2" style="display: flex; justify-content: center;">
                                        <img src="<?php echo $image ?>" alt="" class="m-top-6" style="height:5rem; border-radius: 50%; margin-left:-15px;">
                                    </div>
                                    <div class="col-6 heading-event3 p-top-30 txt-purple"><a href="profile?id=<?php echo $user_volunteer->id ?>">
                                            <?php echo $user_volunteer->first_name . " " . $user_volunteer->last_name; ?>
                                        </a><br>
                                        <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;"><?php echo $volunteer_req[$i]->volunteer_type; ?></div>
                                    </div>
                                    <div class="blank col-1">
                                        <a href="event_org/accept?uid=<?php echo $user_volunteer->id ?>&event_id=<?php echo $volunteer_req[$i]->event_id ?>">
                                            <button class="btn btn-sm btn-green m-top-26 m-right-15">Accept</button>
                                        </a>
                                    </div>
                                    <div class="blank col-1">
                                        <a href="event_org/reject?uid=<?php echo $user_volunteer->id ?>&event_id=<?php echo $volunteer_req[$i]->event_id ?>">
                                            <button class="btn btn-sm btn-gray m-top-26 m-right-15">Reject</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="blank col-2"></div>

                            <?php
                                $count--;
                                $i++;
                            }
                        } else { ?>
                            <div class="heading-3 col-lg-12 p-left-25 m-top-5 m-bottom-5">No New Volunteer Requests</div>
                        <?php }
                        ?>

                    </div>
                </div>
                <div class="blank col-lg-1"></div>
            </div>

        <?php } ?>
        <!-- Requested volunteer section end -->
        <div class="blank col-lg-12 height-75px"></div>


        <!-- Accepted volunteers section -->
        <div class="container">
            <div class="blank col-1"></div>
            <div class="card col-lg-10 height-auto p-top-30 p-bottom-15">
                <div class="heading-2 col-lg-2 p-left-25 p-top-20">Accepted Volunteers</div>
                <div class="row">

                    <div class="blank col-2"></div>
                    <div class="card-simple col-8 height-275px p-20 grid-10 accepted_scroll">

                        <?php
                        $i = 0;
                        if ($accepted_vol) {
                            $count = count($accepted_vol);
                            while ($count > 0) {
                                $volunteer = new User();
                                $query = "SELECT * FROM user WHERE id = :id";
                                $arr = ['id' => $accepted_vol[$i]->user_id];
                                $user_volunteer = $volunteer->query($query, $arr);
                                $user_volunteer = $user_volunteer[0];
                                // print_r($user_volunteer);

                                $image = "./images/user_icon.png";
                                if (file_exists($user_volunteer->profile_pic)) {
                                    $image = $user_volunteer->profile_pic;
                                    // echo $user["profile_pic"];
                                }

                                // print_r($user_volunteer);
                                // die;

                        ?>
                                <div class="card col-5 height-80px grid-8">
                                    <div class="col-lg-2" style="display: flex; justify-content: center;">
                                        <img src="<?php echo $image ?>" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                                    </div>
                                    <div class="col-6 heading-event2 p-top-20 p-left-20 txt-purple"><a href="profile?id=<?php echo $user_volunteer->id ?>">
                                            <?php echo $user_volunteer->first_name . " " . $user_volunteer->last_name; ?>
                                        </a><br>
                                        <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;"><?php echo $accepted_vol[$i]->volunteer_type; ?></div>
                                    </div>

                                </div>

                            <?php
                                $count--;
                                $i++;
                            }
                        } else { ?>
                            <div class="heading-3 col-lg-12 p-left-25 m-top-5 m-bottom-5">No Volunteers Accepted</div>
                        <?php }
                        ?>


                    </div>
                    <div class="blank col-2"></div>

                </div>
            </div>
        </div>

        <div class="blank col-lg-12 height-75px"></div>
        <!-- Attended volunteers section -->

        <?php if ($event_details->date < date("Y-m-d")) { ?>
            <div class="container">
                <div class="blank col-1"></div>
                <div class="card col-lg-10 height-auto p-top-30 p-bottom-15">
                    <div class="heading-2 col-lg-2 p-left-25 p-top-20">Attended Volunteers</div>
                    <div class="row">

                        <div class="blank col-2"></div>
                        <div class="card-simple col-8 height-275px p-20 grid-10 accepted_scroll">

                            <?php
                            $i = 0;
                            if ($volunteer_attended) {
                                $count = count($volunteer_attended);
                                while ($count > 0) {
                                    $volunteer = new User();
                                    $query = "SELECT * FROM user WHERE id = :id";
                                    $arr = ['id' => $volunteer_attended[$i]->user_id];
                                    $user_volunteer = $volunteer->query($query, $arr);
                                    $user_volunteer = $user_volunteer[0];

                                    $image = "./images/user_icon.png";
                                    if (file_exists($user_volunteer->profile_pic)) {
                                        $image = $user_volunteer->profile_pic;
                                        // echo $user["profile_pic"];
                                    }

                                    // print_r($user_volunteer);
                                    // die;

                            ?>
                                    <div class="card col-5 height-80px grid-8">
                                        <div class="col-lg-2" style="display: flex; justify-content: center;">
                                            <img src="<?php echo $image ?>" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                                        </div>
                                        <div class="col-6 heading-event2 p-top-20 p-left-20 txt-purple"><a href="profile?id=<?php echo $user_volunteer->id ?>">
                                                <?php echo $user_volunteer->first_name . " " . $user_volunteer->last_name; ?>
                                            </a><br>
                                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;"><?php echo $accepted_vol[$i]->volunteer_type; ?></div>
                                        </div>

                                    </div>

                                <?php
                                    $count--;
                                    $i++;
                                }
                            } else { ?>
                                <div class="heading-3 col-lg-12 p-left-25 m-top-5 m-bottom-5">No Volunteers Accepted</div>
                            <?php }
                            ?>


                        </div>
                        <div class="blank col-2"></div>

                    </div>
                </div>
            </div>
        <?php
        } ?>


        <?php
        if ($event_details->date >= date("Y-m-d")) { ?>
            <!-- Email sending button -->
            <div class="container">
                <div class="blank col-1"></div>
                <div class="col-lg-10 height-75px m-top-60">
                    <a href="event_org/send_mails?id=<?php echo $event_details->event_id ?>">
                        <button class="btn btn-lg btn-green ">Send Reminder Emails</button>
                    </a>
                </div>
                <div class="blank col-1"></div>
            </div>
        <?php
        }
        ?>

        <?php
        if ($event_details->date < date("Y-m-d") && $event_details->cert_status == 0) { ?>
            <div class="container">
                <div class="blank col-1"></div>
                <div class="col-lg-10 height-75px m-top-60">
                    <a href="event_org/certificate?id=<?php echo $event_details->event_id ?>">
                        <button class="btn btn-lg btn-purple ">Send Certificates</button>
                    </a>
                </div>
                <div class="blank col-1"></div>
            </div>

        <?php
        }
        ?>
        <?php
        if ($event_details->date < date("Y-m-d") && $event_details->cert_status == 1) { ?>
            <div class="container">
                <div class="blank col-1"></div>
                <div class="col-lg-10 height-75px m-top-60">
                    <a href="">
                        <button disabled class="btn btn-lg btn-disabled ">Certificates Sent</button>
                    </a>
                </div>
                <div class="blank col-1"></div>
            </div>

        <?php
        }
        ?>


    <?php
    }
    ?>
    <!-- Adding images section -->


</div>

<?php $this->view('includes/footer') ?>
<script>
    const vol_count = <?php echo $volunteer_count ?>;

    const vol_form = document.getElementById('vol_form')
    const error_div = document.getElementById('error_div')
    const num_1 = document.getElementById('num_1')
    const num_2 = document.getElementById('num_2')
    const num_3 = document.getElementById('num_3')

    // console.log(vol_count)
    // console.log(num_1.value)

    vol_form.addEventListener('submit', (e) => {
        console.log(vol_count)
        e.preventDefault();
        validateInputs(e);

    });

    const setError = (event, element, message) => {
        if (element.parentElement) {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.client-error');
            const txt1 = '&emsp;&emsp;';

            if (message != '') {
                errorDisplay.innerHTML = txt1.concat("", message);
            }

            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        }
        event.preventDefault();
    };

    const setSuccess = element => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.client-error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
        // event_form.submit()
    };

    const validateInputs = (event) => {
        const num1_val = num_1.value
        const num2_val = num_2.value
        const num3_val = num_3.value

        if (num1_val + num2_val + num_3 < vol_count) {
            setError(event, error_div, 'You have already accepted more volunteers')
        } else {
            vol_form.submit()
        }
    }
</script>