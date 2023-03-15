<?php
class Elderhome extends Model{
    protected $table ="elderhome";

    public function validate($DATA)
    {
        $this->errors = array();
        // if(email_exists($DATA['email'])){

        // }
        if (empty($DATA["Name"])) {
            $this->errors['Name'] = "Name is required";
        }
        if (empty($DATA["OwnerName"])) {
            $this->errors['OwnerName'] = "Owner name with initials required";
        }
        if (empty($DATA['regNo'])) {
            $this->errors['regNo'] = "Registration number is required";
        }
        if (empty($DATA["nic"])) {
            $this->errors['nic'] = "Proffession is required";
        }
        if (empty($DATA["Contact1"])) {
            $this->errors['Contact1'] = "Contact is required";
        }
        if (empty($DATA["address"])) {
            $this->errors['address'] = "Address is required";
        }
        
        if($this->where('regNo',$DATA['regNo'])){
            $this->errors['regNo']='This Elder house already exit';
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }

  

}