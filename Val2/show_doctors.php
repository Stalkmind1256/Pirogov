<?php

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print "<title>";
print "Врачи";
print "</title>";
print "</head>";
print "<body>";

$host = "localhost";
$port = "5432";
$dbname = "poliklinnika";
$user = "postgres";
$password = "123456789";

$connect = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connect) {
    die("Ошибка: Не удалось подключиться к базе данных");
}

$query = "SELECT * FROM public.doctors";

$res = pg_query($connect, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данных о врачах в браузер списком
echo "<table>";
echo "<tr><th></th><th>ФИО</th><th>Специализация</th><th>Телефон</th><th>Кабинет</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $fio = $row['fio'];
    $specializations = $row['specializations'];
    $number_of_phone = $row['number_of_phone'];
    $number_of_cabinet = $row['number_of_cabinet'];
    echo "<tr><td>$id</td><td>$fio</td><td>$specializations</td><td>$number_of_phone</td><td>$number_of_cabinet</td></tr>";
}
echo "</table>";


pg_close($connect);

print "</body>";
print "</html>";
