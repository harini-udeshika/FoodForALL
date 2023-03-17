<?php
class Search extends Controller
{
    public function index()
    {
        $this->view('search');

    }
    public function data()
    {
        $user = new User();

        if (count($_POST) > 0) {

            $text = $_POST['text'];
            $query = "SELECT * FROM user where first_name like '$text%' OR last_name like '$text%' OR concat(first_name+' '+last_name) like '$text%'";
            $data = $user->query($query);
            echo (json_encode($data));
        }
    }

}
