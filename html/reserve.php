<?php

/**
 * Страница Забронировать
 */

require_once "app_config.php";

/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = array(
	'main' => true,
);

display_head("Quantum Reality", $bootstrap);
echo "<body>";

echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generate_navigation.php";
display_navigation("reserve");
require_once "db_config.php";

/**Квесты*/
$sql_get_quest = "SELECT id, game_name, image_link FROM game_list ORDER BY id DESC";
$quest_query   = $conn->query($sql_get_quest);
$result_quest  = mysqli_parse_array($quest_query);

echo "<div class=\"row\">";

foreach ($result_quest as $key => $value) {
	echo <<<EOD
<div class="col-sm-6 col-md-4">
    <div class="thumbnail hovereffect">
        <img src="{$value["image_link"]}">
        <div class="overlay">
            <h2>{$value["game_name"]}</h2>
            <a class="info" href="/game.php?project_id={$value["id"]}">Подробнее</a>
        </div>
    </div>
</div>
EOD;
}

echo "</div>";

display_footer();
$conn->close();
?>