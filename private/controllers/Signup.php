<?php
class Signup extends Controller
{
    function index(){

        $errors=array();
        if(count($_POST)>0){
            $user=new User();
            if($user->validate($_POST)){

                $arr['first_name'] = $_POST["first_name"];
                $arr['last_name'] = $_POST["last_name"];
                $arr['nic'] = $_POST["nic"]; 
                $arr['email'] = $_POST["email"];
                $arr['address_1'] = $_POST["address_1"];
                $arr['city'] = $_POST["city"];
                $arr['postal_code'] = $_POST["postal_code"];
                $arr['telephone'] = $_POST["telephone"];
                $arr['password_hash']=password_hash($_POST["password"],PASSWORD_DEFAULT);
                $arr['tnc']=$_POST['check'];
                print_r($_POST);

                $arr['usertype'] = "reg_user";

                $user->insert($arr);

                
                $this->redirect('login');
              
            }
            else{
                $errors = $user->errors;
            }
           
        }
        // echo "<pre>";
        // print_r($_POST); 
        // echo "</pre>";  
        $this->view('signup',['errors'=>$errors]);
    }
    function duplicate(){
        $user = new User();
        $query="select email from user";
        $emails=$user->query($query);
        print_r(json_encode($emails));
    }
    function nic(){
        $user = new User();
        $query="select nic from user";
        $nics=$user->query($query);
        print_r(json_encode($nics));
    }
}
