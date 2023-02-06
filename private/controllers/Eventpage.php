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
            $org_data = $org->where("gov_reg_no", $data[0]->org_gov_reg_no);
            $v_req = new Volunteer_request();
            $query = "SELECT volunteer_type from volunteer_request where id = :user_id";
            $arr = ['user_id' => Auth::getid()];
            $types = $v_req->query($query, $arr);
           // print_r ($types);
            $this->view('eventpage', ['rows' => $data[0], 'org' => $org_data[0],'types'=>$types]);
        }

        else if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $data = explode(" ",$type);
            $this->view('volunteer_confirmation', ['data' => $data]);
            if($_POST>0){

                $request = new Volunteer_request();
                $arr['id'] = Auth::getid();
                $type= $_GET['type'];
                $data = explode(" ", $type);
                $arr['event_id'] = $data[1];
                $arr['volunteer_type'] = $data[0];
                $arr['status']=false;
                // print_r($arr);
                $data=$request->insert($arr);
            }
        }
        // $data=$event->findAll();
        else {
            $this->view('404');
        }

    }
}
