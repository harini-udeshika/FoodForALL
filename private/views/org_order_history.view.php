<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/order_history.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/akila_css2/buttons.css">
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
<h2>Order History</h2>
<div class="container">
    <?php $i=0?>
    <?php foreach ($data as $d):?>
    
    <div class="order">
       
        <div class="order_left">
        <?php if($i>0 && $data[$i]->order_id==$data[$i-1]->order_id):?>
            <span class="row"><span class="product"><?=$data[$i]->name?>: Rs.<?=$data[$i]->price?>.00</span> <span class="qty"> <?=$data[$i]->qty?> </span></span>
            <?php else: ?>
                <b><p class="order_no">Order#: <?=$data[$i]->order_id?></p></b>
                <p class="delivery"><i class="fa-solid fa-envelope"></i> &nbsp;Delivery address: <?=$data[$i]->address.','.$data[$i]->city?></p>
                <!-- <p class="delivery"><i class="fa-solid fa-envelope"></i> &nbsp;Delivery address: <?=$data[$i]->address.','.$data[$i]->city.','.$data[$i]->district?></p> -->
                <p class="delivery"><i class="fa-solid fa-calendar"></i> &nbsp;Order placed on: <?=$data[$i]->date?></p>
                <b><p class="total"><i class="fa-sharp fa-solid fa-dollar-sign"></i></i> &nbsp;Sub total: <?=$data[$i]->subtotal?></p></b>
                <span class="row"><span class="product"><?=$data[$i]->name?>: Rs.<?=$data[$i]->price?>.00</span> <span class="qty"><?=$data[$i]->qty?> </span></span>
            <?php endif; ?>
            
        </div>
    </div>
    <?php $i++?>
    <?php endforeach ?>
</div>
<br><br>
<center><div class="pagination">
    <div class="this-page">Page <?php if(isset($_GET['pg_num'])){
        echo $_GET['pg_num'];
    } else {
        echo "1";
    }
     ?> of <?php echo $tot_pages; ?></div></center>
     <br>
    <div class="page-number">
                <a href="?pg_num=1"><button class="btn btn-xsm btn-disabled">First</button></a>
                <?php 
                    if(isset($_GET['pg_num']) && $_GET['pg_num']>1){ ?>
                            <a href="?pg_num=<?php echo $_GET['pg_num'] - 1; ?>"><button class="btn btn-xsm btn-green"><<</button></a>
                        <?php
                    }else{ ?>
                            <a href="?pg_num=1"><button class="btn btn-xsm btn-green"><<</button></a>
                        <?php
                    }
                ?>

                <?php
                    for($counter=1;$counter<=$tot_pages;$counter){
                        for($i=$counter;$i<=5 && $i<=$tot_pages;$i++){ ?>
                            <a href="?pg_num=<?php echo $i ?>"><button class="btn btn-xsm btn-green"><?php echo $i ?></button></a>
                        <?php
                        
                        }
                        $counter = $counter + 5;
                    }  
                ?>

                <?php 
                    if(isset($_GET['pg_num']) && $_GET['pg_num'] < $tot_pages){ ?>
                            <a href="?pg_num=<?php echo $_GET['pg_num'] + 1; ?>"><button class="btn btn-xsm btn-green">>></button></a>
                        <?php
                    }else{ ?>
                            <a href="?pg_num=<?php echo $tot_pages?>"><button class="btn btn-xsm btn-green">>></button></a>
                        <?php
                    }
                ?>
                <a href="?pg_num=<?php echo $tot_pages; ?>"><button class="btn btn-xsm btn-disabled">Last</button></a>
    </div>
</div>
<?php $this->view('includes/footer')?>