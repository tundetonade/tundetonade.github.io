<?php
    require 'controllers/admininit.php';
	require 'helpers/secret.php';
	$email=$_SESSION['user_']['email'];
	$user_id=$_SESSION['user_']['user_id'];
	$location=$_SESSION['user_']['location'];
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
		$startdate = trim($_POST['startdate']);
		$enddate = trim($_POST['enddate']);
	}
//$paye=$general->sumPAYE('paye_calculator', $email, $user_id);
if(!isset($startdate)){$startdate ='1900-01-01';}
	if(!isset($enddate)){$enddate =date('Y-m-d');}
	//var_dump($startdate);


$book=$general->selectAll('books', $startdate, $enddate);
$depot_books = $general->selectAllById('depots_books', 'depot_name', $location);
$locations=$general->selectAll('depots', $startdate, $enddate);

require 'views/views_rep/requestbooks.view.php';
	
	?>