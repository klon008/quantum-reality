<?php
/**
 * Возвращает строку
 * @param  [type] $inId      [description]
 * @param  [type] $inTextRow [description]
 * @return [type]            [description]
 */
function insert_row($in_id, $in_text_row, $in_secondSQL) {

	echo "<tr>";
	echo "<th>" . $in_text_row . "</th>";
	$monday     = time() - (date("N") - 1) * 24 * 60 * 60;
	$days_array = array(
		"monday"    => format_date($monday),
		"tuesday"   => format_date(strtotime("+1 day", $monday)),
		"wednesday" => format_date(strtotime("+2 day", $monday)),
		"thursday"  => format_date(strtotime("+3 day", $monday)),
		"friday"    => format_date(strtotime("+4 day", $monday)),
		"saturday"  => format_date(strtotime("+5 day", $monday)),
		"sunday"    => format_date(strtotime("+6 day", $monday)),
	);
	foreach ($days_array as $key => $value) {
		echo generete_cell($in_secondSQL, $in_id, $value);
	}
	echo "</tr>";
}
/**
 * [generete_cell description]
 * @param  [type] $sql_result [description]
 * @param  [type] $inId       [description]
 * @param  [type] $in_date    [description]
 * @return [type]             [description]
 */
function generete_cell($sql_result, $in_id, $in_date) {

	$result   = '';
	$temp_arr = array();
	foreach ($sql_result as $value) {
		$temp_arr = filter_for_row($value, $in_id, $in_date);
		if (!empty($temp_arr)) {
			$result = "<th>" . "Зарезервировано" . "</th>";
		}
		if (!$result) {
			$result = "<th></th>";
		}
	}
	echo $result;
}

/**
 * [filter_for_row description]
 * @param  [type] $in_row   [description]
 * @param  [type] $in_key   [description]
 * @param  [type] $in_value [description]
 * @return [type]           [description]
 */
function filter_for_row($in_row, $in_value, $in_date) {

	$result = array();

	if (($in_row['work_schedule_fk'] == $in_value) && (strtotime($in_row['date']) == strtotime($in_date))) {
		$result[] = $in_row;

	}
	return $result;
}

/**
 * Формирует заголовок таблицы
 * @return [type] [description]
 */
function generete_table_title() {
	$monday     = time() - (date("N") - 1) * 24 * 60 * 60;
	$days_array = array(
		"monday"    => format_date($monday) . "<br/> Понедельник",
		"tuesday"   => format_date(strtotime("+1 day", $monday)) . "<br/> Вторник",
		"wednesday" => format_date(strtotime("+2 day", $monday)) . "<br/> Среда",
		"thursday"  => format_date(strtotime("+3 day", $monday)) . "<br/> Четверг",
		"friday"    => format_date(strtotime("+4 day", $monday)) . "<br/> Пятница",
		"saturday"  => format_date(strtotime("+5 day", $monday)) . "<br/> Суббота",
		"sunday"    => format_date(strtotime("+6 day", $monday)) . "<br/> Воскресенье",
	);
	foreach ($days_array as $key => $value) {
		echo "<th>$value</th>";
	}
}

/**
 * Формирует заголовок таблицы
 * @return [type] [description]
 */
function generete_dates() {
	$monday     = time() - (date("N") - 1) * 24 * 60 * 60;
	$monday     = strtotime(format_date($monday));
	$days_array = array(
		0 => $monday,
		1 => strtotime("+1 day", $monday),
		2 => strtotime("+2 day", $monday),
		3 => strtotime("+3 day", $monday),
		4 => strtotime("+4 day", $monday),
		5 => strtotime("+5 day", $monday),
		6 => strtotime("+6 day", $monday),
	);
	return $days_array;
}

/**
 * [format_date description]
 * @param  [type] $inDate [description]
 * @return [type]         [description]
 */
function format_date($inDate) {
	return date("d.m.Y", $inDate);
}

function map_format_date($in_row) {
	$in_row['date'] = strtotime($in_row['date']);
	return $in_row;
}