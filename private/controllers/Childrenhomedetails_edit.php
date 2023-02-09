<?php

class Childrenhomedetails_edit extends Controller{
    function index()
    {
        //code..
            $chome=new Childrenhome();
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
                $arr['malnutritioned_children']=$_POST['Malnutrition_children'];
                $arr['healthy_children']=$_POST['Healthy_children'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                
                $chome->update($id,$arr);
                $this->redirect('childrentable');  
            
        }
        $data = $chome->where('id',$id);   
        $data = $data[0]; 
        $this->view('childrenhomedetails_edit',['rows'=>$data]);
    }
}
