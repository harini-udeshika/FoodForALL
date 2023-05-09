const pack_form = document.getElementById('pack-form');
const pack_form_update = document.getElementById('formUpdatePack');

const pack_name = document.getElementById('pack-name');
const pack_name_update = document.getElementById('pack_name');

pack_form.addEventListener('submit', (e) => {
    
    validateInputs(e);
    // e.preventDefault();
});

pack_form_update.addEventListener('submit', (e) => {
    
    validateUpdates(e);
    // e.preventDefault();
});

const setError_name = (event,element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');
    const txt1 = '&emsp;';

    errorDisplay.innerHTML = txt1.concat("",message);
    inputControl.classList.add('error');
    inputControl.classList.remove('success');

    // console.log(pack_name.classList);
    pack_name.classList.add('error');
    pack_name.classList.remove('success');
    // console.log(pack_name.classList);
    event.preventDefault();
};

const setSuccess_name = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');

    errorDisplay.innerText = '';
    
    pack_name.classList.add('success');
    pack_name.classList.remove('error');

    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const setError = (event,message) => {
    
    const errorDisplay = document.getElementsByClassName('client-error-feild')[0];
    const txt1 = '';
    errorDisplay.innerHTML = txt1.concat("",message);
    // console.log("hello");
    event.preventDefault();
};

const setSuccess = element => {
    const errorDisplay = document.getElementsByClassName('client-error-feild')[0];

    errorDisplay.innerText = '';
};

const validateInputs = (event) => {
    const name_val = pack_name.value.trim();
    if(name_val === '' || name_val === "Package name"){
        setError_name(event,pack_name, 'Package name is Required');
    }else{
        setSuccess_name(pack_name);
    }


    const input_items = document.querySelectorAll('input[name="item_name[]"]');
    const input_prices = document.querySelectorAll('input[name="price[]"]');
    const input_quantity = document.querySelectorAll('input[name="quantity[]"]');
    // Loop through inputs and build array of values
    const item_values = [];
    const price_values = [];
    const quantity_values = [];

    input_items.forEach(input_items => {
        item_values.push(input_items.value.trim());
        });

    input_prices.forEach(input_prices => {
        price_values.push(input_prices.value.trim());
        });
    
    input_quantity.forEach(input_quantity => {
        quantity_values.push(input_quantity.value.trim());
        });
    if(item_values.length === 0){
        setError(event,'Please add items to your food pack');
    }
    else{
        setSuccess(0);
    }

    for(let i=0;i<item_values.length;i++){
        if(item_values[i] === '' || price_values[i] === '' || quantity_values[i] === ''){
            setError(event,'Please make sure that all feilds are filled with valid data.');
            break;
        }else{
            setSuccess(0);
        }
    }
}







// validations for updating packages..............................................................................................
const validateUpdates = (event) => {
    const name_val = pack_name_update.value.trim();
    if(name_val === '' || name_val === "Package name"){
        setError_name(event,pack_name_update, '&emsp;Package name is Required');
    }else{
        setSuccess_name(pack_name_update);
    }


    const input_items = document.querySelectorAll('input[name="item_name_update[]"]');
    const input_prices = document.querySelectorAll('input[name="price_update[]"]');
    const input_quantity = document.querySelectorAll('input[name="quantity_update[]"]');
    // Loop through inputs and build array of values
    const item_values = [];
    const price_values = [];
    const quantity_values = [];

    input_items.forEach(input_items => {
        item_values.push(input_items.value.trim());
        });

    input_prices.forEach(input_prices => {
        price_values.push(input_prices.value.trim());
        });
    
    input_quantity.forEach(input_quantity => {
        quantity_values.push(input_quantity.value.trim());
        });

    if(item_values.length === 0){
        setError_update(event,'Please add items to your food pack.');
    }
    else{
        setSuccess_update(0);
    }

    for(let i=0;i<item_values.length;i++){
        if(item_values[i] === '' || price_values[i] === '' || quantity_values[i] === ''){
            setError_update(event,'Please make sure that all feilds are filled with valid data.');
            break;
        }else{
            setSuccess_update(0);
        }
    }
}

const setError_update = (event,message) => {
    
    const errorDisplay = document.getElementsByClassName('client-error-feild-edit')[0];
    const txt1 = '';
    errorDisplay.innerHTML = txt1.concat("",message);
    // console.log("hello");
    event.preventDefault();
};

const setSuccess_update = element => {
    const errorDisplay = document.getElementsByClassName('client-error-feild-edit')[0];

    errorDisplay.innerText = '';
};