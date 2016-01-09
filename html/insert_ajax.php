<?php
/**Служебный скрипт для Аякса*/
require_once "app_config.php";
require_once "db_config.php";
$err_msg  = "";
$succ_msg = "";

function en($in_str_val) {
	return "'" . mysql_escape_string($in_str_val) . "'";
}

if (isset($_POST['dater'])) {
	$data                = json_decode($_POST['dater'], true); // мини-защита - приводим к типу INT
	$name                = $data['name'];
	$date                = $data['date'];
	$email               = $data['email'];
	$comment             = $data['comment'];
	$shedule             = $data['shedule'];
	$contact_phone       = $data['contactPhone'];
	$number_participants = $data['numberParticipants'];
	$selected_game       = $data['selected_game'];
}

if (!$conn) {
	$err_msg = "conn_instertection failed: " . mysqli_conn_instertect_error();
} else {
	$sql = "INSERT INTO registered_users (name, email, comment, number_participants, contact_phone, date, work_schedule_fk, selected_game) " .
	"VALUES ('$name', '$email', '$comment', '$number_participants', '$contact_phone', FROM_UNIXTIME('$date'), $shedule, $selected_game)";

	//$result = $conn->query($sql); //Вернет количество строк записанных
	if (mysqli_query($conn, $sql)) {
		$succ_msg = "Вы были успешно зарегистрированы!";
	} else {
		$err_msg = "Error: " . $sql . " errorFromSQL:" . mysqli_error($conn);
	}
}

/**Вытащим текст расписания*/
$sql          = "SELECT text_shedule FROM work_schedule WHERE id = " . $shedule;
$res_sql      = $conn->query($sql);
$shedule_name = mysqli_parse_array($res_sql);

$sql       = "SELECT game_name FROM game_list WHERE id = " . $selected_game;
$res_sql   = $conn->query($sql);
$game_name = mysqli_parse_array($res_sql);

$formated_date = date('d-m-Y', $date);

$result_ajax = array(
	'errorMsg'   => $err_msg,
	'successMsg' => $succ_msg,
);
echo json_encode($result_ajax);

$to = "<seletckov.p@yandex.ru>";
/**Тема письма*/
$subject = "Новый заказ Quantum-reality";
/**Текст письма*/
$message = "<html>

<head>
    <title>Обратная связь с сайта Quantum Reality</title>
</head>

<body>
    <h2>Имя:</h2>
    <p>{$name}</p>
    <h2>Реквизиты:</h2>
    <a href=\"tel:{$contact_phone}\">
        <p><small>{$contact_phone}</small></p>
    </a>
    <a href=\"mailto:{$email}\">
    	<p><small>{$email}</small></p>
    </a>
    <h3>Название игры</h3>
    <p>{$game_name[0]['game_name']}</p>
    <h3>Количество персон</h3>
    <p>
    {$number_participants}
    </p>
    <h3>Комментарий</h3>
    <p>
    {$comment}
    </p>
    <h3>Дата</h3>
    <p>
    {$formated_date}<br/>
    {$shedule_name[0]['text_shedule']}
    </p>
</body>

</html>";

$headers = "Content-type: text/html; charset=utf-8 \r\n";
/* дополнительные шапки */
$headers .= "From: Quantum_Reality\r\n";

mail(SITE_ADMIN_EMAIL, $subject, $message, $headers);
$conn->close();
exit();
?>
