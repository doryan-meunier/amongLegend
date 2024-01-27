<?php
// Gérer la mise à jour de la carte en fonction de la valeur reçue
if(isset($_POST['selected'])) {
    $selectedValue = $_POST['selected'];

    $conn = mysqli_connect("localhost", "root", "", "amongLegend");
    //mettre un select role et vérifier si c'est syncro entre la BDD et la page web
    $queryInitHost = "UPDATE roles SET idPartie = $idPartie  WHERE idJoueur = $idHost";
    mysqli_query($conn, $queryInitHost);
}
?>