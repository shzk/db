<h1>Укажите ваши данные:</h1>
<form action="setcookie.php" method="POST">
    <label class="label-title">Ваше имя</label>
    <input class="input" type="text" placeholder="Введите имя" name="user-name"/>

    <label class="label-title">Ваш город</label>
    <input class="input" type="text" placeholder="Введите город" name="user-city"/>

    <input type="submit" class="button" value="Сохранить" name="user-submit">
</form>
<form action="unsetcookie.php" method="POST" class="mt-30">
    <input type="submit" class="button button--delete" value="Очистить куки" name="cleancookie">
</form>