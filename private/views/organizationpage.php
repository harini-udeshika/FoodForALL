<?php $this->view('includes/header')?>
<!-- <link rel="stylesheet" href="<?=ROOT?>/assets/homepage.css"> -->
<?php $this->view('includes/navbar')?>
<?php if(Auth::logged_in()){
    $this->view('includes/submenu');
}
?>

<script src=" navbar.js"></script>
<div>
</div>
<?php $this->view('includes/footer')?>