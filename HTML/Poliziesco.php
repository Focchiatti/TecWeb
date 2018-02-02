<?php
require_once "./DataWriter.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Poliziesco </title>
	<meta name="title" content="Serie-a-mente poliziesco">
	<meta name="description" content="Pagina che mostra le serietv di genere poliziesco">
	<meta name="keywords" content="poliziesco polizia televisione memoria">
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link type="text/css" rel="stylesheet" href="../CSS/stylesmall.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link type="text/css" rel="stylesheet" href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>

<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span> >> Poliziesco </p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>

<div id="hamburger">
	<a href="#smallmenu">&#9776;</a>
</div> 

<div id="menu">
<ul>
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
</ul>
</div>

<div id="content">
	<?php
		DataWriter::DBPrintDataAboutGenere("Poliziesco");
	?>	
	<a class="aiuti" href="#header">Torna su</a>
</div>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>

<div id="smallmenu">
<ul>
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	<li id="up"><a href="#header">Torna su</a></li>
</ul>
</div>
</body>
</html>