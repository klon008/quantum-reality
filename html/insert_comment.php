<?php
require_once "db_config.php";
$err_msg  = "";
$succ_msg = "";

function en($in_str_val) {
	return "'" . mysql_escape_string($in_str_val) . "'";
}

if (isset($_POST['dater'])) {
	$data    = json_decode($_POST['dater'], true); // мини-защита - приводим к типу INT
	$author  = $data['name'];
	$comment = $data['comment'];
	$quality = $data['rating'];
}

if (!$conn) {
	$err_msg = "conn_instertection failed: " . mysqli_conn_instertect_error();
} else {
	$sql = "INSERT INTO recent_reviews (author, comment, quality) " .
	"VALUES ('$author', '$comment', '$quality')";

	//$result = $conn->query($sql); //Вернет количество строк записанных
	if (mysqli_query($conn, $sql)) {
		$succ_msg = "Ваш комментарий был успешно добавлен!";
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
