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
		if($_SESSION["Admin"]==true)echo "Cacca";
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
	$G="./ServerCache/".$G;
	if(file_exists ($G))
	{
		$myfile=fopen($G,"r") or die("<p>Errore: la ricerca è fallita<\p>");
		
		if(fgets($myfile)>=(time()-600))
			printCache($myfile,$G);
		else
			RegenerateCache($myfile);
		fclose($myfile);
	}
	else echo "<p>Errore: il server ha fuckappato GG WP questa cosa succederà ogni volta tu arriverai in questa pagina till I fix it so fucking goodbye bitch. </p>
	<p>
	<img src=\"./../img/download.jpg\">
	P.S. Dannato Sexy Ballan</p>";
}
function printCache($file,$path)
{
	if(!feof($file))
		echo fread($file, filesize($path));
	else echo "<p>Ohh Crap non ci sono serie TV disponibili di questo genere forse non ci saranno mai o forse proprio in questo momento ne ho aggiunta una, chi lo sa stronzetto.</p>";
}

function RegenerateCache($file){echo "to do";}
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
}
$runnable=$db->prepare("SELECT Admin FROM utente WHERE NickName=? AND Password=?");
$runnable->execute(array($User,$Password));

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