<?php
class Profile extends Controller
{
    function index(){
        
        $user =new User();
        
        $data = $user->findAll();   
        
        // if(!Auth::logged_in()){
        //     $this->redirect('home');
        // }
        
        $this->view('profile',['rows'=>$data]);
    }
}
