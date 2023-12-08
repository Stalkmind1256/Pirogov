<?php

print "<html>";
print "<head>";
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
print "<title>";
print "Лист пациентов";
print "</title>";
print '<link rel="stylesheet" type="text/css" href="CSS/patient.css">';
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

$perPage = 5; // Количество строк на странице
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Текущая страница

$query = "SELECT * FROM public.patients";
$result = pg_query($connect, $query);

if (!$result) {
    die("Ошибка: Не удалось выполнить запрос (pg_query)!");
}

$totalRows = pg_num_rows($result); // Общее количество строк
$totalPages = ceil($totalRows / $perPage); // Общее количество страниц

// Рассчитываем ограничения для текущей страницы
$offset = ($page - 1) * $perPage;

$query .= " LIMIT $perPage OFFSET $offset";
$result = pg_query($connect, $query);

// вывод данных о пациентах в браузер списком
print "<table>";
print "<tr><th>№</th><th>ФИО</th><th>Дата рождения</th><th>Телефон</th><th>Паспорт</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    $id = $row['id'];
    $fio = $row['fio'];
    $date_of_birth = $row['date_of_birth'];
    $number_of_phone = $row['number_of_phone'];
    $passport = $row['passport'];
    print "<tr><td>$id</td><td>$fio</td><td>$date_of_birth</td><td>$number_of_phone</td><td>$passport</td></tr>";
}
echo "</table>";

// Вывод пагинации
print "<ul>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<li><a href='?page=$i'>$i</a></li>";
}
print "</ul>";

pg_close($connect);

print "</body>";
print "</html>";
