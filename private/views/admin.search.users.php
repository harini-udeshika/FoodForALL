<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.search.org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="body-container">
    <div class="container">
        <!-- main heading -->
        <div class="heading-1 col-lg-12">Users</div>
        <!-- space -->

        <!-- search bar -->
        <div class="blank col-lg-2"></div>

        <form class="col-lg-8 row-flex flex-row jf-center m-top-75 m-bottom-75" action="<?= ROOT ?>/Admin_search_users/search_user" method="post" id="form1">
            <input class="search-field width-100" type="text" name="search_term" id="search_term" placeholder="Search here">
            <button type="submit" name="search" class="search_logo">
                <i class="fa-solid fa-magnifying-glass "></i>
            </button>
        </form>

        <!-- space -->
        <div class="blank col-lg-2"></div>

        <!-- END : search bar -->

        <!-- heading 2 -->
        <div class="heading-2 col-12"><?= isset($results) ? 'Search Results' : 'Recent registered users'; ?></div>

        <?php if (isset($results)) : ?>
            <?php if (count($results) > 0) : ?>
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
                        <div class="table_head_i col-lg-2">
                            Contact Number
                        </div>
                        <div class="table_head_i col-lg-2">
                            District/Town
                        </div>
                        <div class="table_head_i table_head_i_f col-lg-1">
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
                            <div class="table_record_i col-lg-2">
                                <?= $result->telephone ?>
                            </div>
                            <div class="table_record_i col-lg-2">
                                <?= $result->city." / ".$result->city ?>
                            </div>
                            <div class="table_record_i table_record_i_f col-lg-1">
                                <button class="btn btn-sm btn-red">Delete</button>
                            </div>
                        </div>
                        <!-- END : table record -->
                    <?php endforeach; ?>
                </div>
                <!-- END:table -->
            <?php else : ?>
                <div class="col-12 txt-al-center">
                    <div class="txt-red w-semibold txt-12">No matching results</div>
                </div>
            <?php endif; ?>
        <?php elseif (isset($defaults)) : ?>
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
                    <div class="table_head_i col-lg-2">
                        Contact Number
                    </div>
                    <div class="table_head_i col-lg-2">
                        District/Town
                    </div>
                    <div class="table_head_i table_head_i_f col-lg-1">
                        Actions
                    </div>
                </div>
                <?php $res_count = count($defaults) < 3 ? count($defaults) : 3 ?>
                <?php for ($x = 0; $x < $res_count; $x++) : ?>
                    <!-- table record -->
                    <div class="table_record">
                        <div class="table_record_i col-lg-2">
                            <?= $defaults[$x]->first_name . " " . $defaults[$x]->last_name ?>
                        </div>
                        <div class="table_record_i col-lg-1">
                            <?= $defaults[$x]->id ?>
                        </div>
                        <div class="table_record_i col-lg-2">
                            <?= $defaults[$x]->email ?>
                        </div>
                        <div class="table_record_i col-lg-2">
                            <?= $defaults[$x]->nic ?>
                        </div>
                        <div class="table_record_i col-lg-2">
                            <?= $defaults[$x]->telephone ?>
                        </div>
                        <div class="table_record_i col-lg-2">
                            <?= $defaults[$x]->city." / ".$defaults[$x]->city ?>
                        </div>
                        <div class="table_record_i table_record_i_f col-lg-1">
                            <button class="btn btn-sm btn-red">Delete</button>
                        </div>
                    </div>
                    <!-- END : table record -->
                <?php endfor; ?>
            </div>
            <!-- END:table -->
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