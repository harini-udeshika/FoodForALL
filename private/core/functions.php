<?php

function get_var($key){

    if(isset($_POST[$key])){
        return $_POST[$key];
    }
}

function get_select(){

}

function esc($var){
    return htmlspecialchars($var);
}