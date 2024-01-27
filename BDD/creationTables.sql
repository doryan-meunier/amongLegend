-- Création de la table "parties"
DROP TABLE IF EXISTS parties;
CREATE TABLE IF NOT EXISTS parties (
    idPartie INT AUTO_INCREMENT PRIMARY KEY,
    nomPartie varchar(50),
    motdepasse varchar(10) DEFAULT NULL,
    idHost INT,
    typePartie BOOLEAN DEFAULT FALSE -- FALSE = normal game, TRUE = partie perso'
);

-- Création de la table "roles"
DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
    idPartie INT PRIMARY KEY,
    imposteur BOOLEAN DEFAULT FALSE,
    droide BOOLEAN DEFAULT FALSE,
    serpentin BOOLEAN DEFAULT FALSE,
    doubleFace BOOLEAN DEFAULT FALSE,
    superHeros BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (idPartie) REFERENCES parties(idPartie) ON DELETE CASCADE
);

-- Création de la table "joueurs"
DROP TABLE IF EXISTS joueurs;
CREATE TABLE IF NOT EXISTS joueurs (
	idJoueur INT AUTO_INCREMENT PRIMARY KEY,
    idPartie INT,
    puuid VARCHAR(255),
    nom VARCHAR(50),
    host BOOLEAN,
    numeroJoueur INT,
    FOREIGN KEY (idPartie) REFERENCES parties(idPartie) ON DELETE SET NULL
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
