<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.events.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<style>
    /* .main-cont {} */

    .sidebar {
        position: fixed;
        /* top: 100; */
        width: 250px;
        min-height: 100vh;
        /* background-color: #f1f1f1; */
        border-right: 1px solid rgba(0, 0, 0, 0.2);
        transition: left 0.2s;
        padding: 15px;
        padding-top: 30px;
        overflow-x: hidden;
    }

    .s-right {
        background-color: white;
        border-left: 1px solid rgba(0, 0, 0, 0.2);
        width: 350px;
        right: 0;
    }

    .title_bar {
        width: 100%;
        font-size: 1.4rem;
        font-weight: 600;
        padding: 30px;
        /* height: 50px; */
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    .content {
        position: fixed;
        width: calc(100vw - 600px);
        margin-left: 250px;
        /* padding: 20px; */
        /* padding-top: 30px; */
    }

    .content_data {
        /* overflow: scroll; */
        background-color: #f1f1f1;
        padding: 20px;
        overflow-x: hidden;
        overflow-y: auto;
        height: 80vh;
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
    #sidebar_item-3 {
        visibility: hidden;
    }

    /* small screen size */
    @media screen and (max-width: 768px) {
        #sidebar_item-3 {
            visibility: visible;
        }

        .s-right {
            visibility: hidden;
        }

        .content {
            position: fixed;
            width: calc(100vw - 250px);
            margin-left: 250px;
            /* padding: 20px; */
            /* padding-top: 30px; */
        }
    }
</style>
</head>

<body>
    <div class="main-cont">
        <div class="sidebar">
            <div class="sidebar_item" data-param="upcoming" data-page_name="Ongoing Events" data-search_url="<?= ROOT ?>" id="sidebar_item-1">Upcoming Events</div>
            <div class="sidebar_item" data-param="completed" data-page_name="Completed Events" data-search_url="<?= ROOT ?>" id="sidebar_item-2">Completed Events</div>
            <div class="sidebar_item" data-param="Search" data-page_name="Search" id="sidebar_item-3">Search</div>
        </div>

        <div class="content" id="content_div">
            <div class="title_bar"><span class="w-bold">Events</span> - <span class="w-regular" id="title_span">page name</span></div>

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

    </div>
</body>

<script>
    // selecting elements
    const sidebar_item = document.querySelectorAll('.sidebar_item');
    const content = document.querySelector('.content');
    const content_div = document.querySelector('#content_data');
    const title_span = document.querySelector('#title_span')
    const search_input = document.getElementById("search_input_div")
    const result_div = document.getElementById("result_div")
    const page_home = document.querySelector("#sidebar_item-1")

    // define global varibales
    let timerId;
    const delay = 700
    let search_func_url = ""

    // onload function
    document.addEventListener("DOMContentLoaded", function() {
        const clickEvent = new Event("click");
        page_home.dispatchEvent(clickEvent);
    });

    sidebar_item.forEach(element => {
        element.addEventListener("click", () => active_sidebar_item(element))
    });

    // <-------------------------sidebar------------------------->
    function active_sidebar_item(element) {
        sidebar_item.forEach(newelement => {
            newelement.classList.remove('active')
        });
        element.classList.add('active')
        load_page(element.dataset.param)
        title_span.innerHTML = element.dataset.page_name
        search_func_url = element.dataset.search_url
    }

    async function load_page(page_name) {
        try {
            const response = await fetch("<?= ROOT ?>/admin/events/" + page_name)
            const data = await response.json()
            // console.log(data)
            content_div.innerHTML = data

        } catch (error) {
            console.log(error);
        }
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

<script src=" <?=ROOT?>/assets/navbar.js"></script>
<script src=" <?=ROOT?>/assets/submenu.js"></script>
<script src=" <?=ROOT?>/assets/dropdown.js"></script>