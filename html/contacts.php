<?php
/**Контакты*/
require_once "app_config.php";
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
require_once "scripts/generate_navigation.php";
display_navigation("contacts");
?>

<!--Yandex map-->
<div class="row">
    <div class="col-md-7">
        <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=-sLmrtpAJXg3q_wx2W7a0hh9Pkq14wrr&width=auto&height=400&lang=ru_RU&sourceType=constructor"></script>
    </div>

  <!--Text-->
  <div class="textblock col-md-5">
      <div>
          <p style="font-size: 23px;">Ежедневно с 12:00 до 23:00
              <br> - Адрес: Кемеровская обл, г.Калтан, ул.Горького, 14а.
              <br> - Телефон: 8(913) 120 97 97</p>
          <p style="font-size: 23px;">- Email: <a href="mailto:info@qrq42.ru">info@qrq42.ru</a></p>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <!-- VK Widget -->
      <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
      <div id="vk_groups" class="col-md-6"></div>
      <script type="text/javascript">
      VK.Widgets.Group("vk_groups", {
          mode: 0,
          width: "220",
          height: "400",
          color1: 'FFFFFF',
          color2: '2B587A',
          color3: '5B7FA6'
      }, 99859347);
      </script>
  </div>
</div>


<!-- Блок Обратной связи -->
<div class="row">
<div class="textblock col-md-6">
          <p style="font-size: 23px;">Вы можете связаться с нами посредством формы обратной связи.<br/> Пожалуйста, убедитесь в правильности её заполнения, иначе мы не сможем ответить вам.</p>
</div>
<?php
require "scripts/generate_contactform.php";
generate_contactform();
?>
</div>

<!-- Блок социальных кнопок -->
<div class="row">
<div class="textblock col-md-12 center-block">
<h2>Нас легко найти в социальных сетях!</h2>
          <a href="http://www.vk.com"><img src="/images/icons/svg/vk_circle_color.svg" onerror="this.onerror=null; this.src='/images/icons/vk_circle_color.png'"></a>
          <a href="http://www.youtube.com"><img src="/images/icons/svg/youtube_circle_color.svg" onerror="this.onerror=null; this.src='/images/icons/youtube_circle_color.png'"></a>
          <a href="https://www.instagram.com/"><img src="/images/icons/svg/instagram_circle_color.svg" onerror="this.onerror=null; this.src='/images/icons/instagram_circle_color.png'"></a>
          <a href="skype:efremov604"><img src="/images/icons/svg/skype_circle_color.svg" onerror="this.onerror=null; this.src='/images/icons/skype_circle_color.png'"></a>
</div>
</div>
<?php
display_footer();
?>