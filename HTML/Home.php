
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Serie-a-mente </title>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<!-- <link type="text/css" rel="stylesheet" href="Style/small.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link type="text/css" rel="stylesheet" href="Style/print.css" media="print" /> -->

</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>


<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span></p>
</div>

<div id="menu">
<ul>
		<li><p>Home</p></li>
		<!--<li>Generi</li>-->
		<li><a href=\"news.php\">News</a></li>
		
	<?php
	include "menu.php"
	?>
</ul>
</div>

<div id="content">
<div id="barraricerca"><form action="Ricerca.php" method="POST"><input type="text" name="Ricerca"/><input type="submit" value="Cerca"/></form></div>
	<h3>Generi</h3>
	<div class="Genere Thriller">
		<a href=""><span xml:lang="en">Thriller</span></a>
	</div>
		<div class="Genere Drammatico">
		<a href=""> Drammatico</a>
	</div>
		<div class="Genere Commedia">
		<a href="">Commedia</a>
	</div>
		<div class="Genere Fantasy">
		<a href=""><span xml:lang="en">Fantasy</span></a>
	</div>
		<div class="Genere Fantascienza">
		<a href="">Fantascienza</a>
	</div>
	<div class="Genere Poliziesco">
		<a href="">Poliziesco</a>
	</div>
	
</div>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>
</body>
</html>