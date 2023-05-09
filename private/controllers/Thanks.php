<?php
class Thanks extends Controller
{
    public function index()
    {
        if (isset($_GET['session_id'])) {
            $order = new Merchandise_purchase();
            $order_details = new Order_details();
            $merchandise_item = new Merchandise_item();

            $session_id = '/' . $_GET['session_id'];
            $order_id = $_GET['order_id'];
            $org_id = $_GET['org_id'];
            $query = "select * from merchandise_purchase where session_id= :s_id && order_id= :o_id";
            $arr = ['s_id' => $session_id, 'o_id' => $order_id];
            $data = $order->query($query, $arr);

            $query = "update merchandise_purchase set status = 1 where order_id=" . $order_id;
            $order->query($query);

            if (isset($_SESSION['CART' . $org_id])) {
                $_SESSION['CART' . $org_id] = array();
            }

            if (!$data) {

                $this->view('404');
            } else {

                $this->view('thanks');
            }
        } else {
            $this->view('404');
        }

    }

}
