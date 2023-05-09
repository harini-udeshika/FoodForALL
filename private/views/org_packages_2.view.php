<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/edit_packs.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/form_validations.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<style>
    .package_hold_div {
        height: fit-content;
    }

    .budget_total_num {
        border: 1px solid var(--projectPurple);
        align-items: center;
        border-radius: 15px;
    }

    .add_package_div {
        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 0px 40px 30px 40px;
    }

    .package_name_input {
        border: none;
        text-align: center;
    }

    .package_name_input.error {
        outline: 1.5;
        border: 2px solid #f0f0f0;
        border-color: #ff3860;
    }

    .package_name_input.success {
        outline: 1.5;
        border: 2px solid #f0f0f0;
        border-color: #09c372;
    }

    .package_hold_div_edit {
        height: fit-content;
    }

    .budget_total_num_edit {
        border: 1px solid var(--projectPurple);
        align-items: center;
        border-radius: 15px;
    }

    .add_package_div_edit {
        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 0px 40px 30px 40px;
    }

    .package_name_input_edit {
        border: none;
        text-align: center;
    }
</style>

<div class="popup-div" id="popup-div">
    <div class="popup-contain">
        <div class="card popup-card">
            <div class="popup-header">
                <div class="popup-heading" id="popup-head">Edit Package</div>
                <i class="fa-solid fa-circle-xmark popup-close" id="popup-close-btn"></i>
            </div>
            <div class="popup-body">
                <!-- <i class="fa-solid fa-circle-exclamation" id="popup-hero-btn"></i> -->
                <div class="popup-message" id="popup-message">
                    <!-- editing form -->
                    <div class="" style="display:flex;justify-content:center;">
                        <form id="formUpdatePack" action="" method="post">
                            
                            <div class="inputControl">
                            <input class="txt-11 w-semibold package_name_input_edit" id="pack_name" name="pack_name_update" type="text" style="border: solid gray 1px;" placeholder="Package name">
                                <div class="client-error"></div>
                            </div>

                            <div class="flex al-center jf-btwn p-10 m-top-40 m-bottom-15">
                                <div class="txt-purple txt-10 txt-al-left">Package items</div>
                                <i id="add_package_items_edit" class="fa-sharp fa-solid fa-square-plus txt-20" onclick="addEditInputField()" style="cursor:pointer;"></i>
                            </div>

                            <div id="field_holder_edit" class="card-simple p-3 m-lr-auto">
                                <!-- items topics -->
                                <div class="m-lr-auto grid-10 p-8 p-bottom-2">
                                    <div class="txt-09 col-3 txt-black w-medium">Item</div>
                                    <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                                    <div class="txt-09 col-3 txt-black w-medium">Unit price</div>
                                    <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer; visibility:hidden;"></i>
                                </div>


                                <!-- input field -->
                                <!-- <div class=" m-lr-auto grid-10 p-8" id="input_field">
                                    <input class="txt-09 col-3 txt-gray" placeholder="Item" name="item_name[]">
                                    <input class="txt-09 col-3 txt-gray" placeholder="Quantity" name="quantity[]">
                                    <input type="number" min="0" class="txt-09 col-3 txt-gray" placeholder="unit price" name="price[]">
                                    <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer;"></i>
                                </div> -->
                                <!-- end input field -->
                            </div>
                            <div class="client-error-feild-edit"></div>
                            <div class=" row m-top-40">
                                <button type="submit" id="popup_delete_btn" class="btn btn-sm btn-green col-12">Edit package</button>
                            </div>
                        </form>
                    </div>
                    <!--end editing form -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="heading-1 col-12">Packages</div>

    <div class="col-lg-7 grid-12 p-20 m-bottom-20 card " style="height: 560px; overflow: auto; ">

        <?php
        $i = 0;
        if ($package_data) {
            $count = sizeof($package_data);
            while ($count > 0) {
        ?>
                <!-- package item start -->
                <div class="card col-lg-6 col-md-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
                    <div class="txt-11 w-semibold"><?php echo $package_data[$i]->package_name ?></div>

                    <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

                    <div class="card-simple p-20 m-lr-auto grid-9">
                        <div class="txt-09 col-3 txt-black w-medium">Item</div>
                        <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                        <div class="txt-09 col-3 txt-black w-medium">Unit price</div>
                        <!-- start of div with items and prices -->

                        <?php
                        $tot = 0;
                        $price_arr = explode(',', $package_data[$i]->item_price);
                        $item_arr = explode(',', $package_data[$i]->item_name);
                        $quantity_arr = explode(',', $package_data[$i]->quantity);
                        foreach ($item_arr as $key => $i_name) {
                        ?>
                            <div class="txt-09 col-3 txt-gray"><?php echo $i_name ?></div>
                            <div class="txt-09 col-3 txt-gray"><?php echo $quantity_arr[$key] ?></div>
                            <div class="txt-09 col-3 txt-gray"><?php echo $price_arr[$key] ?></div>

                        <?php
                            $tot = $tot + $price_arr[$key] * $quantity_arr[$key];
                        }
                        ?>
                        <!-- end of div with items and prices -->
                    </div>

                    <div class="row txt-al-center p-top-20">
                        <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Package Cost</div>
                        <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num"><?php echo $tot ?></div>
                    </div>

                    <div class="row p-top-20">
                        <!-- <button class="btn btn-sm btn-gray col-6"  onclick="before_delete('<?= $package_data[$i]->package_id ?>')">edit</button> -->
                        <button class="btn btn-sm btn-gray col-6" onclick="open_popup('<?= $package_data[$i]->package_id ?>')">edit</button>
                        <a href="<?= ROOT ?>/Org_packages/delete_package?id=<?= $package_data[$i]->package_id ?>">
                            <button class="btn btn-sm btn-purple col-6">remove</button>
                        </a>
                    </div>
                </div>
            <?php

                $i++;
                $count--;
            }
        } else {
            ?>
            <div class="heading-3 col-12">No Packages Added</div>
        <?php
        }
        ?>




        <!-- package item start -->
        <!-- <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center package_hold_div">
            <div class="txt-11 w-semibold">Package one</div>

            <div class="txt-purple txt-10 txt-al-left p-top-20 p-bottom-15">Package items</div>

            <div class="card-simple p-20 m-lr-auto grid-8">
                <div class="txt-09 col-4 txt-gray">Item 1</div>
                <div class="txt-09 col-4 txt-gray">890 LKR</div>

                <div class="txt-09 col-4 txt-gray">Item 1</div>
                <div class="txt-09 col-4 txt-gray">2890 LKR</div>

                <div class="txt-09 col-4 txt-gray">Item 1</div>
                <div class="txt-09 col-4 txt-gray">89 LKR</div>

                <div class="txt-09 col-4 txt-gray">Item 1</div>
                <div class="txt-09 col-4 txt-gray">1890 LKR</div>
            </div>

            <div class="row txt-al-center p-top-20">
                <div class="package_items_heading_2 purpleText col-6 p-top-8 p-bottom-8">Total</div>
                <div class="package_text_field purpleText col-6 p-top-8 p-bottom-8 budget_total_num">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div> -->
        <!-- package item end -->


    </div>

    <div class="blank col-5 m-20 add_package_div card" style="height: auto;">

        <h2>Add package</h2>

        <div class="card col-lg-6 col-md-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
            <form action="" method="post" id="pack-form">
                <div class="inputControl">
                    <input class="txt-11 w-semibold package_name_input" id="pack-name" name="pack_name" type="text" style="border: solid gray 1px; width:auto;" placeholder="Package name">
                    <div class="client-error"></div>
                </div>


                <div class="flex al-center jf-btwn p-10 p-top-28 p-bottom-15">
                    <div class="txt-purple txt-10 txt-al-left ">Package items</div>
                    <i id="add_package_items" class="fa-sharp fa-solid fa-square-plus txt-20" onclick="addInputField()" style="cursor:pointer;"></i>
                </div>

                <div id="field_holder" class="card-simple p-3 m-lr-auto">
                    <!-- items topics -->
                    <div class="m-lr-auto grid-10 p-8 p-bottom-2">
                        <div class="txt-09 col-3 txt-black w-medium">Item</div>
                        <div class="txt-09 col-3 txt-black w-medium">Quantity</div>
                        <div class="txt-09 col-3 txt-black w-medium">Unit price</div>
                        <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer; visibility:hidden;"></i>
                    </div>


                    <!-- input field -->
                    <!-- <div class=" m-lr-auto grid-10 p-8" id="input_field">
                        <input class="txt-09 col-3 txt-gray" placeholder="Item" name="item_name[]">
                        <input class="txt-09 col-3 txt-gray" placeholder="Quantity" name="quantity[]">
                        <input type="number" min="0" class="txt-09 col-3 txt-gray" placeholder="unit price" name="price[]">
                        <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer;"></i>
                    </div> -->
                    <!-- end input field -->
                </div>

                <div class="client-error-feild"></div>
                <div class=" row p-top-20">

                    <button type="submit" class="btn btn-sm btn-green col-12">Add package</button>
                </div>
            </form>


        </div>
        <!-- package item end -->
    </div>

    <script>
        function malInput() {
            console.log("worked")
        }

        function deleteInput() {
            this.parentElement.remove()
            counter--;
            console.log(counter);
        }

        let counter = 0;

        function addInputField() {
            if (counter <= 5) {
                const inputFields = document.getElementById("field_holder");


                const elementdiv = document.createElement("div");
                elementdiv.setAttribute("class", "m-lr-auto grid-10 p-8")
                elementdiv.setAttribute("id", "input_field")

                const input_item = document.createElement("input");
                input_item.name = "item_name[]";
                input_item.id = "item_" + counter;
                input_item.setAttribute("class", "txt-09 col-3 txt-gray")

                const input_quantity = document.createElement("input");
                input_quantity.name = "quantity[]";
                input_quantity.id = "quantity_" + counter;
                input_quantity.setAttribute("class", "txt-09 col-3 txt-gray")
                input_quantity.setAttribute("value", "1")
                input_quantity.setAttribute("type", "number")
                input_quantity.setAttribute("min", "1")


                const input_unitPrice = document.createElement("input");
                input_unitPrice.name = "price[]";
                input_unitPrice.id = "unitPrice_" + counter;
                input_unitPrice.setAttribute("class", "txt-09 col-3 txt-gray")
                input_unitPrice.setAttribute("placeholder", "Unit price")
                input_unitPrice.setAttribute("type", "number")
                input_unitPrice.setAttribute("min", "0")

                const close_icon = document.createElement("i")
                close_icon.setAttribute("class", "fa-solid fa-circle-xmark col-1 txt-14")
                close_icon.setAttribute("style", "cursor:pointer;")
                close_icon.addEventListener("click", deleteInput)


                inputFields.appendChild(elementdiv);
                elementdiv.appendChild(input_item);
                elementdiv.appendChild(input_quantity);
                elementdiv.appendChild(input_unitPrice);
                elementdiv.appendChild(close_icon);
                counter++;
                console.log(counter);
            }
        }

        const popup_div = document.getElementById('popup-div')
        const popup_close_btn = document.getElementById('popup-close-btn')

        popup_close_btn.addEventListener("click", close_popup)

        function open_popup(package_id) {
            popup_div.style.display = 'block'
            var update_form = document.getElementById("formUpdatePack");
            update_form.action = "org_packages/update_pack/?pack_id=" + package_id;
            getPackData(package_id)
        }

        function close_popup() {
            const inputFields_edit = document.getElementById("field_holder_edit");
            while (inputFields_edit.firstChild) {
                inputFields_edit.removeChild(inputFields_edit.firstChild);
            }
            popup_div.style.display = 'none'
            counter_edit = 0
        }

        function deleteInput() {
            this.parentElement.remove()
            counter_edit--;
            console.log(counter_edit);
        }

        function getPackData(package_id) {
            console.log(package_id)
            fetch("http://localhost/FoodForAll/public/org_packages/before_update/" + package_id)
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    oldFeilds(data[0])
                })
                .catch(error => console.log(error))
        }

        let counter_edit = 0;

        function oldFeilds(pack) {
            // console.log(pack)
            // console.log(pack.package_name)
            // console.log(pack.item_name)

            const old_item_names = pack.item_name.split(",");
            const old_item_price = pack.item_price.split(",");
            const old_item_quantity = pack.quantity.split(",");
            const no_ofItems = old_item_names.length
            // console.log(old_item_names)
            // console.log("-----------------------------")
            // console.log(no_ofItems)

            var pack_name = document.getElementById("pack_name")
            pack_name.value = pack.package_name
            for (let i = 0; i < no_ofItems; i++) {
                console.log(old_item_names[i])
                const inputFields_edit = document.getElementById("field_holder_edit");


                const elementdiv_edit = document.createElement("div");
                elementdiv_edit.setAttribute("class", "m-lr-auto grid-10 p-8")
                elementdiv_edit.setAttribute("id", "input_field")

                const input_item = document.createElement("input");
                input_item.name = "item_name_update[]";
                input_item.id = "item_" + counter_edit;
                input_item.setAttribute("value", old_item_names[i])
                input_item.setAttribute("class", "txt-09 col-3 txt-gray")

                const input_quantity = document.createElement("input");
                input_quantity.name = "quantity_update[]";
                input_quantity.id = "quantity_" + counter_edit;
                input_quantity.setAttribute("class", "txt-09 col-3 txt-gray")
                input_quantity.setAttribute("value", old_item_quantity[i])
                input_quantity.setAttribute("type", "number")
                input_quantity.setAttribute("min", "1")


                const input_unitPrice = document.createElement("input");
                input_unitPrice.name = "price_update[]";
                input_unitPrice.id = "unitPrice_" + counter_edit;
                input_unitPrice.setAttribute("class", "txt-09 col-3 txt-gray")
                input_unitPrice.setAttribute("value", old_item_price[i])
                input_unitPrice.setAttribute("type", "number")
                input_unitPrice.setAttribute("min", "0")

                const close_icon = document.createElement("i")
                close_icon.setAttribute("class", "fa-solid fa-circle-xmark col-1 txt-14")
                close_icon.setAttribute("style", "cursor:pointer;")
                close_icon.addEventListener("click", deleteInput)


                inputFields_edit.appendChild(elementdiv_edit);
                elementdiv_edit.appendChild(input_item);
                elementdiv_edit.appendChild(input_quantity);
                elementdiv_edit.appendChild(input_unitPrice);
                elementdiv_edit.appendChild(close_icon);
                counter_edit++;
                console.log(counter_edit);
            }


        }

        function addEditInputField() {

            if (counter_edit <= 5) {
                const inputFields_edit = document.getElementById("field_holder_edit");


                const elementdiv_edit = document.createElement("div");
                elementdiv_edit.setAttribute("class", "m-lr-auto grid-10 p-8")
                elementdiv_edit.setAttribute("id", "input_field")

                const input_item = document.createElement("input");
                input_item.name = "item_name_update[]";
                input_item.id = "item_" + counter_edit;
                input_item.setAttribute("class", "txt-09 col-3 txt-gray")

                const input_quantity = document.createElement("input");
                input_quantity.name = "quantity_update[]";
                input_quantity.id = "quantity_" + counter_edit;
                input_quantity.setAttribute("class", "txt-09 col-3 txt-gray")
                input_quantity.setAttribute("value", "1")
                input_quantity.setAttribute("type", "number")
                input_quantity.setAttribute("min", "1")


                const input_unitPrice = document.createElement("input");
                input_unitPrice.name = "price_update[]";
                input_unitPrice.id = "unitPrice_" + counter_edit;
                input_unitPrice.setAttribute("class", "txt-09 col-3 txt-gray")
                input_unitPrice.setAttribute("placeholder", "Unit price")
                input_unitPrice.setAttribute("type", "number")
                input_unitPrice.setAttribute("min", "0")

                const close_icon = document.createElement("i")
                close_icon.setAttribute("class", "fa-solid fa-circle-xmark col-1 txt-14")
                close_icon.setAttribute("style", "cursor:pointer;")
                close_icon.addEventListener("click", deleteInput)


                inputFields_edit.appendChild(elementdiv_edit);
                elementdiv_edit.appendChild(input_item);
                elementdiv_edit.appendChild(input_quantity);
                elementdiv_edit.appendChild(input_unitPrice);
                elementdiv_edit.appendChild(close_icon);
                counter_edit++;
                console.log(counter_edit);
            }
        }
    </script>

    <!-- <div class="row justify-to-left ">
        <div class="page_title_2" style="margin-bottom: 0px; margin-top:15px; padding-top:5px;">Add Packages</div>
        <i class="fas fa-plus-square toggleButton" style="margin-bottom: 0px; margin-top:15px; margin-left:10px; padding-top:5px; font-size: 42px;" id="plusIcon"></i>
    </div>
    

<script src="<?= ROOT ?>/assets/Event_item.js"></script> -->
</div>
<script src="<?= ROOT ?>/assets/script/package_form_check.js"></script>
<?php $this->view('includes/footer'); ?>