
<?php
// код для подключения к базе данных
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456789";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Ошибка: Не удалось подключиться к базе данных (pg_connect)!");
}

$pats = array();
$query = "SELECT id, fio, date_of_birth, number_of_phone, passport FROM public.patients";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $pats[$row['id']] = array($row['fio'], $row['date_of_birth'], $row['number_of_phone'], $row['passport']);
    }
}

$doc = array();
$query = "SELECT id, fio, specializations, number_of_phone, number_of_cabinet FROM public.doctors";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $doc[$row['id']] = array($row['fio'], $row['specializations'], $row['number_of_phone'], $row['number_of_cabinet']);
    }
}

$dgn = array();
$query = "SELECT id, name, discription FROM public.diagnosis";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $dgn[$row['id']] = array($row['name'], $row['discription']);
    }
}

// Закрываем соединение с базой данных
pg_close($conn);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Добавление приема</title>
</head>
<body>
<div class="page-header">
    <button onclick="window.location.href='index.php'" class="head">Вернуться в меню</button>
</div>

<div class="content">
    <h2>Добавить прием</h2>
    <form method="post">
        <div class="input_pat">
            <label for="tech">Пациент:</label>
            <select name="tech" id="tech" required>
                <?php //Вывод уже готовых клиентов
                foreach ($pats as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input_doc">
            <label for="client">Врач:</label>
            <select name="client" id="client"  required>
                <?php //Вывод уже готовых клиентов
                foreach ($doc as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input_dgn">
            <label for="client">Диагноз:</label>
            <select name="diagnosis" id="diagnosis"  required>
                <?php //Вывод уже готовых клиентов
                foreach ($dgn as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input_time">
            <label for="time">Время:</label>
            <input type="time" name="time"  required>
        </div>

        <div class="input_time">
            <label for="date">Дата:</label>
            <input type="date" name="date"  required>
        </div>

        <input type="submit" value="Добавить">
    </form>
</div>
</body>
</html>