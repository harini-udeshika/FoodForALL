<?php $this->view('includes/header_2') ?>
<!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css2/org.admin.events.css"> -->
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/org_packages.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div class="container">
    <div class="heading-1 col-12">Packages</div>

    <div class="col-lg-7 grid-12 p-20">
        <!-- package item start -->
        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center" style="height:fit-content;">
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
                <div class="package_items_heading_2 purpleText col-6" style="padding:8px 0 8px 0;">Total</div>
                <div class="package_text_field purpleText col-6" style=" padding:8px 0 8px 0; border:1px solid var(--projectPurple); align-items:center; border-radius:15px;">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div>
        <!-- package item end -->

        <!-- package item start -->
        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center" style="height:fit-content;">
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
                <div class="package_items_heading_2 purpleText col-6" style="padding:8px 0 8px 0;">Total</div>
                <div class="package_text_field purpleText col-6" style=" padding:8px 0 8px 0; border:1px solid var(--projectPurple); align-items:center; border-radius:15px;">Price</div>
            </div>

            <div class="row p-top-20">
                <button class="btn btn-sm btn-gray col-6">edit</button>
                <button class="btn btn-sm btn-purple col-6">remove</button>
            </div>
        </div>
        <!-- package item end -->
    </div>

    <div class="blank col-5 m-20" style="border:1px solid rgba(0,0,0,0.2); padding: 0px 40px 30px 40px;">
        <h2>Add package</h2>
        <!-- package item start -->
        <div class="card col-lg-6 p-top-16 p-bottom-16 p-left-25 p-right-25 m-10 txt-al-center">
            <div class="txt-11 w-semibold">Package name</div>

            <div class="flex al-center p-10 p-top-28 p-bottom-15" style="justify-content:space-between;">
                <div class="txt-purple txt-10 txt-al-left ">Package items</div>
                <i id="add_package_items" class="fa-sharp fa-solid fa-square-plus txt-20" onclick="addInputField()" style="cursor:pointer;"></i>
            </div>

            <div id="field_holder" class="card-simple p-3 m-lr-auto">
                <div class="m-lr-auto grid-10 p-8 p-bottom-2" >
                    <div class="txt-09 col-3 txt-black w-medium" >Item</div>
                    <div class="txt-09 col-3 txt-black w-medium" >Quantity</div>
                    <div class="txt-09 col-3 txt-black w-medium" >Unit price</div>
                    <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer; visibility:hidden;"></i>
                </div>
                <!-- input field -->
                <!-- <div class=" m-lr-auto grid-10 p-8" id="input_field">
                        <input class="txt-09 col-3 txt-gray" placeholder="Item">
                        <input class="txt-09 col-3 txt-gray" placeholder="Quantity">
                        <input class="txt-09 col-3 txt-gray" placeholder="unit price">
                        <i class="fa-solid fa-circle-xmark col-1 txt-14" style="cursor:pointer;""></i>
                </div> -->
                <!-- end input field -->

               
            </div>


            <div class="row p-top-20">
                <button class="btn btn-sm btn-green col-12">Add package</button>
            </div>
        </div>
        <!-- package item end -->
    </div>

    <script>
        function malInput() {
            console.log("worked")
        }

        function deleteInput() {
            this.parentElement.remove()
        }

        let counter = 0;

        function addInputField() {
            const inputFields = document.getElementById("field_holder");


            const elementdiv = document.createElement("div");
            elementdiv.setAttribute("class", "m-lr-auto grid-10 p-8")
            elementdiv.setAttribute("id", "input_field")

            const input_item = document.createElement("input");
            input_item.name = "item_" + counter;
            input_item.id = "item_" + counter;
            input_item.setAttribute("class", "txt-09 col-3 txt-gray")
            input_item.setAttribute("placeholder", "Item")

            const input_quantity = document.createElement("input");
            input_quantity.name = "quantity_" + counter;
            input_quantity.id = "quantity_" + counter;
            input_quantity.setAttribute("class", "txt-09 col-3 txt-gray")
            input_quantity.setAttribute("placeholder", "Quantity")

            const input_unitPrice = document.createElement("input");
            input_unitPrice.name = "unitPrice_" + counter;
            input_unitPrice.id = "unitPrice_" + counter;
            input_unitPrice.setAttribute("class", "txt-09 col-3 txt-gray")
            input_unitPrice.setAttribute("placeholder", "Unit price")

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
        }
    </script>

    <!-- <div class="row justify-to-left ">
        <div class="page_title_2" style="margin-bottom: 0px; margin-top:15px; padding-top:5px;">Add Packages</div>
        <i class="fas fa-plus-square toggleButton" style="margin-bottom: 0px; margin-top:15px; margin-left:10px; padding-top:5px; font-size: 42px;" id="plusIcon"></i>
    </div>
</div>

<script src="<?= ROOT ?>/assets/Event_item.js"></script

<?php $this->view('includes/footer') ?>