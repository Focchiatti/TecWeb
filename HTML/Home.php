<?php
require_once "./DataWriter.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php header('Content-Type: application/xhtml+xml');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Serie-a-mente</title>
	<meta name="title" content="home Serie-a-mente"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="description" content="Homepage del sito serie-a-mente, mostra i generi delle serie"/>
	<meta name="keywords" content="home, serietv, televisione, memoria"/>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link rel="stylesheet" type="text/css"  href="../CSS/stylesmall.css" media="handheld, screen and (max-width:580px),
	only screen and (max-device-width:580px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/stylephone.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
	<h2>Tutto sulle vostre serie televisive preferite</h2>
</div>

<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span></p>
	<a class="aiuti" href="#content">Vai al contenuto</a>
</div>


<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
	<input type="checkbox" id="nav-trigger" class="nav-trigger" />
	<ul class="nav-item">
	<li><p><span xml:lang="en">Home</span></p></li>
	<li><a href="news.php">Notizie</a></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	</ul>
</div>

<div id="content">
	
	<div id="barraricerca">
		<form action="Ricerca.php" method="get">
		<fieldset>	<input type="text" title="Ricerca" name="Ricerca"/>
			<input type="submit" id="submit" value="Cerca"/>
		</fieldset>
		</form>
	</div>

<h2>Generi</h2>
	<div class="Genere Thriller">
		<a href="Thriller.php">
			<span xml:lang="en">Thriller</span>
		</a>
	</div>
	<div class="Genere Drammatico">
		<a href="Drammatico.php">
			Drammatico
		</a>
	</div>
	<div class="Genere Commedia">
		<a href="Commedia.php">
			Commedia
		</a>
	</div>
	<div class="Genere Fantasy">
		<a href="Fantasy.php">
			<span xml:lang="en">Fantasy</span>
		</a>
	</div>
	<div class="Genere Fantascienza">
		<a href="Fantascienza.php">
			Fantascienza
		</a>
	</div>
	<div class="Genere Poliziesco">
		<a href="Poliziesco.php">
			Poliziesco
		</a>
	</div>
	<a class="aiuti" href="#header">Torna su</a>
</div>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<p> Per contattarci scrivere a <a href="mailto:serieamente@gmail.com">serieamente@gmail.com</a></p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict"/></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>

</body>
</html>