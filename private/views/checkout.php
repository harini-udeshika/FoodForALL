<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu');?>
<link rel="stylesheet" href="<?=ROOT?>/assets/checkout.css">

<h1>Checkout</h1>
<div class="outer-box">

<div class="left_c">

<form method="POST" id="form"> 
<h3>Enter Your Shipping Details</h3>
    <div>
        <input type="text" placeholder="Receipient's name" name="name" id='name'></input>
        <i class="fa-solid fa-circle-exclamation"></i>
        <i class="fa-solid fa-circle-check"></i>
        <small>error message</small>
    </div>
    <div> 
        <input type="text" placeholder="Address" id='address' name='address'></input>
        <i class="fa-solid fa-circle-exclamation"></i>
        <i class="fa-solid fa-circle-check"></i>
        <small>error message</small>
    </div>
    <div> 
        <input type="text" placeholder="City"  name="city" id='city'></input>
        <i class="fa-solid fa-circle-exclamation"></i>
        <i class="fa-solid fa-circle-check"></i>
        <small>error message</small>
    </div>
    <div>
        <input type="text" placeholder="Telephone"  name="telephone" id='telephone'></input>
        <i class="fa-solid fa-circle-exclamation"></i>
        <i class="fa-solid fa-circle-check"></i>
        <small>error message</small>
    </div>
    <button class="checkout">Continue</button>
</form>
</div>
<div class="right_c">

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
            <td><?=$cart_data[$i]->name?></td>
            <td><?=$cart_data[$i]->qty?></td>
            <td><span class="price"><?=$cart_data[$i]->price?></span></td>
            <td><span class="total"><?=$cart_data[$i]->price * $cart_data[$i]->qty?></span></td>
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

</div>
</div>

  
<?php $this->view('includes/footer')?>
<script src="<?=ROOT?>/assets/checkout.js"></script>
<script src="<?=ROOT?>/assets/shop.js"></script>