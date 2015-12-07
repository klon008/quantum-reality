<?php
/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = array(
	'main'        => true,
	'stars'       => true,
	'notify'      => true,
	'formhelpers' => true,
	'validator'   => true,
	'capchajs'    => true,
);

display_head("Quantum Reality", $bootstrap);
echo "<body>";
echo "<div class=\"container col-md-8  col-md-offset-2\">"; //8 Колонок Ширина и 2 отступ слева
/**Навигация*/
require_once "scripts/generete_navigation.php";
display_navigation("contacts");
?>

<div class="row textblock col-md-6">
<div>
<h2><span style="font-size: 40px;">Контакты</span></h2>
<p  style="font-size: 23px;">Вы можете связаться с нами посредством формы. При заполнении формы убедитесь, пожалуйста, что вы правильно ввели свои данные, иначе мы не сможем ответить вам.</p>
</div>
</div>
