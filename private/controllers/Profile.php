<?php
class Profile extends Controller
{
    function index(){
        
        $user =new User();
        
        $data = $user->findAll();   
       
        $this->view('profile',['rows'=>$data]);
    }
}
