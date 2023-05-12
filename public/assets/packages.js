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
        input_item.name = "item_name[]" + counter;
        input_item.id = "item_" + counter;
        input_item.setAttribute("class", "txt-09 col-3 txt-gray")

        const input_quantity = document.createElement("input");
        input_quantity.name = "quantity[]" + counter;
        input_quantity.id = "quantity_" + counter;
        input_quantity.setAttribute("class", "txt-09 col-3 txt-gray")
        input_quantity.setAttribute("value", "1")
        input_quantity.setAttribute("type", "number")
        input_quantity.setAttribute("min", "1")


        const input_unitPrice = document.createElement("input");
        input_unitPrice.name = "price[]" + counter;
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