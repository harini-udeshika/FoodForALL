<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/404.css">
<div class="container">
    <div class="content">
        <h1>404</h1>
        <span>Oops!</span><br>
        <span>Page Not Found</span><br>
        <p class="small">This page doesn't exist or was removed!<br>We suggest you back to home.</p>
        <a href="home"><button>Back to home</button></a>
    </div>
    <div class="image">
    <img src="images/404.png">
    </div>
</div>
<?php $this->view('includes/footer')?>