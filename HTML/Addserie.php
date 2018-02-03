<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Aggiungi serie</title>
	<meta name="title" content="Serie-a-mente aggiungi serie"/>
	<meta name="description" content="Pagina che permette di aggiungere al database una nuova serie"/>
	<meta name="keywords" content="amministrazione, nuova, serietv, televisione, memoria"/>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link rel="stylesheet" type="text/css"  href="../CSS/stylesmall.css" media="handheld, screen and (max-width:565px),
	only screen and (max-device-width:565px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>

<div id="breadcrumbs">
	<p>Ti trovi in:<span xml:lang="en">Home</span> >> Aggiungi Serie</p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>

<div id="hamburger">
	<a href="#smallmenu">&#9776;</a>
</div> 

<div id="menu">
<ul>
	<li><a href="Home.php">Home</a></li>
</ul>
</div>

<div id="content">	
<?php 

if(isset($_GET['error']))
	echo "<p>".$_GET['error']."</p>";
session_start();

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
		
		$error="Campi mal compilati";
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
        	$error="Serie aggiunta";
        	header("location:./Addserie.php?error=".$error);
        }
	}
}
echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\" enctype='multipart/form-data'>
		<fieldset>
		<label><strong>Titolo</strong></label>
		<input type=\"text\" title=\"Titolo\" name=\"Titolo\"/>
		<label> <strong>Genere: </strong></label>
		<select id='selectgenere' name='Genere' title='Genere'>
            <option value=\"Thriller\">Thriller</option>
            <option value=\"Drammatico\">Drammatico</option>
            <option value=\"Commedia\">Commedia</option>
            <option value=\"Fantasy\">Fantasy</option>
            <option value=\"Fantascienza\">Fantascienza</option>
            <option value=\"Poliziesco\">Poliziesco</option>
            </select>
        <label><strong>Data d'inizio (AAAA-MM-GG)</strong></label>
		<input type=\"text\" title=\"Data di inizio\" name=\"IData\"/>
        <label><strong>Data di fine (opzionale AAAA-MM-GG)</strong></label>
		<input type=\"text\" title=\"Data di fine\" name=\"FData\" value=\"\"/>
        <label><strong>Numero Stagioni</strong></label>
		<input type=\"text\" title=\"Numero di stagioni\" name=\"Stagioni\"/>
        <label><strong>Trama</strong></label>
		<textarea id='inputbox' title=\"Trama\" name=\"Trama\" rows=\"15\" cols=\"10\"></textarea>
		<label><strong>Immagine della serie</strong></label>
		<input type='file' title=\"Immagine della serie\" name='userfile'/>
		<input type=\"submit\" title=\"Submit\" value=\"Submit\" id=\"submit\"/>
		</fieldset>
	</form>";

echo "<div class=\"container\">
	<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
</div>";

echo "<a class=\"aiuti\" href=\"#header\">Torna su</a>
</div>";

?>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
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
	<?php $Db=null;?>
</ul>
</div>
</body>
</html>