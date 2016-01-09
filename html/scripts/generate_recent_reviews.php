<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/db_config.php";

function generate_recent_reviews($conn) {
	if (is_null($conn)) {
		throw new Exception('Соединение с бд не было создано');
		exit;
	}
	//$conn              = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
	$sql_last_comments = "SELECT id, author, comment, date, quality FROM recent_reviews
  ORDER BY date DESC LIMIT 3;";

	$last_comment_query  = $conn->query($sql_last_comments);
	$result_last_comment = mysqli_parse_array($last_comment_query);

	echo "<div class=\"row recent_reviews\">";
	echo "<div class=\"col-md-3\">";
	echo "  <h1>Последние отзывы</h1>";
	echo "</div>";
	foreach ($result_last_comment as $key => $value) {
		echo <<<EOD
	<div class="col-md-3">
	<div class="rate-date"><span class="glyphicon glyphicon-time">&nbsp;</span>{$value["date"]}</div>
	<div><input type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" data-readonly value="{$value["quality"]}}"/></div>
	<h1>{$value["author"]}</h1>
	<div>
	{$value["comment"]}
	</div>
	</div>
EOD;
	}
	echo "</div>";
	mysqli_free_result($last_comment_query);
}
?>
