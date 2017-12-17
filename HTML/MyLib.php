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
		echo "
		<li><a href=\"Mypage.php\">Le mie serie</a></li>
		<li><p>Benvenuto ".$_SESSION["Name"]."</p></li>
		<div id=\"login\"><li><a href=\"logout.php\">Logout</a></li></div>";
	}

}

function LoadCachedFile($G)
{
	$Gen=$G;
	$G="./ServerCache/".$G."Cache.txt";
	if(file_exists ($G))
	{
		$myfile=fopen($G,"r") or die("<p>Errore: la ricerca è fallita<\p>");
        
		if($Gen!="Notizie"){
			$timefile = fgets($myfile);
			if($timefile<(time()+600)){
			fclose($myfile);
			RegenerateCacheGenere($Gen);
			}
			$myfile=fopen($G,"r") or die("<p>Errore: la ricerca è fallita<\p>");
			fgets($myfile);
			printCache($myfile,$G);
		}
		else{
			printCache($myfile,$G);
			}
		fclose($myfile);
}else
echo "<img src=\"../Img/download.jpg\">";
}

function printCache($file,$path)
{
	if(!feof($file))
		echo fread($file, filesize($path)+1);
	else echo "<p>Ohh Crap nessuna informazione disponibile, forse non ci saranno mai o forse proprio in questo momento ne ho aggiunta una, chi lo sa stronzetto.</p>";
}

function RegenerateCacheNotizie($file)
{
 	$hostname = "localhost";
	$dbname = "TecWeb";
	$user ="root";
	$pass ="";
	$path="./ServerCache/".$file."Cache.txt";
	try{
		$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);
	}catch(PDOException $e){
		echo "Errore:".$e->getMessage();
		die();
	}
    $myfile=fopen($path,"w");
    $runnable=$db->prepare("SELECT Titolo,Data,Contenuto,SerieTv FROM Notizie ORDER BY Data DESC");
		$runnable->execute();
		$notizie = $runnable->fetchAll();

foreach ($notizie as $notizia) {
	fwrite($myfile,"<div class=\"notizia\"><h1>".$notizia["Titolo"]."</h1><h1>".$notizia["Data"]."</h1><h2>".$notizia["SerieTv"]."</h2><p>".$notizia["Contenuto"]."</p></div>\n");
}

$db=null;
$runnable=null;
fclose($myfile);
}
function RegenerateCacheGenere($file){
		$hostname = "localhost";
		$dbname = "TecWeb";
		$user ="root";
		$pass ="";
		$path="./ServerCache/".$file."Cache.txt";
		try{
	$db = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);
	}catch(PDOException $e){
		echo "Errore:".$e->getMessage();
		die();
	}
    $myfile=fopen($path,"w");
    $runnable=$db->prepare("SELECT Titolo,Valutazione FROM SerieTV WHERE Genere=?");
    $runnable->execute(array($file));
    fwrite($myfile,time());
	$series = $runnable->fetchAll();
	if($series!=null)
	{

		fwrite($myfile,"\n<ul id=\"ListaSerie\">");
	
	foreach ($series as $serie) {
    	fwrite($myfile,"\n <li class=\"ELSerie\">
        <a href=\"Serie.php?name=".$serie['Titolo']."\">" .$serie['Titolo']. "</a><p>".$serie['Valutazione']."/5</p></li>");
	}
		fwrite($myfile,"</ul>");
	}

$db=null;
$runnable=null;
fclose($myfile);

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
if($series!=null){
echo "<table class=\"ListaSerie\">
			<tr>
				<th> Genere </th>
				<th> Titolo </th>
				<th> Valutazione </th>
			</tr>";
foreach ($series as $serie) {
		echo "
			<tr>
				<td> <a href=\"".$serie['Genere'].".php\">".$serie['Genere']."  </a></td>
				<td> <a href=\"Serie.php?name=".$serie['Titolo']."\">".$serie['Titolo']." </a></td>
				<td> <p> ".$serie['Valutazione']."</p> </td>
			
			</tr>


		";
	}
	echo "</table>";
}
else{
echo "<p>
Nessun risultato.
</p>";
}
	unset($db);
	unset($runnable);

}

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
        die();
        }
    $runnable=$db->prepare("SELECT Admin FROM utente WHERE NickName=? AND Password=?");
    $runnable->execute(array($User,$Password));
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
?>