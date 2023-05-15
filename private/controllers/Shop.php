<?php
class Shop extends Controller
{

    public function index()
    {
        $item = new Merchandise_item();
        $org = new Organization();

      
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
                $org_id = $org_id[0];
                // if (isset($_SESSION['timeout'])) {
                //     if (isset($_SESSION['CART' . $org_id]) && isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $_SESSION['timeout']) {
                //         foreach ($_SESSION['CART' . $org_id] as $key => $product) {

                //             $items_in_cart = $_SESSION['CART' . $org_id][$key]['qty'];
                //             // print_r($_SESSION['CART']);
                //             // $current_stock = $_SESSION['CART'][$key]['s'];
                //             $current_stock = "SELECT stock from merchandise_item where item_no= :id";
                //             $arr = ['id' => $product['id']];
                //             $current_stock = $item->query($current_stock, $arr);
                //             $current_stock = $current_stock[0]->stock;

                //             $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                //             $arr = ['s' => $current_stock + $items_in_cart,
                //                 'id' => $product['id']];
                //             $updated_stock = $item->query($query, $arr);
                //             // unset($_SESSION['CART'][$key]);

                //         }

                //         echo ("<div class='redo'><i class='fa-solid fa-circle-exclamation'></i>&nbsp;&nbsp;Shopping cart has been reset due to inactivity</div>");

                //         $_SESSION['CART' . $org_id] = array();

                //         // $_SESSION['CART'] = array_values($_SESSION['CART']);
                //     }

                //     $_SESSION['LAST_ACTIVITY'] = time();
                // }

                if (isset($_SESSION['CART' . $org_id])) {

                    $prod_ids = array_column($_SESSION['CART' . $org_id], 'id');
                    $ids_str = "'" . implode("','", $prod_ids) . "'";
                    $query = "SELECT * FROM merchandise_item where item_no in ($ids_str)";
                    $cart_data = $item->query($query);
                    // print_r($data);
                }

                // print_r($ids_str);
                // print_r($_SESSION['CART']);

                if (is_array($cart_data)) {

                    foreach ($cart_data as $key => $row) {
                        // print_r($_SESSION['CART']);
                        foreach ($_SESSION['CART' . $org_id] as $i) {
                            if ($row->item_no == $i['id']) {
                                $cart_data[$key]->qty = $i['qty'];
                                break;
                            }
                        }
                    }
                }

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
                // print_r($_SESSION['CART']);
                // print_r($data);
                $this->view('shop', ['rows' => $data, 'org_data' => $org_data[0], 'max' => $max, 'min' => $min]);

            } else {
                $this->view('404');
            }
       
    }

    public function add_to_cart()
    {
        if (Auth::logged_in()) {
        $item = new Merchandise_item();
        $org_id = $_GET['item'];
        $org_id = explode(" ", $org_id)[1];
        // echo($org_id);
        if (isset($_GET['item'])) {

            $_SESSION['timeout'] = 1 * 60 * 10;
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

                    echo ("<i class='fa-solid fa-circle-exclamation'></i>&nbsp;&nbsp;Shopping cart has been reset due to inactivity:");

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

            // $this->redirect('shop?id=' . $data[1]);
        }
        echo ('<i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;item added to cart sucessfully!');
    }
    else{
        $this->redirect('login');
    }
    }

    public function add_qty()
    {
        $product = new Merchandise_item();

        if (isset($_GET['cart'])) {
            $params = $_GET['cart'];

            $params = explode(' ', $params);

            $org_id = explode('=', $params[0]);
            $org_id = $org_id[1];

            $params = explode('=', $params[1]);

            // print_r($params);
            $id = $params[0];
            // echo($id);
            $item_data = $product->where('item_no', $id);
            $item_data = $item_data[0];
            if (isset($_SESSION['CART' . $org_id])) {
                foreach ($_SESSION['CART' . $org_id] as $key => $item) {

                    if ($item['id'] == $id) {
                        $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                        $arr = ['s' => $item_data->stock - 1,
                            'id' => $item_data->item_no];
                        $updated_stock = $product->query($query, $arr);
                        $_SESSION['CART' . $org_id][$key]['qty'] += 1;
                        echo ($_SESSION['CART' . $org_id][$key]['qty']);
                        break;
                    }

                }
            }
        }

        // $this->redirect('shop?cartid=' . $params[0]);
    }

    public function sub_qty()
    {

        if (isset($_GET['cart'])) {
            $product = new Merchandise_item();
            $params = $_GET['cart'];

            $params = explode(' ', $params);
            $org_id = explode('=', $params[0]);
            $org_id = $org_id[1];
            $params = explode('=', $params[1]);

            // print_r($params);
            $id = $params[0];
            $item_data = $product->where('item_no', $id);
            $item_data = $item_data[0];
            if (isset($_SESSION['CART' . $org_id])) {
                foreach ($_SESSION['CART' . $org_id] as $key => $item) {
                    if ($item['id'] == $id) {
                        if ($_SESSION['CART' . $org_id][$key]['qty'] == 0) {
                            echo (0);
                            unset($_SESSION['CART' . $org_id][$key]);
                            $_SESSION['CART' . $org_id] = array_values($_SESSION['CART' . $org_id]);
                            break;
                        } else {
                            $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                            $arr = ['s' => $item_data->stock + 1,
                                'id' => $item_data->item_no];
                            $updated_stock = $product->query($query, $arr);
                            $_SESSION['CART' . $org_id][$key]['qty'] -= 1;
                            if ($_SESSION['CART' . $org_id][$key]['qty'] == 0) {
                                echo (0);
                                unset($_SESSION['CART'][$key]);
                                $_SESSION['CART' . $org_id] = array_values($_SESSION['CART' . $org_id]);
                                break;
                            }
                            echo ($_SESSION['CART' . $org_id][$key]['qty']);
                            break;
                        }

                    }
                }
            }
        }
        // $this->redirect('shop?cartid=' . $params[0]);
    }
    public function delete_qty()
    {

        if (isset($_GET['cart'])) {
            // $items_in_cart = $_POST['items_in_cart'];
            $product = new Merchandise_item();
            $params = $_GET['cart'];
            $params = explode(' ', $params);
            $org_id = explode('=', $params[0]);
            $org_id = $org_id[1];
            $params = explode('=', $params[1]);

            // print_r($params);
            $id = $params[0];
            $item_data = $product->where('item_no', $id);
            $item_data = $item_data[0];
            if (isset($_SESSION['CART' . $org_id])) {
                foreach ($_SESSION['CART' . $org_id] as $key => $item) {
                    if ($item['id'] == $id) {
                        $items_in_cart = $_SESSION['CART' . $org_id][$key]['qty'];
                        $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                        $arr = ['s' => $item_data->stock + $items_in_cart,
                            'id' => $item_data->item_no];
                        $updated_stock = $product->query($query, $arr);
                        unset($_SESSION['CART' . $org_id][$key]);
                        $_SESSION['CART' . $org_id] = array_values($_SESSION['CART' . $org_id]);
                        break;
                    }
                }
            }
        }
        // $this->redirect('shop?cartid=' . $params[0]);
    }
    public function update_qty()
    {
        $item = new Merchandise_item();
        //get number added to the input
        $data = json_decode(file_get_contents("php://input"), true);
        $quantity = $data["quantity"];
        $index = $data["index"];
        $params = $_GET['cart'];
        $params = explode(' ', $params);
        $org_id = explode('=', $params[0]);
        $org_id = $org_id[1];
        //if stock's aren't available
        if ($quantity > $_SESSION['CART' . $org_id][$index]['s']) {
            $available = $_SESSION['CART' . $org_id][$index]['s'] + 1;
            echo ("<i class='fa-solid fa-circle-exclamation'></i>&nbsp;&nbsp; Available " . $available . " only");
            exit();
        }
        // print_r($_SESSION['CART']);
        //getting cart quantity and inserted quantity
        $id = $_SESSION['CART' . $org_id][$index]['id'];
        $current_qty = $_SESSION['CART' . $org_id][$index]['qty'];
        $new_qty = $quantity - $current_qty;

        //get remaining stock
        $stock_left = "SELECT stock from merchandise_item where item_no= :id";
        $arr = ['id' => $id];
        $stock_left = $item->query($stock_left, $arr);
        $stock_left = $stock_left[0]->stock;

        $query = "update merchandise_item set stock= :s where item_no=:id";
        // echo($new_qty);
        if ($new_qty >= 0) {
            $arr = ['id' => $id,
                's' => $stock_left - $new_qty];
            $item->query($query, $arr);
        } else if ($new_qty < 0) {
            $arr = ['id' => $id,
                's' => $stock_left + (-1 * $new_qty)];
            $item->query($query, $arr);
        }
        $_SESSION['CART' . $org_id][$index]['qty'] = $quantity;
        // print_r($quantity.$index.$current_qty);
    }
    public function clear_cart()
    {
        $product = new Merchandise_item();
        $id = $_GET['cart'];
        // print_r($id);

        if (isset($_SESSION['CART' . $id])) {

            foreach ($_SESSION['CART' . $id] as $key => $item) {
                $item_id = $_SESSION['CART' . $id][$key]['id'];
                $items_in_cart = $_SESSION['CART' . $id][$key]['qty'];
                $stock = $product->where('item_no', $item_id)[0]->stock;
                $query = 'UPDATE merchandise_item stock set stock= :s where item_no= :id';
                $arr = ['s' => +$stock + $items_in_cart,
                    'id' => $item_id];
                $updated_stock = $product->query($query, $arr);
                unset($_SESSION['CART' . $id][$key]);

            }
            $_SESSION['CART' . $id] = array_values($_SESSION['CART' . $id]);
            $this->redirect('shop?cartid=' . $id);
        }
    }
}