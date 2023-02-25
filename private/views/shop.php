<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/shop.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>


    <div class=top>
    <div class="h1"><h1><?=$org_data->name?></h1> <a href=""><button class="shop-button"><i class="fa-solid fa-cart-shopping fa-xl"></i></button></a></div>
   
    <div class="search">
        <form action="" method="post">
            <input type="text" name="find" placeholder="Search items here! " class="search-bar">
            <button><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
        </form>
    </div>
    </div>
    <div class="container">
    <!-- <div class="shop">
        <div class="categories">
            <h5>Price range</h5>
            <div class="range">
                <span>Starting from <br>Rs.<?=$min[0]->min?></span><span>Ending from<br>Rs.<?=$max[0]->max?></span>
            </div>
            <h5>Categories</h5>
            <div class="radio">
                <input type="radio" value="t-shirts">
                <label for="t-shirts">T-shirts</label><br>
                <input type="radio" value="mugs">
                <label for="mug">Mugs</label><br>
                <input type="radio" value="stickers">
                <label for="sticker">Stickers</label><br>
                <input type="radio">
                <label for="badges">Badges</label><br>
            </div>
        </div>
    </div> -->
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
                <p>Rs.<?=$rows[$i]->price?></p>
                <div class="buttons">
                <a href="<?=ROOT?>/shop?product_id=<?=$rows[$i]->item_no?>"><button class="view">View details</button></a>
                <a href="<?=ROOT?>/add_to_cart/<?=$rows[$i]->item_no?>"><button class="cart">Add to cart</button></a>
                </div>
            </div>
            
            <?php $i++;?>
    <?php endforeach;?>
    <?php endif?>
    <?php if(!$rows):?>
        <p class="no_products"><i class="fa-solid fa-magnifying-glass fa-l"></i>&nbsp;&nbsp;&nbsp;Sorry! No products found.<p>
    <?php endif?>
        </div>

    </div>

</div>



<?php $this->view('includes/footer')?>
<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/organizationpage.js"></script>