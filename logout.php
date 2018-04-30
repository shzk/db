<?php
require('config.php');
unset($_SESSION['name']);
session_destroy();
header('Location: ' . HOST . 'index.php');
?>