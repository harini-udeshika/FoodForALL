<div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">
        <div class="user-info">
            <?php $image = "./images/user_icon.png" ?>
            <?php if (Auth::getusertype() == 'reg_user') : ?>
                <?php
                $user = new User();
                $data = $user->where('id', Auth::getid());
                $data = $data[0];
                if ($data->profile_pic) {
                    $image = $data->profile_pic;
                } ?>

                <img src=<?= $image ?> alt="">
                <p>Hello
                    <?php echo $data->first_name ?> !
                </p>
        </div>
        <hr>
        <a href="profile" class="sub-menu-link">
            <i class="fa-solid fa-user"></i>
            <p>View profile </p>
            <span>></span>
        </a>
        <a href="requests" class="sub-menu-link">
            <i class="fa-solid fa-handshake-angle"></i>
            <p>My requests</p>
            <span>></span>
        </a>
        <a href="order_history" class="sub-menu-link">
            <i class="fa-sharp fa-solid fa-bag-shopping"></i>
            <p>My Orders</p>
            <span>></span>
        </a>
        <a href="edit_profile" class="sub-menu-link">
            <i class="fa-solid fa-pen-to-square"></i>
            <p>Edit profile </p>
            <span>></span>
        </a>

        <a href="logout" class="sub-menu-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Log out </p>
            <span>></span>
        </a>
    <?php endif ?>
    <?php if (Auth::getusertype() == 'admin') : ?>
        <?php

        $admin = new Admins();
        $data = $admin->where('email', Auth::getemail());
        $data = $data[0];
        if (($data->profile_pic)) {
            $image = $data->profile_pic;
        } ?>
        <img src=<?= $image ?> alt="">
        <p>Hello FoodForALL!</p>
    </div>
    <hr>
    <!-- <a href="profile" class="sub-menu-link">
        <i class="fa-solid fa-user"></i>
        <p>Statistics</p>
        <span>></span>
    </a> -->
    <a href="current_password" class="sub-menu-link">
        <i class="fa-solid fa-pen-to-square"></i>
        <p>Edit profile</p>
        <span>></span>
    </a>
    <a href="<?=ROOT?>/logout" class="sub-menu-link">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p>Log out</p>
        <span>></span>
    </a>

<?php endif ?>

<?php if (Auth::getusertype() == 'organization') : ?>
    <?php
    $org = new Organization();
    $data = $org->where('id', Auth::getid());
    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
        // $image2 = "./images/user_icon.png";
    } ?>

    <img src="<?php echo $image ?>" alt="">
    <p>Hello <?php echo $data->name ?> !</p>
</div>
<hr>
<a href="edit_org_profile" class="sub-menu-link">
    <i class="fa-solid fa-user"></i>
    <p>View profile</p>
    <span>></span>
</a>
<a href="reply_reviews" class="sub-menu-link">
    <i class="fa-regular fa-comment"></i>
    <p>Reviews</p>
    <span>></span>
</a>
<a href="org_order_history" class="sub-menu-link">
    <i class="fa-sharp fa-solid fa-bag-shopping"></i>
    <p>Orders History</p>
    <span>></span>
</a>
<a href="change_password" class="sub-menu-link">
    <i class="fa-solid fa-pen-to-square"></i>
    <p>Change Password</p>
    <span>></span>
</a>
<a href="logout" class="sub-menu-link">
    <i class="fa-solid fa-right-from-bracket"></i>
    <p>Log out</p>
    <span>></span>
</a>

<?php endif ?>


<!-- Areacoordinator's submenue -->

<?php if (Auth::getusertype() == 'area_coordinator') : ?>
    <?php
    $areacoordinator = new AreaCoordinator();
    $data = $areacoordinator->where('email', Auth::getemail());
    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    } ?>
    <img src=<?= $image ?> alt="">
    <p>Hello <?php echo $data->name ?> !</p>
    </div>
    <hr>
    <a href="edit_area_profile" class="sub-menu-link">
        <i class="fa-solid fa-user" style="color:#7681BF"></i>
        <p>View profile</p>
        <span>></span>
    </a>
    <a href="edit_area_password" class="sub-menu-link">
        <i class="fa-solid fa-key" style="color:#7681BF"></i>
        <p>Change password</p>
        <span>></span>
    </a>
    <a href="logout" class="sub-menu-link">
        <i class="fa-solid fa-right-from-bracket" style="color:#7681BF"></i>
        <p>Log out</p>
        <span>></span>
    </a>
<?php endif ?>


<!-- Eventmanager's submenue -->
<?php if (Auth::getusertype() == 'eventmanager') : ?>
    <?php
    $eventmanager = new EventManager();
    $data = $eventmanager->where('email', Auth::getemail());
    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    } ?>
    <img src=<?= $image ?> alt="">
    <p>Hello <?php echo $data->full_name ?> !</p>
    </div>
    <hr>
    <a href="profile_eventmanager" class="sub-menu-link">
        <i class="fa-solid fa-user"></i>
        <p>View profile</p>
        <span>></span>
    </a>
    <a href="profile_eventmanager" class="sub-menu-link">
        <i class="fa-solid fa-pen-to-square"></i>
        <p>Edit profile</p>
        <span>></span>
    </a>
    <a href="logout" class="sub-menu-link">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p>Log out</p>
        <span>></span>
    </a>
<?php endif ?>
</div>
</div>


</div>