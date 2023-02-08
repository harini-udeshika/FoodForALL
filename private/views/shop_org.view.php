<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/styles_org.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<?php
//  echo "<pre>";
//  echo "home_org";
//  print_r($allitems);
?>
<div style="font-family:'Inter'; text-align:center; font-size: 50px; font-weight: bold; color: #7681BF;">
    <?php if (isset($_SESSION['USER'])) {
        $na = $_SESSION['USER']->name;
        echo $na;
    }
    ?> : Merchendise Store
</div>

<center>
    <div style="width: 1500px; height:auto;">

        <div class="center-box-blank" style="float: right; margin-right: 30px; 
        width: 870px; height: auto; padding-bottom: 30px;">
            <div style="font-family:'consolas'; text-align:center; font-size: 35px; font-weight: bold; color: black;">
                Your Items
                <hr size="1px" noshade style="width: 70%; opacity: 0.4; text-align: center;
                height: 2px;
                background: black;">
            </div>

            <div class="shop-item-container">
                <?php
                // $sql = "SELECT * FROM shop ORDER BY id ASC";
                // $res = mysqli_query($con,$sql);
                // $count = sizeof($allitems);
                // echo "<pre>";
                // print_r($allitems);

                // die;
                $i = 0;

                if ($allitems) {
                    $count = sizeof($allitems);
                    while ($count > 0) {
                        $img = $allitems[$i]->image;
                        $name = $allitems[$i]->name;
                        $code = $allitems[$i]->item_no;
                        $price = $allitems[$i]->price;
                        $stock = $allitems[$i]->stock;
                ?>

                        <div class="child-shop-item">

                            <div class="shop-item-img">
                                <img src="<?= ROOT ?>/images/merch_items/<?php echo $img; ?>">
                            </div>


                            <p style="margin-top: 2px;">
                                <?php echo "<p class='item-text-1'>" . $name . "</p>"; ?> <br>
                            <p class='item-text-2'> <?php echo $price . ".00 LKR</p>"; ?> <br>
                            <p class='item-text-3' style="font-weight: bold;">Code : <?php echo $code; ?></p><br>
                            <p class='item-text-3' style="font-weight: bold;">Stock : <?php echo $stock; ?></p>
                            </p><br><br><br>
                            <button class="btn-2"><i class="fa-regular fa-trash-can"></i></button>
                            <button class="btn-3" style="right: 160px;">edit</button>
                        </div>
                    <?php
                        $count = $count - 1;
                        $i = $i + 1;
                    }
                } else { ?>
                    <center>
                        <div style="font-family:'inter'; text-align:center; width:400px;  margin-left:66%;
                    font-size: 30px; font-weight: 600; color: black;">Your Shop is Empty</div>
                    </center>
                <?php }
                ?>


                <!-- <div class="aaa"></div> -->
            </div>

        </div>
        <div class="center-box" style="float: left; width: 470px; margin-left: 3%;
    background-image: url('./images/bg1.png');
    background-repeat: no-repeat;
    background-position: right bottom;
	background-size: cover">

            <h1 style="font-family: consolas;">Add Items</h1>
            <form method="POST" id="input-form" class="input-form" enctype="multipart/form-data">
                <label for="itemName">Item Name:</label><br>&nbsp;&nbsp;
                <input type="text" name="itemName" placeholder="Item Name"><br>

                <label for="price">Price:</label><br>&nbsp;&nbsp;
                <input type="text" name="price" placeholder="Unit Price"><br>

                <label for="stock"></label>Available stock:<br>&nbsp;&nbsp;
                <input type="number" name="stock" placeholder="0" min="0" max="100"><br>

                <label for="code"></label>Item code:<br>&nbsp;&nbsp;
                <input type="text" name="code" placeholder="Item code"><br>

                <label for="image">Item Image:</label><br>&nbsp;&nbsp;
                <input type="file" name="image" id="image" style="background-color: rgba(255, 255, 255, 0);
            box-shadow: 0 0px 0px 0px;" accept="image/png, image/jpeg, image/jpg"><br>

                <input type="submit" name="submit" class="add-btn" style="font-size: 25px;" value="ADD"></input>
            </form>
        </div>
    </div>
</center>

<?php $this->view('includes/footer') ?>