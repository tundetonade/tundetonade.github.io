<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the common fields
    $received_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $date = date('Y-m-d H:i:s');
    $datetime = date("Y-m-d");

    // Loop through the book details to insert each one
    foreach ($_POST['book_name'] as $key => $book_name) {
        $quantity_received = $_POST['quantity'][$key];
        $unit_amount = $_POST['unit_amount'][$key];
        $total_amount = $_POST['total_amount'][$key];
        $order_code = $_POST['order_code'][$key];
        $id = $_POST['id'][$key]; // Added to fetch the corresponding book's ID

        // Fetch the existing quantity for this book
        $existing_quantity = $general->selectById('ordered_books', 'id', $id)['quantity'];

        // Calculate the new quantity after receiving
        $new_quantity = $existing_quantity - $quantity_received;

        // Define the conditions for the update
        $conditions = ['id' => $id];

        // Update the quantity in ordered_books table
        $update_result = $general->updateDynamic('ordered_books', [
            'quantity' => $new_quantity,
            'unit_amount' => $unit_amount,
            'total_amount' => $new_quantity * $unit_amount
        ], $conditions);

        if (!$update_result) {
            $_SESSION['fail'] = "Failed to update quantity for book: $book_name";
            header("location: Dashboard"); // Redirect to the receiving page
            exit; // Exit the loop in case of failure
        }

        // Insert book details into received_orders table
        $insert_result = $general->insert('received_orders', [
            'order_code' => $order_code,
            'book_name' => $book_name,
            'quantity' => $quantity_received,
            'unit_amount' => $unit_amount,
            'total_amount' => $total_amount,
            'received_by' => $received_by,
            'datetime' => $datetime,
            'date' => $date
        ]);

        if (!$insert_result) {
            $_SESSION['fail'] = "Failed to insert received order for book: $book_name";
            header("location: Dashboard"); // Redirect to the receiving page
            exit; // Exit the loop in case of failure
        }
    }

    $_SESSION['success'] = "Orders received successfully";
    header("location: Dashboard");
    exit;
}
?>
