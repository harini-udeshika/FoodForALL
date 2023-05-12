<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.view.css">
</head>

<body>
    <div id="root_url" style="display: none;"><?= ROOT ?></div>
    <div class="main-cont">
        <div class="sidebar">
            <div class="sidebar_item" data-param="dashboard" data-subpages="" data-search_url="<?= ROOT ?>" id="sidebar_item-1">Dashboard</div>

            <div class="sidebar_item" data-param="upcoming, completed" data-subpages="Upcoming Events, Completed Events" data-search_url="<?= ROOT ?>" id="sidebar_item-1">Events</div>

            <div class="sidebar_item" data-param="upcoming" data-subpages="" data-search_url="<?= ROOT ?>" id="sidebar_item-2">Organizations</div>

            <div class="sidebar_item" data-param="upcoming, completed,coffee" data-subpages="Upcoming Events, Completed Events,coffee" data-search_url="<?= ROOT ?>" id="sidebar_item-3">Area coordinators</div>

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
</body>

<script src="<?= ROOT ?>/assets/script/admin.view.js"></script>
<script src=" <?= ROOT ?>/assets/navbar.js"></script>
<script src=" <?= ROOT ?>/assets/submenu.js"></script>
<script src=" <?= ROOT ?>/assets/dropdown.js"></script>