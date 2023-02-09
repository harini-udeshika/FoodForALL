<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/org.admin.event.items.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>



<div class="container">
    <!-- heading 1 -->
    <div class="heading-1 col-12">Event Items</div>

    <!-- spacing -->
    <div class="blank col-lg-2"></div>

    <div class="card event-card p-20 p-bottom-35 col-lg-8 m-lr-auto grid-8">
        <!-- ivent item -->
        <div class="blank item-card col-lg-4 card-simple m-20 p-20 ">
            <img src="<?= ROOT ?>/images/logo.png" alt="" style="width:100%; height:200px; border:2px solid black;">

            <div class="txt-gray w-semibold txt-al-center m-top-14 txt-12">T-shirt</div>

            <div class=" w-semibold txt-al-center m-top-25 txt-20">399</div>

            <div class=" w-semibold txt-al-center m-top-20 txt-12">Stock : 20</div>

            <div class="flex jf-btwn width-88 m-lr-auto m-top-35">
                <button class="btn btn-gray btn-sm">Delete</button>
                <button class="btn btn-green btn-sm">Edit</button>
            </div>

        </div>
        <!-- END : ivent item -->

        <div class="blank item-card col-lg-4 card-simple card-back1 p-30 m-20">
            <form action="">
                <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Item Name</label>
                <input class="input-field input-field-block txt-08 w-medium m-bottom-15" name="item_name" id="item_name" value="<?= get_var('item_name') ?>" type="text">

                <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Unit Price</label>
                <input class="input-field input-field-block txt-08 w-medium m-bottom-15" name="unit_price" id="unit_price" value="<?= get_var('unit_price') ?>" type="text">

                <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Available Stock</label>
                <input class="input-field input-field-block txt-08 w-medium m-bottom-15" name="stock_count" id="stock_count" value="<?= get_var('stock_count') ?>" type="text">

                <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Item Code</label>
                <input class="input-field input-field-block txt-08 w-medium m-bottom-15" name="code" id="code" value="<?= get_var('code') ?>" type="text">

                <div class="flex">
                    <label class="p-10 width-60 txt-al-center m-lr-auto m-top-10 sp-1" style="cursor:pointer;" for="inputTag">
                        <div class="block">Item Image</div>
                        <input id="inputTag" type="file" style="display:none;">
                        <i class="fas fa-image txt-20 m-top-10"></i>
                    </label>
                </div>

                <div class="flex jf-center m-top-30">
                    <button class="btn btn-green btn-sm btn-block" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- spacing -->
    <div class="blank col-lg-2"></div>
</div>

<?php $this->view('includes/footer') ?>