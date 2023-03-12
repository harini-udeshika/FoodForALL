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
        if (empty($DATA["nic"])) {
            $this->errors['nic'] = "NIC is required";
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
        if (empty($DATA["Familymembers"])) {
            $this->errors['Familymembers'] = "Number of family members are required";
        }

        if($this->where('nic',$DATA['nic'])){
            $this->errors['nic']='This family already exit';
            
        }
        // $query='Select nic,sum(cholestrol_patients+healthy_adults+diabetes_patients+malnutritioned_children+healthy_children) from family group by nic';
        // if(query($DATA['nic'],$query)>$DATA['familymembers']){
        //     $this->errors['familymembers']='This family members not match';
        // }

        
        
        
        
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