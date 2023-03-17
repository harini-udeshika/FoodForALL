<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/product_details.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/shop.css">

<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<script src="<?=ROOT?>/assets/add_to_cart.js"></script>
<div class="container_pd">
    <div class="corner">

        <img src="images/merch_items/<?=$data->image?>" alt="">
    </div>
    <div class="middle">
        <img src="images/merch_items/<?=$data->image?>" alt="">
    </div>
    <div class="corner_2">
    <div class="alert" id="alert"></div>

        <p class="name"><?=$data->name?><a href="<?=ROOT?>/shop?cartid=<?=$data->org_gov_reg_no?>+cart"><i class="fa-solid fa-cart-shopping fa-l"></i></a></p>
        <small>item#<?=$data->item_no?>#<?=$data->org_gov_reg_no?></small>
        <p class="name green">Rs. <?=$data->price?>/&nbsp;Unit</p>
        <p class="des"><?=$data->description?></p>
        <div class="scale">
                    <button class="add add_p" id="add-btn">+</button><input type="text" value=1 class="qty" id="qty-btn"></input><button class="sub" id="sub-btn">-</button>
        </div>
        <?php if ($data->stock == 0): ?>
                    <div class="remain product" id='remain-btn'>Out of stock</div>
                <?php endif;?>
                <?php if ($data->stock > 0): ?>
                    <div class="remain product" id='remain-btn'><?=$data->stock?> remaining</div>
                <?php endif;?>
        <div class="buttons_p">
        <a href="<?=ROOT?>/shop/add_to_cart?item=<?=$data->item_no?>+<?=$data->org_gov_reg_no?>" id="add_to_cart"><button class="cart"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;&nbsp;Add to cart</button></a>
        <a href="shop?id=<?=$data->org_gov_reg_no?>"><button class="cart purple"><i class="fa-solid fa-bag-shopping"></i></i>&nbsp;&nbsp;&nbsp;Back to shop</button></a>
</div>
    </div>
</div>

<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/add_to_cart_from_detailed.js"></script>
<?php $this->view('includes/footer')?>