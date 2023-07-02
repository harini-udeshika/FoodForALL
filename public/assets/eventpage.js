let form= document.getElementById('donate');
let needmore= document.getElementById('required');
let amountentering = document.getElementById('inputvalue');
let valid=true;
let notify=document.getElementById('error')
form.addEventListener('submit', (e)=>{
    e.preventDefault();
})

let required = parseInt(needmore.innerText.split(' ')[0]);
if(amountentering.value>needmore){
    error.style.color = 'red';
}
