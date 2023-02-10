<?php
class Add_managers extends Controller
{
    function index(){
        $manager = new Eventmanager();
        $data = $manager->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
        // $this->view('shop_org.view', ['allitems' => $data]);

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

    $data = $manager->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
    $this->view('add_managers.view', ['allmanagers' => $data]);
    }

    public function delete_manager(){
        $email = $_GET['id'];
        $del_manager = new EventManager();
        // $del_manager->delete($email);
        $this->redirect('add_managers');
    }
   
}