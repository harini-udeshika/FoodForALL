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
        transition: left 0.5s;
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
        margin-top: 5px;
        border-radius: 10px;
        padding: 10px 10px;
        /* padding: 20px; */
        height: fit-content;
        max-height: 300px;
        overflow-x: hidden;
        overflow-y: auto;
        /* display: none; */
    }

    #search_input_div:focus {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);

        /* background-color: red; */
    }

    .search_result {

        display: grid;
        grid-template-columns: repeat(12, 1fr);

        padding: 10px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        width: 100%;
        height: 110px;
        transition: 0.4s;
    }

    .search_result:hover {
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
    }

    .no_search_result {
        border: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        height: 60px;
    }

    .text-r-1 {
        grid-column: span 12;
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
                <input class="search-field width-100" type="text" name="search_term" id="search_input_div" placeholder="Search here">

                <div class="" id="result_div">
                    <div class="search_result" style="position: relative;">
                        <!-- <div class="text-r-1">the result</div> -->

                        <div class="col-12 w-semibold txt-12" style="position: absolute;
                        top:10px;left:10px">Event name</div>
                        <div class="h-line"></div>
                        <div class="col-12 w-medium txt-09" style="position: absolute;
                        top:48px;left:20px">Organization name</div>
                        <div class="col-12 w-medium txt-09" style="position: absolute;
                        top:68px;left:20px">Event date - 2012/12/12</div>
                    </div>
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
    const page_home =document.querySelector("#sidebar_item-1")

    // define global varibales
    let timerId;
    const delay = 700
    let search_func_url = ""

    // onload function
    document.addEventListener("DOMContentLoaded", function() {
        const clickEvent = new Event("click");
        page_home.dispatchEvent(clickEvent);
    });


    // add event listner for search bar
    search_input.addEventListener("input", () => {
        if (search_input.value == " " || search_input.value == "") {
            search_input.value = ""
        } else {
            handleInput(search_input.value)
        }
    })

    function active_sidebar_item(element) {
        sidebar_item.forEach(newelement => {
            newelement.classList.remove('active')
        });
        element.classList.add('active')
        load_page(element.dataset.param)
        title_span.innerHTML = element.dataset.page_name
        search_func_url = element.dataset.search_url
    }

    function handleInput(keyword) {
        clearTimeout(timerId)
        timerId = setTimeout(() => {
            dynamic_search(keyword, "<?= ROOT ?>/fetch/searchUser")
        }, delay);
    }

    sidebar_item.forEach(element => {
        element.addEventListener("click", () => active_sidebar_item(element))
    });

    async function load_page(page_name) {
        try {
            const response = await fetch("<?= ROOT ?>/admin/events/" + page_name)
            const data = await response.json()
            console.log(data)
            content_div.innerHTML = data

        } catch (error) {
            console.log(error);
        }
    }

    async function dynamic_search(keyword) {
        try {
            const response = await fetch(search_func_url + "/" + keyword);
            const data = await response.json();

            if (data != 'redirect') {
                result_div.innerHTML = ""

                if (data.length > 0) {
                    data.forEach(element => {
                        const res_div = document.createElement('div')
                        res_div.classList = "temp_class"
                        res_div.innerHTML = element.event_id
                        result_div.appendChild(res_div)
                    });
                } else {
                    const res_div = document.createElement('div')
                    res_div.classList = "temp_class"
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
</script>