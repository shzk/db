<?php 
require('config.php');
require('functions/login_functions.php');
// DB CONNECTION
require('database.php');
$link = db_connect();

require('models/films.php');

// Удаление фильма
    if ( @$_GET['action'] == 'delete') {
        $result = film_delete($link, $_GET['id']);
        if ( $result ) {
        $resultInfo = "<p>Фильм был удален!</p>";
    } else {
        $resultError = "<p>Что-то пошло не так!</p>";
    }
    }

$films = films_all($link);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/index.tpl');
include('views/footer.tpl');
?>   