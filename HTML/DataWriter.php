<?php

require_once "./DBAccess.php";
class DataWriter
{
	
	private const DecayTimeSeconds = 600;
	//data è il nome di dato richiesto (Notizie o un genere) la funzione 
	//lo stampa prendendo dalla cache se possibile altrimenti rigenera la cache
	//richiedendo al DB
	public static function PrintDataAbout($data)
	{
		$filePath="./ServerCache/".$data."Cache.txt";
		if(file_exists($filePath))
		{
			$myfile=fopen($filePath,"a+") or die();
			
			//le notizie vengono aggiornate al aggiornamento del DB
			if($data=="Notizie")
			{

					flock($myfile,LOCK_SH);
					echo fread($myfile,filesize($filePath)+1);
					flock($myfile,LOCK_UN);

			}
			//se non sono notizie i dati richiesti controllo siano aggiornati a 10 minuti se
			//se non lo sono rigenero la cache altrimenti stampo la cache
			else
			{
				flock($myfile,LOCK_EX);
				$timefile = fgets($myfile);
				if($timefile<(time()- DataWriter::DecayTimeSeconds))
				{
					DataWriter::RefreshCacheGenere($myfile,$data);	
				}
				flock($myfile,LOCK_UN);
				flock($myfile,LOCK_SH);
					rewind($myfile);
					fgets($myfile);
					$var=fread($myfile, filesize($filePath)+1);
					if($var!=null)
					{
					echo $var;
					}
					else echo "Nessun dato trovato";
				flock($myfile,LOCK_UN);
			}
		fclose($myfile);
	
		}
		else
		echo "Stai sbagliando a non esistono dati con quel nome, sei forse tu dannatissimo sexy Ballan? <img src=\"../Img/download.jpg\">";
	}

	private static function RefreshCacheGenere($myfile,$Genere)
	{
		$MyDBConnection=new DBAccess();
		$series=$MyDBConnection->ReadGenere($Genere);
   		ftruncate($myfile,0);
   		rewind($myfile);
		fwrite($myfile,time());
		
		if($series!=null)
		{
			fwrite($myfile,"\n<ul id=\"ListaSerie\">");
			foreach ($series as $serie) 
			{
	    		fwrite($myfile,
	    		"\n <li class=\"ELSerie\">
	        		<a href=\"Serie.php?name=".$serie['Titolo']."\">" .$serie['Titolo']. "</a>
	        		<p>".$serie['Valutazione']."/5</p>
	        	</li>");
			}
			fwrite($myfile,"</ul>");
		}
	}
	
	public static function RefreshCacheNotizie(){

		$MyDBConnection=new DBAccess();
		$notizie=$MyDBConnection->ReadNotizie();
		
		if($notizie!=null)
		{

			$myfile=fopen("./ServerCache/NotizieCache.txt","w");
			flock($myfile,LOCK_EX);
			foreach ($notizie as $notizia) {
				fwrite($myfile,
					"<div class=\"notizia\"><h4>".$notizia["Data"]."</h4>
					<h4>".$notizia["SerieTv"]."</h4>
					<h2>".$notizia["Titolo"]."</h2>
					<p>".$notizia["Contenuto"]."</p>
					</div>\n");
			}
			flock($myfile,LOCK_UN);
		}
	}


	public static function RicercaTitolo($Titolo)
	{
		$MyDBConnection=new DBAccess();
		$series=$MyDBConnection->Ricerca($Titolo);
		if($series!=null)
		{
			echo "<table class=\"ListaSerie\">
				<tr>
					<th> Genere </th>
					<th> Titolo </th>
					<th> Valutazione </th>
				</tr>";
			foreach ($series as $serie) 
			{
				echo "
					<tr>
						<td> <a href=\"".$serie['Genere'].".php\">".$serie['Genere']."  </a></td>
						<td> <a href=\"Serie.php?name=".$serie['Titolo']."\">".$serie['Titolo']." </a></td>
						<td> <p> ".$serie['Valutazione']."</p> </td>
					
					</tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "<p>
			Nessun risultato.
			</p>";
		}
   	}

	public static function LogInButton()
	{

	session_start();
			$_SESSION["CallingPage"]=$_SERVER['REQUEST_URI'];
		if(!isset($_SESSION["Name"]) || session_id()==''){
			echo 
			"<li><a href=\"Login.php\">Le mie serie</a></li>
			<li id=\"login\">
			<a href=\"Login.php\"> Login </a>
			</div>
			</li>
			";
		}
		else
		{
			if (basename($_SERVER['PHP_SELF'])== 'Mypage.php'){
			echo "
			<li><p>Le mie serie</p></li>
			<li><p>Benvenuto ".$_SESSION["Name"]."</p></li>
			<li id=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
			else {
				echo "
			<li><a href= \"Mypage.php\">Le mie serie</a></li>
			<li><p>Benvenuto ".$_SESSION["Name"]."</p></li>
			<li id=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
		}
	}
}
?>
