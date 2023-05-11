<?php
class Org_order_history extends Controller
{
    public function index()
    {
        $start = 0;
        $rows_per_page = 5;
        if (isset($_GET['pg_num'])) {
            $page = $_GET['pg_num'] - 1;
            $start = ($page * $rows_per_page);
        }
        $order = new Merchandise_purchase();
        $query_all = "SELECT COUNT(DISTINCT merchandise_purchase.order_id) AS all_orders
        from merchandise_purchase inner join order_details INNER JOIN merchandise_item 
        on merchandise_purchase.order_id = order_details.order_id && order_details.item_no=merchandise_item.item_no
        where merchandise_purchase.status=1 && merchandise_item.org_gov_reg_no= :id
        ORDER by merchandise_purchase.date DESC";

        $arr = ['id' => Auth::gov_reg_no()];
        $data_all = $order->query($query_all, $arr);

        $data_count = 0;

        $item_query = "SELECT merchandise_purchase.* ,order_details.* ,merchandise_item.*
        from merchandise_purchase inner join order_details INNER JOIN merchandise_item 
        on merchandise_purchase.order_id = order_details.order_id && order_details.item_no=merchandise_item.item_no
        where merchandise_purchase.status=1 && merchandise_item.org_gov_reg_no= :id
        ORDER by merchandise_purchase.date DESC";
        $arr = ['id' => Auth::gov_reg_no()];
        $item_data = $order->query($item_query, $arr);

        if (isset($_GET['pg_num'])) {
            $page = $_GET['pg_num'] - 1;
            $p = 0;
            $i = 0;
            $prev_rows = 0;
            while ($i < count($item_data) && $p <= $page * 5) {
                if ($i > 0 && $item_data[$i]->order_id == $item_data[$i - 1]->order_id) {
                    $prev_rows++;
                } else {
                    $prev_rows++;
                    $p++;
                    if($p > $page * 5){
                        $prev_rows--;
                    }
                }
                $i++;
            }
            $start = $prev_rows;
        }

        $num_rows = 0;
        $i = $start;
        $i_count = 0;
        if ($item_data) {
            while ($i < count($item_data) && $i_count <= $rows_per_page) {
                if ($i > 0 && $item_data[$i]->order_id == $item_data[$i - 1]->order_id) {
                    $num_rows++;
                } else {
                    $num_rows++;
                    $i_count++;
                    if($i_count > $rows_per_page){
                        $num_rows--;
                    }
                    
                }
                // echo $num_rows . "," .$i_count . "," . $i . "," . $item_data[$i]->order_id . "<br>";
                $i++;
            }
        }

        // echo "<pre>";
        echo $start;
        // echo $i;
        echo $num_rows;
        // die;

        $query = "SELECT merchandise_purchase.* ,order_details.* ,merchandise_item.*
        from merchandise_purchase inner join order_details INNER JOIN merchandise_item 
        on merchandise_purchase.order_id = order_details.order_id && order_details.item_no=merchandise_item.item_no
        where merchandise_purchase.status=1 && merchandise_item.org_gov_reg_no= :id
        ORDER by merchandise_purchase.date DESC LIMIT $start, $num_rows";

        $arr = ['id' => Auth::gov_reg_no()];
        $data = $order->query($query, $arr);

        if ($data_all) {
            $data_count = $data_all[0]->all_orders;
        }
        // echo "<pre>";
        // print_r($data_all);
        // echo $data_count;
        // die;
        $this->view('org_order_history.view', [
            'data' => $data, 'tot_orders' => $data_count,
            'tot_pages' => ceil($data_count / $rows_per_page), 'num_rows' => $num_rows
        ]);
    }
}
