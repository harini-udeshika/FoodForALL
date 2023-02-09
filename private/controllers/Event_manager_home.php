<?php
class Event_manager_home extends Controller
{
    function index(){
        $user = new EventManager();
        $data = $user->findAll();
        if(Auth::logged_in()){
   
            $this->view('Event_manager_home', ['rows' => $data]);
        }
        else{
            $this->redirect('home');
        }
        
        
    }
   
}