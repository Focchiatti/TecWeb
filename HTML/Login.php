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
		<p>Ti trovi in: <span xml:lang="en">Login</span></p>
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
		if(!isset($_POST["Name"]))
		{
				echo "
					<div id=\"content\">

						<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\" class=\"container\">";
						if(isset($_GET['error']))
							echo "<p>Username o password sbagliati</p>";
						echo "<fieldset>
							<label>
								<strong>Username</strong>
							</label>
							<input type=\"text\" title=\"Username\" name=\"Name\" />
							<label>
								<strong>Password</strong>
							</label>
							<input type=\"password\" title=\"Password\" name=\"Password\"/>
							<input id=\"submit\" type=\"submit\" value=\"Submit\"/>
							</fieldset>
						</form>
						";
						if(!isset($_SESSION['CallingPage']))
						{
							$_SESSION['CallingPage']="./Home.php";
						}
						echo "
							<a href=\"".$_SESSION["CallingPage"]."\" class=\"cancelbtn\">Back</a>
						
					</div>";
		}
		else{
			{
				$Db=new DBAccess();
				if($Db->LogInUtente($_POST['Name'],$_POST['Password']))
				{
					header("location:".$_SESSION['CallingPage']);
				}
				else 
					header("location:./Login.php?error");
			}
		}
		?>


	<div id="footer">
		<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
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