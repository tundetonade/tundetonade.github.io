<?php


    require 'controllers/admininit.php';
	require 'helpers/secret.php';
	$email=$_SESSION['user_']['email'];
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
		$startdate = trim($_POST['startdate']);
		$enddate = trim($_POST['enddate']);
	}
	if(!isset($startdate)){$startdate ='1900-01-01';}
	if(!isset($enddate)){$enddate =date('Y-m-d');}

	$wallet_balancex=$general->walletBalance('wallet_balance', $email);
	$wallet_balance=$wallet_balancex['balance'];
	
	$remittancex=$general->remittance('transactions', $email);
	$remittance=$remittancex['remit'];
	
	$reqhelpx=$general->requestHelp('transactions', $email);
	$reqhelp=$reqhelpx['help'];
	
	
	
	$payedemandx=$general->payeDemand('paye_calculator', $email);
	$payedemand=$payedemandx['payedemand'];
	
	$transdemandx=$general->transactionDemand('transactions', $email);
	$transdemand=$transdemandx['transdemand'];
	$total_demand = $payedemand + $transdemand;
	
	$tCount=$general->transactionCount('transactions', $email);
	$tApplicants=$general->totalApplicants('users');
	$walletCount=$general->transactionCount('wallet_topup_history', $email);
	$reqCount=$general->requestCount('users', $email);
	
	$availableOrders=$general->totalAmount('received_orders', 'total_amount');
	$pendingOrders=$general->totalAmount('ordered_books', 'total_amount');
	
	
	$monthx=$general->monthTransactions('transactions', $email);
	$month=$monthx['Month'];
	
	$yearx=$general->yearTransactions('transactions', $email);
	$year=$yearx['Year'];
	$tPayment=$general->totalPayment('transactions', $startdate, $enddate);
	$trans=$general->allTransactions('transactions', $startdate, $enddate, 'email', $email);
	$stategraph=$general->stateGraph('transactions', $startdate, $enddate);
	$stages=$general->allStages('depots_books');
	$allStages = $general->allStages('depots_books');
	//var_dump($allStages);
//die();
	$switchpiechart=$general->switchPieChart('transactions');
	//var_dump($switchpiechart);
	//die();
	//$statetrans=$general->stateTrans('transactions');
	$consultantpeding=$general->consultantPending('users');
	$objection=$general->consultantObjection('consultant_users');

	$total_transactions_data = [
    ["month" => "Jan", "visits" => 725],
    ["month" => "Feb", "visits" => 625],
    ["month" => "Mar", "visits" => 602],
    ["month" => "Apr", "visits" => 509],
    ["month" => "May", "visits" => 322],
    ["month" => "Jun", "visits" => 214],
    ["month" => "Jul", "visits" => 304],
    ["month" => "Aug", "visits" => 200],
    ["month" => "Sep", "visits" => 165],
    ["month" => "Oct", "visits" => 152],
    ["month" => "Nov", "visits" => 125],
    ["month" => "Dec", "visits" => 625]
];
$test=number_format(66000,2);
$chart1Data = [];

foreach($stategraph as $value) { array_push($chart1Data, round($value['amount'], 2)); }
//$chart1data =json_encode($chart1data);

$chart2Data = [$test, 42000, 75000, 110000, 230000, 87000, 50000, 44000, 88000, 64000, 120000, 32000, $test, 42000, 75000, 110000, 230000, 87000];
$chart3Data = [59000, 69000, 200000, 170000, 30000, 95000, 57000, 74000, 48000, 84000, 140000, 320000];
//$chart1Data = [27000, 42000, 75000, 110000, 230000, 87000, 50000, 44000, 88000, 64000, 120000, 32000, 27000, 42000, 75000, 110000, 230000, 87000];

$statex = [];
foreach($stategraph as $value) { array_push($statex, $value['state']); }
$state = json_encode($statex);
//var_dump(json_encode($state));
//die();
	
	require 'views/views_rep/admin_dashboard_rep.view.php';

	?>