function carte(idcarte) {
    var carte = document.getElementById(idcarte);
    if (carte.style.backgroundColor == 'rgb(138, 255, 161)')
        deselectionCarte(carte);
    else
        selectionCarte(carte);
}

function selectionCarte(carte) {
    carte.style.backgroundColor = 'rgb(138, 255, 161)';
}

function deselectionCarte(carte) {
    carte.style.backgroundColor = 'white';
}

function toggleFond() {
    var body = document.getElementById('body');
    bodyBackground = body.style.backgroundImage;
    if (bodyBackground = 'url("https://raw.githubusercontent.com/doryan-meunier/amongLegend/main/images/creerPartie/howlingAbyss.jpeg")')
        bodyBackground = 'url("https://raw.githubusercontent.com/doryan-meunier/amongLegend/main/images/creerPartie/SummonersRift.jpeg")';
    else
        bodyBackground = 'url("https://raw.githubusercontent.com/doryan-meunier/amongLegend/main/images/creerPartie/howlingAbyss.jpeg")';
}