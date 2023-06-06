<?php
error_reporting(E_ALL);

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print "<title>";
print "Пациенты";
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

$query = "SELECT * FROM public.patients";

$res = pg_query($connect, $query);

if (!$res) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

// вывод данных в браузер
echo "<table>";
echo "<tr><th></th><th>ФИО</th><th>дата рождения</th><th>Телефон</th><th>Паспорт</th></tr>";

while ($row = pg_fetch_assoc($res)) {
    $id = $row['id'];
    $fio = $row['fio'];
    $date_of_birth = $row['date_of_birth'];
    $number_of_phone = $row['number_of_phone'];
    $passport = $row['passport'];
    echo "<tr><td>$id</td><td>$fio</td><td>$date_of_birth</td><td>$number_of_phone</td><td>$passport</td></tr>";
}
echo "</table>";


pg_close($connect);

print "</body>";
print "</html>";
