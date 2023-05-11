<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css"> -->
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css"> -->
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="body-container">
    <div class="heading-1">Subscription</div>
    <div class="container">
        <div class="blank col-lg-3 col-sm-12"></div>
        <div class="card card-back2 col-lg-6 col-sm-12 height-770px p-15">
            <div class="heading-2 txt-center txt-purple">Subscribe Now!</div>
            <div class="blank height-10px"></div>
            <div class="heading-3 txt-center">Subscribe with us now to unlock more features and for a better experience.</div>
            <div class="blank height-8px"></div>
            <div class="p-left-30">
                <div class="txt-al-left txt-13 w-semibold p-left-10">Our monthly subscribtion plan</div>
                <div class="txt-al-left txt-12" style="font-weight: 450;">
                    <ul>
                        <li>Add new events, get donations and publicity</li>
                        <li>A platform to showcase your events with images</li>
                        <li>Adding new merchendise to your stores</li>
                        <li>All for a Monthly Subscription fee of <span class="txt-purple">1000.00 LKR</span></li>
                    </ul>
                </div>
            </div>
            <div class="txt-center">
                <div class="heading-1 p-bottom-20">Pay subscription Here</div>
                <a href="org_subscribe?pay=true"><button class="btn btn-lg btn-black"><i class="fa-sharp fa-light fa-circle-dollar"></i> 1000.00 LKR</button></a>

            </div>
        </div>
        <div class="blank col-lg-3 col-sm-12"></div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>