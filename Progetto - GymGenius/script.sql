/* ===================================================================
-- Creazione delle tabelle 
-- ================================================================ */

  CREATE TABLE trainer(
    email character varying(40) NOT NULL,
    nome character varying(40),
    cognome character varying(40),
    sesso character varying(10),
    data_nascita character varying(30),
    psw character varying(30),
    tipo character varying(5),
    img character varying(50) DEFAULT '/assets/uploads/profile.jpg'::character varying,
    txt character varying(50) DEFAULT '/assets/uploads/load.txt'::character varying,
    specializzazione character varying(150),
    CONSTRAINT trainer_pkey PRIMARY KEY (email)
  );
  
  CREATE TABLE utente(
    email character varying(40) NOT NULL,
    nome character varying(40) ,
    cognome character varying(40),
    sesso character varying(10),
    data_nascita character varying(30),
    psw character varying(30),
    CONSTRAINT utente_pkey1 PRIMARY KEY (email)
  );

  CREATE TABLE richiesta(
    codice character varying(36),
    email_richiedente character varying(40),
    email_allenatore character varying(40),
    altezza bigint,
    peso bigint,
    frequenza character varying(30),
    obiettivi character varying(150),
    data character varying(20),
    new boolean DEFAULT true,
    completa boolean DEFAULT false,
    CONSTRAINT richiesta_pkey PRIMARY KEY (codice),
    CONSTRAINT fk_trainer FOREIGN KEY (email_allenatore)
        REFERENCES public.trainer (email) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_utente FOREIGN KEY (email_richiedente)
        REFERENCES public.utente (email) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
  );

  CREATE TABLE articolo(
    titolo character varying(60),
    autore character varying(40),
    tipo character varying(15),
    intro character varying(150),
    testo_art character varying(50),
    img_art character varying(50),
    CONSTRAINT articolo_pkey PRIMARY KEY (titolo),
    CONSTRAINT fk_trainer FOREIGN KEY (autore)
        REFERENCES public.trainer (email) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
  );

/*  ====================================================================
-- Inserimento nelle tabelle
-- ================================================================== */

INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt)
	VALUES ('jgatsby@gymgenius.it', 'Jay',	'Gatsby', 'M', '1992-07-04', '123', 'PT', '/assets/uploads/jgatsby.jpg', '/assets/uploads/jgatsby.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('jwick@gymgenius.it', 'John', 'Wick', 'M', '1984-09-02', '123', 'PT', '/assets/uploads/jwick.jpg', '/assets/uploads/jwick.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('mbloom@gymgenius.it', 'Molly', 'Bloom', 'F', '1982-02-02', '123', 'N', '/assets/uploads/mbloom.jpg', '/assets/uploads/mbloom.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('cdelvalle@gymgenius.it', 'Clara', 'Del Valle', 'F', '1972-08-02', '123', 'N', '/assets/uploads/cdelvalle.jpg', '/assets/uploads/cdelvalle.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('gviola@gymgenius.it', 'Giorgio', 'Viola', 'M', '1971-12-19', '123', 'N', '/assets/uploads/gviola.jpg', '/assets/uploads/gviola.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('prova@provaallenator333e.it', 'Elthon', 'John', 'M', '2024-04-17', '123', 'N', '/assets/uploads/profile.jpg', '/assets/uploads/load.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('wsmith@gymgenius.it', 'Winston', 'Smith', 'M', '1986-02-12', '123', 'PT', '/assets/uploads/wsmith.jpg', '/assets/uploads/wsmith.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('bwayne@gymgenius.it', 'Bruce', 'Wayne', 'M', '1975-10-13', '123', 'PT', '/assets/uploads/bwayne.jpg', '/assets/uploads/bwayne.txt');
INSERT INTO trainer(email, nome, cognome, sesso, data_nascita, psw, tipo, img, txt) 
    VALUES ('lbriscoe@gymgenius.it', 'Lily', 'Briscoe', 'F', '1989-01-12', '123', 'PT', '/assets/uploads/lbriscoe.jpg', '/assets/uploads/lbriscoe.txt');


INSERT INTO utente(email, nome, cognome, sesso, data_nascita, psw)
	VALUES ('tikawo6227@picdv.com', 'Emma', 'Bovary', 'F', '1996-05-15', '123');
INSERT INTO utente(email, nome, cognome, sesso, data_nascita, psw)
	VALUES ('moyat25089@togito.com', 'Edward', 'Hyde', 'M', '1986-01-05', '123');
INSERT INTO utente(email, nome, cognome, sesso, data_nascita, psw)
	VALUES ('jakiy77961@togito.com', 'Dorian', 'Gray', 'M', '1990-07-01', '123');
INSERT INTO utente(email, nome, cognome, sesso, data_nascita, psw)
	VALUES ('migew88673@picdv.com', 'Anthony', 'Patch', 'M', '1980-04-02', '123');
INSERT INTO utente(email, nome, cognome, sesso, data_nascita, psw)
	VALUES ('nadiki3310@idsho.com', 'Gloria', 'Gilbert', 'F', '1992-04-02', '123');


INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('c871df88330b99b5fbc2151e6d0f6074', 'migew88673@picdv.com', 'gviola@gymgenius.it', 185,	100, '3-4 volte a settimana', 'Gestire il diabete e migliorare il controllo glicemico con un piano alimentare specifico e monitoraggio regolare', '1714502231', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('cc1823ac22993f8dc31de32709853a79', 'jakiy77961@togito.com', 'cdelvalle@gymgenius.it', 172, 75, '3-4 volte a settimana', 'Migliorare l"energia e l"umore attraverso una dieta equilibrata e sostenibile', '1714502087', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('b4e33b4243699f5bc07357c16da660ff', 'migew88673@picdv.com', 'lbriscoe@gymgenius.it', 185, 100, '3-4 volte a settimana', 'Integrare sessioni di sollevamento pesi e allenamenti ad alta intensità nella mia routine per aumentare la forza e l"energia', '1714502391', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('ac975418440a5e4eab93ceda7e446979', 'nadiki3310@idsho.com', 'jwick@gymgenius.it', 171, 63, '1-2 volte a settimana', 'Praticare esercizi di equilibrio come il pilates e l"allenamento funzionale per migliorare la stabilità e la coordinazione', '1714502516', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('0a4b6578d49027bf296f480197c7b370', 'nadiki3310@idsho.com', 'cdelvalle@gymgenius.it', 171, 63, '1-2 volte a settimana', 'Ottimizzare la salute mentale e ridurre lo stress con una dieta che supporta l"equilibrio ormonale e il benessere emotivo.', '1714502582', true,	false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('25c6d7cc0b9d1aba2435d257adc97adb', 'tikawo6227@picdv.com', 'jgatsby@gymgenius.it', 161, 56, 'ogni giorno', 'Aumentare la forza e migliorare la resistenza con un programma di allenamento completo', '1714500138', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('eef9685e2a568df34f04ee03a031a8b0', 'tikawo6227@picdv.com', 'mbloom@gymgenius.it', 161, 56, 'ogni giorno', 'Ottimizzare la performance atletica con una dieta personalizzata e piani alimentari adatti agli allenamenti intensi', '1714500286',	true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('cbb447a7566686bc4baef32962fa6262', 'moyat25089@togito.com', 'gviola@gymgenius.it', 179, 93, '1-2 volte a settimana', 'Perdere peso in modo sano e mantenibile attraverso strategie alimentari efficaci e supporto motivazionale', '1714501880', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('08765a96b49f5a1934ba1e04f78af5f2', 'moyat25089@togito.com', 'wsmith@gymgenius.it', 179, 93, '1-2 volte a settimana', 'Aumentare la massa muscolare e migliorare la definizione con un programma di sollevamento pesi', '1714501931', true, false);
INSERT INTO richiesta(codice, email_richiedente, email_allenatore, altezza, peso, frequenza, obiettivi, data, new, completa)
	VALUES ('5469924117a0cb5e59543e761e0c3835', 'jakiy77961@togito.com', 'bwayne@gymgenius.it', 172, 75, '3-4 volte a settimana', 'Migliorare la resistenza e la forma fisica generale con un mix di corsa e circuiti ad alta intensità', '1714502026', true, false);


INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('IL RECUPERO DOPO LO SPORT', 'jgatsby@gymgenius.it', 'Allenamento', 'Consigli per una rigenerazione efficace dopo lo sport: quanto è importante concedersi una pausa.', '/assets/articoli/articolo1.txt', '/assets/articoli/articolo1.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('CORRERE IN CITTÀ: NAVIGA L"ASFALTO', 'jgatsby@gymgenius.it', 'Allenamento', 'Corsa urbana e inquinamento: rischi e benefici dell"attività fisica in ambienti urbani inquinati', '/assets/articoli/articolo2.txt', '/assets/articoli/articolo2.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('POST WORKOUT: COSA MANGIARE', 'mbloom@gymgenius.it', 'Nutrizione', 'Il post workout, è una fase essenziale, sia per la crescita che per il recupero muscolare.', '/assets/articoli/articolo3.txt', '/assets/articoli/articolo3.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('CELIACHIA E SPORT: I FALSI MITI', 'mbloom@gymgenius.it', 'Nutrizione', 'Una dieta senza glutine è fondamentale per i celiaci, ma non migliora le prestazioni sportive', '/assets/articoli/articolo4.txt', '/assets/articoli/articolo4.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('RIPRENDERE LO SPORT DOPO UN LUNGO STOP', 'jwick@gymgenius.it', 'Allenamento', 'Ricominciare a fare movimento dopo un lungo periodo di inattività senza lasciarsi scoraggiare', '/assets/articoli/articolo5.txt', '/assets/articoli/articolo5.jpeg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('GLI EFFETTI DELL"ALCOL SULL"ATLETA', 'jwick@gymgenius.it', 'Nutrizione', 'Come fare scelte consapevoli, bilanciando il consumo di alcol e l"attività fisica', '/assets/articoli/articolo6.txt', '/assets/articoli/articolo6.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('GUARDA MÀ, SENZA OSSIGENO!', 'cdelvalle@gymgenius.it', 'Allenamento', 'I sorprendenti benefici dell"attività anaerobica: scopri di più su come integrarla nel tuo workout', '/assets/articoli/articolo7.txt', '/assets/articoli/articolo7.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('IL POTERE DELLE PROTEINE NELLO SPORT', 'gviola@gymgenius.it', 'Nutrizione', 'Scopri come massimizzare il tuo potenziale atletico attraverso una corretta alimentazione proteica', '/assets/articoli/articolo8.txt', '/assets/articoli/articolo8.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('GUFO O ALLODOLA?', 'wsmith@gymgenius.it', 'Allenamento', 'Scopri quale momento della giornata potrebbe essere più adatto alle tue esigenze di allenamento', '/assets/articoli/articolo9.txt', '/assets/articoli/articolo9.jpg');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('READY, SET, DE-STRESS', 'bwayne@gymgenius.it', 'Allenamento', 'Sì, l"esercizio fisico può aiutare a ridurre l"ansia: ecco come può frenarla', '/assets/articoli/articolo10.txt', '/assets/articoli/articolo10.png');
INSERT INTO articolo(titolo, autore, tipo, intro, testo_art, img_art)
	VALUES ('L"IMPORTANZA DELL"IDRATAZIONE', 'lbriscoe@gymgenius.it', 'Nutrizione', 'Tutto quello che c’è da sapere per una corretta idratazione nell’esercizio fisico', '/assets/articoli/articolo11.txt', '/assets/articoli/articolo11.jpg');

/*  ====================================================================
-- Modifica per sostituire " con '
-- ================================================================== */

UPDATE richiesta
SET obiettivi = REPLACE(obiettivi, '"', '''');

UPDATE articolo
SET 
	titolo = REPLACE(titolo, '"', ''''),
	intro = REPLACE(intro, '"', '''');
