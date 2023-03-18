<?php
class Add_event extends Controller
{
    function index()
    {
        $manager = new Eventmanager();
        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        // $this->view('shop_org.view', ['allitems' => $data]);
        $image = new Image();

        if (count($_POST) > 0) {
            // echo "<pre>";
            // print_r($_POST);
            // print_r($_FILES);
            // die;
            $event = new Event();
            $arr['event_manager_email'] = $_POST['manager'];
            $arr['name'] = $_POST['name'];
            $arr['date'] = $_POST['date'];
            $arr['description'] = $_POST['description'];
            $arr['location'] = $_POST['address'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;

            if ($image->pic_validate()) {
                $filename = $image->pic_validate();
                $arr['thumbnail_pic'] = $filename;
            } else {
                echo "no image";
                die;
            }
            // print_r($arr);
            // die;
            $event->insert($arr);
        } else {
            // echo "hello error";
            // die;
        }

        $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        $this->view('add_event.view', ['allmanagers' => $data]);
    }
}
