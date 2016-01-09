<?php
/*Капча*/
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/captcha/securimage.php';
$securimage = new Securimage();
/*Капча*/

function generate_contactform($b_class = "col-md-6", $id = "\"\"", $additional_info = null) {

	$text = <<<EOD
<div class="message_block {$b_class}" id = {$id}>
<form role="form" data-toggle="validator" id="contact_form">
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

      <div class="hidden">
          <input id="contact_form_additional_info" type=\"hidden\" value="{$additional_info}"/>
      </div>
<div>
  <button id="send_ajax" type="submit" class="btn btn-warning"'>Отправить</button>
</div>
</form>
</div>
EOD;

	echo $text;
}
?>