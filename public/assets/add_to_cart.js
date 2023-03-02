var buttons=document.querySelectorAll('.cart');
const alert=document.getElementById("alert");
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click",()=>{
    
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'http://localhost/food_for_all/public/shop/add_to_cart', true);
  
    ajax.send();
  
    ajax.onload = function() {
      if (this.readyState === 4 && this.status === 200) {
        console.log(ajax.response);
        // var res =JSON.parse(ajax.response);
        // console.log(res);
        alert.className='alert visible';
        alert.innerHTML = ajax.response;
        setTimeout(() => {
            alert.className='hidden';
            alert.innerHTML = "";
        }, 1000);
      }
    };
})
}
