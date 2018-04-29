<?php if ( @$resultSuccess != '' ) { ?> 
    <div class="info-success"><?=$resultSuccess?></div>
<?php } ?>

<?php if ( @$resultInfo != '' ) { ?> 
    <div class="info-notification"><?=$resultInfo?></div>
<?php } ?>

<?php if ( @$resultError != '' ) { ?> 
    <div class="error"><?=$resultError?></div>
<?php } ?>
    <div class="panel-holder mt-80 mb-100">
        <div class="title-4 mt-0">Добавить фильм</div>

            <form action="new.php" method="POST">

                <?php 
                if ( !empty($errors)) {
                    foreach ($errors as $key => $value) {
                    echo "<div class='error'>$value</div>";
                    }
                }
                ?>

                <label class="label-title">Название фильма</label>
                <input class="input" type="text" placeholder="Такси 2" name="title"/>
                <div class="row">
                    <div class="col">
                        <label class="label-title">Жанр</label>
                        <input class="input" type="text" placeholder="комедия" name="genre"/>
                    </div>
                    <div class="col">
                        <label class="label-title">Год</label>
                        <input class="input" type="text" placeholder="2000" name="year"/>
                    </div>
                </div>
                <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"></textarea>
                <input type="submit" class="button" value="Добавить" name="add-film">
            </form>

    </div>
</div>