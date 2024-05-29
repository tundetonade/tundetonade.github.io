<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the common fields
    $ordered_by = $_SESSION['user_']['email'];
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d H:i:s');
    $date = date("Y-m-d");

    // Loop through the book details to process each one
    foreach ($_POST['book_name'] as $key => $book_name) {
        $quantity = $_POST['quantity'][$key];
        $location = $_POST['location']; // Assuming this is the depot/location selected by the user

        // Retrieve the relevant book details from the received_orders table
        $received_order = $general->selectById('received_orders', 'book_name', $book_name);

        if ($received_order && isset($received_order['quantity'])) {
            $total_quantity = $received_order['quantity'];

            // Calculate the quantity_left after distribution
            $quantity_left = $total_quantity - $quantity;

            // Check if requested quantity is available
            if ($quantity_left >= 0) { // Ensure quantity_left doesn't go negative
                // Update the quantity_left in the received_orders table
                $update_quantity = $general->updateDynamic('received_orders', ['quantity' => $quantity_left], 'book_name', $book_name);

                // Retrieve the existing record from depots_books table
$conditions = [
    'book_name' => $book_name,
    'depot_name' => $location
];
$existing_book = $general->selectById('depots_books', $conditions);

if ($existing_book) {
    // If the book exists for this depot, update the quantity
    $new_quantity = $existing_book['quantity'] + $quantity;
    // New usage with multiple conditions
$conditions = [
    'book_name' => $book_name,
    'depot_name' => $location
];
$update_depots_books = $general->updateDynamic('depots_books', ['quantity' => $new_quantity], $conditions);
                    
    if (!$update_depots_books) {
        $_SESSION['fail'] = "Failed to update quantity for book: $book_name";
        header("location: DistributeBooks");
        exit;
    }
} else {
    // If the book doesn't exist for this depot, insert a new record
    $depots_books_insert = $general->insert('depots_books', [
        'depot_name' => $location,
        'book_name' => $book_name,
        'quantity' => $quantity,
        'datetime' => $datetime,
        'date' => $date
    ]);
                    
    if (!$depots_books_insert) {
        $_SESSION['fail'] = "Failed to insert book details for: $book_name";
        header("location: DistributeBooks");
        exit;
    }
}

                // Insert distribution details into distributed_history table
                $distributed_history_insert = $general->insert('distributed_history', [
                    'depot_name' => $location,
                    'book_name' => $book_name,
                    'quantity' => $quantity,
                    'datetime' => $datetime,
                    'date' => $date
                ]);

                if (!$update_quantity || !$distributed_history_insert) {
                    $_SESSION['fail'] = "Oooops Something went wrong";
                    header("location: DistributeBooks");
                    exit; // Exit the loop in case of failure
                }
            } else {
                $_SESSION['fail'] = "Requested quantity exceeds available quantity for book: $book_name";
                header("location: DistributeBooks");
                exit; // Exit the loop if requested quantity exceeds available quantity
            }
        } else {
            $_SESSION['fail'] = "Book details not found for book: $book_name";
            header("location: DistributeBooks");
            exit; // Exit the loop if book details not found
        }
    }

    $_SESSION['success'] = "Books Distributed Successfully";
    header("location: DistributeBooks");
    exit;
}

?>
