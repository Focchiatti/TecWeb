<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php header('Content-Type: application/xhtml+xml');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Registrazione </title>
	<meta name="title" content="registrazione Serie-a-mente"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="description" content="Pagina di registrazione"/>
	<meta name="keywords" content="registrazione, serietv, televisione, memoria"/>
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
	<p>Ti trovi in: Registrazione</p>
	<a class="aiuti" href="#content">Vai al contenuto</a>
</div>

<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<ul class="nav-item">
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">Notizie</a></li>
</ul>
</div>
<?php 

	session_start();
	if(!isset($_POST['Name'])) {
		echo 
		"<div id=\"content\">";
			if(isset($_GET['error']))
				echo "<div id=\"errore\"> <p>".DBAccess::RetrieveData($_GET['error'])."</p></div>";
			echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">
				<fieldset>
				<label for=\"name\"><strong>Username</strong></label>
				<input type=\"text\" title=\"Username\" id=\"name\" name=\"Name\" />
				<label for=\"password\"><strong>Password</strong></label> 
				<input type=\"password\" title=\"Password\" id=\"password\" name=\"Password\"/>
				<input type=\"submit\" id=\"submit\" title=\"Registrati\" value=\"Registrati\"/>
				</fieldset>
			</form>";
			if(!isset($_SESSION['CallingPage'])){
				$_SESSION['CallingPage']="./Home.php";
			}
			else
			{
				$_SESSION['ThisPage']=$_SESSION['CallingPage'];
			}
			echo 
				"<a href=\"./Login.php\" class=\"cancelbtn\">Indietro</a>
				<a class=\"aiuti\" href=\"#header\">Torna su</a>
		</div>";
	}
	else {
		$Db=new DBAccess();
		$utenti=$Db->ReadUtenti();
		$name=strtolower($_POST['Name']);
		$utenti=array_map('strtolower',$utenti);
		if(!in_array($name,$utenti)) {
			if($Db->RegistraUtente($_POST['Name'],$_POST['Password'])) {
				unset($_POST['Name']);
        		unset($_POST['Password']);
				header("location: ./RegistrazioneEffettuata.php");
			}
			else{
				$error=DBAccess::createKey("Compilare tutti i campi");
				unset($_POST['Name']);
        		unset($_POST['Password']);
				header("location: ./Registrazione.php?error=".$error);
			}
		}
		else {
			$error=DBAccess::createKey("Username già presente");
			unset($_POST['Name']);
        	unset($_POST['Password']);
			header("location: ./Registrazione.php?error=".$error);

	}} 
	$Db=null;
?>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<p> Per contattarci scrivere a <a href="mailto:serieamente@gmail.com">serieamente@gmail.com</a></p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>
</body>
</html>