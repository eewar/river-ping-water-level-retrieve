<?php
$cache_file = 'cache.html';
$url = 'http://hydro-1.rid.go.th/Data/HD-04/houly/water_today_search.php?storage=P.1&yy=2019&mm=07';


// update latest data with ?update
if (isset($_GET['update'])):
	$html = file_get_contents($url);
	file_put_contents($cache_file, $html);
endif;


// load cached data
$html = file_get_contents($cache_file);


// html, stripper
$pos = strpos($html, '<table');
$html = substr($html, $pos);
$pos = strpos($html, '</table>');
$html = substr($html, 0, $pos+8);
$table = $html;


date_default_timezone_set("ASIA/BANGKOK");
echo '<meta charset="UTF-8">';
//echo $table;
$data = table2array($table);


$new_data = array();
foreach ($data as $key => $value):
	$timestamp = create_timestamp($value[0], $value[1]);
	$new_data[$timestamp]= array(
//		'original_date' => $value[0].', '.$value[1],
//		'unix_timestamp' => $timestamp
		'water_level_metre' => $value[2],
		'water_flow_cumec' => $value[3],
	);
endforeach;


if (isset($_GET['json'])):
	echo json_encode($new_data);
else:
	check_array($new_data);
endif;


function create_timestamp($date, $time) {
	$date = explode(' ', $date);
	$y = $date[2]-543;
	$m = sprintf("%02d", thaimonth2mm($date[1]));
	$d = $date[0];
	$h = substr($time, 0, strpos($time, '.'));

	$text = $y.'-'.$m.'-'.$d.' '.$h.':00:00';
	$timestamp = strtotime($text);
	//return date('r', $ts);
	return $timestamp;
}


function thaimonth2mm($thaimonth) {
	$month = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
	return array_search($thaimonth, $month)+1;
}


function table2array($table) {
    $dom = new DOMDocument;
	$dom->loadHTML(mb_convert_encoding($table, 'HTML-ENTITIES', 'UTF-8'));
	
    $rows = $dom->getElementsByTagName('tr');

	$data = array();
    foreach ($rows as $rkey => $row):
		$cols = $row->getElementsByTagName('td');
		foreach ($cols as $ckey => $col):
			$data[$rkey][] = $col->nodeValue;
		endforeach;
    endforeach;
	return $data;
}


function check_array($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>
