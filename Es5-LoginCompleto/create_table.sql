create table utente (
    email varchar(40), 
    nome varchar(40),
    cognome varchar(40),
    paswd varchar(32) not null,
    cap varchar(5),
    primary key (email)
);