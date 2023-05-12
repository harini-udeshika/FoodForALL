let buttons = document.querySelectorAll('.cart');
const alert = document.getElementById("alert");
const reset = document.getElementById("reset");
let remaning = document.querySelectorAll(".remain");
let add = document.querySelectorAll(".add"); 
let sub = document.querySelectorAll(".sub")
let input = document.querySelectorAll(".qty");
var data;
console.log("hello");

// ---------------change qty----------------------------
for (let i = 0; i < add.length; i++) {
  add[i].addEventListener("click", () => {

    let items_in_stock = parseInt(remaning[i].innerText.split(" ")[0]);
    // console.log(remaning[i]); 
    if (input[i].value < items_in_stock) {
      input[i].value = parseInt(input[i].value) + 1;
      // remaning[i].innerText=items_in_stock-1+' remaining';
    }

  })
}
// items_in_stock = parseInt(remaning[i].innerText.split(" ")[0]);
for (let i = 0; i < sub.length; i++) {
  sub[i].addEventListener("click", () => {
    if (input[i].value > 1) {
      input[i].value = parseInt(input[i].value) - 1;
      // remaning[i].innerText=items_in_stock+1+' remaining';
    }

  })
}

// -----------------------add to cart---------------------
for (let i = 0; i < buttons.length; i++) {

  input[i].addEventListener('input', () => {
    if (input[i].value == 'NaN' || input[i].value == '') {

      input[i].value = 0;
      
  }
  // make input get only digits
  input[i].value = input[i].value.replace(/[^0-9]/g, '');
        data = {
            quantity: input[i].value,
            index: i
        };
    if (parseInt(input[i].value) > parseInt(remaning[i].innerHTML.split(' ')[0])) {

      input[i].value = parseInt(remaning[i].innerHTML.split(' ')[0]);
    }
    if (parseInt(input[i].value)< 0) {

      input[i].value =1;
    }
    
  })

  buttons[i].addEventListener("click", (event) => {

    event.preventDefault();


    // var queryString = window.location.search;
    // var urlParams = new URLSearchParams(queryString);
    // console.log(urlParams);

    // make item adding to cart not 0 but 1
    if(parseInt(input[i].value)==0){
      input[i].value=1;
    }
    var item = buttons[i].href.split('?')[1] + '+' + input[i].value;

    console.log(item);

    var ajax = new XMLHttpRequest();
    ajax.open('GET', 'http://localhost/food_for_all/public/shop/add_to_cart?item=' + item, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // console.log(JSON.stringify(data));
    ajax.send();

    ajax.onload = function () {
      if (this.readyState === 4 && this.status === 200) {
        console.log(ajax.response);
        let reload = "";
        let success = '<i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;item added to cart sucessfully!';
        if (ajax.response.includes("Shopping cart has been reset")) {
          success = ajax.response.split(":")[1];
          reload = ajax.response.split(":")[0];
          reset.className = 'reset visible';
          reset.innerHTML = reload;
        }
        console.log(reload);
        // var res =JSON.parse(ajax.response);
        // console.log(res);
        alert.className = 'alert visible';
        alert.innerHTML = success;
        let new_stock = parseInt(remaning[i].innerText.split(' ')[0]) - parseInt(input[i].value);
        if (new_stock <= 0) {
          remaning[i].innerText = "Out of stock";
          buttons[i].remove();
          add[i].remove();
          sub[i].remove();
          input[i].remove();
        }
        else {
          remaning[i].innerText = new_stock + " remaining";

        }

        setTimeout(() => {
          alert.className = 'hidden'; 
          alert.innerHTML = "";
        }, 1000);
        if (reload.includes("Shopping cart has been reset")) {
          setTimeout(() => {
            reset.className = 'hidden';
            reset.innerHTML = "";
            location.reload();
          }, 2000);

        }
      }
    };

  })
}
