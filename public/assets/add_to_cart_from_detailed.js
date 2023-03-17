let add_to_cart_btn = document.getElementById("add_to_cart");
let add_btn = document.getElementById('add-btn')
let sub_btn = document.getElementById("sub-btn");
let input_btn = document.getElementById("qty-btn");
let remaning_btn = document.getElementById("remain-btn");

add_btn.addEventListener("click", () => {

    let items_in_stock = parseInt(remaning_btn.innerText.split(" ")[0]);
    // console.log(remaning[i]);
    if (input_btn.value < items_in_stock) {
        input_btn.value = parseInt(input_btn.value) + 1;
      // remaning[i].innerText=items_in_stock-1+' remaining';
    }

  })


  sub_btn.addEventListener("click", () => {
    if (input_btn.value > 1) {
        input_btn.value = parseInt(input_btn.value) - 1;
      // remaning[i].innerText=items_in_stock+1+' remaining';
    }

  })

  input_btn.addEventListener('input', () => {
   
    if (parseInt(input_btn.value) > parseInt(remaning_btn.innerHTML.split(' ')[0])) {
     
        input_btn.value = parseInt(remaning_btn.innerHTML.split(' ')[0]);
    }
  })

add_to_cart_btn.addEventListener("click", (event) => {

    event.preventDefault();


    // var queryString = window.location.search;
    // var urlParams = new URLSearchParams(queryString);
    // console.log(urlParams);

    var item = add_to_cart_btn.href.split('?')[1] + '+' + input_btn.value;

    console.log(item);

    var ajax = new XMLHttpRequest();
    ajax.open('GET', 'http://localhost/food_for_all/public/shop/add_to_cart?item=' + item, true);



    ajax.onload = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(ajax.response);
            const alert = document.getElementById("alert");
            // var res =JSON.parse(ajax.response);
            // console.log(res);
            alert.className = 'alert visible';
            alert.innerHTML = ajax.response;
            // let new_stock = parseInt(remaning[i].innerText) - 1;
            // remaning[i].innerText = new_stock + " remaining";
            setTimeout(() => {
                alert.className = 'hidden';
                alert.innerHTML = "";
            }, 1000);
        }
    };
    ajax.send();
})