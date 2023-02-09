<?php
class Familytable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Family();
        $data=$user->where('area_coodinator_email',$_SESSION['USER']->email);

        $this->view('familytable',['row'=>$data]);
    }

    
}