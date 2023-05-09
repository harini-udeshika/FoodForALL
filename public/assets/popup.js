const popup=document.getElementById('popup');
const send=document.getElementById('send');
const ok=document.getElementById('ok');
const form = document.getElementById('form');

form.addEventListener("submit",(e)=>{
    e.preventDefault();
   
})

send.addEventListener("click", function(){ 
popup.classList.add("open-popup");
})
ok.addEventListener("click", function(){
    form.submit();
    popup.classList.remove("open-popup");
})