<?php
class Checkout extends Controller
{
    public function index()
    {
        $org = new Organization();
        $item = new Merchandise_item();
        if (isset($_GET['org'])) {
            $org_id = $_GET['org'];

            $data = $org->where('gov_reg_no', $org_id);
            // $item_data=$item->where('item_no',$item_id);

            $prod_ids = array();

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
            $total = 0;
            foreach ($cart_data as $key => $row) {
                // print_r($_SESSION['CART']);

                $total += $cart_data[$key]->price * $cart_data[$key]->qty;
            }
            // echo($total);
        }
        if (isset($_POST['name']) > 0 && $_SESSION['CART' . $org_id] != null) {
            // print_r($_POST);
            date_default_timezone_set('Asia/Kolkata');
            $purchase = new Merchandise_purchase();
            $arr['name'] = $_POST['name'];
            $arr['address'] = $_POST['address'];
            $arr['city'] = $_POST['city'];
            $arr['telephone'] = $_POST['telephone'];
            $arr['user_id'] = Auth::getid();

            if ($_POST['district'] == "Colombo") {
                $arr['subtotal'] = $total + 200;
            } else {
                $arr['subtotal'] = $total + 400;
            }
            
            $arr['date'] = date('Y-m-d H:i:s');
            $arr['district'] = $_POST['district'];
            $purchase->insert($arr);

            $query = "select order_id from merchandise_purchase where user_id=:id && date=:date";
            $arr1 = ['id' => Auth::getid(), 'date' => $arr['date']];
            $purchase_id = $purchase->query($query, $arr1);
            $purchase_id = $purchase_id[0]->order_id;
            // print_r($purchase_id);

            $order_details = new Order_details();
            $arr['order_id'] = $purchase_id;
            foreach ($cart_data as $key => $row) {
                // print_r($_SESSION['CART']);
                foreach ($_SESSION['CART' . $org_id] as $i) {
                    $arr3['order_id'] = $purchase_id;
                    $arr3['item_no'] = $cart_data[$key]->item_no;
                    $arr3['qty'] = $cart_data[$key]->qty;

                }

                $order_details->insert($arr3);
            }
            $arr['org_id'] = $org_id;
            stripe_checkout($arr);
            // webhook();
        }

        $this->view('checkout', ['data' => $data[0], 'cart_data' => $cart_data]);
    }
}
