<?php
// Gérer la mise à jour de la carte en fonction de la valeur reçue
if(isset($_POST['role']) && isset($_POST['etat'])) {
    session_start();
    $role = $_POST['role'];
    $etat = $_POST['etat'];
    $idPartie = $_SESSION['idPartie'];

    $conn = mysqli_connect("localhost", "root", "", "amongLegend");
    $queryInitHost = "UPDATE roles SET $role = $etat  WHERE idPartie = $idPartie";
    mysqli_query($conn, $queryInitHost);
}
?>