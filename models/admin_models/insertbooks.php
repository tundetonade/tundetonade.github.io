<?php
require 'controllers/admininit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['isbn_no'])) {
    $book_name = trim($_POST['book_name']);
	$author = trim($_POST['author']);
	$isbn_no = trim($_POST['isbn_no']);
   
                
    date_default_timezone_set('Africa/Lagos');
    $datetime = date('Y-m-d');
    $date = date("l jS \of F Y h:i:s A");

   
        // Insert into the 'inventories' table
        $books = $general->insert('books', [
            'registered_by' => $_SESSION['user_']['email'],
            'book_name' => $book_name,
            'author' => $author,
			'isbn_no' => $isbn_no,
            'datetime' => $datetime,
            'date' => $date
        ]);

        if ($books) {
            
           
$_SESSION['success'] = "Book with ISBN NO: $isbn_no Registered Successfully";
   header("location: Books");
} else {
    $_SESSION['fail'] = "Oooops Something went wrong";
    header("location: Books");
}
}
?>
