<?php

use function PHPSTORM_META\type;

$this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/user_profile.css">

<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<div class="intro">
    <div class="profile_pic">
        <?php

$image = "./images/user_icon.png";
if (file_exists($rows->profile_pic)) {
    $image = $rows->profile_pic;
}
?>
        <img src=" <?php echo $image ?>" alt="" class="user-pic">
    </div>
    <div class="details">
        <p class="pro-name">
            <?=$rows->first_name?>
            <?=$rows->last_name?>
        </p>
        <p class="hometown">
            <?=$rows->city?>
        </p>
        <a href="#certificates">Certificates</a>
        <a href="#activities">Volunteering</a>
        <a href="#donations">Donations</a>
    </div>
    <!-- <div class="button">
            <a class="edit_profile_btn" href="<?=ROOT?>/edit_profile">Edit Profile</a>
            <a class="edit_profile_btn" href="<?=ROOT?>/logout">Log out</a>
        </div> -->
</div>
<div class="certificate_section" id="certificates">
    <div class="heading_certificates">
        <p>Volunteering Certificates</p>
        <?php if (Auth::getid() == $rows->id): ?>
        <button id="add">Add +</button>

    </div>
    <div class="change_pic visible" id="cert">

        <p class="heading"><b>Upload Certificates to display</b></p>

        <div class="visible">
            <i class="fa-solid fa-circle-exclamation"></i>
            <small>error message</small>
        </div>

        <form method="post" enctype="multipart/form-data" class="file_form" id="change_cert">

            <label for="file" class="file_label" id="file_label">

                <div class="file_h">
                    <i class="fa-regular fa-image"></i>
                    <p id="file_name" class="file_name">Certificate</p>
                </div>
                <input type="file" name="file" id="file" class="file">
            </label>
            <br>
            <div class="select"> 
                <!-- <label for="event">Select the event:</label> -->

                <select name="event" id="event">
                    <option value="select">Select the event</option>
                    <?php $i = 0;?>
                    <?php if ($select): ?>
                    <?php foreach ($select as $data): ?>
                    <option value="<?=$select[$i]->event_id?>"><?=$select[$i]->name?></option>
                    <?php $i++?>
                    <?php endforeach?>
                    <?php endif ?>
                </select>
            </div>
            <textarea name="description" placeholder="Write your thoughts" class="form_text"></textarea>
            <button type="submit" class="save">Submit</button>

        </form>

    </div>
    <?php endif?>
    <div class="certificates">

        <div class="certificates_row">
            <?php $i = 0;?>
            <?php if ($cert): ?>

            <?php
//print_r($rows);?>
            <?php foreach ($cert as $value): ?>

            <?php if ($i % 2 == 0 && $i != 0): ?>
        </div>
        <div class="certificates_row">
            <?php endif?>
           
            <div>
            <div class="cert_del_confirm visible">
                <span>Are you sure you want to delete?</span>
                <a href="<?=ROOT?>/profile?delete=<?=$cert[$i]->id?>"><button>Delete</button></a>
            </div>
                <?php if (Auth::getid() == $rows->id): ?>
                <a class="cert_del"><i class="fa-solid fa-trash fa-xl"></i></a>
                <?php endif; ?>

                <div class="des">
                    <img src="<?=$cert[$i]->profile_pic?>">
                    <div class="cert_details">
                    <span class="main"><?=$cert[$i]->name?> organized by <?=$cert[$i]->org_name?></span>
                    <br><span>held on <?=$cert[$i]->date?></span>
                <?php if ($cert[$i]->description): ?>
                        <span><?=$cert[$i]->description?></span>
                        
                    <?php endif?>
                    <br>
                    <a href="profile?cert_id=<?=$cert[$i]->id?>">Show credential &nbsp;&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                       
                </div>
            </div>
            <?php $i++;
// echo ($i); ?>

            <?php endforeach;?>
            <?php endif?>
            <?php if (!$cert && Auth::getid() == $rows->id): ?>
            <div class="no_cert"><i class="fa-solid fa-file-lines fa-xl"></i>&nbsp;&nbsp;&nbsp;&nbsp;Display
                volunteering certificates here!</div>
            <?php endif?>
            <?php if (!$cert && Auth::getid() != $rows->id): ?>
            <div class="no_cert"><i class="fa-solid fa-file-lines fa-xl"></i>&nbsp;&nbsp;&nbsp;&nbsp;No certificates to
                display.</div>
            <?php endif?>
        </div>
    </div>
</div>
</div>
<div class="activities_section" id="activities">
    <div class="heading_activities">
        <p>Recent Activities</p>
    </div>
    <?php if (!$event_data): ?>
    <div class="no_cert"><i class="fa-solid fa-chart-line fa-xl"></i>&nbsp;&nbsp;&nbsp;<p>No activities yet!
        <p>
    </div>
    <?php endif;?>
    <?php if ($event_data): ?>
    <div class="scroll">
        <table>
            <tr class="table_headings">
                <th>Event</th>
                <th>Organization</th>
                <th>Role</th>
                <th>Date</th>
            </tr>
            <?php
$i = 0;?>





            <?php foreach ($event_data as $value): ?>

            <tr class="table_row ">

                <td><?=$event_data[$i]->name?></td>
                <td><?=$org_name[$i]->name?></td>
                <td><?=$event_data[$i]->volunteer_type?></td>
                <td><?=$event_data[$i]->date?></td>
            </tr>
            <?php $i++;?>



            <?php endforeach;?>

            <?php endif?>

        </table>
    </div>
</div>
<div class="donation_section" id="donations">
    <div class="heading_activities">
        <p>Recent Donations</p>
    </div>
    <?php if (!$donor_data): ?>
    <div class="no_cert"><i class="fa-solid fa-sack-dollar fa-xl"></i>
        <p>&nbsp;&nbsp;&nbsp;No donations yet
        <p>
    </div>
    <?php endif;?>

    <?php if ($donor_data): ?>
    <div class="scroll">
        <table>
            <tr class="table_headings">
                <th>Date</th>
                <th>Organization</th>
                <th>Event</th>
                <th>Amount</th>
            </tr>
            <?php
$i = 0;?>



            <?php foreach ($donor_data as $value): ?>
            <tr class="table_row">

                <td><?=substr($donor_data[$i]->date_time, 0, -8)?></td>
                <td><?=$d_org_name[$i]->name?></td>
                <td><?=$d_org_name[$i]->e_name?></td>
                <td><?=$donor_data[$i]->amount?></td>

            </tr>
            <?php $i++;
//  echo ($i); ?>

            <?php endforeach;?>
            <?php endif?>
        </table>
    </div>
</div>

<div class="end_section">
    <div class="summary">
        <div class="text">
            Total Donated Amount
        </div>
        <div class="amount">
            <?php if ($tot_amount[0]->total): ?>
            <?=$tot_amount[0]->total?>
            <?php endif?>
            <?php if (!$tot_amount[0]->total): ?>
            0
            <?php endif?>

        </div>

    </div>
    <div class="summary">
        <div class="text">
            Total Volunteered Events
        </div>
        <div class="amount">
            <?=$tot_events[0]->count?>
        </div>
    </div>

</div>
<?php if (Auth::getid() == $rows->id): ?>
<div class="news">
    <p>Need more news? Subscribe to our news services right now!</p>
    <?php if ($rows->newsletter_status == 0): ?>
    <a href="http://localhost/food_for_all/public/profile?subscribe=1"><button>Subscribe</button></a>
    <?php endif;?>

    <?php if ($rows->newsletter_status == 1): ?>
    <button disabled>Subscribed</button>
    <?php endif;?>

</div>
<?php endif;?>
<!-- <div><a href="logout.php">Log out</a></div> -->

<!-- <p><a href="login.php">Log in</a>or <a href="../signup/signup.html">Signup</a></p> -->

<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/profile.js"></script>
<!-- <script src="<?=ROOT?>/assets/change_pic.js"></script> -->
<?php $this->view('includes/footer')?>