<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/budget.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css">
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');

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

$budget1=0;
$budget2=0;

if ($row1) {
// print('row1');
    $count = count($row1);
    for ($i = 0; $i < $count; $i++) {
        $detail_fam_healthy_adults  += $row1[$i]->healthy_adults ;
        $detail_fam_diabetes_patients += $row1[$i]->diabetes_patients ;
        $detail_fam_both_patients  += $row1[$i]->both_patients ;
        $detail_fam_cholesterol_patients += $row1[$i]->cholesterol_patients;
        $detail_fam_less_one_children += $row1[$i]->less_one_children ;
        $detail_fam_less_five_children  += $row1[$i]->less_five_children ;
        $detail_fam_higher_five_children  += $row1[$i]->higher_five_children ;
    }
}

if ($row2) {
// print('row1');
    $count = count($row2);
    for ($i = 0; $i < $count; $i++) {
        $detail_children_less_one_children += $row2[$i]->less_one_children ;
        $detail_children_less_five_children+= $row2[$i]->less_five_children ;
        $detail_children_higher_five_children+= $row2[$i]->higher_five_children ;
    }
}

if ($row3) {
// print('row1');
    $count = count($row3);
    for ($i = 0; $i < $count; $i++) {
        $detail_elder_healthy_adults  += $row3[$i]->Healthy_adults;
        $detail_elder_both_patients+= $row3[$i]->both_patients;
        $detail_elder_diabetes_patients += $row3[$i]->Diabetes_patients ;
        $detail_elder_cholesterol_patients += $row3[$i]->cholesterol_patients;
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

<div class="coor">
    <h1>Event Budget-<?=$row[0]->name?> </h1>
</div>
<div class="containor2">
    <div class="form_background form_background2">

        <form  method="POST" id="childrenform" name="childrenform">
        <div class="coor2">
            <h1>Adults</h1>
        </div>
    
        <div class="box1 filling ">
        <table>
            <tr class="tr1">
                <td class="childrenbox">
                    <div class="t"><label for="Less_one_children">Adults without diabetes or cholesterol</label></div>
                    <div class="input_budget"><input type="number"  name="Adults without diabetes or cholesterol" class="in new fillingbox input_budget" id="lo" value="<?=$All_healthy_adults?>" readonly></div>
                </td>
                <td class="childrenbox">
                    <div class="t"><label for="Less_five_children">Adults with diabetes </label></div><br>
                    <div class="input_budget"><input type="number" name="Adults with diabetes" class="in new fillingbox input_budget" id="lf" value="<?=$All_diabetes_patients?>"readonly></div>
                </td>
                <td class="childrenbox">
                    <div class="t"><label for="Higher_five_children">Adults with cholesterol patients</label></div>
                    <div class="input_budget"><input type="number"min='0' name="Adults with cholesterol patients" class="in new fillingbox input_budget" id="hf" value="<?=$All_cholesterol_patients?>" readonly></div>
                </td>
                <td class="childrenbox">
                    <div class="t"><label for="Higher_five_children">Adults with diabetes and cholesterol</label></div>
                    <div class="input_budget"><input type="number"min='0' name="Adults with diabetes and cholesterol" class="in new fillingbox input_budget" id="hf" value="<?=$All_both_patients?>" readonly></div>
                </td>
            </tr>  
        </table> 
        </div>

        <div class="coor2">
            <h1>Children</h1>
        </div>
    
        <div class="box1 filling ">
        <table>
            <tr class="tr1">
                <td class="childrenbox">
                    <div class="t"><label for="Less_one_children">Age of the children less than 1</label></div>
                    <div class="input_budget"><input type="number"   name="Less_one_children" class="in new fillingbox input_budget" id="lo" value="<?=$All_less_one_children?>" readonly></div>
                </td>
                <td class="childrenbox">
                    <div class="t"><label for="Less_five_children">Age of the children less than 5</label></div>
                    <div class="input_budget"><input type="number" name="Less_five_children" class="in new fillingbox input_budget" id="lf" value="<?=$All_less_five_children?>" readonly></div>
                </td>
                <td class="childrenbox">
                    <div class="t"><label for="Higher_five_children">Age of the children greater than 5</label></div>
                    <div class="input_budget"><input type="number" name="Higher_five_children" class="in new fillingbox input_budget" id="hf" value="<?=$All_higher_five_children?>" readonly></div>
                </td>
            </tr>  
        </table> 
        </div>
                 
        <!-- <div class="box box1">
            <button type="submit" name="Enter">Submit</button>
        </div><br> -->
               
        </form>

        <!-- packages from the organaization-->

        <div class="coor3">
            <h1>Packages</h1>
        </div>
        <form method="post" id="organize_packges" name="organize_packges">
        <div class="container">
        
            <div class="col-lg-12 grid-12 p-20 m-bottom-20 card " style="height: 560px; overflow: auto; ">
            
            <?php
            
            $i = 0;
            if ($food_pack) {
                $count = count($food_pack);
                // echo $count;
                while ($count > 0) {?>
                    <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                        <div class="txt-11 w-semibold"><?php echo $food_pack[$i]->package_name ?></div>

                        <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                        <div class="card-simple p-20 m-lr-auto grid-9">
                            <div class="txt-09 col-3 txt-black w-medium">Item</div>
                            <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                            <div class="txt-09 col-3 txt-black w-medium">Unit price</div>

                            <?php
                            $tot = 0;
                            $price_arr = explode(',', $food_pack[$i]->item_price);
                            $item_arr = explode(',', $food_pack[$i]->item_name);
                            $quantity_arr = explode(',', $food_pack[$i]->quantity);
                            $selectted_org_pack_quantity_arr = explode(',', $food_pack[0]->selected_package_org_quantity);
                            
                            
                            foreach ($item_arr as $key => $i_name) {
                            ?>
                                <div class="txt-09 col-3 txt-gray"><?php echo $i_name ?></div>
                                <div class="txt-09 col-3 txt-gray"><?php echo $quantity_arr[$key] ?></div>
                                <div class="txt-09 col-3 txt-gray"><?php echo $price_arr[$key] ?></div>

                            <?php
                                $tot = $tot + $price_arr[$key] * $quantity_arr[$key];
                            }
                            ?>
                        </div>

                        <div class="row txt-al-center p-top-20">
                            <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Package Cost</div>
                            <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num"><?php echo $tot?></div>
                        </div>
                        <?php
                        // $selected_package_quantity_arr = explode(',', $food_pack->selected_package_org_quantity);
                        // print_r($selectted_org_pack_quantity_arr );?>
                            <div class="row txt-al-center p-top-20">
                                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Quantity</div>
                                <input type="text" class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num text-size"  name="quantity_new[]" value="<?php echo $selectted_org_pack_quantity_arr[$i]; ?>">
                                <?php $budget_pack[$i]=$selectted_org_pack_quantity_arr[$i]*$tot;?>
                                <input type="hidden"  value=<?=$food_pack[$i]->package_id?> name="pack_new[]">
                                <input type="hidden" value=<?=$tot?> name='price_new[]'>
                                
                            </div>
                        

                        
 
                    </div>
                <?php

                    
                    $count--;
                    $i++;
                }
                
                
            
            } else {
                ?>
                <div class="No_detail">No packages are Available</div>
            <?php
            }
            ?>
            <?php 
            $count1 = count($food_pack);
            // print_r($count1);
            for($i=0;$i<$count1;$i++){
                    $budget1+= $budget_pack[$i];
                }?>
            

            
            </div>
            <div>
                <div onclick="document.getElementById('organize_packges').submit();" style="margin-left:30%;">
                <input type="submit" name="organize_packges" class="btn btn-sm btn-purple col-6" value="save quantity">
                </div>
                
            
            
             <!-- <button type="submit" >submit</button> -->
            </div>
        </div> 

        </form>
        <div class="coor3">
            <h1>Add packages  and other expences package</h1>
        </div>
        <form method="post" id="eventmanager_packges" name="eventmanager_packges">
        <div class="container">

            <div class="col-lg-12 grid-12 p-20 m-bottom-20 card " style="height: 560px; overflow: auto;">

            <?php
            $i = 0;
            
            if ($package_data) {
                $count = sizeof($package_data);

                while ($count > 0) {
            ?>
                    <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                        <div class="txt-11 w-semibold"><?php echo $package_data[$i]->package_name ?></div>

                        <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                        <div class="card-simple p-20 m-lr-auto grid-9">
                            <div class="txt-09 col-3 txt-black w-medium">Item</div>
                            <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                            <div class="txt-09 col-3 txt-black w-medium">Unit price</div>

                            <?php
                            $tot = 0;
                            $price_arr = explode(',', $package_data[$i]->item_price);
                            $item_arr = explode(',', $package_data[$i]->item_name);
                            $quantity_arr = explode(',', $package_data[$i]->quantity);
                            $selectted_event_pack_quantity_arr = explode(',', $package_data[0]->selected_package_event_quantity);
                            foreach ($item_arr as $key => $i_name) {
                            ?>
                                <div class="txt-09 col-3 txt-gray"><?php echo $i_name ?></div>
                                <div class="txt-09 col-3 txt-gray"><?php echo $quantity_arr[$key] ?></div>
                                <div class="txt-09 col-3 txt-gray"><?php echo $price_arr[$key] ?></div>

                            <?php
                                $tot = $tot + $price_arr[$key] * $quantity_arr[$key];
                            }
                            ?>
                        </div>

                        <div class="row txt-al-center p-top-20">
                            <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Package Cost</div>
                            <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num"><?php echo $tot ?></div>
                        </div>
                        
                        <div class="row txt-al-center p-top-20">
                            <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Quntity</div>
                            <input type="text" class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num text-size" name="package_quantity[]" value=<?=$package_data[$i]->package_quantity?>>
                            <input type="hidden" value='<?=$package_data[$i]->package_id?>' name="package_id[]">
                            <?php $budget_pack2[$i]=($package_data[$i]->package_quantity)*$tot;?>
                        </div>

                        <div class="row p-top-20">
                            <button class="btn btn-sm btn-gray col-6">edit</button>
                            <a href="<?= ROOT ?>/event_budget/handle_pack_delete?id=<?= $package_data[$i]->package_id ?>">
                                <button class="btn btn-sm btn-purple col-6">remove</button>
                            </a>
                        </div>
                    </div>
                    
                <?php

                    $i++;
                    $count--;
                }
                
            } 
            
            else {
                ?>
                <div class="heading-3 col-12">No Packages Added</div>
            <?php
            }
            ?>

            <?php 
            $count2 = count($package_data);
            // print_r($count2);
            for($i=0;$i<$count2;$i++){
                    $budget2+= $budget_pack2[$i];
                }?>


           </div>
           <div>
                <div onclick="document.getElementById('eventmanager_packges').submit();" style="margin-left:30%;">
                <input type="submit" name="eventmanager_packges" class="btn btn-sm btn-purple col-6" value="save quantity">
                </div>
                
            
            
             <!-- <button type="submit" >submit</button> -->
            </div>
        </div>
        </form>

        <div class="coor3">
            <h1>Add package</h1>
        </div>
        <div class="container">

            <div class="col-sm-12 grid-12 p-20 m-bottom-20 card col-lg-6  " style="height: 560px; overflow: auto;">
            

            <div class="card col-lg-12 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
                <form action="" method="post" name="new_form">
                    <input class="txt-11 w-semibold package_name_input" name="pack_name" type="text" style="border: solid gray 1px;" placeholder="Package name">


                    <div class="flex al-center jf-btwn p-10 p-top-28 p-bottom-15">
                        <div class="txt-purple txt-10 txt-al-left ">Package items</div>
                        <i id="add_package_items" class="fa-sharp fa-solid fa-square-plus txt-20" onclick="addInputField()" style="cursor:pointer;"></i>
                    </div>

                    <div id="field_holder" class="card-simple p-3 m-lr-auto">
                        <div class="m-lr-auto grid-10 p-8 p-bottom-2">
                            <div class="txt-09 col-3 txt-black w-medium">Item</div>
                            <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                            <div class="txt-09 col-3 txt-black w-medium">Unit price</div>
                            <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer; visibility:hidden;"></i>
                        </div>
                    </div>
                    <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Quantity</div>
                    <input type="text" class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num text-size" name="package_quantity">

                    <div class=" row p-top-20">
                        <input type="submit" value="Add package" name="new_form" class="btn btn-sm btn-green col-12">
                    </div>
                </form>


            </div>
            
        </div>
        
        </div> 
        <?php $total_budget=$budget1+$budget2?>
        <div>
            <form method="post">
                <div class="row txt-al-center p-top-20">
                    <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8 coor3"><h1>Total Budget</h1></div>
                    <input type="text" class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num text-size1" value="<?=$total_budget?>" readonly> 
                </div>
            </form>
        </div>
        
    </div>

</div>




<!-- <script src="./assert/familyform.js"></script> -->
<script src=" <?=ROOT?>/assets/packages.js"></script>

<?php $this->view('includes/footer')?>