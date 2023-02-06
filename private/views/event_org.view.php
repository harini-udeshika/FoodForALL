<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/event_page.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="body-container">
    <div class="heading-1">Event Name</div>
    <div class="container">
        <div class="heading-2 col-lg-2 p-left-25 p-top-7">Event Status : </div>
        <div class="card col-lg-2 heading-3 height-30px" style="text-align: center; color:red;">Ongoing</div>
        <div class="blank col-lg-8"></div>
        <!-- <div class="heading-2 col-lg-2 p-left-25 p-top-7" style="border: 1px solid red;"></div> -->
    </div>

    <div class="container">
        <div class="blank col-lg-1"></div>
        <div class="card col-lg-5 height-auto">
            <div class="row">
                <div class="heading-3 col-lg-12 p-left-20 p-top-40">Event Manager :</div>
                <div class="blank col-lg-3"></div>
                <div class="card-green col-lg-6 height-35px heading-event2" style="text-align: center; margin-top:-20px;">Manager Name</div>
                <div class="blank col-lg-3"></div>
                <div class="heading-3 col-lg-12 p-left-20 p-top-15 p-bottom-20">Event Details</div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Location Address</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: Adress</div>
                <div class="blank col-lg-1"></div><br>

                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Date</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: xx/xx/xxxx</div>
                <div class="blank col-lg-1"></div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Total Volunteers</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: 00</div>
                <div class="blank col-lg-1"></div>

                <div class="blank col-lg-1"></div>
                <div class="heading-4 col-lg-4 txt-purple p-bottom-1 p-top-5">Total Donations</div>
                <div class="heading-4 col-lg-6 p-bottom-1 p-top-1">: Rs. 00.00</div>
                <div class="blank col-lg-1"></div>

                <div class="heading-3 col-lg-12 p-left-20 p-top-15 p-bottom-20">Event Details</div>

                <div class="blank col-lg-1"></div>
                <div class="card-simple col-lg-9 p-bottom-1 p-top-1 height-120px" style="border: 2px solid black;"></div>
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
    <div class="blank col-lg-12 height-100px"></div>

    <div class="container">
        <div class="blank col-lg-1"></div>
        <div class="card col-lg-10 height-auto">
            <div class="heading-2 col-lg-2 p-left-25 p-top-20">Set Volunteer Levels </div>
            <form action="">
                <div class="row grid-11">
                    <label for="total" class="heading-3 col-lg-2 p-left-25 p-top-12">Total Volunteers</label>
                    <input class="input-field input-field-block col-lg-2 m-bottom-15 m-left-15 m-top-5" type="text" type="text">
                    <div class="blank col-lg-7"></div>

                    <div class="blank col-lg-1"></div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Mild</div>
                            <hr style="width: 75%;">
                            <textarea name="easy-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Modarate</div>
                            <hr style="width: 75%;">
                            <textarea name="easy-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="card card-back1 col-lg-3 height-300px m-25">
                        <div style="text-align: center;">
                            <div class="heading-4">Heavy</div>
                            <hr style="width: 75%;">
                            <textarea name="easy-des" class="input-field input-field-block width-70 m-bottom-15 m-top-5" style="height:20%;" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="blank col-lg-1"></div>
                </div>
                <button class="btn btn-sm btn-green float-right m-top-30 m-bottom-25 m-right-20" type="submit">Add</button>
            </form>
        </div>
        <div class="blank col-lg-1"></div>

    </div>

</div>

<?php $this->view('includes/footer') ?>