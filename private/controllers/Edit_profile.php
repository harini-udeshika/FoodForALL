<?php
class Edit_profile extends Controller
{
    function index(){
        
        $user =new User();
        
        $data = $user->findAll();   
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        
        $this->view('edit_profile',['rows'=>$data]);
    }
}
