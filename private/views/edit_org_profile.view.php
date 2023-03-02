<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/new_styles.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/style1.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="container">

    <!-- blank class fro adjust layout -->
    <div class="blank col-lg-3"></div>


    <div class="card col-lg-6 grid-10 p-left-30 p-right-30 p-bottom-30 m-top-80">
        <div class="heading-2 col-10">Details</div>

        <!-- photo section -->
        <div class="card-simple m-8 profile-pic-div col-lg-4 col-md-5 p-20">
            <div class="heading-3 p-top-0">Profile picture</div>

            <?php
            $image = "./images/user_icon.png";
            if (file_exists($rows->profile_pic)) {
                $image = $rows->profile_pic;
                // echo $user["profile_pic"];
            }

            ?>

            <div style="display: flex; justify-content: center;">
                <img src="<?php echo $image ?>" alt="" class="" style="width: 80%; border-radius: 50%; ">
            </div>
            <div style="display: flex; justify-content: center;">
                <a href="changepic" class="txt-12 underline m-10">change</a>
                <a href="./edit_org_profile/delete_pic" class="txt-12  underline m-10">remove</a>
            </div>
        </div>

        <!-- info section -->
        <div class="card-simple m-8 profile-pic-div col-lg-6 col-md-5 p-15">
            <div class="heading-3 p-top-0">Info</div>
            <!-- this is form -->
            <form action="" id="edit-form" method="POST">
                <div class="">
                    <div class="data-row p-bottom-40 txt-12">
                        <div class=" left-side w-semibold">Name</div>
                        <input class="right-side txt-al-left " name="name" type="text" value="<?php echo $rows->name ?>" readonly style="border: none;">
                    </div>

                    <div class="data-row p-bottom-40 txt-12">
                        <div class=" left-side w-semibold">email</div>
                        <input class="right-side txt-al-left" name="email" type="text" value="<?php echo $rows->email ?> " readonly style="border: none;">
                    </div>

                    <div class="data-row p-bottom-40 txt-12">
                        <div class=" left-side w-semibold">Tel</div>
                        <input class="right-side txt-al-left" name="tel" type="text" value="<?php echo $rows->tel ?>" style="border: none;">
                    </div>

                    <div class="data-row p-bottom-40 txt-12">
                        <div class=" left-side  w-semibold">City</div>
                        <input class="right-side txt-al-left" name="city" type="text" value="<?php echo $rows->city ?>" style="border: none;">
                    </div>

                    <div class="data-row p-bottom-40 txt-12">
                        <div class=" left-side w-semibold">Reg. Number</div>
                        <input class="right-side txt-al-left " name="gov_no" type="text" value="<?php echo $rows->gov_reg_no ?>" readonly style="border: none;">
                    </div>

                </div>
                <!-- </form> -->

        </div>

        <div class="about-div card-simple m-8 col-lg-6 p-15">
            <div class="heading-3">about</div>
            <textarea id="subject" name="about" rows="4" cols="50" style="height:75px; width:100%; text-align:left;">
            <?php
            if (isset($rows->about)) {
                echo $rows->about;
            } else {
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

    <!-- Report section -->
    <div class="blank col-lg-2 col-sm-12"></div>
    <div class="heading-2 col-lg-10 col-sm-12 p-left-15">Summary of your Events within the last 30 days</div>
    <div class="blank col-lg-2"></div>
    <div class="card col-lg-4 height-400px p-left-30 p-right-30 p-bottom-30 m-15" style="margin-top: 2px;">
        <canvas id="myChart1"></canvas>
    </div>
    <div class="card col-lg-4 height-400px p-left-30 p-right-30 p-bottom-30 m-15 m-top-5" style="margin-top: 2px;">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="blank col-lg-2"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    $chart_lable = array();
    $donations = array();
    $recived_donations = array();
    $volunteers = array();
    $arrived_volunteers = array();
    if ($lastmonth) {
        $count = sizeof($lastmonth);
        $i = 0;
        while ($count > 0) {
            $chart_lable[] = $lastmonth[$i]->name;
            if ($lastmonth[$i]->total_amount) {
                $donations[] = $lastmonth[$i]->total_amount;

                $recived_donations[] = $lastmonth[$i]->collected;
            }
            if ($lastmonth[$i]->no_of_volunteers) {
                $volunteers[] = $lastmonth[$i]->no_of_volunteers;
                $arrived_volunteers[] = 10;
            }
            $i++;
            $count--;
        }
        // print_r($chart_lable);
        // die;
    }
    ?>

    <script>
        // const ctx1 = document.getElementById('myChart1');
        // const ctx2 = document.getElementById('myChart2');

        console.log(<?php echo json_encode($lastmonth); ?>)

        const last_month = <?php echo json_encode($lastmonth); ?>;
        const lables = <?php echo json_encode($chart_lable); ?>;
        const donations = <?php echo json_encode($donations); ?>;
        const recived_donations = <?php echo json_encode($recived_donations); ?>;
        const volunteers = <?php echo json_encode($volunteers); ?>;
        const arrived_volunteers = <?php echo json_encode($arrived_volunteers); ?>;

        console.log(volunteers);

        // setup data
        const data = {
            labels: lables,
            datasets: [{
                label: 'Required Donations ',
                data: donations,
                backgroungdColor: 'rgba(54,162,235,0.2)',
                borderWidth: 1
            }, {
                label: 'Recived Donations',
                data: recived_donations,
                backgroungdColor: 'rgba(255,99,132,0.2)',
                borderWidth: 1
            }]
        };

        // config
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        //render
        const myChart1 = new Chart(
            document.getElementById('myChart1'),
            config
        );

        // volunteers summary chart
        // setup data2
        const dataVol = {
            labels: lables,
            datasets: [{
                label: '# of Volunteers requested',
                data: volunteers,
                backgroungdColor: 'rgba(54,162,235,0.2)',
                borderWidth: 1
            }, {
                label: '# of Arrived Volunteers',
                data: arrived_volunteers,
                backgroungdColor: 'rgba(255,99,132,0.2)',
                borderWidth: 1
            }]
        };
        // console.log(data2);

        // cofig
        const config2 = {
            type: 'bar',
            data: dataVol,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        //render
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>


    <!-- blank class fro adjust layout -->
    <div class="blank col-lg-1"></div>

    <div class="card col-lg-10 p-left-30 p-right-30 p-bottom-50 m-top-60">
        <!-- heading -->
        <div class="heading-2">Images</div>

        <!-- image holder -->
        <div class="row">

            <!-- each image -->
            <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                <div class="photo_holder">
                    <img src="<?= ROOT ?>/uploads/<?php if ($org_images[0]) {
                                                        echo $org_images[0];
                                                    } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                </div>
                <div class="row-flex jf-center">
                    <button class="btn btn-sm btn-gray remove_button">Remove</button>
                </div>
            </div>

            <!-- each image -->
            <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                <div class="photo_holder">
                    <img src="<?= ROOT ?>/uploads/<?php if ($org_images[1]) {
                                                        echo $org_images[1];
                                                    } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                </div>
                <div class="row-flex jf-center">
                    <button class="btn btn-sm btn-gray remove_button">Remove</button>
                </div>
            </div>

            <!-- each image -->
            <div class="added_image_holder col-lg-3 col-md-6 col-sm-6 m-10">
                <div class="photo_holder">
                    <img src="<?= ROOT ?>/uploads/<?php if ($org_images[2]) {
                                                        echo $org_images[2];
                                                    } ?>" alt="" class="" style="width: 100%; height: 100%; border-radius:10px;">
                </div>
                <div class="row-flex jf-center">
                    <button class="btn btn-sm btn-gray remove_button">Remove</button>
                </div>
            </div>



            <!-- add more button -->
            <!-- <form method="POST" enctype="multipart/form-data" class="addmore_link_holder col-lg-3 col-md-6 col-sm-6 m-10" href=""> -->
            <div class=" col-lg-3 col-md-6 col-sm-6 m-10">
                <form method="POST" action="edit_org_profile/add_images" enctype="multipart/form-data">
                    <div class="added_image_holder addmore_link_holder">
                        <div class="added_image_holder">
                            <div class="link_holder row-flex">

                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 68.5%; fill:var(--projectPurple); margin-bottom: 20px;">
                                    <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z" />
                                </svg>-->
                                <label class="p-10 width-100 txt-al-center m-lr-auto m-top-10 sp-1" style="cursor:pointer; border:1px solid var(--projectPurple);" for="inputTag">
                                    <div class="block">Add Images</div>
                                    <input id="inputTag" name="images[]" type="file" multiple="multiple" style="display:none;">
                                    <i class="fas fa-image txt-20 m-top-10"></i>
                                </label>
                                <div class="addmore-txt txt-center" style="font-size: 1.0rem;">(upto 3 images)</div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-purple float-right m-top-5 m-right-90" type="submit">Save</button>
            </div>

            </form>


        </div>

    </div>

    <!-- blank class fro adjust layout -->
    <div class="blank col-lg-1"></div>

</div>

<?php $this->view('includes/footer') ?>