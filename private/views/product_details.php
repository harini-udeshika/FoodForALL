<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/product_details.css">

<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<script src="<?=ROOT?>/assets/add_to_cart.js"></script>
<div class="container">
    <div class="corner">
        
        <img src="images/merch_items/<?=$data->image?>" alt="">
    </div>
    <div class="middle">
        <img src="images/merch_items/<?=$data->image?>" alt="">
    </div>
    <div class="corner_2">
        <p class="name"><?=$data->name?></p>
        <small>item#<?=$data->item_no?>#<?=$data->org_gov_reg_no?></small>
        <p class="name green">Rs. <?=$data->price?>/&nbsp;Unit</p>
        <p><?=$data->description?></p>
        <div class="buttons">
        <button class="cart"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;&nbsp;Add to cart</button>
        <a href="shop?id=<?=$data->org_gov_reg_no?>"><button class="cart purple"><i class="fa-solid fa-bag-shopping"></i></i>&nbsp;&nbsp;&nbsp;Back to shop</button></a>
</div>
    </div>
</div>

<script src=" navbar.js"></script>
<script src="<?=ROOT?>/assets/add_to_cart.js"></script>
<?php $this->view('includes/footer')?>