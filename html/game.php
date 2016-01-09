<?php

/**
 * Страница Игра (Переход из забронировать)
 */

require_once "app_config.php";
require_once "db_config.php";
$project_id = $_GET['project_id'];

/**Препроверка корректности страницы, в случае ошибки кидаен на общую страницу Бронирования*/
if (!is_null($project_id)) {
/**Квесты*/
	$sql_get_quest = "SELECT id, game_name, image_link, comment, disabled, game_type FROM game_list WHERE id={$project_id} limit 1";
	$quest_query   = $conn->query($sql_get_quest);
	$result_quest  = $quest_query->fetch_assoc();
}
$game = $result_quest;
if (is_null($project_id) || is_null($game)) {
	header('HTTP/1.1 200 OK');
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/reserve.php');
	exit;
}

/**Заголовок*/
require_once "scripts/generete_header.php";

$bootstrap = array(
	'main'  => true,
	'stars' => true,
);
/**Подбор необходимых модулей в зависимости от типа Игры*/
if ($game["disabled"] == 0) {
	switch ($game["game_type"]) {
		case "phone_oredering":
			$bootstrap = array_merge($bootstrap, array(
				'notify'      => true,
				'validator'   => true,
				'capchajs'    => true,
				'formhelpers' => true));
			break;

		default:
			$bootstrap = array_merge($bootstrap, array(
				'renderjs'    => true,
				'notify'      => true,
				'formhelpers' => true,
				'validator'   => true));
	}
}

display_head("Quantum Reality", $bootstrap);
echo "<body>";

echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generate_navigation.php";
display_navigation("reserve");

echo "<div class=\"row\">";
echo "<div class=\"row game_block_informer\">";

echo $text_1 = <<<EOD
	<div class="col-sm-6 col-md-4">
	<a class="back_arrow" href="javascript:history.back();" onclick="history:back()"><span class="fa fa-arrow-circle-left"></span> Вернуться</a>
		<div class="thumbnail">
				<img src="{$game["image_link"]}" alt="">
		</div>
EOD;

if ($game["disabled"] == 0) {
	/**Если тип игры "Заказ по форме обратной связи"*/
	if ($game["game_type"] == "phone_oredering") {
		require 'scripts/generate_contactform.php';
		generate_contactform("", "contactform");
	} else if ($game["game_type"] == "") {
		/**В противном случае*/
	}
}

echo "</div>";

echo $text_2 = <<<EOD
	<div class="col-sm-6 col-md-8 textblock">
		<h1>{$game["game_name"]}</h1>
		<p>{$game["comment"]}</p>
	</div>
EOD;

if ($game["disabled"] == 0) {
	if ($game["game_type"] == "") {
		echo "<div class=\"col-md-12\" id=\"reserve_table\"><h2 class=\"center-block textblock\">Выберите удобную дату и время</h2>";
		require 'scripts/generate_table.php';
		echo "</div>";
		echo "</div>";
		require 'scripts/generate_modal.php';
	}
}
echo "</div>";
if ($game["disabled"] == 0) {
	/**Если тип игры "Заказ по форме обратной связи"*/
	if ($game["game_type"] == "phone_oredering") {
		echo <<<EOD
		<script type="text/javascript">
$(function(){
	$("#contact_form_additional_info").val('Заказ по форме обратной связи');
});
  </script>
EOD;
	}
}
display_footer();
$conn->close();
?>