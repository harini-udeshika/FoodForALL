<nav class="navbar">

        <div class="left">
            <div class="nav-i-logo">
                <img src="./images/logo.png" alt="" class="nav-logo">
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
                <i class="fa-solid fa-crown"></i>

            </div>
        <?php endif?>
        <?php if (Auth::getusertype() == 'admin'): ?>
            <div class="nav-i">
                <a href="homepage">Home</a>
            </div>
            <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
            <div class="nav-i">
                <a href="admin_events">Events</a>
            </div>
            <div class="nav-i">
                <a href="Add_areacoordinator">Add Area Coordinators</a>
            </div>
            <div class="nav-i">
                <a href="Admin_search_org">Organizations</a>
            </div>
            <div class="nav-i">
                <a href="">Area Coordinators</a>
            </div>
            <div class="nav-i">
                <a href="Admin_search_users">Users</a>
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
                <a href="./Add_event">Events</a>
            </div>
            <div class="nav-i">
                <a href="./add_managers">Managers</a>
            </div>
            <div class="nav-i">
                <a href="">Packages</a>
            </div>
        <?php endif?>

        <?php if (Auth::getusertype() == 'areacoordinator'): ?>
            <div class="nav-i">
                <a href="./area_coordinator_home">Home</a>
            </div>
            <div class="nav-i">
                <a href="./events">Events</a>
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
                <a href="">About us</a>
            </div>
        <?php endif?>

        <?php if (Auth::getusertype() == 'eventmanager'): ?>
            <div class="nav-i">
                <a href="./event_manager_home">Home</a>
            </div>

            <div class="nav-i">    

                <div class="dropdown">
                <a onclick="myFunction()" class="dropbtn">Doonee details</a>
                <div id="myDropdown" class="dropdown-content">
                    <a class="udrop" href="./familytable_EM">Families' Details</a>
                    <a class="udrop" href="./eldertable_EM">Elders' Home Details</a>
                    <a class="udrop" href="./childrentable_EM">Children's Home Details</a>
                </div>
            </div>
            </div>
            <div class="nav-i">
                <a href="">My Events</a>
            </div>
            
            <div class="nav-i">
                <a href="">About us</a>
            </div>
        <?php endif?>

            <div class="nav-i">
            <?php

$image = "./images/user_icon.png";
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

if (Auth::getusertype() == 'areacoordinator') {
    $areacoordinator = new AreaCoordinator();
    $data = $areacoordinator->where('email', Auth::getemail());

    $data = $data[0];
    if ($data->profile_pic) {
        $image = $data->profile_pic;
    }
}

if (Auth::getusertype() == 'eventmanager') {
    $eventmanager= new EventManager();
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