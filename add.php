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
    //Проверяем наличие врача с таким же ФИО
    $query = "SELECT COUNT(*) FROM public.doctors WHERE fio = '$fio'";
    $res = pg_query($connect,$query);
    $row = pg_fetch_row($res);
    if($row[0] == 0){ // Если врача с таким именем не существует, то добавить в БД
        $query = "INSERT INTO public.doctors(fio,specializations,number_of_phone,number_of_cabinet) VALUES('$fio','$specializations','$number_of_phone','$number_of_cabinet')";
        $res = pg_query($connect,$query);
        if($res){
            echo "<script>alert('Врач успешно добавлен!');</script>";
        }else{
            echo "<script>alert('Ошибка');</script>";
        }
    }else{
        echo "<script>alert('Пациент с таким ФИО уже существует!');</script>";
    }
}
echo "<script>location.href='index.php';</script>";
pg_close($connect);
?>