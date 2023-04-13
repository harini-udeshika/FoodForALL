<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/homepage.css">
<div class="container">
    <div class="login-image">
        <img src="./images/logo.png" alt="" class="image-login">
    </div>
    <div class="login-form-container">

        <form method="post" class="login-form">
            <div class="f1">
                <input type="text" placeholder="Email address" name="email" value="<?= get_var('email') ?>" class="login-input">
            </div>
            <div class="f2">
                <input type="password" placeholder="Password" name="password" value="<?= get_var('password') ?>" class="login-input">

            </div>

            <?php if (!$is_verified || count($errors)>0) : ?>

                <div class="error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <small>&nbsp; Email and password does not match</small>
                </div>
            <?php endif; ?>

            <div class="log-button">
                <button class="login">Log in</button>
            </div>
            <div class="forgotten-password">
                <a href="email_forgot" class="forgot"> Forgotten Password?</a>
            </div>


            <hr class="line">



            <div class="create-new-button">
                <button class="new"> <a href="signup" class="create_new"> Create new account</a></button>
            </div>
        </form>
    </div>
</div>