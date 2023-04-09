<?php
class Leaderboard_v extends Controller
{
    public function index()
    {
        $user = new User();
        $volunteer = new Volunteer();
        $query = "SELECT count(volunteer.volunteer_type) as v_count, volunteer.volunteer_type ,user.id,user.first_name,user.city,user.profile_pic FROM user
        INNER JOIN volunteer ON volunteer.user_id=user.id GROUP BY user.id, volunteer.volunteer_type order by v_count DESC ";
        $arr = [

        ];
        $data = $user->query($query);
        $data_new=$volunteer->volunteer_marks($data);
        $data_new=$volunteer->ranking($data_new);
        //print_r($data_new);
        $this->view('leaderboard_v', ['data' => $data_new]);
    }
}
