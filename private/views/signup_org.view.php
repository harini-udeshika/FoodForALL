<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/signup_org.css">

<body>
    <!-- <div class="topnav">
        <a href="home.php">Home</a>
        <a href="home.php#about-section">About</a>
        <a class="active" href="login.php" style="float: right;">Log in</a>
    </div> -->
    <div class="box center">
        <img id="logo" src="./images/logo.png" alt="" width="710px" height="400px">
        <div class="form-box" style="height: 850px; margin-bottom:30px;">

            <form id="reg-form" method="post" class="login-form" enctype="multipart/form-data" style="height: 90%; margin-top:-20px; margin-bottom:50px;">

                <div class="eminput-control">
                    <input type="text" value="<?= get_var('organization') ?>" name="organization" id="name-org" placeholder="Name">
                    <br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <input type="email" value="<?= get_var('email') ?>" name="email" id="email-org" placeholder="Email">
                    <br>
                    <h4 style="font-size: 15px; text-align:left; color:red; margin-top: -15px; padding-top: 15px;
                padding-bottom:-5px; margin-bottom:0px;"><?php
                                                            if (isset($_SESSION['error1'])) {
                                                                echo $_SESSION['error1'];
                                                                unset($_SESSION['error1']);
                                                            }
                                                            ?></h4>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <input type="text" value="<?= get_var('gov_no') ?>" name="gov_no" id="gov-org" placeholder="Gov. Registration No">
                    <br>
                    <h4 style="font-size: 15px; text-align:left; color:red; margin-top: -15px; padding-top: 15px;
                padding-bottom:-5px; margin-bottom:0px;"><?php
                                                            if (isset($_SESSION['error2'])) {
                                                                echo $_SESSION['error2'];
                                                                unset($_SESSION['error2']);
                                                            }
                                                            ?></h4>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-controm" style="text-align:left; font-size:17px; 
                                        font-family: 'Poppins'; font-weight: 100; color: rgb(149,149,149);">
                    <!-- <label for="image">Gov. Certificate</label> -->
                    <span>Please attach a copy of your Gov. certificate here</span>
                    <input type="file" name="pdf_file" id="pdf_file" style="background-color: rgba(255, 255, 255, 0);
                        font-size:15px; margin-left:-10px;
                        box-shadow: 0 0px 0px 0px;" accept=".pdf"><br>
                </div>

                <div class="eminput-control">
                    <input type="text" value="<?= get_var('tel') ?>" name="tel" id="tel-org" placeholder="Telephone Number">
                    <br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <input type="text" value="<?= get_var('address') ?>" name="address" id="address-org" placeholder="Address">
                    <br>
                    <div class="client-error"></div>
                </div>

                <table style="float: left;">
                    <td style="padding-right: 5px; width: 40%;">
                        <div class="eminput-control">
                            <!-- <input type="text" value="<?= get_var('city') ?>"
                    name="city" id="city-org" placeholder="City" > -->
                            <select type="text" name="city" id="city-org" style="width: 100%;">
                                <option style="color:  rgb(204, 235, 226);" value='<?= get_var('city') ?>'><?php if (get_var('city')) {
                                                                            get_var('city');
                                                                        } else {
                                                                            echo "-District-";
                                                                        } ?>
                                                                        </option>
                                <option value='Ampara'>Ampara</option>
                                <option value='Anuradhapura'>Anuradhapura</option>
                                <option value='Badulla'>Badulla</option>
                                <option value='Batticaloa'>Batticaloa</option>
                                <option value='Colombo'>Colombo</option>  
                                <option value='Galle'>Galle</option>
                                <option value='Gampaha'>Gampaha</option>
                                <option value='Hambantota'>Hambantota</option>
                                <option value='Jaffna'>Jaffna</option>
                                <option value='Kalutara'>Kalutara</option>
                                <option value='Kandy'>Kandy</option>
                                <option value='Kegalle'>Kegalle</option>
                                <option value='Kilinochchi'>Kilinochchi</option>
                                <option value='Kurunegala'>Kurunegala</option>
                                <option value='Mannar'>Mannar</option>
                                <option value='Matale'>Matale</option>
                                <option value='Matara'>Matara</option>
                                <option value='Monaragala'>Monaragala</option>
                                <option value='Mullaitivu'>Mullaitivu</option>
                                <option value='Nuwara Eliya'>Nuwara Eliya</option>
                                <option value='Polonnaruwa'>Polonnaruwa</option>
                                <option value='Puttalam'>Puttalam</option>
                                <option value='Ratnapura'>Ratnapura</option>
                                <option value='Trincomalee'>Trincomalee</option>
                                <option value='Vavuniya'>Vavuniya</option>
                            </select>
                            <br>
                            <div class="client-error"></div>
                        </div>
                    </td>

                    <td style="padding-left: 5px;">
                        <div class="eminput-control">
                            <input type="text" value="<?= get_var('postal-code') ?>" name="postal-code" id="postal-code-org" placeholder="Postal code" style="width: 90%;">
                            <br>
                            <div class="client-error"></div>
                        </div>
                    </td>

                </table>


                <div class="eminput-control">
                    <input type="password" name="pw" id="pw-org" placeholder="Password">
                    <br>

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <input type="password" name="re-pw" id="re-pw-org" placeholder="Re-Enter Password">
                    <br>

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="client-error"></div>
                </div>

                <div style="text-align: center;">
                    <input type="checkbox" name="remember" id="check" style="width: 15px; height: 15px; margin-left: 15%;">
                    <span style="font-size: 15px; color: #7c89d2; text-decoration:none;"><a href="terms">I agree to terms and conditions</a></span>
                </div>

                <hr size="1px" noshade style="width: 80%; opacity: 0.1; text-align: center;
                height: 2px;
                background: black;">

                <button type="submit" class="loginbtn" id="create" style="width: 100%; height: 10%;
                            margin-left: 2px; margin-top: 15px;
                            margin-bottom: 10px;">Create Account</button>
            </form>

            <br><br><br>
        </div>

    </div>
    <script src="<?= ROOT ?>/assets/check.js"></script>
</body>

</html>