<?php
session_start();
$$urlArray = explode('/', $$_SERVER['PHP_SELF']);
if(!isSet($$lang)) $$lang = $$urlArray[1];
$$_SESSION['lang'] = $$lang;
include_once $$_SERVER['DOCUMENT_ROOT'].'/lang.'.$$lang.'.php';
$$category = $$urlArray[2];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>$if(title)$ $title$ $else$ <?php echo $$langArr['MENU_'.strtoupper($$category)]?> $endif$ | Florian Ulmschneider</title>
	<link rel="stylesheet" href="/styles.css" />
</head>

<body class="<?php echo $$category?>">

<div id="navbar">
	<ul id="nav">
			<li><a <?php if($$category=='home')echo 'class=active '; echo 'href="/'.$$lang.'/home"';?>><?php echo $$langArr['MENU_HOME'];?></a></li>
			<li><a <?php if($$category=='projects')echo 'class=active '; echo 'href="/'.$$lang.'/projects"';?>><?php echo $$langArr['MENU_PROJECTS'];?></a></li>
			<li><a <?php if($$category=='about')echo 'class=active '; echo 'href="/'.$$lang.'/about"';?>><?php echo $$langArr['MENU_ABOUT'];?></a></li>
			<li><a <?php if($$category=='contact')echo 'class=active '; echo 'href="/'.$$lang.'/contact"';?>><?php echo $$langArr['MENU_CONTACT'];?></a></li>
		<div style="float:right">
			<li><a <?php if($$lang=='en')echo 'class=active '; echo 'href="/en'.substr($$_SERVER['PHP_SELF'], 3).'"';?> onclick="setLang('en');">EN</a></li>
			<li><a <?php if($$lang=='de')echo 'class=active '; echo 'href="/de'.substr($$_SERVER['PHP_SELF'], 3).'"';?> onclick="setLang('de');">DE</a></li>
		</div>
	</ul>
</div>

<div id="content">

$body$

</div>

<footer>
	<?php echo $$langArr['FOOTER_LICENSE']; ?>
</footer>

<script>
function setLang(lang) {
	//Make a cookie with the new language for the next visit
	var d = new Date();
	d.setTime(d.getTime() + (1000*3600*24*30));
	var expires = "expires="+ d.toUTCString();
	document.cookie = "lang=" + lang + ";" + expires + ";path=/";
}
</script>

</body>
</html>
