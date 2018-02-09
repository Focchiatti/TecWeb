<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php header('Content-Type: application/xhtml+xml');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Aggiungi notizia</title>
	<meta name="title" content="aggiungi notizia Serie-a-mente"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="description" content="Pagina che permette di aggiungere una nuova notizia"/>
	<meta name="keywords" content="notizie, news, nuova, serietv, televisione, memoria"/>
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
</div>

<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span> >> Aggiungi Notizie</p>
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

	if (!isset($_SESSION["Admin"]) || (isset($_SESSION["Admin"])&&$_SESSION["Admin"]==0))  {
    	header("location:".$_SESSION['CallingPage']);
    }

    if(isset($_POST['Titolo'])&&isset($_POST['Data'])&&isset($_POST['Contenuto'])&&isset($_POST['Serie'])) {
        $Db=new DBAccess();
        if($Db->AggiungiNews($_POST['Titolo'],$_POST['Data'],$_POST['Contenuto'],$_POST['Serie'])){
        	$error=DBAccess::createKey("Notizia aggiunta");
        	unset($_POST['Titolo']);
        	unset($_POST['Data']);
        	unset($_POST['Contenuto']);
        	unset($_POST['Serie']);
        	header("location: ./Addnews.php?error=".$error);
        }
        else {
        	if ($_POST['Titolo']=="") $error=DBAccess::createKey("Errore: titolo assente"); 
            else if ($_POST['Data']=="") $error=DBAccess::createKey("Errore: data assente"); 
            else if ($_POST['Contenuto']=="") $error=DBAccess::createKey("Errore: contenuto assente"); 
            else $error=DBAccess::createKey("Errore: La data non è nel formato corretto, AAAA-MM-GG"); 
        	unset($_POST['Titolo']);
        	unset($_POST['Data']);
        	unset($_POST['Contenuto']);
        	unset($_POST['Serie']);
        	header("location: ./Addnews.php?error=".$error);
        }
    }
	else{
		echo "
		<div id=\"content\">";
		if(isset($_GET['error']))
		echo "<div id=\"errore\"><p>".DBAccess::RetrieveData($_GET['error'])."</p></div>"; 
			echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">";
            $Db=new DBAccess();
            $Series=$Db->Get_Serie();
			echo "
			<fieldset>
				<label for=\"titolo\"><strong>Titolo</strong></label>
				<input type=\"text\" title=\"Titolo\" id=\"titolo\" name=\"Titolo\"/>
                <label for=\"data\"><strong>Data  (AAAA-MM-GG)</strong></label>
				<input type=\"text\" title=\"Data\" id=\"data\" name=\"Data\" value=\"".date("Y-m-d")."\"/>
                <label for=\"inputbox\"><strong>Contenuto</strong></label>
                <textarea id='inputbox' title=\"Contenuto\" name=\"Contenuto\" rows=\"15\" cols=\"10\"></textarea>
                <label for=\"serie\"><strong>Serie</strong></label>
				<select name=\"Serie\" title=\"Serie\" id=\"serie\">";
	            foreach($Series as $serie){
	                echo"<option value='".$serie[0]."'> ".DBAccess::RetrieveData($serie[0])."</option>";
	            }
				echo"</select>
				<input type=\"submit\" title=\"Submit\" value=\"Submit\" id=\"submit\"/>
			</fieldset>
			</form>";

			echo "
				<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Indietro</a>
				<a class=\"aiuti up\" href=\"#header\">Torna su</a>
		</div>";
	}
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