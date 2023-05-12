let add=document.getElementById('add');
let cert=document.getElementById('cert');
let cert_del=document.querySelectorAll('.cert_del');
let cert_del_confirm=document.querySelectorAll('.cert_del_confirm');
const small=document.querySelector("small");
const file = document.getElementById("file");
const fileName=document.getElementById("file_name")
const fileLabel = document.getElementById("file_label");
const changeCert= document.getElementById("change_cert");
// const small=document.querySelector("small");
const visible=document.getElementsByClassName("visible");
const select=document.getElementById("event");

add.addEventListener('click', ()=>{
    console.log('add clicked');
    cert.classList.toggle("visible");
    
})


for(let i=0; i<cert_del.length; i++){
    cert_del[i].addEventListener('click', ()=>{
        // console.log('clicked');
        cert_del_confirm[i].classList.toggle("visible");
        small.parentElement.classList.toggle("visible");
    })
}
  

fileLabel.addEventListener("change",()=>{
    if(file.files.length!=0){
        fileName.innerText=file.files[0].name;}
    });
       
changeCert.addEventListener("submit", (e) => {
    console.log("clicked");
        e.preventDefault();
        isValidFile(file);
        // if(valid===true) {
        //     form.submit();
        // }
    })       
function isValidFile(image) {
    if(image.files.length==0){
        small.innerHTML="File can't be empty";
        small.parentElement.className=" error";
    }else if(image.files[0].type!="application/pdf"){
        small.innerHTML="File type is not valid";
        small.parentElement.className=" error";
    }else if(image.files[0].size>1024*1024*8){
        small.innerHTML="File exceeds maximum of 8MB";
        small.parentElement.className=" error";
    }else if(select.value=="select"){
        small.innerHTML="Please select the event";
        small.parentElement.className=" error";
    }
    else{
        small.parentElement.className=" visible";
        changePic.submit();
    }
}     