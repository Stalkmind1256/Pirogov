<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"type="text/css" href="CSSs/appoitm.css">
    <title></title>
</head>
<body>
<div class="header"><h1>Поликлинника</h1></div>
<div class="menu"></div>
<form action="addiagn.php"  method="post">
    <h1></h1>
    <label>Название</label>
    <input type="text" name="name" placeholder="Введите название диагноза">
    <label>Информация</label>
    <input type="text" name="discription" placeholder="Введите информацию о диагнозе">
    <button class="btn">Добавить</button>
</form>

</body>
</html>