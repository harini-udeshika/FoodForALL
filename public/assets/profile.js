let add=document.getElementById('add');
let cert=document.getElementById('cert');
let cert_del=document.querySelectorAll('.cert_del');
let cert_del_confirm=document.querySelectorAll('.cert_del_confirm');
add.addEventListener('click', ()=>{
    console.log('add clicked');
    cert.classList.toggle("visible");
})

for(let i=0; i<cert_del.length; i++){
    cert_del[i].addEventListener('click', ()=>{
        console.log('clicked');
        cert_del_confirm[i].classList.toggle("visible");
    })
}
