
<?php
// код для подключения к базе данных
$host = "localhost";
$port = "5432";
$dbname = "poliklinnika";
$user = "postgres";
$password = "123456789";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Ошибка: Не удалось подключиться к базе данных (pg_connect)!");
}

//Выборка из массива пациентов
$pats = array();
$query = "SELECT id, fio, date_of_birth, number_of_phone, passport FROM public.patients";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $pats[$row['id']] = array($row['fio'], $row['date_of_birth'], $row['number_of_phone'], $row['passport']);
    }
}

//Выборка из массива докторов
$doc = array();
$query = "SELECT id, fio, specializations, number_of_phone, number_of_cabinet FROM public.doctors";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $doc[$row['id']] = array($row['fio'], $row['specializations'], $row['number_of_phone'], $row['number_of_cabinet']);
    }
}

//Выборка из массива диагнозов
$dgn = array();
$query = "SELECT id, name, discription FROM public.diagnosis";
$result = pg_query($conn, $query);
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $dgn[$row['id']] = array($row['name'], $row['discription']);
    }
}

//Добавление в таблицу данных из выпадающих списков
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_patients = $_POST['patient'];
    $id_doctors = $_POST['doctors'];
    $date = strtotime($_POST['date']);
    $time = strtotime($_POST['time']);
    $diagn_id = isset($_POST['diagn_id']) ? $_POST['diagn_id'] : array();

    foreach($diagn_id as $id_diagnosis) {
        $query = "INSERT INTO public.app_id(id_patients, id_diagnosis) VALUES ($id_patients, $id_diagnosis)";
        $result = pg_query($conn, $query);
    }

    $query = "INSERT INTO public.appointment(id_patients, id_doctors, date, time) VALUES ($id_patients, $id_doctors,to_timestamp($date), to_timestamp($time))";

    $result = pg_query($conn, $query);

    if(!$result){
        echo pg_last_error($conn);
    } else {
        echo "Данные успешно добавлены.";
    }
}

pg_close($conn);
?>



<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet"type="text/css" href="CSS/showapp.css">
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
            <label for="patient">Пациент:</label>
            <select name="patient" id="patient" required>
                <?php //Вывод уже готовых пациентов
                foreach ($pats as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0] ." ".$name[1]." ".$name[2]." ".$name[3]. "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input_doc">
            <label for="doctors">Врач:</label>
            <select name="doctors" id="doctors"  required>
                <?php //Вывод уже добавленных врачей
                foreach ($doc as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0] ." ".$name[1]." ".$name[2]." ".$name[3]. "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input_dgn">
            <label for="client">Диагноз:</label>
            <select multiple name="diagnosis" id="diagnosis"  required>
                <?php //Вывод уже готовых клиентов
                foreach ($dgn as $id => $name) {
                    echo "<option value=\"" . $id . "\">" . $name[0]." ".$name[1]. "</option>";
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
