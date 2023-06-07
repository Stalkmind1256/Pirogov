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
<form action="add.php"  method="post">
    <h1></h1>
    <label>ФИО</label>
    <input type="text" name="fio" placeholder="Введите полное имя врача">
    <label>Специализация</label>
    <input type="text" name="specializations" placeholder="Введите Специализацию">
    <label>Номер телефона</label>
    <input type="text" name="number_of_phone" placeholder="Введите номер телефона">
    <label>Номер кабинета</label>
    <input type="text" name="number_of_cabinet" placeholder="Введите номер кабинета">
    <button class="btn">Добавить</button>
</form>

</body>
</html>