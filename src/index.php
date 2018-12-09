<?php
session_start();
if(!isSet($_SESSION['lang'])) {
	if(isSet($_COOKIE['lang'])) {
		$lang = $_COOKIE['lang'];
	} else {
		$browserLangs = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		if (strpos($browserLangs, 'de') !== false) {
			$lang = 'de';
		} else {
			$lang = 'en';
		}
	}
} else {
	$lang = $_SESSION['lang'];
}

if (!($lang === 'de' || $lang === 'en')) {
	$lang = 'en';
}
$_SESSION['lang'] = $lang;

$home_file = $lang . '/home/index.php';
header('Location: /' . $home_file);
exit();
?>
