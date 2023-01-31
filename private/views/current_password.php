<?php $this->view('includes/header')?>

<h3>FoodForALL</h3>
<h2>Hello <?=$rows->first_name?></h2>
<p>Enter Your Current Password</p>
<form action="" method="post">
    <input type="password" placeholder="Enter your current password" name="password">
    <button>Submit</button>
</form>