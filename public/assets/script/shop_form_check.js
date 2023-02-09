const form_shop = document.getElementById('input-form-shop');
const name_item = document.getElementById('name-item');
const stock_item = document.getElementById('stock-item');
const price_item = document.getElementById('price-item');
const code_item = document.getElementById('code-item');
// console.log("helloooo");
var num = 0;
// const btn_em = document.getElementById('form-btn');

form_shop.addEventListener('submit', (e) => {
    // console.log("helloooo");

    validateInputs(e);
    // e.preventDefault();
});

const setError = (event,element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');
    const txt1 = '&emsp;&emsp;&emsp;';

    errorDisplay.innerHTML = txt1.concat("",message);
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
    event.preventDefault();
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
    num = num +1;
};

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }

const validateInputs = (event) => {
    const name_itemValue = name_item.value.trim();
    const price_itemValue = price_item.value.trim();
    const stock_itemValue = stock_item.value.trim();
    const code_itemValue = code_item.value.trim();

    if(name_itemValue === ''){
        setError(event,name_item, 'Item name is Required');
    }else{
        setSuccess(name_item);
    }

    if(price_itemValue === '') {
        setError(event,price_item, 'Item price is required');
    } else if (price_itemValue <= 0) {
        setError(event,price_item, 'Provide a valid price');
    } else {
        setSuccess(price_item);
    }

    if(code_itemValue === '') {
        setError(event,code_item, 'Item code is required');
    } else if (code_itemValue < 0 ) {
        setError(event,code_item, 'Provide a valid code');
    } else {
        setSuccess(code_item);
    }

    if(stock_itemValue === '') {
        setError(event,stock_item, 'Current stock is required');
    } else if (stock_itemValue <= 0) {
        setError(event,nic_em, 'Provide a valid stock');
    } else {
        setSuccess(stock_item);
    }

    // if(num > 3){
    //     // alert(num);
    //     num = 0;
    //     location.replace('./addManager.php');
    // }

};