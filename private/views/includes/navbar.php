<nav class="navbar">

    <div class="left">
        <div class="nav-i-logo">
            <img src="<?=ROOT?>/images/logo.png" alt="" class="nav-logo">
        </div>
    </div>
    <div class="right">

        <?php if (!Auth::logged_in()): ?>
        <div class="nav-i">
            <a href="homepage">Home</a>
        </div>
        <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
        <div class="nav-i">
            <a href="search_org">Organizations</a>
        </div>
        <div class="nav-i">
            <a href="events">Events</a>
        </div>
        <div class="nav-i">
            <a href="about">About us</a>
        </div>

        <div class="nav-i">
            <a href="login">Login/Sign in</a>
        </div>
        <?php endif?>
        <?php if (Auth::getusertype() == 'reg_user'): ?>

        <div class="nav-i">
            <a href="homepage">Home</a>
        </div>
        <div class="nav-i">
            <a href="./search_org">Organizations</a>
        </div>
        <div class="nav-i">
            <a href="./events">Events</a>
        </div>
        <div class="nav-i">
            <a href="about">About us</a>
        </div>
        <div class="nav-i">
            <a href="search"><span class="material-symbols-outlined">person_search</span></a>
        </div>


        <?php
$user = new User();
$data = $user->where('id', Auth::getid());
$data = $data[0];

?>
        <?php if ($data->newsletter_status == 0): ?>
        <div class="nav-i">
            <span class="material-symbols-outlined">
                notifications
            </span>
        </div>
       
        <?php endif;?>

        <?php if ($data->newsletter_status == 1): ?>
        <div class="nav-i">
            <span class="material-symbols-outlined">
                notifications_active
            </span>
        </div>
            <?php endif;?>
        
        <div class="nav-i">
            <a href="charts"><i class="fa-solid fa-chart-line"></i></a>
        </div>
        <div class="nav-i">
            <a href="leaderboard"><i class="fa-solid fa-crown"></i></a>
        </div>

        <?php endif?>
        <?php if (Auth::getusertype() == 'admin'): ?>
        <div class="nav-i">
            <a href="<?=ROOT?>/admin/home">Home</a>
        </div>
        <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
        <div class="nav-i">
            <a href="<?=ROOT?>/admin_events">Events</a>
        </div>
        <div class="nav-i">
            <a href="<?=ROOT?>/Admin_search_org">Organizations</a>
        </div>
        <div class="nav-i">
            <a href="<?=ROOT?>/Admin_search_areacoords">Area Coordinators</a>
        </div>
        <div class="nav-i">
            <a href="<?=ROOT?>/Admin_search_users">Users</a>
        </div>
        <?php endif?>


        <?php if (Auth::getusertype() == 'organization'): ?>
        <div class="nav-i">
            <a href="home_org">Home</a>
        </div>
        <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
        <div class="nav-i">
            <a href="./shop_org">Shop</a>
        </div>
        <div class="nav-i">
            <a href="./Org_admin_events">Events</a>
        </div>
        <div class="nav-i">
            <a href="./add_managers">Managers</a>
        </div>
        <div class="nav-i">
            <a href="./Org_packages">Packages</a>
        </div>
        <?php endif?>

        <?php if (Auth::getusertype() == 'area_coordinator'): ?>
        <div class="nav-i">
            <a href="./area_coordinator_home">Home</a>
        </div>
        <div class="nav-i">
        <a href="./areacoordinator_events">Events</a>
        </div>
        <div class="nav-i">

            <div class="dropdown">
                <a onclick="myFunction()" class="dropbtn">Add details</a>
                <div id="myDropdown" class="dropdown-content">
                    <a class="udrop" href="./familytable">Families' Details</a>
                    <a class="udrop" href="./eldertable">Elders' Home Details</a>
                    <a class="udrop" href="./childrentable">Children's Home Details</a>
                </div>
            </div>
        </div>

        <div class="nav-i">
            <a href="about">About us</a>
        </div>
        <?php endif?>

        <?php if (Auth::getusertype() == 'eventmanager'): ?>
        <div class="nav-i">
            <a href="./event_manager_home">Home</a>
        </div>

        <div class="nav-i">
            <a href="./eventmanager_events">Events</a>
        </div>
        <div class="nav-i">

            <a href="./eventmanager_myevents">My Events</a>

        </div>

        <div class="nav-i">
            <a href="about">About us</a>
        </div>
        <?php endif?>

        <div class="nav-i">
            <?php

$image = ROOT . '/images/user_icon.png';
if (Auth::getusertype() == 'reg_user') {
    $user = new User();
    $data = $user->where('id', Auth::getid());
    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}
if (Auth::getusertype() == 'admin') {
    $admin = new Admins();
    $data = $admin->where('email', Auth::getemail());

    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}
if (Auth::getusertype() == 'organization') {
    $user = new Organization();
    $data = $user->where('id', Auth::getid());
    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}

if (Auth::getusertype() == 'area_coordinator') {
    $areacoordinator = new AreaCoordinator();
    $data = $areacoordinator->where('email', Auth::getemail());

    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}

if (Auth::getusertype() == 'eventmanager') {
    $eventmanager = new EventManager();
    $data = $eventmanager->where('email', Auth::getemail());

    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}

?>
            <img src="<?=$image?>" alt="" class="nav-user-icon" id="nav-user-icon" onclick="toggleMenu()">
        </div>
    </div>
    
    <!-- ----------------sub menu-------------- -->



</nav>