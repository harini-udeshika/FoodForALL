<?php
class Event_manager_home extends Controller
{
    function index(){
        $user = new EventManager();
        $data = $user->findAll();


        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }

   
        $this->view('Event_manager_home', ['rows' => $data]);
        
        
        
    }
   
}