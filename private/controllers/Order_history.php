<?php
class Order_history extends Controller
{
    public function index()
    {
        if((Auth::logged_in()) && (Auth::getusertype()=="reg_user")){
        $order=new Merchandise_purchase();
        $query='SELECT merchandise_purchase.* ,order_details.* ,merchandise_item.*
        from merchandise_purchase inner join order_details INNER JOIN merchandise_item 
        on merchandise_purchase.order_id = order_details.order_id && order_details.item_no=merchandise_item.item_no
        where merchandise_purchase.user_id= :id && merchandise_purchase.status=1
        ORDER by merchandise_purchase.date DESC';
        $arr=['id'=>Auth::getid()];
        $data=$order->query($query,$arr);
        // print_r($data);
        $this->view('order_history',['data'=>$data]);
        }
        else if(Auth::logged_in()){
            $this->redirect('404');
        }
        else{
            $this->redirect('home');
        }
    }
}
