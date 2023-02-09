// const user_icon = document.querySelector(".nav-user-icon");
// const user_menu = document.querySelector(".user_menu");

// user_icon.addEventListener("click", () => {
//     user_menu.classList.toggle("active");
// })

// document.querySelectorAll(".user_menu_button").forEach(n => {
//     n.addEventListener("click", () => user_menu.classList.remove("active"));
// });

// managers inputform ...................................................
const form_em = document.getElementById('input-form-em');
const name_em = document.getElementById('name-em');
const email_em = document.getElementById('email-em');
const nic_em = document.getElementById('nic-em');
const pw_em = document.getElementById('pw-em');
var num = 0;
// const btn_em = document.getElementById('form-btn');

form_em.addEventListener('submit', (e) => {
    
    
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

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = (event) => {
    const name_emValue = name_em.value.trim();
    const email_emValue = email_em.value.trim();
    const nic_emValue = nic_em.value.trim();
    const pw_emValue = pw_em.value.trim();

    if(name_emValue === ''){
        setError(event,name_em, 'Username is Required');
    }else{
        setSuccess(name_em);
    }

    if(email_emValue === '') {
        setError(event,email_em, 'Email is required');
    } else if (!isValidEmail(email_emValue)) {
        setError(event,email_em, 'Provide a valid email address');
    } else {
        setSuccess(email_em);
    }

    if(pw_emValue === '') {
        setError(event,pw_em, 'Password is required');
    } else if (pw_emValue.length < 8 ) {
        setError(event,pw_em, 'Password must be at least 8 character.');
    } else {
        setSuccess(pw_em);
    }

    if(nic_emValue === '') {
        setError(event,nic_em, 'NIC is required');
    } else if (nic_emValue.length < 9) {
        setError(event,nic_em, 'not a valid NIC');
    } else {
        setSuccess(nic_em);
    }

    // if(num > 3){
    //     // alert(num);
    //     num = 0;
    //     location.replace('./addManager.php');
    // }

};