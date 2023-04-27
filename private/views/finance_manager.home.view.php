<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.home.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<style>
    .post_div::-webkit-scrollbar {
        width: 0em;
        /* set the width of the scrollbar */
    }

    .one-solid-ash {
        border: 1px solid rgba(0, 0, 0, 0.2);
    }

    .side_menu_item {
        font-size: 1.2rem;

        display: flex;
        align-items: center;
        margin: 4px 0px 4px 0px;
        padding: 14px 14px 14px 40px;
        border-radius: 40px;
    }

    .side_menu_item.active {
        background-color: red;
        background-color: rgba(0, 0, 0, 0.2);
    }
</style>



<div class="grid-12">

    <div class="col-lg-3 col-md-3 p-20 m-top-20">

        <div class="side_menu_item" id="temp_div1">
            <i class="fa-solid fa-file-invoice-dollar m-right-13 txt-18"></i>
            Pending budgets
            <!-- <div>Pending budgets</div> -->
        </div>
        <div class="side_menu_item" id="temp_div2">
            <i class="fa-solid fa-bell m-right-13 txt-18"></i>
            Notifications
            <!-- <div>Notifications</div> -->
        </div>
        <div class="side_menu_item" id="temp_div3">
            <i class="fa-solid fa-bell m-right-13 txt-18"></i>
            Notifications
            <!-- <div>Notifications</div> -->
        </div>
        <div class="side_menu_item" id="temp_div4">
            <i class="fa-solid fa-bell m-right-13 txt-18"></i>
            Notifications
            <!-- <div>Notifications</div> -->
        </div>
        <div class="side_menu_item" id="temp_div5">
            <i class="fa-solid fa-bell m-right-13 txt-18"></i>
            Notifications
            <!-- <div>Notifications</div> -->
        </div>
    </div>

    <div class="col-lg-6 col-md-6" style="position:relative;">

        <!-- <div class="one-solid-ash txt-13 p-6 p-left-10 w-semibold" style="height:60px;">Budget requests</div> -->

        <div class="post_div " style="overflow:auto; height:77.2vh;" id="feed_div">
            <button id="to-top" class="btn btn-gray btn-md" style="position:absolute; right:15px; bottom:15px;display:none;">&uparrow;</button>

            <div class="scroll_items_div">
                <!-- budget item -->
                <div class="card-simple grid-12 p-20 m-bottom-20 m-right-20 m-top-30">
                    <div class="col-12 txt-15 w-bold txt-al-center m-bottom-15">Event name</div>

                    <div class="col-12 txt-11 w-semibold m-top-40">No of recepients</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <div class="col-4 flex jf-center al-center">
                            <div>children</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                        <div class="col-4 flex jf-center al-center">
                            <div>Adults</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                        <div class="col-4 flex jf-center al-center">
                            <div>Patients</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                    </div>

                    <div class="col-12 txt-11 w-semibold m-top-40">Packages</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->

                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->
                    </div>
                    <div class="col-12 txt-11 w-semibold m-top-40">Other expenses</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->

                        <div class="col-12 grid-12 m-top-30 m-bottom-20">
                            <button class="btn btn-gray btn-sm col-6">Reject</button>
                            <button class="btn btn-green btn-sm col-6">Approve</button>
                        </div>
                    </div>
                </div>
                <!-- END : budget item -->

                <!-- budget item -->
                <div class="card grid-12 p-20" style="border-radius:0px;border-top:none;">
                    <div class="col-12 txt-15 w-bold txt-al-center m-bottom-15">Event name</div>

                    <div class="col-12 txt-11 w-semibold m-top-40">No of recepients</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <div class="col-4 flex jf-center al-center">
                            <div>children</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                        <div class="col-4 flex jf-center al-center">
                            <div>Adults</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                        <div class="col-4 flex jf-center al-center">
                            <div>Patients</div>
                            <div style="width:8px;"></div>
                            <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                        </div>
                    </div>

                    <div class="col-12 txt-11 w-semibold m-top-40">Packages</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->

                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->
                    </div>
                    <div class="col-12 txt-11 w-semibold m-top-40">Other expenses</div>
                    <div class="col-12 m-0">
                        <hr>
                    </div>
                    <div class="col-12 grid-12">
                        <!-- package item start -->
                        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                            <div class="txt-11 w-semibold">Package one</div>

                            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                            <div class="card-simple p-20 m-lr-auto grid-8">
                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                                <div class="txt-09 col-4 txt-gray">Item 1</div>
                                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
                            </div>

                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
                            </div>

                            <div class="row p-top-20">
                                <button class="btn btn-sm btn-gray col-6">edit</button>
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </div>
                        </div>
                        <!-- package item end -->
                    </div>
                </div>
                <!-- END : budget item -->
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 p-20 m-top-20" style="height: 400px;">

        <form class="col-lg-8 row-flex flex-row jf-center" action="<?= ROOT ?>" method="post" id="form1">
            <input class="search-field width-100" type="text" name="search_term" id="search_term" placeholder="Search here">
            <button type="submit" name="search" class="search_logo">
                <i class="fa-solid fa-magnifying-glass "></i>
            </button>
        </form>

        <div class="card m-top-10" style="height:400px;">

        </div>
    </div>
</div>

<script>
    var side_menu_buttons = document.querySelectorAll(".side_menu_item")
    
    for (var i = 0; i < side_menu_buttons.length; i++) {
        side_menu_buttons[i].addEventListener("click", function() {
            for (var j = 0; j < side_menu_buttons.length; j++) {
                side_menu_buttons[j].classList.remove("active")
            }

            this.classList.add("active")
        })
    }

    var feed_div = document.getElementById('feed_div')
    var button_top = document.getElementById('to-top')

    feed_div.addEventListener('scroll', function() {
        if (button_top) {
            button_top.style.display = (feed_div.scrollTop > 800) ? 'block' : 'none';
        }
    });

    button_top.addEventListener("click", function() {
        feed_div.scrollTop = 0;
        feed_div.documentElement.scrollTop = 0;
    });
</script>


<?php $this->view('includes/footer') ?>