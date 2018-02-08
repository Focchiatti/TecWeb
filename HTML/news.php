<?php
require_once "./DataWriter.php";
require_once "./DBAccess.php";
if(!isset($_GET['page']))
	$page=0;
else
	$page=$_GET['page'];
		$resultPage=2;
		$MyDBConnection=new DBAccess();
		$notizia=$MyDBConnection->ReadNotizie();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php header('Content-Type: application/xhtml+xml');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Notizie</title>
	<meta name="title" content="Serie-a-mente notizie"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="description" content="Pagina che mostra in ordine cronologico le notizie riguardanti le serietv"/>
	<meta name="keywords" content="notizie, news, televisione, memoria"/>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link rel="stylesheet" type="text/css"  href="../CSS/stylesmall.css" media="handheld, screen and (max-width:565px),
	only screen and (max-device-width:565px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/stylephone.css" media="handheld, screen and (max-width:480px),
	only screen and (max-device-width:480px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>

<div id="breadcrumbs">
	<p>Ti trovi in: <span xml:lang="en">Home</span> >><span xml:lang="en">News</span></p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>


<div id="menu">
	<label id="hamburger" for="nav-trigger">&#9776;</label>		
<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<ul class="nav-item">
	<li><a href="Home.php">Home</a></li>
	<li><p>News</p></li>
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
</ul>
</div>

<div id="content">
<?php
	if($notizia!=null){
		$element=min($resultPage,count($notizia)-$page*$resultPage);
		$start=$page*$resultPage;
		if ($element<=0) header("location:./news.php");
		for($i=$start;$i<$start+$element;$i=$i+1) {
			echo
			"<div class=\"notizia\">
			<h2>".$notizia[$i]["Titolo"]."</h2>
			<h4>".$notizia[$i]["Data"]."</h4>
			<h4>".DBAccess::RetrieveData($notizia[$i]["SerieTv"])."</h4>
			<p>".$notizia[$i]["Contenuto"]."</p>
			</div>\n";
		}
		$url=strtok($_SERVER["REQUEST_URI"],'?');
		echo "<ul id='pageNavigation'>\n";
		for($i=0;$i<$page;$i=$i+1){
			echo "<li><a href='".$url."?page=".$i."'>".$i."</a></li>\n";
		}
		echo "<li><p>".$page."</p></li>\n";
		$max=floor(count($notizia)/$resultPage)==count($notizia)/$resultPage?floor(count($notizia)/$resultPage):floor(count($notizia)/$resultPage)+1;
		for($i=$page+1;$i<$max;$i=$i+1){
			echo "<li><a href='".$url."?page=".$i."'>".$i."</a></li>\n";
		}
		echo "</ul>\n";
	}
?>
	<a class="aiuti" href="#header">Torna su</a>
</div>	

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>
</body>
</html>