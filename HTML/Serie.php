
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
<?php
require_once "./MyLib.php";

	$hostname = "localhost";
	$dbname = "TecWeb";
	$user ="root";
	$pass ="";
	try{
$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(PDOException $e){
	echo "Errore:".$e->getMessage();
	die();
}
$runnable=$db->prepare("SELECT Titolo,Genere,Trama FROM SerieTV WHERE Titolo=?");
$runnable->execute(array($_GET["name"]));
$i=0;
$series = $runnable->fetchAll();
foreach ($series as $serie) {
	$i=$i+1;
	$Titolo=$serie["Titolo"];
	$Genere=$serie["Genere"];
	$Trama=$serie["Trama"];
}
$db=null;
$runnable=null;
if ($i==2){
	header("location:./Home.php");
}
echo "
<div id=\"breadcrumbs\">
	<p>Ti trovi in: <span xml:lang=\"en\">Home >> 
			".$Genere." >> ".$Titolo.
		"
		</span>
	</p>
</div>

<div id=\"menu\">
<ul>
		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>";
	LogInButton();
	echo "
</ul>
</div>

<div id=\"content\">
<h1>".$Titolo."</h1><h3>Genere ".$Genere."</h3><p>".$Trama."</p>
";
if(isset($_SESSION["UltimaRicerca"])){
	echo "<a href=\"Ricerca.php?Ricerca=".$_SESSION["UltimaRicerca"]."\">Torna alla ricerca</a>";
	
}
echo "<a href=\"".$Genere.".php\">Vai al genere</a>";
echo 
"
</div>
<div id=\"footer\">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang=\"en\">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>
</body>
</html>";