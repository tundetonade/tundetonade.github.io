<?php
require 'controllers/admininit.php';
require 'helpers/secret.php';
$orderCode=$secret->id($id);
$detailed = $general->selectAllById('ordered_books', 'order_code', $secret->id($id));
$grandTotal=$general->grandTotal('ordered_books', 'total_amount', 'order_code', $secret->id($id));
require 'views/views_admin/detailed_order.view.php';

?>