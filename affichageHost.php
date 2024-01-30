<?php

// Définit la fonction qui affiche "test"
function afficherToggle() {
    if($_SESSION['host']) {
        echo 'onclick="toggleFond()"';
    }
}

function afficherCarte() {
    if($_SESSION['host']) {
        echo 'onclick="carte(this.id)"';
    }
}


?>