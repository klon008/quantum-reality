<?php
/**Конфиги коннекта для базы данных*/
ini_set('display_errors', 'On');
// Set up debug mode
define("DEBUG_MODE", true);

// Site root
//define("SITE_ROOT", "/");

// Location of web files on host
//define("HOST_WWW_ROOT", "/var/www/html");

// Database connection constants
define("DATABASE_HOST", "localhost");
define("DATABASE_USERNAME", "site");
define("DATABASE_PASSWORD", "midnightowl");
define("DATABASE_NAME", "rdb");

$conn = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
//$conn->set_charset('utf8'); //Если проблемы с кодировкой то включить!
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function mysqli_parse_array($in_array) {
	$result = array();
	while ($row = $in_array->fetch_assoc()) {
		$result[] = $row;
	}
	return $result;
}
?>