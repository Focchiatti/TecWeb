<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Aggiungi notizia</title>
	<meta name="title" content="Serie-a-mente aggiungi notizia"/>
	<meta name="description" content="Pagina che permette di aggiungere una nuova notizia"/>
	<meta name="keywords" content="notizie, news, nuova, serietv, televisione, memoria"/>
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
	<p>Ti trovi in:<span xml:lang="en">Home</span> >> Aggiungi Notizie</p>
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
<?php 
	if(isset($_GET['error']))
		echo "<p>".$_GET['error']."</p>";
	session_start();

    if(!isset($_SESSION['CallingPage'])){
        $_SESSION['CallingPage']="./Home.php";
    }

	if (!isset($_SESSION["Admin"]) || (isset($_SESSION["Admin"])&&$_SESSION["Admin"]==0))  {
    	header("location:".$_SESSION['CallingPage']);
    }

    if(isset($_POST['Titolo'])&&isset($_POST['Data'])&&isset($_POST['Contenuto'])&&isset($_POST['Serie'])) {
        $Db=new DBAccess();
        if($Db->AggiungiNews($_POST['Titolo'],$_POST['Data'],$_POST['Contenuto'],$_POST['Serie'])){
        	$error="Notizia aggiunta";
        	unset($_POST['Titolo']);
        	unset($_POST['Data']);
        	unset($_POST['Contenuto']);
        	unset($_POST['Serie']);
        	header("location: ./Addnews.php?error=".$error);
        }
        else {
        	$error="Campi mal compilati";
        	unset($_POST['Titolo']);
        	unset($_POST['Data']);
        	unset($_POST['Contenuto']);
        	unset($_POST['Serie']);
        	header("location: ./Addnews.php?error=".$error);
        }
    }
	else{
		echo "
		<div id=\"content\">
			<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">";
            $Db=new DBAccess();
            $Series=$Db->Get_Serie();
			echo "
			<fieldset>
				<label><strong>Titolo</strong></label>
				<input type=\"text\" title=\"Titolo\" name=\"Titolo\"/>
                <label><strong>Data</strong></label>
				<input type=\"text\" title=\"Data\" name=\"Data\"/>
                <label><strong>Contenuto</strong></label>
                <textarea id='inputbox' title=\"Contenuto\" name=\"Contenuto\" rows=\"15\" cols=\"10\"></textarea>
                <label><strong>Serie</strong></label>
				<select name=\"Serie\" title=\"Serie\">";
	            foreach($Series as $serie){
	                echo"<option value='".$serie[0]."'> ".DBAccess::RetrieveData($serie[0])."</option>";
	            }
				echo"</select>
				<input type=\"submit\" title=\"Submit\" value=\"Submit\" id=\"submit\"/>
			</fieldset>
			</form>";

			echo "
			<div class=\"container\">
				<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
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

<div id="smallmenu">
<ul>

	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	<li id="up"><a href="#header">Torna su</a></li>
	<?php $Db=null ?>
</ul>
</div>

</body>
</html>