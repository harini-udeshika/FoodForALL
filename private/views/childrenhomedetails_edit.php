<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/extra.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<?php if(!Auth::logged_in()){
    $this->view('home');
}
?>
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');?>

<!-- <div class="center">
    <h1 >Family detail form</h1>
</div> -->
<div class="coor">
    <h1>Children's home detail form</h1>
</div>
<div class="containor2">
    <div>
    
        <form  method="POST" id="childrenform" class="form_background form_background2" >
            <div class="coor2">
                <h1>Owner's Details</h1>
            </div>
            <div>
            <?php if(count($errors)>0):?>
                <?php foreach($errors as $error):?>
                    <br><p><i class="fas fa-exclamation-circle"></i>  <?=$error?><br></p>
                <?php endforeach;?>
            <?php endif;?>
            </div>

              <input type="hidden" name="areacoordinator_email" value="<?php echo $rows->areacoordinator_email?>">
                <div class="box1 filling">
                    <label for="FullName"> Name of the children's home*</label><br>
                    <input type="text" name="Name" placeholder="Name" class="in fillingbox" id="name" value="<?php echo $rows->Name?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="initial">Owner's Name*</label><br>
                    <input type="text" name="OwnerName" placeholder="Owner's Name"class="in fillingbox" id="ownername" value="<?php echo $rows->OwnerName?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="ID">NIC*</label><br>
                    <input type="text" name="nic" placeholder="NIC" class="in fillingbox" id="nic" value="<?php echo $rows->nic?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
               
                <div class="box1 filling">
                    <label for="salary">Regstration Number*</label><br>
                    <input type="text" name="childrenid" placeholder="Registration number"class="in fillingbox" id="regno" value="<?php echo $rows->regNo?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="contact1">Land phone number*</label><br>
                    <input type="text" name="Contact1" placeholder="Contact" class="in fillingbox" id="contact1" value="<?php echo $rows->contact1?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="contact2">Mobile phone number</label><br>
                    <input type="text" name="Contact2" placeholder="Contact" class="in fillingbox" id="contact2" value="<?php echo $rows->contact2?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="address">Address*</label><br>
                    <input type="text" name="address" placeholder="Address" class="in fillingbox" id="address" value="<?php echo $rows->address?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <!-- <div class="box1 filling para">
                    Is there children in this family?<input type="submit" class="checklist" onclick="checkedOnClick1()" value="Yes" id="id1">
                </div> -->
                <div class="box1 filling">
                <table>
                    <hr>
                    <div class="coor2">
                        <h1>Children Details</h1>
                    </div>
                    <div class="filling">
                    <table>
                        <div class="box1 filling">
                        <table>
                        <tr>
                            <td>
                                <div class="box1">
                                <label for="members">Number of children *</label><br>
                                <input type="number" min='1' name="Members" class="in new fillingbox" id="mem" value="<?php echo $rows->children_num?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                                </div>
                            </td>
                        </tr>   
                        </table> 
                </div>
                <div class="box1 filling">
                    <table>
                        <div id="children" >
                            <tr class="tr1 children" >
                            <td class="childrenbox">
                                <label for="Less_one_children">Age of the children < 1</label><br>
                                <input type="number" min='0'  name="Less_one_children" class="in new fillingbox" id="lo" value="<?php echo $rows->less_one_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Less_five_children">Age of the children < 5</label><br>
                                <input type="number"min='0' name="Less_five_children" class="in new fillingbox" id="lf" value="<?php echo $rows->less_five_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Higher_five_children">Age of the children > 5</label><br>
                                <input type="number"min='0' name="Higher_five_children" class="in new fillingbox" id="hf" value="<?php echo $rows->higher_five_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            </tr>  
                            </div>
                    </table> 
                </div>
                <div class="box">
                    <p class="p1">*Children- under 16 years</p>
                </div>
                 
                <div class="box box1">
                    <button type="submit" name="Enter">Save</button>
                </div><br>

                
                <!-- <a href="#top"><i class="fa-sharp fa-solid fa-arrow-up">TOP</i></a> -->
                <!-- <div class="box box1">
                    <button><a href="familydetails.php">View family details</a></button>
                </div> -->
        </form>
        <div class="box box1">
        <a href="<?=ROOT?>/childrentable"><button name="cancel">Back</button></a>
        </div><br>
        
    </div>
</div>

<!-- <script src="./assert/familyform.js"></script> -->
<script src=" <?=ROOT?>/assets/childrenhome.js"></script>

<?php $this->view('includes/footer')?>