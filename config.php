<?php
ob_start();
 //include de main OJ_mysql class file

    //configuration array
include("OBJ_mysql.php");
$config = array();
$config["hostname"]  = "localhost";
$config["database"]  = "gtu";
$config["username"]  = "root";
$config["password"]  = "root";
//other configurations
$config["port"]      = "3306"; //defaults to 3306
$config["charset"]    = "UTF-8"; //defaults to UTF-8
$config["exit_on_error"] = "TRUE"; //defaults to true
$config["allow_logging"] = "TRUE"; //defaults to true
//class instantiation
$db = new OBJ_mysql($config);

//set timezone
date_default_timezone_set('Asia/Calcutta');

//database credentials



//application address
define('DIR','http://localhost/gmc/');
define('SITEEMAIL','noreply@domain.com');



function base_url()
{
	return 'http://localhost/facebook';
}


?>
