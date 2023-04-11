<?php
class Add_managers extends Controller
{
    function index()
    {
        $manager = new Eventmanager();
        $org = new Organization();
        $org_data = $org->where('gov_reg_no', $_SESSION['USER']->gov_reg_no);
        $org_data = $org_data[0];
        // $data = $manager->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
        // $this->view('shop_org.view', ['allitems' => $data]);

        if (count($_POST) > 0) {
            // echo "hello1";
            // die;
            $manager = new Eventmanager();
            $arr['full_name'] = $_POST['name'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $arr['email'] = $_POST['email'];
            $arr['nic'] = $_POST['nic'];
            // $arr['password'] = $_POST['password'];
            $arr['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $manager->insert($arr);

            $mail = new Mail();
            $receipient = $arr['email'];
            $subject = "Account Activation FoodForALL";
            $message = "Hello " . $arr['full_name'] . "!\r\nWe would like to inform you that you 
            have been added as an Event Manager for the organization:" . $org_data->name . " at FoodForAll.\r\n
            Please use your credentials given bellow (with your email) to loging to your account.\r\nPassword:
            " . $_POST['password'] .  "\r\n\r\n\r\n (Note:It is recomended to change your password after loging in.)";

            $mail->send_mail($receipient, $subject, $message);
            $this->redirect('add_managers');
        } else {
            // echo "hello error";
            // die;
            // $this->redirect('add_managers');
        }
        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        $this->view('add_managers.view', ['allmanagers' => $data]);
    }

    public function delete_manager()
    {
        $email = $_GET['id'];
        $del_manager = new EventManager();
        // $del_manager->delete($email);
        $this->redirect('add_managers');
    }
}
