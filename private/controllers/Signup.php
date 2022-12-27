<?php
class Signup extends Controller
{
    function index(){

        if(count($_POST)>0){
            $user=new User();
            $this->redirect('login');
        }

        print_r($_POST);   
        $this->view('signup');
    }
}
