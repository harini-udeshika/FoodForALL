<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/table.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/add.css">
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');?>

<div class="coor">Children's Home Details
    
</div><br>

<!-- <div class="search-container"> -->
<form method="" name="f1">
<div class="search-container">
    <section class="S1">
    <input type="text" name="find1" placeholder="Search By Name Here..." class="search-bar" >
    <!-- <button><i class="fa-solid fa-magnifying-glass fa-l"></i></button> -->
    </section>
    <section>
        <div class="S1"></div>
    </section>
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
                <th colspan="2" class="filteri2 n1">No of Children</th>
                <th colspan="2" class="filteri2 n2">No of children age below 1 <br>(age<1)</th>
                <th colspan="2" class="filteri2 n1">No of children age above 1 and below 5 <br> (1< age< 5) </th>
                <th colspan="2" class="filteri2 n2">No of children age above 5 <br>(age>5)</th>
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
            </tr>
            <tr>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="memberMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="memberMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="less_one_childrenMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="less_one_childrenMax"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="less_five_childrenMin"></td>
                <td class="filteri2 n2"><input type="number" min=1 class="filterinput" name="less_five_childrenMax"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="higher_five_childrenMin"></td>
                <td class="filteri2 n1"><input type="number" min=1 class="filterinput" name="higher_five_childrenMax"></td>
            </tr>
            <tr>
            <td colspan="6"></td>
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
  <button class="add"><a href="./childrenhomedetails" class="add2">Add +</a></button>
</div>



<div class="table-container scrollit">
    <table>
    <thead>
        <tr>
            <th>Index</th>
            <th>Name of the children's home</th>
            <th>Owners name</th>
            <th>NIC</th>
            <th>registration number</th>
            <th>Land phone number</th>
            <th>Mobile phone number</th>
            <th>Address</th>
            <th>Number of children</th>
            <th >Age of the children below 1 <br>(age<1)</th>
            <th >Age of the children above 1 and below 5 <br> (1 < age < 5 )</th>
            <th >Age of the children above 5 <br>(age>5)</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        if($row){
            $count=count($row);
            while($count>0){?>
        
        <tr>
            <td class="tr3"></td>
            <td><?=$row[$i]->Name?></td>
            <td><?=$row[$i]->OwnerName?></td>
            <td><?=$row[$i]->nic?></td>
            <td><?=$row[$i]->regNo?></td>
            <td><?=$row[$i]->contact1?></td>
            <td><?=$row[$i]->contact2?></td>
            <td><?=$row[$i]->address?></td>
            <td><?=$row[$i]->children_num?></td>
            <td ><?=$row[$i]->less_one_children?></td>
            <td ><?=$row[$i]->less_five_children?></td>
            <td ><?=$row[$i]->higher_five_children?></td>
            <td><a href="<?=ROOT?>/childrenhomedetails_edit?updateid=<?=$row[$i]->id?>" class="Edit" title="update"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
            <a href="<?=ROOT?>/childrentable/delete?deleteid=<?=$row[$i]->id?>" title="Delete"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
       
        <?php $count--;
                    $i++;
            }
        } else { ?>
            <div class="No_detail">No Children home details Appeared</div>
        <?php }
        ?>

        </tbody>

    </table>
    </div>

</div>
<script src="<?=ROOT?>/assets/hide.js"></script>
<?php $this->view('includes/footer')?>
