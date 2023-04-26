<?php

class Elderhomedetails extends Controller{
    function index()
    {
        //code..
        $errors=array();
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
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
                $arr['members']=$_POST['Members'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['Healthy_adults']=$_POST['Healthy_adults'];
                $arr['Diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['both_patients']=$_POST['Both_patients'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                
                $ehome->insert($arr);
                $this->redirect('eldertable');
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
