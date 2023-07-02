<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/table.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/add.css">
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');
$detail1 = array();

if (!empty($row10)) {
// print('row1');
    $count = count($row10);
    for ($i = 0; $i < $count; $i++) {
        $detail1[$i] = $row10[$i]->id;
    }
}
// print_r($detail1);
?>


<div class="coor">Family Details
    
</div><br>

<!-- <div class="search-container"> -->
<form method="" name="f1" class="f1">
<div class="search-container">
    <section class="S1">
    <input type="text" name="find1" placeholder="Search By Name Here..." class="search-bar" >
    <!-- <button><i class="fa-solid fa-magnifying-glass fa-l"></i></button> -->
    </section>
    <!-- <section>
        <div class="S1"></div>
    </section> -->
    <section>
    <input type="text" name="find2" placeholder="Search By Address Here..." class="search-bar2" >
    
    </section>
    <section>
    <button><i class="fa-solid fa-magnifying-glass fa-l"></i></button>
    </section>
    </div>  
</form>
<!-- </div> -->



<div class="filter">
    <section><button class="filterbtn" onclick="showHideUsers()" ><i class="fa-solid fa-filter" title="filter"></i> Filter</button>
    <button class="filterbtn" onclick="clearParameters()" ><i class="fa-solid fa-filter-circle-xmark" title="Reset"></i> Reset</button>
    </section>
    <section class="filter-section hide">
    <div class=" table-container filterdata scrollit2">
    <form action="" name="f2" >
        <table>
        <thead>
            <tr>
                <th colspan="2" class="filteri2 n1">No of family members</th>
                <th colspan="2" class="filteri2 n2">No of children age below 1 <br>(age<1)</th>
                <th colspan="2" class="filteri2 n1">No of children age above 1 and below 5 <br> (1< age< 5) </th>
                <th colspan="2" class="filteri2 n2">No of children age above 5 <br>(age>5)</th>
                <th colspan="2" class="filteri2 n1">No of Adults without diabetes or cholesterol</th>
                <th colspan="2" class="filteri2 n2">No of Adults with diabetes </th>
                <th colspan="2" class="filteri2 n1">No of Adults with cholesterol patients</th>
                <th colspan="2" class="filteri2 n2">No of Adults with diabetes and cholesterol</th>
            </tr>
        </thead>
        <tbody></tbody>
            <tr>
                <td class="filteri2 min" >Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
                <td class="filteri2 min">Min</td>
                <td class="filteri2 max">Max</td>
            </tr>
            <tr>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="familymemberMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="familymemberMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="less_one_childrenMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="less_one_childrenMax"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="less_five_childrenMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="less_five_childrenMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="higher_five_childrenMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="higher_five_childrenMax"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="healthyadultsMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="healthyadultsMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="diabetesMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="diabetesMax"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="cholesterolMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="cholesterolMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="bothMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="bothMax"></td>
            </tr>
            <tr>
            <td colspan="14"></td>
            <td><button type="submit" id="set">Set</button></td>
            <td><button type="button" class="clear-filter" onclick="clearParameters()">Reset</button></td>
            </tr>
        </table>
    </form>
</div>
    <!-- <span class="filter"><i class="fa-solid fa-filter" title="filter"></i></span> -->
    <!-- <span class="filter"><i class="fa-solid fa-filter-circle-xmark" title="remove filter"></i></span> -->
</div>
</section>
<div class="add1"> 
  <button class="add"><a href="./familydetails" class="add2">Add +</a></button>
</div>



<div class="table-container scrollit">
    <table>
        <thead>
        <tr>
            <th>Index</th>
            <th >Full Name</th>
            <th >Name with initials</th>
            <th >NIC</th>
            <th >Profession</th>
            <th >Net Salary</th>
            <th >Mobile Phone Number</th>
            <th >Lane Phone Number</th>
            <th >Address</th>
            <th >Family Members</th>
            <th >Age of the children below 1 <br>(age<1)</th>
            <th >Age of the children above 1 and below 5 <br> (1 < age < 5 )</th>
            <th >Age of the children above 5 <br>(age>5)</th>
            <th >Adults without diabetes or cholesterol</th>
            <th >Adults with diabetes</th>
            <th >Adults with cholesterol</th>
            <th >Adults with diabetes and cholesterol</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        if($row){
            $count=count($row);
            while($count>0){?>
            <tr >
                <td class="tr3"></td>
                <td ><?=$row[$i]->FullName?></td>
                <td ><?=$row[$i]->Iname?></td>
                <td ><?=$row[$i]->nic?></td>
                <td ><?=$row[$i]->profession?></td>
                <td ><?=$row[$i]->netsalary?></td>
                <td ><?=$row[$i]->contact1?></td>
                <td ><?=$row[$i]->contact2?></td>
                <td ><?=$row[$i]->address?></td>
                <td ><?=$row[$i]->familymembers?></td>
                <td ><?=$row[$i]->less_one_children?></td>
                <td ><?=$row[$i]->less_five_children?></td>
                <td ><?=$row[$i]->higher_five_children?></td>
                <td c><?=$row[$i]->healthy_adults?></td>
                <td ><?=$row[$i]->diabetes_patients?></td>
                <td ><?=$row[$i]->cholesterol_patients?></td>
                <td ><?=$row[$i]->both_patients?></td>
                <?php
                 if( !in_array($row[$i]->id,$detail1)){?>
                <td ><a href="<?=ROOT?>/familydetails_edit?updateid=<?=$row[$i]->id?>" class="Edit" title="update"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                <a href="<?=ROOT?>/familytable/delete?deleteid=<?=$row[$i]->id?>" title="Delete"><i class="fa-solid fa-trash-can"></i></a></td>
                <?php }
                else{?>
                <td><i class="fa-solid fa-ban"></i></td><?php }?>
            </tr>
            
            <?php $count--;
                    $i++;
            }
        } else { ?>
            <div class="No_detail">No Family Details Available</div>
        <?php }
        ?>

        </tbody>
        </table>
</div>

<!-- <script>
    function clearParameters() {
        window.location.href = window.location.href.split('?')[0];
    }
</script> -->
<script src="<?=ROOT?>/assets/hide.js"></script>
<?php $this->view('includes/footer')?>


        