<?php

$errors = array();

// Удаление фильма
if ( @$_GET['action'] == 'delete') {
    $query = "DELETE FROM movies WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";

    mysqli_query($link, $query);

    if ( mysqli_affected_rows($link) > 0 ) {
        $resultInfo = "<p>Фильм был удален!</p>";
     } 
}


    <?php if ( @$resultSuccess != '' ) { ?> 
        <div class="info-success"><?=$resultSuccess?></div>
    <?php } ?>

    <?php if ( @$resultInfo != '' ) { ?> 
        <div class="info-notification"><?=$resultInfo?></div>
    <?php } ?>

    <?php if ( @$resultError != '' ) { ?> 
        <div class="error"><?=$resultError?></div>
    <?php } ?>





<?php

    // Удаление фильма
    if ( @$_GET['action'] == 'delete') {
        $query = "DELETE FROM movies WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";

        mysqli_query($link, $query);

        if ( mysqli_affected_rows($link) > 0 ) {
            $resultInfo = "<p>Фильм был удален!</p>";
         }
    }
?>