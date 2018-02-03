<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Registrazione </title>
	<meta name="title" content="Serie-a-mente registrazione"/>
	<meta name="description" content="Pagina di registrazione"/>
	<meta name="keywords" content="registrazione, serietv, televisione, memoria"/>
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
	<p>Ti trovi in: <span xml:lang="en">Registrazione</span></p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>

<div id="hamburger">
	<a href="#smallmenu">&#9776;</a>
</div> 

<div id="menu">
<ul>
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
</ul>
</div>
<?php 

	session_start();
	if(!isset($_POST['Name'])) {
		echo 
		"<div id=\"content\">
			<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">";
			if(isset($_GET['error']))
				echo "<p>".$_GET['error']."</p>";
			echo "<fieldset>
				<label for=\"name\"><strong>Username</strong></label>
				<input type=\"text\" title=\"Username\" id=\"name\" name=\"Name\" />
				<label for=\"password\"><strong>Password</strong></label> 
				<input type=\"password\" title=\"Password\" id=\"password\" name=\"Password\"/>
				<input type=\"submit\" id=\"submit\" title=\"Registrati\" value=\"Registrati\"/>
				</fieldset>
			</form>";
			if(!isset($_SESSION['CallingPage'])) {
				$_SESSION['CallingPage']="./Home.php";
			}
			echo 
				"<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
				<a class=\"aiuti\" href=\"#header\">Torna su</a>
		</div>";
	}
	else {
		$Db=new DBAccess();
		$utenti=$Db->ReadUtenti();
		$name=strtolower($_POST['Name']);
		$utenti=array_map('strtolower',$utenti);
		if(!in_array($name,$utenti )) {
			if($Db->RegistraUtente($_POST['Name'],$_POST['Password'])) {
				unset($_POST['Name']);
        		unset($_POST['Password']);
				header("location: ./RegistrazioneEffettuata.php");
			}
			else{
				$error="Compilare tutti i campi";
				unset($_POST['Name']);
        		unset($_POST['Password']);
				header("location: ./Registrazione.php?error=".$error);
			}
		}
		else {
			$error="Username già presente";
			unset($_POST['Name']);
        	unset($_POST['Password']);
			header("location: ./Registrazione.php?error=".$error);

	}} 
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
	<li id="up"><a href="#header">Torna su</a></li>

</ul>
</div>
</body>
</html>