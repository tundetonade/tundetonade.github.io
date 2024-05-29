<?php
require 'controllers/init.php';

if (empty($_POST) === false) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $uriz = $_POST['uri'];

    if (empty($email) === true || empty($password) === true) {
        $linkz = explode('/', $uriz);
        $link = end($linkz);
        $_SESSION['fail'] = "Email or Password Cannot Be Empty";
        header("Location: $link");
    } else {
        $admindet = $users->selectById('users', 'email', $email);
        $type = $admindet['type'];
        
        if ($type == 'super') {
            $login = $users->login($email, $password);
        } else {
            $login = $users->loginAdmin($email, $password);
        }

        if ($login === false) {
            $linkz = explode('/', $uriz);
            $link = end($linkz);
            $_SESSION['fail'] = "Invalid Login Details";
            header("Location: $link");
        } elseif ($login['status'] != "1") {
            $linkz = explode('/', $uriz);
            $link = end($linkz);
            $_SESSION['fail'] = "Your account is not yet activated. Please check your registered email for the activation link.";
            header("Location: $link");
        } else {
            $_SESSION['user_'] = $login;
            if ($login['type'] == 'Rep') {
                header("Location: AdminDashboard");
            } elseif ($login['type'] == 'super' || $login['usertype'] == 'corporate') {
                header("Location: Dashboard");
            }
        }
    }
}
?>
