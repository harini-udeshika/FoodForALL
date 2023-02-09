<?php
class Eldertable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Elderhome();
        $data=$user->where('areacoordinator_email',$_SESSION['USER']->email);

        $this->view('eldertable',['row'=>$data]);
    }
}