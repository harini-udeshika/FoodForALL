<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/chart.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu');?>
<h1>User Statistics</h1>
<div class="headings">
<p>So far this year, your activity has been...</p><p>Overall activity</p>
</div>
<div class="charts">
  
  <canvas id="myChart" class="chart1"></canvas> 
  <canvas id="myChart_2" class="chart2" ></canvas>
</div>


<?php $this->view('includes/footer')?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?=ROOT?>/assets/chart.js"></script>
</body>
 