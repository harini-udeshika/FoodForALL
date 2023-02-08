<?php
class Reply_reviews extends Controller
{
    function index(){
        $comment = new Comments();

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

    $data = $comment->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
    $this->view('reply_reviews.view', ['allcoms' => $data]);
    }
   
}