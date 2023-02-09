<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/profile.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>  

<body>
    <div class="change_pic">

        <p class="heading">Change profile pic</p>

        <div class="visible">
            <i class="fa-solid fa-circle-exclamation"></i>
            <small>error message</small>
        </div>

        <form method="post" enctype="multipart/form-data" class="file_form"  id="change_pic">

            <label for="file" class="file_label" id="file_label">

                <div class="file_h">
                    <i class="fa-regular fa-image"></i>
                    <p id="file_name" class="file_name">Select Image</p>
                </div>
                <input type="file" name="file" id="file" class="file">
            </label>
            <br>

            <button type="submit" class="save" >Submit</button>

        </form>

    </div>
<script src="<?=ROOT?>/assets/change_pic.js"></script>