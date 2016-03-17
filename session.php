<?php
session_start();
if(isset($_POST["status"]))
{
$_SESSION["status"] = $_POST["status"]; 
}

if(isset($_POST["name"]))
{
$_SESSION["name"] = $_POST["name"]; 
}


?>