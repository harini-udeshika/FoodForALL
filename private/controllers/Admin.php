<?php
class Admin extends Controller
{
    function index(){
        // $user = new User();
        // $data = $user->findAll();
        $admin = new Admins();
        
        $data = $admin->where('email',Auth::getemail());
        $data = $data[0];
        $this->view('admin',['rows'=>$data]);
        
    }
}
