<?php

class Elderhomedetails_edit extends Controller{
    function index()
    {
        //code..
        $errors=array();
        $user =new Elderhome();
        $id=$_GET['updateid'];
        if(!Auth::logged_in()){
            $this->redirect('home');
        }

        if(count($_POST)>0){
            if($user->validate($_POST)){
                $arr['Name']=$_POST['Name'];
                $arr['OwnerName']=$_POST['OwnerName'];
                $arr['regNo']=$_POST['elderid'];
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
                $user->update($id,$arr);
                $this->redirect('eldertable'); 
            }else{
                //error
                $errors=$user->errors;
            } 
                
            }
            $data = $user->where('id',$id);   
            $data = $data[0]; 
            $this->view('elderhomedetails_edit',['rows'=>$data,'errors'=>$errors]);
    }
}
