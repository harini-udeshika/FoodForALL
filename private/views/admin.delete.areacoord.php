<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.search.org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">

<div class="container">
    <!-- spacing -->
    <div class="balnk col-lg-2"></div>

    <div class="card col-lg-8 m-50 m-top-100 p-50 txt-al-center">
        <?php if (isset($row)) : ?>
            <div class="txt-10 m-top-50">
                Are you sure you want to delete Area Coordinator?
            </div>
            <div class="txt-12 m-top-40 m-bottom-60">
                <span class="w-semibold txt-14 txt-red"><?= $row->name ?></span> with Registrtion number <span class="w-semibold txt-14 txt-red"><?= $row->id ?></span>
            </div>

            <div class="width-90 m-lr-auto flex jf-btwn">
                <a href="<?= ROOT ?>/Admin_search_areacoords">
                    <button class="btn btn-xsm btn-gray">Cancel</button>
                </a>
                <form method="post">
                    <input hidden type="text" value="<?= $row->id ?>" name="id">
                    <a href="<?= ROOT ?>/Admin_search_areacoords/delete">
                        <button type="submit" class="btn btn-xsm btn-red">Delete</button>
                    </a>
                </form>
            </div>
        <?php else : ?>
            <div class="txt-12 txt-red width-400px w-bold m-top-20">
                <i class="txt-25 m-bottom-20 fas fa-exclamation-triangle"></i>
                <div class="div">
                    *Unknown error
                </div>
                <a href="<?= ROOT ?>/Admin_search_areacoords">
                    <button class="btn btn-sm btn-block btn-gray m-top-30">back</button>
                </a>
            </div>
        <?php endif ?>
    </div>

    <!-- spacing -->
    <div class="balnk col-lg-2"></div>
</div>