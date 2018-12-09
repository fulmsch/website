<?php
session_start();
switch ($_SERVER['REDIRECT_STATUS']) {
	case 404:
		$url = strtolower($_SERVER['REDIRECT_URL']);
		if (substr($url, 0, 3) === "/de") {
			$_SESSION['lang'] = 'de';
		} else if (substr($url, 0, 3) === "/en") {
			$_SESSION['lang'] = 'en';
		}
		switch ($url) {
			case '/projekte':
				$redirect = '/de/projects/index.php';
				break;
			case '/projects':
				$redirect = '/en/projects/index.php';
				break;
			case '/kontakt':
				$redirect = '/de/contact/index.php';
				break;
			case '/contact':
				$redirect = '/en/contact/index.php';
				break;
			default:
				if(isSet($_SESSION['lang'])) {
					switch ($_SESSION['lang']) {
						case 'de':
							$redirect = '/de/404.php';
							break;
						case 'en':
						default:
							$redirect = '/en/404.php';
						}
				}
				else {
					$redirect = '/en/404.php';
				}
				break;
		}
}

if (isSet($redirect)) {
	header('Location: '.$redirect);
	exit();
}
?>
