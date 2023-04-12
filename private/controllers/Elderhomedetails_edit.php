<?php

class Elderhomedetails_edit extends Controller{
    function index()
    {
        //code..
        $user =new Elderhome();
        $id=$_GET['updateid'];
        if(!Auth::logged_in()){
            $this->redirect('home');
        }

        if($_POST){
                $arr['Name']=$_POST['Name'];
                $arr['OwnerName']=$_POST['OwnerName'];
                $arr['regNo']=$_POST['regNo'];
                $arr['nic']=$_POST['nic'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['members']=$_POST['Members'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['healthy_adults']=$_POST['Healthy_adults'];
                $arr['diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                $user->update($id,$arr);
                $this->redirect('eldertable');  
                
            }
            $data = $user->where('id',$id);   
            $data = $data[0]; 
            $this->view('elderhomedetails_edit',['rows'=>$data]);
    }
}
