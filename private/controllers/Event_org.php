<?php
require_once 'phpqrcode/qrlib.php';
class Event_org extends Controller
{
    function index()
    {

        $id = $_GET['id'];


        if ($id) {
            $event = new Event();
            $em = new Eventmanager();
            $requests = new Volunteer_request();
            $accepted_request = new Volunteer();

            $event_details = $event->where('event_id', $id);

            // $query = "SELECT * FROM volunteer_request WHERE event_id = :id && message = 'pending'";
            $query = "SELECT *
            FROM volunteer_request
            WHERE NOT EXISTS (
            SELECT 1
            FROM volunteer
            WHERE volunteer.user_id = volunteer_request.id && volunteer.event_id = volunteer_request.event_id) 
            && event_id = :id && message = 'pending'";
            $arr = ['id' => $id];
            $volunteer_req = $requests->query($query, $arr);

            // $query = "SELECT * FROM volunteer_request WHERE event_id = :id && message = 'accepted'";
            // $arr = ['id' => $id];
            // $volunteer_accepted = $requests->query($query, $arr);
            // print_r($volunteer_accepted);
            // die;

            $query = "SELECT * FROM volunteer WHERE event_id = :id";
            $arr = ['id' => $id];
            $volunteer_accepted = $accepted_request->query($query, $arr);

            $query = "SELECT * FROM volunteer WHERE event_id = :id && attendance = 1";
            $arr = ['id' => $id];
            $volunteer_attended = $accepted_request->query($query, $arr);

            // $volunteer_req = $requests->where('event_id', $id);
            // echo "<pre>";
            // print_r($event_details);
            $event_details = $event->get_details($id);
            $event_details = $event_details[0];




            $em_details = $em->where('email', $event_details->event_manager_email);
            $em_details = $em_details[0];


            $event_images = $event->get_images($id);
            // print_r($event_images);

            $this->view('event_org.view', [
                'event_details' => $event_details, 'em_details' => $em_details, 'volunteer_req' => $volunteer_req,
                'accepted_vol' => $volunteer_accepted, 'event_images' => $event_images, 'volunteer_attended' => $volunteer_attended
            ]);
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
        $user = new User();

        $query = "SELECT * FROM volunteer_request WHERE event_id = :id && id = :uid";


        $arr = ['id' => $event_id, 'uid' => $uid];
        $request = $vol_request->query($query, $arr);
        $request = $request[0];


        //QR Code generate
        $user_data_qr=$user->where('id',$uid);
        $id = $user_data_qr[0]->nic;
        $eid = $event_id;
        $key = "my_secret_key";
        $iv = "1234567890123456"; // Initialization vector must be 16 bytes for AES encryption in CBC mode
        $cipher = "AES-256-CBC";
        $encrypted = openssl_encrypt($id, $cipher, $key, 0, $iv);
        $encoded = urlencode($encrypted);
        $qrtext1 = ROOT . "/attendance?id=" . $encoded . "&eid=" . $eid;
        $qrtext = $qrtext1;
        $qrimage = $this->generateUniqueFilename(); 
        $qrcode = 'qrcodes/' . $qrimage;
        QRcode::png($qrtext, $qrcode, 'H', 4, 4);
       

        // print_r($request);
        // die;

        $arr_data['user_id'] = $uid;
        $arr_data['volunteer_type'] = $request->volunteer_type;
        $arr_data['event_id'] = $event_id;
        $arr_data['qr_code'] = $qrimage; //QR image

        $query = "UPDATE volunteer_request SET message = 'accepted' WHERE event_id = :id && id = :uid";
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

            if ($_FILES['images']['name'][0]) {
                $input_img_count = count($_FILES['images']['name']);
                $img_arr = $event->get_images($event_id);
                $stored_img_count = 0;
                if ($img_arr[0]) {
                    $stored_img_count = sizeof($img_arr);
                }


                // echo "<pre>";
                // print_r($_FILES['images']);
                // echo count($_FILES['images']['name']) . "<br>";    
                // print_r($img_arr);
                // echo sizeof($img_arr) . "<br>";
                // die;



                if (count($_FILES['images']) > 0 && $input_img_count + $stored_img_count <= 3) {
                    // echo count($_FILES['images']);

                    $event_images = $event->add_images($event_id, $stored_img_count);

                    // echo "<pre>";
                    // echo "hello";
                    // print_r($event_images);
                    // die;

                    $arr['photographs'] = $event_images;
                    $event->update_event($event_id, $arr);
                }
            }
            $this->redirect('event_org?id=' . $event_id);
        } else {
            $this->redirect('home');
        }
    }

    function delete_images()
    {
        if (Auth::getusertype() == 'organization') {
            // echo "hello 2";
            // die;
            $event = new Event();
            $event_id = $_GET['id'];
            $index = $_GET['index'];

            $event_data = $event->where('event_id', $event_id);
            $event_data = $event_data[0];
            // echo "<pre>";
            // print_r($event_data);

            $img_arr = $event->get_images($event_id);
            // print_r($img_arr);


            if (isset($img_arr[$index])) {
                unset($img_arr[$index]);
            }
            // print_r($img_arr);
            $images = implode(',', $img_arr);
            // echo $images;

            $arr['photographs'] = $images;
            $event->update_event($event_id, $arr);
            // die;
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
            $tot_volunteers = 0;
            if ($_POST) {
                if ($_POST['mild-des'] > 0) {
                    $arr['mild_description'] = $_POST['mild-des'];
                }
                if ($_POST['heavy-des'] > 0) {
                    $arr['heavy_description'] = $_POST['heavy-des'];
                }
                if ($_POST['moderate-des'] > 0) {
                    $arr['moderate_description'] = $_POST['moderate-des'];
                }
                if ($_POST['tot-moderate'] > 0) {
                    $arr['moderate_vol_total'] = $_POST['tot-moderate'];
                    $tot_volunteers = $tot_volunteers + $_POST['tot-moderate'];
                }
                if ($_POST['tot-mild'] > 0) {
                    $arr['mild_vol_total'] = $_POST['tot-mild'];
                    $tot_volunteers = $tot_volunteers + $_POST['tot-mild'];
                }
                if ($_POST['tot-heavy'] > 0) {
                    $arr['heavy_vol_total'] = $_POST['tot-heavy'];
                    $tot_volunteers = $tot_volunteers + $_POST['tot-heavy'];
                }
                $arr['no_of_volunteers'] = $tot_volunteers;
                if (isset($arr)) {
                    $event->update_event($id, $arr);
                }

                // die;
                $this->redirect('event_org?id=' . $id);
            }
        } else {
            $this->redirect('home');
        }
    }

    public function certificate()
    {
        $event_id = $_GET["id"];

        // event datails
        $event = new Event();
        $event_data = $event->where('event_id', $event_id);
        $event_data = $event_data[0];
        $event_name = $event_data->name;


        // org details
        $org = new Organization();
        $org_data = $org->where('gov_reg_no', $event_data->org_gov_reg_no);
        $org_data = $org_data[0];
        $org_name = $org_data->name;

        // $cert = new Mail_cert();
        $volunteer = new Volunteer();

        // volunteer details 
        $query = "SELECT * FROM volunteer WHERE event_id = :id && attendance = 1";
        $arr = ['id' => $event_id];
        $vol_data = $volunteer->query($query, $arr);

        // Sending emails
        if ($vol_data) {
            $user = new User();
            foreach ($vol_data as $vols) {
                $user_data = $user->where('id', $vols->user_id);
                $user_data = $user_data['0'];
                $user_name = $user_data->first_name . " " . $user_data->last_name;
                $recipient = $user_data->email;

                $mail = new Mail;
                // $subject = "Event Reminder FoodForALL";
                // $message = "hello";
                // $mail->send_mail($recipient, $subject, $message);
                // print_r($user_data);
                // echo "<br>";
                // echo "<br>";
                // echo $user_name;
                // echo "<br>";
                // echo $event_data->name;
                // echo "<br>";
                // echo $org_data->name;
                // echo "<br>";
                // echo $recipient;
                // echo "<br>";
                // $cert->send_certificate_2($user_name, $event_name, $org_name);
                // die;
                $mail->email_cert($recipient,  $user_name, $event_name, $org_name);

                // $cert->email_cert($recipient,  $user_name, $event_name, $org_name);

            }
        }
        // die;

        // $recipient = "akiladharmadasa1.1@gmail.com";
        // $mail_eg = new Mail();
        // $mail_eg->send_mail($recipient,$subject,$message);
        // print_r($vol_data);
        // die;
        $query_2 = "UPDATE event
        SET cert_status = 1
        WHERE event_id = :id";
        $arr = ['id' => $event_id];
        $event->query($query_2, $arr);
        $this->redirect('event_org?id=' . $event_id);
    }

     //unique file generation
     function generateUniqueFilename() {
        $timestamp = time();
        $random = substr(md5(mt_rand()), 0, 7);
        return "{$timestamp}_{$random}.png";
    }
}
