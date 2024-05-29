<?php
	session_start();
    require 'database.php';
	//require 'dosms.php';
	//require 'usercontroller.php';
	require 'admincontroller.php';
    $database = new Database();
    $db = $database->getConnection();
   	$general = new Admin($db);
	//$sms = new doSMS();
    ?>