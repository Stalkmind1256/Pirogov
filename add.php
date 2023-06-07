<?php
// Подсключение к базе данных
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456789";

$connect = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connect) {
    die("Ошибка: Не удалось подключиться к базе данных");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fio = $_POST['fio'];
    $specializations = $_POST['specializations'];
    $number_of_phone = $_POST['number_of_phone'];
    $number_of_cabinet = $_POST['number_of_cabinet'];
}
$query = "INSERT INTO public.doctors (fio, specializations,number_of_phone,number_of_cabinet) VALUES('$fio','$specializations','$number_of_phone','$number_of_cabinet')";
//$query = "INSERT INTO public.patients (fio, date_of_birth,number_of_phone,passport) VALUES('" . pg_escape_string($fio) . "', '" . pg_escape_string($date_of_birth) . "', '" . pg_escape_string($number_of_phone) . "', '" . pg_escape_string($passport)."')";
$res = pg_query($connect, $query);
if ($res) {
    echo "<script>alert('Врач успешно добавлен!');</script>";
} else {
    echo "<script>alert('Ошибка');</script>";
}
echo "<script>location.href='index.php';</script>";
//header('Location: index.php');
pg_close($connect);

?>
