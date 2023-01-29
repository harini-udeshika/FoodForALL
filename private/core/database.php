<?php

class Database
{
    private function connect(){
        $string = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
        if(!$con = new PDO($string,DBUSER,DBPASS)){
            die("Could not connect to database");
        }
        return $con;
    }
    
    public function query($query,$data=array(),$data_type="object"){
        $con=$this->connect();
        $stm=$con->prepare($query);
        if($stm){
            $check=$stm->execute($data);
            if($check){
               if($data_type=="object"){
                $data=$stm->fetchAll(PDO::FETCH_OBJ);
               }else{
                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
               }
                if(is_array($data) && count($data)>0){
                    return $data;
                }
            }
        }
        return false;
    }
    // public function query(){

    // }
}


// $host="localhost";
// $dbname="foodforall";
// $username="root";
// $password="";

// $mysqli=new mysqli( hostname:$host,
//                     username:$username,
//                     password:$password,
//                     database:$dbname);
// if($mysqli->connect_errno){
//     die("Connection error:".$mysqli->connect_error);
// }                   
// return $mysqli;