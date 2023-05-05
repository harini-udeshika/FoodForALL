<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/styles_org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/shop_item.css">
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

<div class="body-container">

    <div class="container m-top-20 p-left-50">
        <!-- adding items -->
        <div class="card col-lg-5 m-40 card-back1">

            <h1 style="font-family: inter; text-align:center;">Add Items</h1>
            <form method="POST" id="input-form-shop" class="input-form" enctype="multipart/form-data">
                <div class="eminput-control">
                    <label for="itemName">Item Name:</label><br>&nbsp;&nbsp;
                    <input type="text" name="itemName" id="name-item" placeholder="Item Name"><br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <label for="price">Price:</label><br>&nbsp;&nbsp;
                    <input type="text" name="price" id="price-item" placeholder="Unit Price"><br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <label for="stock"></label>Available stock:<br>&nbsp;&nbsp;
                    <input type="number" name="stock" id="stock-item" placeholder="0" min="0" max="100"><br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <label for="code"></label>Item code:<br>&nbsp;&nbsp;
                    <input type="text" name="code" id="code-item" placeholder="Item code"><br>
                    <div class="client-error"></div>
                </div>
                <label for="image">Item Image:</label><br>&nbsp;&nbsp;
                <input type="file" name="image" id="image" style="background-color: rgba(255, 255, 255, 0);
            box-shadow: 0 0px 0px 0px;" accept="image/png, image/jpeg, image/jpg"><br>

                <button type="submit" class="submit-btn" style="font-size: 20px; margin-bottom:15px;">ADD</button>
            </form>
        </div>
        <!-- end of adding items -->

        <!-- displaying items -->
        <div class="card-simple col-lg-7" style="max-height: 680px; padding-bottom: 30px; overflow:auto;">
            <div style="font-family:inter; text-align:center; font-size: 35px; font-weight: bold; color: black;">
                Your Items
                <hr size="1px" noshade style="width: 70%; opacity: 0.4; text-align: center;
                height: 2px;
                background: black;">
            </div>

            <div class="card-simple-item grid-9 p-40">
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

                        <div class="card-shop-item col-3 m-right-15 m-bottom-20">

                            <div class="shop-item-img">
                                <img src="<?= ROOT ?>/images/merch_items/<?php echo $img; ?>">
                            </div>

                            <div class="txt-center">
                                <div class="heading-1-item"><?php echo $name; ?></div>
                                <div class="heading-2-item"><?php echo $price . ".00 LKR"; ?></div>
                                <div class="heading-3-item">Stock : <?php echo $stock; ?></div>
                            </div>

                            <a href="<?= ROOT ?>/Shop_org/delete_item?id=<?= $allitems[$i]->item_no ?>">
                                <button class="btn btn-black btn-sm float-left m-bottom-10 m-left-10"><i class="fa-regular fa-trash-can"></i></button>
                            </a>
                            <a href="./org_admin_event_items?id=<?= $allitems[$i]->item_no ?>">
                                <button class="btn btn-green btn-sm float-right m-bottom-10 m-right-10" style="right: 160px;">Edit</button>
                            </a>
                        </div>
                    <?php
                        $count = $count - 1;
                        $i = $i + 1;
                    }
                } else { ?>
                    <center>
                        <div style="font-family:'inter'; text-align:center; width:400px; margin-left:30%;
                    font-size: 30px; font-weight: 600; color: black;">Your Shop is Empty</div>
                    </center>
                <?php }
                ?>


                <!-- <div class="aaa"></div> -->
            </div>

        </div>
        <!-- end of displaying items -->
    </div>
</div>

<script src="<?= ROOT ?>/assets/script/shop_form_check.js"></script>

<?php $this->view('includes/footer') ?>