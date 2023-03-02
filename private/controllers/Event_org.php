<?php
class Event_org extends Controller
{
    function index()
    {

        $id = $_GET['id'];


        if ($id) {
            $event = new Event();
            $em = new Eventmanager();
            $requests = new Volunteer_request();

            $event_details = $event->where('event_id', $id);

            $query = "SELECT * FROM volunteer_request WHERE event_id = :id && status = 0";
            $arr = ['id' => $id];
            $volunteer_req = $requests->query($query, $arr);

            $query = "SELECT * FROM volunteer_request WHERE event_id = :id && status != 0";
            $arr = ['id' => $id];
            $volunteer_accepted = $requests->query($query, $arr);

            // $volunteer_req = $requests->where('event_id', $id);
            // echo "<pre>";

            // print_r($event_details);
            $event_details = $event_details[0];

            $em_details = $em->where('email', $event_details->event_manager_email);
            $em_details = $em_details[0];

            // echo $em_details->full_name;
            // die;

            $this->view('event_org.view', ['event_details' => $event_details, 'em_details' => $em_details, 'volunteer_req' => $volunteer_req, 'accepted_vol' => $volunteer_accepted]);
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

    public function accept()
    {
        // echo "accept";
        $uid = $_GET["uid"];
        $event_id = $_GET["event_id"];

        // echo $uid;
        // echo "<br>";
        // echo $event_id;
        // die;

        $vol_request = new Volunteer_request();
        $volunteer = new Volunteer();

        $query = "SELECT * FROM volunteer_request WHERE event_id = :id && id = :uid";
        $arr = ['id' => $event_id,'uid' => $uid];
        $request = $vol_request->query($query, $arr);
        $request = $request[0];

        // print_r($request);
        // die;

        $arr['user_id'] = $uid;
        $arr['volunteer_type'] = $request->volunteer_type;
        $arr['event_id'] = $event_id;

        $query = "UPDATE volunteer_request SET status = 1 WHERE event_id = :id && id = :uid";
        $arr = ['id' => $event_id,'uid' => $uid];
        $update_req = $vol_request->query($query,$arr);

        // $volunteer->insert($arr);
        // $vol_request->delete_request($uid,$event_id);



        // echo $uid;
        // echo "<br>";
        // echo $event_id;
        // die;
        $this->redirect('event_org?id=' . $event_id);
    }

    public function reject(){
        $uid = $_GET["uid"];
        $event_id = $_GET["event_id"];
        $vol_request = new Volunteer_request();

        $vol_request->delete_request($uid,$event_id);
        $this->redirect('event_org?id=' . $event_id);
    }
}
