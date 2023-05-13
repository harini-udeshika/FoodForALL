<!-- budget item -->
<?php if (isset($budgets)) : ?>
    <?php foreach ($budgets as $budget) : ?>
        <div class="card-simple col-12 grid-12 p-30 m-bottom-20" style="background-color: white;">
            <div class="col-12 txt-15 w-bold txt-al-center m-bottom-15"><?= $budget->event_name ?></div>

            <div class="col-12 txt-11 w-semibold m-top-40">No of recepients</div>
            <div class="col-12 m-0">
                <hr>
            </div>
            <div class="col-12 grid-12">
                <div class="col-4 flex jf-center al-center">
                    <div>children</div>
                    <div style="width:8px;"></div>
                    <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                </div>
                <div class="col-4 flex jf-center al-center">
                    <div>Adults</div>
                    <div style="width:8px;"></div>
                    <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                </div>
                <div class="col-4 flex jf-center al-center">
                    <div>Patients</div>
                    <div style="width:8px;"></div>
                    <div class="p-4 txt-al-center" style="border:1px solid var(--projectPurple); border-radius:5px; min-width:42px;">15</div>
                </div>
            </div>

            <div class="col-12 txt-11 w-semibold m-top-40">Packages</div>
            <div class="col-12 m-0">
                <hr>
            </div>
            <div class="col-12 grid-12">
                <?php foreach ($budget->org_budgets as $event) : ?>
                    <!-- package item start -->
                    <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                        <div class="txt-11 w-semibold"><?= $event->package_name ?></div>

                        <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                        <div class="card-simple p-20 grid-12">
                            <div class="txt-09  txt-al-center col-4 ">item</div>
                            <div class="txt-09  txt-al-center col-4 ">quantity</div>
                            <div class="txt-09  txt-al-center col-4 p-bottom-5">u. price</div>
                            <?php for ($x = 0; $x < count($event->item_name); $x++) : ?>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->item_name[$x] ?></div>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->quantity[$x] ?></div>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->item_name[$x] ?></div>
                            <?php endfor; ?>
                        </div>

                        <div class="row txt-al-center p-top-20 p-bottom-10" style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="package_items_heading_2 purpleText col-6 p-bottom-8">Package Total</div>
                            <div class="package_text_field purpleText col-6 p-bottom-8 budget_total_num">Rs. <?= $event->package_total ?></div>
                        </div>

                        <div class="row txt-al-center p-top-15 w-semibold" style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="package_items_heading_2 purpleText col-6 p-bottom-6">Quantity</div>
                            <div class="package_text_field purpleText col-6 p-bottom-8 budget_total_num"><?= $event->package_quantity ?></div>

                            <div class="package_items_heading_2 purpleText col-6 p-bottom-15">Total</div>
                            <div class="package_text_field purpleText col-6 p-bottom-15 budget_total_num">Rs. <?= $event->total ?></div>
                        </div>

                    </div>
                    <!-- package item end -->
                <?php endforeach; ?>
            </div>
            <div class="col-12 txt-11 w-semibold m-top-40">Other expenses</div>
            <div class="col-12 m-0">
                <hr>
            </div>
            <div class="col-12 grid-12">
                <?php foreach ($budget->new_budgets as $event) : ?>
                    <!-- package item start -->
                    <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                        <div class="txt-11 w-semibold"><?= $event->package_name ?></div>

                        <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                        <div class="card-simple p-20 grid-12">
                            <div class="txt-09  txt-al-center col-4 ">item</div>
                            <div class="txt-09  txt-al-center col-4 ">quantity</div>
                            <div class="txt-09  txt-al-center col-4 p-bottom-5">u. price</div>
                            <?php for ($x = 0; $x < count($event->item_name); $x++) : ?>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->item_name[$x] ?></div>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->quantity[$x] ?></div>
                                <div class="txt-09  txt-al-center col-4 txt-gray"><?= $event->item_name[$x] ?></div>
                            <?php endfor; ?>
                        </div>

                        <div class="row txt-al-center p-top-20 p-bottom-10" style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="package_items_heading_2 purpleText col-6 p-bottom-8">Package Total</div>
                            <div class="package_text_field purpleText col-6 p-bottom-8 budget_total_num">Rs. <?= $event->package_total ?></div>
                        </div>

                        <div class="row txt-al-center p-top-15 w-semibold" style="border-bottom: 1px solid rgba(0,0,0,0.1);">
                            <div class="package_items_heading_2 purpleText col-6 p-bottom-6">Quantity</div>
                            <div class="package_text_field purpleText col-6 p-bottom-8 budget_total_num"><?= $event->package_quantity ?></div>

                            <div class="package_items_heading_2 purpleText col-6 p-bottom-15">Total</div>
                            <div class="package_text_field purpleText col-6 p-bottom-15 budget_total_num">Rs. <?= $event->total ?></div>
                        </div>
                    </div>
                    <!-- package item end -->
                <?php endforeach; ?>

                <div class="col-12 grid-12 m-top-30 ">
                    <a class="col-12" href="<?= ROOT ?>/finance_manager/undoReject?id=<?= $budget->event_id ?>">
                        <button class="btn btn-red btn-sm btn-block">Undo Reject</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- END : budget item -->
    <?php endforeach; ?>
<?php endif; ?>