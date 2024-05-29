<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ordered_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d');
    $date = date("Y-m-d");
   $name = $_POST['name'];
   $location = $_POST['location'];
    
$depot = $general->insert('depots', [
            'depot_name' => $name,
            'location' => $location,
			'datetime' => $datetime
            
        ]);

  		if($depot){

        $_SESSION['success'] = "Depot Registered Successfully";
        header("location: ViewDepots");
        exit;
		}
    else {
        $_SESSION['fail'] = "Oooops Something went wrong";
        header("location: ViewDepots");
        exit;
    }
}


?>
