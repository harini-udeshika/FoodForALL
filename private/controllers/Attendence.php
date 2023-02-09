<?php
class Attendence extends Controller
{
    function index(){
        $user = new User();
        $data = $user->findAll();
        $this->view('attendence', ['rows' => $data]);
    }
   
}