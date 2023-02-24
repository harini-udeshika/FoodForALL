<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/chart.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu');?>

<div class="chart-1">
  <canvas id="myChart" ></canvas> 
  <canvas id="myChart_2" ></canvas>
</div>
<script src=" navbar.js"></script>
<h1 id='h1'></h1>
<?php $this->view('includes/footer')?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?=ROOT?>/assets/chart.js"></script>
</body>
