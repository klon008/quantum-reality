<?php

/**
 * Страница Забронировать
 */

require_once "app_config.php";
/**
 * Служебная функция для получения по GET'у ID Игры
 * @param  [type] $in_array [description]
 * @return [type]           [description]
 */
function get_id($in_array) {
	$result     = null;
	$project_id = $_GET['project_id'];
	if (isset($project_id) && count($in_array)) {

		foreach ($in_array as $key => $value) {
			if ($value["id"] == $project_id) {
				$result = $value;
				break;
			}
		}
	}
	return $result;
}

/**
 * Служебная функция для отображения первоночальных
 * Данных на странице
 * @param  [type] $in_post_v [description]
 * @param  [type] $in_def_v  [description]
 * @return [type]            [description]
 */
function select_text($in_post_v, $in_def_v) {
	global $post_row;
	if (!is_null($post_row)) {
		return $in_post_v;
	} else {
		return $in_def_v;
	}
}

/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = array(
	'main'        => true,
	'notify'      => true,
	'formhelpers' => true,
	'validator'   => true,
	'stars'       => true,
	'reservejs'   => true,
	'renderjs'    => true,
);

display_head("Quantum Reality", $bootstrap);
echo "<body>";

echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generate_navigation.php";
display_navigation("reserve");
require_once "db_config.php";

/**Квесты*/
$sql_get_quest = "SELECT id, game_name, image_link, comment FROM game_list ORDER BY id DESC";
$quest_query   = $conn->query($sql_get_quest);
$result_quest  = mysqli_parse_array($quest_query);

$post_row = get_id($result_quest);

echo "<div class=\"row\">";
echo select_text("<div class=\"row game_block\" style=\"display: none;\">", "<div class=\"row game_block\">");

foreach ($result_quest as $key => $value) {
	echo <<<EOD
<div class="col-sm-6 col-md-4" id="game{$value["id"]}">
    <div class="thumbnail hovereffect">
        <img src="{$value["image_link"]}" alt="" id="game{$value["id"]}img">
        <div class="overlay">
            <h2 id="game{$value["id"]}h2">{$value["game_name"]}</h2>
            <a class="info" href="javascript:void(0);" onclick="selectFromGameList('{$value["id"]}', this)">Подробнее</a>
            <p class="hidden" id="game{$value["id"]}comment">{$value["comment"]}</p>
        </div>
    </div>
</div>
EOD;
}
echo "</div>";

echo select_text("<div class=\"row game_block_informer\">", "<div class=\"row game_block_informer\" style=\"display: none;\">");

$test = <<<EOD
	<div class="col-sm-6 col-md-4">
	<a class="back_arrow" href="javascript:void(0);" onclick="%s"><span class="fa fa-arrow-circle-left"></span> Вернуться</a>
	<div class="thumbnail">
			<img src="%s" alt="">
	</div>
	</div>
	<div class="col-sm-6 col-md-8 textblock">
		<h1>%s</h1>
		<p>%s</p>
	</div>
EOD;

echo select_text(sprintf($test, "history.back()",
	$post_row["image_link"], $post_row["game_name"], $post_row["comment"]), sprintf($test, "backToGameList()",
	"/images/virtual.jpg", "ТекстРасДва", "Вы можете связаться с нами посредством формы. При заполнении формы убедитесь, пожалуйста, что вы правильно ввели свои данные, иначе мы не сможем ответить вам."));
echo "<div class=\"col-md-12\"><h2 class=\"center-block textblock\">Выберите удобную дату и время</h2></div>";
echo "<div class=\"col-md-12\">";
require 'scripts/generate_table.php';
echo "</div>";
echo "</div>";
echo "</div>";

require "scripts/generate_modal.php";
display_footer();
$conn->close();
?>