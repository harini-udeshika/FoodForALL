<?php
class Eventmanager_events extends Controller
{
    function index(){
        $user = new Eventmanager();
        $data = $user->findAll();
        if(Auth::logged_in()){
   
            $this->view('eventmanager_events', ['rows' => $data]);
        }
        else{
            $this->redirect('home');
        }
        
        
    }
   
}