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
if(!isset($startdate)){$startdate ='1900-01-01';}
	if(!isset($enddate)){$enddate =date('Y-m-d');}
	//var_dump($startdate);
	//die();
//$inventories=$general->selectAll('products');
$hivorex_amountx=$general->selectProductAmount('products', 'product_name', 'Hivorex HD FL 7000');
$hivorex_amount=$hivorex_amountx['amount'];
$exceed_amountx=$general->selectProductAmount('products', 'product_name', 'Exceed 1018');
$exceed_amount=$exceed_amountx['amount'];

$inventory=$general->allProducts('inventories', $startdate, $enddate);

	require 'views/views_admin/inventories.view.php';
	
	?>