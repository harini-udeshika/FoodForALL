<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/order_history.css">
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
<div class="pagination">
    <div class="this-page">Page 1 of <?php echo $tot_pages; ?></div>
    <div class="page-number">
                <a href="?pg_num=1">First</a>
                <?php 
                    if(isset($_GET['pg_num']) && $_GET['pg_num']>1){ ?>
                            <a href="?pg_num=<?php echo $_GET['pg_num'] - 1; ?>">Prev</a>
                        <?php
                    }else{ ?>
                            <a href="?pg_num=1">Prev</a>
                        <?php
                    }
                ?>

                <?php
                    for($counter=1;$counter<=$tot_pages;$counter){
                        for($i=$counter;$i<=5 && $i<=$tot_pages;$i++){ ?>
                            <a href=""><?php echo $i ?></a>
                        <?php
                        
                        }
                        $counter = $counter + 5;
                    }  
                ?>

                <?php 
                    if(isset($_GET['pg_num']) && $_GET['pg_num'] < $tot_pages){ ?>
                            <a href="?pg_num=<?php echo $_GET['pg_num'] + 1; ?>">Next</a>
                        <?php
                    }else{ ?>
                            <a href="?pg_num=<?php echo $tot_pages?>">Next</a>
                        <?php
                    }
                ?>
                <a href="?pg_num=<?php echo $tot_pages; ?>">Last</a>
    </div>
</div>
<?php $this->view('includes/footer')?>