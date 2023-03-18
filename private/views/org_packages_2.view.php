<?php $this->view('includes/header_2') ?>
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css"> -->
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="container">
    <div class="heading-1 col-12">Packages</div>

    <div class="blank col-lg-1"></div>
    <div class="col-lg-10 grid-9">
        <!-- package item start -->
        <div class="card col-lg-3 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
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
                <div class="package_items_heading_2 purpleText col-6" style="padding:8px 0 8px 0;">Package items</div>
                <div class="package_text_field purpleText col-6" style=" padding:8px 0 8px 0; border:1px solid var(--projectPurple); align-items:center; border-radius:15px;">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div>
        <!-- package item end -->

        <!-- package item start -->
        <div class="card col-lg-3 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
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
                <div class="package_items_heading_2 purpleText col-6" style="padding:8px 0 8px 0;">Package items</div>
                <div class="package_text_field purpleText col-6" style=" padding:8px 0 8px 0; border:1px solid var(--projectPurple); align-items:center; border-radius:15px;">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div>
        <!-- package item end -->

        <!-- package item start -->
        <div class="card col-lg-3 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
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
                <div class="package_items_heading_2 purpleText col-6" style="padding:8px 0 8px 0;">Package items</div>
                <div class="package_text_field purpleText col-6" style=" padding:8px 0 8px 0; border:1px solid var(--projectPurple); align-items:center; border-radius:15px;">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div>
        <!-- package item end -->
    </div>
    <div class="blank col-1"></div>

    <!-- <div class="row justify-to-left ">
        <div class="page_title_2" style="margin-bottom: 0px; margin-top:15px; padding-top:5px;">Add Packages</div>
        <i class="fas fa-plus-square toggleButton" style="margin-bottom: 0px; margin-top:15px; margin-left:10px; padding-top:5px; font-size: 42px;" id="plusIcon"></i>
    </div>
</div>

<script src="<?= ROOT ?>/assets/Event_item.js"></script>


<?php $this->view('includes/footer') ?>