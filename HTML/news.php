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
	<p>Ti trovi in: <span xml:lang="en">Home >>
    <span xml:lang="en">News
		</span>
	</p>
</div>

<div id="hamburger">
	<a href="#smallmenu">&#9776;</a>
</div> 

<div id="menu">
<ul>
		<a name="menu"></a>
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
				if($notizia!=null)
				{
						$element=min($resultPage,count($notizia)-$page*$resultPage);
						$start=$page*$resultPage;
					for($i=$start;$i<$start+$element;$i=$i+1) {
						echo
						"<div class=\"notizia\">
						<h4>".$notizia[$i]["Data"]."</h4>
						<h4>".DBAccess::RetrieveData($notizia[$i]["SerieTv"])."</h4>
						<h2>".$notizia[$i]["Titolo"]."</h2>
						<p>".$notizia[$i]["Contenuto"]."</p>
						</div>\n";
					}
					$url=strtok($_SERVER["REQUEST_URI"],'?');
					echo "<ul id='pageNavigation'>";
					for($i=0;$i<$page;$i=$i+1)
					{
						echo "<li><a href='".$url."?page=".$i."'>".$i."</a></li>";
					}
					echo "<li><p>".$page."</p></li>";
					for($i=$page+1;$i<floor(count($notizia)/$resultPage)+1;$i=$i+1)
					{
					echo "<li><a href='".$url."?page=".$i."'>".$i."</a></li>";
					}
					echo "</ul>";
				}
				?>
	</div>				
<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
</div>

<div id="smallmenu">
<ul>
		<a name="smallmenu"></a>
		<li><a href="Home.php">Home</a></li>
		<li><p>News</p></li>
		
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	<li id="up"><a href="#top">Torna su</a></li>
</ul>
</div>
</body>
</html>