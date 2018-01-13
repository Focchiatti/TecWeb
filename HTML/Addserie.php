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

		<div id="content">	
		<?php 
		
		if(isset($_GET['error']))
			echo "<p>".$_GET['error']."</p>";
		session_start();
        if(!isset($_SESSION['CallingPage']))
        {
            $_SESSION['CallingPage']="./Home.php";
        }

        if (!isset($_SESSION["Admin"]) || (isset($_SESSION["Admin"])&&$_SESSION["Admin"]==0)) {
        	header("location:".$_SESSION['CallingPage']);
        }
        if(isset($_POST['Titolo']))
        {
            $Db=new DBAccess();
			$Titolo=DBAccess::createKey($_POST['Titolo']);
			if(DataWriter::UploadFile($_FILES['userfile'],$Titolo))
			$error="";
			else $error="Upload Fallito";
            if($error==""&&($Db->AggiungiSerie($Titolo,$_POST['Genere'],$_POST['IData'],$_POST['FData'],$_POST['Stagioni'],$_POST['Trama'])))
            {
				$error=="Campi mal Compilati";
                unset($_POST['Titolo']);
                unset($_POST['Genere']);
                unset($_POST['IData']);
                unset($_POST['FData']);
                unset($_POST['Stagioni']);
                unset($_POST['Trama']);

                header("location:".$_SERVER['PHP_SELF']);
            }
			else{
				$error=="Upload Fallito";
                unset($_POST['Titolo']);
                unset($_POST['Genere']);
                unset($_POST['IData']);
                unset($_POST['FData']);
                unset($_POST['Stagioni']);
                unset($_POST['Trama']);
				
                header("location:./Addserie.php?error=".$error);
			}
        }
				echo "
						<form method=\"POST\"action=".$_SERVER['PHP_SELF']." class=\"container\" enctype='multipart/form-data'>

							<label for=\"Titolo\">
								<b>Titolo</b>
							</label>
							<input type=\"text\" placeholder=\"Inserisci il Titolo\" name=\"Titolo\" required=\"required\">
							<label for=\"Genere\">
								<b>Genere: </b>
							<select name=\"Genere\">
                                <option value=\"thriller\"> Thriller</option>
                                <option value=\"drammatico\"> Drammatico</option>
                                <option value=\"commedia\"> Commedia</option>
                                <option value=\"fantastico\"> Fantastico</option>
                                <option value=\"fantascienza\"> Fantascienza</option>
                                <option value=\"poliziesco\"> Poliziesco</option>
							<\select>
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
							<textarea id='inputbox' placeholder=\"Inserisci la trama\" name=\"Trama\" required=\"required\"></textarea></br>
							<label for=\"file\">
								<b>Immagine della serie</b>
							</label>
							<input type='file' name='userfile'></br>
							<input type=\"submit\"value=\"Submit\"/>
							
						</form>
						
						";



						echo "
						<div class=\"container\">
							<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
						</div>
						";

						echo"
					</div>";

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