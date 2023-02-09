<?php
class Leaderboard_v extends Controller
{
    public function index()
    {
        $user = new User();
       
        $query = "SELECT count(volunteer.volunteer_type) as type_count ,user.first_name,user.city,user.profile_pic FROM user 
        INNER JOIN volunteer ON volunteer.user_id=user.id GROUP BY user.id , volunteer_type ORDER BY type_count DESC";
        $arr = [
            
        ];
        $data = $user->query($query);
      //print_r($data);
        $this->view('leaderboard_v',['data'=>$data]);
    }
}
