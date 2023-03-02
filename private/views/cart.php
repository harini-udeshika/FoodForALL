<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu');?>
<link rel="stylesheet" href="<?=ROOT?>/assets/cart.css">

<h2><?=$data->name?> Merch Store</h2>
<div class="corner"><i class="fa-solid fa-cart-shopping fa-xl"></i><a href="<?=ROOT?>/shop?id=<?=$data->gov_reg_no?>"><button>Continue Shopping</button></a></div>
<div class="cart_table">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php if($cart_data):?>
        <?php $i=0?>
        <?php foreach($cart_data as $rows):?>
        <tr>
            <td><?=$cart_data[$i]->name?><br><img src="images/merch_items/<?=$cart_data[$i]->image?>"></td>
            <td><a href="<?=ROOT?>/shop/add_qty?cartid=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>" class="cart_quantity_up">+</a><input type="text" value="<?=$cart_data[$i]->qty?> " class="qty"><a class="cart_quantity_down" href="<?=ROOT?>/shop/sub_qty?cartid=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>">-</a></td>
            <td><?=$cart_data[$i]->price?></td>
            <td><?=$cart_data[$i]->price*$cart_data[$i]->qty?><a href="<?=ROOT?>/shop/delete_qty?cartid=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>"><button>Remove</button></a></td>
        </tr>
        <?php $i++?>
        <?php endforeach ?>
        <?php endif?>
    </table>
</div>
<div class="down">
    <div class="row">Bill Total <span>Rs.<span></div>
    <div class="row">Delivery Charges<span>Rs.<span></div>
    <div class="row">Total Amount<span>Rs.<span></div>
</div>
<button class="checkout">Checkout</button>

<?php $this->view('includes/footer')?>

<script src="<?=ROOT?>/assets/shop.js"></script>