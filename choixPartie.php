<?php
session_start();

// Vérifie si les variables de session existent
if(isset($_SESSION['puuid']) && isset($_SESSION['nom'])) {
    $puuid = $_SESSION['puuid'];
    $nom = $_SESSION['nom'];

    // Affiche le nom
    echo "Nom: $nom";
} else {
    // Redirige l'utilisateur s'il manque des données en session
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host ou Rejoindre une partie ?</title>
    <link rel="stylesheet" href="css/stylePartie.css">
</head>
<body>

<div class="left" onclick="choixpj()">
    <span>Rejoindre une partie</span>
</div>
<div class="right" onclick="choixp()">
    <span>Créer une partie</span>
</div>

<script src="js/choixPartie.js"></script>

</body>
</html>
