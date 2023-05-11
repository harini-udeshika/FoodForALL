<?php

class Childrenhomedetails_edit extends Controller{
    function index()
    {
        //code..
            $errors=array();
            $chome=new Childrenhome();
            $id=$_GET['updateid'];
            if (!Auth::logged_in()) {
                $this->redirect('home');
            } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
                $this->redirect('home');
            }
            if(count($_POST)>0){
                if($chome->validate($_POST)){
                $arr['Name']=$_POST['Name'];
                $arr['OwnerName']=$_POST['OwnerName'];
                $arr['regNo']=$_POST['childrenid'];
                $arr['nic']=$_POST['nic'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['children_num']=$_POST['Members'];
                $arr['less_one_children']=$_POST['Less_one_children'];
                $arr['less_five_children']=$_POST['Less_five_children'];
                $arr['higher_five_children']=$_POST['Higher_five_children'];
                $arr['areacoordinator_email']=$_POST['areacoordinator_email'];
                
                $chome->update($id,$arr);
                $this->redirect('childrentable'); 
            }else{
                //error
                $errors=$chome->errors;
            } 
            
        }
        $data = $chome->where('id',$id);   
        $data = $data[0]; 
        $this->view('childrenhomedetails_edit',['rows'=>$data,'errors'=>$errors]);
    }
}
