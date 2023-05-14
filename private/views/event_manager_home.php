<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="<?=ROOT?>/assets/area.css">
<?php
$detail_fam_healthy_adults =0;
$detail_fam_diabetes_patients =0;
$detail_fam_both_patients =0;
$detail_fam_cholesterol_patients =0;
$detail_fam_less_one_children=0;
$detail_fam_less_five_children=0;
$detail_fam_higher_five_children=0;
$detail_children_less_one_children=0;
$detail_children_less_five_children=0;
$detail_children_higher_five_children=0;
$detail_elder_healthy_adults =0;
$detail_elder_diabetes_patients =0;
$detail_elder_both_patients =0;
$detail_elder_cholesterol_patients =0;
$familyies = !empty($rows4) ? count($rows4) : 0;
$childrenhomes=!empty($rows5) ?  count($rows5) : 0;
$elderhomes=!empty($rows6) ? count($rows6):0;
// echo $familyies;
// echo $elderhomes;
// echo $childrenhomes;


if (!empty($rows4)) {
// print('row1');
    $count = count($rows4);
    for ($i = 0; $i < $count; $i++) {
        $detail_fam_healthy_adults  += $rows4[$i]->healthy_adults ;
        $detail_fam_diabetes_patients += $rows4[$i]->diabetes_patients ;
        $detail_fam_both_patients  += $rows4[$i]->both_patients ;
        $detail_fam_cholesterol_patients += $rows4[$i]->cholesterol_patients;
        $detail_fam_less_one_children += $rows4[$i]->less_one_children ;
        $detail_fam_less_five_children  += $rows4[$i]->less_five_children ;
        $detail_fam_higher_five_children  += $rows4[$i]->higher_five_children ;
    }
}

if (!empty($rows5)) {
// print('row1');
    $count = count($rows5);
    for ($i = 0; $i < $count; $i++) {
        $detail_children_less_one_children += $rows5[$i]->less_one_children ;
        $detail_children_less_five_children+= $rows5[$i]->less_five_children ;
        $detail_children_higher_five_children+= $rows5[$i]->higher_five_children ;
    }
}

if (!empty($rows6)) {
// print('row1');
    $count = count($rows6);
    for ($i = 0; $i < $count; $i++) {
        $detail_elder_healthy_adults  += $rows6[$i]->Healthy_adults;
        $detail_elder_both_patients+= $rows6[$i]->both_patients;
        $detail_elder_diabetes_patients += $rows6[$i]->Diabetes_patients ;
        $detail_elder_cholesterol_patients += $rows6[$i]->cholesterol_patients;
    }
}
$All_healthy_adults=$detail_fam_healthy_adults+$detail_elder_healthy_adults;
$All_diabetes_patients=$detail_fam_diabetes_patients+$detail_elder_diabetes_patients ;
$All_both_patients=$detail_fam_both_patients+$detail_elder_both_patients ;
$All_cholesterol_patients=$detail_fam_cholesterol_patients+$detail_elder_cholesterol_patients ;
$All_less_one_children=$detail_fam_less_one_children+$detail_children_less_one_children;
$All_less_five_children=$detail_fam_less_five_children+$detail_children_less_five_children;
$All_higher_five_children=$detail_fam_higher_five_children+$detail_children_higher_five_children;
?>

    <div class="container-main">
        <div class="description">
            <div class="content">
                <p class="main">Good <?=Auth::time()?></p>
                <p class="sub1">Welcome <br><?=Auth::event_user()?><br> Back !!</p>
            </div>
        </div>
        <div class="image_section">
            <img src="images/image.png" alt="" class="main-image">
        </div>
    </div>
 
<div class="container">
  <!-- Upcoming events -->  
  <div class="blank col-lg-1"></div>
  <div class="grid-12 width-100 col-lg-12 p-20  m-top-60">
  <div class="card event-vard-i card-simple col-lg-4 grid-12">
    <div class="heading-2 col-12" style="text-align: center;">
    <div class="m-top-30"><img src="<?=ROOT?>/images/donation_1.jpg" alt="upcoming events"></div>
        <div class="m-top-30">Upcoming Events</div>
        <div class="m-top-30" style="font-size:60px"> <?php if (!empty($rows3)){echo count($rows3);}else{ echo 0;}?> </div>
    </div>
  </div>
  <div class="card event-vard-i card-simple col-lg-4 grid-12">
    <div class="heading-2 col-12" style="text-align: center;">
    <div class="m-top-30"><img src="<?=ROOT?>/images/donation_2.jpg" alt="launched events"></div>
        <div class="m-top-30">Launched Events</div>
        <div class="m-top-30" style="font-size:60px"><?php if (!empty($rows1)){echo count($rows1);}else{ echo 0;}?></div>
    </div>
  </div>
  <div class="card event-vard-i card-simple col-lg-4 grid-12">
    <div class="heading-2 col-12" style="text-align: center;">
    <div class="m-top-30"><img src="<?=ROOT?>/images/donation_4.jpg" alt="completed events"></div>
        <div class="m-top-45">Completed Events</div>
        <div class="m-top-30" style="font-size:60px"><?php if (!empty($rows2)){echo count($rows2);}else{ echo 0;}?></div>
    </div>
  </div>
  </div>

  <div class="m-top-30 col-lg-12" style="font-size:30px;font-weight:900;margin:auto">All the familes, children home and elderhome with us</div>
  <div class="blank col-lg-1"></div>
  <div class="card event-card grid-12 width-50 col-lg-12 p-20 p-top-0 m-top-60" style="margin: auto; display: flex; justify-content: center; align-items: center;">
    <!-- <div class="card event-vard-i card-simple col-lg-12 grid-12"> -->
      <div class="heading-2 col-12" style="text-align: center;">
        <div class="m-top-30 width-100"><canvas id="donees"></canvas></div> 
      </div>
    <!-- </div> -->
 </div>


    <div class="blank col-lg-1"></div>
    <div class="m-top-30 col-lg-12" style="font-size:30px;font-weight:900">Benifited peoples from completed events</div>
    <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 m-top-60" style="margin: auto; display: flex; justify-content: center; align-items: center;">
    
  <div class="card event-vard-i card-simple col-lg-4 grid-12 width-60">
    <div class="heading-2 col-12" style="text-align: center;">
    <div class="m-top-30 width-80"><canvas id="elders"></canvas></div>
    </div>
  </div>
  <div class="card event-vard-i card-simple col-lg-4 grid-12 width-60">
    <div class="heading-2 col-12" style="text-align: center;">
    <div class="m-top-30 width-80"><canvas id="children"></canvas></div>
    </div>
  </div>
  </div>

</div>

    <script>
  const chartData1 = {
    labels: ['Families', 'Childrenhomes', 'Eldershome'],
    datasets: [{
      data: [<?php echo $familyies;?>, <?php echo $childrenhomes; ?>, <?php echo $elderhomes; ?>],
      backgroundColor: [
        'rgba(127,180,50,0.6)',
      'rgba(126, 117, 172, 0.6)',
      'rgba(106,47,82, 0.6)'
      ],
      borderColor: [
        'rgba(127,180,50,0.6)',
        'rgba(126, 117, 172, 0.6)',
        'rgba(106,47,82, 0.6)'
      ],
      borderWidth: 1
    }]
  };

  const chartOptions1= {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Benifited familes, childrenhomes and elderhomes'
      }
    },
    aspectRatio: 1
  };

  const myChart1 = new Chart(document.getElementById('donees'), {
    type: 'pie',
    data: chartData1,
    options: chartOptions1
  });



  const chartData2 = {
  labels: ['Age below one', 'Age above one and below five', 'Age above five'],
  datasets: [{
    data: [<?php echo $All_less_one_children;?>, <?php echo $All_less_five_children; ?>, <?php echo $All_higher_five_children; ?>],
    backgroundColor: [
      'rgba(127,180,50,0.6)',
      'rgba(126, 117, 172, 0.6)',
      'rgba(106,47,82, 0.6)'
    ],
    borderColor: [
      'rgba(127,180,50,1)',
        'rgba(126, 117, 172, 1)',
        'rgba(106,47,82, 1)'
    ],
    borderWidth: 1
  }]
};

const chartOptions2 = {
  responsive: true,
  plugins: {
    legend: {
      display: false,
    },
    title: {
      display: true,
      text: 'Benefited children'
    }
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      },
      scaleLabel: {
        display: true,
        labelString: 'Benefited children'
      }
    }],
    xAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Type of Beneficiary'
      }
    }]
  },
  aspectRatio: 1
};

const myChart2 = new Chart(document.getElementById('children'), {
  type: 'bar',
  data: chartData2,
  options: chartOptions2
});


const chartData3 = {
    labels: ['Without cholesterol and diabetes', 'only diabetes', 'only cholesterol','with diabetes and cholesterol'],
    datasets: [{
      data: [<?php echo $All_healthy_adults;?>, <?php echo $All_cholesterol_patients; ?>, <?php echo $All_diabetes_patients; ?>,<?php echo $All_both_patients; ?>],
      backgroundColor: [
        'rgba(127,180,50,0.6)',
        'rgba(126, 117, 172, 0.6)',
        'rgba(106,47,82, 0.6)',
        'rgba(106,102,47, 0.6)'
      ],
      borderColor:[
        'rgba(127,180,50,1)',
        'rgba(126, 117, 172, 1)',
        'rgba(106,47,82, 1)',
        'rgba(106,102,47, 1)'
      ],
      borderWidth: 1
    }]
  };

  const chartOptions3 = {
  responsive: true,
  plugins: {
    legend: {
      display: false,
    },
    title: {
      display: true,
      text: 'Benefited Adults'
    }
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      },
      scaleLabel: {
        display: true,
        labelString: 'Benefited Adults'
      }
    }],
    xAxes: [{
      scaleLabel: {
        display: true,
        labelString: 'Type of Beneficiary'
      }
    }]
  },
  aspectRatio: 1
};

  const myChart3= new Chart(document.getElementById('elders'), {
    type: 'bar',
    data: chartData3,
    options: chartOptions3
  });


</script>

<?php $this->view('includes/footer')?>

