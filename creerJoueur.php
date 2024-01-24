<?php
// Démarre ou restaure la session
session_start();

// Assurez-vous que $_SESSION['puuid'] et $_SESSION['nom'] sont définis
if (isset($_SESSION['puuid']) && isset($_SESSION['nom'])) {
    // Connexion à la base de données (à adapter avec vos propres informations de connexion)
    $conn = mysqli_connect("localhost", "root", "", "amongLegend");

    // Vérification de la connexion à la base de données
    if (!$conn) {
        die("Échec de la connexion à la base de données : " . mysqli_connect_error());
    }

    // Vérification si le puuid existe déjà dans la table "joueurs"
    $puuid = $_SESSION['puuid'];
    $queryCheckJoueur = "SELECT idJoueur FROM joueurs WHERE puuid = '$puuid'";
    $resultCheckJoueur = mysqli_query($conn, $queryCheckJoueur);

    // Si le puuid existe déjà, récupérer l'idJoueur
    if (mysqli_num_rows($resultCheckJoueur) > 0) {
        $row = mysqli_fetch_assoc($resultCheckJoueur);
        $_SESSION['idJoueur'] = $row['idJoueur'];
    } else {
        // Sinon, initialisation du joueur dans la table "joueurs"
        $nom = $_SESSION['nom'];
        $queryInitJoueur = "INSERT INTO joueurs (idPartie, puuid, nom, host, numeroJoueur) VALUES (NULL, '$puuid', '$nom', 0, NULL)";
        mysqli_query($conn, $queryInitJoueur);

        // Récupération de l'idJoueur nouvellement créé
        $_SESSION['idJoueur'] = mysqli_insert_id($conn);
    }

    // Vérification de l'existence d'un joueur avec le même puuid dans la table "sauvegarde"
    $queryCheckSauvegarde = "SELECT * FROM sauvegarde WHERE puuid = '$puuid'";
    $resultCheckSauvegarde = mysqli_query($conn, $queryCheckSauvegarde);

    // Création de la variable de session "sauvegarde"
    $_SESSION['sauvegarde'] = (mysqli_num_rows($resultCheckSauvegarde) > 0) ? true : false;

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);

    // Redirection vers la page de choix de partie
    header("Location: choixPartie.php");
}
else {
}
?>