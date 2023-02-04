const donor = document.querySelector("#user_type");
const event_name = document.querySelector("#event");
const star1 = document.querySelector("#star1");
const star2 = document.querySelector("#star2");
const star3 = document.querySelector("#star3");
const star4 = document.querySelector("#star4");
const star5 = document.querySelector("#star5");

const form = document.querySelector("#form");
valid = true;
form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (donor.value == "") {
        valid = false;
        displayError("  Select user role");
    }
    else if (event_name.value == "") {
        valid = false;
        displayError("  Select participated event");
    }
    else if (!(star1.checked == true||star2.checked == true||star3.checked == true||star4.checked == true||star5.checked == true)) {
        valid = false;
        displayError("  Enter your rating")
    }
    else{
        valid = true;
    }
    if (valid === true) {
        form.submit();
    }
})

function displayError(message) {
    const small = document.getElementById("small");
    small.innerText = message;
    small.parentElement.className = "error";
}