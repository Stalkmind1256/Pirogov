<?php
session_start();

$host = "localhost";
$port = "5432";
$dbname="postgres";
$user ="postgres";
$password ="123456789";

$connect = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

$fio = $_POST['fio'];
$date_of_birth = $_POST['date_of_birth'];
$number_of_phone = $_POST['number_of_phone'];
$passport = $_POST['passport'];


$query = "INSERT INTO public.patients (fio, date_of_birth,number_of_phone,passport) VALUES('" . pg_escape_string($fio) . "', '" . pg_escape_string($date_of_birth) . "', '" . pg_escape_string($number_of_phone) . "', '" . pg_escape_string($passport)."')";
pg_connect($connect,$query);




/*   if(empty($patient_name) || empty($patient_surname)){
       $eror = "Заполните поля";
   }else{
       $query = "SELECT * FROM patients WHERE patient_name = '".pg_escape_string($patient_name). "'";
       $result = pg_query($connect,$query);
       $patient = pg_fetch_assoc($result);
   }
   if ($patient) {
       // Пациент уже существует, выводим сообщение об ошибке
       $error = 'Клиент с таким именем уже зарегистрирован';
   } else {
       // Пациент не существует, добавляем его в базу
       $query = "INSERT INTO public.patients (patient_name, patient_surname) VALUES ('" . pg_escape_string($patient_name) . "', '" . pg_escape_string($patient_surname) . "', '" . "')";
       pg_query($connect,$query);
       header('Location: client.php');
   }
}
*/
?>