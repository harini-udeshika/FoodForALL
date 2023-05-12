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

        $org = new Subscribe();
        $query = "SELECT * FROM subscription Where org_gov_reg_no= :id 
        && status = 1 ORDER BY date DESC";
        // $query = "SELECT * FROM subscription Where org_gov_reg_no= :id 
        // ORDER BY date DESC";
        $arr_2 = ['id' => Auth::gov_reg_no()];
        $data = $org->query($query,$arr_2);

        
        if ($data) {
            $paid_date = new DateTime($data[0]->date);
            $today = new DateTime(); // create a new DateTime object for today's date
            $interval = $paid_date->diff($today);
            $days = $interval->days;
            // echo $days;

            // if ($days > 30) {
            if ($days > 30 && $event_count > 3) {
                echo "FALSE";
            } else {
                echo "TRUE";
            }
        } else {
            echo "FALSE";
        }
        
    }
}
