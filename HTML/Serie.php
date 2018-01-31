
<?php
require_once "./DataWriter.php";
require_once "./DBAccess.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Serie-a-mente </title>
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
	$Db=new DBAccess();
	$serie=$Db->RicercaSpecifica($_GET['name']);
	if($serie){
		$Key=$serie[0]["Titolo"];
	$Titolo=DBAccess::RetrieveData($serie[0]["Titolo"]);
	$Genere=$serie[0]["Genere"];
	$Trama=$serie[0]["Trama"];
	}
	else header("location:./Home.php");
echo "
<div id=\"breadcrumbs\">
	<p>Ti trovi in: <span xml:lang=\"en\">Home >> 
			".$Genere." >> ".$Titolo.
		"
		</span>
	</p>
</div>

<div id=\"hamburger\">
	<a href=\"#smallmenu\">&#9776;</a>
</div> 

<div id=\"menu\">
<ul>

		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>";
	DataWriter::LogInButton();
	echo "
</ul>
</div>

<div id=\"content\" class=\"Serie\">
<h2>".$Titolo."</h2>
<h3>Genere ".$Genere."</h3>
<img class=\"ImgSerie\" src='../Img/".$Key.".jpg' alt='".$Titolo."' id='Copertina'/>
<p>".$Trama."</p>
";
if(isset($_SESSION["UltimaRicerca"])){
	echo "<a href=\"Ricerca.php?Ricerca=".$_SESSION["UltimaRicerca"]."\">Torna alla ricerca</a><br/>";	
}
echo "<a href=\"".$Genere.".php\">Vai al genere</a>
";

$Text="Rimuovi dalle mie serie";
$check=false;
if(isset($_SESSION["Name"])&&$Db->RicercaSerieUtenteNonSeguita($_SESSION['Name'],$Titolo))
{
    $check=true;
    $Text="Aggiungi alle mie serie";
}
if(isset($_SESSION["Name"])&& !$_SESSION["Admin"] )
{
    echo"
    <form method = \"post\" action=\"" . $_SERVER['PHP_SELF'] . "?name=" . $Key . "\" >
    <fieldset>
<input type='submit' value='".$Text."'/>
<input type='hidden' name='Act' />
</fieldset>
</form>";

if (isset($_POST['Act'])&&$check) {
    $Db->AggiungiMieSerie($Key, $_SESSION["Name"]);
    header("location:" . $_SERVER['PHP_SELF'] . "?name=" . $Key );
}
else if(isset($_POST['Act']))
{
    $Db->RimuoviSerieSeguita($_GET['name'], $_SESSION["Name"]);
    header("location:" . $_SERVER['PHP_SELF'] . "?name=" . $_GET['name'] );
}
}
echo 
"
</div>
<div id=\"footer\">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang=\"en\">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>

<div id=\"smallmenu\">
<ul>

		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>
		"
;
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	
	echo "
	<li id=\"up\"><a href=\"#header\">Torna su</a></li>
</ul>
</div>

</body>
</html>";
?>