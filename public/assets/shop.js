var cart_qty = document.querySelectorAll(".qty");
let add_btns = document.querySelectorAll(".cart_quantity_up");
let sub_btns = document.querySelectorAll(".cart_quantity_down");
let price = document.querySelectorAll(".price");
let total = document.querySelectorAll(".total");
let bill_total = document.getElementById("bill_total");
let rows = document.querySelectorAll(".table_row");
let remove_btns = document.querySelectorAll(".remove");
const alert = document.getElementById("alert");
let trash=document.getElementById("trash");
let trash_conf=document.getElementById("trash_conf");
var data;
var quantity, i;
console.log("hii");

// -----------------cart quantity up------------------------
for (let i = 0; i < add_btns.length; i++) {
    add_btns[i].addEventListener('click', (e) => {
        e.preventDefault();
        var cart = add_btns[i].href.split('?')[1];
        console.log(cart);

        var ajax = new XMLHttpRequest();
        ajax.open('GET', 'http://localhost/food_for_all/public/shop/add_qty?cart=' + cart, true);

        ajax.onload = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log((ajax.response));
                let number = ajax.response;
                number = parseInt(number);
                // console.log(isNaN(number));
                cart_qty[i].value = (number);
                total[i].innerText = parseInt(price[i].innerHTML) * number;

                let current_total = parseInt(bill_total.innerHTML.split('.')[1]);
                let updated_total = current_total + parseInt(price[i].innerHTML);

                bill_total.innerHTML = "Rs." + updated_total + ".00";

            }
        };
        ajax.send();
    })

}

// -----------------cart_quantity down----------------------
for (let i = 0; i < sub_btns.length; i++) {
    sub_btns[i].addEventListener('click', (e) => {
        e.preventDefault();
        var cart = sub_btns[i].href.split('?')[1];
        console.log(cart);

        var ajax = new XMLHttpRequest();
        ajax.open('GET', 'http://localhost/food_for_all/public/shop/sub_qty?cart=' + cart, true);

        ajax.onload = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log((ajax.response));
                let number = ajax.response;
                number = parseInt(number);

                // console.log(isNaN(number));
                cart_qty[i].value = (number);
                total[i].innerText = parseInt(price[i].innerHTML) * number;


                let current_total = parseInt(bill_total.innerHTML.split('.')[1]);
                let updated_total = current_total - parseInt(price[i].innerHTML);
                if (number == 0) {
                    rows[i].remove();
                }

                bill_total.innerHTML = "Rs." + updated_total + ".00";

            }
        };
        ajax.send();
    })

}

// ------------delete item---------------------
for (let i = 0; i < remove_btns.length; i++) {

    remove_btns[i].addEventListener('click', (e) => {
        e.preventDefault();
        var cart = remove_btns[i].href.split('?')[1];
        console.log(cart);

        var ajax = new XMLHttpRequest();
        ajax.open('GET', 'http://localhost/food_for_all/public/shop/delete_qty?cart=' + cart, true);

        ajax.onload = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log((ajax.response));
            }
        };
        let items_in_cart = cart_qty[i].value;
        data = "items_in_cart=" + items_in_cart;

        ajax.send(data);

        let current_total = parseInt(bill_total.innerHTML.split('.')[1]);
        let updated_total = current_total - (parseInt(price[i].innerText) * parseInt(cart_qty[i].value));
        bill_total.innerText = "Rs." + updated_total + ".00";
        rows[i].remove();
    })

}

for (let i = 0; i < cart_qty.length; i++) {

    cart_qty[i].addEventListener('input', () => {
        var ajax = new XMLHttpRequest();
        if (cart_qty[i].value == 'NaN' || cart_qty[i].value == '') {

            cart_qty[i].value = 0;

        }

        cart_qty[i].value = cart_qty[i].value.replace(/[^0-9]/g, '');
        data = {
            quantity: cart_qty[i].value,
            index: i
        };
        //updating total

        total[i].innerText = parseInt(price[i].innerHTML) * parseInt(cart_qty[i].value);
        if (total[i].innerText == 'NaN') {
            total[i].innerText = "--";
        }
        // updating bill total
        let updated_total = 0;
        for (let i = 0; i < total.length; i++) {
            updated_total += parseInt(total[i].innerText);
        }


        bill_total.innerHTML = "Rs." + updated_total + ".00";
        var cart = remove_btns[i].href.split('?')[1];
        ajax.open('POST', 'http://localhost/food_for_all/public/shop/update_qty?cart='+ cart, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        ajax.send(JSON.stringify(data));
        ajax.onload = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log((ajax.response));
                if (ajax.response.includes("Available")) {
                    alert.className = 'alert visible';
                    alert.innerHTML = ajax.response;
                }
                setTimeout(() => {
                    alert.className = 'hidden';
                    alert.innerHTML = "";
                }, 1000);
            }
        };
       
    })
}
trash.addEventListener('click', ()=>{
    console.log('trash clicked');
    trash_conf.classList.toggle("visible");
})
