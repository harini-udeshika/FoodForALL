<?php

//  define('ROOT','http://localhost/food_for_all/public');
define('STRIPE_WEBHOOK_SECRET','whsec_4d6ca688ccae769c8955a94058e0e22bce9846630926dc3332548ce8859806a3');

define('ROOT','http://localhost/FoodForAll/public');

// define('ROOT','http://localhost/projectNew/FoodForAll/public');


define('DBNAME', 'foodforall.0');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', 'mysql');

spl_autoload_register(function ($class_name) {
    require "../private/models/".ucfirst($class_name).".php";
});
