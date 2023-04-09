<?php

class Elderhomedetails extends Controller{
    function index()
    {
        //code..
        $errors=array();
        if(count($_POST)>0){
            $ehome=new Elderhome();
            if($ehome->validate($_POST)){
                $arr['Name']=$_POST['Name'];
                $arr['OwnerName']=$_POST['OwnerName'];
                $arr['regNo']=$_POST['regNo'];
                $arr['nic']=$_POST['nic'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['healthy_adults']=$_POST['Healthy_adults'];
                $arr['diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                
                $ehome->insert($arr);
                $this->redirect('donee_details');
            }else{
            //error
            $errors=$ehome->errors;
            }
        }
        $this->view('elderhomedetails',[
            'errors'=>$errors,
        ]);
    }
}
