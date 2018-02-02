<?php
require_once "./DataWriter.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Risultato ricerca </title>
	<meta name="title" content="Serie-a-mente risultato ricerca">
	<meta name="description" content="Pagina che mostra il risultato della ricerca effettuata">
	<meta name="keywords" content="ricerca cerca serietv televisione memoria">
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link type="text/css" rel="stylesheet" href="../CSS/stylesmall.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link type="text/css" rel="stylesheet" href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>
<?php
	echo 
	"<div id=\"breadcrumbs\">
		<p>Ti trovi in: <span xml:lang=\"en\">Home</span> >> Ricerca</p>
		<a class=\"aiuti\" href=\"#content\">Salta la navigazione</a>
	</div>

	<div id=\"hamburger\">
		<a href=\"#smallmenu\">&#9776;</a>
	</div> 

	<div id=\"menu\">
	<ul>
		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>";
		DataWriter::LogInButton();
	echo 
	"</ul>
	</div>

	<div id=\"content\">";
		if(isset($_GET["Ricerca"])&&$_GET["Ricerca"]!=""){
			echo "<div id=\"barraricerca\">
			<form action=\"Ricerca.php\" method=\"get\">
			<fieldset>
			<input type=\"text\" title=\"Ricerca\" name=\"Ricerca\" value=\"".$_GET["Ricerca"]."\"/>
			<input id=\"submit\" title=\"Cerca\" type=\"submit\" value=\"Cerca\"/>
			</fieldset>
			</form>
			</div>";
			$_SESSION["UltimaRicerca"]=$_GET["Ricerca"];
			DataWriter::RicercaTitolo($_GET["Ricerca"]);
		}
		else{
			echo 
			"<div id=\"barraricerca\">
				<form action=\"Ricerca.php\" method=\"get\">
					<fieldset>
					<input type=\"text\" title=\"Ricerca\" name=\"Ricerca\"/>
					<input id= \"submit\" type=\"submit\" value=\"Cerca\"/>
					</fieldset>
				</form>
			</div>";
		}
		echo 
		"<a class=\"aiuti\" href=\"#header\">Torna su</a>
	</div>

	<div id=\"footer\">
		<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang=\"en\">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	</div>

	<div id=\"smallmenu\">
	<ul>
		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>";
		DataWriter::LogInButton();
		echo 
		"<li id=\"up\"><a href=\"#header\">Torna su</a></li>
	</ul>
	</div>
	</body>
	</html>";
?>