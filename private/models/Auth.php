<?php

class Auth{
    public static function authenticate($row){
        
        $_SESSION['USER'] = $row;
        print_r($_SESSION['USER']);
    }

    public static function logout(){
        if(isset($_SESSION['USER'])){

            unset($_SESSION['USER']);
        }
    }
    
    public static function logged_in(){
        if(isset($_SESSION['USER'])){
            return true;
        }
        return false;
    }
    public static function check_verified(){
        if($_SESSION['USER']->email==$_SESSION['USER']->email_verified){
            return true;
        }
        return false;
    }
    public static function __callStatic($method,$params){

        $prop = strtolower(str_replace("get","",$method));
        
        if(isset($_SESSION['USER'])) {
            return $_SESSION['USER']->$prop;
            
        }
        return "Unknown";

    }

    public static function isuser($usertype){
        if (Auth::logged_in()) {
            if (Auth::getusertype()==$usertype) {
                // echo ("called");
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public static function area_user(){
        //code
        if(isset($_SESSION['USER'])){
            return $_SESSION['USER']->name;
        }
        return false;
    }

    public static function event_user(){
        //code
        if(isset($_SESSION['USER'])){
            return $_SESSION['USER']->full_name;
        }
        return false;
    }

    public static function time(){
        //code
        if(isset($_SESSION['USER'])){
            $morning=" Morning";
            $afternoon=" Afternoon";
            $evening=" Evening";
            date_default_timezone_set('Asia/Colombo');
            if(date("H")>=0&&date("H")<12){
                return $morning;
            }
            elseif(date("H")>=12&&date("H")<18){
                return $afternoon;
            }
            else{
                return $evening ;
            }
            
        }
        return false;
    }
}

