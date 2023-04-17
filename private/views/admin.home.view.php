<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/admin.home.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="container">
    <div class="heading-1 col-12">Dashboard</div>

    <div class="blank col-lg-1"></div>
    <div class="heading-2 col-10" style="padding-bottom:10px;">Site status</div>
    <div class="blank col-lg-1"></div>

    <div class="blank col-lg-1"></div>
    <div class="col-lg-10 grid-8">
        <div class="status-card card col-lg-2">
            <div class="head-1">Ongoing Events</div>
            <div class="head-2"><?= $site_data['month'] ?></div>
            <div class="status-text"><?= $site_data['ongoing_events'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Completed Events</div>
            <div class="head-2"><?= $site_data['month'] ?></div>
            <div class="status-text"><?= $site_data['completed_events'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Reg. Organizations</div>
            <div class="head-2 hidden">Month</div>
            <div class="status-text"><?= $site_data['organizations'] ?></div>
        </div>
        <div class="status-card card col-lg-2">
            <div class="head-1">Registered Users</div>
            <div class="head-2 hidden">Month</div>
            <div class="status-text"><?= $site_data['users'] ?></div>
        </div>
    </div>
    <div class="blank col-lg-1"></div>

    <!-- second section -->
    <div class="blank col-lg-1"></div>
    <div class="card col-lg-4 m-top-40" style="overflow: hidden;">
        <div class="head-donate head-1 m-bottom-20 txt-black">Donations</div>
        <div class="txt-10 w-semibold txt-al-center p-top-10"><?= $site_data['month'] ?> - <?= $site_data['year'] ?></div>
        <div class="donate-icon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="w-black txt-al-center m-top-60 txt-20"><?= $site_data['donations'] ?> LKR</div>
        <div class="w-semibold txt-al-center m-top-40 m-bottom-20 txt-08">*Last update - <?= $site_data['update_time'] ?></div>
    </div>
    <div class="card col-lg-6 p-20 m-top-40">
        <div class="head-chart1 head-1 p-bottom-10 txt-black">Most donated sites - <?= $site_data['month'] ?> <?= $site_data['year'] ?></div>
        <canvas id="myChart" class="m-top-10" style="max-height: 300px;"></canvas>
    </div>

    <div class="blank col-lg-1"></div>


    <div class="blank col-lg-1"></div>
    <div class="card p-20 col-lg-10 m-top-40 grid-8">
        <canvas class="col-lg-5" id="mychart2"></canvas>
        <div class="col-lg-3"></div>
    </div>
    <div class="blank col-lg-1"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx1 = document.getElementById('myChart');
    const ctx2 = document.getElementById('mychart2');

    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($site_data['chart_1'] as $org) : ?>
                    <?= "'" . $org->name . "'," ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                data: [
                    <?php foreach ($site_data['chart_1'] as $org) : ?>
                        <?= $org->total_donations . "," ?>
                    <?php endforeach; ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        legend: {
            display: true,
            position: 'right',
        }
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($site_data['chart_2'] as $month => $amount) : ?>
                    <?= "'" . $month . "'," ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php foreach ($site_data['chart_2'] as $month => $amount) : ?>
                        <?= $amount . "," ?>
                    <?php endforeach; ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        legend: {
            display: false,
            position: 'right',
        }
    });
</script>

<?php $this->view('includes/footer') ?>