<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<?php if (Auth::logged_in()) {
    $this->view('includes/submenu');
}
?>
 <link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">

<div class="container">

    <div class="description">
        <div class="content">
            <div class="main">
                <small>Food</small>
                <p>For</p><small>ALL</small>
            </div>
            <p class="sub">We are currently processing your registration request.<br>
            We will be Notifying you via email when you have been accepted<br>
            Thank You for your Patiants.
        </p>
            
          

        </div>
    </div>
    <div class="image_section">
        <img src="./images/image.png" alt="" class="image">

    </div>
</div>

<?php $this->view('includes/footer')?>