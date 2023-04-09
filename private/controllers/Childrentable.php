<?php
class Childrentable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Childrenhome();
        $data=$user->where('areacoordinator_email',$_SESSION['USER']->email);

        $this->view('childrentable',['row'=>$data]);
    }
}