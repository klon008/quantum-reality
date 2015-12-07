<?php
/**Заголовок*/
require_once "scripts/generete_header.php";
require_once "db_config.php";
$bootstrap = [
	'main'           => true,
	'stars'          => true,
	'validator'      => true,
	'send_reviewsjs' => true,
];
display_head("Quantum Reality", $bootstrap);
echo "<body>";
echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generete_navigation.php";
display_navigation("reviews");
?>
<div class="row">
	<div class="center-block">
		<a class="btn btn-primary btn-lg" role="button" onclick="$('#myModal').modal();"><span class="fa fa-pencil-square-o"></span> Оставить свой отзыв</a>
	</div>
</div>
<div class="row reviews_list">

<?php
if (is_null($conn)) {
	throw new Exception('Соединение с бд не было создано');
}
//$conn              = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
$sql_last_comments = "SELECT id, author, comment, date, quality FROM rdb.recent_reviews
  ORDER BY date DESC;";

$last_comment_query  = $conn->query($sql_last_comments);
$result_last_comment = mysqli_parse_array($last_comment_query);

foreach ($result_last_comment as $key => $value) {
	echo <<<EOD
	<div class="reviews row">
		<div class="col-md-3">
			<div class="rate-date"><span class="glyphicon glyphicon-time">&nbsp;</span>{$value["date"]}</div>
			<div><input type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" data-readonly value="{$value["quality"]}}"/></div>
		</div>

		<div class="col-md-9">
			<h1>{$value["author"]}</h1>
			<div>
				{$value["comment"]}
			</div>
		</div>
	</div>
EOD;
}

mysqli_free_result($last_comment_query);
?>

</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Заполните форму</h4>
            </div>
            <form role="form" data-toggle="validator" id="modal_form">
                <!-- Валидатор -->
                <div class="modal-body">
                    <!-- RATING -->
                    <div class="form-group">
                        <label for="InputMessage" class="control-label">Ваша оценка:</label>
                        <div>
                            <input id="rating" type="hidden" class="rating" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" value="5" />
                        </div>
                    </div>
                    <!-- NAME -->
                    <div class="form-group">
                        <label for="InputName" class="control-label">Ваше имя:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Введите ваше Имя" data-error="Поле 'Имя' должно быть заполнено" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- COMMENT -->
                    <div class="form-group">
                        <label for="InputMessage" class="control-label">Комментарий:</label>
                        <div class="input-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" placeholder="Дополнительная информация" data-error="Поле 'Комментарий' должно быть заполнено" required></textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="send_ajax_rewiews" type="submit" class="btn btn-warning" onclick='do_ajax()'>Отправить</button>
                    </div>
            	</div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<?php
display_footer();
?>