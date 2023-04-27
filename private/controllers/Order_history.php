<?php
class Order_history extends Controller
{
    public function index()
    {
        $order=new Merchandise_purchase();
        $query='select merchandise_purchase.* ,order_details.* 
        from merchandise_purchase inner join order_details 
        on merchandise_purchase.order_id = order_details.order_id 
        where merchandise_purchase.user_id= :id 
        ORDER by merchandise_purchase.date DESC';
        $arr=['id'=>Auth::getid()];
        $data=$order->query($query,$arr);
        // print_r($data);
        $this->view('order_history',['data'=>$data]);

    }
}
