<?php
class Childrenhome extends Model{
    protected $table ="childrenhome";

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
        if (empty($DATA['regNo'])&& empty($DATA["childrenid"])) {
            $this->errors['regNo'] = "Registration number is required";
        }
        if (empty($DATA["nic"])) {
            $this->errors['nic'] = "nic is required";
        }
        if (empty($DATA["Contact1"])) {
            $this->errors['Contact1'] = "Contact is required";
        }
        if (empty($DATA["address"])) {
            $this->errors['address'] = "Address is required";
        }
        if (empty($DATA["Members"])) {
            $this->errors['Members'] = "Number of children are required";
        }

        if (isset($DATA['regNo']) && $this->where('regNo', $DATA['regNo'])) {
            $this->errors['regNo'] = 'This childrenhome already exists';
        } 

        // if (isset($DATA['childrenid']) && $this->where('regNo', $DATA['childrenid'])) {
        //     $this->errors['childrenid'] = 'This childrenhome already exists';
        // } 
        
        $total_members = array($DATA['Less_one_children'], $DATA['Less_five_children'], $DATA['Higher_five_children']);
        if (array_sum($total_members) != $DATA['Members']) {
            $this->errors['Members'] = 'This numbers of children do not match';
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