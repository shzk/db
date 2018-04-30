<?php
require('config.php');
require('functions/login_functions.php');
if(isset($_POST['admin-login'])) {
    $userName = 'admin';
    $userPassword = '123';

    if ($_POST['login'] == $userName) {
        if ($_POST['password'] == $userPassword) {
            $_SESSION['user'] = 'admin';
            header('Location: ' . HOST . 'index.php');
        }
    }
}
include('views/head.tpl');
include('views/notifications.tpl');
include('views/login.tpl');
include('views/footer.tpl');
?>