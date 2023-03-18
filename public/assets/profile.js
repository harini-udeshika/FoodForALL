let add=document.getElementById('add');
let cert=document.getElementById('cert');
add.addEventListener('click', ()=>{
    console.log('add clicked');
    cert.classList.toggle("visible");
})
