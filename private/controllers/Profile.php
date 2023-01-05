<?php
class Profile extends Controller
{
    function index(){
        
        $user =new User();
        
        $data = $user->where('id',Auth::getid());   
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        
        $data = $data[0];
        $this->view('profile',['rows'=>$data]);
    }
}
