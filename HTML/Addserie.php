<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php header('Content-Type: application/xhtml+xml');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Aggiungi serie</title>
	<meta name="title" content="aggiungi serie Serie-a-mente"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="description" content="Pagina che permette di aggiungere al database una nuova serie"/>
	<meta name="keywords" content="amministrazione, nuova, serietv, televisione, memoria"/>
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
	<p>Ti trovi in: <span xml:lang="en">Home</span> >> Aggiungi Serie</p>
	<a class="aiuti" href="#content">Vai al contenuto</a>
</div>

<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
	<input type="checkbox" id="nav-trigger" class="nav-trigger" />
	<ul class="nav-item">
	<li><a href="Home.php"><span xml:lang="en">Home</span></a></li>
	<li><a href="news.php">Notizie</a></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	</ul>
</div>

<?php 

if(!isset($_SESSION['CallingPage'])){
    $_SESSION['CallingPage']="./Home.php";
}

if (!isset($_SESSION["Admin"]) || (isset($_SESSION["Admin"])&&$_SESSION["Admin"]==0)) {
	header("location:".$_SESSION['CallingPage']);
}

if(isset($_POST['Titolo'])){
    $Db=new DBAccess();
	$Titolo=DBAccess::createKey($_POST['Titolo']);
	$error=DataWriter::UploadFile($_FILES['userfile'],strtolower($Titolo));
	if($error==""&&!($Db->AggiungiSerie($Titolo,$_POST['Genere'],$_POST['IData'],$_POST['FData'],$_POST['Stagioni'],$_POST['Trama']))){
		
		if ($_POST['Titolo']=="") $error=DBAccess::createKey("Errore: titolo assente"); 
        else if ($_POST['IData']=="") $error=DBAccess::createKey("Errore: data d'inizio assente"); 
        else if ($_POST['Stagioni']=="") $error=DBAccess::createKey("Errore: numero stagioni assente"); 
        else if ($_POST['Trama']=="") $error=DBAccess::createKey("Errore: trama assente"); 
        else if ($_POST['IData']!="") $error=DBAccess::createKey("La data d'inizio non è nel formato corretto, AAAA-MM-GG"); 
        else if ($_POST['FData']!="") $error=DBAccess::createKey("La data di fine non è nel formato corretto, AAAA-MM-GG"); 
		unlink ( "./../Img/".$Titolo.".jpg");
        unset($_POST['Titolo']);
        unset($_POST['Genere']);
        unset($_POST['IData']);
        unset($_POST['FData']);
        unset($_POST['Stagioni']);
        unset($_POST['Trama']);
		header("location:./Addserie.php?error=".$error);
    }

	else{
        unset($_POST['Titolo']);
        unset($_POST['Genere']);
        unset($_POST['IData']);
        unset($_POST['FData']);
        unset($_POST['Stagioni']);
        unset($_POST['Trama']);
		if($error!="")
        header("location:./Addserie.php?error=".$error);
        else{
        	$error=DBAccess::createKey("Serie aggiunta");
        	header("location:./Addserie.php?error=".$error);
        }
	}
}
echo "<div id=\"content\">";
	if(isset($_GET['error'])) 
  	echo "<div id=\"errore\"><p>".DBAccess::RetrieveData($_GET['error'])."</p></div>"; 
	echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\" enctype='multipart/form-data'>
		<fieldset>
		<label for=\"titolo\"><strong>Titolo</strong></label>
		<input type=\"text\" title=\"Titolo\" id=\"titolo\" name=\"Titolo\"/>
		<label for=\"selectgenere\"> <strong>Genere: </strong></label>
		<select id='selectgenere' name='Genere' title='Genere'>
            <option value=\"Thriller\">Thriller</option>
            <option value=\"Drammatico\">Drammatico</option>
            <option value=\"Commedia\">Commedia</option>
            <option value=\"Fantasy\">Fantasy</option>
            <option value=\"Fantascienza\">Fantascienza</option>
            <option value=\"Poliziesco\">Poliziesco</option>
            </select>
        <label for=\"datai\"><strong>Data d'inizio (AAAA-MM-GG)</strong></label>
		<input type=\"text\" title=\"Data di inizio\" id=\"datai\" name=\"IData\"/>
        <label for=\"dataf\"><strong>Data di fine (opzionale AAAA-MM-GG)</strong></label>
		<input type=\"text\" title=\"Data di fine\" id=\"dataf\" name=\"FData\" value=\"\"/>
        <label for=\"stag\"><strong>Numero Stagioni</strong></label>
		<input type=\"text\" title=\"Numero di stagioni\" id=\"stag\" name=\"Stagioni\"/>
        <label for=\"inputbox\"><strong>Trama</strong></label>
		<textarea id='inputbox' title=\"Trama\" name=\"Trama\" rows=\"15\" cols=\"10\"></textarea>
		<label for=\"img\"><strong>Immagine della serie</strong></label>
		<input type='file' title=\"Immagine della serie\" id=\"img\" name='userfile'/>
		<input type=\"submit\" title=\"Submit\" value=\"Submit\" id=\"submit\"/>
		</fieldset>
	</form>";

echo "
	<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Indietro</a>
	<a class=\"aiuti up\" href=\"#header\">Torna su</a>
</div>";
$Db=null;
?>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<p> Per contattarci scrivere a <a href="mailto:serieamente@gmail.com">serieamente@gmail.com</a></p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict"/></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>
</body>
</html>