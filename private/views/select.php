<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/select.css">

<div class="container">
    <h1><span class="p">Food</span>For<span class="p">ALL</span></h1>
    <h3>Register as a</h3>
    <div class="sub">
        <div class="user"> 
            <a href="signup"><button>User</button></a>
            <img src="./images/user.webp">
        </div>
        <div class="org"> 
            <a href="signup_org"><button>Organization</button></a>
            <img src="./images/org.webp">
        </div>
    </div>
</div>
<?php $this->view('includes/footer')?>