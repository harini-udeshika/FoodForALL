<?php
class Familydetails extends Controller{
    function index()
    {
        //code..
        $errors=array();
        if(count($_POST)>0){
            $family=new family();
            if($family->validate($_POST)){
                $arr['FullName']=$_POST['FullName'];
                $arr['Iname']=$_POST['NameWithInitial'];
                $arr['nic']=$_POST['FamilyID'];
                $arr['profession']=$_POST['profession'];
                $arr['netsalary']=$_POST['salary'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['healthy_adults']=$_POST['Healthy_adults'];
                $arr['diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['malnutritioned_children']=$_POST['Malnutrition_children'];
                $arr['healthy_children']=$_POST['Healthy_children'];
                $arr['area_coodinator_email']=$_POST['email'];
                
                $family->insert($arr);
                $this->redirect('familytable');
            }else{
            //error
            $errors=$family->errors;
            }
        }
        $this->view('familydetails',[
            'errors'=>$errors,
        ]);
    }

    
}
