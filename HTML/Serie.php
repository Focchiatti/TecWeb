<?php
require_once "./DataWriter.php";
require_once "./DBAccess.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Serie</title>
	<meta name="title" content="Serie-a-mente serie specifica"/>
	<meta name="description" content="Pagina che mostra la serietv in dettaglio"/>
	<meta name="keywords" content="fantasy, fantastico, serietv, televisione, memoria"/>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link type="text/css" rel="stylesheet" href="../CSS/stylesmall.css" media="handheld, screen and (max-width:565px),
	only screen and (max-device-width:565px)" />
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
		$Key=strtolower($serie[0]["Titolo"]);
		$Titolo=DBAccess::RetrieveData($serie[0]["Titolo"]);
		$Genere=$serie[0]["Genere"];
		$Trama=$serie[0]["Trama"];
		$DataI=$serie[0]["DataInizio"];
		$DataF=$serie[0]["DataFine"];
		if($DataF=="")
			$DataF="In Corso";
		$Stag=$serie[0]["Stagioni"];
        $Voto=$serie[0]["Valutazione"];
	}
	else header("location:./Home.php");
	echo "
	<div id=\"breadcrumbs\">
		<p>Ti trovi in: <span xml:lang=\"en\">Home >> ".$Genere." >> ".$Titolo."</span></p>
		<a class=\"aiuti\" href=\"#content\">Salta la navigazione</a>
	</div>


	<div id=\"menu\">
		<label id=\"hamburger\" for=\"nav-trigger\">&#9776;</label>		
<input type=\"checkbox\" id=\"nav-trigger\" class=\"nav-trigger\" />
<ul class=\"nav-item\">
		<li><a href=\"Home.php\">Home</a></li>
		<li><a href=\"news.php\">News</a></li>";
		DataWriter::LogInButton();
		echo 
	"</ul>
	</div>

	<div id=\"content\" class=\"Serie\">
		<h2>".$Titolo."</h2>
		<h3>Genere: ".$Genere.", Valutazione: ".$Voto."/5</h3> 
		<h4>".$Stag." Stagioni,  ".$DataI." - ".$DataF."</h4>
		<p id=\"trama\">
		<img class=\"ImgSerie\" src='../Img/".$Key.".jpg' alt=\"Immagine di copertina di '".$Titolo."'\" id='Copertina'/>
		".$Trama."</p>";

	if(isset($_SESSION["UltimaRicerca"])){
		echo "<a class=\"back\" href=\"Ricerca.php?Ricerca=".$_SESSION["UltimaRicerca"]."\">Torna alla ricerca</a><br/>";	
	}
	echo "<a class=\"back\" href=\"".$Genere.".php\">Vai al genere</a>";

	if (isset($_SESSION["Admin"]) && $_SESSION["Admin"]==1) {
	        echo "<a class=\"back\" href=\"Modserie.php?Titolo=".DBAccess::createKey($Titolo)."\">Modifica serie</a>";
	}
	$Text="Rimuovi dalle mie serie";
	$check=false;

	if(isset($_SESSION["Name"])&&$Db->RicercaSerieUtenteNonSeguita($_SESSION['Name'],$Titolo)){
	    $check=true;
	    $Text="Aggiungi alle mie serie";
	}
	if(isset($_SESSION["Name"])&& !$_SESSION["Admin"] ){
	    echo"
	    <form method = \"post\" action=\"" . $_SERVER['PHP_SELF'] . "?name=" . $Key . "\" >
	    <fieldset>
		<input type='submit' class='submitvoto' title='Submit' value='".$Text."'/>
		<input type='hidden' name='Act' />
		</fieldset>
		</form>";

		if (isset($_POST['Act'])&&$check) {
		    $Db->AggiungiMieSerie($Titolo, $_SESSION["Name"]);
		    header("location:" . $_SERVER['PHP_SELF'] . "?name=" . $Key );
		}
		else if(isset($_POST['Act'])){
		    $Db->RimuoviSerieSeguita($Titolo, $_SESSION["Name"]);
		    header("location:" . $_SERVER['PHP_SELF'] . "?name=" . $Key );
		}
	}
	echo 
		"<a class=\"aiuti\" href=\"#header\">Torna su</a>
	</div>

	<div id=\"footer\">
		<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang=\"en\">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
		<a href=\"http://validator.w3.org/check?uri=referer\"> <img src=\"http://www.w3.org/Icons/valid-xhtml10\" alt=\"Valid XHTML 1.0 Strict\"/></a>
		<a href=\"http://jigsaw.w3.org/css-validator/check/referer\"><img src=\"http://jigsaw.w3.org/css-validator/images/vcss-blue\" alt=\"Valid CSS\" /></a>
	</div>
		";
	
	$Db=null;
	echo "
	</body>
	</html>";
?>
