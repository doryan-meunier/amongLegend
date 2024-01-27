<?php
// Démarre ou restaure la session
session_start();

// Assurez-vous que $_SESSION['idJoueur'] est défini (peut être défini après l'initialisation du joueur)
if (isset($_SESSION['idJoueur'])) {
    if(isset($_POST['envoie'])){
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
}
else
{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>creation avant partie</title>
</head>
<body>
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nom de la partie</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary" name="envoie">creer la partie</button>
</form>

</body>
</html>

