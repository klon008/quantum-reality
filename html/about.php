<?php
/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = array(
	'main'  => true,
	'stars' => true,
);
display_head("Quantum Reality", $bootstrap);
echo "<body>";
echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generate_navigation.php";
display_navigation("about");

?>
<div class="row">
	<div class="embed-responsive embed-responsive-16by9">
  		<iframe src="https://player.vimeo.com/video/130103899" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p><a href="https://vimeo.com/130103899">Реалити-квест &quot;Месть Фредди Крюгера&quot;</a> from <a href="https://vimeo.com/korsakovpro">Алексей Корсаков</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
	</div>
</div>

<div class="row textblock">
    <p>Для тех кто к нам недавно присоединился и думает : "Что за хрень мне тут опять прислали?!" Поясняем - одна инициативная группа людей, проживающих в г.Калтан решила, что уже хватит просиживать штаны дома активным и веселым Калтанцам (слава богу, такие у нас есть...)! И придумала своего рода "Дозор", но немгого в другой вариации, игру, точнее несколько разного рода сити-квестов! Правила сити-квеста очень просты - необходимо собрать команду от 3 до 5 человек, определится на каком автомобиле будет передвигаться команда, позвонить организаторам сити квестов и сообщить о своем диком желании поиграть, далее все вам объяснят. Одним из не менее важных условий участия является наличие у команды (хотя бы одного) смартфона, не важно там <a href="https://market.yandex.ru/search.xml?text=%D1%82%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD%D1%8B%20apple&clid=698">яблочно</a> или <a href="https://market.yandex.ru/search.xml?hid=91491&nid=54726&text=%D1%82%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD%D1%8B%20android&srnum=4032">зеленый недочеловечек</a>! На этом смартфоне необходимо установить приложение QR-reader(<a href="https://play.google.com/store/apps/details?id=me.scan.android.client&hl=tr%25E2%2580%258E"><span class="glyphicon glyphicon-apple"></span></a>, <a href="https://itunes.apple.com/ru/app/qr-reader-for-iphone/id368494609?mt=8"><span class="fa fa-android"></span></a>), для считывания QR кодов. И все! После проделанных процедур вы придумываете название своей команды и отличительные знаки. Так,что всем, всем, всем - скорее набирайте команду и вперед к разнообразию своей жизни, и помните Вы сами решаете как провести свободное время, но играя в сити-квесты Вы получите МНОГО различного рода эмоций, а так же отличное настроение Вам гарантировано (если вы сами этого хотите)!!!
	Мы ждем Ваших заявок!</p>
</div>
<?php
display_footer();
?>