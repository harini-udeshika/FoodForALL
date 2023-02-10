<?php
class Eventmanager_myevents extends Controller
{
    function index(){
        $user = new Eventmanager();
        $data = $user->findAll();
        if(Auth::logged_in()){
   
            $this->view('eventmanager_myevents', ['rows' => $data]);
        }
        else{
            $this->redirect('home');
        }
        
        
    }
   
}