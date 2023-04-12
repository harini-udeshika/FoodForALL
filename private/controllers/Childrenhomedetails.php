<?php

class Childrenhomedetails extends Controller{
    function index()
    {
        //code..
        $errors=array();
        if(count($_POST)>0){
            $chome=new Childrenhome();
            if($chome->validate($_POST)){
                $arr['Name']=$_POST['Name'];
                $arr['OwnerName']=$_POST['OwnerName'];
                $arr['regNo']=$_POST['regNo'];
                $arr['nic']=$_POST['nic'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['children_num']=$_POST['Members'];
                $arr['malnutritioned_children']=$_POST['Malnutrition_children'];
                $arr['healthy_children']=$_POST['Healthy_children'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                
                $chome->insert($arr);
                $this->redirect('home');
            }else{
            //error
            $errors=$chome->errors;
            }
        }
        $this->view('childrenhomedetails',[
            'errors'=>$errors,
        ]);
    }
}
