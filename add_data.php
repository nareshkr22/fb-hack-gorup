<?php
require_once('config.php');


$data =array($_POST['id'],$_POST['update_time'],$_POST['story'],$_POST['description'],$_POST['message']);
$db->insert("hack",$data); //generates an INSERT query
	
?>