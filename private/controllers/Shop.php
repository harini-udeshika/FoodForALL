<?php
class Shop extends Controller
{
    public function index()
    {
        $item = new Merchandise_item();
        $org = new Organization();
        if (Auth::logged_in()) {
            if(isset($_GET['product_id'])) {
                $item_id=$_GET['product_id'];
                $item_data=$item->where('item_no', $item_id);
                //print_r($item_data);
                $this->view('product_details', ['data'=>$item_data[0]]);
            } elseif (isset($_GET['id'])) {
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
    public function add_to_cart()
    {
        $item = new Merchandise_item();
        $org_id = $_GET['item'];
        $org_id = explode(" ", $org_id)[1];
        // echo($org_id);
        if (isset($_GET['item'])) {

            $_SESSION['timeout'] = 1 * 60;
            if (isset($_SESSION['timeout'])) {
                if (isset($_SESSION['CART' . $org_id]) && isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $_SESSION['timeout']) {
                    foreach ($_SESSION['CART' . $org_id] as $key => $product) {

                        $items_in_cart = $_SESSION['CART' . $org_id][$key]['qty'];
                        // print_r($_SESSION['CART']);
                        // $current_stock = $_SESSION['CART'][$key]['s'];
                        $current_stock = "SELECT stock from merchandise_item where item_no= :id";
                        $arr = ['id' => $product['id']];
                        $current_stock = $item->query($current_stock, $arr);
                        $current_stock = $current_stock[0]->stock;

                        $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                        $arr = ['s' => $current_stock + $items_in_cart,
                            'id' => $product['id']];
                        $updated_stock = $item->query($query, $arr);
                        // unset($_SESSION['CART'][$key]);

                    }

                    echo("<i class='fa-solid fa-circle-exclamation'></i>&nbsp;&nbsp;Shopping cart has been reset due to inactivity:");

                    $_SESSION['CART' . $org_id] = array();

                    // $_SESSION['CART'] = array_values($_SESSION['CART']);
                }

                $_SESSION['LAST_ACTIVITY'] = time();
            }
            // if(date('H:i:s') - $start_time>='10:00')
            $data = $_GET['item'];
            $data = explode(' ', $data);
            $qty = intVal($data[2]);
            $data = explode('=', $data[0]);
            $item_id = $data[1];

            // print_r($qty);
            $item_data = $item->where('item_no', $item_id);
            $item_data = $item_data[0];
            $update = array();
            if ($item_data) {
                if (isset($_SESSION['CART' . $org_id])) {
                    $ids = array_column($_SESSION['CART' . $org_id], "id");
                    if (in_array($item_data->item_no, $ids)) {
                        $key = array_search($item_data->item_no, $ids);
                        $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                        $arr = ['s' => $item_data->stock - $qty,
                            'id' => $item_data->item_no];
                        $updated_stock = $item->query($query, $arr);
                        $_SESSION['CART' . $org_id][$key]['qty'] += $qty;

                    } else {
                        $arr = array();
                        $arr['id'] = $item_data->item_no;
                        $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                        $arr = ['s' => $item_data->stock - $qty,
                            'id' => $item_data->item_no];
                        $updated_stock = $item->query($query, $arr);
                        $arr['qty'] = $qty;
                        $_SESSION['CART' . $org_id][] = $arr;

                    }
                } else {

                    $arr = array();
                    $arr['id'] = $item_data->item_no;
                    $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                    $arr = ['s' => $item_data->stock - $qty,
                        'id' => $item_data->item_no];
                    $updated_stock = $item->query($query, $arr);
                    $arr['qty'] = $qty;
                    $_SESSION['CART' . $org_id][] = $arr;

                }
            }
            // print_r($item_data);
            // print_r($_SESSION['CART']);
        }
    }
}
