<?php $this->view('includes/header')?>
<h3>FoodForALL</h3>
<p>Account Recovery <?=$rows->email?></p>
<p>Please enter the code</p>
<form action="" method="post">
<input type="text" placeholder="X-X-X-X-X" name="code">
<button>Next</button>
</form>