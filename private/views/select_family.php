<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/select_copy.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/add.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/background.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu');

$detail0 = array();
$detail1 = array();
$detail2 = array();
$detail3 = array();
$detail4 = array();
$detail5 = array();

if ($row1) {
  // print('row1');
  $count = count($row1);
  for ($i = 0; $i < $count; $i++) {
    $detail1[$i] = $row1[$i]->detail_id;
  }
}

if ($row0) {
  $count = count($row0);
  for ($i = 0; $i < $count; $i++) {
    $detail0[$i] = $row0[$i]->id;
  }
}
if ($row) {
  $count = count($row);
  for ($i = 0; $i < $count; $i++) {
    $detail2[$i] = $row[$i]->id;
  }
}
if ($row_2) {
  $count = count($row_2);
  for ($i = 0; $i < $count; $i++) {
    $detail3[$i] = $row_2[$i]->id;
  }
}

if ($row_3) {
  $count = count($row_3);
  for ($i = 0; $i < $count; $i++) {
    $detail4[$i] = $row_3[$i]->id;
  }
}
// print_r($detail1);
// print_r($detail2);
// print_r($detail3);
// print_r($detail4);
?>

<div class="container2">
  <div class="heading-1 col-12">Select familes here</div>
  <div class="table-container2 col-12">
        <table>
            <thead>
            <tr>
                <th><i class="fa-regular fa-hand-pointer"></i><?php echo ' Selected families'?> <span class="gray">
                  <?php if (is_array($row1) && !empty($row1)) {
                            echo count($row1);
                        } else{echo "0";}?></span></th>
                <th><i class="fa-regular fa-hand-pointer"></i><?php echo " Selected children's home"?> <span class="gray">
                  <?php if (is_array($row2) && !empty($row2)) {
                            echo count($row2);
                        } else{echo "0";}?></span></th>
                <th><i class="fa-regular fa-hand-pointer"></i><?php echo " Selected elders' home"?> <span class="gray">
                  <?php if (is_array($row3) && !empty($row3)) {
                            echo count($row3);
                        } else{echo "0";}?></span></th>
            </tr>
            </thead>
        </table>
      </div>
  <div class="col-12 divide_to_months">Selected families</div>
  <?php
      $i=0;
            if($row0){
                $count=count($row0);
                while($count>0){?>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back">
    <div class="div col-3 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">Index</div>
        <div class="details col-4 tr3">Family <?=$row0[$i]->id?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">District</div>
        <div class="details col-4 tr3"><?=$row0[$i]->district?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">City</div>
        <div class="details col-4 tr3"><?=$row0[$i]->area?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Members</div>
        <div class="details col-4 tr3"><?=$row0[$i]->familymembers?></div>
      </div>
    </div>
    
    
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Adults</div>
        <div class="details col-4 tr3"><?=$row0[$i]->adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
        <div class="details col-4 tr3"><?=$row0[$i]->healthy_adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row0[$i]->both_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
        <div class="details col-4 tr3"><?=$row0[$i]->diabetes_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row0[$i]->cholesterol_patients?></div>
      </div>
    </div>
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Children</div>
        <div class="details col-4 tr3"><?=$row0[$i]->children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
        <div class="details col-4 tr3"><?=$row0[$i]->less_one_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children above 1 and below 5</div>
        <div class="details col-4 tr3"><?=$row0[$i]->less_five_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
        <div class="details col-4 tr3"><?=$row0[$i]->higher_five_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <form  method="POST" id="select_details" class="select_details">
          <input type="hidden" value="<?=$event?>" name="eid">
          <input type="hidden" value="<?=$row0[$i]->id?>" name="id">

        </form>
      </div>
    </div>
      <div class="div col-1 m-top-15" style="margin: auto;">
        <div class="m-bottom-10 m-top-15">
      <?php
      $index1=in_array(($row0[$i]->id),$detail0);
      if($index1){?>
      <a href="<?=ROOT?>/select_family/delete?deleteid=<?=$row0[$i]->uniqueid?>&eid=<?=$event?>" title="Delete">
      <i class="fa-solid fa-circle-minus fa-xl" style="color: #98c03c;"></i></a>
      <?php
      }
      ?>
      </div>
    </div>
  </div>
  <?php $count--;
    $i++;
  }
  } else { ?>
      <div class="No_detail col-12">No Families</div>
  <?php }
  ?>



<div class="col-12 divide_to_months">Selected Within 3 months</div>
  <?php
      $i=0;
            if($row){
                $count=count($row);
                while($count>0){
                  $index0=in_array(($row[$i]->id),$detail1);
                  if(!$index0){?>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back ">
    <div class="div col-3 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">Index</div>
        <div class="details col-4 tr3">Family <?=$row[$i]->id?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">District</div>
        <div class="details col-4 tr3"><?=$row[$i]->district?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">City</div>
        <div class="details col-4 tr3"><?=$row[$i]->area?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Members</div>
        <div class="details col-4 tr3"><?=$row[$i]->familymembers?></div>
      </div>
    </div>
    
    
    
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Adults</div>
        <div class="details col-4 tr3"><?=$row[$i]->adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
        <div class="details col-4 tr3"><?=$row[$i]->healthy_adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row[$i]->both_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
        <div class="details col-4 tr3"><?=$row[$i]->diabetes_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row[$i]->cholesterol_patients?></div>
      </div>
    </div>
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Children</div>
        <div class="details col-4 tr3"><?=$row[$i]->children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
        <div class="details col-4 tr3"><?=$row[$i]->less_one_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children above 1 and below 5</div>
        <div class="details col-4 tr3"><?=$row[$i]->less_five_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
        <div class="details col-4 tr3"><?=$row[$i]->higher_five_children?></div>
      </div>
    </div>
    <div class="div col-1 m-top-15" style="margin: auto;">
        <div class="m-bottom-10 m-top-15" >
        <form  method="POST" id="select_details1" class="select_details1">
          <input type="hidden" value="<?=$event?>" name="eid">
          <input type="hidden" value="<?=$row[$i]->id?>" name="id">
          <?php
         
          $index1=in_array(($row[$i]->id),$detail1);
          
          if(!$index1){?>
            <div onclick="select_detail_sub1()">
                <i class="fa-solid fa-circle-plus fa-xl" style="color: #98c03c;"></i>
            </div>
            <?php
          }
          ?>

        </form>
      </div>
    </div>
  </div>
  <?php 
            }
            $count--;
            $i++;
          }
        
      } else { ?>
      <div class="No_detail col-12">No Families</div>
  <?php } ?>


  <div class="col-12 divide_to_months">Selected Within 6 months</div>
  
  <?php
      $i=0;
      if($row_2){
          $count=count($row_2);
          while($count>0){
            $index2=in_array(($row_2[$i]->id),$detail2);
            if(!$index2){?>
              <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back">
                <div class="div col-3 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">Index</div>
                    <div class="details col-4 tr3">Family <?=$row_2[$i]->id?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">District</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->district?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">City</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->area?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Members</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->familymembers?></div>
                  </div>
                </div>

                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Adults</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->healthy_adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->both_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->diabetes_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->cholesterol_patients?></div>
                  </div>
                </div>

                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Children</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->less_one_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children above 1 and below 5</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->less_five_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
                    <div class="details col-4 tr3"><?=$row_2[$i]->higher_five_children?></div>
                  </div>
                </div>

                <div class="div col-1 m-top-15" style="margin: auto;">
                  <div class="m-bottom-10 m-top-15" >
                    <form  method="POST" id="select_details2" class="select_details2">
                      <input type="hidden" value="<?=$event?>" name="eid">
                      <input type="hidden" value="<?=$row_2[$i]->id?>" name="id">
                      <?php
                    
                      $index1=in_array(($row_2[$i]->id),$detail1);
                      
                      if(!$index1){?>
                        <div onclick="select_detail_sub2()">
                            <i class="fa-solid fa-circle-plus fa-xl" style="color: #98c03c;"></i>
                        </div>
                        <?php
                      }
                      ?>
                    </form>
                  </div>
                </div>
              </div>
              <?php 
            }
            $count--;
            $i++;
          }
        
      } else { ?>
      <div class="No_detail col-12">No Families</div>
  <?php } ?>


  <div class="col-12 divide_to_months">Selected Within 12 months</div>
  <?php
      $i=0;
      if($row_3){
          $count=count($row_3);
          while($count>0){
            $index3=in_array(($row_3[$i]->id),$detail2);
            $index4=in_array(($row_3[$i]->id),$detail3);
            if(!$index3 && !$index4){?>
              <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back">
                <div class="div col-3 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">Index</div>
                    <div class="details col-4 tr3">Family <?=$row_3[$i]->id?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">District</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->district?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">City</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->area?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Members</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->familymembers?></div>
                  </div>
                </div>

                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Adults</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->healthy_adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->both_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->diabetes_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->cholesterol_patients?></div>
                  </div>
                </div>

                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Children</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->less_one_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children above 1 and below 5</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->less_five_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
                    <div class="details col-4 tr3"><?=$row_3[$i]->higher_five_children?></div>
                  </div>
                </div> 
                    
                  <div class="div col-1 m-top-15" style="margin: auto;">
                    <div class="m-bottom-10 m-top-15" >
                    <form  method="POST" id="select_details3" class="select_details3">
                      <input type="hidden" value="<?=$event?>" name="eid">
                      <input type="hidden" value="<?=$row_3[$i]->id?>" name="id">
                      <?php
                    
                      $index1=in_array(($row_3[$i]->id),$detail1);
                      
                      if(!$index1){?>
                        <div onclick="select_detail_sub3()">
                            <i class="fa-solid fa-circle-plus fa-xl" style="color: #98c03c;"></i>
                        </div>
                        <?php
                      }
                      ?>
                    </form>
                  </div>
                </div>
              </div>
              <?php 
            }
            $count--;
            $i++;
          }
      } else { ?>
      <div class="No_detail col-12">No Families</div>
  <?php }?>


  <div class="col-12 divide_to_months">Selected Within years ago</div>
  <?php
      $i=0;
      if($row_4){
          $count=count($row_4);
          while($count>0){
            $index3=in_array(($row_4[$i]->id),$detail2);
            $index4=in_array(($row_4[$i]->id),$detail3);
            $index5=in_array(($row_4[$i]->id),$detail4);
            if(!$index3 && !$index4 && !$index5){?>
              <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back">
                <div class="div col-3 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">Index</div>
                    <div class="details col-4 tr3">Family <?=$row_4[$i]->id?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">District</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->district?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">City</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->area?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Members</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->familymembers?></div>
                  </div>
                </div>
                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Adults</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->healthy_adults?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->both_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->diabetes_patients?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->cholesterol_patients?></div>
                  </div>
                </div>

                <div class="div col-4 m-top-15">
                  <div class="event-att gap30 txt-09 ">
                    <div class="title w-semibold col-4 p-right-15">No of Children</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->less_one_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children above 1 anad below 5</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->less_five_children?></div>
                  </div>
                  <div class="event-att gap30 txt-09 m-top-15">
                    <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
                    <div class="details col-4 tr3"><?=$row_4[$i]->higher_five_children?></div>
                  </div>
                </div> 
                    
                <div class="div col-1 m-top-15" style="margin: auto;">
                    <div class="m-bottom-10 m-top-15" >
                    <form  method="POST" id="select_details4" class="select_details4">
                      <input type="hidden" value="<?=$event?>" name="eid">
                      <input type="hidden" value="<?=$row_4[$i]->id?>" name="id">
                      <?php
                    
                      $index1=in_array(($row_4[$i]->id),$detail1);
                      
                      if(!$index1){?>
                        <div onclick="select_detail_sub4()">
                            <i class="fa-solid fa-circle-plus fa-xl" style="color: #98c03c;"></i>
                        </div>
                        <?php
                      }
                      ?>
                    </form>
                  </div>
                 
                </div>
              </div>
              <?php 
            }
            $count--;
            $i++;
          }
        } else { ?>
            <div class="No_detail col-12">No Families</div>
        <?php }
        ?>


  <div class="col-12 divide_to_months">Never Selected</div>
  <?php
      $i=0;
            if($row_5){
                $count=count($row_5);
                while($count>0){?>
  <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0 back">
    <div class="div col-3 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">Index</div>
        <div class="details col-4 tr3">Family <?=$row_5[$i]->id?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">District</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->district?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">City</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->area?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Members</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->familymembers?></div>
      </div>
    </div>
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Adults</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Patients without Diabetes and Cholesterol</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->healthy_adults?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes and Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->both_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Diabetes patients</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->diabetes_patients?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Cholesterol patients</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->cholesterol_patients?></div>
      </div>
    </div>
    <div class="div col-4 m-top-15">
      <div class="event-att gap30 txt-09 ">
        <div class="title w-semibold col-4 p-right-15">No of Children</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age below 1</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->less_one_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children above 1 and below 5</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->less_five_children?></div>
      </div>
      <div class="event-att gap30 txt-09 m-top-15">
        <div class="title w-semibold col-4 p-right-15">Children age above 5</div>
        <div class="details col-4 tr3"><?=$row_5[$i]->higher_five_children?></div>
      </div>
    </div> 
                    
    <div class="div col-1 m-top-15" style="margin: auto;">
        <div class="m-bottom-10 m-top-15" >
        <form  method="POST" id="select_details5" class="select_details5">
          <input type="hidden" value="<?=$event?>" name="eid">
          <input type="hidden" value="<?=$row_5[$i]->id?>" name="id">
          <?php
         
          $index1=in_array(($row_5[$i]->id),$detail1);
          
          if(!$index1){?>
            <div onclick="select_detail_sub5()">
                <i class="fa-solid fa-circle-plus fa-xl" style="color: #98c03c;"></i>
            </div>
            <?php
          }
          ?>
        </form>
      </div>
    </div>
  </div>
  <?php $count--;
    $i++;
      }
  } else { ?>
      <div class="No_detail col-12">No Families</div>
  <?php }
  ?>
</div>
<div class="button-row">
    <a href="javascript:history.back()">
    <button class="button">Back</button>
    </a>
    <a href="<?=ROOT?>/select_elders?eid=<?=$event?>">
    <button class="button">Select Elders</button>
    </a>
    <a href="<?=ROOT?>/select_childrenhome?eid=<?=$event?>">
            <button class="button">Select children home</button>
            </a>
    <a href="<?=ROOT?>/event_budget?eid=<?=$event?>">
    <button class="button">Next<i class="fa-solid fa-angles-right"></i></button>
    </a>
</div>

<script src=" <?=ROOT?>/assets/select_details.js"></script>
<?php $this->view('includes/footer') ?>