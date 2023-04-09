<?php
class Eventpage extends Controller
{
 
    public function index()
    {
        $event = new Event();
        $org = new Organization();
        $requests=new Volunteer_request();
        

        if (isset($_GET['id'])) {
           
            $id = $_GET['id'];

            $user_id=Auth::getid();
            $query="SELECT volunteer_type from volunteer_request where id =:id && event_id=:event_id";
            $arr=['id'=>$user_id,'event_id'=>$id];
            $req_data=$requests->query($query,$arr);
            
            if($req_data){
                 $volunteer_types=$event->sent_requests($req_data);
            }
            else{
                  $volunteer_types=0;
            }
       
           
            // print_r($volunteer_types);

            $data = $event->where("event_id", $id);
            $query = "SELECT DATE(date-2) as cd from event where event_id =:id";
            $arr = ['id' => $id];
            $closing_date=$event->query($query,$arr);
            // print_r($closing_date[0]);
            $org_data = $org->where("gov_reg_no", $data[0]->org_gov_reg_no);
            $v_req = new Volunteer_request();
            $query = "SELECT volunteer_type from volunteer_request where id = :user_id";
            $arr = ['user_id' => Auth::getid()];
            $types = $v_req->query($query, $arr);
           // print_r ($types);

            $this->view('eventpage', ['rows' => $data[0], 'org' => $org_data[0], 'types' => $types, 'closing_date' => $closing_date[0]->cd,'volunteer_types'=>$volunteer_types]);

        } else if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $data = explode(" ", $type);
            $v_type = (lcfirst($data[0]));
            $id = ($data[1]);
            $query = "select " . $v_type . "_description as description from event where event_id=:id";
            $arr = ['id' => $id];
            $des = $event->query($query, $arr); 
            $des = $des[0]->description;

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
                $data = $request->insert($arr);
                // $this->view('eventpage?id='.$data[1]);
            }
          
        }
        // $data=$event->findAll();
        else {
            $this->view('404');
        }

    }
}
}
