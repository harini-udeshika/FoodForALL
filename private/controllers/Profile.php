<?php
class Profile extends Controller
{
    public function index()
    {

        $user = new User();
        $donor = new Donate();
        $volunteer = new Volunteer();

        $data = $user->where('id', Auth::getid());

        if (!Auth::logged_in()) {
            $this->redirect('home');
        }
        $data = $data[0];
        $v_id = Auth::getid();
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
        $tot_amount = $donor->sum('amount', 'donor_id', Auth::getid());
        $tot_events = $volunteer->count('user_id','user_id',Auth::getid());
        // print_r($tot_events[0]->count);

            $this->view('profile', ['rows' => $data, 'event_data' => $event_data, 'donor_data' => $donor_data,'tot_amount'=>$tot_amount,'tot_events'=>$tot_events]);
    }
}
