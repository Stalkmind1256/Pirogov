<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"type="text/css" href="CSSs/appoitm.css">
    <title>Добавить врача</title>
</head>
<body>
<div class="header"><h1>Поликлинника</h1></div>
<div class="menu"></div>
<form action="add.php"  method="post">
    <h1>Добавить врача</h1>
    <label>ФИО</label>
    <input type="text" name="fio" placeholder="Введите полное имя врача" required>
    <label>Специализация</label>
    <input type="text" name="specializations" placeholder="Введите Специализацию" required>
    <label>Номер телефона</label>
    <input type="text" name="number_of_phone" placeholder="Введите номер телефона" required>
    <label>Номер кабинета</label>
    <input type="text" name="number_of_cabinet" placeholder="Введите номер кабинета" required>
    <button class="btn">Добавить</button>
</form>

</body>
</html>
