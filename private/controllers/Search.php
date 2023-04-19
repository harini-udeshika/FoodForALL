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
            $query = "SELECT * FROM user WHERE LOWER(first_name) LIKE LOWER('$text%') OR 
            LOWER(last_name) LIKE LOWER('$text%') OR 
            CONCAT(LOWER(first_name), ' ', LOWER(last_name)) LIKE LOWER('$text%')";
            $data = $user->query($query);
            echo (json_encode($data));
        }
    }

}
