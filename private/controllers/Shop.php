<?php
class Shop extends Controller
{
    public function index()
    {$item = new Merchandise_item();
        $org = new Organization();
        if (Auth::logged_in()) { 
            if(isset($_GET['product_id'])){
                $item_id=$_GET['product_id'];
                $item_data=$item->where('item_no',$item_id);
                //print_r($item_data);
                $this->view('product_details',['data'=>$item_data[0]]);
            }
            else if (isset($_GET['id'])) {
                $org_id = $_GET['id'];

                $org_data = $org->where('gov_reg_no', $org_id);
                $query = "SELECT min(price) as min from merchandise_item where org_gov_reg_no = :id";
                $arr = ['id' => $org_id];

                $min = $item->query($query, $arr);
                $query = "SELECT max(price) as max from merchandise_item where org_gov_reg_no = :id";
                $arr = ['id' => $org_id];

                $max = $item->query($query, $arr);
                $data = $item->where('org_gov_reg_no', $org_id);
                if (isset($_POST['find'])) {

                    $find = '%' . $_POST['find'] . '%';
                    $query = "SELECT * from merchandise_item where name like :find && org_gov_reg_no = :id";
                    $arr = ['id' => $org_id,
                        'find' => $find];
                    $data = $item->query($query, $arr);

                    //$this->view('shop', ['rows' => $search_data]);
                }

                $this->view('shop', ['rows' => $data, 'org_data' => $org_data[0], 'max' => $max, 'min' => $min]);

                

            } else {
                $this->view('404');
            }
        } else {
            $this->redirect('login');
        }
    }

}
