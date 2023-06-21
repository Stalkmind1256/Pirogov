<?php
// Подключение к базе данных
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456789";

$connect = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if(!$connect){
    die("Ошибка: Не удалось подключиться к базе данных");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fio = $_POST['fio'];
    $date_of_birth = $_POST['date_of_birth'];
    $number_of_phone = $_POST['number_of_phone'];
    $passport = $_POST['passport'];
    // Проверяем наличие пациента с таким же ФИО
    $query = "SELECT COUNT(*) FROM public.patients WHERE fio = '$fio'";
    $res = pg_query($connect, $query);
    $row = pg_fetch_row($res);
    if ($row[0] == 0) { // Если пациента с таким ФИО нет, то добавляем его в базу данных
        $query = "INSERT INTO public.patients (fio, date_of_birth,number_of_phone,passport) VALUES('$fio','$date_of_birth','$number_of_phone','$passport')";
        $res = pg_query($connect,$query);
        if ($res){
            echo "<script>alert('Пациент успешно добавлен!');</script>";
        }else{
            echo "<script>alert('Ошибка');</script>";
        }
    } else { // Иначе выводим сообщение об ошибке
        echo "<script>alert('Пациент с таким ФИО уже существует!');</script>";
    }
}
echo "<script>location.href='index.php';</script>";
pg_close($connect);
?>
