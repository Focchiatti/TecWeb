<?php
	class DBAccess
		{
			private const HOST_DB="localhost";
			private const USERNAME="root";
			private const PASSWORD="";
			private const DATABASE_NAME="tecweb";
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

			public function RicercaSerie($data){
					$query=$this->connessione->prepare("SELECT Titolo FROM SerieTV WHERE Titolo = '".$data."'"	);
					$query->execute(array($data))	;
					return $query->fetchAll();
			}

        public function RicercaSerieUtente($data){
            $query=$this->connessione->prepare("SELECT Titoloserie,Voto FROM Valutazione WHERE NickName= '".$data."' "	);
            $query->execute(array($data));
            return $query->fetchAll();
        }
        public function RicercaSerieUtenteNonSeguita($utente,$serie){
        $query=$this->connessione->prepare("SELECT 1 FROM Valutazione WHERE NickName= ? AND TitoloSerie = ?");
        $query->execute(array($utente,$serie));
        return $query->fetchAll()==NULL?true:false;
    }
    public function RimuoviSerieSeguita($serie,$utente)
    {
        $query = $this->connessione->prepare("DELETE FROM Valutazione WHERE NickName= ? AND TitoloSerie = ?");
        return $query->execute(array($utente, $serie));
    }

			public function AggiornaVoto($voto,$serie,$nick){
                $query=$this->connessione->prepare("UPDATE valutazione SET Voto=".$voto." WHERE Valutazione.NickName= '".$nick."' AND Valutazione.Titoloserie= '".$serie."' "	);
                return $query->execute();
			}

        public function AggiungiMieSerie($serie,$nick){
            $query=$this->connessione->prepare("INSERT INTO valutazione(Titoloserie	,NickName) values ('".$serie."','".$nick."') "	);
            return $query->execute();
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
            public function AggiungiSerie($Titolo,$Genere,$IData,$FData,$Stagioni,$Trama)
			{
	            $runnable=$this->connessione->prepare("INSERT INTO SerieTV(Titolo,Genere,DataInizio,DataFine,Stagioni,Trama) values('".$Titolo."','".$Genere."','".$IData."','".$TFData."','".$Stagioni."','".$Trama."')");
	    		return $runnable->execute();
	
			}
            public function AggiungiNews($Titolo,$Data,$Contenuto,$Serie)
			{
				$runnable=$this->connessione->prepare("INSERT INTO Notizie(Titolo,Data,Contenuto,SerieTV) values('".$Titolo."','".$Data."','".$Contenuto."','".$Serie."')");
	    		return $runnable->execute();
			}
            public function Get_Serie()
			{

				$runnable=$this->connessione->prepare("SELECT Titolo FROM SerieTV");
                $runnable->execute();
	    		return $runnable->fetchAll();
                  	
			}
		}
?>
