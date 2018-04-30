<?php
require('config.php');
if(isset($_POST['user-submit'])){
    $expire = time() + 60*60*24*30;
    
    if(isset($_POST['user-name'])) {
        $userName = $_POST['user-name'];
        setcookie('user-name', $userName, $expire);
    }

    if(isset($_POST['user-city'])) {
        $userCity = $_POST['user-city'];
        setcookie('user-city', $userCity, $expire);
    }
}

header('Location: ' . HOST . 'request.php')

?>