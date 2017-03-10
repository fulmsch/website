<?php
if(isSet($_COOKIE['lang'])) {
	$lang = $_COOKIE['lang'];
	switch ($lang) {
		case 'en':
			$home_file = 'en/home/index.php';
			break;
		case 'de':
			$home_file = 'de/home/index.php';
			break;
		default:
			$home_file = 'en/home/index.php';
	}
}
else {
	$home_file = 'en/home/index.php';
}
header('Location: '.'/'.$home_file);
exit();
?>
