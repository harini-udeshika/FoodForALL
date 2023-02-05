<?php
class Leaderboard extends Controller
{
    public function index()
    {
        $user = new User();
       
        $query = "SELECT sum(donate.amount) as tot_amount ,user.first_name,user.city,user.profile_pic FROM user 
        INNER JOIN donate ON donate.donor_id=user.id GROUP BY user.id ORDER BY tot_amount DESC";
        $arr = [
            
        ];
        $data = $user->query($query);
      //print_r($data);
        $this->view('leaderboard',['data'=>$data]);
    }
}
