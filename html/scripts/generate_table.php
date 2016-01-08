<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/db_config.php";

echo "<div id=\"new_table\" class=\"row\"></div>";

$sql_shedule  = "SELECT id,text_shedule FROM work_schedule ORDER BY count_shedule ASC;"; //Результат
$sql_reserved = "SELECT id,date,work_schedule_fk FROM registered_users WHERE (date between CURDATE()-WEEKDAY(CURDATE())
 AND DATE_ADD(CURDATE()-WEEKDAY(CURDATE()), INTERVAL 21 DAY));";
$sql_reserved_holidays = "SELECT date FROM reserved_dates WHERE (date between CURDATE()-WEEKDAY(CURDATE())
 AND DATE_ADD(CURDATE()-WEEKDAY(CURDATE()), INTERVAL 21 DAY));";

$shedule_query           = $conn->query($sql_shedule);
$reserved_query          = $conn->query($sql_reserved);
$reserved_holidays_query = $conn->query($sql_reserved_holidays);

$result_shedule           = mysqli_parse_array($shedule_query);
$result_reserved_holidays = mysqli_parse_array($reserved_holidays_query);
$result_reserved          = mysqli_parse_array($reserved_query);

$date = strtotime(date('Y-m-d'));

echo '<script language="javascript">
var selectedGame = \'\';
var shedule = ' . json_encode($result_reserved) . ';
shedule = shedule.map(function (value) {
        value.date = moment(value.date).format(\'DD.MM.YYYY\');
        return value;
    });
var workTimes = ' . json_encode($result_shedule) . ';
var holidays = ' . json_encode($result_reserved_holidays) . '.map(function (value) {
        return value.date = moment(value.date).format(\'DD.MM.YYYY\');
    });
firstRender();</script>';

mysqli_free_result($shedule_query);
mysqli_free_result($reserved_query);

?>