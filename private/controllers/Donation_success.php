<?php
class Donation_success extends Controller
{
    public function index()
    {
        if (isset($_GET['session_id'])) {

            $donate=new Donate();
            $session_id = '/' . $_GET['session_id'];
            // echo($session_id);
            $query = "update donate set status = 1 where session_id= :s_id";
            $arr = ['s_id' => $session_id];
            $data = $donate->query($query, $arr);
            $this->view('donation_success');
        } else {
            $this->view('404');
        }

    }

}
