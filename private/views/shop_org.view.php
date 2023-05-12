<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/styles_org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/edit_packs.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/shop_item.css">

<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<div class="body-container">
    <div class="popup-div" id="popup-div">
        <div class="popup-contain">
            <div class="card popup-card">
                <div class="popup-header">
                    <div class="popup-heading" id="popup-head">NOTICE!</div>
                    <i class="fa-solid fa-circle-xmark popup-close" id="popup-close-btn"></i>
                </div>
                <div class="popup-body">
                    <!-- <i class="fa-solid fa-circle-exclamation" id="popup-hero-btn"></i> -->
                    <div class="popup-message" id="popup-message">
                        <!-- editing form -->
                        <div class="" style="display:flex;justify-content:center;">
                            You have not paid for our subscripion.<br> 
                            To add more than 3 items to your store during the next 30 days, please Subscribe.
                        </div>
                        <!--end editing form -->
                    </div>
                    <div class="m-top-40">
                        <a class="grid-11" href="org_subscribe" style="text-decoration: none;">
                            <button type="button" id="popup_delete_btn" class="btn btn-sm btn-green col-11">Go Subscribe</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<script>
    // const form_shop = document.getElementById('input-form-shop');
    // const name_item = document.getElementById('name-item');
    // const stock_item = document.getElementById('stock-item');
    // const price_item = document.getElementById('price-item');
    // const code_item = document.getElementById('code-item');
    // // const result_hold_div = document.getElementById('result_hold_div');

    // var num = 0;
    // var error_state = 0


    // form_shop.addEventListener('submit', (e) => {
    //     e.preventDefault()

    //     error_state = 0
    //     validateInputs(e);
    //     if (error_state == 0) {
    //         validateSubscription()
    //     }
    // });

    // // popup info
    // const popup_div = document.getElementById('popup-div')
    // const popup_close_btn = document.getElementById('popup-close-btn')

    // popup_close_btn.addEventListener("click", close_popup)

    // function open_popup() {
    //     popup_div.style.display = 'block'
    //     // var update_form = document.getElementById("formUpdatePack");
    //     // getPackData(package_id)
    // }

    // function close_popup() {
    //     popup_div.style.display = 'none'
    //     // counter_edit = 0
    // }


    // const setError = (event, element, message) => {
    //     if (element.parentElement) {
    //         const inputControl = element.parentElement;
    //         const errorDisplay = inputControl.querySelector('.client-error');
    //         const txt1 = '&emsp;&emsp;&emsp;';

    //         errorDisplay.innerHTML = txt1.concat("", message);
    //         inputControl.classList.add('error');
    //         inputControl.classList.remove('success');
    //     }

    //     error_state += 1
    //     // event.preventDefault();
    // };

    // const setSuccess = element => {
    //     const inputControl = element.parentElement;
    //     const errorDisplay = inputControl.querySelector('.client-error');

    //     errorDisplay.innerText = '';
    //     inputControl.classList.add('success');
    //     inputControl.classList.remove('error');
    //     num = num + 1;
    // };

    // function setErrorPopup(event, element) {
    //     setError(event, element, '')
    //     open_popup();
    // }

    // const validateInputs = (event) => {
    //     const name_itemValue = name_item.value.trim();
    //     const price_itemValue = price_item.value.trim();
    //     const stock_itemValue = stock_item.value.trim();
    //     const code_itemValue = code_item.value.trim();

    //     if (name_itemValue === '') {
    //         setError(event, name_item, 'Item name is Required');
    //     } else {
    //         setSuccess(name_item);
    //     }

    //     if (price_itemValue === '') {
    //         setError(event, price_item, 'Item price is required');
    //     } else if (price_itemValue <= 0) {
    //         setError(event, price_item, 'Provide a valid price');
    //     } else {
    //         setSuccess(price_item);
    //     }

    //     if (code_itemValue === '') {
    //         setError(event, code_item, 'Item code is required');
    //     } else if (code_itemValue < 0) {
    //         setError(event, code_item, 'Provide a valid code');
    //     } else {
    //         setSuccess(code_item);
    //     }

    //     if (stock_itemValue === '') {
    //         setError(event, stock_item, 'Current stock is required');
    //     } else if (stock_itemValue <= 0) {
    //         setError(event, nic_em, 'Provide a valid stock');
    //     } else {
    //         setSuccess(stock_item);
    //     }

    // }


    // async function validateSubscription() {
    //     try {
    //         const response = await fetch("http://localhost/FoodForAll/public/shop_org/isSubscribed/")
    //         const data = await response.text()
    //         console.log(data)
    //         if (data == "TRUE") {
    //             form_shop.submit()
    //         } else {
    //             open_popup()
    //         }
    //     } catch (error) {
    //         console.log(error)
    //     }
    // }
</script>

<script src="<?= ROOT ?>/assets/script/shop_form_check.js"></script>

<?php $this->view('includes/footer') ?>