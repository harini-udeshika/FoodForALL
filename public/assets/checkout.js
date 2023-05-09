let fullname = document.getElementById('name');
let address = document.getElementById('address');
let city = document.getElementById('city');
let telephone = document.getElementById('telephone');
let form = document.getElementById("form");
let district = document.getElementById('district');
let delivery=document.getElementById('delivery');
let total=document.getElementById('total');
let bill_total=document.getElementById('bill_total');
var valid = true;
delivery.innerText="00.00";
total.innerText=bill_total.innerText;
district.addEventListener('change', ()=>{
    if(district.value==="Colombo"){
        delivery.innerText="200.00";
    }else if(district.value==="value"){
        delivery.innerText="00.00";
    }
    else{
        delivery.innerText="400.00";
    }
   total.innerText=parseFloat(delivery.innerText)+parseFloat(bill_total.innerText)+".00";
})
form.addEventListener("submit", (e) => {
    e.preventDefault();
    inputChecker();
    if (valid === true) {
        form.submit();
    }
})

async function inputChecker() {
    //values from the inputs
    let nameVal = fullname.value.trim();
    let addressVal = address.value.trim();
    let cityVal = city.value.trim();
    let telVal = telephone.value.trim();
    let districtVal = district.value.trim();
    // const error=

    if (nameVal === "") {
        //error message
        displayError(fullname, "Enter receipient's name");

    } else {
        //display success tick
        displaySuccess(fullname);
    }
    if (addressVal === "") {
        displayError(address, "Enter the address to be delivered");
    } else {
        displaySuccess(address);
    }
    if (cityVal === "") {
        displayError(city, "City cannot be empty");
    }
    else {
        displaySuccess(city);
    }
    if (telVal.length !== 10) {
        displayError(telephone, "Enter a valid telephone number");
    } else {
        displaySuccess(telephone);
    }
    if (districtVal === "select") {
        //error message
        displayError(district, "Select the district");

    } else {
        //display success tick
        displaySuccess(district);
    }
}

function displayError(input, message) {
    const f = input.parentElement;
    const small = f.querySelector('small');
    f.className = "f error";
    small.innerText = message;
    valid = false;
}

function displaySuccess(input) {
    const f = input.parentElement;
    f.className = "f success";
}

