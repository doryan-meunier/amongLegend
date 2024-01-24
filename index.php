<?php
// Démarre ou restaure la session
session_start();

// Détruit toutes les données de la session
//session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requête AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<form id="nom" method="POST" action="">
    <div class="mb-3">
        <label for="inputNomUser" class="form-label inputNom">Entrer votre nom</label>
        <input class="form-control inputNom" name="inputNomUser" id="inputNomUser" aria-describedby="emailHelp">
        <label for="inputTagUser" class="form-label inputTag">Entrer votre tag</label>
        <input class="form-control inputNom" name="inputTagUser" id="inputTagUser" aria-describedby="emailHelp">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
    </div>
</form>


<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
