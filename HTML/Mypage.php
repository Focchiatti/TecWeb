<?php
require_once "./DataWriter.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Pagina utente </title>
	<meta name="title" content="Serie-a-mente pagina utente"/>
	<meta name="description" content="Pagina che mostra le serietv seguite dall'utente e il relativo voto"/>
	<meta name="keywords" content="utente user voti televisione memoria"/>
	<link rel="stylesheet" type="text/css" href="../CSS/styledesktop.css" media="handheld, screen" /> 
	<link rel="stylesheet" type="text/css"  href="../CSS/stylesmall.css" media="handheld, screen and (max-width:565px),
	only screen and (max-device-width:565px)" />
	<link rel="stylesheet" type="text/css"  href="../CSS/styleprint.css" media="print" />
</head>

<body>

<div id="header">
	<h1>Serie-a-mente</h1>
</div>


<div id="breadcrumbs">
	<p>Ti trovi in: Home >> Le mie serie</p>
	<a class="aiuti" href="#content">Salta la navigazione</a>
</div>

<div id="hamburger">
	<a href="#smallmenu">&#9776;</a>
</div> 

<div id="menu">
<ul>
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>
	<?php
		DataWriter::LogInButton();
	?>
</ul>
</div>

<div id="content">
	<h2>Le mie serie</h2>
<?php
	$nick= $_SESSION["Name"];
	$Db=new DBAccess();
    if (isset($_POST['Voti'])){
	    $updated=$Db->AggiornaVoto($_POST['Voti'],$_POST['serie'],$nick);
	    header("location:".$_SERVER['PHP_SELF']);
    }
	$mieserie= $Db->RicercaSerieUtente($nick);
	if($mieserie!=null){
	    if(isset($updated)&&$updated){
	        echo "<p>Voto Aggiornato</p>";
	        $updated=false;
	    }
		foreach ($mieserie as $serie) {
			echo "<div class='lemieserie'>
            <form action=\"".$_SERVER['PHP_SELF']."\" method='post'>
            <fieldset>
			<a href=\"Serie.php?name=".$serie['Titoloserie']."\">".DBAccess::RetrieveData($serie['Titoloserie'])."</a>
			<input type=\"hidden\" title=\"Serie\" name=\"serie\" value=\"".$serie['Titoloserie']."\"/>";
			echo "
			<p>Il mio voto:</p>
			<select name='Voti' title='Voti'>";
			$j=$serie['Voto'];
			if ($j==""){ 	
				$j=6;
				echo "<option selected='selected' value='NULL'>Non votato</option>";
				for ($i=0; $i<$j; ++$i)
					echo"<option value='".$i."'>".$i."</option>";
			}
			else{
				echo "<option value='NULL'>Non votato</option>";
				for ($i=0; $i<$j; ++$i)
					echo"<option value='".$i."'>".$i."</option>";
				echo "<option selected='selected' value='".$j."'>".$j."</option>";
				for ($i=$j+1; $i<6; ++$i)
					echo"<option value='".$i."'>".$i."</option>";
			}
			echo"
            </select>
            <input class='submitvoto' type='submit' title='Vota' value='Vota'/>
            </fieldset>
            </form>
        </div>";
	    }
    }

?>
	<a class="aiuti" href="#header">Torna su</a>
</div>

<div id="footer">
	<p>Questo sito è stato creato per il corso di Tecnologie <span xml:lang="en">Web</span>. Non rappresenta in alcun modo le serie televisive rappresentate al suo interno </p>
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS" /></a>
</div>

<div id="smallmenu">
<ul>
	<li><a href="Home.php">Home</a></li>
	<li><a href="news.php">News</a></li>	
	<?php
		DataWriter::LogInButton();
		$_SESSION["UltimaRicerca"]=null;
	?>
	<li id="up"><a href="#header">Torna su</a></li>
<?php $Db=null?>
</ul>
</div>
</body>
</html>
