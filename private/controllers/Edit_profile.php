<?php
class Edit_profile extends Controller
{
    function index(){
        
        $user =new User();
    

        $data = $user->findAll();

        $fg = 0;
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        if($_POST){
            $id=Auth::getid();
            $arr['first_name'] = $_POST["first_name"];
            $arr['last_name'] = $_POST["last_name"];
            $arr['address_1'] = $_POST["address_1"];
            $arr['city'] = $_POST["city"];
            $arr['postal_code'] = $_POST["postal_code"];
            $arr['telephone'] = $_POST["telephone"];
            $user->update($id,$arr);
            $data = $user->findAll();
            
            }
       
        $this->view('edit_profile',['rows'=>$data]);
       
        
        

    }
}
