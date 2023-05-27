<?php
$host = "localhost";
$port = "5432";
$dbname="poliklinnika";
$usrname="postgres";
$pword="123456";

$connect = pg_connect("host=$host port=$port dbname=$dbname username=$usrname passpord=$pword");

/*if(!$connect){
    echo("Ошибка подключения к базе данных");
}
else{
    echo "Успешное подключение к базе данных";
}
pg_close($connect);
?>
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $patient_name = $_POST['patient_name'];
    $patient_surname = $_POST['patient_name'];
    $patient_phone_number = $_POST['patient_name'];
    $patient_pasport = $_POST['patient_name'];
    $patient_data_appointment = $_POST['patient_name'];
    $patient_time_appointment = $_POST['patient_name'];

}


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