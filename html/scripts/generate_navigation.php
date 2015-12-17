<?php
/**
 * Генерирует навигацию на сайте
 * @param  [type] $in_selected_tab [description]
 * @return [type]                  [description]
 */
ini_set('display_errors', 'On');
error_reporting('E_ALL');
function display_navigation($in_selected_tab) {
	$active_tab = "class='active'";
	$all_tabs   = [
		"main"     => "<li><a href=\"/index.php\">Главная</a></li>",
		"about"    => "<li><a href=\"/about.php\">О проекте</a></li>",
		"reviews"  => "<li><a href=\"/reviews.php\">Отзывы</a></li>",
		"reserve"  => "<li><a href=\"/reserve.php\">Забронировать</a></li>",
		"contacts" => "<li><a href=\"/contacts.php\">Контакты</a></li>",
	];
	$all_tabs[$in_selected_tab] = str_replace("<li", "<li class='active'", $all_tabs[$in_selected_tab]);
	$tabs_str                   = "";
	foreach ($all_tabs as $key => $value) {
		$tabs_str = $tabs_str . $all_tabs[$key];
	}
	unset($value);
	unset($key);
	echo <<<EOD
<nav class="navbar navbar-default row" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <!-- <li></li> -->
      {$tabs_str}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="page-header row">
  <h1>
    <a href="/index.php">
      <img src="images/123.png" id="logo">Quantum Reality<img src="images/123.png" id="logo">
    </a>
  </h1>
</div>
EOD;
}
?>