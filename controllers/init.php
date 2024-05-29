<?php
    session_start();
	require 'database.php';
	//require 'usercontroller.php';
	require 'usercontroller.php';
    $database = new Database();
    $db = $database->getConnection();
   	$users = new Users($db);
    ?>