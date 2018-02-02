

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
('MrRobot','Thriller','2015-06-24',NULL,'2','<span xml:lang="en">Elliot Alderson</span> è un giovane tecnico informatico di <span xml:lang="en">New York</span> che lavora come esperto di sicurezza informatica alla ditta <span xml:lang="en">Allsafe</span>. Sociofobico, schizofrenico, la mente di <span xml:lang="en">Elliot</span> è pesantemente influenzata dai deliri paranoici e dalle allucinazioni che gli causano grossi problemi nel relazionarsi con le persone e lo fanno vivere in un costante stato di ansia e paranoia. Nella vita privata <span xml:lang="en">Elliot</span> è uno stalker informatico che tratta le persone come <span xml:lang="en">computer</span> da violare per scoprirne i segreti intimi e spesso agendo come una sorta di giustiziere informatico. <span xml:lang="en">Elliot</span> viene avvicinato da <span xml:lang="en">Mr. Robot</span>, un misterioso anarchico-insurrezionalista, che intende introdurlo in un gruppo di attivisti conosciuti con il nome di <span xml:lang="en">fsociety</span>. Il manifesto di <span xml:lang="en">fsociety</span> è liberare l''umanità dai debiti con le banche e smascherare i corruttori che stanno distruggendo il mondo. Per convincere il giovane a unirsi alla causa, <span xml:lang="en">Mr. Robot</span> dichiara di voler causare il fallimento della potente multinazionale <span xml:lang="en">E Corp</span>, ritenuta responsabile di un disastro ambientale che ha causato la morte del padre di <span xml:lang="en">Elliot</span> e di altre centinaia di persone. La <span xml:lang="en">E Corp</span>, percepita come <span xml:lang="en">"Evil Corp"</span> (multinazionale malvagia) dal protagonista, è il cliente principale della <span xml:lang="en">Allsafe</span> e per il quale <span xml:lang="en">Elliot</span> sarà nominato supervisore della sicurezza informatica.'),
('How+to+get+away+with+a+murder','Thriller','2014-09-26',NULL,'4','La serie segue la vita professionale e privata della carismatica <span xml:lang="en">Annalise Keating</span>, stimata avvocato e preziosa docente di diritto penale presso una prestigiosa Università di Filadelfia, la fittizia "<span xml:lang="en">Middleton University</span>". Con la collaborazione dei "<span xml:lang="en">Keating Five</span>", ovvero i 5 studenti scelti per assisterla nei casi giudiziari, e ai suoi associati <span xml:lang="en">Bonnie</span> e <span xml:lang="en">Frank</span>, <span xml:lang="en">Annalise</span> si troverà a dover affrontare vari processi e, soprattutto, il caso di omicidio di una studentessa, che legherà lei, il suo amante e tutti gli altri all''incombente morte del marito <span xml:lang="en">Sam</span>.'),
('Narcos','Drammatico','2015-08-08',NULL,'3','La serie racconta la storia vera della dilagante diffusione della cocaina tra Stati Uniti ed Europa negli anni ottanta. Le prime due stagioni sono incentrate sulla lotta delle autorità colombiane e della <acronym title="Drug Enforcement Administration" xml:lang="en">DEA</acronym> contro il narcotrafficante <span xml:lang="es">Pablo Escobar</span> e il cartello di <span xml:lang="es">Medellín</span>. La terza stagione è incentrata sulla lotta al cartello di <span xml:lang="es">Cali</span>, guidato dai fratelli Gilberto e <span xml:lang="es">Miguel Rodríguez Orejuela</span>. La quarta stagione è ambientata in Messico è incentrata sull''origine del cartello di <span xml:lang="es">Juárez</span>.'),
('Breaking+Bad','Drammatico','2008-01-20','2013-09-29','5','<span xml:lang="en">Walter White</span> è un professore di chimica di <span xml:lang="en">Albuquerque</span>. Vive con la moglie <span xml:lang="en">Skyler</span>, incinta della loro secondogenita, e il figlio <span xml:lang="en">Walter "<span xml:lang="en">Flynn</span>" <span xml:lang="en">Junior</span>, affetto da una paralisi cerebrale, un disturbo che gli causa problemi di linguaggio e lo costringe a servirsi di stampelle per muoversi. Alla soglia del compimento dei cinquant''anni, <span xml:lang="en">Walter</span> è costretto a svolgere un secondo lavoro come dipendente di un autolavaggio, per far fronte alle difficoltà economiche della famiglia. A tutto questo si aggiunge il profondo senso di insoddisfazione di <span xml:lang="en">Walter</span>, che deve sopportare le angherie del suo titolare, dei suoi amici e familiari, i quali lo vedono come un uomo debole e remissivo. In particolare suo cognato <span xml:lang="en">Hank</span>, agente della <acronym title="Drug Enforcement Administration" xml:lang="en">DEA</acronym>, con cui peraltro ha un buon rapporto, non perde occasione per mettere a confronto la sua vita avventurosa con quella di <span xml:lang="en">Walter</span>, totalmente priva di soddisfazioni. Quando a <span xml:lang="en">Walter</span> viene diagnosticato un cancro ai polmoni, i suoi problemi sembrano precipitare. Tuttavia, in seguito al casuale incontro con <span xml:lang="en">Jesse Pinkman</span>, un suo ex studente diventato uno spacciatore di poco conto, <span xml:lang="en">Walter</span> decide di cucinare i cristalli di metanfetamina. Il prodotto di <span xml:lang="en">Walter</span> si rivela però di qualità nettamente superiore rispetto alla concorrenza, con una purezza del 99,1%, derivante dalle sue conoscenze chimiche. Decide quindi di sfruttare le sue capacità per prendere il controllo del mercato della droga.'),
('Greys+Anatomy','Drammatico','2005-03-27',NULL,'13','<span xml:lang="en">Meredith Grey</span> è una giovane ragazza di <span xml:lang="en">Boston</span> che, dopo la laurea in medicina, riesce ad entrare nel gruppo di tirocinanti di chirurgia del <span xml:lang="en">Seattle Grace Hospital</span>. Si trasferisce così a <span xml:lang="en">Seattle</span>, nella vecchia casa appartenuta alla madre. Qui si trova a condividere la nuova esperienza insieme ad un gruppo di giovani coetanei, tutti alle prese con i più svariati problemi, sentimentali e non. <span xml:lang="en">Meredith</span> è figlia di <span xml:lang="en">Ellis Grey</span>, una dottoressa di fama mondiale specialista in chirurgia generale, cosa che le fa sentire molto il peso del suo cognome. La sera prima di iniziare il tirocinio, in un pub <span xml:lang="en">Meredith</span> incontra <span xml:lang="en">Derek</span>, un affascinante uomo con cui passa la notte; il giorno dopo scopre che in realtà lui è <span xml:lang="en">Derek Shepherd</span>, neurochirurgo del <span xml:lang="en">Seattle Grace</span>, nonché suo supervisore. <span xml:lang="en">Meredith</span> deve così districarsi tra lo studio e il lavoro per poter diventare un chirurgo e i sentimenti che prova per <span xml:lang="en">Derek</span>.'),
('The+Expanse','Fantascienza','2015-12-14',NULL,'2','Nel ventiquatttresimo secolo, il sistema solare è stato colonizzato dagli umani e si trova in una situazione di precario equilibrio geopolitico a causa delle tensioni fra la Terra e le ex-colonie marziane, oramai indipendenti sotto il vessillo della Repubblica congressuale marziana, e del degrado sociale in cui sopravvive gran parte della popolazione degli avamposti nella fascia principale degli asteroidi e sui pianeti esterni. In questo difficile contesto, si intrecciano le vicende del detective di polizia <span xml:lang="en">Josephus Miller</span>, di stanza su Cerere, a cui viene affidata l''indagine sulla scomparsa di una donna terrestre, <span xml:lang="en">Julie Andromeda Mao</span>, e il secondo ufficiale del cargo porta ghiaccio <span xml:lang="en">Canterbury</span>, <span xml:lang="en">James Holden</span>, inavvertitamente coinvolto in un incidente che rischia di destabilizzare irreversibilmente le relazioni tra Marte e la Terra e innescare un conflitto interplanetario.'),
('Dirk+Gently+Agenzia+di+investigazione+olistica','Commedia','2016-10-22',NULL,'2','Quando <span xml:lang="en">Todd Brotzman</span>, un <span xml:lang="en">rocker</span> caduto in disgrazia, inciampa nella scena del crimine di un miliardario, la situazione precipita velocemente nel caos più assoluto. L''eccentrico <span xml:lang="en">Dirk Gently</span>, un detective molto poco convenzionale, è convinto che loro siano destinati a districare gli eventi particolari che circondano il mistero insieme, che <span xml:lang="en">Todd</span> lo voglia o meno. E sebbene questo non sia per niente facile, giacché diversi personaggi tanto folli quanto pericolosi si mettono in mezzo complicando le cose, ogni passo avanti, per quanto casuale, li avvicina alla verità.'),
('CSI+Miami','Poliziesco','2002-09-23','2012-05-08','12','<span xml:lang="en">Horatio Caine</span> è un uomo preciso e altruista, qualità sicuramente non usuali in un agente della scientifica, soprattutto in una città come <span xml:lang="en">Miami</span>. Lui, però, non potrebbe essere diversamente. Il crimine l'' ha segnato in prima persona, e da quel giorno difficile si è sempre mostrato disponibile e cordiale nei confronti delle persone a lui vicine, a cominciare dai membri della sua squadra, con i quali risolvono i crimini più efferati.');

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
('Annunciata la terza stagione della serie','2017-07-24','è fissato per l''11 ottobre l''esordio della terza stagione della pluripremiata serie cult firmata da <span xml:lang="en">Sam Esmail</span>, con <span xml:lang="en">Rami Malek</span> nel ruolo dell''<span xml:lang="en">hacker</span> sociopatico <span xml:lang="en">Elliot Alderson</span>. Ripartiamo dunque dai colpi di scena e dai <span xml:lang="en">cliffhanger</span> del finale della stagione 2 per provare a riflettere su cosa aspettarci da <span xml:lang="en">Mr. Robot</span> per il prossimo autunno.','MrRobot'),
('<span xml:lang="en">Cranston</span>, pianto per stop <span xml:lang="en">Breaking Bad</span>','2017-10-20','Ironico, trascinantee: <span xml:lang="en">Bryan Cranston</span>, che ha dato vita per cinque stagioni a <span xml:lang="en">Walter White</span>, il professore di chimica malato terminale nella serie cult <span xml:lang="en">Breaking Bad</span>, al Giffoni Film Festival ha conquistato i ragazzi, regalando anche un esilarante mini monologo improvvisato in grammelot italiano/napoletano. Non nasconde con quanta emozione abbia detto addio al personaggio. ''Ho pianto alla fine di ''<span xml:lang="en">Breaking Bad</span>'', ma penso che l''autore <span xml:lang="en">Vince Gilligan</span>, abbia creato la perfetta fine per la storia". L''attore 61 enne, ha raggiunto il successo dopo oltre 20 anni di gavetta, con oltre 150 ruoli all''attivo, vincitore di 6 <span xml:lang="en">Emmy</span> e un <span xml:lang="en">Golden Globe</span>, e ha ottenuto nel 2016 la prima nomination all''<span xml:lang="en">Oscar</span> per Trumbo. ','Breaking+Bad'),
('Messico, ucciso assistente di produzione: cercava <span xml:lang="en">location</span> per la quarta stagione della serie','2017-10-10','Il suo era un ruolo fondamentale, trovava le location migliori per poter girare un film, o una serie tv, in un territorio difficile come quello messicano. Un lavoro che gli è costato la vita: <span xml:lang="es">Carlos Munoz Portal</span> è stato trovato morto proprio mentre cercava i luoghi in cui girare la prossima, la quarta, stagione della serie di <span xml:lang="en">Netflix Narcos</span>. Trentasette anni, assistente di produzione, <span xml:lang="es">Munoz Portal</span> è stato ucciso in un''area vicina al confine con lo stato dell''<span xml:lang="en">Hidalgo</span>, nel comune di <span xml:lang="en">Temascalapa</span>. Beffa del destino, è stato assassinato esattamente come potrebbe accadere in una scena di <span xml:lang="en">Narcos</span>: il corpo crivellato di colpi, poi nascosto nel bagagliaio della sua auto. In una zona che vanta il tragico primato del numero più alto di omicidi in tutto il Messico: solo nel mese di luglio ne sono stati registrati 182.','Narcos'),
('Ultima puntata vicina?','2017-11-11','<span xml:lang="en">Grey''s Anatomy</span> ha da poco raggiunto il grande traguardo delle 300 puntate e sembra procedere spedito verso nuove stagioni ma, secondo alcune ipotesi che circolano ultimamente, sembra che la serie ci stia mandando dei segnali per indirizzarci vero la conclusione. <span xml:lang="en">Shonda Rhimes</span> è recentemente passata a <span xml:lang="en">Netflix</span>, firmando un contratto per la realizzazione di nuove serie tv e, anche se questo non implica che le sue serie verranno automaticamente chiuse, è un elemento da tenere in considerazione. Il fatto che lei indirizzi i suoi interessi altrove, potrebbe portarla a decidere di chiudere <span xml:lang="en">Grey''s Anatomy</span>, così come sta accadendo per un'' altra delle sue serie, <span xml:lang="en">Scandal</span>? <span xml:lang="en">Shonda Rhimes</span>, comunque, ha garantito in più di un''occasione che non sa quando <span xml:lang="en">Grey''s Anatomy</span> finirà e che, per il momento, il suo obiettivo è quello di battere il record delle 15 stagioni di E.R.  Medici in prima linea.','Greys+Anatomy'),
('<span xml:lang="en">Mr Robot</span> va a una festa di <span xml:lang="en">hacker</span> nella prima foto della stagione 3','2017-12-11','A ottobre l''acclamata serie tv <span xml:lang="en">Mr. Robot</span> farà ritorno per una terza stagione. oggi <span xml:lang="en">Entertainment Weekly</span> ha diffuso la prima foto ufficiale dei nuovi episodi che mostra <span xml:lang="en">Elliot</span> (<span xml:lang="en">Rami Malek</span>) sorprendentemente sociale a un incontro di <span xml:lang="en">hacker</span>. A quanto pare la comunità di <span xml:lang="en">hacker</span> sembra piuttosto positiva di fronte allo stato del mondo. "La seconda stagione vedrà <span xml:lang="en">Elliot</span> pronto a riprendere in mano la propria esistenza e a combattere contro le persone che lo stanno usando" ha spiegato il creatore della serie <span xml:lang="en">Sam Esmail</span>, svelando che il team al centro dei dieci nuovi episodi sarà la disintegrazione. "<span xml:lang="en">Elliot</span> non si lascerà più andare e non permetterà che questo accada."','MrRobot');

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
CREATE TRIGGER `UpdateMediaVotiDelete` AFTER DELETE ON `Valutazione` FOR EACH ROW UPDATE SerieTV SET SerieTV.Valutazione=(SELECT MediaVoti.Media from MediaVoti where MediaVoti.Titoloserie=SerieTV.Titolo) WHERE SerieTV.Titolo=OLD.TitoloSerie;
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

