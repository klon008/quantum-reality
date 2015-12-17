<?php

function map_format_date($in_row) {
	$in_row['date'] = strtotime($in_row['date']);
	return $in_row;
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/db_config.php";

echo "<div id=\"new_table\" class=\"row\"></div>";

$sql_shedule  = "SELECT id,text_shedule FROM work_schedule ORDER BY count_shedule ASC;"; //Результат
$sql_reserved = "SELECT id,date,work_schedule_fk FROM registered_users WHERE (date between CURDATE()-WEEKDAY(CURDATE())
 AND DATE_ADD(CURDATE()-WEEKDAY(CURDATE()), INTERVAL 21 DAY));";
$shedule_query  = $conn->query($sql_shedule);
$reserved_query = $conn->query($sql_reserved);

$result_shedule         = mysqli_parse_array($shedule_query);
$result_reserved        = mysqli_parse_array($reserved_query);
$result_reserved_mapped = array_map("map_format_date", $result_reserved);

$date = strtotime(date('Y-m-d'));

echo '<script language="javascript">
var selectedGame = \'\';
var shedule = ' . json_encode($result_reserved_mapped) . ';
var workTimes = ' . json_encode($result_shedule) . ';
var currentWeekDay = new Date(' . $date * 1000 . ');
firstRender();</script>';

mysqli_free_result($shedule_query);
mysqli_free_result($reserved_query);

?>