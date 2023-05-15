const event_form = document.getElementById('add_event_form')
const event_name = document.getElementById('event_name')
const location_address = document.getElementById('locationInp')
const date = document.getElementById('date')
const manager = document.getElementById('manager')
const description = document.getElementById('description')
const district = document.getElementById('district')
const latitude = document.getElementById('p-longitude')
const longlitude = document.getElementById('p-latitude')
const location_error = document.getElementById('location_error')

var error_state = 0

event_form.addEventListener('submit', (e) => {
    e.preventDefault()

        error_state = 0
        validateInputs(e);
        if (error_state == 0) {
            validateSubscription()
        }
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

const setError = (event, element, message) => {
    if (element.parentElement) {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.client-error');
        const txt1 = '&emsp;&emsp;';

        if(message != ''){
            errorDisplay.innerHTML = txt1.concat("", message);
        }
        
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }

    error_state += 1
    // event.preventDefault();
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
    // num = num + 1;
};

const validateInputs = (event) => {
    const name_Value = event_name.value.trim();
    const location_Value = location_address.value.trim();
    const date_Value = date.value;
    const manager_Value = manager.value.trim();
    const description_Value = description.value.trim();
    const district_Value = district.value.trim();
    const latitude_Value = latitude.value.trim();
    const longitude_Value = longlitude.value.trim();
    
    if(name_Value === ''){
        setError(event,event_name, 'Event name is Required');
    }else{
        setSuccess(event_name);
    }

    // console.log(location_Value)
    // if(location_Value === ''){
    //     setError(event,location_address, 'Location address is Required');
    // }else{
    //     setSuccess(location_address);
    // }

    // console.log(date_Value)
    if(date_Value === ''){
        setError(event,date, 'Event date is Required');
    }else{
        setSuccess(date);
    }

    if(manager_Value === '' || manager_Value === 'not selected'){
        setError(event,manager, 'Event Manager is Required');
    }else{
        setSuccess(manager);
    }

    if(district_Value === '' || district_Value === 'not selected'){
        setError(event,district, 'Event District is Required');
    }else{
        setSuccess(district);
    }

    if(description_Value === ''){
        setError(event,description, 'Event description is Required');
    }else{
        setSuccess(description);
    }

    if(latitude_Value === '' || longitude_Value === '' || location_Value === ''){
        setError(event,location_error, '&emsp;&emsp;&emsp;Give Event Address');
    }else{
        setSuccess(location_error);
    }
    
}

async function validateSubscription() {
    try {
        // const response = await fetch("http://localhost/FoodForAll/public/add_event/isSubscribed/")
        const response = await fetch("http://localhost/food_for_all/public/add_event/isSubscribed/")
        const data = await response.text()
        console.log(data)
        if (data == "TRUE") {
            event_form.submit()
        } else {
            open_popup()
        }
    } catch (error) {
        console.log(error)
    }
}