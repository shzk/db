<?php 

require('config.php');
require('functions/login_functions.php');
// DB CONNECTION
require('database.php');
$link = db_connect();

require('models/films.php');
$errors = array();

if ( array_key_exists('add-film', $_POST) ) {
    // Обработка ошибок
    if ( $_POST['title'] == '') {
        $errors[] = "<p>Необходимо ввести название фильма!</p>";
    }
    if ( $_POST['genre'] == '') {
        $errors[] = "<p>Необходимо ввести жанр фильма!</p>";
    }
    if ( $_POST['year'] == '') {
        $errors[] = "<p>Необходимо ввести год фильма!</p>";
    }
    if ( $_POST['description'] == '') {
        $errors[] = "<p>Необходимо ввести описание фильма!</p>";
    }
    // Если ошибок нет - сохраняем фильм
    if ( empty($errors) ) {
        $result = new_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
        if ($result) {
            $resultSuccess = "<p>Фильм был успешно добавлен!</p>";
        } else {
            $resultError = "<p>Что то пошло не так. Добавьте фильм еще раз!</p>";
        } 
    }
}

include('views/head.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');