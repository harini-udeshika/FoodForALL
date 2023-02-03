<?php
class Add_event extends Controller
{
    function index(){
        $event = new Event();

        if(count($_POST)>0){  
            // echo "hello1";
            // die;
            $manager = new Eventmanager();
            $arr['full_name'] = $_POST['name'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $arr['email'] = $_POST['email'];
            $arr['nic'] = $_POST['nic'];
            // $arr['password'] = password_hash($_POST['pw'],PASSWORD_DEFAULT);
            $arr['password'] = $_POST['password'];
            $manager->insert($arr);

    }else{
        // echo "hello error";
        // die;
    }

    $data = $event->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
    $this->view('add_event.view', ['allevents' => $data]);
    }
   
}