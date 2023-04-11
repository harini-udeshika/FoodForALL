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
            $event_details = $event->get_details($id);
            $event_details = $event_details[0];
            
            
            

            $em_details = $em->where('email', $event_details->event_manager_email);
            $em_details = $em_details[0];


            $event_images = $event->get_images($id);

            $this->view('event_org.view', ['event_details' => $event_details, 'em_details' => $em_details, 'volunteer_req' => $volunteer_req, 'accepted_vol' => $volunteer_accepted, 'event_images' => $event_images]);
        }

        if (count($_POST) > 0) {
            // echo "hello1";
            $this->redirect('home');
            // die;
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
        $arr = ['id' => $event_id, 'uid' => $uid];
        $request = $vol_request->query($query, $arr);
        $request = $request[0];

        // print_r($request);
        // die;

        $arr_data['user_id'] = $uid;
        $arr_data['volunteer_type'] = $request->volunteer_type;
        $arr_data['event_id'] = $event_id;

        $query = "UPDATE volunteer_request SET status = 1 WHERE event_id = :id && id = :uid";
        $arr = ['id' => $event_id, 'uid' => $uid];
        // $update_req = $vol_request->query($query, $arr);

        $volunteer->insert($arr_data);
        $update_req = $vol_request->query($query, $arr);
        // $vol_request->delete_request($uid,$event_id);



        // echo $uid;
        // echo "<br>";
        // echo $event_id;
        // die;
        $this->redirect('event_org?id=' . $event_id);
    }

    public function reject()
    {
        $uid = $_GET["uid"];
        $event_id = $_GET["event_id"];
        $vol_request = new Volunteer_request();

        $vol_request->delete_request($uid, $event_id);
        $this->redirect('event_org?id=' . $event_id);
    }

    public function send_mails()
    {
        if (Auth::getusertype() == 'organization') {
            $event_id = $_GET["id"];
            $event = new Event();
            $event->volunteer_email($event_id);

            // echo $event_id;
            // die;
            $this->redirect('event_org?id=' . $event_id);
        } else {
            $this->redirect('home');
        }
    }

    function add_images()
    {

        if (Auth::getusertype() == 'organization') {
            // echo "hello 2";
            // die;
            $event = new Event();
            $event_id = $_GET['id'];

            if (count($_FILES['images']) > 0) {
                // echo count($_FILES['images']);

                $event_images = $event->add_images($event_id);

                // echo "<pre>";
                // echo "hello";
                // print_r($event_images);
                // die;

                $arr['photographs'] = $event_images;
                $event->update_event($event_id, $arr);
            }
            $this->redirect('event_org?id=' . $event_id);
        } else {
            $this->redirect('home');
        }
    }

    function volunteer_levels()
    {
        $id = $_GET['id'];
        if (Auth::getusertype() == 'organization' || 'eventmanager') {
            $event = new Event();
            if($_POST){
                if($_POST['mild-des'] > 0){
                    $arr['mild_description'] = $_POST['mild-des'];
                }
                if($_POST['heavy-des'] > 0){
                    $arr['heavy_description'] = $_POST['heavy-des'];
                }
                if($_POST['moderate-des'] > 0){
                    $arr['moderate_description'] = $_POST['moderate-des'];
                }
                if($_POST['tot-moderate'] > 0){
                    $arr['moderate_vol_total'] = $_POST['tot-moderate'];
                }
                if($_POST['tot-mild'] > 0){
                    $arr['mild_vol_total'] = $_POST['tot-mild'];
                }
                if($_POST['tot-heavy'] > 0){
                    $arr['heavy_vol_total'] = $_POST['tot-heavy'];
                }

                if(isset($arr)){
                    $event->update_event($id, $arr);
                }

                // die;
                $this->redirect('event_org?id=' . $id);
            }
        } else {
            $this->redirect('home');
        }
    }
}
