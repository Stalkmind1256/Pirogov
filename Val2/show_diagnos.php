<?php

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print '<link rel="stylesheet"type="text/css" href="CSS/showdiagn.css">';
print "<title>";
print "Список диагнозов";
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

$query = "SELECT * FROM public.diagnosis";

$res = pg_query($connect, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данныхо о диагнозах в браузер
echo "<table>";
echo "<tr><th></th><th>Название диагноза</th><th>Информация о диагнозе</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $name = $row['name'];
    $discription = $row['discription'];
    echo "<tr><td>$id</td><td>$name</td><td>$discription</td></tr>";
}
echo "</table>";


pg_close($connect);

print "</body>";
print "</html>";
