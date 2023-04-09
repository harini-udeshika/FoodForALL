<?php
class Organization extends Model{
    // for table organization
    public function validate($DATA){
        // echo "<pre>";
        // print_r($DATA["organization"]);
        $result1 = $this->where('email',$DATA["email"]);
        $result2 = $this->where('gov_reg_no',$DATA["gov_no"]);
        if(!empty($result1))
        {
            // echo "<pre>";
            // print_r(sizeof($result1));
            // print_r($result1);
            $error = "error";
            $_SESSION['error1'] = "*This email already exists";
            // echo $error;
            // die;
        }

        if(!empty($result2))
        {
            $error = "error";
            $_SESSION['error2'] = "*This Gov. registration No. already exists";
        }
        // echo "empty";
        // die;

        if(isset($_SESSION['error1']) || isset($_SESSION['error2'])){
            return false;
        }
        
        return true;

    }

    public function code()
    {
        $arr = array();
        $arr['code'] = rand(10000, 99999);
        $arr['email'] = $_SESSION['USER']->email;
        $arr['expires'] = time() + (60) * 3;
        return $arr;
    }
    
    public function change_pwd_code()
    {
        $arr = array();
        $arr['code'] = rand(10000, 99999);
        // $arr['email'] = $_SESSION['USER']->email;
        $arr['expires'] = time() + (60) * 3;
        return $arr;
    }
}