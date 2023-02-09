<?php
class Profile_eventmanager extends Controller
{
    function index(){
        
        $user =new EventManager();
        
        $data = $user->where('email',Auth::getemail());   
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        
        $data = $data[0];
        $this->view('profile_eventmanager',['rows'=>$data]);
    }
}