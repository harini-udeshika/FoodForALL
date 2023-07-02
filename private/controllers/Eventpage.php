<?php
class Eventpage extends Controller
{

    public function index()
    {
       
        $event = new Event(); 
        $org = new Organization();
        $requests = new Volunteer_request();
        $donate = new Donate();
        
$error=false;
        
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
        }
        $data = $event->where("event_id", $id);
       
        $donor = new Donate();
        $query = "SELECT SUM(amount) AS total FROM donate WHERE status=1 && event_id= :id";
        $amount = $donor->query($query, ['id' => $id]);
        $amount = ($amount[0]->total);
        $donorp = ($amount / $data[0]->total_amount) * 100;
        // donating process
        if (isset($_POST['amount']) || isset($_POST['packet'])) {
            // print_r($_POST);

            // if packets are not selected
            if (!isset($_POST['packet'])) {
                $_POST['packet'] = 0;
            }
            // getting total amount to donate
            $arr1['amount'] = intval($_POST['amount']) + intval($_POST['packet']);
            $arr1['donor_id'] = Auth::getid();
            $arr1['event_id'] = str_replace("/", "", $_GET['id']);

            // getting event data
            $query = "select * from event where event_id= :id";
            $data = $event->query($query, ['id' => str_replace("/", "", $_GET['id'])]);
            $donate->insert($arr1);

            //getting donation id to proceed to chekout
            $query = "SELECT * from donate WHERE donor_id= :id ORDER by date_time DESC LIMIT 1";
            $order_id = $donate->query($query, ['id' => Auth::getid()]);
            $order_id = $order_id[0]->donation_id;
            $arr1['name'] = $data[0]->name;
            $arr1['id'] = $order_id;
            if($arr1['amount']> $data[0]->total_amount){
                $error=true;
            }
            else{
                donate_checkout($arr1); 
            }
             
        }

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
            $donor = new Donate();
            $query = "SELECT SUM(amount) AS total FROM donate WHERE status=1 && event_id= :id";
            $amount = $donor->query($query, ['id' => $id]);
            $amount = ($amount[0]->total);
            $donorp = ($amount / $data[0]->total_amount) * 100;

            if (!$amount) {
                $amount = 0;
            }

            $volunteer = new Volunteer();
            $query = "SELECT COUNT(id) AS total FROM volunteer_request WHERE message='accepted' && event_id= :id";
            $volunteer_count = $requests->query($query, ['id' => $id]);
            $volunteer_count = ($volunteer_count[0]->total);
            $volunteerp = ($volunteer_count / $data[0]->no_of_volunteers) * 100;

            $this->view('eventpage', ['rows' => $data[0],
                'org' => $org_data[0],
                'types' => $types,
                'closing_date' => $closing_date[0]->cd,
                'volunteer_types' => $volunteer_types,
                'amount' => $amount,
                'donorp' => $donorp,
                'volunteer_count' => $volunteer_count,
                'volunteerp' => $volunteerp,
            'error'=>$error]);

        } else if (Auth::logged_in() && Auth::getusertype()=="reg_user" && isset($_GET['type'])) {
            $type = $_GET['type']; 
            $data = explode(" ", $type);
            $v_type = (lcfirst($data[0]));
            $id = ($data[1]);
            $query = "select " . $v_type . "_description as description from event where event_id=:id";
            $arr = ['id' => $id];
            $des = $event->query($query, $arr);
            $des = $des[0]->description;

            $this->view('volunteer_confirmation', ['data' => $data, 'des' => $des]);
            if ( isset($_GET['req']) =='true' ) {

                $request = new Volunteer_request();
                $arr['id'] = Auth::getid();
                $type = $_GET['type'];
                $data = explode(" ", $type);
                $arr['event_id'] = $data[1];
                $arr['volunteer_type'] = $data[0];
                // $arr['status'] = false;
                // print_r($arr);
               $request->insert($arr);

              
                // $this->view('eventpage?id='.$data[1]);
            }
            // $this->redirect('events');
        }

       
        else {
            $this->redirect('404');
        }

        
      
    }

}
