<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<body>
<?php 
	
	if(!isset($_POST["Name"])){
	if(isset($_POST["URL"])){
		$URL=$_POST["URL"];
	}
	else
	{	
		$URL="http://localhost:81/TecWeb/TecWeb/HTML/Home.php";
	}
		echo "
		<form method=\"POST\"action=".$_SERVER['PHP_SELF'].">
		<input type=\"submit\"\>
		<input type=\"hidden\" name=\"URL\" value=\"".$URL."\"\>
		<input type=\"text\" name=\"Name\" value=\"Serve DB\"\>
		</form>";
	}
	else{
		if(!isset($_SESSION) || session_id()==''){
			session_start();
			$_SESSION["Name"]=$_POST["Name"];
			header("location:".$_POST["URL"]);
		}
		else {
			header("location:".$_POST["URL"]);
		}
	}
	?>
	
</body>