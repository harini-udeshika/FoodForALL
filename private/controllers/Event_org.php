<?php
class Event_org extends Controller
{
    function index()
    {

        $id = $_GET['id'];
        

        if($id){
            $event = new Event();
            $em = new Eventmanager();
            $event_details = $event->where('event_id',$id);
            // echo "<pre>";
            
            // print_r($event_details);
            $event_details = $event_details[0];

            $em_details = $em->where('email',$event_details->event_manager_email);
            $em_details = $em_details[0];

            // echo $em_details->full_name;
            // die;

            $this->view('event_org.view', ['event_details' => $event_details,'em_details' => $em_details]);

        }

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
            // $event->insert($arr);
            $this->view('event_org.view');
        } else {
            // echo "hello error";
            // die;
        }

        // $data = $manager->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        // $this->view('event_org.view', ['allmanagers' => $data]);
    }
}
