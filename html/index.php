<?php
/**Главная*/
require_once "app_config.php";
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
require_once "scripts/generate_navigation.php";
display_navigation("main");

/**Список проектов*/
require_once "scripts/generate_projects_list.php";
require_once "db_config.php";

/**Новые Квесты*/
$sql_get_quest = "SELECT id, game_name, image_link FROM game_list ORDER BY id DESC LIMIT 3";
$quest_query   = $conn->query($sql_get_quest);
$result_quest  = mysqli_parse_array($quest_query);
display_projects_lost($result_quest);

/*Таблицу подтягиваем*/
require "scripts/generate_table.php";

require_once "scripts/generate_recent_reviews.php";
generate_recent_reviews($conn);
require "scripts/generate_modal.php";
display_footer();
$conn->close();
?>