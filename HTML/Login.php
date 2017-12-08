<?php
require_once "./MyLib.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Serie-a-mente </title>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<!-- <link type="text/css" rel="stylesheet" href="Style/small.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link type="text/css" rel="stylesheet" href="Style/print.css" media="print" /> -->

</head>

<body>
	

<div id="header">
	<h1>Serie-a-mente</h1>
</div>


<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Login</span></p>
</div>
<div id="menu">
	<ul>
		<li><a href="Home.php">Home</a></li>
	</ul>
</div>

<?php 
	
	if(!isset($_POST["Name"])){
		if(isset($_POST["URL"])){
			$URL=$_POST["URL"];
		}
		else
		{	
			$URL="./Home.php";
		}
			echo "
				<div id=\"content\">

					<form method=\"POST\"action=".$_SERVER['PHP_SELF']." class=\"container\">";
					if(isset($_GET['error']))
						echo "<p>Username o password sbagliati</p>";
					echo "
						<label for=\"Name\">
							<b>Username</b>
						</label>
						<input type=\"text\" placeholder=\"Enter Username\" name=\"Name\" required=\"required\">
						<label for=\"Password\">
							<b>Password</b>
						</label>
						<input type=\"password\" placeholder=\"Enter Password\" name=\"Password\" required=\"required\">
						<input type=\"submit\"value=\"Submit\"\>
						<input type=\"hidden\" name=\"URL\" value=\"".$URL."\"\>
					</form>
					<div class=\"container\">
						<a href=\"".$URL."\" class=\"cancelbtn\">Back</a>
					</div>
				</div>";
	}
	else{
		if(!isset($_SESSION) || session_id()==''){

			if(LogInUtente($_POST['Name'],$_POST['Password']))
				header("location:".$_POST["URL"]);
			else 
				header("location:./Login.php?error");
		}
		else {
			header("location:".$_POST["URL"]);
		}
	}
	?>


<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>
</body>
</html>
</html>