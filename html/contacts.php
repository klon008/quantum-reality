<?php
/**Заголовок*/
require_once "scripts/generete_header.php";
$bootstrap = [
	'main'        => true,
	'stars'       => true,
	'notify'      => true,
	'formhelpers' => true,
	'validator'   => true,
	'capchajs'    => true,
];

/*Капча*/
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/captcha/securimage.php';
$securimage = new Securimage();
/*Капча*/

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

<div class="row">
<div class="message_block col-md-6">
<form role="form" data-toggle="validator" id="modal_form">
      <!-- NAME -->
      <div class="form-group">
          <label for="InputName" class="control-label">Ваше имя:</label>
        <div class="input-group">
          <input type="text" class="form-control" name="InputName"
          id="InputName" placeholder="Введите ваше Имя"
           data-error="Поле 'Имя' должно быть заполнено" required>
          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        </div>
          <div class="help-block with-errors"></div>
      </div>
      <!-- EMAIL -->
      <div class="form-group">
          <label for="inputEmail" class="control-label">Email:</label>
        <div class="input-group">
          <input type="email" class="form-control" id="InputEmail"
              name="InputEmail" placeholder="Введите ваш email" data-error="Email - адрес введен неверно" required>
          <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
        </div>
          <div class="help-block with-errors"></div>
      </div>
      <!-- TEL -->
      <div class="form-group">
          <label for="inputTel" class="control-label">Телефон:</label>
        <div class="input-group">
          <input type="text" class="form-control bfh-phone" data-format="+7 (ddd) ddd-dddd" id="phone-input"
          pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">
          <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
        </div>
          <div class="help-block with-errors"></div>
      </div>

      <!-- COMMENT -->
      <div class="form-group">
          <label for="InputMessage" class="control-label">Сообщение: </label>
        <div class="input-group">
          <textarea name="InputMessage" id="InputMessage" class="form-control"
           rows="5" placeholder="Дополнительная информация"></textarea>
          <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
        </div>
      </div>

      <div class="form-group captcha">
          <img id="captcha" src="/captcha/securimage_show.php" alt="CAPTCHA Image" />
          <br/>
          <input id="2xCc" type="text" name="captcha_code" size="25" maxlength="6" required>
          <div id="refresh_captcha"><a onclick="refreshCaptcha()"><i class="fa fa-refresh" style="font-size: 16px;"></i></a></div>
      </div>

<div>
  <button id="send_ajax" type="button" class="btn btn-warning" onclick='do_ajax()'>Отправить</button>
</div>
</form>
</div>
</div>
<?php
display_footer();
?>