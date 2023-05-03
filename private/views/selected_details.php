<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/add.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="table-container scrollit3">
<div class="blank col-lg-1"></div>
    <table>
        <thead>
        <tr>
            <th>Index</th>
            <th >Full Name</th>
            <th >catagory</th>
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
                <td><?=$row[$i]->dcount?></td>
                <td ><?=$row[$i]->detail_id?></td>
                <td ><?=$row[$i]->catagory?></td>
                <td><a href="<?=ROOT?>/selected_details/delete?deleteid=<?=$row[$i]->detail_id?>&eid=<?=$row[$i]->event_name?>" title="Delete"><i class="fa-solid fa-trash-can"></i></a></td>
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

<?php $this->view('includes/footer') ?>