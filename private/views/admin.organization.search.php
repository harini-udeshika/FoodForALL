<!-- heading 2 -->
<div class="heading-2 col-12">Organizations</div>

<?php if (count($results) > 1) : ?>
    <? echo ("called") ?>
    <?php unset($results['result_type']) ?>
    <!-- table -->
    <div class="table admin_table col-12 m-left-20 m-right-20">
        <div class="table_head">
            <div class="table_head_i col-lg-2">
                Organization Name
            </div>
            <div class="table_head_i col-lg-2">
                Goverment Reg. Number
            </div>
            <div class="table_head_i col-lg-2">
                Email
            </div>
            <div class="table_head_i col-lg-2">
                Contact Number
            </div>
            <div class="table_head_i col-lg-2">
                Address
            </div>
            <div class="table_head_i table_head_i_f col-lg-2">
                Actions
            </div>
        </div>
        <?php foreach ($results as $result) : ?>
            <!-- table record -->
            <div class="table_record">
                <div class="table_record_i col-lg-2">
                    <?= $result->name ?>
                </div>
                <div class="table_record_i col-lg-2">
                    <?= $result->gov_reg_no ?>
                </div>
                <div class="table_record_i col-lg-2">
                    <?= $result->email ?>
                </div>
                <div class="table_record_i col-lg-2">
                    Contact Number
                </div>
                <div class="table_record_i col-lg-2">
                    <?= $result->address ?>
                </div>
                <div class="table_record_i table_record_i_f col-lg-2">
                    <a href="<?= ROOT ?>/admin/ask_blacklist_org?id=<?= $result->gov_reg_no ?>">
                        <button class="btn btn-sm btn-red">Blacklist</button>
                    </a>
                </div>
            </div>
            <!-- END : table record -->
        <?php endforeach; ?>
    </div>
    <!-- END:table -->
<?php else : ?>
    <div class="col-12 txt-al-center">
        <div class="txt-white p-top-20 p-bottom-20 w-semibold txt-12 m-top-50" style="margin-bottom: 200px; background: var(--errorRed);">
            <?php if ($results['result_type'] == 'search') : ?>
                *No matching results
            <?php else : ?>
                *No organizations registered yet
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<!-- add event listners -->
<script>
    const search_input = document.getElementById("search_input_div")
    const result_div = document.getElementById("result_div")

    // add event listner for search bar
    search_input.addEventListener("input", () => {
        if (search_input.value == " " || search_input.value == "") {
            search_input.value = ""
            result_div.innerHTML = ""
        } else {
            handleInput(search_input.value)
        }
    })
</script>