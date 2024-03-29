<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.main.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.home.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<body>
    <div id="root" style="display: none;"><?=ROOT?></div>
    <div class="main-cont">
        <div class="sidebar">
            <!-- <div class="sidebar_item" data-param="dashboard" data-subpages="" data-search_url="" id="sidebar_item-1">Dashboard</div> -->

            <div class="sidebar_item" data-param="upcoming" data-subpages="" data-search_url="<?= ROOT ?>/admin/searchEvent" id="sidebar_item-1">Upcoming Events</div>

            <div class="sidebar_item" data-param="completed" data-subpages="" data-search_url="<?= ROOT ?>/admin/searchEvent" id="sidebar_item-2">Completed Events</div>

            <!-- <div class="sidebar_item" data-param="upcoming, completed,coffee" data-subpages="Upcoming Events, Completed Events,coffee" data-search_url="<?= ROOT ?>" id="sidebar_item-3">Area coordinators</div> -->

            <div class="sidebar_item" data-param="Search" data-subpages="none" id="sidebar_item-100">Search</div>
        </div>

        <div class="content" id="content_div">
            <div class="page_loader">
                <div class="loader"></div>
            </div>

            <!-- page title -->
            <div class="title_bar">
                <div id="page_heading">
                    <span class="w-bold" id="title_span"></span>
                </div>
                <div id="sub_pages">
                    <!-- <div class="sub_page_item subpage_active">item 1</div> -->
                    <!-- <div class="sub_page_item">item 2</div> -->
                </div>
            </div>

            <div class="content_data grid-12" id="content_data"></div>
        </div>

        <div class="sidebar s-right" style="float:right;">
            <!-- Search bar -->
            <div class="blank col-lg-2"></div>

            <div class="col-lg-8 ">
                <input class="search-field width-100" type="text" name="search_term" id="search_input_div" placeholder="Search here by name">

                <div class="" id="result_div">
                    <!-- <div class="text-r-1">the result</div> -->
                </div>
            </div>

            <div class="blank col-lg-2"></div>
            <!-- END : Search bar -->
        </div>
    </div>
    <style>
        .loader {
            top: 50%;
            left: calc(50% - 25px);
            border: 5px solid #ddd;
            border-top: 5px solid var(--projectGreen);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;

            position: absolute;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .page_loader {
            margin-top: var(--titlebar_height);
            z-index: 1005;
            width: calc(100vw - var(--sidebarWidth_left) - var(--sidebarWidth_right));
            height: calc(100vh - var(--titlebar_height) - 4.5rem);
            background-color: rgba(255, 255, 255, 0.6);
            position: fixed;
            display: flex;

            visibility: hidden;
        }
    </style>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src=" <?= ROOT ?>/assets/admin.main.js"></script>
<script src=" <?= ROOT ?>/assets/navbar.js"></script>
<script src=" <?= ROOT ?>/assets/submenu.js"></script>
<script src=" <?= ROOT ?>/assets/dropdown.js"></script>