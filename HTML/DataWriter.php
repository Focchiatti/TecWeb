<?php
//
// 	TODO Stampa Notizie senza cache
//
//
//
//
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
		public static function DBPrintDataAboutGenere($data)
	{
		$MyDBConnection=new DBAccess();
		$series=$MyDBConnection->ReadGenere($data);
		if($series!=null)
		{
			echo " <ul id=\"ListaSerie\">";
			foreach ($series as $serie) 
			{
				echo
	    		" <li class=\"ELSerie\">
	        		<a href=\"Serie.php?name=".$serie['Titolo']."\">" .DBAccess::RetrieveData($serie['Titolo']). "</a>
	        		<p>".$serie['Valutazione']."/5</p>
	        	</li>";
			}
			echo "</ul>";
		}
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
			echo "<table id=\"RisultatoRicerca\">
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
						<td> <a href=\"Serie.php?name=".$serie['Titolo']."\">".DBAccess::RetrieveData($serie['Titolo'])." </a></td>
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
	public static function UploadFile($File,$Name)
	{
		$target_dir = "../Img/";
		$target_file = $target_dir.basename($File["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$newname=$target_dir.$Name.".".$imageFileType;
		// Check if image file is a actual image or fake image
		if(isset($File["tmp_name"])) {
			$check = getimagesize($File["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($File["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg") {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return false;
		// if everything is ok, try to upload file
		} else {
			return move_uploaded_file($File["tmp_name"], $newname);
		}
	}
	public static function LogInButton()
	{
		if (!isset($_SESSION)){
		session_start();}
			$_SESSION["CallingPage"]=$_SERVER['REQUEST_URI'];
		if(!isset($_SESSION["Name"]) || session_id()==''){
			echo 
			"<li><a href=\"Login.php\">Le mie serie</a></li>
			<li id=\"login\">
			<a href=\"Login.php\"> Login </a>
			</li>
			";
		}
		else
		{
            if($_SESSION["Admin"]==1){
            echo "
            <li><a href=\"Addserie.php\">Aggiungi serie</a></li>
            <li><a href=\"Addnews.php\">Aggiungi notizie</a></li>

            <div id=\"login\"><li><a href=\"Logout.php\">Logout</a></li>";

            }
			else if (basename($_SERVER['PHP_SELF'])== 'Mypage.php'){
			echo "
			<li><p>Le serie di:".$_SESSION["Name"]."</p></li>
			<li id=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
			else {
				echo "
			<li><a href= \"Mypage.php\">Le serie di:".$_SESSION["Name"]."</a></li>
			<li id=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
		}
	}
}
?>
