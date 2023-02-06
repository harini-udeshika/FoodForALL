<?php
class Event_org extends Controller
{
    function index()
    {
        $manager = new Eventmanager();
        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        // $this->view('shop_org.view', ['allitems' => $data]);

        if (count($_POST) > 0) {
            // echo "hello1";
            // die;
            $event = new Event();
            $arr['event_manager_email'] = $_POST['manager'];
            $arr['name'] = $_POST['name'];
            $arr['date'] = $_POST['date'];
            $arr['description'] = $_POST['description'];
            $arr['location'] = $_POST['address'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $event->insert($arr);
        } else {
            // echo "hello error";
            // die;
        }

        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        $this->view('event_org.view', ['allmanagers' => $data]);
    }
}
