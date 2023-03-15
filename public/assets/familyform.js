const form =document.getElementById('familyform');
const fullname =document.getElementById('fullname');
const iname =document.getElementById('iname');
const nic =document.getElementById('nic');
const pro =document.getElementById('pro');
const salary =document.getElementById('salary');
const contact1 =document.getElementById('contact1');
const contact2 =document.getElementById('contact2');
const address =document.getElementById('address');
const hc =document.getElementById('hc');
const mc =document.getElementById('mc');
const ha =document.getElementById('ha');
const dp =document.getElementById('dp');
const cp =document.getElementById('cp');
const fnum =document.getElementById('fnum');
const re =document.getElementById('re');
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
   const fullnameValue=fullname.value.trim();
   const inameValue=iname.value.trim();
   const nicValue=nic.value.trim();
   const proValue =pro.value.trim();
   const salaryValue=salary.value.trim();
   const contact1Value=contact1.value.trim();
   const contact2Value=contact2.value.trim();
   const addressValue=address.value.trim();
   const familynumValue=fnum.value.trim();
    //get the values from the inputs
    
        if(fullnameValue===''){
            // show error
            setErrorFor(fullname, 'Fullname cannot be blank');
            
        }else{
            //success
            setSuccessFor(fullname);
            
        }
        if(inameValue===''){
            // show error
            setErrorFor(iname, 'Name with initials cannot be blank');
            
        }else{
            //success
            setSuccessFor(iname);
            
        }
        if(nicValue===''){
            // show error
            setErrorFor(nic, 'NIC number cannot be blank');  
        }
        else if(nicValue.length<10||nicValue.length>11){
            setErrorFor(nic, 'Enter valid NIC');  
        }
        else{
            //success
            setSuccessFor(nic);
            
        }
        if(proValue===''){
            // show error
            setErrorFor(pro, 'Profession cannot be blank');
            
        }else{
            //success
            setSuccessFor(pro);
            
        }
        if(salaryValue===''){
            // show error
            setErrorFor(salary, 'Salary cannot be blank');
            
        }else{
            //success
            setSuccessFor(salary);
            
        }
        if(contact1Value===''){
            // show error
            setErrorFor(contact1, 'Contact details cannot be blank');
            
        }
        else if(contact1Value.length<10 ||contact1Value.length>12){
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
        if(familynumValue===''){
            // show error
            setErrorFor(fnum, 'Number of family members cannot be blank');
            
        }else{
            //success
            setSuccessFor(fnum);
            
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

