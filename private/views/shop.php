<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/shop.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
                             

    <div class=top>
    <div class="h1"><h1><?=$org_data->name?></h1> <a href="<?=ROOT?>/shop?cartid=<?=$org_data->gov_reg_no?>+cart"><button class="shop-button"><i class="fa-solid fa-cart-shopping fa-2xl"></i></button></a></div>

    <div class="search">
        <form action="" method="post">
            <input type="text" name="find" placeholder="Search items here! " class="search-bar">
            <button><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
        </form>
    </div>
    </div>
    <div class="alert" id="alert"></div>
    <div class="reset" id="reset"><i class='fa-solid fa-circle-exclamation'></i>&nbsp;&nbsp;Shopping cart has been reset due to inactivity</div>
    <div class="container">

    <div class="items-display">
        <div class="row">
            <?php $i = 0;?>
            <?php if ($rows): ?>
<?php foreach ($rows as $value): ?>

    <?php if ($i % 4 == 0 && $i != 0): ?>
        </div>
        <div class="row">
    <?php endif?> 

            <div class="item">
                <img src="images/merch_items/<?=$rows[$i]->image?> ">
                <small><?=$rows[$i]->name?></small>
                <span>Rs.<?=$rows[$i]->price?></span><br>
                <div class="scale">
                    <button class="add">+</button><input type="text" value=1 class="qty"></input><button class="sub">-</button>
                </div>
                <?php if ($rows[$i]->stock == 0): ?>
                    <div class="remain">Out of stock</div>
                <?php endif;?>
                <?php if ($rows[$i]->stock > 0): ?>
                    <div class="remain"><?=$rows[$i]->stock?> remaining</div>
                <?php endif;?>

                <div class="buttons">
                <a href="<?=ROOT?>/shop?product_id=<?=$rows[$i]->item_no?>"><button class="view">View details</button></a>
                <?php if ($rows[$i]->stock > 0): ?>
                    <?php if (Auth::logged_in()):?>
                    <a href="<?=ROOT?>/shop/add_to_cart?item=<?=$rows[$i]->item_no?>+<?=$org_data->gov_reg_no?>" class="cart"><button class="cart1">Add to cart</button></a>
                    <?php endif; ?>
                    
                    <!-- <?php if (!Auth::logged_in()):?>
                    <a href="login" class="cart"><button class="cart1">Add to cart</button></a>
                    <?php endif; ?> -->
                <?php endif;?>

                </div>

            </div>

            <?php $i++;?>
    <?php endforeach;?>
    <?php endif?>
    <?php if (!$rows): ?>
        <p class="no_products"><i class="fa-solid fa-magnifying-glass fa-l"></i>&nbsp;&nbsp;&nbsp;Sorry! No products found.<p>
    <?php endif?>
        </div>

    </div>

</div>



<?php $this->view('includes/footer')?>
<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/add_to_cart.js"></script>
<script src="<?=ROOT?>/assets/organizationpage.js"></script>

