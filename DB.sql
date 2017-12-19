
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
('MrRobot','Thriller','2015-06-24',NULL,'2','Elliot Alderson \'e8 un giovane tecnico informatico di New York che lavora come esperto di sicurezza informatica alla ditta Allsafe. Sociofobico, schizofrenico, la mente di Elliot \'e8 pesantemente influenzata dai deliri paranoici e dalle allucinazioni che gli causano grossi problemi nel relazionarsi con le persone e lo fanno vivere in un costante stato di ansia e paranoia. Nella vita privata Elliot \'e8 uno stalker informatico che tratta le persone come computer da hackerare per scoprirne i segreti pi\'f9 intimi e spesso agendo come una sorta di giustiziere informatico. Elliot viene avvicinato da Mr. Robot, un misterioso anarchico-insurrezionalista, che intende introdurlo in un gruppo di hacktivisti conosciuti con il nome di fsociety. Il manifesto di fsociety \'e8 liberare l''umanit\'e0 dai debiti con le banche e smascherare i corruttori che stanno distruggendo il mondo. Per convincere il giovane a unirsi alla causa, Mr. Robot dichiara di voler causare il fallimento della potente multinazionale E Corp, ritenuta responsabile di un disastro ambientale che ha causato la morte del padre di Elliot e di altre centinaia di persone. La E Corp, percepita come "Evil Corp" (multinazionale malvagia) dal protagonista, \'e8 il cliente principale della Allsafe e per il quale Elliot sar\'e0 nominato supervisore della sicurezza informatica.'),
('How to get away with a murder','Thriller','2014-09-26',NULL,'4','La serie segue la vita professionale e privata della carismatica Annalise Keating, stimata avvocato e preziosa docente di diritto penale presso una prestigiosa Universit\'e0 di Filadelfia, la fittizia "Middleton University". Con la collaborazione dei "Keating Five", ovvero i 5 studenti scelti per assisterla nei casi giudiziari, e ai suoi associati Bonnie e Frank, Annalise si trover\'e0 a dover affrontare vari processi e, soprattutto, il caso di omicidio di una studentessa, che legher\'e0 lei, il suo amante e tutti gli altri all''incombente morte del marito Sam.'),
('Narcos','Drammatico','2015-08-08',NULL,'3','La serie racconta la storia vera della dilagante diffusione della cocaina tra Stati Uniti ed Europa negli anni ottanta. Le prime due stagioni sono incentrate sulla lotta delle autorit\'e0 colombiane e della DEA contro il narcotrafficante Pablo Escobar e il cartello di Medell\'edn. La terza stagione \'e8 incentrata sulla lotta al cartello di Cali, guidato dai fratelli Gilberto e Miguel Rodr\'edguez Orejuela. La quarta stagione \'e8 ambientata in Messico \'e8 incentrata sull''origine del cartello di Ju\'e1rez.'),
('Breaking Bad','Drammatico','2008-01-20','2013-09-29','5','Walter White \'e8 un professore di chimica di Albuquerque. Vive con la moglie Skyler, incinta della loro secondogenita, e il figlio Walter "Flynn" Junior, affetto da una paralisi cerebrale, un disturbo che gli causa problemi di linguaggio e lo costringe a servirsi di stampelle per muoversi. Alla soglia del compimento dei cinquant''anni, Walter \'e8 costretto a svolgere un secondo lavoro come dipendente di un autolavaggio, per far fronte alle difficolt\'e0 economiche della famiglia. A tutto questo si aggiunge il profondo senso di insoddisfazione di Walter, che deve sopportare le angherie del suo titolare, dei suoi amici e familiari, i quali lo vedono come un uomo debole e remissivo. In particolare suo cognato Hank, agente della DEA, con cui peraltro ha un buon rapporto, non perde occasione per mettere a confronto la sua vita avventurosa con quella di Walter, totalmente priva di soddisfazioni. Quando a Walter viene diagnosticato un cancro ai polmoni, i suoi problemi sembrano precipitare. Tuttavia, in seguito al casuale incontro con Jesse Pinkman, un suo ex studente diventato uno spacciatore di poco conto, Walter decide di cucinare i cristalli di metanfetamina. Il prodotto di Walter si rivela per\'f2 di qualit\'e0 nettamente superiore rispetto alla concorrenza, con una purezza del 99,1%, derivante dalle sue conoscenze chimiche. Decide quindi di sfruttare le sue capacit\'e0 per prendere il controllo del mercato della droga.'),
('Greys Anatomy','Drammatico','2005-03-27',NULL,'13','Meredith Grey \'e8 una giovane ragazza di Boston che, dopo la laurea in medicina, riesce ad entrare nel gruppo di tirocinanti di chirurgia del Seattle Grace Hospital. Si trasferisce cos\'ec a Seattle, nella vecchia casa appartenuta alla madre. Qui si trova a condividere la nuova esperienza insieme ad un gruppo di giovani coetanei, tutti alle prese con i pi\'f9 svariati problemi, sentimentali e non. Meredith \'e8 figlia di Ellis Grey, una dottoressa di fama mondiale specialista in chirurgia generale, cosa che le fa sentire molto il peso del suo cognome. La sera prima di iniziare il tirocinio, in un pub Meredith incontra Derek, un affascinante uomo con cui passa la notte; il giorno dopo scopre che in realt\'e0 lui \'e8 Derek Shepherd, neurochirurgo del Seattle Grace, nonch\'e9 suo supervisore. Meredith deve cos\'ec districarsi tra lo studio e il lavoro per poter diventare un chirurgo e i sentimenti che prova per Derek.'),
('The Expanse','Fantascienza','2015-12-14',NULL,'2','Nel XXIV secolo, il sistema solare \'e8 stato colonizzato dagli umani e si trova in una situazione di precario equilibrio geopolitico a causa delle tensioni fra la Terra e le ex-colonie marziane, oramai indipendenti sotto il vessillo della Repubblica congressuale marziana, e del degrado sociale in cui sopravvive gran parte della popolazione degli avamposti nella fascia principale degli asteroidi e sui pianeti esterni. In questo difficile contesto, si intrecciano le vicende del detective di polizia Josephus Miller, di stanza su Cerere, a cui viene affidata l''indagine sulla scomparsa di una donna terrestre, Julie Andromeda Mao, e il secondo ufficiale del cargo porta ghiaccio Canterbury, James Holden, inavvertitamente coinvolto in un incidente che rischia di destabilizzare irreversibilmente le relazioni tra Marte e la Terra e innescare un conflitto interplanetario.'),
('Dirk Gently. Agenzia di investigazione olistica','Commedia','2016-10-22',NULL,'2','Quando Todd Brotzman, un rocker caduto in disgrazia, inciampa nella scena del crimine di un miliardario, la situazione precipita velocemente nel caos pi\'f9 assoluto. L''eccentrico Dirk Gently, un detective molto poco convenzionale, \'e8 convinto che loro siano destinati a districare gli eventi particolari che circondano il mistero insieme, che Todd lo voglia o meno. E sebbene questo non sia per niente facile, giacch\'e9 diversi personaggi tanto folli quanto pericolosi si mettono in mezzo complicando le cose, ogni passo avanti, per quanto casuale, li avvicina alla verit\'e0.'),
('CSI: Miami','Poliziesco','2002-09-23','2012-05-08','12','Horatio Caine \'e8 un uomo preciso e altruista, qualit\'e0 sicuramente non usuali in un agente della scientifica, soprattutto in una citt\'e0 come Miami. Lui, per\'f2, non potrebbe essere diversamente. Il crimine l\rquote ha segnato in prima persona, e da quel giorno difficile si \'e8 sempre mostrato disponibile e cordiale nei confronti delle persone a lui vicine, a cominciare dai membri della sua squadra, con i quali risolvono i crimini pi\'f9 efferati.');


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
('Annunciata la terza stagione della serie','2017-07-24','\'c8 fissato per l''11 ottobre l''esordio della terza stagione della pluripremiata serie cult firmata da Sam Esmail, con Rami Malek nel ruolo dell''hacker sociopatico Elliot Alderson. Ripartiamo dunque dai colpi di scena e dai cliffhanger del finale della stagione 2 per provare a riflettere su cosa aspettarci da Mr. Robot per il prossimo autunno.','MrRobot'),
('Cranston, pianto per stop Breaking Bad','2017-10-20','Ironico, trascinantee: Bryan Cranston, che ha dato vita per cinque stagioni a Walter White, il professore di chimica malato terminale nella serie cult Breaking Bad, al Giffoni Film Festival ha conquistato i ragazzi, regalando anche un esilarante mini monologo improvvisato in grammelot italiano/napoletano. Non nasconde con quanta emozione abbia detto addio al personaggio. ''Ho pianto alla fine di ''Breaking Bad'', ma penso che l''autore Vince Gilligan, abbia creato la perfetta fine per la storia". L''attore 61 enne, ha raggiunto il successo dopo oltre 20 anni di gavetta, con oltre 150 ruoli all''attivo, vincitore di 6 Emmy e un Golden Globe, e ha ottenuto nel 2016 la prima nomination all''Oscar per Trumbo. Ha ora in uscita l''atteso Last Flag Flying di Richard Linklater, seguito ideale di L''ultima corv\'e9 di Hal Ashby; ha da poco finito Untouchable, il remake Usa di Quasi Amici, con Nicole Kidman e Kevin Hart e sar\'e0 tra le voci del nuovo film animato di Wes Anderson, Isle of dogs.','Breaking Bad'),
('Messico, ucciso assistente di produzione: cercava location per la quarta stagione della serie','2017-10-10','Il suo era un ruolo fondamentale, trovava le location migliori per poter girare un film, o una serie tv, in un territorio difficile come quello messicano. Un lavoro che gli \'e8 costato la vita: Carlos Mu\'f1oz Portal \'e8 stato trovato morto proprio mentre cercava i luoghi in cui girare la prossima, la quarta, stagione della serie di Netflix Narcos. Trentasette anni, assistente di produzione, Mu\'f1oz Portal \'e8 stato ucciso in un''area vicina al confine con lo stato dell''Hidalgo, nel comune di Temascalapa. Beffa del destino, \'e8 stato assassinato esattamente come potrebbe accadere in una scena di Narcos: il corpo crivellato di colpi, poi nascosto nel bagagliaio della sua auto. In una zona che vanta il tragico primato del numero pi\'f9 alto di omicidi in tutto il Messico: solo nel mese di luglio ne sono stati registrati 182.','Narcos'),
('Ultima puntata vicina?','2017-11-11','Grey''s Anatomy ha da poco raggiunto il grande traguardo delle 300 puntate e sembra procedere spedito verso nuove stagioni ma, secondo alcune ipotesi che circolano ultimamente, sembra che la serie ci stia mandando dei segnali per indirizzarci vero la conclusione. Grey\rquote s Anatomy ultima puntata: ecco cosa potrebbe succedere! Shonda Rhimes \'e8 recentemente passata a Netflix, firmando un contratto per la realizzazione di nuove serie tv e, anche se questo non implica che le sue serie verranno automaticamente chiuse, \'e8 un elemento da tenere in considerazione. Il fatto che lei indirizzi i suoi interessi altrove, potrebbe portarla a decidere di chiudere Grey\rquote s Anatomy, cos\'ec come sta accadendo per un\rquote altra delle sue serie, Scandal? Shonda Rhimes, comunque, ha garantito in pi\'f9 di un\rquote occasione che non sa quando Grey\rquote s Anatomy finir\'e0 e che, per il momento, il suo obiettivo \'e8 quello di battere il record delle 15 stagioni di E.R. \endash  Medici in prima linea.','Greys Anatomy'),
('Mr Robot va a una festa di hacker nella prima foto della stagione 3','2017-12-11','A ottobre l''acclamata serie tv Mr. Robot far\'e0 ritorno per una terza stagione. oggi Entertainment Weekly ha diffuso la prima foto ufficiale dei nuovi episodi che mostra Elliot (Rami Malek) sorprendentemente sociale a un incontro di hacker. A quanto pare la comunit\'e0 di hacher sembra piuttosto positiva di fronte allo stato del mondo. "La seconda stagione vedr\'e0 Elliot pronto a riprendere in mano la propria esistenza e a combattere contro le persone che lo stanno usando" ha spiegato il creatore della serie Sam Esmail, svelando che il team al centro dei dieci nuovi episodi sar\'e0 la disintegrazione. "Elliot non si lascer\'e0 pi\'f9 andare e non permetter\'e0 che questo accada."','MrRobot');

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
('XxX_PuSsYdEsTrOyEr_XxX','Sperminator'),
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

CREATE TRIGGER `UpdateMediaVoti` AFTER INSERT ON `Valutazione` FOR EACH ROW UPDATE SerieTV SET SerieTV.Valutazione=(SELECT MediaVoti.Media from MediaVoti where MediaVoti.Titoloserie=SerieTV.Titolo) WHERE SerieTV.Titolo=NEW.TitoloSerie;
/*Data for the table `Valutazione` */
 
insert into `Valutazione`(`Titoloserie`,`Voto`,`NickName`)values
('MrRobot',4,'MatteoSi'),
('MrRobot',3,'ElenaGi'),
('How to get away with a murder',3,'NicolaT1'),
('How to get away with a murder',3,'Carla89'),
('Narcos',NULL,'LorenzoMi'),
('Narcos',3,'MatteoSi'),
('Narcos',NULL,'ElenaGi'),
('Breaking Bad',5,'NicolaT1'),
('Breaking Bad',4,'Carla89'),
('Breaking Bad',5,'ElenaGi'),
('Breaking Bad',5,'MatteoSi'),
('Breaking Bad',1,'DavideSe'),
('Breaking Bad',1,'LorenzoMi'),
('Greys Anatomy',4,'DavideSe'),
('Greys Anatomy',5,'LorenzoMi'),
('Greys Anatomy',3,'Carla89'),
('Greys Anatomy',2,'ElenaGi'),
('Greys Anatomy',2,'utente'),
('Narcos',4,'utente'),
('The Expanse',NULL,'utente');

