console.log("inside>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
const form_org = document.getElementById('reg-form');

const name_org = document.getElementById('name-org');
const email_org = document.getElementById('email-org');
const gov_org = document.getElementById('gov-org');
const tel_org = document.getElementById('tel-org');
const postal_org = document.getElementById('postal-code-org');
const city_org = document.getElementById('city-org');
const address_org = document.getElementById('address-org');
const pw_org = document.getElementById('pw-org');
const re_pw_org = document.getElementById('re-pw-org');

console.log("inside>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");

var num = 0;
// const btn_em = document.getElementById('form-btn');

form_org.addEventListener('submit', (e) => {
    console.log("inside>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
    validateInputs(e);
});

const setError = (event,element,message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.client-error');
    const txt1 = '';

    errorDisplay.innerHTML = txt1.concat("&emsp;",message);
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

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = (event) => {
    console.log("inside>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");

    const name_emValue = name_org.value.trim();
    const email_emValue = email_org.value.trim();
    const gov_emValue = gov_org.value.trim();
    const pw_emValue = pw_org.value.trim();
    const tel_emValue = tel_org.value.trim();
    const address_emValue = address_org.value.trim();
    const re_pw_emValue = re_pw_org.value.trim();
    const city_emValue = city_org.value.trim();
    const postal_emValue = postal_org.value.trim();

    if(name_emValue === ''){
        setError(event,name_org, 'Username is Required');
    }else{
        setSuccess(name_org);
    }

    if(email_emValue === '') {
        setError(event,email_org, 'Email is required');
    } else if (!isValidEmail(email_emValue)) {
        setError(event,email_org, 'Provide a valid email address');
    } else {
        setSuccess(email_org);
    }

    if(gov_emValue === '') {
        setError(event,gov_org, 'Gov. registration number is required');
    } else if (gov_emValue.length < 2) {
        setError(event,gov_org, 'Not a valid regisrtration number');
    } else {
        setSuccess(gov_org);
    }

    if(pw_emValue === '') {
        setError(event,pw_org, 'Password is required');
    } else if (pw_emValue.length < 8 ) {
        setError(event,pw_org, 'Password must be at least 8 character.');
    } else {
        setSuccess(pw_org);
    }

    if(re_pw_emValue === '') {
        setError(event,re_pw_org, 'Re-enter Password is required');
    } else if (!(pw_emValue === re_pw_emValue)) {
        setError(event,re_pw_org, 'Password does not match');
    } else {
        setSuccess(re_pw_org);
    }

    if(tel_emValue === ''){
        setError(event,tel_org, 'Telephone numberis Required');
    }else if(tel_emValue.length < 10){
        setError(event,tel_org, 'Invalit telephone number');
    } else {
        setSuccess(tel_org);
    }

    if(address_emValue === ''){
        setError(event,address_org, 'Address is Required');
    }else{
        setSuccess(address_org);
    }

    if(postal_emValue === ''){
        setError(event,postal_org, 'Postal-code is Required');
    }else{
        setSuccess(postal_org);
    }

    if(city_emValue === ''){
        setError(event,city_org, 'City is Required');
    }else{
        setSuccess(city_org);
    }

}