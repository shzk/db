<h1 class="title-1">Фильм <?=$film['name']?></h1>
<div class="panel-holder mt-80 mb-100">
    <div class="title-4 mt-0">Редактировать фильм</div>

    <form enctype="multipart/form-data" action="edit.php?id=<?=$film['id']?>" method="POST">

        <?php 
        if ( !empty($errors)) {
            foreach ($errors as $key => $value) {
            echo "<div class='error'>$value</div>";
            }
        }
        ?>

        <label class="label-title">Название фильма</label>
        <input class="input" type="text" placeholder="Такси 2" name="title" value="<?=$film['name']?>" />
        <div class="row">
            <div class="col">
                <label class="label-title">Жанр</label>
                <input class="input" type="text" placeholder="комедия" name="genre" value="<?=$film['genre']?>"/>
            </div>
            <div class="col">
                <label class="label-title">Год</label>
                <input class="input" type="text" placeholder="2000" name="year" value="<?=$film['year']?>"/>
            </div>
        </div>
        <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"><?=$film['description']?></textarea>
        <div class="mb-20">
            <input type="file" name="photo"/>
        </div>
        <input type="submit" class="button" value="Обновить информацию" name="update-film">
    </form>

</div>
    <div class="mb-100">
        <a href="index.php" class="button">Вернуться на главную</a>
    </div>
</div>