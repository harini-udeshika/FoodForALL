<?php
class Home_org extends Controller
{
    function index(){
        $user = new Organization();
        $data = $user->where('gov_reg_no',$_SESSION['USER']->gov_reg_no);
        $data = $data[0];
        $this->view('home_org.view', ['rows' => $data]);
    }
   
}