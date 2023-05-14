<?php foreach ($organizations as $organization) : ?>
    <div class="card col-6 p-20 m-5" style="background-color:white;height:fit-content;">
        <div class="txt-14 w-bold"><?= $organization->name ?></div>
        <div class="h-line-2 m-top-10"></div>
        <div class="grid-12 m-top-20 p-10">

            <div class="w-semibold txt-10 col-4">Email</div>
            <div class="col-1 txt-al-center">:</div>
            <div class="w-regular txt-10 col-7"><?= $organization->email ?></div>

            <div class="w-semibold txt-10 col-4">Gov. register no.</div>
            <div class="col-1 txt-al-center">:</div>
            <div class="w-regular txt-10 col-7"><?= $organization->gov_reg_no ?></div>

            <div class="w-semibold txt-10 col-4">Address</div>
            <div class="col-1 txt-al-center">:</div>
            <div class="w-regular txt-10 col-7"><?= $organization->address ?></div>

            <div class="w-semibold txt-10 col-4">City</div>
            <div class="col-1 txt-al-center">:</div>
            <div class="w-regular txt-10 col-7"><?= $organization->city ?></div>

            <div class="w-semibold txt-10 col-4">Postal code</div>
            <div class="col-1 txt-al-center">:</div>
            <div class="w-regular txt-10 col-7"><?= $organization->postal ?></div>

            <div class="col-12 m-top-12 m-bottom-12"><a href="<?= ROOT ?>/<?= $organization->gov_cetficate_cpy ?>">Gov. certificate</a></div>

            <a class="col-6" href="<?= ROOT ?>/admin/rejectOrg?id=<?= $organization->gov_reg_no ?>">
                <button class="btn btn-gray btn-sm btn-block ">Reject</button>
            </a>

            <a class="col-6" href="<?= ROOT ?>/admin/accept_org?id=<?= $organization->gov_reg_no ?>">
                <button class="btn btn-green btn-sm btn-block col-6">Approve</button>
            </a>
        </div>
    </div>
<?php endforeach; ?>