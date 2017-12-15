<?php
	class DBAccess
		{
			private const HOST_DB="localhost";
			private const USERNAME="root";
			private const PASSWORD="";
			private const DATABASE_NAME="mfocchia";
			private $connessione;
			
			function __construct() 
			{
				if($this->openDBConnection()!=true)
				{
						die("Connessione al database fallita");
				}
			}	
			
			function __destruct() 
			{
				$this->closeDBConnection();
			}	
			
			//Initialize
			private function openDBConnection()
			{
				try
				{
					$this->connessione = new PDO ("mysql:host=".DBAccess::HOST_DB.";dbname=".DBAccess::DATABASE_NAME,DBAccess::USERNAME,DBAccess::PASSWORD);
				}
				catch(PDOException $e)
				{
					return false;
				}
				return true;
			}
			
			//Deinitialize
			private function closeDBConnection()
			{
					$this->connessione=NULL;
			}
			
			//Public
			public function ReadNotizie()
			{
					$query=$this->connessione->prepare("SELECT Titolo,Data,Contenuto,SerieTv FROM Notizie ORDER BY Data DESC");
					$query->execute();
					return $query->fetchAll();
			}
			
			public function ReadGenere($Genere)
			{
				    $query=$this->connessione->prepare("SELECT Titolo,Valutazione FROM SerieTV WHERE Genere=?");
				    $query->execute(array($Genere));
				    return $query->fetchAll();
			}
			public function Ricerca($data)
			{
					$query=$this->connessione->prepare("SELECT Titolo,Genere,Valutazione FROM SerieTV WHERE Titolo LIKE '".$data."%' OR Titolo LIKE '% ".$data."%' " );
					$query->execute(array($data))	;
					return $query->fetchAll();
			}
			public function RicercaSpecifica($data)
			{
					$query=$this->connessione->prepare("SELECT Titolo,Genere,Trama FROM SerieTV WHERE Titolo LIKE '".$data."'"	);
					$query->execute(array($data))	;
					return $query->fetchAll();
			}
			
			public function LogInUtente($User,$Password)
			{

				$runnable=$this->connessione->prepare("SELECT NickName,Admin FROM Utente WHERE NickName=? AND Password=?");
	    		$runnable->execute(array($User,$Password));
	    		$datas=$runnable->fetchAll();
				if($datas!=NULL)
				{	
					session_start();
							
					foreach ($datas as $data) {
	        		$_SESSION["Name"]=$data['NickName'];
					$_SESSION["Admin"]=$data['Admin'];
					}

					return true;
				}
				return false;    	
			}
		}
?>
