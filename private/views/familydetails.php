<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/extra.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<?php $this->view('includes/navbar')?>
<?php if(Auth::logged_in()){
    $this->view('includes/submenu');
}
?>

    
<!-- <div class="center">
    <h1 >Family detail form</h1>
</div> -->
<div class="coor">
    <h1>Family Detail Form</h1>
</div>


<div class="containor2">
    <div class="familydetailform">
    
        <form  method="POST" id="familyform" class="familyform" >
        <div class="coor2">
            <h1>Householder's Details</h1>
        </div>
        <div>
        <?php if(count($errors)>0):?>
            <?php foreach($errors as $error):?>
                <br><p><?=$error?>  <i class="fas fa-exclamation-circle"></i><br></p>
            <?php endforeach;?>
        <?php endif;?>
        </div>
               <input type="hidden" name="email" placeholder="Full Name" value="<?=Auth::getemail()?>">
                <div class="box1 filling">
                    <label for="FullName" class="numbers">Full Name*</label><br>
                    <input type="text" name="FullName" placeholder="Full Name" class="in fillingbox" id="fullname">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="initial" class="numbers">Name With Initial*</label><br>
                    <input type="text" name="NameWithInitial" placeholder="Name With Initial"class="in fillingbox" id="iname">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="ID">NIC*</label><br>
                    <input type="text" name="nic" placeholder="NIC" class="in fillingbox" id="nic">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="relationship">Main Relationship with other members*</label>
                    <select name="Relationship" class="label" id="re">
                        <option value="father">Father</option>
                        <option value="mother">Mother</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="box1 filling ">
                    <label for="profession">Profession*</label><br>
                    <input type="text" name="profession" placeholder="Profession"class="in fillingbox" id="pro">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling">
                    <label for="salary">Monthly family income*</label><br>
                    <input type="text" name="salary" placeholder="Net salary"class="in fillingbox" id="salary">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="contact1">Mobile phone number*</label><br>
                    <input type="text" name="Contact1" placeholder="Contact" class="in fillingbox" id="contact1">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="contact2">Land phone number</label><br>
                    <input type="text" name="Contact2" placeholder="Contact" class="in fillingbox" id="contact2">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <div class="box1 filling ">
                    <label for="address">Address*</label><br>
                    <input type="text" name="address" placeholder="Address" class="in fillingbox" id="address">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i><br>
                    <small>Erorr message</small>
                </div>
                <!-- <div class="box1 filling para">
                    Is there children in this family?<input type="submit" class="checklist" onclick="checkedOnClick1()" value="Yes" id="id1">
                </div> -->
                <div class="box1 filling ">
                    <table>
                        <hr>
                        <div class="coor2">
                            <h1>Family Details</h1>
                        </div>
                        <div class="filling">
                    <table>
                        <tr>
                            <td >
                            <label for="members">Number of Family members</label>
                            <input type="number" min='1' name="Familymembers" class="in new fillingbox" id="fnum" >
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i><br>
                            <small>Erorr message</small>
                            </td>
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
                        <tr class="tr1">
                            <td class="childrenbox">
                                <label for="Healthy_adults">Number of Healthy Adults</label><br>
                                <input type="number" min='0' max="5" name="Healthy_adults" class="in new fillingbox" id="ha">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Diabetes_patients">Number of Diabetes Patients</label><br>
                                <input type="number" min='0' max="5" name="Diabetes_patients" class="in new fillingbox" id="dp">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Cholesterol_patients">Number of Cholesterol Patients</label><br>
                                <input type="number" min='0' max="5" name="Cholesterol_patients" class="in new fillingbox" id="cp">
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
                                <label for="Healthy_children">Number of Healthy childern</label><br>
                                <input type="number" min='0' max="5" name="Healthy_children" class="in new fillingbox" id="hc">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i><br>
                                <small>Erorr message</small>
                            </td>
                            <td class="childrenbox">
                                <label for="Malnutrition_children">Number of Malnutrition Children</label><br>
                                <input type="number"min='0' max="5"name="Malnutrition_children" class="in new fillingbox" id="mc">
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
                    <p class="p1">*Adults- above 16 years</p>
                </div>
                 
                <div class="box box1">
                    <button type="submit" name="Enter">Submit</button>
                </div><br>
                <!-- <a href="#top"><i class="fa-sharp fa-solid fa-arrow-up">TOP</i></a> -->
                <!-- <div class="box box1">
                    <button><a href="familydetails.php">View family details</a></button>
                </div> -->
        </form>
        
    </div>
</div>

<!-- <script src="./assert/familyform.js"></script> -->
<script src=" <?=ROOT?>/assets/familyform.js"></script>

<?php $this->view('includes/footer')?>