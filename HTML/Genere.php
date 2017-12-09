<?php
if(!isset($_GET['Genere'])||$_GET['Genere']=="")
	header("location:./Home.php");
require_once ".\MyLib.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Serie-a-mente </title>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link type="text/css" rel="stylesheet" href="../CSS/stylesmall.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link type="text/css" rel="stylesheet" href="../CSS/styleprint.css" media="print" />

</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>


<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span> >> 
		<?php 
		if($_GET['Genere']=='Fantasy'||$_GET['Genere']=='Thriller')
			echo "<span xml:lang=\"en\">".$_GET['Genere']."</span>";
		else
			echo $_GET['Genere'];
	?></p>
</div>

<div id="menu">
<ul>
		<li><a href=Home.php>Home</a></li>
		<li><a href=news.php>News</a></li>
		
	<?php
	LogInButton();
	?>
</ul>
</div>

<div id="content">
	<h2><?php echo "Categoria ".$_GET['Genere'] ?></h2>
	<?php
		RicercaGenere($_GET['Genere']);
	?>
	
</div>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>
</body>
</html>