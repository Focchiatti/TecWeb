
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
	$Titolo=$serie[0]["Titolo"];
	$Genere=$serie[0]["Genere"];
	$Trama=$serie[0]["Trama"];

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
	DataWriter::LogInButton();
	echo "
</ul>
</div>

<div id=\"content\" class=\"Serie\">
<h1>".$Titolo."</h1>
<h3>Genere ".$Genere."</h3>
<p>".$Trama."</p>
";
if(isset($_SESSION["UltimaRicerca"])){
	echo "<a href=\"Ricerca.php?Ricerca=".$_SESSION["UltimaRicerca"]."\">Torna alla ricerca</a><br/>";	
}
echo "<a href=\"".$Genere.".php\">Vai al genere</a>
";

$Text="Rimuovi dalle mie serie";
$check=false;
if($Db->RicercaSerieUtenteNonSeguita($_SESSION['Name'],$Titolo))
{
    $check=true;
    $Text="Aggiungi alle mie serie";
}
if($_SESSION["Name"])
{
    echo"
    <form method = \"POST\" action=\"" . $_SERVER['PHP_SELF'] . "?name=" . $_GET['name'] . "\" >
<input type='submit' value='".$Text."'>
<input type='hidden' name='Act' >
</form>";

if (isset($_POST['Act'])&&$check) {
    $Db->AggiungiMieSerie($_GET['name'], $_SESSION["Name"]);
    header("location:" . $_SERVER['PHP_SELF'] . "?name=" . $_GET['name'] );
}
else if(isset($_POST['Act'])&&!$check)
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
</body>
</html>";
?>