<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/submenu.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/navbar2.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/footer.css">
    <script src="https://kit.fontawesome.com/1a2c8fa8df.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.home.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<!-- nav start -->
<nav class="navbar">

    <div class="left">
        <div class="nav-i-logo">
            <img src="<?= ROOT ?>/images/logo.png" alt="" class="nav-logo">
        </div>
    </div>
    <div class="right">

        <?php if (!Auth::logged_in()) : ?>
            <div class="nav-i">
                <a href="homepage">Home</a>
            </div>
            <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
            <div class="nav-i">
                <a href="login">Organizations</a>
            </div>
            <div class="nav-i">
                <a href="login">Events</a>
            </div>
            <div class="nav-i">
                <a href="about">About us</a>
            </div>

            <div class="nav-i">
                <a href="login">Login/Sign in</a>
            </div>
        <?php endif ?>
        <?php if (Auth::getusertype() == 'reg_user') : ?>
            <div class="up">
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
                    <a href="about">About us</a>
                </div>
            </div>
            <div class="down">
                <div class="nav-i">
                    <a href="search"><span class="material-symbols-outlined">person_search</span></a>
                </div>


                <?php
                $user = new User();
                $data = $user->where('id', Auth::getid());
                $data = $data[0];

                ?>
                <?php if ($data->newsletter_status == 0) : ?>
                    <div class="nav-i">
                        <span class="material-symbols-outlined">
                            notifications
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ($data->newsletter_status == 1) : ?>
                    <div class="nav-i">
                        <span class="material-symbols-outlined">
                            notifications_active
                        </span>

                    <?php endif; ?>
                    </div>
                    <div class="nav-i">
                        <a href="charts"><i class="fa-solid fa-chart-line"></i></a>
                    </div>
                    <div class="nav-i">
                        <a href="leaderboard"><i class="fa-solid fa-crown"></i></a>
                    </div>

                <?php endif ?>
                <?php if (Auth::getusertype() == 'admin') : ?>
                    <div class="nav-i">
                        <a href="<?= ROOT ?>/admin/home">Home</a>
                    </div>
                    <!-- <div class="nav-i">
                <a href="">Donate/Volunteer</a>
            </div> -->
                    <div class="nav-i">
                        <a href="<?= ROOT ?>/admin_events">Events</a>
                    </div>
                    <div class="nav-i">
                        <a href="<?= ROOT ?>/Admin_search_org">Organizations</a>
                    </div>
                    <div class="nav-i">
                        <a href="<?= ROOT ?>/Admin_search_areacoords">Area Coordinators</a>
                    </div>
                    <div class="nav-i">
                        <a href="<?= ROOT ?>/Admin_search_users">Users</a>
                    </div>
                <?php endif ?>


                <?php if (Auth::getusertype() == 'organization') : ?>
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
                <?php endif ?>

                <?php if (Auth::getusertype() == 'area_coordinator') : ?>
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
                        <a href="about">About us</a>
                    </div>
                <?php endif ?>

                <?php if (Auth::getusertype() == 'eventmanager') : ?>
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
                <?php endif ?>

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
                    <img src="<?= $image ?>" alt="" class="nav-user-icon" id="nav-user-icon" onclick="toggleMenu()">
                </div>
            </div>
    </div>
    <!-- ----------------sub menu-------------- -->



</nav>
<!-- nav start:end -->

<!-- submenu start -->
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
        <i class="fa-solid fa-user"></i>
        <p>View profile</p>
        <span>></span>
    </a>
    <a href="edit_area_profile" class="sub-menu-link">
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
<!-- submenu start:END -->


<div class="container">
    <div class="heading-1 col-12">Dashboard</div>

    <div class="blank col-lg-1"></div>
    <div class="heading-2 col-10" style="padding-bottom:10px;">Site status</div>
    <div class="blank col-lg-1"></div>

    <div class="blank col-lg-1"></div>
    <div class="col-lg-10 grid-8">
        <div class="status-card card col-lg-2">
            <div class="head-1">Ongoing Events</div>
            <div class="head-2"><?= $site_data['month'] ?></div>
            <div class="status-text"><?= $site_data['ongoing_events'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Completed Events</div>
            <div class="head-2"><?= $site_data['month'] ?></div>
            <div class="status-text"><?= $site_data['completed_events'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Reg. Organizations</div>
            <div class="head-2 hidden">Month</div>
            <div class="status-text"><?= $site_data['organizations'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Registered Users</div>
            <div class="head-2 hidden">Month</div>
            <div class="status-text"><?= $site_data['users'] ?></div>
        </div>
    </div>
    <div class="blank col-lg-1"></div>

    <!-- second section -->
    <div class="blank col-lg-1"></div>
    <div class="card col-lg-4 m-top-40" style="overflow: hidden;">
        <div class="head-donate head-1 m-bottom-20 txt-black">Donations</div>
        <div class="txt-10 w-semibold txt-al-center p-top-10"><?= $site_data['month'] ?> - <?= $site_data['year'] ?></div>
        <div class="donate-icon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="w-black txt-al-center m-top-60 txt-20"><?= $site_data['donations'] ?> LKR</div>
        <div class="w-semibold txt-al-center m-top-40 m-bottom-20 txt-08">*Last update - <?= $site_data['update_time'] ?></div>
    </div>
    <div class="card col-lg-6 p-20 m-top-40">
        <div class="head-chart1 head-1 p-bottom-10 txt-black">Most donated sites - <?= $site_data['month'] ?> <?= $site_data['year'] ?></div>
        <canvas id="myChart" class="m-top-10" style="max-height: 300px;"></canvas>
    </div>

    <div class="blank col-lg-1"></div>


    <div class="blank col-lg-1"></div>
    <div class="card p-20 col-lg-10 m-top-40 grid-8">
        <canvas class="col-lg-5" id="mychart2"></canvas>
        <div class="col-lg-3"></div>
    </div>
    <div class="blank col-lg-1"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx1 = document.getElementById('myChart');
    const ctx2 = document.getElementById('mychart2');

    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($site_data['chart_1'] as $org) : ?>
                    <?= "'" . $org->name . "'," ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                data: [
                    <?php foreach ($site_data['chart_1'] as $org) : ?>
                        <?= $org->total_donations . "," ?>
                    <?php endforeach; ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        legend: {
            display: true,
            position: 'right',
        }
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($site_data['chart_2'] as $month => $amount) : ?>
                    <?= "'" . $month . "'," ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php foreach ($site_data['chart_2'] as $month => $amount) : ?>
                        <?= $amount . "," ?>
                    <?php endforeach; ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        legend: {
            display: false,
            position: 'right',
        }
    });
</script>


<footer class="footer">
    <p class='form-footer'>Copyright &copy 2022 FoodForALL</p>
</footer>
</body>

<script src=" <?= ROOT ?>/assets/navbar.js"></script>
<script src=" <?= ROOT ?>/assets/submenu.js"></script>
<script src=" <?= ROOT ?>/assets/dropdown.js"></script>

</html>