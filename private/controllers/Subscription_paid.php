<?php
class Subscription_paid extends Controller
{

    public function index()
    {
        if (Auth::getusertype() == 'organization') {
            if (isset($_GET['session_id'])) {

                $sub = new Subscribe();
                $session_id = '/' . $_GET['session_id'];
                // echo($session_id);
                $query = "update subscription set status = 1 where session_id= :s_id";
                $arr = ['s_id' => $session_id];
                $data = $sub->query($query, $arr);
                $this->view('subscription_paid');
            } else {
                // $this->view('subscription_paid');
                $this->view('404');
            }

        }

    }

}
