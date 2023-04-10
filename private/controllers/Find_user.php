<?php
class Find_user extends Controller
{
    public function index()
    {
        $user = new User();
        $donor = new Donate();
        $volunteer = new Volunteer();
        $org = new Organization();

        $certificate = new Certificate();
        $image = new Image();
        if (isset($_GET['id']) && $_GET['id'] != Auth::getid()) {

            $id = $_GET['id'];
            $certificate = $certificate->where('user_id', $id);
            $data = $user->where('id', $id);

            $data = $data[0];
            $v_id = $id;
            $query = "SELECT volunteer.volunteer_type,volunteer.user_id,event.name,event.date,event.org_gov_reg_no
         FROM volunteer
         INNER JOIN event ON volunteer.event_id=event.event_id WHERE volunteer.user_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];
            $event_data = $user->query($query, $arr);
            //echo($event_data[1]->name);
            $query = "SELECT donate.amount,donate.date_time,event.name
         FROM donate
         INNER JOIN event ON event.event_id=donate.event_id WHERE donate.donor_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];

            $donor_data = $user->query($query, $arr);
            $tot_amount = $donor->sum('amount', 'donor_id', $id);
            $tot_events = $volunteer->count('user_id', 'user_id', $id);
            $query = "SELECT organization.name
         FROM organization
         INNER JOIN event ON event.org_gov_reg_no=organization.gov_reg_no
         INNER JOIN volunteer ON volunteer.event_id=event.event_id where volunteer.user_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];
            $org_name = $org->query($query, $arr);
            $query = "SELECT organization.name, event.name as e_name
         FROM organization
         INNER JOIN event ON event.org_gov_reg_no=organization.gov_reg_no
         INNER JOIN donate ON donate.event_id=event.event_id where donate.donor_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];
            $d_org_name = $org->query($query, $arr);
            // print_r($d_org_name);
            // print_r($tot_events[0]->count);

            $this->view('profile', ['rows' => $data, 'event_data' => $event_data, 'donor_data' => $donor_data, 'tot_amount' => $tot_amount, 'tot_events' => $tot_events, 'org_name' => $org_name, 'd_org_name' => $d_org_name, 'cert' => $certificate]);
        }

    }

}
