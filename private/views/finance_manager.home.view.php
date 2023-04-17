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
</style>

<div class="container m-top-20">

    <div class="col-lg-3 col-md-3 p-20" style="border:1px solid rgba(0,0,0,0.2);">
        <div class="flex al-center p-14 p-left-40 p-right-20" style="background-color: red;">
            <i class="fa-solid fa-file-invoice-dollar m-right-10 txt-16"></i>
            <div>Pending budgets</div>
        </div>
        <div class="flex al-center p-14 p-left-40">
            <i class="fa-solid fa-bell m-right-10 txt-16"></i>
            <div>Notifications</div>
        </div>
    </div>

    <div class="div col-lg-6 col-md-6" style="position:relative;">
        <div class="post_div" style="overflow:auto; height:77.2vh; border:1px solid rgba(0,0,0,0.1); " id="feed_div">
            <button id="to-top" class="btn btn-gray btn-md" style="position:absolute; right:15px; bottom:15px;display:none;">&uparrow;</button>

            <div class="card" style="height:600px; border-radius:0px;border-top:none;background-color:red;"></div>
            <div class="card" style="height:600px; border-radius:0px;border-top:none;background-color:green;"></div>
            <div class="card" style="height:600px; border-radius:0px;border-top:none;background-color:blue;"></div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3" style="height: 400px;">

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
        }

    });
</script>


<?php $this->view('includes/footer') ?>