<?php
require 'framework/Request.php';
$urix=$req->uri();
$id=$req->getId($urix);
$type=$req->type();

if(($urix=='reddot')||($urix=='')){
require 'views/views_landing/landing.view.php';	
}
else if(($urix=='reddot/Reps/AuthLogin')){
require 'views/views_landing/login.view.php';	
}
//Admin Routes Start here
else if(($urix=='reddot/Admin/AuthLogin')){
require 'views/views_admin/login.view.php';	
}
else if($urix=='reddot/Admin/CheckLogin'){
require "models/admin_models/login_admin.php";	
}
else if($urix=='reddot/Admin/Dashboard'){
require 'models/admin_models/admindashboard.php';
}
else if($urix=='reddot/Admin/AdminDashboard'){
require 'models/rep_models/admindashboard_rep.php';
}
else if($urix=='reddot/Admin/Inventories'){
require 'models/admin_models/inventories.php';
}
else if($urix=='reddot/Admin/Books'){
require 'models/admin_models/books.php';
}
else if($urix=='reddot/Admin/InsertBooks'){
require 'models/admin_models/insertbooks.php';
}

else if($urix=='reddot/Admin/OrderBooks'){
require 'models/admin_models/orderbooks.php';
}
else if($urix=='reddot/Admin/InsertOrders'){
require 'models/admin_models/insertorders.php';
}
else if($urix=="reddot/Admin/DetailedOrder@$id"){
require "models/admin_models/detailedorder.php";	
}
else if($urix=="reddot/Admin/ReceivedBooks"){
	require "models/admin_models/received_books.php";	
	}
else if($urix=="reddot/Admin/ReceiveOrders"){
require "models/admin_models/receive_orders.php";	
}
else if($urix=="reddot/Admin/ViewDepots"){
require "models/admin_models/view_depots.php";	
}
else if($urix=='reddot/Admin/InsertDepot'){
require 'models/admin_models/insertdepots.php';
}
else if($urix=="reddot/Admin/ViewReps"){
require "models/admin_models/view_reps.php";	
}
else if($urix=='reddot/Admin/InsertRep'){
require 'models/admin_models/insertrep.php';
}
else if($urix=='reddot/Admin/InsertDistributed'){
require 'models/admin_models/insertdistributed.php';
}

else if($urix=='reddot/Admin/DistributeBooks'){
require 'models/admin_models/distributebooks.php';
}
else if($urix=='reddot/Admin/RequestBooks'){
require 'models/rep_models/requestbooks.php';
}
else if($urix=='reddot/Admin/InsertRequest'){
require 'models/rep_models/insertrequest.php';
}
else if($urix=='reddot/Admin/ApproveRepRequest'){
require 'models/admin_models/approvereprequest.php';
}
//Admin Routes end here
else if(($urix=='reddot/User/Logout') || ($urix=='reddot/Admin/Logout')){
require 'logout.php';	
}


/**end: routes **/
else{
	echo "You are accessing an unauthorised link";
}


?>
