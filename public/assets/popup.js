const popup=document.getElementById('popup');
const send=document.getElementById('send');
const ok=document.getElementById('ok');

send.addEventListener("click", function(){
popup.classList.add("open-popup");
})
ok.addEventListener("click", function(){
    popup.classList.remove("open-popup");
    })