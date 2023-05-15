<?php
class Home_org extends Controller
{
    function index(){
        $user = new Organization();
        $data = $user->where('gov_reg_no',$_SESSION['USER']->gov_reg_no);
        $data = $data[0];

        $event = new Event();
        
        $org_reg = $_SESSION['USER']->gov_reg_no;
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved=0";
        $arr = ['id'=>$org_reg];
        $pending = $event->query($query,$arr);
        // echo "<pre>";
        // echo "pending";
        // print_r($pending);

        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date>=CURRENT_DATE";
        // $arr = ['id'=>$org_reg];
        $ongoing = $user->selectOngoing($org_reg);
        // echo "<br>ongoing";
        // print_r($ongoing);

        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date<CURRENT_DATE";
        $arr = ['id'=>$org_reg];
        $past = $event->query($query,$arr);
        $allevents = $user->selectAll($org_reg);
        // echo "<pre>";
        // print_r($allevents);
        // die;

        $sub_data = $this->isSubscribed();

        $this->view('home_org.view',['pending' => $pending, 'ongoin' => $ongoing, 'past' => $past , 'rows' => $data, 'allevents' => $allevents,
                                    'sub_data'=>$sub_data]);
    }

    public function isSubscribed()
    {
        $org = new Subscribe();
        $query = "SELECT * FROM subscription Where org_gov_reg_no= :id 
        && status = 1 ORDER BY date DESC";

        $arr_2 = ['id' => Auth::gov_reg_no()];
        $data = $org->query($query,$arr_2);

        if ($data) {
            $paid_date = new DateTime($data[0]->date);
            $today = new DateTime(); 
            $interval = $paid_date->diff($today);
            $days = $interval->days;

            if ($days > 30) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
        // die;
    }
   
}