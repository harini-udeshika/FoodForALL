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
                <a href="">Organizations</a>
            </div>
            <div class="nav-i">
                <a href="./events">Events</a>
            </div>
            <div class="nav-i">
                <a href="">About us</a>
            </div>

            <div class="nav-i">
                <a href="login">Login/Sign in</a>
            </div>
            <?php endif ?>
            <?php if (Auth::getusertype() == 'reg_user'): ?>
            <div class="nav-i">
                <a href="homepage">Home</a>
            </div>
            <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
            <div class="nav-i">
                <a href="./search_org">Organizations</a>
            </div>
            <div class="nav-i">
                <a href="./events">Events</a>
            </div>
            <div class="nav-i">
                <a href="">About us</a>
            </div>



            <div class="nav-i">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="nav-i">
                <a href="leaderboard"><i class="fa-solid fa-crown"></i></a>

            </div>
        <?php endif?>
        <?php if (Auth::getusertype() == 'admin'): ?>
            <div class="nav-i">
                <a href="<?=ROOT?>/homepage">Home</a>
            </div>
            <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
            <div class="nav-i">
                <a href="<?=ROOT?>/admin_events">Events</a>
            </div>
            <div class="nav-i">
                <a href="<?=ROOT?>/Add_areacoordinator">Add Area Coordinators</a>
            </div>
            <div class="nav-i">
                <a href="<?=ROOT?>/Admin_search_org">Organizations</a>
            </div>
            <div class="nav-i">
                <a href="">Area Coordinators</a>
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
                <a href="">Packages</a>
            </div>
        <?php endif?>

            <div class="nav-i">
            <?php

$image = ROOT.'/images/user_icon.png';
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


?>
                <img src="<?=$image?>" alt="" class="nav-user-icon" id="nav-user-icon" onclick="toggleMenu()">
            </div>
        </div>
        <!-- ----------------sub menu-------------- -->


     
    </nav>