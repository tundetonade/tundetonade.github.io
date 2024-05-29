<?php
	session_start();
    require 'database.php';
	//require 'dosms.php';
	//require 'usercontroller.php';
	require 'maincontroller.php';
    $database = new Database();
    $db = $database->getConnection();
   	$general = new General($db);
	//$sms = new doSMS();
    ?>