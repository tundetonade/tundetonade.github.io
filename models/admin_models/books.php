<?php
    require 'controllers/admininit.php';
	require 'helpers/secret.php';
	$email=$_SESSION['user_']['email'];
	$user_id=$_SESSION['user_']['user_id'];
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
		$startdate = trim($_POST['startdate']);
		$enddate = trim($_POST['enddate']);
	}
//$paye=$general->sumPAYE('paye_calculator', $email, $user_id);
if(!isset($startdate)){$startdate ='2000-01-01';}
	if(!isset($enddate)){$enddate =date('Y-m-d');}

//var_dump($startdate);
//die();


$book=$general->selectAll('books', $startdate, $enddate);


require 'views/views_admin/books.view.php';
	
	?>