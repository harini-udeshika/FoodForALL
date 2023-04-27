<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
<h2>Order History</h2>
<div class="order">
    
</div>
<?php $this->view('includes/footer')?>