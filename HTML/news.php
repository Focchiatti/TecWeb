
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
<?php
require_once "./MyLib.php";

	$hostname = "localhost";
	$dbname = "TecWeb";
	$user ="root";
	$pass ="";
	try{
$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(PDOException $e){
	echo "Errore:".$e->getMessage();
	die();
}
$runnable=$db->prepare("SELECT Titolo,Data,Contenuto,SerieTv FROM Notizie");
$runnable->execute(array());
$i=0;
$notizie = $runnable->fetchAll();
$Titoli=array();
$Date=array();
$Contenuti=array();
$Serie=array();
foreach ($notizie as $notizia) {
	$Titoli[$i]=$notizia["Titolo"];
	$Date[$i]=$notizia["Data"];
	$Contenuti[$i]=$notizia["Contenuto"];
    $Serie[$i]=$notizia["SerieTv"];
    $i=$i+1;
}
$db=null;
$runnable=null;
if ($i==0){
	echo "<p>Non ci sono notize</p>";
}
echo "
<div id=\"breadcrumbs\">
	<p>Ti trovi in: <span xml:lang=\"en\">Home >>
    <span xml:lang=\"en\">News>
		</span>
	</p>
</div>

<div id=\"menu\">
<ul>
		<li><a href=\"Home.php\">Home</a></li>
		<li><p>News</p></li>";
	LogInButton();
	echo "
</ul>
</div>

<div id=\"content\">";
$j=0;
while ($i!=$j){
    echo "<h3>".$Titoli[$j]."</h3><h4>".$Date[$j]."</h4><p>".$Contenuti[$j]."</p><a href=\"Serie.php?name=".$Serie[$j]."\">" .$Serie[$j]. "</a>";
    $j=$j+1;
}


echo 
"</div><div id=\"footer\">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang=\"en\">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>
</body>
</html>";