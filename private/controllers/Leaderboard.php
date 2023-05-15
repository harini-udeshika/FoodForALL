<?php
class Leaderboard extends Controller
{
    public function index()
    {
        if(Auth::logged_in() && (Auth::getusertype()=="reg_user" || Auth::getusertype()=="admin")){
             $user = new User();
        $donor = new Donate();
        $query = "SELECT sum(donate.amount) as tot_amount ,user.first_name,user.city,user.profile_pic 
        FROM user
        INNER JOIN donate ON donate.donor_id=user.id where month(donate.date_time)=month(CURDATE())-1 
        GROUP BY user.id ORDER BY tot_amount DESC";
        $arr = [

        ]; 
        //calling ranking function to get user ranks
        $data = $user->query($query);
        $data_ranked = $donor->ranking($data);
        
        $this->view('leaderboard', ['data' => $data_ranked]);
        }
        else{
            $this->redirect('login');
        }
       
    }
}
