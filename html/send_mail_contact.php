<?php
require_once "app_config.php";
require_once "db_config.php";
$err_msg  = "";
$succ_msg = "";

function en($in_str_val) {
	return "'" . mysql_escape_string($in_str_val) . "'";
}

if (isset($_POST['dater'])) {
	$data          = json_decode($_POST['dater'], true);
	$name          = $data['name'];
	$email         = $data['email'];
	$comment       = $data['comment'];
	$captcha       = $data['captcha'];
	$contact_phone = $data['contactPhone'];
}

/**Проверка капчи*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/captcha/securimage.php';
$securimage = new Securimage();
if ($securimage->check($captcha) == false) {
	$err_msg = 'Вы неверно указали код безопасности на картинке';
} else {
	/**На ВСЯКИЙ случай веду лог сообщений в базе данных*/
	if (!$conn) {
		$err_msg = "conn_instertection failed: " . mysqli_conn_instertect_error();
	} else {
		$sql = "INSERT INTO comment_email (name, email, comment, contact_phone) " .
		"VALUES ('$name', '$email', '$comment', '$contact_phone')";

		//$result = $conn->query($sql); //Вернет количество строк записанных
		if (mysqli_query($conn, $sql)) {
			$succ_msg = "Сообщение успешно отправлено!";
		} else {
			$err_msg = "Error: " . $sql . " errorFromSQL:" . mysqli_error($conn);
		}
	}

	$conn->close();
	/**Адрес на который будет отстукивать почта*/
	$to = "<seletckov.p@yandex.ru>";
	/**Тема письма*/
	$subject = "Обратная связь с сайта quantum reality";
	/**Текст письма*/
	$message = "<html>

<head>
    <title>Обратная связь с сайта Quantum Reality</title>
</head>

<body>
    <h1><a href=\"mailto:{$email}\"><strong>{$email}</strong></a></h1>
    <h2>{$name} :</h2>
    <p>{$comment}</p>
    <hr/>
    <a href=\"tel:{$contact_phone}\">
        <p><small>{$contact_phone}</small></p>
    </a>
</body>

</html>";

	$headers = "Content-type: text/html; charset=utf-8 \r\n";
/* дополнительные шапки */
	$headers .= "From: Quantum Reality <klon.asuss.comm@mail.ru>\r\n";

	mail(SITE_ADMIN_EMAIL, $subject, $message, $headers);
}
$result_ajax = array(
	'errorMsg'   => $err_msg,
	'successMsg' => $succ_msg,
);
echo json_encode($result_ajax);
exit();
?>