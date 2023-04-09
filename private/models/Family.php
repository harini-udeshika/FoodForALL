<?php
class Family extends Model{
    protected $table ="family";

    public function validate($DATA)
    {
        $this->errors = array();
        // if(email_exists($DATA['email'])){

        // }
        if (empty($DATA["FullName"])) {
            $this->errors['FullName'] = "Full name is required";
        }
        if (empty($DATA["NameWithInitial"])) {
            $this->errors['NameWithInitial'] = "Name with initials required";
        }
        if (empty($DATA["FamilyID"])) {
            $this->errors['FamilyID'] = "NIC is required";
        }
        if (empty($DATA["profession"])) {
            $this->errors['profession'] = "Proffession is required";
        }
        if (empty($DATA["salary"])) {
            $this->errors['salary'] = "Salary is required";
        }
        if (empty($DATA["Contact1"])) {
            $this->errors['Contact1'] = "Contact is required";
        }
        if (empty($DATA["address"])) {
            $this->errors['address'] = "Address is required";
        }

        if($this->where('FamilyID',$DATA['FamilyID'])){
            $this->errors['FamilyID']='This family already exit';
        }
        
        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

  

}