<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.search.org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="body-container">
    <div class="container">
        <!-- main heading -->
        <div class="heading-1 col-lg-12">Area Coordinators</div>
        <!-- space -->

        <!-- search bar -->
        <div class="blank col-lg-2"></div>

        <form class="col-lg-8 row-flex flex-row jf-center m-top-75 m-bottom-75" action="<?= ROOT ?>/Admin_search_areacoords/search_user" method="post" id="form1">
            <input class="search-field width-100" type="text" name="search_term" id="search_term" placeholder="Search here">
            <button type="submit" name="search" class="search_logo">
                <i class="fa-solid fa-magnifying-glass "></i>
            </button>
        </form>

        <!-- space -->
        <div class="blank col-lg-2"></div>

        <!-- END : search bar -->

        <!-- heading 2 -->
        <div class="heading-2 col-12"><?= $results['result_type'] != 'recent' ? 'Search Results' : 'Recent registrations'; ?></div>
        
        <?php if (isset($results)) : ?>
            <?php if (count($results) > 1) : ?>
                <?php unset($results['result_type']) ?>
                <!-- table -->
                <div class="table admin_table col-12 m-left-20 m-right-20">
                    <div class="table_head">
                        <div class="table_head_i col-lg-2">
                            Name
                        </div>
                        <div class="table_head_i col-lg-1">
                            Reg. number
                        </div>
                        <div class="table_head_i col-lg-2">
                            Email
                        </div>
                        <div class="table_head_i col-lg-2">
                            NIC
                        </div>
                        <div class="table_head_i col-lg-1">
                            Contact Number
                        </div>
                        <div class="table_head_i col-lg-2">
                            District/Town
                        </div>
                        <div class="table_head_i table_head_i_f col-lg-2">
                            Actions
                        </div>
                    </div>
                    <?php foreach ($results as $result) : ?>
                        <!-- table record -->
                        <div class="table_record">
                            <div class="table_record_i col-lg-2">
                                <?= $result->first_name . " " . $result->last_name ?>
                            </div>
                            <div class="table_record_i col-lg-1">
                                <?= $result->id ?>
                            </div>
                            <div class="table_record_i col-lg-2">
                                <?= $result->email ?>
                            </div>
                            <div class="table_record_i col-lg-2">
                                <?= $result->nic ?>
                            </div>
                            <div class="table_record_i col-lg-1">
                                <?= $result->phone_no ?>
                            </div>
                            <div class="table_record_i col-lg-2">
                                <?= $result->district . " / " . $result->town ?>
                            </div>
                            <div class="table_record_i table_record_i_f col-lg-2">
                                <a href="<?=ROOT?>/Admin_search_areacoords/delete/<?= $result->id?>">
                                    <button class="btn btn-sm btn-red">Delete</button>
                                </a>
                            </div>
                        </div>
                        <!-- END : table record -->
                    <?php endforeach; ?>
                </div>
                <!-- END:table -->
            <?php else : ?>
                <div class="col-12 txt-al-center">
                    <div class="txt-red w-semibold txt-12 m-top-50" style="margin-bottom: 200px;"><?= $results['result_type'] != 'recent' ? '*No matching result' : '*No any area coordinator registered yet'; ?></div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="col-12 txt-al-center">
                <div class="txt-red w-semibold txt-12">Unknown error occured</div>
            </div>
        <?php endif; ?>

        <!-- to create margin -->
        <div class="m-top-100"></div>
    </div>

    <script>
        const form1 = document.getElementById('form1');

        form1.addEventListener("submit", (event => {
            const search_term = document.getElementById('search_term');
            const search_term_val = search_term.value.trim();

            if (search_term_val == '') {
                event.preventDefault();
            }
        }));
    </script>

    <?php $this->view('includes/footer') ?>