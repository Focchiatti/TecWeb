
DROP TABLE IF EXISTS `SerieTV`;

CREATE TABLE `SerieTV` (
  `Titolo` varchar(100) NOT NULL,
  `Genere` varchar(20) NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine`  date,
  `Stagioni` smallint NOT NULL DEFAULT 1,
  `Trama` text(1500),
  `Valutazione` decimal(5,2) DEFAULT NULL, 
  PRIMARY KEY (`Titolo`)
);

insert into `SerieTV`(`Titolo`,`Genere`,`DataInizio`,`DataFine`,`Stagioni`,`Trama`) values
('MrRobot','Thriller','2015-06-24',NULL,'2','Elliot Alderson è un giovane tecnico informatico di New York che lavora come esperto di sicurezza informatica alla ditta Allsafe. Sociofobico, schizofrenico, la mente di Elliot è pesantemente influenzata dai deliri paranoici e dalle allucinazioni che gli causano grossi problemi nel relazionarsi con le persone e lo fanno vivere in un costante stato di ansia e paranoia. Nella vita privata Elliot è uno stalker informatico che tratta le persone come computer da hackerare per scoprirne i segreti intimi e spesso agendo come una sorta di giustiziere informatico. Elliot viene avvicinato da Mr. Robot, un misterioso anarchico-insurrezionalista, che intende introdurlo in un gruppo di hacktivisti conosciuti con il nome di fsociety. Il manifesto di fsociety è liberare l''umanità dai debiti con le banche e smascherare i corruttori che stanno distruggendo il mondo. Per convincere il giovane a unirsi alla causa, Mr. Robot dichiara di voler causare il fallimento della potente multinazionale E Corp, ritenuta responsabile di un disastro ambientale che ha causato la morte del padre di Elliot e di altre centinaia di persone. La E Corp, percepita come "Evil Corp" (multinazionale malvagia) dal protagonista, è il cliente principale della Allsafe e per il quale Elliot sarà nominato supervisore della sicurezza informatica.'),
('How+to+get+away+with+a+murder','Thriller','2014-09-26',NULL,'4','La serie segue la vita professionale e privata della carismatica Annalise Keating, stimata avvocato e preziosa docente di diritto penale presso una prestigiosa Università di Filadelfia, la fittizia "Middleton University". Con la collaborazione dei "Keating Five", ovvero i 5 studenti scelti per assisterla nei casi giudiziari, e ai suoi associati Bonnie e Frank, Annalise si troverà a dover affrontare vari processi e, soprattutto, il caso di omicidio di una studentessa, che legherà lei, il suo amante e tutti gli altri all''incombente morte del marito Sam.'),
('Narcos','Drammatico','2015-08-08',NULL,'3','La serie racconta la storia vera della dilagante diffusione della cocaina tra Stati Uniti ed Europa negli anni ottanta. Le prime due stagioni sono incentrate sulla lotta delle autorità colombiane e della DEA contro il narcotrafficante Pablo Escobar e il cartello di Medellín. La terza stagione è incentrata sulla lotta al cartello di Cali, guidato dai fratelli Gilberto e Miguel Rodríguez Orejuela. La quarta stagione è ambientata in Messico è incentrata sull''origine del cartello di Juárez.'),
('Breaking+Bad','Drammatico','2008-01-20','2013-09-29','5','Walter White è un professore di chimica di Albuquerque. Vive con la moglie Skyler, incinta della loro secondogenita, e il figlio Walter "Flynn" Junior, affetto da una paralisi cerebrale, un disturbo che gli causa problemi di linguaggio e lo costringe a servirsi di stampelle per muoversi. Alla soglia del compimento dei cinquant''anni, Walter è costretto a svolgere un secondo lavoro come dipendente di un autolavaggio, per far fronte alle difficoltà economiche della famiglia. A tutto questo si aggiunge il profondo senso di insoddisfazione di Walter, che deve sopportare le angherie del suo titolare, dei suoi amici e familiari, i quali lo vedono come un uomo debole e remissivo. In particolare suo cognato Hank, agente della DEA, con cui peraltro ha un buon rapporto, non perde occasione per mettere a confronto la sua vita avventurosa con quella di Walter, totalmente priva di soddisfazioni. Quando a Walter viene diagnosticato un cancro ai polmoni, i suoi problemi sembrano precipitare. Tuttavia, in seguito al casuale incontro con Jesse Pinkman, un suo ex studente diventato uno spacciatore di poco conto, Walter decide di cucinare i cristalli di metanfetamina. Il prodotto di Walter si rivela però di qualità nettamente superiore rispetto alla concorrenza, con una purezza del 99,1%, derivante dalle sue conoscenze chimiche. Decide quindi di sfruttare le sue capacità per prendere il controllo del mercato della droga.'),
('Greys+Anatomy','Drammatico','2005-03-27',NULL,'13','Meredith Grey è una giovane ragazza di Boston che, dopo la laurea in medicina, riesce ad entrare nel gruppo di tirocinanti di chirurgia del Seattle Grace Hospital. Si trasferisce così a Seattle, nella vecchia casa appartenuta alla madre. Qui si trova a condividere la nuova esperienza insieme ad un gruppo di giovani coetanei, tutti alle prese con i più svariati problemi, sentimentali e non. Meredith è figlia di Ellis Grey, una dottoressa di fama mondiale specialista in chirurgia generale, cosa che le fa sentire molto il peso del suo cognome. La sera prima di iniziare il tirocinio, in un pub Meredith incontra Derek, un affascinante uomo con cui passa la notte; il giorno dopo scopre che in realtà lui è Derek Shepherd, neurochirurgo del Seattle Grace, nonché suo supervisore. Meredith deve così districarsi tra lo studio e il lavoro per poter diventare un chirurgo e i sentimenti che prova per Derek.'),
('The+Expanse','Fantascienza','2015-12-14',NULL,'2','Nel XXIV secolo, il sistema solare è stato colonizzato dagli umani e si trova in una situazione di precario equilibrio geopolitico a causa delle tensioni fra la Terra e le ex-colonie marziane, oramai indipendenti sotto il vessillo della Repubblica congressuale marziana, e del degrado sociale in cui sopravvive gran parte della popolazione degli avamposti nella fascia principale degli asteroidi e sui pianeti esterni. In questo difficile contesto, si intrecciano le vicende del detective di polizia Josephus Miller, di stanza su Cerere, a cui viene affidata l''indagine sulla scomparsa di una donna terrestre, Julie Andromeda Mao, e il secondo ufficiale del cargo porta ghiaccio Canterbury, James Holden, inavvertitamente coinvolto in un incidente che rischia di destabilizzare irreversibilmente le relazioni tra Marte e la Terra e innescare un conflitto interplanetario.'),
('Dirk+Gently+Agenzia+di+investigazione+olistica','Commedia','2016-10-22',NULL,'2','Quando Todd Brotzman, un rocker caduto in disgrazia, inciampa nella scena del crimine di un miliardario, la situazione precipita velocemente nel caos più assoluto. L''eccentrico Dirk Gently, un detective molto poco convenzionale, è convinto che loro siano destinati a districare gli eventi particolari che circondano il mistero insieme, che Todd lo voglia o meno. E sebbene questo non sia per niente facile, giacché diversi personaggi tanto folli quanto pericolosi si mettono in mezzo complicando le cose, ogni passo avanti, per quanto casuale, li avvicina alla verità.'),
('CSI+Miami','Poliziesco','2002-09-23','2012-05-08','12','Horatio Caine è un uomo preciso e altruista, qualità sicuramente non usuali in un agente della scientifica, soprattutto in una città come Miami. Lui, però, non potrebbe essere diversamente. Il crimine l\rquote ha segnato in prima persona, e da quel giorno difficile si è sempre mostrato disponibile e cordiale nei confronti delle persone a lui vicine, a cominciare dai membri della sua squadra, con i quali risolvono i crimini più efferati.');

DROP TABLE IF EXISTS `Notizie`;

CREATE TABLE `Notizie` (
    `Titolo` varchar(100) NOT NULL,
    `Data` date,
    `Contenuto` text (1500) NOT NULL,
    `SerieTv` varchar(30) NOT NULL,
    PRIMARY KEY (`Titolo`),
    FOREIGN KEY(`SerieTV`) REFERENCES `SerieTV`(`Titolo`) 
);

insert into `Notizie`(`Titolo`,`Data`,`Contenuto`,`SerieTV`)values
('Annunciata la terza stagione della serie','2017-07-24','è fissato per l''11 ottobre l''esordio della terza stagione della pluripremiata serie cult firmata da Sam Esmail, con Rami Malek nel ruolo dell''hacker sociopatico Elliot Alderson. Ripartiamo dunque dai colpi di scena e dai cliffhanger del finale della stagione 2 per provare a riflettere su cosa aspettarci da Mr. Robot per il prossimo autunno.','MrRobot'),
('Cranston, pianto per stop Breaking Bad','2017-10-20','Ironico, trascinantee: Bryan Cranston, che ha dato vita per cinque stagioni a Walter White, il professore di chimica malato terminale nella serie cult Breaking Bad, al Giffoni Film Festival ha conquistato i ragazzi, regalando anche un esilarante mini monologo improvvisato in grammelot italiano/napoletano. Non nasconde con quanta emozione abbia detto addio al personaggio. ''Ho pianto alla fine di ''Breaking Bad'', ma penso che l''autore Vince Gilligan, abbia creato la perfetta fine per la storia". L''attore 61 enne, ha raggiunto il successo dopo oltre 20 anni di gavetta, con oltre 150 ruoli all''attivo, vincitore di 6 Emmy e un Golden Globe, e ha ottenuto nel 2016 la prima nomination all''Oscar per Trumbo. Ha ora in uscita l''atteso Last Flag Flying di Richard Linklater, seguito ideale di L''ultima corvé di Hal Ashby; ha da poco finito Untouchable, il remake Usa di Quasi Amici, con Nicole Kidman e Kevin Hart e sarà tra le voci del nuovo film animato di Wes Anderson, Isle of dogs.','Breaking+Bad'),
('Messico, ucciso assistente di produzione: cercava location per la quarta stagione della serie','2017-10-10','Il suo era un ruolo fondamentale, trovava le location migliori per poter girare un film, o una serie tv, in un territorio difficile come quello messicano. Un lavoro che gli è costato la vita: Carlos Munoz Portal è stato trovato morto proprio mentre cercava i luoghi in cui girare la prossima, la quarta, stagione della serie di Netflix Narcos. Trentasette anni, assistente di produzione, Munoz Portal è stato ucciso in un''area vicina al confine con lo stato dell''Hidalgo, nel comune di Temascalapa. Beffa del destino, è stato assassinato esattamente come potrebbe accadere in una scena di Narcos: il corpo crivellato di colpi, poi nascosto nel bagagliaio della sua auto. In una zona che vanta il tragico primato del numero più alto di omicidi in tutto il Messico: solo nel mese di luglio ne sono stati registrati 182.','Narcos'),
('Ultima puntata vicina?','2017-11-11','Grey''s Anatomy ha da poco raggiunto il grande traguardo delle 300 puntate e sembra procedere spedito verso nuove stagioni ma, secondo alcune ipotesi che circolano ultimamente, sembra che la serie ci stia mandando dei segnali per indirizzarci vero la conclusione. Grey\rquote s Anatomy ultima puntata: ecco cosa potrebbe succedere! Shonda Rhimes è recentemente passata a Netflix, firmando un contratto per la realizzazione di nuove serie tv e, anche se questo non implica che le sue serie verranno automaticamente chiuse, è un elemento da tenere in considerazione. Il fatto che lei indirizzi i suoi interessi altrove, potrebbe portarla a decidere di chiudere Grey\rquote s Anatomy, così come sta accadendo per un\rquote altra delle sue serie, Scandal? Shonda Rhimes, comunque, ha garantito in più di un\rquote occasione che non sa quando Grey\rquote s Anatomy finirà e che, per il momento, il suo obiettivo è quello di battere il record delle 15 stagioni di E.R. \endash  Medici in prima linea.','Greys+Anatomy'),
('Mr Robot va a una festa di hacker nella prima foto della stagione 3','2017-12-11','A ottobre l''acclamata serie tv Mr. Robot farà ritorno per una terza stagione. oggi Entertainment Weekly ha diffuso la prima foto ufficiale dei nuovi episodi che mostra Elliot (Rami Malek) sorprendentemente sociale a un incontro di hacker. A quanto pare la comunità di hacher sembra piuttosto positiva di fronte allo stato del mondo. "La seconda stagione vedrà Elliot pronto a riprendere in mano la propria esistenza e a combattere contro le persone che lo stanno usando" ha spiegato il creatore della serie Sam Esmail, svelando che il team al centro dei dieci nuovi episodi sarà la disintegrazione. "Elliot non si lascerà più andare e non permetterà che questo accada."','MrRobot');

DROP TABLE IF EXISTS `Utente`;

CREATE TABLE `Utente` (
    `NickName` varchar(30) NOT NULL,
    `Password` varchar(20) NOT NULL,
    `Admin` bool NOT NULL DEFAULT 0,
     PRIMARY KEY (`NickName`)
);
 
/*Data for the table `Utente` */

insert into `Utente`(`NickName`,`Password`)values
('ElenaGi','748539'),
('MatteoSi','453543'),
('Carla89','687365'),
('DavideSe','786239'),
('NicolaT1','678987'),
('XxX_pUsSyDeStRoYeR_XxX','Sperminator'),
('LorenzoMi','976923'),
('utente','utente');
 insert into `Utente`(`NickName`,`Password`,`Admin`)values
 ('admin','admin',1);
/*Table structure for table `Valutazione` */

DROP TABLE IF EXISTS `Valutazione`;
 
CREATE TABLE `Valutazione`(
        `Titoloserie` varchar(30) NOT NULL,
    `Voto` smallint,
    `NickName` varchar(30),
    PRIMARY KEY (`Titoloserie`,`NickName`),
    FOREIGN KEY (`Titoloserie`) REFERENCES `SerieTV`(`Titolo`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE, 
    FOREIGN KEY (`NickName`) REFERENCES `Utente`(`NickName`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE VIEW MediaVoti as 
SELECT Titoloserie, avg(Voto) as Media
FROM Valutazione GROUP BY Titoloserie;

CREATE TRIGGER `UpdateMediaVotiInsert` AFTER INSERT ON `Valutazione` FOR EACH ROW UPDATE SerieTV SET SerieTV.Valutazione=(SELECT MediaVoti.Media from MediaVoti where MediaVoti.Titoloserie=SerieTV.Titolo) WHERE SerieTV.Titolo=NEW.TitoloSerie;
CREATE TRIGGER `UpdateMediaVotiUpdate` AFTER UPDATE ON `Valutazione` FOR EACH ROW UPDATE SerieTV SET SerieTV.Valutazione=(SELECT MediaVoti.Media from MediaVoti where MediaVoti.Titoloserie=SerieTV.Titolo) WHERE SerieTV.Titolo=NEW.TitoloSerie;
/*Data for the table `Valutazione` */
 
insert into `Valutazione`(`Titoloserie`,`Voto`,`NickName`)values
('MrRobot',4,'MatteoSi'),
('MrRobot',3,'ElenaGi'),
('How+to+get+away+with+a+murder',3,'NicolaT1'),
('How+to+get+away+with+a+murder',3,'Carla89'),
('Narcos',NULL,'LorenzoMi'),
('Narcos',3,'MatteoSi'),
('Narcos',NULL,'ElenaGi'),
('Breaking+Bad',5,'NicolaT1'),
('Breaking+Bad',4,'Carla89'),
('Breaking+Bad',5,'ElenaGi'),
('Breaking+Bad',5,'MatteoSi'),
('Breaking+Bad',1,'DavideSe'),
('Breaking+Bad',1,'LorenzoMi'),
('Greys+Anatomy',4,'DavideSe'),
('Greys+Anatomy',5,'LorenzoMi'),
('Greys+Anatomy',3,'Carla89'),
('Greys+Anatomy',2,'ElenaGi'),
('Greys+Anatomy',2,'utente'),
('Narcos',4,'utente'),
('The+Expanse',NULL,'utente');

