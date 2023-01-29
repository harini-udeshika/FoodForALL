<?php
class Signup_org extends Controller
{
    function index(){

        $errors=array();
        if(count($_POST)>0){
            $org=new Organization();
            if($org->validate($_POST)){

                $arr['name'] = $_POST['organization'];
                $arr['gov_reg_no'] = $_POST['gov_no'];
                $arr['email'] = $_POST['email'];
                $arr['password'] = password_hash($_POST['pw'],PASSWORD_DEFAULT);;
                $arr['tel'] = $_POST['tel'];
                $arr['address'] = $_POST['address'];
                $arr['city'] = $_POST['city'];
                $arr['postal'] = $_POST['postal-code'];


                $org->insert($arr);

                
                $this->redirect('login');
            }
            else{
                $errors = $org->errors;
            }
           
        }
        // echo "<pre>";
        // print_r($_POST); 
        // echo "</pre>";  
        $this->view('signup_org.view',['errors'=>$errors]);
    }
}
