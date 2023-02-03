<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/akila_css/styles_org.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?> 

<div style="font-family:'Inter'; text-align:center; font-size: 50px; font-weight: bold; color: #7681BF;">
        <?php if(isset($_SESSION['USER'])){
                            $na = $_SESSION['USER']->name;
                            // echo $na;
                        }              
        ?> Add Event Information
</div>

<?php $this->view('includes/footer')?>