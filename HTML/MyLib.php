<?php
function LogInButton()
{
session_start();
	
	if(!isset($_SESSION["Name"]) || session_id()==''){
		echo 
		"<li><a href=\"Login.php\">Le mie serie</a></li>
		<div id=\"login\">
		<li>
		<form action=\"Login.php\" method=\"POST\">
		
		<input type=\"hidden\" name=\"URL\" value=\"".$_SERVER['REQUEST_URI']."\" />
		<input id=\"TastoLogIn\" type=\"submit\" value=\"Login\" />
		</form>
		</li>
		</div>
		";
	}
	else
	{
<<<<<<< HEAD
=======
		if($_SESSION["Admin"]==true)echo "Cacca";
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
		echo "
		<li><a href=\"Mypage.php\">Le mie serie</a></li>
		<li><p>Benvenuto ".$_SESSION["Name"]."</p></li>
		<div id=\"login\"><li><a href=\"logout.php\">Logout</a></li></div>";
	}


	
	
echo"
</div>
	";
}

function LoadCachedFile($G)
{
<<<<<<< HEAD
	$Gen=$G;
	$G="./ServerCache/".$G."Cache.txt";
=======
	$G="./ServerCache/".$G;
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
	if(file_exists ($G))
	{
		$myfile=fopen($G,"r") or die("<p>Errore: la ricerca è fallita<\p>");
		
<<<<<<< HEAD
		if(fgets($myfile)>=(time()-600)){
			printCache($myfile,$G);

			fclose($myfile);
		}
		else{
			fclose($myfile);
			RegenerateCache($G,$Gen);
		}
=======
		if(fgets($myfile)>=(time()-600))
			printCache($myfile,$G);
		else
			RegenerateCache($myfile);
		fclose($myfile);
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
	}
	else echo "<p>Errore: il server ha fuckappato GG WP questa cosa succederà ogni volta tu arriverai in questa pagina till I fix it so fucking goodbye bitch. </p>
	<p>
	<img src=\"./../img/download.jpg\">
	P.S. Dannato Sexy Ballan</p>";
}
<<<<<<< HEAD


=======
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
function printCache($file,$path)
{
	if(!feof($file))
		echo fread($file, filesize($path));
	else echo "<p>Ohh Crap non ci sono serie TV disponibili di questo genere forse non ci saranno mai o forse proprio in questo momento ne ho aggiunta una, chi lo sa stronzetto.</p>";
}

<<<<<<< HEAD
function RegenerateCache($file,$Genere){
	$hostname = "localhost";
	$dbname = "TecWeb";
	$user ="root";
	$pass ="";
	try{
$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);
}catch(PDOException $e){
echo "Errore:".$e->getMessage();
die();
}

$myfile=fopen($file,"w");
$runnable=$db->prepare("SELECT Titolo,Valutazione FROM SerieTV WHERE Genere=?");
$runnable->execute(array($Genere));
fwrite($myfile,time());
	$series = $runnable->fetchAll();
	foreach ($series as $serie) {
    	fwrite($myfile,"\n <div class=\"ListaSerie\"><a href=\"Serie.php?name=".$serie['Titolo']."\">" .$serie['Titolo']. "</a><p>".$serie['Valutazione']."/5</p>");
	}

$db=null;
$runnable=null;
fclose($myfile);
LoadCachedFile($Genere);
// chiudi connessione

}
function Ricerca($name){
			$hostname = "localhost";
		$dbname = "TecWeb";
		$user ="root";
		$pass ="";
		try{
	$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);
	}catch(PDOException $e){
		echo "Errore:".$e->getMessage();
		die();
	}

	$runnable=$db->prepare("SELECT Titolo,Genere,Valutazione FROM SerieTV WHERE Titolo LIKE '".$name."%' OR Titolo LIKE '% ".$name."%' " );
	$runnable->execute(array($name));
	
	$series = $runnable->fetchAll();

$i=0;
foreach ($series as $serie) {
		$i=$i+1;
		echo "<div class=\"ListaSerie\">
		<a href=\"".$serie['Genere'].".php\">
		<img src=\"./../img/".$serie['Genere']."Icon.jpg\" alt=\"Link Genere ".$serie['Genere']."\">
		</a><a href=\"Serie.php?name=".$serie['Titolo']."\">
		" .$serie['Titolo']. "
		</a><p>
		".$serie['Valutazione'].
		"/5
		</p>";
	}
	$db=null;
	$runnable=null;
	if($i==0)
		echo "<p>Ohh Crap non ci sono serie TV disponibili di questo genere forse non ci saranno mai o forse proprio in questo momento ne ho aggiunta una, chi lo sa stronzetto.</p>";

}
=======
function RegenerateCache($file){echo "to do";}
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
function LogInUtente($User,$Password)
{
	$hostname = "localhost";
	$dbname = "TecWeb";
	$user ="root";
	$pass ="";
	try{
$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);
}catch(PDOException $e){
echo "Errore:".$e->getMessage();
<<<<<<< HEAD
die();
=======
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
}
$runnable=$db->prepare("SELECT Admin FROM utente WHERE NickName=? AND Password=?");
$runnable->execute(array($User,$Password));

<<<<<<< HEAD
	$data=$runnable->fetchAll();
	   $count = 0;
    foreach($data as $d) {
    	session_start();
        $_SESSION["Name"]=$User;
		$_SESSION["Admin"]=$data["Admin"];
        $count++;
    }

    if($count!=1){

        $_SESSION["Name"]=null;
		$_SESSION["Admin"]=null;
		session_destroy();

		$db=null;
		$runnable=null;
		return false;
	}
	
	$db=null;
	$runnable=null;
	return true;
}
=======
if($runnable->rowCount()==1)
{
	$data=$runnable->fetch();
	session_start();
	$_SESSION["Name"]=$User;
	$_SESSION["Admin"]=$data["Admin"];
	return true;
}
return false;
}
>>>>>>> 3efeb538890bb197817ac1484fd4b978ebb52042
?>