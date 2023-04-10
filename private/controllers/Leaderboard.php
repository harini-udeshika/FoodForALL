<?php
class Leaderboard extends Controller
{
    public function index()
    {
        if(Auth::logged_in()){
             $user = new User();
        $donor = new Donate();
        $query = "SELECT sum(donate.amount) as tot_amount ,user.first_name,user.city,user.profile_pic 
        FROM user
        INNER JOIN donate ON donate.donor_id=user.id where month(donate.date_time)=month(CURDATE())-1 
        GROUP BY user.id ORDER BY tot_amount DESC";
        $arr = [

        ];

        $data = $user->query($query);
        $data_ranked = $donor->ranking($data);
        // print_r($data_ranked);
        //print_r($data);
        $this->view('leaderboard', ['data' => $data_ranked]);
        }
        else{
            $this->redirect('login');
        }
       
    }
}
