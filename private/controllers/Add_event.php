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
            $arr['location'] = $_POST['location'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $arr['latitude'] = $_POST['latitude'];
            $arr['longitude'] = $_POST['longitude'];
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

    public function isSubscribed(){
        $event = new Event();
        $query = "SELECT COUNT(*) AS row_count
            FROM event
            WHERE org_gov_reg_no= :id && event_added_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $arr_1 = ['id' => Auth::gov_reg_no()];
        $events_30_days = $event->query($query, $arr_1);
        // echo $events_30_days[0]->row_count;
        $event_count = $events_30_days[0]->row_count;

        $org = new Organization();
        $data = $org->where('gov_reg_no', Auth::gov_reg_no());
    
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        // echo $today;
        $paid_date = DateTime::createFromFormat('Y-m-d', $data[0]->sub_fee_paid_date);
        $today = DateTime::createFromFormat('Y-m-d', $today);

        $interval = $paid_date->diff($today);
        $days = $interval->days;

        if($event_count <= 3 && $days <= 30){
            echo "true";
        } else {
            echo "false";
        }
        
    }
}
