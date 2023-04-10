<?php $this->view('includes/header') ?>
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css"> -->
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css"> -->
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/org_package.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="row justify-to-left ">
    <div class="page_title_1" style="margin-bottom: 15px; margin-top:15px; padding-top:5px; float: left;">Packages</div>
</div>

<div class="row justify-to-center">
    <div class="package_1" style="width: 310px; height: 400px; margin:20px">
        <div class="row justify-to-center">
            <div class="package_name purpleText">Package one</div>
        </div>

        <div class="row justify-to-left">
            <div class="package_items_heading_2 purpleText">Package items</div>
        </div>

        <div class="row justify-to-center">
            <div class="package_items_container card">
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">2890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">89 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">1890 LKR</div>
                </div>
            </div>
        </div>

        <div class="row justify-to-center">
            <div class="row">
                <div class="package_items_heading_2 purpleText">Package items</div>
                <div class="package_text_field purpleText">Price</div>
            </div>
        </div>

        <div class="row justify-space-between">
            <button class="item_edit_btn">edit</button>
            <button class="item_remove_btn">remove</button>
        </div>
    </div>

    <div class="package_1" style="width: 310px; height: 400px; margin:20px">
        <div class="row justify-to-center">
            <div class="package_name purpleText">Package one</div>
        </div>

        <div class="row justify-to-left">
            <div class="package_items_heading_2 purpleText">Package items</div>
        </div>

        <div class="row justify-to-center">
            <div class="package_items_container card">
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">2890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">89 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">1890 LKR</div>
                </div>
            </div>
        </div>

        <div class="row justify-to-center">
            <div class="row">
                <div class="package_items_heading_2 purpleText">Package items</div>
                <div class="package_text_field purpleText">Price</div>
            </div>
        </div>

        <div class="row justify-space-between">
            <button class="item_edit_btn">edit</button>
            <button class="item_remove_btn">remove</button>
        </div>
    </div>

    <div class="package_1" style="width: 310px; height: 400px; margin:30px 20px 30px 20px">
        <div class="row justify-to-center">
            <div class="package_name purpleText">Package one</div>
        </div>

        <div class="row justify-to-left">
            <div class="package_items_heading_2 purpleText">Package items</div>
        </div>

        <div class="row justify-to-center">
            <div class="package_items_container card">
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">2890 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">89 LKR</div>
                </div>
                <div class="row justify-space-between">
                    <div class="item_text grayText  ">Item 1</div>
                    <div class="item_text grayText  ">1890 LKR</div>
                </div>
            </div>
        </div>

        <div class="row justify-to-center">
            <div class="row">
                <div class="package_items_heading_2 purpleText">Package items</div>
                <div class="package_text_field purpleText">Price</div>
            </div>
        </div>

        <div class="row justify-space-between">
            <button class="item_edit_btn">edit</button>
            <button class="item_remove_btn">remove</button>
        </div>
    </div>
</div>

<div class="row justify-to-left ">
    <div class="page_title_2" style="margin-bottom: 0px; margin-top:15px; padding-top:5px;">Add Packages</div>
    <i class="fas fa-plus-square toggleButton" style="margin-bottom: 0px; margin-top:15px; margin-left:10px; padding-top:5px; font-size: 42px;" id="plusIcon"></i>
</div>

<div class="package_1 addNewPackage" style="width: 344px;height: 440px; margin: 20px 0px 100px 360px;" id="addPackage">
    <form action="">
        <div class="row justify-space-between">
            <div class="package_items_heading_2 purpleText" style="font-size: 16px;font-weight: 600;">Package name :
            </div>
            <div class="package_text_field purpleText" style="width: 152px;height: 32px;"></div>
        </div>

        <div class="row justify-to-left">
            <div class="package_items_heading_2 purpleText" style="margin-left: 48px;">Package items</div>
        </div>

        <div class="row justify-to-center" style="margin-bottom: 10px;">
            <div class="row justify-to-right" style="flex-direction: column;">
                <div class="package_items_container card">
                    <div class="row justify-space-between" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
                        <div class="item_text grayText  ">Item 1</div>
                        <div class="item_text grayText  ">890 LKR</div>
                    </div>
                    <div class="row justify-space-between" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
                        <div class="item_text grayText  ">Item 1</div>
                        <div class="item_text grayText  ">2890 LKR</div>
                    </div>
                    <div class="row justify-space-between" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
                        <div class="item_text grayText  ">Item 1</div>
                        <div class="item_text grayText  ">89 LKR</div>
                    </div>
                    <div class="row justify-space-between" style="border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
                        <div class="item_text grayText  ">Item 1</div>
                        <div class="item_text grayText  ">1890 LKR</div>
                    </div>
                </div>
                <div class="row justify-to-right" style="width: 240px;">
                    <i class="fas fa-plus-square" style="margin: 2px 0px 2px 2px;font-size: 36px;"></i>
                </div>
            </div>
        </div>

        <div class="row justify-to-left">
            <div class="package_items_heading_2 purpleText" style="font-size: 12px;font-weight: 600; margin: 5px 10px 5px 48px;">Package name :
            </div>
            <div class="package_text_field purpleText" style="width: 60px;height: 28px; margin: 0px;"></div>
        </div>

        <div class="row justify-to-right">
            <button class="green_btn" style="width: 104px;height: 32px;font-size: 14px;margin: 24px 24px 0 0;">Add
                package</button>
        </div>
    </form>
</div>

<script src="<?= ROOT ?>/assets/Event_item.js"></script>


<?php $this->view('includes/footer') ?>