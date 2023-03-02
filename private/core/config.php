<?php

//  define('ROOT','http://localhost/food_for_all/public');


define('ROOT','http://localhost/FoodForAll/public');

//define('ROOT','http://localhost/projectNew/FoodForAll/public');


define('DBNAME', 'foodforall.0');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', 'mysql');

spl_autoload_register(function ($class_name) {
    require "../private/models/".ucfirst($class_name).".php";
});