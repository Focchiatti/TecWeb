		<?php
	require_once "./DataWriter.php";
	
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Serie-a-mente </title>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
		<link rel="stylesheet" type="text/css"  href="../CSS/stylesmall.css" media="handheld, screen and (max-width:480px),
		only screen and (max-device-width:480px)" />
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
		session_start();
        if(!isset($_SESSION['CallingPage']))
        {
            $_SESSION['CallingPage']="./Home.php";
        }

		if (!isset($_SESSION["Admin"]) || (isset($_SESSION["Admin"])&&$_SESSION["Admin"]==0))  {
        	header("location:".$_SESSION['CallingPage']);
        }

        if(isset($_POST['Titolo']))
        {
            $Db=new DBAccess();
            $Db->AggiungiNews($_POST['Titolo'],$_POST['Data'],$_POST['Contenuto'],$_POST['Serie']);
            header("location:".$_SESSION["CallingPage"]);
        }
		else
		{
				echo "
					<div id=\"content\">
						<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">";
						if(isset($_GET['error']))
							echo "<p>Campi mal compilati</p>";
                        $Db=new DBAccess();
                        $Series=$Db->Get_Serie();
						echo "
						<fieldset>
							<label><strong>Titolo</strong></label>
							<input type=\"text\" title=\"Titolo\" name=\"Titolo\"/>
                            <label><strong>Data</strong></label>
							<input type=\"text\" title=\"Data\" name=\"Data\"/>
                            <label><strong>Contenuto</strong></label>
							<input type=\"text\" title=\"Contenuto\" name=\"Contenuto\"/>
                            <label><strong>Serie</strong></label>
							<select name=\"Serie\" title=\"Serie\">";
                        foreach($Series as $serie)
                        {
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
</ul>
</div>
	
	</body>
	</html>