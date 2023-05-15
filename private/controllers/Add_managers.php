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
            
            // $message = strtr(file_get_contents('http://localhost/FoodForAll/private/views/manager_mail.html'), array(
            //     '%code%' => $_POST['password'],
            //     '%org_name%' => $org_data->name, '%name%' => $arr['full_name']
            // ));
            $message = strtr(file_get_contents('http://localhost/food_for_ll/private/views/manager_mail.html'), array(
                '%code%' => $_POST['password'],
                '%org_name%' => $org_data->name, '%name%' => $arr['full_name']
            ));
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

    public function before_delete($email)
    {
        $del_manager = new EventManager();

        // check if there is a event manager registred using this mail
        $query = "SELECT email FROM eventmanager WHERE email = '$email' ";
        $query_result = $del_manager->query($query);
        if ($query_result == false) {
            echo ("not user assigned for this mail");
            die;
        }

        // check for assigned events
        $query = "SELECT * FROM event WHERE event_manager_email = '$email'";
        $assigned_events = $del_manager->query($query);

        if ($assigned_events != false) {
            echo ("there are assigned events");
            die;
        }

        echo ("deletable");
    }

    public function delete_manager($email)
    {
        $del_manager = new EventManager();

        $query = "DELETE FROM eventmanager WHERE email = '$email' ";
        $del_manager->query($query);
        echo ("deleted successfully");
    }

    public function update_feed()
    {
        $manager = new Eventmanager();
        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);

        $data = json_encode($data);
        echo ($data);
    }
}
