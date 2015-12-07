<?php
/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = array(
	'main'        => true,
	'notify'      => true,
	'formhelpers' => true,
	'validator'   => true,
	'stars'       => true,
	'renderjs'    => true,
);
display_head("Quantum Reality", $bootstrap);
echo "<body>";
echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generete_navigation.php";
display_navigation("main");

/**Список проектов*/
require_once "scripts/generete_projects_list.php";
$projects = array(
	0 => array(
		"name" => "Аномалия",
		"link" => "/images/anomaly_2.jpg",
	),
	1 => array(
		"name" => "Мафия",
		"link" => "/images/mafia.jpg",
	),
	2 => array(
		"name" => "Oculus Rift",
		"link" => "/images/virtual.jpg",
	),
);
display_projects_lost($projects);

echo "<div id=\"new_table\" class=\"row\"></div>";

require_once "db_config.php";
require_once "scripts/insert_row.php";

$sql_shedule  = "SELECT id,text_shedule FROM work_schedule ORDER BY count_shedule ASC;"; //Результат
$sql_reserved = "SELECT id,date,work_schedule_fk FROM registered_users WHERE (date between CURDATE()-WEEKDAY(CURDATE())
 AND DATE_ADD(CURDATE()-WEEKDAY(CURDATE()), INTERVAL 7 DAY));";
$shedule_query  = $conn->query($sql_shedule);
$reserved_query = $conn->query($sql_reserved);

$result_shedule         = mysqli_parse_array($shedule_query);
$result_reserved        = mysqli_parse_array($reserved_query);
$grid_title             = json_encode(generete_dates());
$result_reserved_mapped = array_map("map_format_date", $result_reserved);

print '<script language="javascript">firstRender(' . json_encode($result_reserved_mapped) .
', ' . $grid_title . ', ' . json_encode($result_shedule) . ');</script>';

mysqli_free_result($shedule_query);
mysqli_free_result($reserved_query);

require_once "scripts/generate_recent_reviews.php";
generate_recent_reviews($conn);
require "scripts/generate_modal.php";
display_footer();
$conn->close();
?>