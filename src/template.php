<?php
$$urlArray = explode('/', $$_SERVER['PHP_SELF']);
if(!isSet($$lang)) $$lang = $$urlArray[1];
include_once $$_SERVER['DOCUMENT_ROOT'].'/lang.'.$$lang.'.php';
$$category = $$urlArray[2];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>$title$ | Florian Ulmschneider</title>
	<link rel="stylesheet" href="/styles.css" />
</head>

<body>

<div id="navbar">
	<ul id="nav">
			<li><a <?php if($$category=='home')echo 'class=active '; echo 'href="/'.$$lang.'/home"';?></a><?php echo $$langArr['MENU_HOME'];?></li>
			<li><a <?php if($$category=='projects')echo 'class=active '; echo 'href="/'.$$lang.'/projects"';?></a><?php echo $$langArr['MENU_PROJECTS'];?></li>
			<li><a <?php if($$category=='about')echo 'class=active '; echo 'href="/'.$$lang.'/about"';?></a><?php echo $$langArr['MENU_ABOUT'];?></li>
			<li><a <?php if($$category=='contact')echo 'class=active '; echo 'href="/'.$$lang.'/contact"';?></a><?php echo $$langArr['MENU_CONTACT'];?></li>
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
	d.setTime(d.getTime() + (3600*24*30));
	var expires = "expires="+ d.toUTCString();
	document.cookie = "lang=" + lang + ";" + expires + ";path=/";
}
</script>

</body>
</html>
