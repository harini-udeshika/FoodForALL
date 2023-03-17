<?php
class Eventpage extends Controller
{

    public function index()
    {
        $event = new Event();
        $org = new Organization();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
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

            $this->view('eventpage', ['rows' => $data[0], 'org' => $org_data[0], 'types' => $types, 'closing_date' => $closing_date[0]->cd]);

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
            }
        }
        // $data=$event->findAll();
        else {
            $this->view('404');
        }

    }
    // public function map()
    // {
    //     if (isset($_GET['id'])) {
    //         $id = $_GET['id'];
    //         $event = new Event();

    //         $data = $event->where("event_id", $id);
    //         $data = $data[0];
    //         echo ($data->latitude . '+' . $data->longitude);

    //     }

    // }
}
