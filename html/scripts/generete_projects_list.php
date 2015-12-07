<?php
function display_projects_lost($array_projects = array()) {
	echo "<div class=\"row\">";

	foreach ($array_projects as $key => $value) {
		echo <<<EOD
	<div class="col-sm-6 col-md-4">
	<div class="thumbnail hovereffect">
	<img src="{$value["link"]}" alt="">
	<div class="overlay">
	<h2>{$value["name"]}</h2>
	<a class="info" href="#">Подробнее</a>
	</div>
	</div>
	</div>
EOD;
	}
	echo "</div>";
}
?>