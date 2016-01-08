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
                  <label for="InputName" class="control-label">Выберите игру:</label>
                <div class="input-group">
                   <div class="bfh-selectbox" data-name="selectbox1" id="Input-selectbox" data-value="2">
                    <?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db_config.php";
$sql_get_quest_selects = "SELECT id, game_name FROM game_list WHERE disabled = 0 ORDER BY id DESC";
$quest_query_selects   = $conn->query($sql_get_quest_selects);
$result_quest_selects  = mysqli_parse_array($quest_query_selects);
foreach ($result_quest_selects as $key => $value) {
	echo "<div data-value=\"{$value['id']}\">{$value['game_name']}</div>";
}
mysqli_free_result($quest_query_selects);
?>
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
          <button id="send_ajax" type="submit" class="btn btn-warning disabled" onclick=''>Забронировать</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>