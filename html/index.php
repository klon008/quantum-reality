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
	'momentsjs'   => true,
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

echo <<<EOD
<div class="row">

    <div class="well col-md-12" style="color: #323232">
    <div class="center-block"><h1>Стоимость Oculus Rift</h1><br/></div>
        <div class="col-md-4"><div class="image_frame"><img alt="Стоимость Oculus Rift" src="/images/kDxzxAD.jpg"></div></div>
        <br>
        <div class="col-md-8">
        <table class="prise_table">
            <tbody>
                <tr>
                    <td>
                        <img src="/images/Clock.png" alt="">
                    </td>
                    <td>
                        В РАБОЧИЕ ДНИ
                        <div class="big">
                            до 17:00 </div>
                    </td>
                    <td>
                        150 <strong>₽</strong> </td>
                </tr>
                <tr>
                    <td>
                        <img src="/images/Clock.png" alt="">
                    </td>
                    <td>
                        в рабочие дни
                        <div class="big">
                            после 17:00 </div>
                    </td>
                    <td>
                        250 <strong>₽</strong> </td>
                </tr>
                <tr>
                    <td>
                        <img src="/images/Clock.png" alt="">
                    </td>
                    <td>
                        <div class="big">
                            В ВЫХОДНЫЕ И
                            <br> ПРАЗДНИКИ </div>
                    </td>
                    <td>
                        250 <strong>₽</strong> </td>
                </tr>
            </tbody>
        </table>
        <p>
            Для игры, возможно, вам понадобиться Персональный Компьютер. Или мы предоставим его вам сами.
        </p>
        <a href="/game.php?project_id=3" class="btn btn-info" style="margin:0px 0 0 0px">ИГРАТЬ</a>
        </div>
    </div>
</div>

EOD;

/**Таблица цен*/
/*echo "
<div class=\"row\">
<div class=\"bs-example\">
<table class=\"table\">
<h1 style=\"color: #FFF;\">Прайс-лист Oculus-Rift</h1>
<thead>
<tr>
<th>#</th>
<th>Понедельник</th>
<th>Вторник</th>
<th>Среда</th>
<th>Четверг</th>
<th>Пятница</th>
<th>Суббота</th>
<th>Воскресенье</th>
</tr>
</thead>
<tbody>
<tr>
<th>День (12:00-17:00)</th>
<td>150 ₽</td>
<td>150 ₽</td>
<td>150 ₽</td>
<td>150 ₽</td>
<td>150 ₽</td>
<td>150 ₽</td>
<td>150 ₽</td>
</tr>
<tr>
<th>Вечер (17:00-23:00)</th>
<td>250 ₽</td>
<td>250 ₽</td>
<td>250 ₽</td>
<td>250 ₽</td>
<td>250 ₽</td>
<td>250 ₽</td>
<td>250 ₽</td>
</tr>
</tbody>
</table>
</div>
</div>

<div class=\"row\">
<h1 style=\"color: white;\" class=\"center-block\">Выберите удобную дату и время</h1>
</div>";

/*Таблицу подтягиваем*/
require "scripts/generate_table.php";

/**Последние комментарии*/
require_once "scripts/generate_recent_reviews.php";

generate_recent_reviews($conn);
require "scripts/generate_modal.php";
display_footer();
$conn->close();
?>