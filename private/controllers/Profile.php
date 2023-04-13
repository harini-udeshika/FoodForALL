<?php
class Profile extends Controller
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
        } else {
            if ($_POST > 0) {
                if ($image->pic_validate()) {

                    $filename = $image->pic_validate();
                    $arr['file_name'] = $filename;
                    $arr['user_id'] = Auth::getid();
                    $arr['description'] = $_POST['description'];
                    $arr['event_id']=$_POST['event'];
                    $certificate->insert($arr);
                    $this->redirect('profile');
                }
            }

            if (isset($_GET['subscribe'])) {
                $arr['newsletter_status'] = 1;
                $user->update(Auth::getid(), $arr);
            }
            if (isset($_GET['delete'])) {

                $cert_id = $_GET['delete'];
                $certificate->delete($cert_id);

            }
            // $certificate = $certificate->where('user_id', Auth::getid());
            $data = $user->where('id', Auth::getid());
            $query="select certificates.* ,event.name ,event.date 
            from event inner join certificates 
            on event.event_id=certificates.event_id 
            where certificates.user_id=:id";
            $certificate=$certificate->query($query,['id'=>Auth::getid()]);
            if (!Auth::logged_in()) {
                $this->redirect('home');
            }
            $data = $data[0];
            $v_id = Auth::getid();
            $query = "SELECT volunteer.volunteer_type,volunteer.user_id,event.name,event.event_id,event.date,event.org_gov_reg_no
            FROM volunteer
            INNER JOIN event ON volunteer.event_id=event.event_id WHERE volunteer.user_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];
            $event_data = $user->query($query, $arr);
            $query="SELECT event.name, event.event_id
            FROM volunteer 
            INNER JOIN event ON volunteer.event_id = event.event_id 
            LEFT JOIN certificates ON event.event_id = certificates.event_id 
            WHERE volunteer.user_id =:id AND certificates.id IS NULL";
            $select=$volunteer->query($query,['id'=>Auth::getid()]);
            //echo($event_data[1]->name);
            $query = "SELECT donate.amount,donate.date_time,event.name
            FROM donate
            INNER JOIN event ON event.event_id=donate.event_id WHERE donate.donor_id= :v_id";
            $arr = [
                'v_id' => $v_id,

            ];

            $donor_data = $user->query($query, $arr);
            $tot_amount = $donor->sum('amount', 'donor_id', Auth::getid());
            $tot_events = $volunteer->count('user_id', 'user_id', Auth::getid());
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

            $this->view('profile', ['rows' => $data, 'event_data' => $event_data, 'donor_data' => $donor_data, 'tot_amount' => $tot_amount, 'tot_events' => $tot_events, 'org_name' => $org_name, 'd_org_name' => $d_org_name, 'cert' => $certificate,'select'=>$select]);
        }

    }
}
