<?php
class Shop extends Controller
{

    public function index()
    {
        $item = new Merchandise_item();
        $org = new Organization();
        if (Auth::logged_in()) {
            if (isset($_GET['product_id'])) {
                $item_id = $_GET['product_id'];
                $item_data = $item->where('item_no', $item_id);
                //print_r($item_data);
                $this->view('product_details', ['data' => $item_data[0]]);
            }
            //----------cart----------------
            else if (isset($_GET['cartid'])) {

                $cart_data = false;
                $params = $_GET['cartid'];

                $org_id = explode(' ', $params);

                $data = $org->where('gov_reg_no', $org_id[0]);
                // $item_data=$item->where('item_no',$item_id);

                $prod_ids = array();
                if (isset($_SESSION['CART'])) {
                    $prod_ids = array_column($_SESSION['CART'], 'id');
                    $ids_str = "'" . implode("','", $prod_ids) . "'";
                    $query = "SELECT * FROM merchandise_item where item_no in ($ids_str)";
                    $cart_data = $item->query($query);
                    // print_r($data);
                }

                // print_r($ids_str);
                // print_r($_SESSION['CART']);

                if (is_array($cart_data)) {

                    foreach ($cart_data as $key => $row) {
                        print_r($_SESSION['CART']);
                        foreach ($_SESSION['CART'] as $i) {
                            if ($row->item_no == $i['id']) {
                                $cart_data[$key]->qty = $i['qty'];
                                break;
                            }
                        }
                    }
                }

                // print_r($data);
                $this->view('cart', ['data' => $data[0], 'cart_data' => $cart_data]);

            } else if (isset($_GET['id'])) {
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
        $cart = new Shopping_cart();

        if (isset($_GET['item'])) {
            $data = $_GET['item'];
            $data = explode(' ', $data);
            // print_r($data);
            $item_id = $data[0];
            $item_data = $item->where('item_no', $item_id);
            $item_data = $item_data[0];
            if ($item_data) {
                if (isset($_SESSION['CART'])) {
                    $ids = array_column($_SESSION['CART'], "id");
                    if (in_array($item_data->item_no, $ids)) {
                        $key = array_search($item_data->item_no, $ids);
                        $_SESSION['CART'][$key]['qty']++;

                    } else {
                        $arr = array();
                        $arr['id'] = $item_data->item_no;
                        $arr['qty'] = 1;
                        $_SESSION['CART'][] = $arr;
                    }
                } else {
                    $arr = array();
                    $arr['id'] = $item_data->item_no;
                    $arr['qty'] = 1;
                    $_SESSION['CART'][] = $arr;
                }
            }
            print_r($item_data);
            print_r($_SESSION['CART']);

            $this->redirect('shop?id=' . $data[1]);
        }
        echo ('<i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;item added to cart sucessfully!');
    }

    public function add_qty()
    {
        $params = $_GET['cartid'];

        $params = explode(' ', $params);
        $id = $params[1];
        if (isset($_SESSION['CART'])) {
            foreach ($_SESSION['CART'] as $key => $item) {

                if ($item['id'] == $id) {
                    $_SESSION['CART'][$key]['qty'] += 1;
                    break;
                }

            }
        }
        $this->redirect('shop?cartid=' . $params[0]);
    }

    public function sub_qty()
    {
        $params = $_GET['cartid'];

        $params = explode(' ', $params);
        $id = $params[1];
        if (isset($_SESSION['CART'])) {
            foreach ($_SESSION['CART'] as $key => $item) {

                if ($item['id'] == $id) {
                    if ($_SESSION['CART'][$key]['qty'] == 0) {
                        unset($_SESSION['CART'][$key]);
                        $_SESSION['CART'] = array_values($_SESSION['CART']);
                        break;
                    }
                    $_SESSION['CART'][$key]['qty'] -= 1;
                    break;
                }
            }
        }
        $this->redirect('shop?cartid=' . $params[0]);
    }
    public function delete_qty()
    {
        $params = $_GET['cartid'];

        $params = explode(' ', $params);
        $id = $params[1];
        if (isset($_SESSION['CART'])) {
            foreach ($_SESSION['CART'] as $key => $item) {

                if ($item['id'] == $id) {
                    unset($_SESSION['CART'][$key]);
                    $_SESSION['CART'] = array_values($_SESSION['CART']);
                    break;

                }
            }
        }
        $this->redirect('shop?cartid=' . $params[0]);
    }
    public function update_qty()
    {
        
        if ($json = file_get_contents('php://input')) {
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            $quantity = intval($data->quantity);
            $index = $data->index;
            
            //  $_SESSION['CART'][$index]->qty=$quantity;
            // $_SESSION['CART'][$index]->qty=$quantity;
            $_SESSION['CART'][$index]['qty']=$quantity;
            print_r( $_SESSION['CART']);
           

            // Do something with $myVariable
        
        }

    }
}
