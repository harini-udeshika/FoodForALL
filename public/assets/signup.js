const form = document.getElementById("form");
const firstName = document.getElementById("first_name");
const lastName = document.getElementById("last_name");
const nic = document.getElementById("nic");
const email = document.getElementById("email");
const telephone = document.getElementById("telephone");
const password = document.getElementById("password");
const rePassword = document.getElementById("re_enter_password");
const check = document.getElementById("check");
const address=document.getElementById("address_1");
const city=document.getElementById("city");
const postalCode=document.getElementById("postal_code");

var valid=true;

form.addEventListener("submit", (e) => {
    e.preventDefault();
    inputChecker();
    if(valid===true) {
        form.submit();
    }
})
async function inputChecker() {
    //values from the inputs
    const firstNameVal = firstName.value.trim();
    const lastNameVal = lastName.value.trim();
    const nicVal = nic.value.trim();
    const emailVal = email.value.trim();
    const telVal = telephone.value.trim();
    const passwordVal = password.value.trim();
    const rePasswordVal = rePassword.value.trim();
    const addressVal = address.value.trim();
    const cityVal = city.value.trim();
    const postalCodeVal = postalCode.value.trim();
    // const error=

    if (firstNameVal === "") {
        //error message
        displayError(firstName, "First name can't be empty");
        
    } else {
        //display success tick
        displaySuccess(firstName);
    }

    if (cityVal === "") {
        //error message
        displayError(city, "City can't be empty");
        
    } else {
        //display success tick
        displaySuccess(city);
    }
    if (postalCodeVal === "") {
        //error message
        displayError(postalCode, "Postal code can't be empty");
        
    }
    else if (postalCodeVal.length != 5 ) {
        //error message
        displayError(postalCode, "Enter a valid postal code");
        
    }
    else {
        //display success tick
        displaySuccess(postalCode);
    }
    
    if (addressVal === "") {
        //error message
        displayError(address, "Address can't be empty");
        
    } else {
        //display success tick
        displaySuccess(address);
    }
    if (lastNameVal === "") {
        displayError(lastName, "Last name can't be empty");
    } else {
        displaySuccess(lastName);
    }
    if (nicVal.length !== 10 && nicVal.length !== 12) {
        displayError(nic, "Enter a valid nic");
    } else {
        displaySuccess(nic);
    }
    if (emailVal === "") {
        displayError(email, "Email can't be empty");
    } else if (!checkEmail(emailVal)) {
        displayError(email, "Enter a valid email");
    }
    else {
        displaySuccess(email);
    }
    if (telVal.length !== 10) {
        displayError(telephone, "Enter a valid telephone number");
    } else {
        displaySuccess(telephone);
    }
    if (passwordVal.length < 8) {
        displayError(password, "Password must have at least 8 characters");
    } else if (!(/[a-zA-Z]/.test(passwordVal))) {
        displayError(password, "Password must contain at least one letter")
    } else if (!(/[0-9]/.test(passwordVal))) {
        displayError(password, "Password must contain at least one number");
    } else {
        displaySuccess(password);
    }
    if (passwordVal !== rePasswordVal) {
        displayError(rePassword, "Passwords do not match");
    }else if(rePasswordVal ===""){
        displayError(rePassword, "Password can't be empty");
    }
    else {
        displaySuccess(rePassword);
    }
    if (!check.checked) {
        displayError(check, "Accept terms and conditions");
    }
    else {
        displaySuccess(check);
    }
}
function displayError(input, message) {
    const f = input.parentElement;
    const small = f.querySelector('small');
    if (input === check) {
        f.className = "f12 error";
    } else {
        f.className = "f error";    
    }
    //add error message
    small.innerText = message;
    //add error class
    valid=false;
}

function displaySuccess(input) {
    const f = input.parentElement;
    if(input===check){
        f.className = "f12 success";
    }
    else{
         f.className = "f success";
    }
   
}
function checkEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}