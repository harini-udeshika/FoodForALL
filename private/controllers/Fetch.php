<?php
class Fetch extends Controller
{
    function getballa()
    {
        echo ("balla");
    }

    function getkukula()
    {
        echo ("kukula");
    }

    function calcluate_org_count()
    {
        $model = new Admins();
        $query = "SELECT count(gov_reg_no) from organization";
        $organizations = $model->query($query);

        $organizations = json_encode($organizations);
        echo ($organizations);
    }

    function temp6($str)
    {
        $this->view("eventpage");
    }

    function searchUser($keyword = "")
    {
        if (Auth::isuser('admin')) {
            $data = array();

            if ($keyword != "") {
                $admin_model = new Admins();
                $keyword = addslashes($keyword);

                $query = "SELECT * FROM event WHERE event_id LIKE '%$keyword%' OR name LIKE '%$keyword%' OR location LIKE '%$keyword%'";

                $data = $admin_model->query($query);

                if ($data == null) {
                    $data = array();
                }
            }
        } else {
            $data = "redirect";
        }

        $data = json_encode($data);
        echo $data;
    }

    function temp7($eventid)
    {
        $event = new Event();
        $org = new Organization();
        $requests = new Volunteer_request();
        $donate = new Donate();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $user_id = Auth::getid();
            $query = "SELECT volunteer_type from volunteer_request where id =:id && event_id=:event_id";
            $arr = ['id' => $user_id, 'event_id' => $id];
            $req_data = $requests->query($query, $arr);

            if ($req_data) {
                $volunteer_types = $event->sent_requests($req_data);
            } else {
                $volunteer_types = 0;
            }


            // print_r($volunteer_types);

            $data = $event->where("event_id", $id);
            $query = "SELECT DATE(date-2) as cd from event where event_id =:id";
            $arr = ['id' => $id];
            $closing_date = $event->query($query, $arr);
            // print_r($closing_date[0]);
            $org_data = $org->where("gov_reg_no", $data[0]->org_gov_reg_no);
            $v_req = new Volunteer_request();
            $query = "SELECT volunteer_type from volunteer_request where id = :user_id";
            $arr = ['user_id' => Auth::getid()];
            $types = $v_req->query($query, $arr);
            // print_r ($types);

            $this->view('eventpage', ['rows' => $data[0], 'org' => $org_data[0], 'types' => $types, 'closing_date' => $closing_date[0]->cd, 'volunteer_types' => $volunteer_types]);
        } else if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $data = explode(" ", $type);
            $v_type = (lcfirst($data[0]));
            $id = ($data[1]);
            $query = "select " . $v_type . "_description as description from event where event_id=:id";
            $arr = ['id' => $id];
            $des = $event->query($query, $arr);
            $des = $des[0]->description;

            $this->view('volunteer_confirmation', ['data' => $data, 'des' => $des]);
            if ($_POST > 0) {

                $request = new Volunteer_request();
                $arr['id'] = Auth::getid();
                $type = $_GET['type'];
                $data = explode(" ", $type);
                $arr['event_id'] = $data[1];
                $arr['volunteer_type'] = $data[0];
                $arr['status'] = false;
                // print_r($arr);
                $data = $request->insert($arr);
                // $this->view('eventpage?id='.$data[1]);
            }
        }
        if (isset($_POST['amount']) || isset($_POST['packet'])) {
            // print_r($_POST);
            if (!isset($_POST['packet'])) {
                $_POST['packet'] = 0;
            }
            $arr['amount'] = intval($_POST['amount']) + intval($_POST['packet']);
            $arr['donor_id'] = Auth::getid();
            $arr['event_id'] = str_replace("/", "", $_GET['id']);

            // $donate->insert($arr);
            donate_checkout($arr);
            // print_r($arr);       
        }
    }
    function page1()
    {
        $doc = new DOMDocument();
        $doc->loadHTML("http://localhost/food_for_all/private/views/login.php");
        $page_content = $doc->saveHTML();
        echo ($page_content);
    }


    function temp10($page_name)
    {
        $page_name = strtolower($page_name);
        $path = "../private/views/admin.events.$page_name.php";

        // $user = new Admin_events();
        $event_model = new Admin_events_model();

        $completed_events = $event_model->selectCompleted();
        if ($completed_events == NULL) {
            $completed_events = array();
        }
        // extract($completed_events);

        ob_start();
        include $path;
        $html = ob_get_clean();

        echo (json_encode($html));
    }
}
