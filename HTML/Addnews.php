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
		<a name="top"></a>
	<div id="header">
		<h1>Serie-a-mente</h1>
	</div>


	<div id="breadcrumbs">
		<p>Ti trovi in: Aggiungi serie</p>
	</div>

	<div id="hamburger">
		<a href="#smallmenu">&#9776;</a>
	</div> 

	<div id="menu">
	<ul>
		<a name="menu"></a>
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
						<form method=\"POST\"action=".$_SERVER['PHP_SELF']." class=\"container\">";
						if(isset($_GET['error']))
							echo "<p>Campi mal compilati</p>";
                        $Db=new DBAccess();
                        $Series=$Db->Get_Serie();
						echo "
							<label for=\"Titolo\">
								<b>Titolo</b>
							</label>
							<input type=\"text\" placeholder=\"Inserisci il Titolo\" name=\"Titolo\" required=\"required\">
                            <label for=\"Data\">
								<b>Data</b>
							</label>
							<input type=\"text\" placeholder=\"aaaa-mm-gg\" name=\"Data\" required=\"required\">
                            <label for=\"Contenuto\">
								<b>Contenuto</b>
							</label>
							<input type=\"text\" placeholder=\"Inserisci il contenuto della notizia\" name=\"Contenuto\" required=\"required\">
                            <label for=\"Serie\">
								<b>Serie</b>
							</label>
							<select name=\"Serie\">";
                        foreach($Series as $serie)
                        {
                                echo"<option value='".$serie[0]."'> ".$serie[0]."</option>";
                        }
						echo"</select><br/>
						<input type=\"submit\"value=\"Submit\"\></form>";

						echo "
						<div class=\"container\">
							<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
						</div>
						</div>";
		}

		?>


	<div id="footer">
		<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	</div>

<div id="smallmenu">
<ul>
		<a name="smallmenu"></a>
		<li><p>Home</p></li>
		<li><a href="news.php">News</a></li>
		
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	<li id="up"><a href="#top">Torna su</a></li>
</ul>
</div>
	
	</body>
	</html>