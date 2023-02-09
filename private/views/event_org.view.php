<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/event_page.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="body-container">
    <div class="heading-1">Event Name : <?php echo $event_details->name ?></div>
    <div class="container">
        <div class="heading-2 col-lg-2 p-left-25 p-top-7">Event Status : </div>
        <div class="card col-lg-2 heading-3 height-30px" style="text-align: center; color:red;">
        <?php 
            if($event_details->date < date("Y-m-d")){
                echo "Completed";
            }else{
                echo "Ongoing";
            }
        ?></div>
        <div class="blank col-lg-8"></div>
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
                <div class="card-simple col-lg-9 p-bottom-1 p-top-1 height-120px" style="border: 2px solid black; text-align:left;"><?php echo $event_details->description ?></div>
                <div class="blank col-lg-2"></div>


            </div>
            <button class="btn btn-sm btn-green float-right m-top-30 m-bottom-30 m-right-20" type="submit">Edit info</button>
        </div>
        <div class="card col-lg-5 height-auto">
            <div class="row">
                <!-- each image -->
                <div class="added_image_holder col-lg-6 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <!-- each image -->
                <div class="added_image_holder col-lg-6 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <!-- each image -->
                <div class="added_image_holder col-lg-6 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <a class="addmore_link_holder col-lg-6 col-md-6 col-sm-6 m-10" href="">
                    <div class="added_image_holder">
                        <div class="added_image_holder">
                            <div class="link_holder row-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 80%; fill:var(--projectPurple); margin-bottom: 20px;">
                                    <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z" />
                                </svg>
                                <div class="addmore-txt txt-center">
                                    Add Images <br>
                                    <div style="font-size: 0.9rem;">(Up to 3 Images)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

        </div>
        <div class="blank col-lg-1"></div>
    </div>
    <div class="blank col-lg-12 height-75px"></div>

    <div class="container">
        <div class="blank col-lg-1"></div>
        <div class="card col-lg-10 height-auto">
            <div class="heading-2 col-lg-2 p-left-25 p-top-20">Set Volunteer Levels </div>
            <div class="heading-4 col-lg-2 p-left-25 p-top-5" style="font-weight: 500;">You can have your required volunteers
                divided into 3 categories according to the dificulty of their respective tasks(optional)</div>
            <form action="">
                <div class="row grid-11">

                    <div class="blank col-lg-1"></div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Mild</div>
                            <hr style="width: 75%;">
                            <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                Please add a description for volunteer activities of mild difficulty level.
                            </div>
                            <textarea name="mild-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                            <br>
                            <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                            <input class="input-field input-field-sm m-top-6" name="tot-moderate" type="text">
                        </div>
                    </div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Modarate</div>
                            <hr style="width: 75%;">
                            <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                Please add a description for volunteer activities of moderate difficulty level.
                            </div>
                            <textarea name="moderate-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                            <br>
                            <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                            <input class="input-field input-field-sm m-top-6" name="tot-moderate" type="text">
                        </div>
                    </div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Heavy</div>
                            <hr style="width: 75%;">
                            <div class="heading-4" style="font-weight: 500; font-size: 0.8rem;">
                                Please add a description for volunteer activities of Heavy difficulty level.
                            </div>
                            <textarea name="heavy-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                            <br>
                            <label for="total" class="heading-4 p-top-12 p-left-15" style="float: left; font-size: 0.9rem;">Amount required</label>
                            <input class="input-field input-field-sm m-top-6" name="tot-moderate" type="text">
                        </div>
                    </div>
                    <div class="blank col-lg-1"></div>

                    <label for="total" class="heading-3 col-lg-2 p-left-25 p-top-12">Total Volunteers</label>
                    <input class="input-field input-field-block col-lg-2 m-bottom-15 m-left-15 m-top-5" value="00" name="tot" type="text" readonly>
                    <div class="blank col-lg-7"></div>

                </div>
                <button class="btn btn-sm btn-green float-right m-top-30 m-bottom-25 m-right-20" type="submit">Save</button></button>
            </form>
        </div>
        <div class="blank col-lg-1"></div>

    </div>

    <div class="blank col-lg-12 height-75px"></div>

    <div class="container">
        <div class="blank col-lg-1"></div>
        <div class="card col-lg-10 height-auto p-top-30 p-bottom-15">
            <div class="heading-2 col-lg-2 p-left-25 p-top-20">Volunteer Requests </div>
            <div class="row">
                <div class="blank col-2"></div>
                <div class="card col-8 height-90px p-bottom-15 grid-10">
                    <div class="col-2" style="display: flex; justify-content: center;">
                        <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-6" style="height:5rem; border-radius: 50%; margin-left:-15px;">
                    </div>
                    <div class="col-6 heading-event3 p-top-30 txt-purple">Volunteer name <br>
                        <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-green m-top-26 m-right-15">Accept</button>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-gray m-top-26 m-right-15">Reject</button>
                    </div>
                </div>
                <div class="blank col-2"></div>

                <div class="blank col-2"></div>
                <div class="card col-8 height-90px p-bottom-15 grid-10">
                    <div class="col-2" style="display: flex; justify-content: center;">
                        <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-6" style="height:5rem; border-radius: 50%; margin-left:-15px;">
                    </div>
                    <div class="col-6 heading-event3 p-top-30 txt-purple">Volunteer name <br>
                        <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-green m-top-26 m-right-15">Accept</button>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-gray m-top-26 m-right-15">Reject</button>
                    </div>
                </div>
                <div class="blank col-2"></div>

                <div class="blank col-2"></div>
                <div class="card col-8 height-90px p-bottom-15 grid-10">
                    <div class="col-2" style="display: flex; justify-content: center;">
                        <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-6" style="height:5rem; border-radius: 50%; margin-left:-15px;">
                    </div>
                    <div class="col-6 heading-event3 p-top-30 txt-purple">Volunteer name <br>
                        <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-green m-top-26 m-right-15">Accept</button>
                    </div>
                    <div class="blank col-1">
                        <button class="btn btn-sm btn-gray m-top-26 m-right-15">Reject</button>
                    </div>
                </div>
                <div class="blank col-2"></div>

            </div>
        </div>
        <div class="blank col-lg-1"></div>
    </div>

    <div class="blank col-lg-12 height-75px"></div>

    <div class="container">
        <div class="blank col-1"></div>
        <div class="card col-lg-10 height-auto p-top-30 p-bottom-15">
            <div class="heading-2 col-lg-2 p-left-25 p-top-20">Accepted Volunteers</div>
            <div class="row">

                <div class="blank col-2"></div>
                <div class="card-simple col-8 height-auto p-20 grid-10">
                    <div class="card col-5 height-80px grid-8">
                        <div class="col-2" style="display: flex; justify-content: center;">
                            <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                        </div>
                        <div class="col-6 heading-event3 p-top-20 p-left-20 txt-purple">Volunteer name <br>
                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                        </div>

                    </div>

                    <div class="card col-5 height-80px grid-8">
                        <div class="col-2" style="display: flex; justify-content: center;">
                            <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                        </div>
                        <div class="col-6 heading-event3 p-top-20 p-left-20 txt-purple">Volunteer name <br>
                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                        </div>

                    </div>

                    <div class="card col-5 height-80px grid-8">
                        <div class="col-2" style="display: flex; justify-content: center;">
                            <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                        </div>
                        <div class="col-6 heading-event3 p-top-20 p-left-20 txt-purple">Volunteer name <br>
                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                        </div>

                    </div>

                    <div class="card col-5 height-80px grid-8">
                        <div class="col-2" style="display: flex; justify-content: center;">
                            <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                        </div>
                        <div class="col-6 heading-event3 p-top-20 p-left-20 txt-purple">Volunteer name <br>
                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                        </div>

                    </div>

                    <div class="card col-5 height-80px grid-8">
                        <div class="col-2" style="display: flex; justify-content: center;">
                            <img src="<?= ROOT ?>/images/user_icon.png" alt="" class="m-top-7" style="height:4rem; border-radius: 50%; margin-left:5px;">
                        </div>
                        <div class="col-6 heading-event3 p-top-20 p-left-20 txt-purple">Volunteer name <br>
                            <div class="txt-purple" style="font-size: 0.8rem; font-weight:500;">Mild</div>
                        </div>

                    </div>

                </div>
                <div class="blank col-2"></div>

            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer') ?>