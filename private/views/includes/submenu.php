<div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">
        <div class="user-info">
            <?php $image = "./images/user_icon.png"?>
            <?php if (Auth::getusertype() == 'reg_user'): ?>
            <?php
$user = new User();
$data = $user->where('id', Auth::getid());
$data = $data[0];
if ($data->profile_pic) {
    $image = $data->profile_pic;
}?>

            <img src=<?=$image?> alt="">
            <p>Hello
                <?php echo $data->first_name ?> !
            </p>
        </div>
        <hr>
        <a href="profile" class="sub-menu-link">
            <i class="fa-solid fa-user"></i>
            <p>View profile</p>
            <span>></span>
        </a>
        <a href="edit_profile" class="sub-menu-link">
            <i class="fa-solid fa-pen-to-square"></i>
            <p>Edit profile</p>
            <span>></span>
        </a>
        <a href="logout" class="sub-menu-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Log out</p>
            <span>></span>
        </a>
        <?php endif?>
        <?php if (Auth::getusertype() == 'admin'): ?>
        <?php

$admin = new Admins();
$data = $admin->where('email', Auth::getemail());
$data = $data[0];
if (($data->profile_pic)) {
    $image = $data->profile_pic;
}?>
        <img src=<?=$image?> alt="">
        <p>Hello FoodForALL!</p>
    </div>
    <hr>
    <a href="profile" class="sub-menu-link">
        <i class="fa-solid fa-user"></i>
        <p>Statistics</p>
        <span>></span>
    </a>
    <a href="edit_profile" class="sub-menu-link">
        <i class="fa-solid fa-pen-to-square"></i>
        <p>Edit profile</p>
        <span>></span>
    </a>
    <a href="logout" class="sub-menu-link">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p>Log out</p>
        <span>></span>
    </a>

    <?php endif?>

    <?php if (Auth::getusertype() == 'organization'): ?>
    <?php
$org = new Organization();
$data = $org->where('id', Auth::getid());
$data = $data[0];
if ($data->profile_pic) {
    $image = $data->profile_pic;
    // $image2 = "./images/user_icon.png";
}?>

                         <img src="<?php echo $image?>"alt="">
                         <p>Hello <?php echo $data->name ?> !</p>
                        </div>
                    <hr>
                    <a href="edit_org_profile" class="sub-menu-link">
                        <i class="fa-solid fa-user"></i>
                        <p>View profile</p>
                        <span>></span>
                    </a>
                    <a href="" class="sub-menu-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="logout" class="sub-menu-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Log out</p>
                        <span>></span>
                    </a>

<?php endif?>


<!-- Areacoordinator's submenue -->
<?php if (Auth::getusertype() == 'areacoordinator'): ?>
<?php
$areacoordinator = new AreaCoordinator();
$data = $areacoordinator->where('email', Auth::getemail());
$data = $data[0];
if ($data->profile_pic) {
    $image = $data->profile_pic;
}?>
                         <img src=<?=$image?> alt="">
                         <p>Hello <?php echo $data->name ?> !</p>
                        </div>
                    <hr>
                    <a href="edit_area_profile" class="sub-menu-link">
                        <i class="fa-solid fa-user"></i>
                        <p>View profile</p>
                        <span>></span>
                    </a>
                    <a href="edit_profile" class="sub-menu-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="logout" class="sub-menu-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Log out</p>
                        <span>></span>
                    </a>
<?php endif?>

<!-- Eventmanager's submenue -->
<?php if (Auth::getusertype() == 'eventmanager'): ?>
<?php
$eventmanager = new EventManager();
$data = $eventmanager->where('email', Auth::getemail());
$data = $data[0];
if ($data->profile_pic) {
    $image = $data->profile_pic;
}?>
                         <img src=<?=$image?> alt="">
                         <p>Hello <?php echo $data->full_name ?> !</p>
                        </div>
                    <hr>
                    <a href="profile_eventmanager" class="sub-menu-link">
                        <i class="fa-solid fa-user"></i>
                        <p>View profile</p>
                        <span>></span>
                    </a>
                    <a href="edit_profile" class="sub-menu-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="logout" class="sub-menu-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Log out</p>
                        <span>></span>
                    </a>
<?php endif?>
</div>
</div>


</div>