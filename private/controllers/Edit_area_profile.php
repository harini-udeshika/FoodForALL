<?php
class Edit_area_profile extends Controller
{
    function index(){
        
        $user =new AreaCoordinator();
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        if($_POST){
            $email=Auth::getemail();
            $arr['name'] = $_POST["name"];
            $arr['username'] = $_POST["username"];
            $arr['nic'] = $_POST["nic"];
            $arr['phone_no'] = $_POST["phone_no"];
            $user->update_U_email($email,$arr);
            $this->redirect('edit_area_profile');   
        }

      
        $data = $user->where('email',Auth::getemail());    
        // print_r ($data);
        // echo ($data[0]->id);
        $data = $data[0];
        $this->view('edit_area_profile',['rows'=>$data]);
       
        
        

    }
}