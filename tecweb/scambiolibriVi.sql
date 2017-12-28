USE my_scambiolibrivi;

DROP TABLE IF EXISTS genereLibro, libro, copiaLibro, genere, utente;

CREATE TABLE utente(
	username VARCHAR(12) NOT NULL,
	password VARCHAR(12) NOT NULL,
	nome	 VARCHAR(20) NOT NULL,
	cognome  VARCHAR(20) NOT NULL,
	citta 	 VARCHAR(20) NOT NULL,
	provincia VARCHAR(20) NOT NULL,
	email 	 VARCHAR(30) NOT NULL,
	numeroTelefono VARCHAR(15),
	
	PRIMARY KEY (username)
);

CREATE TABLE libro(
	titolo VARCHAR(255) NOT NULL,
	autore VARCHAR(255) NOT NULL,
	casaEditrice VARCHAR(255),
	ISBN VARCHAR(13) NOT NULL,
	annoPubblicazione year,
	
	PRIMARY KEY(ISBN)
);

CREATE TABLE copiaLibro(
	codiceLibro int NOT NULL AUTO_INCREMENT,
	ISBN VARCHAR(13),
	proprietario VARCHAR(20) REFERENCES utente(username),
	prezzo DOUBLE(4,2) NOT NULL,
	stato VARCHAR(255) NOT NULL,
	note VARCHAR(160),
	
	PRIMARY KEY(codiceLibro),
	FOREIGN KEY(ISBN) REFERENCES libro(ISBN)
);
		

CREATE TABLE genere(
	id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	
	PRIMARY KEY(id)
);

CREATE TABLE genereLibro(
	codiceLibro int NOT NULL,
	idGenere int NOT NULL,
	
	PRIMARY KEY(codiceLibro, idGenere),
	FOREIGN KEY (codiceLibro) REFERENCES libro(codiceLibro),
	FOREIGN KEY (idGenere) REFERENCES genere(id)
);
