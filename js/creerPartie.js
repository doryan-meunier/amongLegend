function carte(idcarte) {
    var carte = document.getElementById(idcarte);
    console.log(carte.style.backgroundColor);
    if (carte.style.backgroundColor == 'rgba(0, 255, 51, 0.46)')
        deselectionCarte(carte);
    else
        selectionCarte(carte);
}

function selectionCarte(carte) {
    carte.style.backgroundColor = 'rgba(0, 255, 51, 0.46)';
}

function deselectionCarte(carte) {
    carte.style.backgroundColor = 'white';
}
