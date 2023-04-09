let fullname = document.getElementById('name');
let address = document.getElementById('address');
let city = document.getElementById('city');
let telephone = document.getElementById('telephone');
let form = document.getElementById("form");

var valid = true;
form.addEventListener("submit", (e) => {
    // e.preventDefault();
    inputChecker();
    if (valid === true) {
        // form.submit();
    }
})

async function inputChecker() {
    //values from the inputs
    let nameVal = fullname.value.trim();
    let addressVal = address.value.trim();
    let cityVal = city.value.trim();
    let telVal = telephone.value.trim();

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
