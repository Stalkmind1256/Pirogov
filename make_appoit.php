<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"type="text/css" href="CSS/appoitm.css">
    <title>Запись на прием</title>
</head>
<body>
<div class="header"><h1>Поликлинника</h1></div>
<div class="menu"></div>
<form action="signin.php"  method="post">
    <h1>Регистрация</h1>
    <label>ФИО</label>
    <input type="text" name="fio" placeholder="Введите свое полное имя">
    <label>Дата рождения</label>
    <input type="text" name="date_of_birth" placeholder="Введите свою дату рождения">
    <label>Номер телефона</label>
    <input type="text" name="number_of_phone" placeholder="Введите свой номер телеофна">
    <label>Паспорт</label>
    <input type="text" name="passport" placeholder="Введите номер паспорта">
    <button class="btn">Записаться</button>
</form>

</body>
</html>




?>












<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"type="text/css" href="CSS/appoitm.css">
    <title>Document</title>
</head>
<body>
<div class="header"><h1>Поликлинника</h1></div>
<div class="menu"></div>
<form method="post">
    <h1>Регистрация</h1>
    <label for="patient_name">Имя</label>
    <input type="text" id="patient_name" name="patient_name" required>
    <label for="patient_surname">Фамилия</label>
    <input type="text" id="patient_surname" surname="patient_surname" required>
    <label for="patient_phone_number">Номер телефона</label>
    <input type="text" id="patient_phone_number" phone="patient_phone_number" required>
    <label for="patient_pasport">Паспорт</label>
    <input type="text" id="patient_pasport" pasport="patient_pasport" required>
    <label for="patient_data_appointment">Дата</label>
    <input type="text" id="patient_data_appointment" data="patient_data_appointment" required>
    <label for="patient_time_appointment">Время</label>
    <input type="text" id="patient_time_appointment" time="patient_time_appointment" required>
    <input type="submit" value="Записаться на прием">
</form>

</body>
</html>