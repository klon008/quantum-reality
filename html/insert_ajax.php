<?php
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
}

if (!$conn) {
	$err_msg = "conn_instertection failed: " . mysqli_conn_instertect_error();
} else {
	$sql = "INSERT INTO registered_users (name, email, comment, number_participants, contact_phone, date, work_schedule_fk) " .
	"VALUES ('$name', '$email', '$comment', '$number_participants', '$contact_phone', FROM_UNIXTIME($date), $shedule)";

	//$result = $conn->query($sql); //Вернет количество строк записанных
	if (mysqli_query($conn, $sql)) {
		$succ_msg = "Вы были успешно зарегистрированы!";
	} else {
		$err_msg = "Error: " . $sql . " errorFromSQL:" . mysqli_error($conn);
	}
}
$result_ajax = array(
	'errorMsg'   => $err_msg,
	'successMsg' => $succ_msg,
);
echo json_encode($result_ajax);
$conn->close();
exit();
?>
