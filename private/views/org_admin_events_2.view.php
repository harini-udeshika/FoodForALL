<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<style>
    /* .main-cont {} */
    :root {
        --sidebarWidth_left: 250px;
        --sidebarWidth_right: 300px;
        --titlebar_height: 88px;
    }

    .sidebar {
        position: fixed;
        width: var(--sidebarWidth_left);
        min-height: 100vh;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
        transition: left 0.2s;
        padding: 15px;
        padding-top: 30px;
        overflow-x: hidden;
    }

    .s-right {
        background-color: white;
        border-left: 1px solid rgba(0, 0, 0, 0.2);
        width: var(--sidebarWidth_right);
        right: 0;
    }

    .title_bar {
        width: 100%;
        height: var(--titlebar_height);
        font-weight: 600;
        /* padding: 30px; */
    }

    .title_bar #page_heading {
        height: 40px;
        font-size: 1.4rem;
        padding: 12px 0px 0px 20px;
    }

    #sub_pages {
        height: calc(var(--titlebar_height) - 40px);
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }

    .sub_page_item {
        flex: 1;
        height: calc(var(--titlebar_height) - 40px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        font-size: 1rem;
        font-weight: 400;

        color: var(--projectGray);
        padding-bottom: 8px;
        display: flex;
        justify-content: center;
        flex-direction: row;
        align-items: flex-end;
    }

    .sub_page_item.active {
        font-weight: 600;
        color: black;
        border-bottom: 3px solid var(--projectGreen);
    }

    .sub_page_item_dead {
        flex: 1;
        height: calc(var(--titlebar_height) - 40px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        font-size: 1rem;
        font-weight: 400;

        color: var(--projectGray);
        padding-bottom: 8px;
    }

    .sub_page_item:hover {
        cursor: pointer;
    }

    .content {
        position: fixed;
        width: calc(100vw - var(--sidebarWidth_left) - var(--sidebarWidth_right));
        margin-left: var(--sidebarWidth_left);
    }

    .content_data {
        height: calc(100vh - var(--titlebar_height) - 4.5rem);
        background-color: #f1f1f1;
        padding: 20px;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar_item {
        width: 100%;
        height: 56px;
        background-color: white;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-top: none;

        font-size: 1rem;
        font-weight: 500;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sidebar_item.active {
        font-weight: 600;
        background-color: var(--projectGreen);
        color: white;
    }

    .sidebar_item.active:hover {
        background-color: var(--projectGreen);
    }

    .sidebar_item:first-of-type {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .sidebar_item:hover {
        background-color: #f9f9f9;
        cursor: pointer;
    }

    footer {
        position: fixed;
        bottom: 0;
    }

    #result_div {
        max-width: 600px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        border-radius: 50px;
        border-radius: 10px;
        padding: 10px 0px;
        height: fit-content;
        min-height: 50px;
        max-height: 450px;
        overflow-x: hidden;
        overflow-y: auto;
        visibility: hidden;
    }

    #search_input_div:focus~#result_div {
        visibility: visible;
    }

    .search_result {
        display: grid;
        grid-template-columns: repeat(12, 1fr);

        padding: 10px;
        /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
        width: 100%;
        height: 110px;
        transition: 0.4s;
    }

    .search_result:hover {
        cursor: pointer;
        background-color: #f1f1f1;
        /* box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1); */
    }

    .no_search_result {
        border: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 60px;
    }

    .text-r-1 {
        font-weight: 600;
        grid-column: span 12;
        height: 80px;
        background-color: #f1f1f1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .h-line {
        /* position: absolute; */
        margin-top: 26px;
        grid-column: span 12;
        height: 1px;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    /* hide search */
    #sidebar_item-100 {
        visibility: hidden;
    }

    /* small screen size */
    @media screen and (max-width: 768px) {
        #sidebar_item-100 {
            visibility: visible;
        }

        .s-right {
            visibility: hidden;
        }

        .content {
            position: fixed;
            width: calc(100vw - var(--sidebarWidth_left));
            margin-left: var(--sidebarWidth_left);
            /* padding: 20px; */
            /* padding-top: 30px; */
        }
    }
</style>
</head>

<body>
    <div class="main-cont">
        <div class="sidebar">
            <div class="sidebar_item" data-param="dashboard" data-subpages="" data-search_url="<?= ROOT ?>" id="sidebar_item-1">Dashboard</div>

            <div class="sidebar_item" data-param="upcoming, completed" data-subpages="Upcoming Events, Completed Events" data-search_url="<?= ROOT ?>/admin/searchEvent" id="sidebar_item-1">Events</div>

            <div class="sidebar_item" data-param="upcoming" data-subpages="" data-search_url="<?= ROOT ?>" id="sidebar_item-2">Upcoming Events</div>

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

            <div class="content_data grid-12" id="content_data">
                <div class="container col-12">
                    <div class="heading-1 col-12 ">Events</div>

                    <!-- Search bar -->
                    <div class="blank col-lg-2"></div>

                    <form class="col-lg-8 row-flex jf-center" action="" method="post" id="">
                        <input class="search-field width-100" type="text" name="search" id="search" placeholder="Search here" autocomplete="off">
                        <button type="submit" class="search_logo">
                            <i class="fa-solid fa-magnifying-glass "></i>
                        </button>

                    </form>


                    <div class="blank col-lg-2"></div>
                    <!-- END : Search bar -->

                    <div class="col-12 grid-12 " id="search_result">
                        <div class="blank col-3"></div>
                        <div class="col-6 grid-12 card-simple" style="max-height: 270px; overflow: auto;" id="dropdown">

                        </div>
                        <div class="blank col-3"></div>
                    </div>



                    <!-- statrt of pending events section -->
                    <!-- for spacing -->
                    <div class="blank col-lg-1"></div>

                    <!-- pending events card -->
                    <div class="events-card card event-holder col-lg-10 p-20 m-top-30 m-bottom-75 p-bottom-35 m-lr-auto">
                        <div class="heading-2 p-top-10">Pending Events</div>
                        <div class="event_scroll p-left-40 p-right-40">
                            <div class="grid-9">

                                <?php
                                $i = 0;
                                if ($pending) {
                                    $count = sizeof($pending);
                                    while ($count > 0) { ?>
                                        <!-- EVENT-PENDING -->
                                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $pending[$i]->name ?></div>

                                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $pending[$i]->thumbnail_pic ?>" alt="" srcset="">

                                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $pending[$i]->date ?></div>

                                            <!-- <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div> -->

                                            <div class="row-flex jf-btwn">
                                                <a href="<?= ROOT ?>/Org_admin_events/delete_pending?id=<?= $pending[$i]->event_id ?>">
                                                    <button class="btn btn-gray btn-xsm m-top-30">Remove</button>
                                                </a>
                                                <a href="">
                                                    <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                                                </a>

                                            </div>
                                        </div>
                                        <!--end of EVENT-PENDING -->

                                    <?php $count--;
                                        $i++;
                                    }
                                } else { ?>
                                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Pending Events</div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- for spacing -->
                    <div class="blank col-lg-1"></div>

                    <!-- End of pending events section -->

                    <!-- statrt of ongoing events section -->
                    <!-- for spacing -->
                    <div class="blank col-lg-1"></div>

                    <!-- ongoing events card -->
                    <div class="events-card card event-holder col-lg-10 p-20 p-bottom-35 m-lr-auto">
                        <div class="heading-2 p-top-10">Ongoing Events</div>
                        <div class="event_scroll p-left-40 p-right-40">
                            <div class="grid-9">

                                <?php
                                $i = 0;
                                if ($ongoin) {
                                    $count = sizeof($ongoin);
                                    while ($count > 0) { ?>
                                        <!-- EVENT-ONGOING -->
                                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                                            <div class="heading-event txt-al-center m-top-4 m-bottom-4"><?php echo $ongoin[$i]->name ?></div>

                                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $ongoin[$i]->thumbnail_pic ?>" alt="" srcset="">

                                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $ongoin[$i]->date ?></div>

                                            <div class="m-top-10">
                                                <div class="row-flex jf-btwn">
                                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Donations</div>

                                                    <div class="row-flex">
                                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                                        <div class="txt-07 w-semibold txt-purple arrow-icon">Rs.<?php echo $ongoin[$i]->total_amount ?></div>
                                                    </div>
                                                </div>

                                                <div class="progress-back width-100 height-4px m-top-2">
                                                    <div class="progress-fill width-<?php if ($ongoin[$i]->amount_percentage) {
                                                                                        echo $ongoin[$i]->amount_percentage;
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> height-4px"></div>
                                                </div>
                                            </div>

                                            <div class="m-top-10">
                                                <div class="row-flex jf-btwn">
                                                    <div class="txt-06 w-semibold txt-purple arrow-icon">Volunteers</div>
                                                    <div class="row-flex">
                                                        <img class="width-25px height-25px" src="<?= ROOT ?>/images/Icons/ArrowLog.png" alt="" srcset="">
                                                        <div class="txt-07 w-semibold txt-purple arrow-icon"><?php echo $ongoin[$i]->no_of_volunteers ?></div>
                                                    </div>
                                                </div>

                                                <div class="progress-back width-100 height-4px m-top-2">
                                                    <div class="progress-fill width-<?php if ($ongoin[$i]->vol_percentage) {
                                                                                        echo $ongoin[$i]->vol_percentage;
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> height-4px "></div>
                                                </div>
                                            </div>

                                            <div class="row-flex jf-center">
                                                <a href="<?= ROOT ?>/event_org?id=<?= $ongoin[$i]->event_id ?>">
                                                    <button class="btn btn-green btn-xsm m-top-30">View Details</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end of EVENT-ONGOING -->
                                    <?php $count--;
                                        $i++;
                                    }
                                } else { ?>
                                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Ongoing Events</div>
                                <?php }
                                ?>

                            </div>
                        </div>
                    </div>

                    <!-- for spacing -->
                    <div class="blank col-lg-1"></div>
                    <!-- END  ongoing events section -->


                    <!-- statrt of copleted events section -->

                    <!-- for spacing -->
                    <div class="blank col-lg-1"></div>

                    <!-- Completed events card -->
                    <div class="events-card card event-holder col-lg-10 p-20 m-top-75 m-bottom-75 p-bottom-35 m-lr-auto">
                        <div class="heading-2 p-top-10">Completed Events</div>
                        <div class="event_scroll p-left-40 p-right-40">
                            <div class="grid-9">

                                <?php
                                $i = 0;
                                if ($past) {
                                    $count = sizeof($past);
                                    while ($count > 0) { ?>
                                        <!-- EVENT-COMPLETED -->
                                        <div class="card event-card-on col-lg-3 col-md-3 p-20 p-top-10 m-bottom-20">

                                            <div class="heading-event txt-al-center m-top-5 m-bottom-5"><?php echo $past[$i]->name ?></div>

                                            <img class="event-image m-bottom-4" src="<?= ROOT ?>/<?php echo $past[$i]->thumbnail_pic ?>" alt="" srcset="">

                                            <div class="event-date txt-al-center txt-08">Event Date - <?php echo $past[$i]->date ?></div>

                                            <div class="event-date txt-al-center txt-12 m-top-30 w-bold">Completed</div>


                                            <div class="row-flex jf-center">
                                                <a href="<?= ROOT ?>/event_org?id=<?= $past[$i]->event_id ?>">
                                                    <button class="btn btn-green btn-block btn-xsm m-top-30">View Details</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end of EVENT-COMPLETED -->

                                    <?php $count--;
                                        $i++;
                                    }
                                } else { ?>
                                    <div class="heading-event txt-al-center m-top-5 m-bottom-5">No Completed Events</div>
                                <?php }
                                ?>


                            </div>
                        </div>

                        <!-- for spacing -->
                        <div class="blank col-lg-1"></div>
                    </div>
                </div>

                <!-- statrt of copleted events section -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="<?= ROOT ?>/assets/script/event_search.js"></script>
                <?php $this->view('includes/footer') ?>
            </div>
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

<script>
    // selecting elements
    const sidebar_item = document.querySelectorAll('.sidebar_item');
    const content = document.querySelector('.content');
    const content_div = document.querySelector('#content_data');
    const root = document.querySelector(":root")

    const sidebar_right = document.querySelector(".s-right")

    const title_span = document.querySelector('#title_span')

    const search_input = document.getElementById("search_input_div")
    const result_div = document.getElementById("result_div")

    const page_home = document.querySelector("#sidebar_item-1")

    const load_page_animation = document.querySelector(".page_loader")

    const subpage_holder = document.querySelector("#sub_pages")
    var subpages = document.querySelectorAll(".sub_page_item")

    // define global varibales
    let timerId;
    const delay = 700
    let search_func_url = ""

    // onload function
    // document.addEventListener("DOMContentLoaded", function() {
    //     const clickEvent = new Event("click");
    //     page_home.dispatchEvent(clickEvent);
    // });

    // add event listner
    sidebar_item.forEach(element => {
        element.addEventListener("click", () => active_sidebar_item(element))
    });
    // close_search_div()
    // close search div
    function close_search_div() {
        sidebar_right.style.visibility = 'hidden'

        const elementStyle = getComputedStyle(root);
        root.style.setProperty("--sidebarWidth_right", "0px");
    }

    // open search div
    function open_search_div() {
        sidebar_right.style.visibility = 'visible'
        const elementStyle = getComputedStyle(root);
        root.style.setProperty("--sidebarWidth_right", "0px");
    }

    // <-------------------------subpages------------------------->
    function create_subpage_item(name, param) {
        const subpage = document.createElement("div")

        if (name == "dead") {
            subpage.setAttribute("class", "sub_page_item_dead")
            subpage.innerHTML = ""
        } else {
            subpage.setAttribute("class", "sub_page_item")
            subpage.innerHTML = name
        }

        subpage.setAttribute("data-param", param)

        subpage_holder.appendChild(subpage)

        subpage.addEventListener("click", () => {
            deactivate_all_subpages()
            active_subpage(subpage)
        })
    }

    function active_subpage(element) {
        element.classList.add('active')
        start_load() //enable load div
        // title_span.innerHTML = element.dataset.page_name
        search_func_url = element.dataset.search_url
        load_page(element.dataset.param)
    }

    function deactivate_all_subpages() {
        console.log(subpages)
        subpages.forEach(subpage => {
            subpage.classList.remove('active')
        })
    }

    // <-------------------------subpages:END------------------------->

    // <-------------------------loading animation------------------------->
    function start_load() {
        load_page_animation.style.visibility = "visible"
    }

    function end_load() {
        load_page_animation.style.visibility = "hidden"
    }
    // <-------------------------loading animation:End------------------------->

    function active_sidebar_item(element) {
        sidebar_item.forEach(newelement => {
            newelement.classList.remove('active')
        });
        element.classList.add('active')

        var params = element.getAttribute("data-param").split(", ")
        var pages = element.getAttribute("data-subpages").split(", ")

        title_span.innerHTML = element.innerHTML
        subpage_holder.innerHTML = ""

        if (pages.length == 1) {
            create_subpage_item("dead", params[0])
        } else {
            for (var x = 0; x < pages.length; x++) {
                create_subpage_item(pages[x], params[x])
            }
        }
        subpages = document.querySelectorAll(".sub_page_item")
        start_load()
        search_func_url = element.dataset.search_url

        if (pages.length == 1) {
            load_page(params[0])
        } else {
            const clickEvent = new Event("click")
            subpages[0].dispatchEvent(clickEvent);
        }
    }

    async function load_page(page_name) {
        try {
            // await delayss(2000)
            const response = await fetch("<?= ROOT ?>/admin/" + page_name)
            const data = await response.text()
            // console.log(data)
            // history.pushState({}, page_name,"<?= ROOT ?>/admin/" + page_name);
            content_div.innerHTML = data
            end_load()

        } catch (error) {
            console.log(error);
        }
    }

    function delayss(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    // <-------------------------sidebar - END------------------------->

    // <-------------------------search------------------------->

    // add event listner for search bar
    search_input.addEventListener("input", () => {
        if (search_input.value == " " || search_input.value == "") {
            search_input.value = ""
            result_div.innerHTML = ""
        } else {
            handleInput(search_input.value)
        }
    })

    function handleInput(keyword) {
        clearTimeout(timerId)
        timerId = setTimeout(() => {
            dynamic_search(keyword, "<?= ROOT ?>/admin/searchEvent")
        }, delay);
    }

    async function dynamic_search(keyword, search_func_url) {
        try {
            const response = await fetch(search_func_url + "/" + keyword);
            const data = await response.json();

            if (data != 'redirect') {
                result_div.innerHTML = ""

                if (data.length > 0) {
                    data.forEach(element => {
                        create_result_holder(element.name, element.location, element.date)
                        console.log(element)
                    });
                } else {
                    const res_div = document.createElement('div')
                    res_div.classList = "text-r-1"
                    res_div.innerHTML = "no result"
                    result_div.appendChild(res_div)
                }
            } else {
                window.location.href = "<?= ROOT ?>/login"
            }
        } catch (error) {
            console.error(error);
        }
    }
    // <-------------------------search : END------------------------->

    // <-------------------------search-result functions------------------------->
    function create_result_holder(eventName, orgName, eventDate) {
        // create CustomElements 
        var search_result_div = document.createElement("div")
        var event_name = document.createElement("div")
        var hr_line = document.createElement("div")
        var org_name = document.createElement("div")
        var event_date = document.createElement("div")

        // add classes
        search_result_div.classList.add("search_result")
        event_name.classList.add("col-12", "w-semibold", "txt-12")
        event_name.classList.add("col-12", "w-semibold", "txt-12")
        hr_line.classList.add("h-line")
        org_name.classList.add("col-12", "w-medium", "txt-09")
        event_date.classList.add("col-12", "w-medium", "txt-09")

        // set attributes
        search_result_div.setAttribute("style", "position: relative;")
        event_name.setAttribute("style", "position: absolute;top:10px;left:15px")
        org_name.setAttribute("style", "position: absolute;top:48px;left:25px;")
        event_date.setAttribute("style", "position: absolute;top:68px;left:25px;")

        // add values
        event_name.innerHTML = eventName
        org_name.innerHTML = "Location : " + orgName
        event_date.innerHTML = "Event date : " + eventDate

        // assemble
        result_div.appendChild(search_result_div)
        search_result_div.appendChild(event_name)
        search_result_div.appendChild(hr_line)
        search_result_div.appendChild(org_name)
        search_result_div.appendChild(event_date)

        // result_div.appendChild(search_result_div)
    }
    // create_result_holder("eventName", "OrgName", "eventDate")
    // <-------------------------search-result functions : End------------------------->
</script>

<script src=" <?= ROOT ?>/assets/navbar.js"></script>
<script src=" <?= ROOT ?>/assets/submenu.js"></script>
<script src=" <?= ROOT ?>/assets/dropdown.js"></script>