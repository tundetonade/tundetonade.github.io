<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the common fields
    $ordered_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d H:i:s');
    $date = date("Y-m-d");

    // Generate a unique order code
    $order_code = generateOrderCode(); // Assuming you have a function to generate the order code

    

    
        // Loop through the book details to insert each one
        foreach ($_POST['book_name'] as $key => $book_name) {
            $quantity = $_POST['quantity'][$key];
            $unit_amount = $_POST['unit_amount'][$key];
            $total_amount = $_POST['total_amount'][$key];

            // Insert book details into ordered_books table
            $book_insert = $general->insert('ordered_books', [
                'order_code' => $order_code,
                'book_name' => $book_name,
                'quantity' => $quantity,
                'unit_amount' => $unit_amount,
                'total_amount' => $total_amount
            ]);
            if (!$book_insert) {
                $_SESSION['fail'] = "Oooops Something went wrong";
                header("location: OrderBooks");
                exit; // Exit the loop in case of failure
            }
        }
		if($book_insert){

        $_SESSION['success'] = "Books Ordered Successfully";
        header("location: OrderBooks");
        exit;
		}
    else {
        $_SESSION['fail'] = "Oooops Something went wrong";
        header("location: OrderBooks");
        exit;
    }
}

// Function to generate a unique order code
function generateOrderCode() {
    // Generate a random 8-digit number
    return 'ORD' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
}
?>
