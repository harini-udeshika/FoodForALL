<?php
class Org_order_history extends Controller
{
    public function index()
    {
        
        $order=new Merchandise_purchase();
        $query='SELECT merchandise_purchase.* ,order_details.* ,merchandise_item.*
        from merchandise_purchase inner join order_details INNER JOIN merchandise_item 
        on merchandise_purchase.order_id = order_details.order_id && order_details.item_no=merchandise_item.item_no
        where merchandise_purchase.status=1 && merchandise_item.org_gov_reg_no=666
        ORDER by merchandise_purchase.date DESC';
        // $arr=['id'=>71];
        $data=$order->query($query);
        // echo "hello";
        // if($data){
        //     echo "<pre>";
        // }
        // print_r($data);
        // die;
        $this->view('org_order_history.view',['data'=>$data]);

    }
}