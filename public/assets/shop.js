var cart_qty = document.querySelectorAll(".qty");
var data;
var quantity,i;
var ajax = new XMLHttpRequest();
ajax.open('POST', 'http://localhost/food_for_all/public/shop/update_qty', true);

ajax.send();

ajax.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
        console.log(ajax.response);
    }
};

for (let i = 0; i < cart_qty.length; i++) {

    cart_qty[i].addEventListener('change', () => {
        data = {
            quantity: cart_qty[i].value,
            index: i
        };
        ajax.open('POST', 'http://localhost/food_for_all/public/shop/update_qty', true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
        ajax.send(JSON.stringify(data));
    })
}