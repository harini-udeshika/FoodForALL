<?php

class Org_admin_events extends Controller
{
    function index()
    {
        $event = new Event();
        
        $org_reg = $_SESSION['USER']->gov_reg_no;
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved=0";
        $arr = ['id'=>$org_reg];
        $pending = $event->query($query,$arr);
        // echo "<pre>";
        // echo "pending";
        // print_r($pending);
        
        // ---------------------------------------------------------------------------------------
        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date>=CURRENT_DATE";
        // $arr = ['id'=>$org_reg];
        // $ongoing = $event->query($query,$arr);
        // ---------------------------------------------------------------------------------------------------
        $org = new Organization();
        $ongoing = $org->selectOngoing($org_reg);
        // echo "<pre>";
        // print_r($ongoing);
        // die;

        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date<CURRENT_DATE";
        $arr = ['id'=>$org_reg];
        $past = $event->query($query,$arr);
        // echo "<br>past";
        // print_r($past);
        // die;
        $this->view('org.admin.events',['pending' => $pending, 'ongoin' => $ongoing, 'past' => $past]);
    }

    public function delete_pending(){
        $id = $_GET['id'];
        // echo $id;
        // die;
        $item_del = new Event();
        $item_del->delete_event($id);

        $this->redirect('org_admin_events');
    }
}