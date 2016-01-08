<?php
/**
 * Формирует заголовок документа от параметров
 * Bootstrap - массив:
 * main - основной
 * notify - нотификация
 * formhelpers - продвинутые компоненты форм
 * validator - проверка валидности
 * stars - Звездочки рейтинга
 * @param  string $page_title          [description]
 * @param  [type] $embedded_javascript [description]
 * @param  [type] $bootstrap           [description]
 * @return [type]                      [description]
 */
function display_head($page_title = "", $bootstrap = NULL) {
	echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale = 1.0">
  <title>{$page_title}</title>
  <script type="text/javascript"
          src="/scripts/javascript/jquery-2.1.4.js"></script>
EOD;
	if (!is_null($bootstrap) && isset($bootstrap['main'])) {
		echo <<<EOD
<!-- BOOTSTRAP -->
<link href="/twbs-bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/twbs-bootstrap/dist/js/bootstrap.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['momentsjs'])) {
		$current_time_zone = date_default_timezone_get();
		echo <<<EOD
<script type="text/javascript">
var timeZone = '{$current_time_zone}';
</script>
<script type="text/javascript"
  src="/scripts/javascript/moment-with-locales.js"></script>
<script  type="text/javascript" src="/scripts/javascript/moment-timezone-with-data.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['notify'])) {
		echo <<<EOD
<script type="text/javascript" src="/twbs-bootstrap/js/notify.min.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['formhelpers'])) {
		echo <<<EOD
<link href="/twbs-bootstrap/bootstrapformhelper/css/bootstrap-formhelpers.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/twbs-bootstrap/bootstrapformhelper/js/bootstrap-formhelpers.js"></script>
<!-- BOOTSTRAP -->
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['validator'])) {
		echo <<<EOD
<script type="text/javascript" src="/twbs-bootstrap/js/validator/validator.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['stars'])) {
		echo <<<EOD
<!-- Bootstrap stars -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/twbs-bootstrap/bootstrap-star-rating/bootstrap-rating.css" media="all" rel="stylesheet" type="text/css" />
<script src="/twbs-bootstrap/bootstrap-star-rating/bootstrap-rating.js" type="text/javascript"></script>
<!-- Bootstrap stars -->
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['renderjs'])) {
		echo <<<EOD
<script type="text/javascript"
  src="/scripts/javascript/render.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['send_reviewsjs'])) {
		echo <<<EOD
<script type="text/javascript"
  src="/scripts/javascript/send_reviews.js"></script>
EOD;
	}
	if (!is_null($bootstrap) && isset($bootstrap['capchajs'])) {
		echo <<<EOD
<script type="text/javascript"
  src="/scripts/javascript/jQueryRotate.js"></script>
<script type="text/javascript"
  src="/scripts/javascript/contacts.js"></script>
EOD;
	}
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\">";
	echo "</head>";
}

function display_footer() {
	echo <<<EOD
<div class="row footer">
<p>Все права защищены.© Copyright 2015.</p>
<p>Разработка сайта: Селетков П.А. т.+7-923-461-32-44, email: seletckov.p@yandex.ru</p>
</div>
</div>
</body>
</html>
EOD;
}
?>
