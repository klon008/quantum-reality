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
  		<iframe src="//vk.com/video_ext.php?oid=8570225&id=171795178&hash=98017c6c2712e815&hd=1" width="640" height="360"  frameborder="0"></iframe>
		</div>
</div>

<div class="row textblock">
    <p>Quantum Reality Центр развлечений в городе Калтане, Виртуальная реальность. Комнаты реалити-квестов. Психологическая игра "Мафия"	</p>
</div>
<?php
display_footer();
?>