<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the common fields
    $ordered_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d H:i:s');
    $date = date("Y-m-d");

    // Generate a unique order code
    $request_code = generateRequestCode(); // Assuming you have a function to generate the request code

    

    
        // Loop through the book details to insert each one
        foreach ($_POST['book_name'] as $key => $book_name) {
            $quantity = $_POST['quantity'][$key];
           
			

            // Insert book details into reps_request table
            $book_insert = $general->insert('reps_request', [
                'request_code' => $request_code,
                'book_name' => $book_name,
                'quantity' => $quantity,
                'location' => $_SESSION['user_']['location'],
				'rep_name' => $_SESSION['user_']['name'],
				'datetime' => $datetime,
                'date' => $date
            ]);
			//var_dump($book_insert);
			//die;
            if (!$book_insert) {
                $_SESSION['fail'] = "Oooops Something went wrong";
                header("location: RequestBooks");
                exit; // Exit the loop in case of failure
            }
        }
		if($book_insert){

        $_SESSION['success'] = "Books Requested Successfully. You will be notified once an approval is made";
        header("location: RequestBooks");
        exit;
		}
    else {
        $_SESSION['fail'] = "Oooops Something went wrong";
        header("location: RequestBooks");
        exit;
    }
}

// Function to generate a unique request code
function generateRequestCode() {
    // Generate a random 8-digit number
    return 'RQT' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
}
?>
