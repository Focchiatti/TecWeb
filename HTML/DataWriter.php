<?php
require_once "./DBAccess.php";
class DataWriter
{
	public static function DBPrintDataAboutGenere($data){
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
		else echo "<p>Nessun dato</p>";
	}

	public static function RicercaTitolo($Titolo){
		$MyDBConnection=new DBAccess();
		
		$series=$MyDBConnection->Ricerca($Titolo);
		if($series!=null){
			echo "<table id=\"RisultatoRicerca\" summary=\"In questa tabella vengono mostrati i risultati della ricerca. Per ogni risultato viene mostrato il genere, il titolo e la valutazione\">
				<thead>
				<tr>
					<th scope=\"col\"> Titolo </th>				
					<th scope=\"col\"> Genere </th>
					<th scope=\"col\"> Valutazione </th>
				</tr>
				</thead>";
			foreach ($series as $serie) {
				echo "
				<tbody>
				<tr>
					<th scope=\"row\"> <a href=\"Serie.php?name=".$serie['Titolo']."\">".DBAccess::RetrieveData($serie['Titolo'])." </a></th>
					<td> <a href=\"".$serie['Genere'].".php\">".$serie['Genere']."  </a></td>
					<td> ".$serie['Valutazione']."</td>
				</tr>
				</tbody>";
			}
			echo "</table>";
		}
		else{
			echo "<p>Nessun risultato.</p>";
		}
   	}

	public static function UploadFile($File,$Name){
		$target_dir = "../Img/";
		$target_file = $target_dir.basename($File["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$newname=$target_dir.$Name.".".$imageFileType;
		if(isset($File["tmp_name"])) {
			$check = getimagesize($File["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$error="File non corretto, deve essere un'immagine JPG";
				$uploadOk = 0;
			}
		}
		if ($uploadOk&&$File["size"] > 500000) {
			$error="Dimensione massima di 500kb superata";
			$uploadOk = 0;
		}
		if($uploadOk&&$imageFileType != "jpg") {
			$error="Solo file JPG permessi";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			return $error;
		} else {
			return move_uploaded_file($File["tmp_name"], $newname)?"":"Upload Fallito lato Server";
		}
	}

	public static function LogInButton(){
		if (!isset($_SESSION)){
		session_start();}
			$_SESSION["CallingPage"]=$_SERVER['REQUEST_URI'];
		if(!isset($_SESSION["Name"]) || session_id()==''){
			echo 
			"<li><a href=\"Login.php\">Le mie serie</a></li>
			<li class=\"login\">
			<a href=\"Login.php\"> Login o Registrati</a>
			</li>
			";
		}
		else{
            if($_SESSION["Admin"]==1){
            echo "
            <li><a href=\"Addserie.php\">Aggiungi serie</a></li>
            <li><a href=\"Addnews.php\">Aggiungi notizie</a></li>

            <li class=\"login\"><a href=\"Logout.php\">Logout</a></li>";

            }
			else if (basename($_SERVER['PHP_SELF'])== 'Mypage.php'){
			echo "
			<li><p>Le serie di:".$_SESSION["Name"]."</p></li>
			<li class=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
			else {
				echo "
			<li><a href= \"Mypage.php\">Le serie di:".$_SESSION["Name"]."</a></li>
			<li class=\"login\"><a href=\"Logout.php\">Logout</a></li>";
			}
		}
	}
}
?>
