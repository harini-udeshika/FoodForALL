<?php
class About extends Controller
{
    function index(){
        // $user = new User();
        // $data = $user->findAll();
       
        $this->view('about');
        
    }
}
