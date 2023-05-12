<?php
class Select_donees extends Controller
{
    function index(){

        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }

        $eventid=$_GET['eid'];
        $user = new EventManager();
        $data = $user->findAll();
   
        $this->view('Select_donees', ['rows' => $data,'event'=>$eventid]);
        
        
    }
   
}