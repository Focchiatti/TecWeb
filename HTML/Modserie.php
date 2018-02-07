<?php
require_once "./DataWriter.php";
require_once "./DBAccess.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Modifica serie </title>
	<meta name="title" content="Serie-a-mente modifica serie"/>
	<meta name="description" content="Pagina di amministrazione che permette di modificare i campi dati di una serietv"/>
	<meta name="keywords" content="modifica, amministrazione, serietv, televisione, memoria"/>
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
	<p>Ti trovi in: <span xml:lang="en">Home</span> >> Modifica Serie</p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>


<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<ul class="nav-item">
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

	$Db=new DBAccess();
	if (isset($_POST['Titolo'])&&isset($_POST['Genere'])&&isset($_POST['IData'])&&isset($_POST['Stagioni'])&&isset($_POST['Trama'])){
		$DataF="";
		if(isset($_POST['FData']))
		$DataF=$_POST['FData'];
		$result=$Db->AggiornaSerie($_POST['Titolo'],$_POST['Genere'],$_POST['IData'],$DataF,$_POST['Stagioni'],$_POST['Trama']);
		if ($result==false) 
			header("location: ./Modserie.php?Titolo=".$_POST['Titolo']."&error=Campi%20mal%20compilati");
		else 
			header("location: ./Serie.php?name=".$_POST['Titolo']);
	}
	else{
		$serie=$Db->RicercaSpecifica($_GET['Titolo']);
		if($serie){
			$Titolo=DBAccess::RetrieveData($serie[0]["Titolo"]);
			$Genere=$serie[0]["Genere"];
			$Trama=$serie[0]["Trama"];
			$DataI=$serie[0]["DataInizio"];
			$DataF=$serie[0]["DataFine"];
			$Stag=$serie[0]["Stagioni"];
		}

		echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\" enctype='multipart/form-data'>
			<fieldset>
			<label for=\"titolo\"><strong>Titolo</strong></label>
			<input type=\"hidden\" title=\"Titolo\" id=\"titolo\" name=\"Titolo\" value=\"".DBAccess::createKey($Titolo)."\"/>
			<input type=\"text\" title=\"Titolo\" name=\"Titolo\" value=\"".$Titolo."\" disabled=\"disabled\"/>
			<label for=\"selectgenere\"> <strong>Genere: </strong></label>
			<select id='selectgenere' name='Genere' title='Genere'>";
			if ($Genere=="Thriller")
				echo "<option value=\"Thriller\" selected='selected'>Thriller</option>";
			else 
				echo" <option value=\"Thriller\">Thriller</option>";
			if ($Genere=="Drammatico")
				echo "<option value=\"Drammatico\"selected='selected'>Drammatico</option>";
			else 
				echo" <option value=\"Drammatico\">Drammatico</option>";
			if ($Genere=="Commedia")
				echo "<option value=\"Commedia\" selected='selected'>Commedia</option>";
			else 
				echo" <option value=\"Commedia\">Commedia</option>";
			if ($Genere=="Fantasy")
				echo "<option value=\"Fantasy\" selected='selected'>Fantasy</option>";
			else 
				echo" <option value=\"Fantasy\">Fantasy</option>";
			if ($Genere=="Fantascienza")
				echo "<option value=\"Fantascienza\" selected='selected'>Fantascienza</option>";
			else 
				echo" <option value=\"Fantascienza\">Fantascienza</option>";
			if ($Genere=="Poliziesco")
				echo "<option value=\"Poliziesco\" selected='selected'>Poliziesco</option>";
			else 
				echo" <option value=\"Poliziesco\">Poliziesco</option>";
	        echo
	        	"</select>
		        <label for=\"datainizio\"><strong>Data d'inizio (AAAA-MM-GG)</strong></label>
				<input type=\"text\" title=\"Data di inizio\" id=\"datainizio\" name=\"IData\" value=\"".$DataI."\"/>
		        <label for=\"datafine\"><strong>Data di fine (opzionale AAAA-MM-GG)</strong></label>
				<input type=\"text\" title=\"Data di fine\" id=\"datafine\" name=\"FData\" value=\"".$DataF."\"/>
		        <label for=\"stag\"><strong>Numero Stagioni</strong></label>
				<input type=\"text\" title=\"Numero di stagioni\" id=\"stag\" name=\"Stagioni\" value=\"".$Stag."\"/>
		        <label for=\"inputbox\"><strong>Trama</strong></label>
				<textarea id='inputbox' title=\"Trama\" name=\"Trama\" rows=\"15\" cols=\"10\" >".$Trama."</textarea>
				<input type=\"submit\" title=\"Submit\" value=\"Submit\" id=\"submit\"/>
				</fieldset>
				</form>";
		echo "
		<div class=\"container\">
			<a href=\"./Serie.php?name=".DBAccess::createKey($Titolo)."\" class=\"cancelbtn\">Back</a>
	</div>
		<a class=\"aiuti\" href=\"#header\">Torna su</a>
	</div>";
	}
?>


<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>
</body>
</html>
