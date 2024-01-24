-- Création de la table "parties"
DROP TABLE IF EXISTS parties;
CREATE TABLE IF NOT EXISTS parties (
    idPartie INT AUTO_INCREMENT PRIMARY KEY,
    idHost INT,
    typePartie BOOLEAN DEFAULT FALSE, -- FALSE = normal game, TRUE = partie perso'
    FOREIGN KEY (idHost) REFERENCES joueurs(idJoueurs)
);

-- Création de la table "roles"
DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
    idPartie INT,
    imposteur BIT DEFAULT FALSE,
    droide BIT DEFAULT FALSE,
    serpentin BIT DEFAULT FALSE,
    doubleFace BIT DEFAULT FALSE,
    superHeros BIT DEFAULT FALSE,
    FOREIGN KEY (idPartie) REFERENCES parties(idPartie)
);

-- Création de la table "joueurs"
DROP TABLE IF EXISTS joueurs;
CREATE TABLE IF NOT EXISTS joueurs (
	idJoueur INT AUTO_INCREMENT PRIMARY KEY,
    idPartie INT,
    puuid VARCHAR(255),
    nom VARCHAR(50),
    host BIT,
    numeroJoueur INT,
    FOREIGN KEY (idPartie) REFERENCES parties(idPartie)
);

-- Création de la table "sauvegarde"
DROP TABLE IF EXISTS sauvegarde;
CREATE TABLE IF NOT EXISTS sauvegarde (
	idJoueur INT,
    puuid VARCHAR(255),
    nombreParties INT,
    moyenneScore INT,
    meilleurScore INT,
    pireScore INT,
    maleAlpha BOOLEAN,
    FOREIGN KEY (idJoueur) REFERENCES joueurs(idJoueur)
);
