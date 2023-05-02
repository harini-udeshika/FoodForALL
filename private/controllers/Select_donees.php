<?php
class Select_donees extends Controller
{
    function index(){
        $eventid=$_GET['eid'];
        $user = new EventManager();
        $data = $user->findAll();
        if(Auth::logged_in()){
   
            $this->view('Select_donees', ['rows' => $data,'event'=>$eventid]);
        }
        else{
            $this->redirect('home');
        }
        
        
    }
   
}