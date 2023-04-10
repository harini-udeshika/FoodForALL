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
        // echo "<br>past";
        // print_r($past);
        // die;

        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0";
        // $arr = ['id'=>$org_reg];
        $allevents = $user->selectAll($org_reg);

        $this->view('home_org.view',['pending' => $pending, 'ongoin' => $ongoing, 'past' => $past , 'rows' => $data, 'allevents' => $allevents]);
    }
   
}