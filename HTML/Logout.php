
<?php 
	session_start();
	session_destroy();
	header("location:http://localhost:81/TecWeb/TecWeb/HTML/Home.php");
