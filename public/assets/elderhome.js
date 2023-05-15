const form =document.getElementById('elderform');
const Name =document.getElementById('name');
const OwnerName =document.getElementById('ownername');
const nic =document.getElementById('nic');
const regNo =document.getElementById('regno');
const contact1 =document.getElementById('contact1');
const contact2 =document.getElementById('contact2');
const address =document.getElementById('address');
const ha =document.getElementById('ha');
const dp =document.getElementById('dp');
const cp =document.getElementById('cp');
var valid=true;
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    inputChecker();
    // checkInputs();
    if(valid===true) {
        form.submit();
    }
    
});

// function isFormValid(){
//     const inputContainers=form.querySelectorAll('.box1');
//     let result=true;
//     inputContainers.forEach((container)=>{
//         if(container.classList.contains('error')){
//             result=false;
//         }
//     });
//     return result;
// }





function inputChecker(){
   const NameValue=Name.value.trim();
   const OwnerNameValue=OwnerName.value.trim();
   const nicValue=nic.value.trim();
   const regNoValue =regNo.value.trim();
   const contact1Value=contact1.value.trim();
   const contact2Value=contact2.value.trim();
   const addressValue=address.value.trim();
    //get the values from the inputs
    
        if(NameValue===''){
            // show error
            setErrorFor(Name, 'Name cannot be blank');
            
        }else{
            //success
            setSuccessFor(Name);
            
        }
        if(OwnerNameValue===''){
            // show error
            setErrorFor(OwnerName, 'Owner name cannot be blank');
            
        }else{
            //success
            setSuccessFor(OwnerName);
            
        }
        if(nicValue===''){
            // show error
            setErrorFor(nic, 'NIC number cannot be blank');  
        }
        else if(nicValue.length<10||nicValue.length<11){
            setErrorFor(nic, 'Enter valid NIC');  
        }
        else{
            //success
            setSuccessFor(nic);
            
        }
    
        if(regNoValue ===''){
            // show error
            setErrorFor(regNo, 'Registration number cannot be blank');
            
        }else{
            //success
            setSuccessFor(regNo);
            
        }
        if(contact1Value===''){
            // show error
            setErrorFor(contact1, 'Contact details cannot be blank');
            
        }
        else if(contact1Value.length<10){
            setErrorFor(contact1, 'Enter valid contact details');
        }
        else{
            //success
            setSuccessFor(contact1);
            
        }

        if(contact2Value.length==0||contact2Value.length==10||contact2Value.length==12){
            setSuccessFor(contact2);
        }

        else{
            setErrorFor(contact2, 'Enter valid contact details');
        }

        if(addressValue===''){
            // show error
            setErrorFor(address, 'Address cannot be blank');
            
        }else{
            //success
            setSuccessFor(address);
            
        }
        

    
}

function setErrorFor(input,message){
    const formControl= input.parentElement;
    const small= formControl.querySelector('small');

    small.innerText=message;

    formControl.className= 'box1 error';
    valid=false;
}

function setSuccessFor(input){
    const formControl= input.parentElement;
    formControl.className= 'box1 success';
    valid=true;
}

