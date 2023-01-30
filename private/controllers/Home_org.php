<?php
class Home_org extends Controller
{
    function index(){
        $user = new Organization();
        $data = $user->findAll();
        $this->view('home_org.view', ['rows' => $data]);
    }
   
}