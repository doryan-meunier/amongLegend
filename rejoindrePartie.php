<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['puuid'])) {
    header('Location: index.php');
    exit();
}

$conn = new PDO('mysql:host=localhost;dbname=amongLegend;charset=utf8;', 'root', 'root');

// Vérifiez si le formulaire est soumis pour rejoindre une partie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rejoindre_partie'])) {
    // Récupérez l'ID de la partie à rejoindre
    $partie_id = $_POST['partie_id'];

    // Évitez les attaques par injection SQL en utilisant une requête préparée
    $update_query = $conn->prepare("UPDATE joueurs SET idPartie = :partie_id WHERE idJoueur = :joueur_id");
    $update_query->bindParam(':partie_id', $partie_id, PDO::PARAM_INT);
    $update_query->bindParam(':joueur_id', $_SESSION['id'], PDO::PARAM_INT);

    // Exécutez la requête de mise à jour
    if ($update_query->execute()) {
        // Redirigez l'utilisateur vers la page actuelle après la mise à jour
        header('Location: rejoindrePartie.php');
        exit();
    } else {
        // Gérez les erreurs ici, par exemple affichez un message d'erreur
        echo "Erreur lors de la mise à jour de l'idPartie. Raison : " . implode(" ", $update_query->errorInfo());
    }
}

// Récupérez les informations sur les parties
$query = "SELECT p.idPartie, p.nomPartie, j.nom as createurNom FROM parties p 
          INNER JOIN joueurs j ON p.idHost = j.idJoueur";
$resultat = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre une Partie</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/rejoindrePartie.css">
</head>
<body>

<div class="titre">
    <section id="rechercher">
        <h3><b>Rejoindre une partie ?</b></h3>
        <div class="barre_titre fl-wrap"></div>
        <div class="conteneur-global">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">amongLegend</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            trier par
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="triPartiesDropdown">
          <li><a class="dropdown-item" href="#" data-tri="alphabetique">Alphabétique</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" id="recherchePartieInputNavbar" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="conteneur-global" id="partiesListe">
        <?php
        // Affichez les parties ou un message s'il n'y en a pas
        if ($resultat->rowCount() > 0) {
            while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                // Affichez les détails de la partie
                echo '<div class="barre_titre fl-wrap" ></div>
                      <div class="card" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; margin-right: 20%; margin-left: 20%; !important">
                          <div class="card-header">' . htmlspecialchars($ligne['nomPartie']) . '</div>
                          <div class="card-body">
                              <h5 class="card-title">Créateur : ' . htmlspecialchars($ligne['createurNom']) . '</h5>
                              <form method="post" action="">
                                  <input type="hidden" name="partie_id" value="' . $ligne['idPartie'] . '">
                                  <button type="submit" name="rejoindre_partie" class="btn btn-primary">Rejoindre Partie</button>
                              </form>
                          </div>
                      </div><br>';
            }
        } else {
            // Aucune partie trouvée, affichez un message
            echo '<form method="post" action="" class="formulaire" style="padding: 50px !important">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" style="color: black !important">Aucune partie n\'a encore été créée</label>
                    </div><br>';
            echo '<a href="initialisationPartie.php" class="btn btn-primary">Créer une partie</a></form>';
        }
        ?>
        </div>
        </div>
    </section>
</div>
<script src="js/rejoindrePartie.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
