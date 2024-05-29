<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ordered_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d');
    $date = date("Y-m-d");
   $name = $_POST['name'];
   $location = $_POST['location'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
    
$rep = $general->insert('users', [
            'name' => $name,
            'location' => $location,
			'phone' => $phone,
			'email' => $email,
			'password' => $phone,
			'type' => 'Rep',
			'datetime' => $datetime
            
        ]);
		

  		if($rep){

        $_SESSION['success'] = "Rep Registered Successfully";
        header("location: ViewReps");
        exit;
		}
    else {
        $_SESSION['fail'] = "Oooops Something went wrong";
        header("location: ViewReps");
        exit;
    }
}


?>
