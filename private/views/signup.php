<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage.css">
<!-- <?php
print_r($errors);
?> -->
<body>
    <!-- <nav>Home</nav> -->
    <div class="signup-container">
        <div class="signup-image">
            <img src="./images/logo.png" alt="" class="image-signup">
        </div>

        <div class="">
            <form action="" method="POST" id="form" class="signup-form">
                <div class="name">
                    <div class="f">
                        <input type="text" placeholder="First name" class="small" name="first_name" id="first_name"  value="<?=get_var('first_name')?>" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                    <div class="f">
                        <input type="text" placeholder="Last name" class="small" name="last_name" id="last_name" value="<?=get_var('last_name')?>" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                </div>
                <div class="nic">
                    <div class="f">
                        <input type="text" placeholder="NIC" class="small" name="nic" id="nic" value="<?=get_var('nic')?>" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                    <div class="f">
                        <!-- <?php $user = new User();?>
                        <?php if ($user->where('email', get_var('email'))): ?>
                        <?php $error = "Email already exists!";?>
                        <?php endif;
?> -->
                        <input type="text" placeholder="Email address" class="small" name="email" id="email" value="<?=get_var('email')?>" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                </div>
                <div class="f">
                    <input type="text" placeholder="Address" name="address_1" id="address_1"  value="<?=get_var('address_1')?>" class="signup-input">
                    <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                </div>
                <!-- <div class="f6">
                    <input type="text" placeholder="Address line 2" name="address_2">
                </div> -->
                <div class="city">
                    <div class="f">
                        <input type="text" placeholder="City" class="small" name="city" id="city" value="<?=get_var('city')?>" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                    <div class="f">
                        <input type="text" placeholder="Postal code" class="small" name="postal_code" id="postal_code" value="<?=get_var('postal_code')?>"id="postal_code" class="signup-input">
                        <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                    </div>
                </div>

                <div class="f">
                    <input type="text" placeholder="Telephone number" name="telephone" id="telephone"  value="<?=get_var('telephone')?>" class="signup-input">
                    <i class="fa-solid fa-circle-check"></i>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <small>error message</small>
                </div>
                <div class="f">
                    <input type="password" placeholder="Password" name="password" id="password"  value="<?=get_var('password')?>" class="signup-input">
                    <i class="fa-solid fa-circle-check"></i>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <small>error message</small>
                </div>
                <div class="f">
                    <input type="password" placeholder="Re-enter Password" name="re_enter_password" id="re_enter_password" value="<?=get_var('re_enter_password')?>" class="signup-input">
                    <i class="fa-solid fa-circle-check"></i>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <small>error message</small>
                </div>
                <div class="f12">
                    <!-- <div class="check"> -->
                        <input type="checkbox" class="check" name="check" id="check">
                    <!-- </div> -->
                    <!-- <p class="tc"> -->
                       <a href="terms"><p>Agree to terms and conditions</p></a>
                    <!-- </p> -->
                    <i class="fa-solid fa-circle-check"></i>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <small>error message</small>
                </div>
                <div class="log-button">
                    <button id="register">Register</button>
                </div> 

            </form>
        </div>
    </div>
</body>
<script src="<?=ROOT?>/assets/signup.js"></script>
</html>