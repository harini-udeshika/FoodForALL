<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu');?>
<link rel="stylesheet" href="<?=ROOT?>/assets/cart.css">

<h2><?=$data->name?> Merch Store</h2>
<div class="corner"><a href=""><div class="clear"><i class="fa-solid fa-trash-can fa-xl"></i></div></a><div><i class="fa-solid fa-cart-shopping fa-xl"></i><a href="<?=ROOT?>/shop?id=<?=$data->gov_reg_no?>"><button>Continue Shopping</button></a></div></div>
<div class="alert" id="alert"><i class="fa-solid fa-circle-exclamation">&nbsp;&nbsp;</i>Available 13 only</div>
<div class="cart_table">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php if ($cart_data): ?>
        <?php $i = 0?>
        <?php $total = 0?>
        <?php foreach ($cart_data as $rows): ?>
        <tr class="table_row">
            <td><?=$cart_data[$i]->name?><br><img src="images/merch_items/<?=$cart_data[$i]->image?>"></td>
            <td><a href="<?=ROOT?>/shop/add_qty?cart=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>" class="cart_quantity_up" >+</a><input type="text" value="<?=$cart_data[$i]->qty?> " class="qty"><a class="cart_quantity_down" href="<?=ROOT?>/shop/sub_qty?cart=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>" >-</a></td>
            <td><span class="price"><?=$cart_data[$i]->price?></span></td>
            <td><span class="total"><?=$cart_data[$i]->price * $cart_data[$i]->qty?></span><a href="<?=ROOT?>/shop/delete_qty?cart=<?=$data->gov_reg_no?>+<?=$cart_data[$i]->item_no?>" class="remove"><button >Remove</button></a></td>
        </tr>
        <?php $total += $cart_data[$i]->price * $cart_data[$i]->qty?>
        <?php $i++?>
        <?php endforeach?>
        <?php endif?>
        <?php if (!$cart_data): ?>
            <td class="empty"><i class="fa-solid fa-bag-shopping"></i>Your cart looks empty!</td>
        <?php endif?>
    </table>
</div>
<div class="down">
    <div class="row" >Bill Total <span id="bill_total">Rs. <?php if (isset($total)) {echo ($total);} else {echo "0";}?>.00<span></div>
    <div class="row">Delivery Charges<span>Rs.<span></div>
    <div class="row">Total Amount<span>Rs.<span></div>
</div>
<button class="checkout">Checkout</button>

<?php $this->view('includes/footer')?>

<script src="<?=ROOT?>/assets/shop.js"></script>