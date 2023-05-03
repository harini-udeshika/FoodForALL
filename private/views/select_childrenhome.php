<?php $this->view('includes/header') ?>
<?php $this->view('includes/navbar') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/select_copy.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/add.css">

<?php $this->view('includes/submenu');
$detail1 = array();
$detail2 = array();
$detail3 = array();
$detail4 = array();
$detail5 = array();

if ($row2) {
// print('row1');
    $count = count($row2);
    for ($i = 0; $i < $count; $i++) {
        $detail1[$i] = $row2[$i]->detail_id;
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

if ($row_4) {
    $count = count($row_4);
    for ($i = 0; $i < $count; $i++) {
        $detail5[$i] = $row_4[$i]->id;
    }
}
// print_r($detail1);
// print_r($detail2);
// print_r($detail3);
// print_r($detail4);
// print_r($detail5);
?>



<div class="container2">
    <div class="heading-1 col-12">Select Children's Homes here</div>
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
  <div class="col-12 divide_to_months">Selected Within 3 months</div>
<?php
        $i=0;
        if($row){
            $count=count($row);
            while($count>0){?>
                
                <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0">
                    <div class="div col-6 m-top-15">
                        <div class="m-bottom-10 m-top-15">
                        <div class="event-att gap30 txt-09 ">
                            <div class="title w-semibold col-4 p-right-15">Index</div>
                            <div class="details col-4 tr3">Childrenhome <?=$row[$i]->id?></div>
                        </div>
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
                            <div class="details col-4 tr3"><?=$row[$i]->children_num?></div>
                        </div>
                    </div>

                    <div class="div col-6 m-top-15">
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_one_children</div>
                            <div class="details col-2 tr3"><?=$row[$i]->less_one_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_five_children</div>
                            <div class="details col-2 tr3"><?=$row[$i]->less_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">higher_five_children</div>
                            <div class="details col-2 tr3"><?=$row[$i]->higher_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <form  method="POST" id="select_details" class="select_details">
                                <input type="hidden" value="<?=$event?>" name="eid">
                                <input type="hidden" value="<?=$row[$i]->id?>" name="id">
                                <?php
                                $index1=in_array(($row[$i]->id),$detail1);
                                if(!$index1){?>
                                <button class="btn btn-xsm btn-block btn-green m-bottom-10 selectbtn " type="submit" > 
                                Select
                                </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                        <?php
                        if($index1){?>
                        <a href="<?=ROOT?>/select_childrenhome/delete?deleteid=<?=$row[$i]->uniqueid?>&eid=<?=$event?>" title="Delete">
                        <button class="btn btn-xsm btn-block btn-black m-bottom-10 selectbtn">Selected</button></a>
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
                    <div class="No_detail col-12">No Children Homes</div>
                <?php }
                ?>

<div class="col-12 divide_to_months">Selected Within 6 months</div>
    <?php
        $i=0;
        if($row_2){
            $count=count($row_2);
            while($count>0){
                $index2=in_array(($row_2[$i]->id),$detail2);
                if(!$index2){?>
                    <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0">
                        <div class="div col-6 m-top-15">
                            <div class="m-bottom-10 m-top-15">
                            <div class="event-att gap30 txt-09 ">
                                <div class="title w-semibold col-4 p-right-15">Index</div>
                                <div class="details col-4 tr3">Childrenhome <?=$row_2[$i]->id?></div>
                            </div>
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
                                <div class="details col-4 tr3"><?=$row_2[$i]->children_num?></div>
                            </div>
                        </div>

                        <div class="div col-6 m-top-15">
                            <div class="event-att gap30 txt-09 m-top-15">
                                <div class="title w-semibold col-4 p-right-15">less_one_children</div>
                                <div class="details col-2 tr3"><?=$row_2[$i]->less_one_children?></div>
                            </div>
                            <div class="event-att gap30 txt-09 m-top-15">
                                <div class="title w-semibold col-4 p-right-15">less_five_children</div>
                                <div class="details col-2 tr3"><?=$row_2[$i]->less_five_children?></div>
                            </div>
                            <div class="event-att gap30 txt-09 m-top-15">
                                <div class="title w-semibold col-4 p-right-15">higher_five_children</div>
                                <div class="details col-2 tr3"><?=$row_2[$i]->higher_five_children?></div>
                            </div>
                            <div class="event-att gap30 txt-09 m-top-15">
                                <form  method="POST" id="select_details" class="select_details">
                                    <input type="hidden" value="<?=$event?>" name="eid">
                                    <input type="hidden" value="<?=$row_2[$i]->id?>" name="id">
                                    <?php
                                    $index1=in_array(($row_2[$i]->id),$detail1);
                                    if(!$index1){?>
                                    <button class="btn btn-xsm btn-block btn-green m-bottom-10 selectbtn " type="submit" > 
                                    Select
                                    </button>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                            <div class="event-att gap30 txt-09 m-top-15">
                            <?php
                            if($index1){?>
                            <a href="<?=ROOT?>/select_childrenhome/delete?deleteid=<?=$row_2[$i]->uniqueid?>&eid=<?=$event?>" title="Delete">
                            <button class="btn btn-xsm btn-block btn-black m-bottom-10 selectbtn">Selected</button></a>
                            <?php
                            }
                            ?>
                            </div>   
                        </div>    
                    </div>
                    <?php
                } 
                    $count--;
                    $i++;
                    }
                } else { ?>
                    <div class="No_detail col-12">No Children Homes</div>
                <?php }
                ?>


<div class="col-12 divide_to_months">Selected Within 12 months</div>

<?php
    $i=0;
    if($row_3){
        $count=count($row_3);
        while($count>0){
            $index3=in_array(($row_3[$i]->id),$detail2);
            $index4=in_array(($row_3[$i]->id),$detail3);
            if(!$index3 && !$index4){?>
                <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0">
                    <div class="div col-6 m-top-15">
                        <div class="m-bottom-10 m-top-15">
                        <div class="event-att gap30 txt-09 ">
                            <div class="title w-semibold col-4 p-right-15">Index</div>
                            <div class="details col-4 tr3">Childrenhome <?=$row_3[$i]->id?></div>
                        </div>
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
                            <div class="details col-4 tr3"><?=$row_3[$i]->children_num?></div>
                        </div>
                    </div>

                    <div class="div col-6 m-top-15">
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_one_children</div>
                            <div class="details col-2 tr3"><?=$row_3[$i]->less_one_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_five_children</div>
                            <div class="details col-2 tr3"><?=$row_3[$i]->less_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">higher_five_children</div>
                            <div class="details col-2 tr3"><?=$row_3[$i]->higher_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <form  method="POST" id="select_details" class="select_details">
                                <input type="hidden" value="<?=$event?>" name="eid">
                                <input type="hidden" value="<?=$row_3[$i]->id?>" name="id">
                                <?php
                                $index1=in_array(($row_3[$i]->id),$detail1);
                                if(!$index1){?>
                                <button class="btn btn-xsm btn-block btn-green m-bottom-10 selectbtn " type="submit" > 
                                Select
                                </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                        <?php
                        if($index1){?>
                        <a href="<?=ROOT?>/select_childrenhome/delete?deleteid=<?=$row_3[$i]->uniqueid?>&eid=<?=$event?>" title="Delete">
                        <button class="btn btn-xsm btn-block btn-black m-bottom-10 selectbtn">Selected</button></a>
                        <?php
                        }
                        ?>
                        </div>   
                    </div>    
                </div>
                <?php
            } 
                $count--;
                $i++;
                }
            } else { ?>
                <div class="No_detail col-12">No Children Homes</div>
            <?php }
            ?>


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
                <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0">
                    <div class="div col-6 m-top-15">
                        <div class="m-bottom-10 m-top-15">
                        <div class="event-att gap30 txt-09 ">
                            <div class="title w-semibold col-4 p-right-15">Index</div>
                            <div class="details col-4 tr3">Childrenhome <?=$row_4[$i]->id?></div>
                        </div>
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
                            <div class="details col-4 tr3"><?=$row_4[$i]->children_num?></div>
                        </div>
                    </div>

                    <div class="div col-6 m-top-15">
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_one_children</div>
                            <div class="details col-2 tr3"><?=$row_4[$i]->less_one_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">less_five_children</div>
                            <div class="details col-2 tr3"><?=$row_4[$i]->less_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <div class="title w-semibold col-4 p-right-15">higher_five_children</div>
                            <div class="details col-2 tr3"><?=$row_4[$i]->higher_five_children?></div>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                            <form  method="POST" id="select_details" class="select_details">
                                <input type="hidden" value="<?=$event?>" name="eid">
                                <input type="hidden" value="<?=$row_4[$i]->id?>" name="id">
                                <?php
                                $index1=in_array(($row_4[$i]->id),$detail1);
                                if(!$index1){?>
                                <button class="btn btn-xsm btn-block btn-green m-bottom-10 selectbtn " type="submit" > 
                                Select
                                </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <div class="event-att gap30 txt-09 m-top-15">
                        <?php
                        if($index1){?>
                        <a href="<?=ROOT?>/select_childrenhome/delete?deleteid=<?=$row_4[$i]->uniqueid?>&eid=<?=$event?>" title="Delete">
                        <button class="btn btn-xsm btn-block btn-black m-bottom-10 selectbtn">Selected</button></a>
                        <?php
                        }
                        ?>
                        </div>   
                    </div>    
                </div>
                <?php
            } 
                $count--;
                $i++;
                }
            } else { ?>
                <div class="No_detail col-12">No Children Homes</div>
            <?php }
            ?>


<div class="col-12 divide_to_months">Never Selected</div>
<?php
    $i=0;
    if($row_5){
        $count=count($row_5);
        while($count>0){?>
            <div class="card event-card grid-12 width-100 col-lg-12 p-20 p-top-0">
                <div class="div col-6 m-top-15">
                    <div class="m-bottom-10 m-top-15">
                    <div class="event-att gap30 txt-09 ">
                        <div class="title w-semibold col-4 p-right-15">Index</div>
                        <div class="details col-4 tr3">Childrenhome <?=$row_5[$i]->id?></div>
                    </div>
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
                        <div class="details col-4 tr3"><?=$row_5[$i]->children_num?></div>
                    </div>
                </div>

                <div class="div col-6 m-top-15">
                    <div class="event-att gap30 txt-09 m-top-15">
                        <div class="title w-semibold col-4 p-right-15">less_one_children</div>
                        <div class="details col-2 tr3"><?=$row_5[$i]->less_one_children?></div>
                    </div>
                    <div class="event-att gap30 txt-09 m-top-15">
                        <div class="title w-semibold col-4 p-right-15">less_five_children</div>
                        <div class="details col-2 tr3"><?=$row_5[$i]->less_five_children?></div>
                    </div>
                    <div class="event-att gap30 txt-09 m-top-15">
                        <div class="title w-semibold col-4 p-right-15">higher_five_children</div>
                        <div class="details col-2 tr3"><?=$row_5[$i]->higher_five_children?></div>
                    </div>
                    <div class="event-att gap30 txt-09 m-top-15">
                        <form  method="POST" id="select_details" class="select_details">
                            <input type="hidden" value="<?=$event?>" name="eid">
                            <input type="hidden" value="<?=$row_5[$i]->id?>" name="id">
                            <?php
                            $index1=in_array(($row_5[$i]->id),$detail1);
                            if(!$index1){?>
                            <button class="btn btn-xsm btn-block btn-green m-bottom-10 selectbtn " type="submit" > 
                            Select
                            </button>
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
                <div class="No_detail col-12">No Children Homes</div>
            <?php }
            ?>
        </div>  
        <div class="button-row">
            <a href="javascript:history.back()">
            <button class="button">Back</button>
            </a>
            <a href="<?=ROOT?>/select_family?eid=<?=$event?>">
            <button class="button">Select family</button>
            </a>
            <a href="<?=ROOT?>/select_elders?eid=<?=$event?>">
            <button class="button">Select elders' home</button>
            </a>
            <a href="<?=ROOT?>/event_budget?eid=<?=$event?>">
            <button class="button">Next<i class="fa-solid fa-angles-right"></i></button>
            </a>
        </div>

<?php $this->view('includes/footer') ?>