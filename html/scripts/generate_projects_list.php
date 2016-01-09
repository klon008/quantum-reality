<?php
/**
 * Формирует список последних проектов
 * @param  array  $array_projects [description]
 * @return [type]                 [description]
 */
function display_projects_lost($array_projects = array()) {
	echo "<div class=\"row\">";

	foreach ($array_projects as $key => $value) {
		echo <<<EOD
	<div class="col-sm-6 col-md-4">
	<div class="thumbnail hovereffect">
	<img src="{$value["image_link"]}" alt="">
	<div class="overlay">
	<h2>{$value["game_name"]}</h2>
	<a class="info" href="/game.php?project_id={$value["id"]}">Подробнее</a>
	</div>
	</div>
	</div>
EOD;
	}
	echo "</div>";
}
?>