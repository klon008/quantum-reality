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
require_once "scripts/generete_navigation.php";
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

<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title">Заполните форму</h4>
        </div>
        <form role="form" data-toggle="validator" id="modal_form" >
        <!-- Валидатор -->
        <div class="modal-body">

              <!-- NAME -->
              <div class="form-group">
                  <label for="InputName" class="control-label">Полное имя:</label>
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
              <!-- TIME -->
              <div class="form-group">
                  <label for="InputDate" class="control-label">Дата:</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="InputDate"
                  id="InputDate" placeholder="Введите дату"
                   data-error="Дата - обязательное поле" required disabled>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
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

              <!-- PERSONS -->
              <div class="form-group disabled">
                  <label for="inputGroupSize" class="control-label">Количество участников:</label>
                <div class="input-group">
                    <input type="text" id="inputGroupSize" class="form-control bfh-number" data-min="2" data-max="4">
                </div>
              </div>

              <!-- Выберите квест -->
              <div class="form-group">
                  <label for="InputName" class="control-label">Выберите квест:</label>
                <div class="input-group">
                   <div class="bfh-selectbox" data-name="selectbox1">
                     <div data-value="1">Аномалия</div>
                      <div data-value="2">Мафия</div>
                      <div data-value="3">Oculus Rift</div>
                    </div>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-knight"></span></span>
                </div>
                  <div class="help-block with-errors"></div>
              </div>

              <!-- COMMENT -->
              <div class="form-group">
                  <label for="InputMessage" class="control-label">Комментарий:</label>
                <div class="input-group">
                  <textarea name="InputMessage" id="InputMessage" class="form-control"
                   rows="5" placeholder="Дополнительная информация"></textarea>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                </div>
              </div>
        </div>

        <div class="modal-footer">
          <button id="send_ajax" type="submit" class="btn btn-warning" onclick=''>Забронировать</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php
display_footer();
?>