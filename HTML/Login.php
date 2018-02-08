<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Login </title>
	<meta name="title" content="Serie-a-mente login"/>
	<meta name="description" content="Pagina di login"/>
	<meta name="keywords" content="login, serietv, televisione, memoria"/>
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
	<p>Ti trovi in: <span xml:lang="en">Login</span></p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>



<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<ul class="nav-item">
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
</ul>
</div>
	<?php 
	session_start();
	if(!isset($_POST["Name"])){
		echo 
		"<div id=\"content\">";
			if(isset($_GET['error']))
				echo "<div id=\"errore\"> <p>Username o password sbagliati</p></div>";
			echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">
				<fieldset>
				<label for=\"user\"><strong>Username</strong></label>
				<input type=\"text\" title=\"Username\" id=\"user\" name=\"Name\" />
				<label for=\"pwd\"><strong>Password</strong></label>
				<input type=\"password\" title=\"Password\" id=\"pwd\" name=\"Password\"/>
				<input type=\"submit\" id=\"submit\" title=\"Login\" value=\"Login\"/>
				</fieldset>
			</form>";
			if(!isset($_SESSION['CallingPage'])){
				$_SESSION['CallingPage']="./Home.php";
			}
			else if(isset($_SESSION['ThisPage'])&&$_SESSION['ThisPage']!="./Login.php")
			{
				$_SESSION['CallingPage']=$_SESSION['ThisPage'];
				$_SESSION['ThisPage']="./Login.php";
			}
			echo 
				"<div class=\"registra\"><a href=\"Registrazione.php\">Oppure registrati</a></div>
				<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
				<a class=\"aiuti\" href=\"#header\">Torna su</a>
		</div>";
	}
	else{
		$Db=new DBAccess();
		if($Db->LogInUtente($_POST['Name'],$_POST['Password'])){
			header("location:".$_SESSION['CallingPage']);
		}
		else 
			header("location:./Login.php?error");
	}
	?>


<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict"/></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>

</body>
</html>