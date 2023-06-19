<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"type="text/css" href="CSSs/appoitm.css">
    <title>Добавить пациента</title>
</head>
<body>
<div class="header"><h1>Поликлинника</h1></div>
<div class="menu"></div>
<form action="signin.php"  method="post">
    <h1>Добавить пациента</h1>
    <label>ФИО</label>
    <input type="text" name="fio" placeholder="Введите свое полное имя"  required>
    <label>Дата рождения</label>
    <input type="text" name="date_of_birth" placeholder="Введите свою дату рождения" required>
    <label>Номер телефона</label>
    <input type="text" name="number_of_phone" placeholder="Введите свой номер телеофна"  required>
    <label>Паспорт</label>
    <input type="text" name="passport" placeholder="Введите номер паспорта" required>
    <button class="btn">Добавить</button>
</form>

</body>
</html>
