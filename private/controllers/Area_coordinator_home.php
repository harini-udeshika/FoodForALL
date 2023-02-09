<?php
class Area_coordinator_home extends Controller
{
    function index(){
        $user = new AreaCoordinator();
        $data = $user->findAll();
        if(Auth::logged_in()){
   
            $this->view('Area_coordinator_home', ['rows' => $data]);
        }
        else{
            $this->redirect('home');
        }
        
        
    }
   
}
