<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/style1.css">
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTET7frzRd7t4FvurRzw28rbqEE7_oWFU&callback=initMap&libraries=places"></script>
<script src="http://polyfill.io/v3/polyfill.min.js?features=default"></script>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>
<?php
// echo "<pre>";
// print_r($allmanagers);
// echo $allmanagers[0]->full_name;
// die;
?>

<div style="font-family:'Inter'; text-align:center; font-size: 50px; font-weight: bold; color: #7681BF;">
        <?php if (isset($_SESSION['USER'])) {
                $na = $_SESSION['USER']->name;
                // echo $na;
        }
        ?> Add Event Information
</div>

<div class="body-container">
        <div class="container">
                <div class="blank col-lg-1"></div>
                <div class="grid-10 col-lg-10 p-20">
                        <div class="blank col-lg-1"></div>
                        <div class="card card-back1 col-lg-8 height-auto p-left-20">
                                <div class="heading-1 col-4 p-top-20 p-bottom-20">Add Events</div>
                                <form method="post" action="" enctype="multipart/form-data" class="p-top-10 p-left-80 p-right-5 height-500px">
                                        <label for="name" class="heading-4 ">Event Name</label><br>
                                        <input name="name" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" type="text" required><br>

                                        <!-- <label for="address" class="heading-4">Location</label> -->
                                        <label for="location" class="heading-4">Location</label><br>
                                        <input name="location" id="locationInp" class=" location width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" type="text"><br>
                                        <input type="text" id="p-longitude" hidden name="longitude">
                                        <input type="text" id="p-latitude" hidden name="latitude">
                                        <!-- <input type="text" id="locationInp" class="location"> -->
<div class="map " id="map">

</div><br>
                                        <label for="date" class="heading-4">Event Date</label><br>
                                        <input name="date" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" type="date"><br>

                                        <label for="file" class="heading-4">Select Thumbnail Picture</label><br>
                                        <input type="file" name="file" id="file" class="m-left-16 m-bottom-15 m-top-5" required><br>

                                        <label for="manager" class="heading-4">Select Event Manager</label><br>
                                        <select name="manager" value="Select manager" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" type="text">
                                                <?php
                                                if ($allmanagers) {
                                                        $tot = sizeof($allmanagers);
                                                        $x = 0;
                                                        echo "<option value='not selected'>--Select manager--</option>";
                                                        while ($tot > 0) { ?>
                                                                <option value="<?php echo $allmanagers[$x]->email; ?>"><?php echo $allmanagers[$x]->full_name; ?></option>";

                                                <?php
                                                                $x = $x + 1;
                                                                $tot = $tot - 1;
                                                        }
                                                } else {
                                                        echo "<option value='not_selected'>--Select manager--</option>";
                                                }
                                                ?>
                                        </select>
                                        <br>

                                        <label for="description" class="heading-4">Event description</label><br>
                                        <textarea name="description" class="width-80 input-field input-field-block m-bottom-15 m-left-15 m-top-5" style="height: 75px;" rows="5" cols="50"></textarea><br>

                                        <button class="btn btn-sm btn-black float-right m-top-40 m-bottom-15 m-right-20" id="add_event" type="submit">Add Event</button>
                                        <a href="home_org">
                                                <button class="btn btn-sm btn-black float-left m-top-40 m-bottom-15" style="margin-left: -70px;" type="button">Back</button>
                                        </a>

                                </form>
                                <div class="blank col-lg-1 height-300px"></div>
                        </div>
                        <div class="blank col-lg-1"></div>
                </div>
                <div class="blank col-lg-1"></div>
        </div>
</div>

<!-- <div class="card col-lg-12 grid-10 p-left-30 p-right-30 p-bottom-30 m-top-80">
            <div class="heading-2 col-10">Details</div>
</div> -->
<script>
  const button = document.getElementById("add_event");
  button.addEventListener("click", () => {
    alert("This action will add a new Event");
  });
</script>

<script src="<?=ROOT?>/assets/map.js"></script>
<?php $this->view('includes/footer') ?>