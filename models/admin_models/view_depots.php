<?php
    require 'controllers/admininit.php';
	$email=$_SESSION['user_']['email'];
	$user_id=$_SESSION['user_']['user_id'];
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
		$startdate = trim($_POST['startdate']);
		$enddate = trim($_POST['enddate']);
	}

if(!isset($startdate)){$startdate ='1900-01-01';}
	if(!isset($enddate)){$enddate =date('Y-m-d');}
	
$depots=$general->selectAll('depots', $startdate, $enddate);


	require 'views/views_admin/viewdepots.view.php';
	
	?>