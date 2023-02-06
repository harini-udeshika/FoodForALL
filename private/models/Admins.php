<?php
class Admins extends Model
{
    protected $table = "admin";

    public function change_table($table_name)
    {
        $this->table = $table_name;
    }

    public function validate_Acoordinator($DATA){

        $this->errors = array();

        // validate first name
        if(empty($DATA['first_name']) || !preg_match('/^[a-zA-Z]+$/', $DATA['first_name']))
        {
            $this->errors['first_name'] = "An error in first name";
        }

        //validate last name
        if(empty($DATA['last_name']) || !preg_match('/^[a-zA-Z]+$/', $DATA['last_name']))
        {
            $this->errors['last_name'] = "An error in last name";
        }

        //validate email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "An error in Email";
        }
        
        //validate email exists
        if($this->where('email',$DATA['email']))
        {
            $this->errors['email_exists'] = "An error in email";
        }

        //validate password
        if(empty($DATA['password']) || $DATA['password'] !== $DATA['password2'])
        {
            $this->errors['password'] = "An error in Passwords";
        }

        //validate for password length
        if(strlen($DATA['password']) < 8)
        {
            $this->errors['password'] = "An error in Password";
        }

        // validate phone number
        if(empty($DATA['phone_no'])){
            $this->errors['phone_no'] = "An error in phone number";
        }

        // validate NIC
        if(empty($DATA['nic'])){
            $this->errors['nic'] = "An error in NIC";
        }

        //validate district
        if(empty($DATA['district']))
        {
            $this->errors['district'] = "An error in district";
        }

        //validate town
        if(empty($DATA['town']))
        {
            $this->errors['town'] = "An error in town";
        }

        //validate for usertype
        if(empty($DATA['usertype'])!='area_coordinator')
        {
            $this->errors['usertype'] = "An error in usertype";
        }


        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
}
