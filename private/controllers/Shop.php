<?php
class Shop extends Controller
{
    public function index()
    {
        if (Auth::logged_in()) {
            if (isset($_GET['id'])) {
                $org_id = $_GET['id'];
                $item = new Merchandise_item();
                $org = new Organization();
                $org_data = $org->where('gov_reg_no', $org_id);
                $query = "SELECT min(price) as min from merchandise_item where org_gov_reg_no = :id";
                $arr = ['id' => $org_id];
                $min=$item->query($query, $arr);
                $query = "SELECT max(price) as max from merchandise_item where org_gov_reg_no = :id";
                $arr = ['id' => $org_id];
                $max=$item->query($query, $arr);
                $data = $item->where('org_gov_reg_no', $org_id);
                //print_r($data);
                // print_r($org_data);
                $this->view('shop', ['rows' => $data,'org_data'=>$org_data[0],'max'=>$max,'min'=>$min]);
            } else {
                $this->view('404');
            }
        }
        else{
            $this->redirect('login');
        }
    }
    
}