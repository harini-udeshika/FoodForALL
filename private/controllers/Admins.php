<?php
class Admins extends Controller
{
    function index(){
        // $user = new User();
        // $data = $user->findAll();
        $this->view('admin');
    }
   
}