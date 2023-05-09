const form_shop = document.getElementById('input-form-shop');
const name_item = document.getElementById('name-item');
const stock_item = document.getElementById('stock-item');
const price_item = document.getElementById('price-item');
const code_item = document.getElementById('code-item');
var num = 0;


form_shop.addEventListener('submit', (e) => {
    // validateInputs(e);
    validateSubscription(e);
    // e.preventDefault();
});

// popup info
const popup_div = document.getElementById('popup-div')
const popup_close_btn = document.getElementById('popup-close-btn')

popup_close_btn.addEventListener("click", close_popup)

function open_popup() {
    popup_div.style.display = 'block'
    // var update_form = document.getElementById("formUpdatePack");
    // getPackData(package_id)
}

function close_popup() {
    popup_div.style.display = 'none'
    // counter_edit = 0
}


const setError = (event,element,message) => {
    if(element.parentElement){
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.client-error');
        const txt1 = '&emsp;&emsp;&emsp;';

        errorDisplay.innerHTML = txt1.concat("",message);
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }
    
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

function setErrorPopup(event,element) {
    setError(event,element,'')
    open_popup();
}

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

}

const validateSubscription = (event) => {

    fetch("http://localhost/FoodForAll/public/shop_org/isSubscribed/")
                .then(response => response.text())
                .then(data => {
                    console.log(data)
                    
                    if(data === "FALSE"){
                        event.preventDefault();
                        setErrorPopup(event,0);
                    }
                })
                .catch(error => console.log(error))

}