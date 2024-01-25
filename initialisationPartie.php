<?php
// Démarre ou restaure la session
session_start();

// Assurez-vous que $_SESSION['idJoueur'] est défini (peut être défini après l'initialisation du joueur)
if (isset($_SESSION['idJoueur'])) {
    // Connexion à la base de données (à adapter avec vos propres informations de connexion)
    $conn = mysqli_connect("localhost", "root", "root", "amongLegend");

    // Vérification de la connexion à la base de données
    if (!$conn) {
        die("Échec de la connexion à la base de données : " . mysqli_connect_error());
    }

    // Initialisation d'une nouvelle partie dans la table "parties"
    $idHost = $_SESSION['idJoueur'];
    $queryInitPartie = "INSERT INTO parties (idHost, typePartie) VALUES ('$idHost', DEFAULT)";
    mysqli_query($conn, $queryInitPartie);

    // Récupération de l'idPartie nouvellement créé
    $idPartie = mysqli_insert_id($conn);
    $_SESSION['idPartie'] = $idPartie;

    // Initialisation d'une nouvelle ligne dans la table "roles"
    $queryInitRoles = "INSERT INTO roles (idPartie, imposteur, droide, serpentin, doubleFace, superHeros) VALUES ('$idPartie', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
    mysqli_query($conn, $queryInitRoles);


    echo $idPartie;
    $queryInitHost = "UPDATE joueurs SET idPartie = $idPartie  WHERE idJoueur = $idHost";
    mysqli_query($conn, $queryInitHost);

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);

    // Redirection vers la page de choix de partie
    header("Location: creerPartie.php");
}
else
{
    header("Location: index.php");
}
?>
