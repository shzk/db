<?php
require('config.php');
if(isset($_POST['cleancookie'])){
    $userName = '';
    $userCity = '';
    $expire = time() - 60*60*24*30;

    setcookie('user-name', $userName, $expire);
    setcookie('user-city', $userCity, $expire);
}

header('Location: ' . HOST . 'request.php')

?>