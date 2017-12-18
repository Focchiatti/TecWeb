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
		<p>Ti trovi in: Aggiungi serie</p>
	</div>

	<div id="menu">
	<ul>
			<li><a href="Home.php">Home</a></li>
	</ul>
	</div>

		<div id="content">	
		<?php 
		
		if(isset($_GET['error']))
			echo "<p>Campi mal compilati</p>";
		session_start();
				echo "
						<form method=\"POST\"action=".$_SERVER['PHP_SELF']." class=\"container\">

							<label for=\"Titolo\">
								<b>Titolo</b>
							</label>
							<input type=\"text\" placeholder=\"Inserisci il Titolo\" name=\"Titolo\" required=\"required\">
							<label for=\"Genere\">
								<b>Inserisci il genere</b>
							</label>
                                <input type=\"radio\" name=\"Genere\" value=\"thriller\" checked/> Thriller<br>
                                <input type=\"radio\" name=\"Genere\" value=\"drammatico\"/> Drammatico<br>
                                <input type=\"radio\" name=\"Genere\" value=\"commedia\"/> Commedia<br>
                                <input type=\"radio\" name=\"Genere\" value=\"fantastico\"/> Fantastico<br>
                                <input type=\"radio\" name=\"Genere\" value=\"fantascienza\"/> Fantascienza<br>
                                <input type=\"radio\" name=\"Genere\" value=\"poliziesco\"/> Poliziesco<br>
                            <label for=\"IData\">
								<b>Data d'inizio</b>
							</label>
							<input type=\"text\" placeholder=\"aaaa-mm-gg\" name=\"IData\" required=\"required\"/>
                            <label for=\"FData\">
								<b>Data di fine</b>
							</label>
							<input type=\"text\" placeholder=\"aaaa-mm-gg (opzionale)\" name=\"FData\"/>
                            <label for=\"Stagioni\">
								<b>Numero Stagioni</b>
							</label>
							<input type=\"number\" placeholder=\"Inserisci il numero di stagioni\" name=\"Stagioni\" required=\"required\"/>
                            <label for=\"Trama\">
								<b>Trama</b>
							</label>
							<input type=\"text\" placeholder=\"Inserisci la trama\" name=\"Trama\" required=\"required\"/>
							<input type=\"submit\"value=\"Submit\"/>
						</form>
						
						";

						if(!isset($_SESSION['CallingPage']))
						{
							$_SESSION['CallingPage']="./Home.php";
						}

						echo "
						<div class=\"container\">
							<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
						</div>
						";

						echo"
					</div>";
        if(isset($_POST['Titolo']))
        {
            $Db=new DBAccess();
            if(($Db->AggiungiSerie($_POST['Titolo'],$_POST['Genere'],$_POST['IData'],$_POST['FData'],$_POST['Stagioni'],$_POST['Trama'])))
            {
	            unset($_POST['Titolo']);
	            unset($_POST['Genere']);
	            unset($_POST['IData']);
	            unset($_POST['FData']);
	            unset($_POST['Stagioni']);
	            unset($_POST['Trama']);

	            header("location:".$_SERVER['PHP_SELF']);
			}
			else
			{ 
            header("location:./Addserie.php?error");
			}
		}
		?>


	<div id="footer">
		<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	</div>
	</body>
	</html>