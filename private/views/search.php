<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/search.css">
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
<div class="container">
    <p><span>Food</span>For<span>ALL</span></p>
    <div class="sub"><span>Donate</span>&nbsp;&#x2022;&nbsp;Spread Love&nbsp;&#x2022;<span>Volunteer</span></div>
    <h2>User search</h2>
<div class="search">
<form>
    <input type="text" placeholder="Search and see what others upto..." class="search_input"></input>
    <a><button><i class="fa-solid fa-magnifying-glass fa-2xl"></i></button></a>
   
   
</form>

</div>
<div class="results">
    <!-- <div>harini</div>
    <div>harini</div> -->
</div>
</div>
<?php $this->view('includes/footer')?>
<script src="<?=ROOT?>/assets/search.js"></script>
