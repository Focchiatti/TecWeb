<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<body>
<?php 
	if(isset($_POST["URL"])){
		$URL=$_POST["URL"];
	}
	else
	{	
		$URL="http://localhost:81/TecWeb/TecWeb/HTML/Home.php";
	}
	if(!isset($_SESSION) || session_id()==''){
		session_start();
		$_SESSION["Name"]="Serve DB";
		header("location:".$URL);
	}
	else {
		session_start();
		$_SESSION["Name"]="Serve DB";
		header("location:".$URL);
	}
	?>
	
</body>

</html>
