<?php
// Getting all films from DB
function films_all($link) {
    $query = "SELECT * FROM movies";
    $films = array();
    $result = mysqli_query($link, $query);
    if ( $result = mysqli_query($link, $query) ) {
        while ( $row = mysqli_fetch_array($result)  ) {
            $films[] = $row;
        }
    }
    return $films;
}

function new_film($link, $title, $genre, $year, $description) {
    $query = "INSERT INTO movies (name, genre, year, description) VALUES (
        '". mysqli_real_escape_string($link, $title) ."', 
        '". mysqli_real_escape_string($link, $genre) ."', 
        '". mysqli_real_escape_string($link, $year) ."',
        '". mysqli_real_escape_string($link, $description) ."'
        )";
    if ( mysqli_query($link, $query) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function get_film($link, $id) {
    // Getting film from DB
    $query = "SELECT * FROM movies WHERE id = ' " . mysqli_real_escape_string($link, $id) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    if ( $result = mysqli_query($link, $query) ) {
        $film = mysqli_fetch_array($result);
    }
    return $film;
}

function film_update($link, $title, $genre, $year, $description, $id) {
    if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
        $fileName = $_FILES['photo']['name'];
        $fileTmpLoc = $_FILES['photo']['tmp_name'];
        $fileType = $_FILES['photo']['type'];
        $fileSize = $_FILES['photo']['size'];
        $fileErrorMsg = $_FILES['photo']['error'];
        $kaboom = explode('.', $fileName);
        $fileExt = end($kaboom);

        list($width, $height) = getimagesize($fileTmpLoc);
        if ($width < 10 || $height < 10) {
            $errors[] = 'Image has no dimensions :(';
        }

        $db_file_name = rand(100000000000,999999999999).'.'.$fileExt;

        if ($fileSize > 10485760) {
            $errors[] = 'Image is TOO BIG :(';
        } elseif (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
            $errors[] = 'Image should be one of (gif|jpg|jpeg|png) :(';
        } elseif ($fileErrorMsg == 1) {
            $errors[] = 'Unknow eRr0r :(';
        }

        $photoFolderLocation = ROOT . 'data/films/full/';
        $photoFolderLocationMin = ROOT . 'data/films/min/';
        // $photoFolderLocationFull = ROOT . 'data/films/full/';

        $uploadFile = $photoFolderLocation . $db_file_name;
        $moveResult = move_uploaded_file($fileTmpLoc, $uploadFile);

        if ($moveResult != true) {
            $errors[] = 'File upload failed! :(';
        }

        require_once(ROOT . 'functions/image_resize_imagick.php');
        $targetFile = $photoFolderLocation . $db_file_name;
        $resizedFile = $photoFolderLocationMin . $db_file_name;
        $wmax = 137;
        $hmax = 200;
        $img = createThumbnail($targetFile, $wmax, $hmax);
        $img->writeImage($resizedFile);


    }
    // Запись данных в БД 
    $query = "  UPDATE movies 
                SET name = '". mysqli_real_escape_string($link, $title) ."', 
                    genre = '". mysqli_real_escape_string($link, $genre) ."', 
                    year = '". mysqli_real_escape_string($link, $year) ."',
                    description = '". mysqli_real_escape_string($link, $description) ."', 
                    photo = '". mysqli_real_escape_string($link, $db_file_name) ."' 
                    WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";
    if ( mysqli_query($link, $query) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function film_delete($link, $id) {
    $query = "DELETE FROM movies WHERE id = ' " . mysqli_real_escape_string($link, $id) . "' LIMIT 1";
    mysqli_query($link, $query);

    if ( mysqli_affected_rows($link) > 0 ) {
        $resultInfo = "<p>Фильм был удален!</p>";
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
?>