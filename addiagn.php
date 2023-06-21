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
    $name = $_POST['name'];
    $discription = $_POST['discription'];

    // Проверяем, есть ли уже такой диагноз c таким названием в базе данных
    $query_check = "SELECT COUNT(*) FROM public.diagnosis WHERE name = '$name' AND discription = '$discription'";
    $res_check = pg_query($connect, $query_check);
    $count = pg_fetch_row($res_check)[0];
    if ($count > 0) {
        echo "<script>alert('Такой диагноз уже существует в базе данных!');</script>";
        echo "<script>location.href='index.php';</script>";
        exit();
    }
}

$query = "INSERT INTO public.diagnosis (name, discription) VALUES('$name','$discription')";
$res = pg_query($connect, $query);
if ($res) {
    echo "<script>alert('Диагноз успешно добавлен!');</script>";
} else {
    echo "<script>alert('Ошибка');</script>";
}
echo "<script>location.href='index.php';</script>";
//header('Location: index.php');
pg_close($connect);

?>
