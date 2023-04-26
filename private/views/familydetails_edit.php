<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/extra.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>

<div class="coor">
    <h1>Family detail form</h1>
</div>


<div class="containor2">
    <div>
    
        <form  method="POST" id="familyform" class="form_background form_background2" >
        <div class="coor2">
            <h1>Householder's Details</h1>
        </div>
        <div>
        <?php if(count($errors)>0):?>
            <?php foreach($errors as $error):?>
                <br><p> <i class="fas fa-exclamation-circle"></i><?=$error?> <br></p>
            <?php endforeach;?>
        <?php endif;?>
        </div>
       
               <input type="hidden" name="email" value="<?php echo $rows->area_coodinator_email?>">
                <div class="box1 filling">
                    <label for="FullName" class="numbers">Full Name*</label><br>
                    <input type="text" name="FullName" placeholder="Full Name" class="in fillingbox" id="fullname" value="<?php echo $rows->FullName?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="initial" class="numbers">Name With Initial*</label><br>
                    <input type="text" name="NameWithInitial" placeholder="Name With Initial"class="in fillingbox" id="iname" value="<?php echo $rows->Iname?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="ID">NIC*</label><br>
                    <input type="text" name="familyid" placeholder="NIC" class="in fillingbox" id="nic" value="<?php echo $rows->nic?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                
                <div class="box1 filling ">
                    <label for="profession">Profession*</label><br>
                    <input type="text" name="profession" placeholder="Profession"class="in fillingbox" id="pro" value="<?php echo $rows->profession?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="salary">Monthly family income*</label><br>
                    <input type="text" name="salary" placeholder="Net salary"class="in fillingbox" id="salary" value="<?php echo $rows->netsalary?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="contact1">Mobile phone number*</label><br>
                    <input type="text" name="Contact1" placeholder="Contact" class="in fillingbox" id="contact1" value="<?php echo $rows->contact1?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="contact2">Lane phone number</label><br>
                    <input type="text" name="Contact2" placeholder="Contact" class="in fillingbox" id="contact2" value="<?php echo $rows->contact2?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="address">Address*</label><br>
                    <input type="text" name="address" placeholder="Address" class="in fillingbox" id="address" value="<?php echo $rows->address?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                
                <div class="box1 filling ">
                    <table>
                    <hr>
                    <div class="coor2">
                        <h1>Family Details</h1>
                    </div>
                    <div class="filling">

                <table>
                        <tr class="tr1 children">
                            <div class="box1">
                            <td class="childrenbox">
                            <label for="members">Number of Family members</label>
                            <input type="number" min='1' name="Familymembers" class="in new fillingbox" id="fnum" value="<?php echo $rows->familymembers?>" >
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i><br>
                            <small>Erorr message</small>
                            </td>
                            </div>
                        </tr>
                        </table>
                </div>
                
                        <!-- <tr>
                            <td>
                                <label for="reasons">Other reasons</label><br>
                                <textarea name="cother" id="cother" cols="40" rows="10"></textarea>
                            </td>
                        </tr>
                        <hr> -->
                <div class="box1 filling ">
                    <table>
                <!-- <div id="children1" >   -->
                <tr class="tr1">
                            <td class="childrenbox">
                                <label for="Healthy_adults">Adults without diabetes or cholesterol</label><br>
                                <input type="number" min='0' max="5" name="Healthy_adults" class="in new fillingbox" id="ha" value="<?php echo $rows->healthy_adults?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Diabetes_patients">Adults with diabetes</label><br>
                                <input type="number" min='0' max="5" name="Diabetes_patients" class="in new fillingbox" id="dp" value="<?php echo $rows->diabetes_patients?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Cholesterol_patients">Adults with cholesterol</label><br>
                                <input type="number" min='0' max="5" name="Cholesterol_patients" class="in new fillingbox" id="cp" value="<?php echo $rows->cholesterol_patients?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="both">Adults with cholesterol and diabetes</label><br>
                                <input type="number" min='0' max="5" name="Both_patients" class="in new fillingbox" id="bp" value="<?php echo $rows->both_patients?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                        </tr>

                    </table> 
                </div>
                        
                <div class="box1 filling ">
                    <table>
                        <div id="children" >
                        
                        <tr class="tr1 children" >
                        <td class="childrenbox">
                                <label for="Less_one_children">Age of the children < 1</label><br>
                                <input type="number" min='0' max="5" name="Less_one_children" class="in new fillingbox" id="lo" value="<?php echo $rows->less_one_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Less_five_children">Age of the children < 5</label><br>
                                <input type="number"min='0' max="5"name="Less_five_children" class="in new fillingbox" id="lf" value="<?php echo $rows->less_five_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Higher_five_children">Age of the children > 5</label><br>
                                <input type="number"min='0' max="5"name="Higher_five_children" class="in new fillingbox" id="hf" value="<?php echo $rows->higher_five_children?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                        </tr>
                        </div>
                    </table> 
                </div>
                <!-- </div> -->
                <div class="box">
                    <p class="p1">*Children- under 16 years</p>
                    <p class="p1">*Adults- above 16 years</p>
                </div>
                 
                <div class="box box1">
                    <button type="submit" name="Enter">Submit</button>
                </div><br>

        </form>
        <div class="box box1">
        <a href="<?=ROOT?>/familytable"><button name="cancel">Back</button></a>
        </div><br>
    </div>
</div>
    
        

<!-- <script src="./assert/familyform.js"></script> -->
<script src=" <?=ROOT?>/assets/familyform.js"></script>

<?php $this->view('includes/footer')?>