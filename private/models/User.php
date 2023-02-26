<?php
class User extends Model
{
    // protected $table = "user";
    public function validate($DATA)
    { 
        $this->errors = array();
        // if(email_exists($DATA['email'])){

        // }
        if (empty($DATA["first_name"] && $DATA["first_name"])) {
            $this->errors['first_name'] = "First name is required";
        }
        if (empty($DATA["last_name"] && $DATA["last_name"])) {
            $this->errors['last_name'] = "Last name is required";
        }
        if (!filter_var($DATA["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Valid email address is required";
        }
        if (strlen($DATA["password"]) < 8) {
            $this->errors['password'] = "Password must be at least 8 characters";
        }
        if (!preg_match("/[a-z]/i", $DATA["password"])) {
            $this->errors['password'] = "Password must contain at least one letter";
        }
        if (!preg_match("/[0-9]/", $DATA["password"])) {
            $this->errors['password'] = "Password must contain at least one digit";
        }
        if ($DATA["password"] !== $DATA["re_enter_password"]) {
            $this->errors['re_enter_password'] = "Passwords do not match";
        }
        if (count($this->errors) == 0) {
            return true;
        }

        return false;
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
