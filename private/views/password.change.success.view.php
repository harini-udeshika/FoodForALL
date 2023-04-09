<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css">

<div class="container">
    <div class="col-12 flex jf-center" style="margin-top:30vh;">
        <i class="fa-solid fa-circle-check" style="font-size: 5rem; color:var(--projectGreen);"></i>
    </div>

    <div class="blank col-3"></div>
    <div class=" col-6 txt-al-center m-top-20 txt-14 w-semibold">
        Password changed successfully !
    </div>
    <div class="blank col-3"></div>

    <div class="col-12 flex jf-center m-top-10">
        <a href="<?=ROOT?>/admin/home">
            <button class="btn btn-sm btn-gray">Go back to home</button>
        </a>
    </div>
</div>
</body>

</html>