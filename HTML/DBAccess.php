<?php
class DBAccess
{
	const HOST_DB="localhost";
	const USERNAME="vmarcon";
	const PASSWORD="Aeph3eidei1ieSho";
	const DATABASE_NAME="vmarcon";
	public $connessione;
	
	function __construct() {
		if($this->openDBConnection()!=true)
		{
				die("Connessione al database fallita");
		}
	}	
	
	function __destruct() {
		$this->closeDBConnection();
	}

	public static function createKey($Data){
		
		$Key = preg_replace('/\s+/', '+', $Data);
		return $Key;
	}

	public static function RetrieveData($K){
		
		$Key = preg_replace('/\++/', ' ', $K);
		return $Key;
	}

	private function openDBConnection()
	{
		try
		{
			$this->connessione = new PDO ("mysql:host=".DBAccess::HOST_DB.";dbname=".DBAccess::DATABASE_NAME,DBAccess::USERNAME,DBAccess::PASSWORD);
			$this->connessione->setAttribute (PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING );
            $query=$this->connessione->prepare("SET NAMES 'utf8'");
            $query->execute();
		}
		catch(PDOException $e)
		{
			return false;
		}
		return true;
	}
	
	private function closeDBConnection(){
			$this->connessione=NULL;
	}
	
	public function ReadNotizie(){
			$query=$this->connessione->prepare("SELECT Titolo,Data,Contenuto,SerieTv FROM Notizie ORDER BY Data DESC");
			$query->execute();
			return $query->fetchAll();
	}
	
	public function ReadGenere($Genere){
		    $query=$this->connessione->prepare("SELECT Titolo,Valutazione FROM SerieTV WHERE Genere=?");
		    $query->execute(array($Genere));
		    return $query->fetchAll();
	}

	public function Ricerca($data){
		$string=DBAccess::createKey($data);
		$string=$string."%";
		$string2="%+".$string;
			$query=$this->connessione->prepare("SELECT Titolo,Genere,Valutazione FROM SerieTV WHERE Titolo LIKE ? OR Titolo LIKE ? " );
			$query->execute(array($string,$string2));
			return $query->fetchAll();
	}

	public function RicercaSpecifica($data){
			$query=$this->connessione->prepare("SELECT Titolo,Genere,Trama,DataInizio,DataFine,Stagioni,Valutazione FROM SerieTV WHERE Titolo LIKE ?");
			$query->execute(array(DBAccess::createKey($data)));
			return $query->fetchAll();
	}

	public function RicercaSerie($data){
			$query=$this->connessione->prepare("SELECT Titolo FROM SerieTV WHERE Titolo = ?");
			$query->execute(array(DBAccess::createKey($data)));
			return $query->fetchAll();
	}

    public function RicercaSerieUtente($data){
        $query=$this->connessione->prepare("SELECT Titoloserie,Voto FROM Valutazione WHERE NickName= '".$data."' "	);
        $query->execute(array($data));
        return $query->fetchAll();
    }

    public function RicercaSerieUtenteNonSeguita($utente,$serie){
        $query=$this->connessione->prepare("SELECT 1 FROM Valutazione WHERE NickName= ? AND TitoloSerie = ?");
        $query->execute(array($utente,DBAccess::createKey($serie)));
        return $query->fetchAll()==NULL?true:false;
	}

    public function RimuoviSerieSeguita($serie,$utente){
        $query = $this->connessione->prepare("DELETE FROM Valutazione WHERE NickName= ? AND TitoloSerie = ?");
        return $query->execute(array($utente,DBAccess::createKey($serie)));
    }

	public function AggiornaVoto($voto,$serie,$nick){
        $query=$this->connessione->prepare("UPDATE Valutazione SET Voto=".$voto." WHERE Valutazione.NickName= '".$nick."' AND Valutazione.Titoloserie= '".DBAccess::createKey($serie)."' "	);
        return $query->execute();
	}

	public function AggiungiMieSerie($serie,$nick){
		$key=DBAccess::createKey($serie);
        $query=$this->connessione->prepare("INSERT INTO Valutazione(Titoloserie	,NickName) values ('".$key."','".$nick."')"	);
        return $query->execute();
	}

	public function LogInUtente($User,$Password){

		$runnable=$this->connessione->prepare("SELECT NickName,Admin FROM Utente WHERE NickName=? AND Password=?");
		$runnable->execute(array($User,$Password));
		$datas=$runnable->fetchAll();
		if($datas!=NULL){	
			session_start();
					
			foreach ($datas as $data) {
    		$_SESSION["Name"]=$data['NickName'];
			$_SESSION["Admin"]=$data['Admin'];
			}

			return true;
		}
		return false;    	
	}

	public function ReadUtenti(){
		$query=$this->connessione->prepare("SELECT NickName FROM Utente");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_COLUMN);
	}

	public function RegistraUtente($User,$Password){
		if (isset($User)&&$User!=""&&isset($Password)&&$Password!=""){
		$runnable=$this->connessione->prepare("INSERT INTO Utente(NickName,Password) VALUES ('".$User."','".$Password."')");
		return $runnable->execute();
		}  	
	}
	
    public function AggiungiSerie($Titolo,$Genere,$IData,$FData,$Stagioni,$Trama)
	{
		$dataInizio = explode('-',$IData);
		$dataFine = explode('-',$FData);
		$approved=false;
		$null=false;
		if(!isset($FData)||$FData==""){
		$query="INSERT INTO SerieTV(Titolo,Genere,DataInizio,Stagioni,Trama) 
		values('".$Titolo."','".$Genere."','".$IData."','".$Stagioni."','".$Trama."')" ;
		$approved=true;
		$null=true;
		}
		else if(checkdate($dataFine[1],$dataFine[2],$dataFine[0]))
		$approved=true;
		if($approved&&isset($Titolo)&&$Titolo!=""&&isset($Genere)&&$Genere!=""&&isset($IData)&&
		checkdate($dataInizio[1],$dataInizio[2],$dataInizio[0])&&isset($Stagioni)&&$Stagioni!=""&&isset($Trama)&&$Trama!=""){
			if(!$null){
			$query="INSERT INTO SerieTV(Titolo,Genere,DataInizio,DataFine,Stagioni,Trama) 
			values('".$Titolo."','".$Genere."','".$IData."','".$FData."','".$Stagioni."','".$Trama."')";
		}
        $runnable=$this->connessione->prepare($query);
		return $runnable->execute();
		}
		else return false;
	}

	public function AggiornaSerie($Titolo,$Genere,$IData,$FData,$Stagioni,$Trama){
		$dataInizio = explode('-',$IData);
		$approved=false;
		$null=false;
		if(!isset($FData)||$FData==""){
			$approved=true;
			$null=true;
		}
		else {
			$dataFine = explode('-',$FData);
			if(checkdate($dataFine[1],$dataFine[2],$dataFine[0]))
				$approved=true;
		}
		if($approved&&isset($Titolo)&&$Titolo!=""&&isset($Genere)&&$Genere!=""&&isset($IData)&&
		checkdate($dataInizio[1],$dataInizio[2],$dataInizio[0])&&isset($Stagioni)&&$Stagioni!=""&&isset($Trama)&&$Trama!=""){
			
				$query="UPDATE SerieTV 
				SET Genere=?, DataInizio=?, DataFine=?, Stagioni=?, Trama=?
				WHERE Titolo LIKE ?";
			$runnable=$this->connessione->prepare($query);
			if(!$null){
    		return $runnable->execute(array($Genere,$IData,$FData,$Stagioni,$Trama,$Titolo));
			}
			else
				return $runnable->execute(array($Genere,$IData,NULL,$Stagioni,$Trama,$Titolo));
		}
		else return false;
	}

    public function AggiungiNews($Titolo,$Data,$Contenuto,$Serie){
    	$Datanews = explode('-',$Data);
    	if (isset($Titolo)&&$Titolo!=""&&isset($Contenuto)&&$Contenuto!=""&&isset($Serie)&&$Serie!=""&&isset($Data)&&checkdate($Datanews[1],$Datanews[2],$Datanews[0])){
    		$query="INSERT INTO Notizie(Titolo,Data,Contenuto,SerieTV) values('".$Titolo."','".$Data."','".$Contenuto."','".DBAccess::createKey($Serie)."')";
    		$runnable=$this->connessione->prepare($query);
    		return $runnable->execute();
    	}
    	else return false;
		
	}

    public function Get_Serie(){

		$runnable=$this->connessione->prepare("SELECT Titolo FROM SerieTV");
        $runnable->execute();
		return $runnable->fetchAll();   	
	}
}
?>
