<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/select_copy.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/index.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_area_blocks.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">

<?php if(Auth::logged_in()){
   
    $this->view('includes/submenu');
}
$j=1;
?>
<div class="heading-1 col-12 sub5">Select Donees for event</div>
<div class="box-row card-container">
    <div class="box box1 card2">
        <a  href="<?=ROOT?>/select_family?eid=<?=$event?>">
        <img src="images/family.png" alt="Card 1 Image">
        <h2 class="sub5">Select Families Here</h2></a> 
    </div>
    <div class="box box2 card2">
        <a  href="<?=ROOT?>/select_childrenhome?eid=<?=$event?>">
        <img src="images/children.png" alt="Card 2 Image">
        <h2 class="sub5">Select Children's Home Here</h2></a> 
    </div>
    <div class="box box3 card2">
    <a  href="<?=ROOT?>/select_elders?eid=<?=$event?>">
    <img src="images/elders.png" alt="Card 3 Image">
        <h2 class="sub5">Select Elders' Home Here</h2></a> 
    </div>
    </div>
<?php $this->view('includes/footer')?>

