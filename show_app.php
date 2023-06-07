<?php
error_reporting(E_ALL);

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print "<title>";
print "Приемы";
print "</title>";
print "</head>";
print "<body>";

$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456789";

$connect = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connect) {
    die("Ошибка: Не удалось подключиться к базе данных");
}

$query = "SELECT * FROM public.appointment";

$res = pg_query($connect, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данных в браузер
echo "<table>";
echo "<tr><th></th><th>id</th><th>id_pat</th><th>id_doc</th><th>Дата</th><th>Время</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $id_patients = $row['id_patients'];
    $id_doctors = $row['id_doctors'];
    $date = $row['date'];
    $time = $row['time'];
    echo "<tr><td>$id</td><td>$id_patients</td><td>$id_doctors</td><td>$date</td><td>$time</td></tr>";
}
echo "</table>";


pg_close($connect);

print "</body>";
print "</html>";