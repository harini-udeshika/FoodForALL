<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/akila_css/new_styles.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/akila_css/style1.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>  

<div class="container">
        <!-- blank class fro adjust layout -->
        <div class="blank col-lg-1"></div>

        <div class="card col-lg-10 p-left-30 p-right-30 p-bottom-50 m-top-80">
            <!-- heading -->
            <div class="heading-2">Images</div>

            <!-- image holder -->
            <div class="row">

                <!-- each image -->
                <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder" style="background-image: url(./img.jpeg);"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <!-- each image -->
                <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder" style="background-image: url(./img.jpeg);"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <!-- each image -->
                <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                    <div class="photo_holder" style="background-image: url(./img.jpeg);"></div>
                    <div class="row-flex jf-center">
                        <button class="btn btn-sm btn-gray remove_button">Remove</button>
                    </div>
                </div>

                <!-- add more button -->
                <a class="addmore_link_holder col-lg-3 col-md-6 col-sm-6 m-10" href="">
                    <div class="added_image_holder">
                        <div class="added_image_holder">
                            <div class="link_holder row-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    style="width: 80%; fill:var(--projectPurple); margin-bottom: 20px;">
                                    <path
                                        d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z" />
                                </svg>
                                <div class="addmore-txt txt-center">
                                    Add more
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- blank class fro adjust layout -->
        <div class="blank col-lg-1"></div>
        <!-- blank class fro adjust layout -->
        <div class="blank col-lg-3"></div>


        <div class="card col-lg-6 grid-10 p-left-30 p-right-30 p-bottom-30 m-top-80">
            <div class="heading-2 col-10">Details</div>

            <!-- photo section -->
            <div class="card-simple m-8 profile-pic-div col-lg-4 col-md-5 p-20">
                <div class="heading-3 p-top-0">Profile picture</div>

                <?php
                $image="./images/user_icon.png";
                if(file_exists($rows->profile_pic)){
                    $image=$rows->profile_pic;
                    // echo $user["profile_pic"];
                }
                
                ?>
                <div style="display: flex; justify-content: center;">
                    <img src="<?php echo $image?>" alt="" class="" style="width: 80%; border-radius: 50%; ">
                </div>
                <div style="display: flex; justify-content: center;">
                    <a href="changepic" class="txt-12 underline m-10">change</a>
                    <a href="" class="txt-12  underline m-10">remove</a>
                </div>
            </div>

            <!-- info section -->
            <div class="card-simple m-8 profile-pic-div col-lg-6 col-md-5 p-15">
                <div class="heading-3 p-top-0">Info</div>
                <!-- this is form -->
                <form action="" id="edit-form" method="POST">
                    <div class="">
                        <div class="data-row p-bottom-40 txt-12">
                            <div class=" left-side txt-al-right p-right-50 w-semibold">Name</div>
                            <input class="right-side txt-al-left " name="name" type="text" value="<?php echo $rows->name ?>" readonly
                                style="border: none;">
                        </div>

                        <div class="data-row p-bottom-40 txt-12">
                            <div class=" left-side txt-al-right p-right-50 w-semibold">email</div>
                            <input class="right-side txt-al-left" name="email" type="text" value="<?php echo $rows->email ?> " readonly
                                style="border: none;">
                        </div>

                        <div class="data-row p-bottom-40 txt-12">
                            <div class=" left-side txt-al-right p-right-50 w-semibold">Tel</div>
                            <input class="right-side txt-al-left" name="tel" type="text" value="<?php echo $rows->tel ?>"
                                style="border: none;">
                        </div>

                        <div class="data-row p-bottom-40 txt-12">
                            <div class=" left-side txt-al-right p-right-50 w-semibold">City</div>
                            <input class="right-side txt-al-left" name="city" type="text" value="<?php echo $rows->city ?>"
                                style="border: none;">
                        </div>

                        <div class="data-row p-bottom-40 txt-12">
                            <div class=" left-side txt-al-right p-right-50 w-semibold">Reg. Number</div>
                            <input class="right-side txt-al-left " name="gov_no" type="text" value="<?php echo $rows->gov_reg_no ?>" readonly
                                style="border: none;">
                        </div>

                    </div>
                <!-- </form> -->

            </div>

            <div class="about-div card-simple m-8 col-lg-6 p-15">
                <div class="heading-3">about</div>
                <textarea id="subject" name="about" rows="4" cols="50" style="height:75px; width:100%; text-align:left;">
                <?php 
                    if(isset($rows->about)){
                        echo $rows->about;
                    }
                    else{
                        echo "not set";
                        echo $_SESSION['USER']->about;
                    }
                ?>
                </textarea>
            </div>

            <div class="about-div col-lg-10">
                <button class="btn btn-sm btn-purple float-right m-top-15" type="submit">Save Changes</button>
            </div>
            </form>
        </div>

        <!-- blank class fro adjust layout -->
        <div class="blank col-lg-3"></div>
    </div>

<?php $this->view('includes/footer')?>
