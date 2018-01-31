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
			<select name='Voti' title='Voti'>
                <option selected='selected'>".$serie['Voto']."</option>
                <option value='NULL'>NULL</option>
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option> 
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
</ul>
</div>

</body>
</html>