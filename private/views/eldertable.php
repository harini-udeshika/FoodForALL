<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform1.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/familyform2.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/table.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/area_css/nav.css">
<!-- <link rel="stylesheet" href="<?=ROOT?>/assets/events.css"> -->
<?php if(!Auth::logged_in()){
    $this->view('home');
}
?>
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');?>

<!-- <div class="add1">
        <button class="add"><a href="" class="add2">Add +</a></button>
    </div><br><br> -->
<div class="coor">Elders' Home Details
    <!-- <div class="add1">
    <button class="add"><a href="" class="add2">Add +</a></button>
    </div> -->
</div><br>
<div class="add1"> 
    <button class="add"><a href="./elderhomedetails" class="add2">Add +</a></button>
</div>

    <table  class="table1">
        <tr>
            <th class="no2">Index</th>
            <th class="no2">Name of the children's home</th>
            <th class="no2">Owners name</th>
            <th class="no2">NIC</th>
            <th class="no2">registration number</th>
            <th class="no2">Contact</th>
            <th class="no2">Address</th>
            <th class="no1 no2">Healthy adults</th>
            <th class="no1 no2">Cholesterol patients</th>
            <th class="no1 no2">Diabetes patients</th>
            <th class="no1 no2">Action</th>
        </tr>
        <?php foreach($row as $row):?>
        <tr class="tr1 tr2">
            <td class="td1"><?=$row->id?></td>
            <td class="td1"><?=$row->Name?></td>
            <td class="td1"><?=$row->OwnerName?></td>
            <td class="td1"><?=$row->nic?></td>
            <td class="td1"><?=$row->regNo?></td>
            <td class="td1"><?=$row->contact1?>/<?=$row->contact2?></td>
            <td class="td1"><?=$row->address?></td>
            <td class="no1 td1"><?=$row->Healthy_adults?></td>
            <td class="no1 td1"><?=$row->cholesterol_patients?></td>
            <td class="no1 td1"><?=$row->Diabetes_patients?></td>
            <td class="td1"><a href="<?=ROOT?>/elderhomedetails_edit?updateid=<?=$row->id?>" class="Edit" title="update"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
            <a href="delete.php?deleteid='.$fid.'" title="Delete"><i class="fa-solid fa-trash-can"></i></a></td>
        </tr>
        <?php endforeach;?>

    </table>

    

</div>
<?php $this->view('includes/footer')?>


        
            
        

    
