<?php
//session_start();
//session_destroy();
//header('Location: views/login.view.php');

require 'controllers/init.php';
$logout = $users->logout();
if($logout === true){
	header('Location: AuthLogin');
}

?>