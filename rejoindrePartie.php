<?php
    // Connexion à la base de données (remplacez les informations appropriées)
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "root";
    $baseDeDonnees = "amonglegend";
    
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    
    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    }
    
    // Requête pour récupérer les parties disponibles
    $sql = "SELECT idPartie, typePartie FROM parties";
    $resultat = $connexion->query($sql);
    
    // Vérification des résultats de la requête
    if ($resultat->num_rows > 0) {
        // Affichage des parties disponibles dans le formulaire
        while ($ligne = $resultat->fetch_assoc()) {
            ?>
            <form method="post" action="rejoindre_partie_traitement.php">
                <input type="hidden" name="idPartie" value="<?php echo $ligne['idPartie']; ?>">
                <input type="hidden" name="rejoindrePartie" value="1"> <!-- Champ indiquant la demande de rejoindre la partie -->
                <button type="submit" class="btn btn-primary">Rejoindre la partie <?php echo $ligne['idPartie']; ?></button>
            </form>
            <?php
        }
    } else {
        echo "Aucune partie disponible.";
    }
    
    // Fermeture de la connexion
    $connexion->close();
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre partie</title>
</head>
<body>

</body>
</html>